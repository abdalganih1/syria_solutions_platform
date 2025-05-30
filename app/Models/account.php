<?php
// app/Models/User.php (Rename this file to Account.php and the class name to Account)

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail; // Uncomment if needed later
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Keep Authenticatable trait for auth
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Keep if planning to use API tokens
// استيراد الـ Enum الخاص بنوع الحساب
use App\Enums\AccountTypeEnum;
// استيراد الكلاس الخاص بـ Enum Cast من الحزمة
use BenSampo\Enum\Casts\EnumCast;
use App\Models\Badge;
use App\Models\AccountBadge;
use App\Models\Solution;
use App\Models\Comment; // نحتاجها لعد التعليقات المعتمدة

class Account extends Authenticatable // Rename User to Account
{
    use HasApiTokens, HasFactory, Notifiable;

    // Specify the table if the class name doesn't match the pluralized table name (optional here, Account -> accounts matches)
    // protected $table = 'accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password', // Note: Laravel uses 'password'
        'account_type',
        'points',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Consider adding a cast for account_type if you use an accessor/mutator
        'email_verified_at' => 'datetime', // Keep if using email verification
        'password' => 'hashed', // Added in Laravel 10+ for automatic hashing
        'is_active' => 'boolean',
        'points' => 'integer',
        // 'account_type' => EnumCast::class . ':' . AccountTypeEnum::class,
    ];

    // Define relationships

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function organizationProfile()
    {
        return $this->hasOne(OrganizationProfile::class);
    }

    public function problems()
    {
        return $this->hasMany(Problem::class, 'submitted_by_account_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'author_account_id');
    }

    public function commentVotes()
    {
        return $this->hasMany(CommentVote::class, 'voter_account_id');
    }

    public function accountBadges()
    {
        return $this->hasMany(AccountBadge::class);
    }

    // Helper method to check account type
    public function isIndividual()
    {
        return $this->account_type === 'individual';
    }

    public function isOrganization()
    {
        return $this->account_type === 'organization';
    }

    public function isAdmin()
    {
        return $this->account_type === 'admin';
    }
    public function authoredComments()
    {
        return $this->hasMany(Comment::class, 'author_account_id');
    }
/**
     * Check if the account has earned any new badges and award them.
     * هذه الدالة يجب استدعاؤها عند حدوث أي حدث قد يؤدي إلى كسب لقب (زيادة نقاط، اعتماد تعليق).
     */
    public function checkAndAwardBadges(): void
    {
        $allBadges = Badge::all(); // جلب جميع تعريفات الألقاب المتاحة
        $currentPoints = $this->points; // نقاط المستخدم الحالية

        // حساب عدد تعليقات المستخدم التي تم اعتمادها كحلول
        // نستخدم علاقة adoptedSolution على نموذج Comment ونبحث في جدول Solutions
        $adoptedCommentsCount = $this->authoredComments()
                                     ->whereHas('adoptedSolution') // تحقق ما إذا كان التعليق مرتبط بسجل في جدول solutions
                                     ->count();

        foreach ($allBadges as $badge) {
            // التحقق من استيفاء الشروط
            $meetsPointsCriteria = $currentPoints >= $badge->required_points;
            $meetsAdoptedCommentsCriteria = $adoptedCommentsCount >= $badge->required_adopted_comments_count;

            // التحقق مما إذا كان المستخدم يمتلك اللقب بالفعل
            $hasBadge = $this->accountBadges()->where('badge_id', $badge->id)->exists();

            // إذا تم استيفاء الشروط والمستخدم لا يملك اللقب، قم بمنحه
            if ($meetsPointsCriteria && $meetsAdoptedCommentsCriteria && !$hasBadge) {
                 AccountBadge::create([
                    'account_id' => $this->id,
                    'badge_id' => $badge->id,
                    'awarded_at' => now(), // تعيين وقت منح اللقب الحالي
                 ]);

                 // (اختياري) يمكنك هنا بث حدث (Event) للإشارة إلى أن المستخدم كسب لقباً جديداً
                 // مثلاً لإرسال إشعار له
                 // event(new \App\Events\BadgeEarned($this, $badge));

                 // (اختياري) تسجيل في السجلات (logging)
                 // \Illuminate\Support\Facades\Log::info("Account #{$this->id} ({$this->username}) earned badge: {$badge->name}");
            }
        }
    }

}
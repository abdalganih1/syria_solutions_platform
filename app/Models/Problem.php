<?php
// app/Models/Problem.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// استيراد الـ Enums الخاصة بالمشكلة
use App\Enums\ProblemUrgencyEnum;
use App\Enums\ProblemStatusEnum;
// استيراد الكلاس الخاص بـ Enum Cast من الحزمة
use BenSampo\Enum\Casts\EnumCast;

class Problem extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'submitted_by_account_id',
        'category_id',
        'urgency',
        'status',
        'tags',
    ];
    protected $casts = [
        // Cast ENUM fields as strings or use custom accessors/mutators
        //   'urgency' => EnumCast::class . ':' . ProblemUrgencyEnum::class,
        // 'status' => EnumCast::class . ':' . ProblemStatusEnum::class,   // ربط الحقل بالـ Enum
        'status' => 'string',
        'urgency' => 'string',
        // لا تنسى إضافة Casts الأخرى إذا كانت موجودة
        // 'created_at' => 'datetime',
        // 'updated_at' => 'datetime',

    ];
    public function submittedBy()
    {
        return $this->belongsTo(Account::class, 'submitted_by_account_id');
    }
    public function category()
    {
        return $this->belongsTo(ProblemCategory::class, 'category_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
<?php
// app/Models/Badge.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Badge extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image_url',
        'required_adopted_comments_count',
        'required_points',
    ];
    protected $casts = [
        'required_adopted_comments_count' => 'integer',
        'required_points' => 'integer',
    ];
    public function accountBadges()
    {
        return $this->hasMany(AccountBadge::class);
    }
    // Accounts that have this badge
    public function accounts()
    {
         return $this->belongsToMany(Account::class, 'account_badges', 'badge_id', 'account_id')
                     ->withPivot('awarded_at'); // Include pivot table column
    }
}
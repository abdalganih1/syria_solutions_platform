<?php
// app/Models/AccountBadge.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AccountBadge extends Model
{
    use HasFactory;
    // This is a pivot-like table linking Accounts and Badges
    // Laravel automatically handles created_at/updated_at unless $timestamps is set to false.
    // Since we have awarded_at, you might set $timestamps = false; or remove timestamps() from migration
    public $timestamps = false; // Remove Laravel's default timestamps
    protected $fillable = [
        'account_id',
        'badge_id',
        'awarded_at',
    ];
    protected $casts = [
         'awarded_at' => 'datetime',
    ];
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    public function badge()
    {
        return $this->belongsTo(Badge::class);
    }
}
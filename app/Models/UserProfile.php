<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_id',
        'first_name',
        'last_name',
        'phone',
        'address_id',
        'bio',
    ];
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
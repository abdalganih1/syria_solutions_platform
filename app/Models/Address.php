<?php
// app/Models/Address.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'street_address',
        'city_id',
        'postal_code',
    ];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function userProfiles()
    {
        return $this->hasMany(UserProfile::class);
    }
    public function organizationProfiles()
    {
        return $this->hasMany(OrganizationProfile::class);
    }
}
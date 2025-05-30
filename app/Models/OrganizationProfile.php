<?php
// app/Models/OrganizationProfile.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OrganizationProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_id',
        'name',
        'address_id',
        'info',
        'website_url',
        'contact_email',
    ];
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    // Organization adopts Solutions (Comments)
    public function adoptedSolutions()
    {
        return $this->hasMany(Solution::class, 'adopting_organization_profile_id');
    }
     // Organization interests in Problem Categories
    public function categoryInterests()
    {
        return $this->belongsToMany(ProblemCategory::class, 'organization_category_interests', 'organization_profile_id', 'problem_category_id');
    }
}
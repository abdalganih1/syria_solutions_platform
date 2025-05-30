<?php
// app/Models/ProblemCategory.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProblemCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'parent_category_id',
    ];
    public function problems()
    {
        return $this->hasMany(Problem::class, 'category_id');
    }
    public function parent()
    {
        return $this->belongsTo(ProblemCategory::class, 'parent_category_id');
    }
    public function children()
    {
        return $this->hasMany(ProblemCategory::class, 'parent_category_id');
    }
    // Problems categories an Organization is interested in
    public function organizationInterests()
    {
        return $this->belongsToMany(OrganizationProfile::class, 'organization_category_interests', 'problem_category_id', 'organization_profile_id');
    }
}
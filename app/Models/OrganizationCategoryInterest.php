<?php
// app/Models/OrganizationCategoryInterest.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OrganizationCategoryInterest extends Model
{
    use HasFactory;
    // This is a pivot table for many-to-many relationship
    // Laravel expects pivot tables to not have an 'id' column by default,
    // and uses composite primary key. Our migration reflects this.
    // If using timestamps in the pivot table, set $timestamps = true; otherwise false.
    public $timestamps = true; // Set true if you kept timestamps() in migration
     protected $fillable = [
        'organization_profile_id',
        'problem_category_id',
    ];
     // Define the primary key columns for this model
     protected $primaryKey = ['organization_profile_id', 'problem_category_id'];
     public $incrementing = false; // Disable auto-incrementing ID
     protected $keyType = 'integer'; // Set key type if not integer (though FKs are integer here)

    public function organizationProfile()
    {
        return $this->belongsTo(OrganizationProfile::class);
    }
    public function problemCategory()
    {
        return $this->belongsTo(ProblemCategory::class);
    }
}
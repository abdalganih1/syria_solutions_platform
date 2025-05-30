<?php
// app/Models/Solution.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// استيراد الـ Enum الخاص بحالة الحل المعتمد
use App\Enums\AdoptedSolutionStatusEnum;
// استيراد الكلاس الخاص بـ Enum Cast من الحزمة
use BenSampo\Enum\Casts\EnumCast;
class Solution extends Model
{
    use HasFactory;
    // Note: Solution table now represents an adopted Comment
    protected $fillable = [
        'comment_id', // The adopted comment
        'adopting_organization_profile_id', // The organization that adopted it
        'status', // Status of the adoption/implementation process
        'organization_notes', // Notes from the organization
    ];
     protected $casts = [
        // هذا هو السطر الذي يحتاج إلى التعديل لاستخدام EnumCast
        // 'status' => EnumCast::class . ':' . AdoptedSolutionStatusEnum::class,
        'status' => 'string'
     ];
    public function adoptedComment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }
    public function adoptingOrganization()
    {
        return $this->belongsTo(OrganizationProfile::class, 'adopting_organization_profile_id');
    }
    // Convenience methods to access comment author and problem
    public function author()
    {
        return $this->adoptedComment->author();
    }
     public function problem()
    {
        return $this->adoptedComment->problem();
    }
}
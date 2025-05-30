<?php

namespace App\Policies;

use App\Models\Account; // استخدم نموذج الحساب الخاص بك
use App\Models\Problem;
use Illuminate\Auth\Access\Response;

class ProblemPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Account $account): bool
    {
        // يمكن لأي مستخدم مسجل دخول عرض قائمة المشاكل المنشورة
        // منطق العرض نفسه (فلترة المشاكل المنشورة) يتم في المتحكم
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Account $account, Problem $problem): bool
    {
        // يمكن لأي مستخدم مسجل دخول عرض مشكلة منشورة
        // يمكن تعديل هذا إذا كانت هناك حالات خاصة (مسودات للمالك، إلخ)
         return $problem->status === 'Published' || ($problem->status === 'Draft' && $account->id === $problem->submitted_by_account_id) || $account->isAdmin();
    }


     /**
     * Determine whether the user can create models.
     */
    public function create(Account $account): bool
    {
        // يمكن للأفراد والمنظمات إنشاء مشاكل
        // المسؤولين يمكنهم إنشاء مشاكل أيضاً (يمكن تعديل الشرط إذا كانوا لا يفعلون ذلك عبر الواجهة العادية)
        return in_array($account->account_type, ['individual', 'organization', 'admin']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Account $account, Problem $problem): bool
    {
        // يمكن للمستخدم تحديث المشكلة إذا كان هو صاحبها
        return $account->id === $problem->submitted_by_account_id;

        // ملاحظة: صلاحية المسؤول للتحكم بالمشاكل ستتم معالجتها في دالة before
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Account $account, Problem $problem): bool
    {
        // يمكن للمستخدم حذف المشكلة إذا كان هو صاحبها
        return $account->id === $problem->submitted_by_account_id;

        // ملاحظة: صلاحية المسؤول للحذف ستتم معالجتها في دالة before
    }

    // يمكنك إضافة المزيد من الدوال مثل forceDelete, restore إذا كانت منطقية لتطبيقك

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Account $account, Problem $problem): bool
    {
        // عادةً، فقط المسؤول يمكنه الحذف النهائي
        return $account->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Account $account, Problem $problem): bool
    {
        // عادةً، فقط المسؤول يمكنه استعادة مشكلة محذوفة (soft delete)
         return $account->isAdmin();
    }


     /**
     * Perform pre-authorization checks.
     * تسمح للمسؤول بتجاوز جميع الفحوصات الأخرى.
     * تُستدعى قبل أي دالة صلاحية أخرى في هذا Policy.
     */
    public function before(Account $account, string $ability): bool|null
    {
        // إذا كان المستخدم مسؤولاً، اسمح له بالقيام بأي شيء
        if ($account->isAdmin()) {
            return true;
        }

        // أرجع null للسماح للدالة المحددة (update, delete, etc.) بمعالجة الطلب
        return null;
    }
}
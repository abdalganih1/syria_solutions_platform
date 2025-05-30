<?php

namespace App\Http\Controllers;

use App\Models\OrganizationProfile;
use App\Models\Comment;
use App\Models\Solution; // نموذج الحل المعتمد
use App\Models\Account; // لجلب مؤلف التعليق لمنحه النقاط
use App\Models\ProblemCategory; // لإدارة اهتمامات الفئات
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class OrganizationController extends Controller
{
     // يجب تطبيق middleware 'isOrganization' على جميع دوال هذا المتحكم عبر المسارات أو في الدالة الإنشائية (__construct)

     public function __construct()
     {
        $this->middleware('isOrganization'); // هذا الـ middleware يجب أن تنشئه يدوياً (تحقق من نوع الحساب)
     }

    /**
     * Handle the action of an organization adopting a comment as a solution.
     */
    public function adoptComment(Request $request, Comment $comment)
    {
        // التأكد أن المستخدم الحالي هو منظمة
        $organizationAccount = Auth::user();
        if (!$organizationAccount->isOrganization() || !$organizationAccount->organizationProfile) {
             abort(403, 'Unauthorized action.'); // هذا يجب أن يتم بواسطة middleware 'isOrganization'
        }

        // التأكد من أن التعليق لم يتم اعتماده كحل بالفعل
        if ($comment->adoptedSolution) {
             return back()->with('error', 'This comment has already been adopted as a solution.');
        }

        // التأكد من أن التعليق ليس من تأليف نفس المنظمة (قاعدة عمل، يمكن تعديلها)
         if ($comment->author_account_id === $organizationAccount->id) {
             return back()->with('error', 'You cannot adopt your own comment as a solution.');
         }

        // الحصول على ملف المنظمة الحالي
        $organizationProfile = $organizationAccount->organizationProfile;

        // إنشاء سجل الحل المعتمد
        $solution = Solution::create([
            'comment_id' => $comment->id,
            'adopting_organization_profile_id' => $organizationProfile->id,
            'status' => 'UnderConsideration', // الحالة الأولية
            'organization_notes' => 'Comment adopted for review.', // ملاحظة أولية
        ]);

        // --- منح نقاط لمؤلف التعليق ---
        $authorAccount = Account::find($comment->author_account_id);
    if ($authorAccount) {
        $pointsToAdd = 100; // مثال: نقاط تمنح عند اعتماد تعليق كحل
        $authorAccount->points += $pointsToAdd;
        $authorAccount->save(); // حفظ النقاط الجديدة

        // --- هنا نستدعي الدالة للتحقق من الألقاب ومنحها ---
        $authorAccount->checkAndAwardBadges();
        // --- نهاية استدعاء الدالة ---
    }
         // --- نهاية منطق منح النقاط ---


        return redirect()->route('organization.showAdoptedSolution', $solution)
                     ->with('success', 'Comment adopted as a solution successfully! Points awarded to author.'); // يمكن تعديل الرسالة
    }

    /**
     * Display a listing of solutions adopted by the current organization.
     */
    public function listAdoptedSolutions()
    {
        $organizationAccount = Auth::user();
        $organizationProfile = $organizationAccount->organizationProfile;

        if (!$organizationProfile) {
             return redirect()->route('home')->with('error', 'Organization profile not found.');
        }

        // جلب الحلول المعتمدة من قبل هذه المنظمة، مع تحميل التعليق الأصلي والمشكلة
        $adoptedSolutions = Solution::where('adopting_organization_profile_id', $organizationProfile->id)
                                     ->with('adoptedComment.problem', 'adoptedComment.author.userProfile', 'adoptedComment.author.organizationProfile')
                                     ->latest()
                                     ->paginate(10);

        // ستنشئ الواجهة لاحقاً: resources/views/organization/adopted_solutions/index.blade.php
        return view('organization.adopted_solutions.index', compact('adoptedSolutions', 'organizationProfile'));
    }

    /**
     * Display the specified adopted solution for the organization.
     */
    public function showAdoptedSolution(Solution $solution)
    {
         $organizationAccount = Auth::user();

         // التأكد أن هذه المنظمة هي من اعتمدت هذا الحل
         if ($solution->adopting_organization_profile_id !== $organizationAccount->organizationProfile->id) {
             abort(403, 'Unauthorized action.');
         }

         // تحميل العلاقات اللازمة
         $solution->load('adoptedComment.problem', 'adoptedComment.author.userProfile', 'adoptedComment.author.organizationProfile');

        // ستنشئ الواجهة لاحقاً: resources/views/organization/adopted_solutions/show.blade.php
        return view('organization.adopted_solutions.show', compact('solution'));
    }


     /**
     * Update the status of the specified adopted solution.
     */
    public function updateAdoptedSolutionStatus(Request $request, Solution $solution)
    {
        $organizationAccount = Auth::user();

         // التأكد أن هذه المنظمة هي من اعتمدت هذا الحل
         if ($solution->adopting_organization_profile_id !== $organizationAccount->organizationProfile->id) {
             abort(403, 'Unauthorized action.');
         }

        $request->validate([
            'status' => ['required', Rule::in(['UnderConsideration', 'Adopted', 'ImplementationInProgress', 'ImplementationCompleted', 'RejectedByOrganization'])],
             'organization_notes' => 'nullable|string',
        ]);

        // تحديث الحالة والملاحظات
        $solution->update($request->only(['status', 'organization_notes']));

        return redirect()->route('organization.showAdoptedSolution', $solution)
                         ->with('success', 'Solution status updated successfully!');
    }

     /**
     * Show the form for editing organization category interests.
     */
    public function editCategoryInterests()
    {
        $organizationAccount = Auth::user();
        $organizationProfile = $organizationAccount->organizationProfile;

        if (!$organizationProfile) {
             return redirect()->route('home')->with('error', 'Organization profile not found.');
        }

        $allCategories = ProblemCategory::whereNull('parent_category_id')->with('children')->get(); // جلب الفئات الرئيسية مع الفئات الفرعية
        $organizationInterests = $organizationProfile->categoryInterests()->pluck('problem_category_id')->toArray(); // جلب معرّفات الفئات التي تهتم بها المنظمة حالياً

        // ستنشئ الواجهة لاحقاً: resources/views/organization/category_interests/edit.blade.php
        return view('organization.category_interests.edit', compact('organizationProfile', 'allCategories', 'organizationInterests'));
    }

     /**
     * Update organization category interests.
     */
    public function updateCategoryInterests(Request $request)
    {
        $organizationAccount = Auth::user();
        $organizationProfile = $organizationAccount->organizationProfile;

        if (!$organizationProfile) {
             return redirect()->route('home')->with('error', 'Organization profile not found.');
        }

        $request->validate([
            'categories' => 'nullable|array', // يجب أن يكون مصفوفة
            'categories.*' => 'exists:problem_categories,id', // كل عنصر في المصفوفة يجب أن يكون معرّف فئة موجود
        ]);

        $categoriesToSync = $request->input('categories', []); // الحصول على مصفوفة معرّفات الفئات المختارة

        // استخدام دالة sync() للربط في الجداول Pivot
        // هذه الدالة تحذف الارتباطات القديمة وتضيف الارتباطات الجديدة بناءً على المصفوفة المقدمة
        $organizationProfile->categoryInterests()->sync($categoriesToSync);

        return redirect()->route('organization.listAdoptedSolutions')->with('success', 'Category interests updated successfully!'); // يمكن التوجيه لصفحة أخرى مناسبة
    }
    
    // الدوال المتعلقة بـ SolutionController يمكن دمجها هنا أيضاً إذا أردت تبسيط الهيكل
    // أو بقاؤها في SolutionController إذا كان المنطق المشترك بين المنظمات والمسؤولين (مثلاً عرض الحلول لكل المنظمات) أكثر منطقية هناك.
}
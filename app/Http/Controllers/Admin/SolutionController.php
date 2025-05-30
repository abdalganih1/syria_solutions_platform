<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SolutionController extends Controller
{
     public function __construct()
     {
        $this->middleware('isAdmin');
         // $this->authorizeResource(Solution::class, 'solution'); // يمكن استخدامها لتطبيق policy
     }

    /**
     * Display a listing of the adopted solutions. (admin/solutions GET)
     */
    public function index() // اسم الدالة القياسي
    {
        $adoptedSolutions = Solution::with('adoptedComment.problem', 'adoptingOrganization.account', 'adoptedComment.author')
                                     ->latest('updated_at')
                                     ->paginate(20);
        // الواجهة: resources/views/admin/solutions/index.blade.php
        return view('admin.solutions.index', compact('adoptedSolutions'));
    }


    /**
     * Display the specified adopted solution. (admin/solutions/{solution} GET)
     */
    public function show(Solution $solution) // اسم الدالة القياسي, Model binding
    {
         $solution->load('adoptedComment.problem', 'adoptingOrganization.account', 'adoptedComment.author.userProfile', 'adoptedComment.author.organizationProfile');
        // الواجهة: resources/views/admin/solutions/show.blade.php
        return view('admin.solutions.show', compact('solution'));
    }

    /**
     * Update the specified adopted solution in storage. (admin/solutions/{solution} PUT)
     * ملاحظة: مسار edit غير موجود لهذا الـ resource، التعديل يتم مباشرة من صفحة show.
     */
    public function update(Request $request, Solution $solution) // Model binding
    {
         $request->validate([
            'status' => ['required', Rule::in(['UnderConsideration', 'Adopted', 'ImplementationInProgress', 'ImplementationCompleted', 'RejectedByOrganization'])],
             'organization_notes' => 'nullable|string',
        ]);

        $solution->update($request->only(['status', 'organization_notes']));

        // يمكن هنا إضافة منطق إضافي عند تغيير الحالة (مثلاً إرسال إشعار للمستخدم، أو تحديث حالة المشكلة المرتبطة)

        return redirect()->route('admin.solutions.index')->with('success', 'Adopted solution updated successfully.');
    }

    /**
     * Remove the specified adopted solution from storage. (admin/solutions/{solution} DELETE)
     */
    public function destroy(Solution $solution) // Model binding
    {
         // حذف الحل المعتمد لا يؤثر على التعليق الأصلي
        $solution->delete();

        return redirect()->route('admin.solutions.index')->with('success', 'Adopted solution deleted successfully.');
    }

    // الدوال create, store, edit ليست مطلوبة لهذا الـ resource
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Problem;
use App\Models\ProblemCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProblemController extends Controller
{
     public function __construct()
     {
        $this->middleware('isAdmin');
        // يمكنك إضافة policy هنا إذا أردت صلاحيات أدق
        // $this->authorizeResource(Problem::class, 'problem'); // يمكن استخدامها لتطبيق policy ProblemPolicy
     }

    /**
     * Display a listing of the problems. (admin/problems GET)
     */
    public function index() // اسم الدالة القياسي
    {
        $problems = Problem::with('submittedBy', 'category')->latest()->paginate(20);
        // الواجهة: resources/views/admin/problems/index.blade.php
        return view('admin.problems.index', compact('problems'));
    }

    /**
     * Show the form for editing the specified problem. (admin/problems/{problem}/edit GET)
     */
    public function edit(Problem $problem) // Model binding
    {
        $categories = ProblemCategory::all(); // لجلب الفئات في النموذج
        // الواجهة: resources/views/admin/problems/edit.blade.php
        return view('admin.problems.edit', compact('problem', 'categories'));
    }

    /**
     * Update the specified problem in storage. (admin/problems/{problem} PUT)
     */
    public function update(Request $request, Problem $problem) // Model binding
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:problem_categories,id',
            'urgency' => ['required', Rule::in(['Low', 'Medium', 'High'])],
            'status' => ['required', Rule::in(['Draft', 'Published', 'UnderReview', 'Hidden', 'Suspended', 'Resolved', 'Archived'])], // المسؤول يمكنه تغيير كل الحالات
            'tags' => 'nullable|string',
        ]);

        $problem->update($request->only(['title', 'description', 'category_id', 'urgency', 'status', 'tags']));

        return redirect()->route('admin.problems.index')->with('success', 'Problem updated successfully.');
    }

    /**
     * Remove the specified problem from storage. (admin/problems/{problem} DELETE)
     */
    public function destroy(Problem $problem) // Model binding
    {
         // يمكن إضافة فحص policy هنا إذا كنت تستخدمها
        // $this->authorize('delete', $problem);

        $problem->delete(); // حذف المشكلة وكل ما يتعلق بها (تعليقات، حلول معتمدة)

        return redirect()->route('admin.problems.index')->with('success', 'Problem deleted successfully.');
    }

    // الدوال create, store, show ليست مطلوبة لهذا الـ resource حسب تعريف routes/web.php
}
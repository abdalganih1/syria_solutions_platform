<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProblemCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
     public function __construct()
     {
        $this->middleware('isAdmin');
        // $this->authorizeResource(ProblemCategory::class, 'category'); // يمكن استخدامها لتطبيق policy
     }

    /**
     * Display a listing of the categories. (admin/categories GET)
     */
    public function index() // اسم الدالة القياسي
    {
        $categories = ProblemCategory::with('parent')->get(); // جلب الفئات وعلاقتها بالفئة الأم
        // الواجهة: resources/views/admin/categories/index.blade.php
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category. (admin/categories/create GET)
     */
    public function create() // اسم الدالة القياسي
    {
        $categories = ProblemCategory::all(); // لجلب الفئات الأم المحتملة
        // الواجهة: resources/views/admin/categories/create.blade.php
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created category in storage. (admin/categories POST)
     */
    public function store(Request $request) // اسم الدالة القياسي
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:problem_categories', // اسم فريد
            'description' => 'nullable|string',
            'parent_category_id' => 'nullable|exists:problem_categories,id', // التحقق من وجود الفئة الأم
        ]);

        ProblemCategory::create($request->only(['name', 'description', 'parent_category_id']));

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }


    /**
     * Show the form for editing the specified category. (admin/categories/{category}/edit GET)
     */
    public function edit(ProblemCategory $category) // Model binding
    {
         $categories = ProblemCategory::where('id', '!=', $category->id)->get(); // جلب الفئات الأخرى كآباء محتملين
        // الواجهة: resources/views/admin/categories/edit.blade.php
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified category in storage. (admin/categories/{category} PUT)
     */
    public function update(Request $request, ProblemCategory $category) // Model binding
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100', Rule::unique('problem_categories')->ignore($category->id)],
            'description' => 'nullable|string',
            // منع الفئة من أن تكون ابناً لنفسها أو لأحد أبنائها لمنع الحلقات (منطق معقد يحتاج Policy أو تحقق إضافي)
            'parent_category_id' => [
                'nullable',
                'exists:problem_categories,id',
                 // إضافة تحقق مخصص لمنع الفئة من أن تكون أبناً لنفسها أو أبنائها
                Rule::notIn([$category->id]), // منع أن تكون هي الفئة الأم
                // التحقق من الأبناء يتطلب منطقاً خاصاً، يمكن تركه بسيطاً مبدئياً
            ],
        ]);

        $category->update($request->only(['name', 'description', 'parent_category_id']));

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage. (admin/categories/{category} DELETE)
     */
    public function destroy(ProblemCategory $category) // Model binding
    {
         // ملاحظة: حذف فئة قد يتطلب تحديث المشاكل التي تنتمي إليها (مثلاً تعيين category_id إلى null أو حذف المشاكل)
         // بناءً على onDelete في الهجرة (في حالتنا cascade تحذف المشاكل)
         // إذا كانت onDelete('set null') في الهجرة، يجب التأكد من أن العمود nullable وأنك لا تحتاج لخطوات إضافية هنا

        $category->delete(); // حذف الفئة

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }

    // دالة show ليست مطلوبة لهذا الـ resource
}
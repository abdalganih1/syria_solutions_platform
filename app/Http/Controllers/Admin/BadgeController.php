<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BadgeController extends Controller
{
     public function __construct()
     {
        $this->middleware('isAdmin');
        // $this->authorizeResource(Badge::class, 'badge'); // يمكن استخدامها لتطبيق policy
     }

    /**
     * Display a listing of the badges. (admin/badges GET)
     */
    public function index() // اسم الدالة القياسي
    {
        $badges = Badge::all(); // لا حاجة لتقسيم الصفحات لعدد قليل من الألقاب عادةً
        // الواجهة: resources/views/admin/badges/index.blade.php
        return view('admin.badges.index', compact('badges'));
    }

    /**
     * Show the form for creating a new badge. (admin/badges/create GET)
     */
    public function create() // اسم الدالة القياسي
    {
        // الواجهة: resources/views/admin/badges/create.blade.php
        return view('admin.badges.create');
    }

    /**
     * Store a newly created badge in storage. (admin/badges POST)
     */
    public function store(Request $request) // اسم الدالة القياسي
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:badges', // اسم فريد
            'description' => 'nullable|string',
            'image_url' => 'nullable|string|max:255|url', // التحقق من أنه رابط صالح
            'required_points' => 'required|integer|min:0',
            'required_adopted_comments_count' => 'required|integer|min:0',
        ]);

        Badge::create($request->all()); // يمكن استخدام $request->only() أيضاً

        return redirect()->route('admin.badges.index')->with('success', 'Badge created successfully.');
    }

    /**
     * Show the form for editing the specified badge. (admin/badges/{badge}/edit GET)
     */
    public function edit(Badge $badge) // Model binding
    {
        // الواجهة: resources/views/admin/badges/edit.blade.php
        return view('admin.badges.edit', compact('badge'));
    }

    /**
     * Update the specified badge in storage. (admin/badges/{badge} PUT)
     */
    public function update(Request $request, Badge $badge) // Model binding
    {
        $request->validate([
             'name' => ['required', 'string', 'max:100', Rule::unique('badges')->ignore($badge->id)],
            'description' => 'nullable|string',
            'image_url' => 'nullable|string|max:255|url',
            'required_points' => 'required|integer|min:0',
            'required_adopted_comments_count' => 'required|integer|min:0',
        ]);

        $badge->update($request->all());

        return redirect()->route('admin.badges.index')->with('success', 'Badge updated successfully.');
    }

    /**
     * Remove the specified badge from storage. (admin/badges/{badge} DELETE)
     */
    public function destroy(Badge $badge) // Model binding
    {
         // يمكن إضافة فحص قبل الحذف إذا كان هناك AccountBadge مرتبط (حذف AccountBadge المرتبط قد يكون تلقائيًا بسبب onDelete)
        $badge->delete();

        return redirect()->route('admin.badges.index')->with('success', 'Badge deleted successfully.');
    }

    // دالة show ليست مطلوبة لهذا الـ resource
}
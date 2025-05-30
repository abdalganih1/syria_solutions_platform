<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problem; // لاستخدام نموذج المشكلة

class HomeController extends Controller
{
    /**
     * Display the home page with recent problems.
     */
    public function index()
    {
        // جلب أحدث المشاكل المنشورة
        $recentProblems = Problem::where('status', 'Published')
                                  ->latest() // ترتيب حسب الأحدث
                                  ->with('submittedBy', 'category') // جلب بيانات الناشر والفئة
                                  ->limit(10) // عرض 10 مشاكل مثلاً
                                  ->get();

        // إرجاع الواجهة (View) وتمرير البيانات إليها
        // ستنشئ هذا الملف لاحقاً: resources/views/home.blade.php
        return view('home', compact('recentProblems'));
    }
}
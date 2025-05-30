<?php

namespace App\Http\Controllers;

use App\Models\Account; // قد تحتاجها للإحصائيات في الداشبورد
use App\Models\Problem; // قد تحتاجها للإحصائيات
use App\Models\Comment; // قد تحتاجها للإحصائيات
use App\Models\Solution; // قد تحتاجها للإحصائيات
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // للتأكد من المستخدم في الـ middleware
// لا حاجة لاستيراد النماذج الأخرى مثل ProblemCategory, Badge هنا

class AdminController extends Controller
{
    // تطبيق middleware 'isAdmin' على جميع دوال هذا المتحكم
    public function __construct()
    {
       $this->middleware('isAdmin');
    }

    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        // جلب إحصائيات سريعة للمسؤول
        $accountsCount = Account::count();
        $problemsCount = Problem::count();
        $commentsCount = Comment::count();
        $adoptedSolutionsCount = Solution::count();

        // ستنشئ الواجهة لاحقاً: resources/views/admin/dashboard.blade.php
        return view('admin.dashboard', compact('accountsCount', 'problemsCount', 'commentsCount', 'adoptedSolutionsCount'));
    }

    // تم نقل جميع دوال إدارة الموارد الأخرى إلى متحكمات مخصصة في مجلد Admin
}
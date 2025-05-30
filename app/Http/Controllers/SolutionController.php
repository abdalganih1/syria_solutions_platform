<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    /**
     * Display a listing of all adopted solutions (potentially for admin or general viewing).
     */
    public function index()
    {
        // يمكن تصفية هذه القائمة للمسؤولين فقط أو عرضها بشكل عام
        // لنفترض هنا أنها لوحة عرض عامة للحلول الناجحة
        $adoptedSolutions = Solution::with('adoptedComment.problem', 'adoptingOrganization.account', 'adoptedComment.author.userProfile', 'adoptedComment.author.organizationProfile')
                                     // يمكن إضافة تصفية للحالة مثلاً 'ImplementationCompleted' أو 'Adopted'
                                     // ->where('status', 'ImplementationCompleted')
                                     ->latest('updated_at') // ترتيب حسب آخر تحديث للحالة
                                     ->paginate(15);

        // ستنشئ الواجهة لاحقاً: resources/views/solutions/index.blade.php
        return view('solutions.index', compact('adoptedSolutions'));
    }

    /**
     * Display the specified adopted solution.
     */
    public function show(Solution $solution)
    {
        // تحميل العلاقات اللازمة
        $solution->load('adoptedComment.problem', 'adoptingOrganization.account', 'adoptedComment.author.userProfile', 'adoptedComment.author.organizationProfile');

        // ستنشئ الواجهة لاحقاً: resources/views/solutions/show.blade.php
        return view('solutions.show', compact('solution'));
    }

    // يمكن إضافة دوال أخرى هنا إذا كانت هناك عمليات عامة على الحلول (غير خاصة بالمنظمة التي اعتمدتها)
    // إدارة الحالة أو الحذف ستكون في متحكم المسؤول
}
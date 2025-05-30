<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // لاستخدام Auth Facade
use Symfony\Component\HttpFoundation\Response;

class IsOrganization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // التحقق أولاً إذا كان المستخدم مسجل دخول
        if (!Auth::check()) {
            // إذا لم يكن مسجل دخول، قم بإعادة التوجيه إلى صفحة تسجيل الدخول أو عرض خطأ 403
             return redirect()->route('login'); // أو abort(403, 'Unauthorized.');
        }

        // التحقق إذا كان الحساب المسجل دخوله هو من نوع 'organization'
        if (Auth::user()->account_type !== 'organization') {
            // إذا لم يكن من نوع منظمة، عرض خطأ 403 ممنوع
            abort(403, 'Access Denied. Organizations only.');
        }

        // إذا كان مسجل دخول ومن نوع منظمة، استمر في معالجة الطلب
        return $next($request);
    }
}
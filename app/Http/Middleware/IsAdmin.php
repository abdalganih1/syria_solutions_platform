<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // لاستخدام Auth Facade
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
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
             return redirect()->route('login'); // أو abort(403, 'Unauthorized.');
        }

        // التحقق إذا كان الحساب المسجل دخوله هو من نوع 'admin'
        if (Auth::user()->account_type !== 'admin') {
            // إذا لم يكن من نوع مسؤول، عرض خطأ 403 ممنوع
            abort(403, 'Access Denied. Admins only.');
        }

        // إذا كان مسجل دخول ومن نوع مسؤول، استمر في معالجة الطلب
        return $next($request);
    }
}
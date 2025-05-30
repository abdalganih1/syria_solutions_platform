<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account; // استخدام نموذج الحساب المخصص
use App\Models\UserProfile; // لإنشاء ملف شخصي للمستخدم الفردي
use App\Models\OrganizationProfile; // لإنشاء ملف شخصي للمنظمة
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // لاستخدام نظام المصادقة في Laravel
use Illuminate\Validation\Rule; // لاستخدام قواعد التحقق المخصصة

class AuthController extends Controller
{
    // عرض نموذج التسجيل
    public function showRegistrationForm()
    {
        // ستنشئ هذا الملف لاحقاً: resources/views/auth/register.blade.php
        return view('auth.register');
    }

    // معالجة بيانات التسجيل
    public function register(Request $request)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:accounts'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // التحقق من أن account_type هي إحدى القيم المسموح بها
            'account_type' => ['required', 'string', Rule::in(['individual', 'organization'])],
            // يمكن إضافة قواعد تحقق إضافية هنا إذا كانت حقول ملفات التعريف إلزامية عند التسجيل
            // 'first_name' => Rule::requiredIf($request->account_type === 'individual'),
            // 'name' => Rule::requiredIf($request->account_type === 'organization'),
        ]);

        // إنشاء الحساب في جدول Accounts
        $account = Account::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'account_type' => $request->account_type,
            'is_active' => true, // تفعيل الحساب مباشرة
        ]);

        // إنشاء ملف التعريف المرتبط بناءً على نوع الحساب
        if ($account->account_type === 'individual') {
            UserProfile::create([
                'account_id' => $account->id,
                // يمكن ملء الحقول الإضافية هنا إذا كانت موجودة في نموذج التسجيل
            ]);
        } elseif ($account->account_type === 'organization') {
             OrganizationProfile::create([
                'account_id' => $account->id,
                'name' => $request->name ?? $account->username, // استخدام الاسم المقدم أو اسم المستخدم كاسم مبدئي للمنظمة
                // يمكن ملء الحقول الإضافية هنا
            ]);
        }

        // تسجيل دخول المستخدم تلقائياً بعد التسجيل
        Auth::login($account);

        // إعادة التوجيه إلى الصفحة الرئيسية أو صفحة الملف الشخصي
        return redirect()->route('home')->with('success', 'Account created successfully!');
    }

    // عرض نموذج تسجيل الدخول
    public function showLoginForm()
    {
         // إذا كان المستخدم مسجل دخول بالفعل، قم بإعادة توجيهه
        if (Auth::check()) {
            return redirect()->route('home');
        }
        // ستنشئ هذا الملف لاحقاً: resources/views/auth/login.blade.php
        return view('auth.login');
    }

    // معالجة بيانات تسجيل الدخول
    public function login(Request $request)
    {
        // التحقق من صحة البيانات
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // محاولة تسجيل الدخول باستخدام البريد الإلكتروني وكلمة المرور
        // هنا يستخدم Laravel Guards ونموذج User (الذي أعدنا تسميته Account)
        if (Auth::attempt($credentials, $request->remember)) {
            // التحقق مما إذا كان الحساب نشطاً
            if (!Auth::user()->is_active) {
                 Auth::logout(); // تسجيل الخروج إذا كان الحساب غير نشط
                 $request->session()->invalidate();
                 $request->session()->regenerateToken();
                 return back()->withErrors([
                    'email' => 'Your account is not active.',
                 ])->onlyInput('email');
            }

            $request->session()->regenerate();

            // إعادة التوجيه إلى الصفحة المقصودة أو الرئيسية
            return redirect()->intended(route('home'))->with('success', 'Logged in successfully!');
        }

        // في حالة فشل تسجيل الدخول
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // تسجيل الخروج
    public function logout(Request $request)
    {
        Auth::logout(); // تسجيل الخروج

        $request->session()->invalidate(); // إبطال الجلسة
        $request->session()->regenerateToken(); // إعادة توليد رمز CSRF

        return redirect('/')->with('success', 'Logged out successfully!'); // إعادة التوجيه إلى الصفحة الرئيسية
    }
}
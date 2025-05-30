<?php

namespace App\Http\Controllers\Admin; // لاحظ namespace

use App\Http\Controllers\Controller; // استيراد المتحكم الأساسي
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash; // إذا أردت إضافة تغيير كلمة مرور هنا

class AccountController extends Controller // لاحظ اسم الفئة
{
    public function __construct()
    {
        // تطبيق middleware 'isAdmin' على جميع دوال هذا المتحكم
        $this->middleware('isAdmin');
        // يمكنك إضافة policies هنا إذا أردت صلاحيات أدق للمسؤولين الفرعيين مثلاً
        // $this->authorizeResource(Account::class, 'account');
    }

    /**
     * Display a listing of the accounts. (admin/accounts GET)
     */
    public function index() // اسم الدالة القياسي
    {
        $accounts = Account::with('userProfile', 'organizationProfile')->paginate(20);
        // الواجهة: resources/views/admin/accounts/index.blade.php
        return view('admin.accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new account. (admin/accounts/create GET)
     * لم نضف مسار create/store لـ accounts في admin resource في routes/web.php
     * إذا احتجت هذه الميزة، يجب تفعيلها في routes/web.php وإضافة هذه الدالة ودالة store هنا.
     */
    // public function create() { }
    // public function store(Request $request) { }


    /**
     * Show the form for editing the specified account. (admin/accounts/{account}/edit GET)
     */
    public function edit(Account $account) // Model binding
    {
        $account->load('userProfile', 'organizationProfile'); // تحميل البيانات المرتبطة للواجهة
        // الواجهة: resources/views/admin/accounts/edit.blade.php
        return view('admin.accounts.edit', compact('account'));
    }

    /**
     * Update the specified account in storage. (admin/accounts/{account} PUT)
     */
    public function update(Request $request, Account $account) // Model binding
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', Rule::unique('accounts')->ignore($account->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('accounts')->ignore($account->id)],
            'account_type' => ['required', 'string', Rule::in(['individual', 'organization', 'admin'])],
            'points' => 'required|integer|min:0',
            'is_active' => 'boolean',
            // التحقق من حقول ملف التعريف سيحتاج منطقاً إضافياً هنا أو فصله
            // 'profile_name' => Rule::requiredIf($request->account_type !== 'individual'), // مثال
        ]);

        // تحديث حقول جدول Accounts
        $account->update($request->only(['username', 'email', 'account_type', 'points', 'is_active']));

        // هنا يمكن إضافة منطق لتحديث ملف التعريف المرتبط (UserProfile أو OrganizationProfile)
        // بناءً على نوع الحساب وبيانات الطلب

        return redirect()->route('admin.accounts.index')->with('success', 'Account updated successfully.');
    }

    /**
     * Remove the specified account from storage. (admin/accounts/{account} DELETE)
     */
    public function destroy(Account $account) // Model binding
    {
        // منع المسؤول من حذف حسابه الخاص من هذه الواجهة
        if (Auth::id() === $account->id) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        // تحذير: حذف حساب سيحذف كل شيء مرتبط به بسبب onDelete('cascade')
        $account->delete();

        return redirect()->route('admin.accounts.index')->with('success', 'Account deleted successfully.');
    }
}
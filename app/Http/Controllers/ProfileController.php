<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\UserProfile;
use App\Models\OrganizationProfile;
use App\Models\Address; // لاستخدام نموذج العنوان إذا تم تعديله
use App\Models\City; // لاستخدام نموذج المدينة
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a user or organization profile.
     */
   public function show(Account $account)
    {
        // تحميل العلاقة المناسبة (UserProfile أو OrganizationProfile)
        // تأكد من تحميل الألقاب أيضاً هنا
        $account->load('userProfile', 'organizationProfile', 'accountBadges.badge'); // العلاقة accountBadges محملة

        // تحديد نوع الملف الشخصي لعرض الواجهة المناسبة
        $profile = $account->isIndividual() ? $account->userProfile : $account->organizationProfile;

        if (!$profile) {
             // يمكن معالجة الحسابات التي لا تزال بدون ملف شخصي هنا،
             // مثلاً عرض رسالة أو إعادة التوجيه
             abort(404, 'Profile not found.');
        }

        // لا نحتاج لحساب الألقاب ومنحها هنا، فهذا يتم عند كسب النقاط أو زيارة صفحة الألقاب الخاصة بالمستخدم.
        // هنا فقط نعرض الألقاب الموجودة بالفعل في القاعدة.


        // ستنشئ الواجهة لاحقاً: resources/views/profiles/show.blade.php
        return view('profiles.show', compact('account', 'profile'));
    }

    /**
     * Show the form for editing the authenticated user's profile.
     */
    public function edit()
    {
        $account = Auth::user(); // الحساب المسجل دخوله
        $account->load('userProfile', 'organizationProfile');

        // تأكد من أن الحساب لديه ملف شخصي
        if (!$account->userProfile && !$account->organizationProfile) {
             return redirect()->route('home')->with('error', 'Your account does not have a profile.');
        }

        $profile = $account->isIndividual() ? $account->userProfile : $account->organizationProfile;
        $cities = City::all(); // لجلب المدن في نموذج العنوان

        // ستنشئ الواجهة لاحقاً: resources/views/profiles/edit.blade.php
        return view('profiles.edit', compact('account', 'profile', 'cities'));
    }

    /**
     * Update the authenticated user's profile in storage.
     */
    public function update(Request $request)
    {
        $account = Auth::user();
        $account->load('userProfile', 'organizationProfile');

        // تحديد قواعد التحقق بناءً على نوع الحساب
        if ($account->isIndividual()) {
            $profile = $account->userProfile;
            $rules = [
                'first_name' => 'nullable|string|max:100',
                'last_name' => 'nullable|string|max:100',
                'phone' => 'nullable|string|max:30',
                'bio' => 'nullable|string',
                'city_id' => 'nullable|exists:cities,id', // التحقق من وجود المدينة
                'street_address' => 'nullable|string|max:255',
                'postal_code' => 'nullable|string|max:20',
            ];
        } elseif ($account->isOrganization()) {
            $profile = $account->organizationProfile;
             $rules = [
                'name' => 'required|string|max:255',
                'info' => 'nullable|string',
                'website_url' => 'nullable|url|max:255',
                'contact_email' => 'nullable|email|max:255',
                'city_id' => 'nullable|exists:cities,id',
                'street_address' => 'nullable|string|max:255',
                'postal_code' => 'nullable|string|max:20',
            ];
        } else {
             // لن يسمح middleware 'auth' بوصول المسؤولين هنا عادةً، لكن من الجيد التحقق
             return redirect()->route('home')->with('error', 'Unauthorized profile update.');
        }

        // التحقق من صحة البيانات
        $request->validate($rules);

        // تحديث بيانات الملف الشخصي
        $profile->fill($request->except(['_token', '_method', 'city_id', 'street_address', 'postal_code']))->save();

        // تحديث أو إنشاء العنوان إذا تم تقديمه
        if ($request->filled('city_id')) {
            // البحث عن العنوان الحالي أو إنشاء عنوان جديد
            $address = $profile->address ?: new Address();
            $address->city_id = $request->city_id;
            $address->street_address = $request->street_address;
            $address->postal_code = $request->postal_code;
            $address->save();

            // ربط العنوان بملف التعريف إذا كان جديدًا
            if (!$profile->address_id) {
                $profile->address_id = $address->id;
                $profile->save();
            }
        } elseif ($profile->address) {
            // حذف العنوان إذا لم يتم تقديم بيانات عنوان جديدة وكان هناك عنوان سابق
             // $profile->address->delete(); // يمكن اختيار حذف العنوان أو لا
             // $profile->address_id = null;
             // $profile->save();
        }


        return redirect()->route('profiles.show', $account)->with('success', 'Profile updated successfully!');
    }

    /**
     * Display the authenticated user's badges.
     */
     public function showMyBadges()
     {
         $account = Auth::user();
         $account->checkAndAwardBadges();
         $account->load('accountBadges.badge'); // تحميل الألقاب التي حصل عليها الحساب

         $badges = $account->accountBadges; // collection of AccountBadge models

         // ستنشئ الواجهة لاحقاً: resources/views/profiles/my_badges.blade.php
         return view('profiles.my_badges', compact('account', 'badges'));
     }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\UserProfile; // نحتاج لإنشاء ملف شخصي للحسابات المحددة
use App\Models\OrganizationProfile; // نحتاج لإنشاء ملف شخصي للحسابات المحددة
use App\Models\Address; // نحتاج لربط ملفات التعريف بعناوين
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('accounts')->truncate(); // يمكن استخدام truncate إذا أردت إعادة التلقيم من الصفر تماماً في كل مرة

        $faker = Faker::create();
        $addresses = Address::all(); // جلب العناوين المتاحة لربطها بملفات التعريف

        if ($addresses->isEmpty()) {
             $this->command->warn('Addresses table is empty. Cannot create profiles for specific accounts. Run AddressesSeeder first.');
             // يمكنك هنا اختيار التوقف أو المتابعة بدون ملفات تعريف كاملة
             // For now, let's continue but note that profiles for specific accounts might be incomplete
        }

        // --- حسابات اختبار محددة لسهولة تسجيل الدخول ---

        // 1. حساب المدير
        $adminAccount = Account::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'username' => 'admin',
                'password' => Hash::make('password'), // كلمة المرور الافتراضية 'password'
                'account_type' => 'admin',
                'is_active' => true,
                'points' => 0, // نقطة بداية للمدير
            ]
        );
         $this->command->info("Created/found Admin account: " . $adminAccount->email);


        // 2. حساب مستخدم فردي محدد
        $individualAccount = Account::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'username' => 'testuser',
                'password' => Hash::make('password'), // كلمة المرور الافتراضية 'password'
                'account_type' => 'individual',
                'is_active' => true,
                'points' => 50, // نقطة بداية للمستخدم الاختبار
            ]
        );
         // إنشاء ملف التعريف المرتبط إذا لم يكن موجوداً
         if ($individualAccount->wasRecentlyCreated || !$individualAccount->userProfile) {
             UserProfile::firstOrCreate(
                 ['account_id' => $individualAccount->id],
                 [
                     'first_name' => 'Test',
                     'last_name' => 'User',
                     'phone' => $faker->phoneNumber,
                     'address_id' => $addresses->random()->id ?? null, // ربط بعنوان عشوائي أو null
                     'bio' => 'This is a test individual user account.',
                 ]
             );
         }
         $this->command->info("Created/found Individual account: " . $individualAccount->email);


        // 3. حساب منظمة محدد
         $organizationAccount = Account::firstOrCreate(
            ['email' => 'org@example.com'],
            [
                'username' => 'testorg',
                'password' => Hash::make('password'), // كلمة المرور الافتراضية 'password'
                'account_type' => 'organization',
                'is_active' => true,
                'points' => 100, // نقطة بداية للمنظمة الاختبار
            ]
        );
         // إنشاء ملف التعريف المرتبط إذا لم يكن موجوداً
         if ($organizationAccount->wasRecentlyCreated || !$organizationAccount->organizationProfile) {
             OrganizationProfile::firstOrCreate(
                 ['account_id' => $organizationAccount->id],
                 [
                     'name' => 'Test Organization',
                      'address_id' => $addresses->random()->id ?? null, // ربط بعنوان عشوائي أو null
                     'info' => 'This is a test organization account for testing purposes.',
                     'website_url' => $faker->url,
                     'contact_email' => $organizationAccount->email,
                 ]
             );
         }
        $this->command->info("Created/found Organization account: " . $organizationAccount->email);


        // --- حسابات عشوائية إضافية (للمستخدمين والمنظمات) ---

        // إنشاء بعض الحسابات الفردية العشوائية الإضافية
        $numberOfIndividuals = 30; // يمكن زيادة هذا العدد حسب الحاجة
        for ($i = 0; $i < $numberOfIndividuals; $i++) {
            $acc = Account::firstOrCreate(
                ['email' => $faker->unique()->safeEmail],
                [
                    'username' => $faker->unique()->userName,
                    'password' => Hash::make($faker->password), // كلمة مرور عشوائية لهم
                    'account_type' => 'individual',
                    'is_active' => true,
                    'points' => $faker->numberBetween(0, 500),
                ]
            );
             // إنشاء ملف تعريف لهم أيضاً
             if ($acc->wasRecentlyCreated || !$acc->userProfile) {
                 UserProfile::firstOrCreate(
                     ['account_id' => $acc->id],
                     [
                         'first_name' => $faker->firstName,
                         'last_name' => $faker->lastName,
                         'phone' => $faker->phoneNumber,
                         'address_id' => $addresses->random()->id ?? null,
                         'bio' => $faker->sentence,
                     ]
                 );
             }
        }
         $this->command->info("Created {$numberOfIndividuals} additional random individual accounts.");


        // إنشاء بعض حسابات المنظمات العشوائية الإضافية
        $numberOfOrganizations = 3; // يمكن زيادة هذا العدد حسب الحاجة
        for ($i = 0; $i < $numberOfOrganizations; $i++) {
             $acc = Account::firstOrCreate(
                ['email' => $faker->unique()->companyEmail],
                [
                    'username' => $faker->unique()->companySuffix . '_' . $faker->randomNumber(3),
                    'password' => Hash::make($faker->password), // كلمة مرور عشوائية لهم
                    'account_type' => 'organization',
                    'is_active' => true,
                    'points' => $faker->numberBetween(0, 1000),
                ]
            );
             // إنشاء ملف تعريف لهم أيضاً
             if ($acc->wasRecentlyCreated || !$acc->organizationProfile) {
                 OrganizationProfile::firstOrCreate(
                     ['account_id' => $acc->id],
                     [
                         'name' => $faker->unique()->company,
                         'address_id' => $addresses->random()->id ?? null,
                         'info' => $faker->catchPhrase . ' focused on ' . $faker->bs,
                         'website_url' => $faker->url,
                         'contact_email' => $acc->email,
                     ]
                 );
             }
        }
        $this->command->info("Created {$numberOfOrganizations} additional random organization accounts.");
    }
}
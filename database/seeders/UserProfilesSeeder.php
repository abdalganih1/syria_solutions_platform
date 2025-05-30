<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\UserProfile;
use App\Models\Address;
use Faker\Factory as Faker;

class UserProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('user_profiles')->truncate();
        $faker = Faker::create('ar_SY'); // حاول استخدام Faker للغة العربية السورية
        $individualAccounts = Account::where('account_type', 'individual')->get();
        $addresses = Address::all();

        if ($addresses->isEmpty()) {
             $this->command->info('Addresses table is empty. Please run AddressesSeeder first.');
             // يمكنك هنا إنشاء عناوين وهمية بسيطة إذا لم تكن موجودة
             // Example: $address = Address::factory()->create(['city_id' => City::inRandomOrder()->first()->id]);
             // Or just return and ask user to seed Addresses
             return;
        }

        foreach ($individualAccounts as $account) {
            // Check if profile already exists
            if (!$account->userProfile) {
                 UserProfile::create([
                    'account_id' => $account->id,
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'phone' => $faker->phoneNumber,
                    'address_id' => $addresses->random()->id, // ربط بعنوان عشوائي موجود
                    'bio' => $faker->sentence,
                ]);
            }
        }
        $this->command->info("Seeded user profiles.");
    }
}
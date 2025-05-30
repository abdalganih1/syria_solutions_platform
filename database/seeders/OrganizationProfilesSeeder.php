<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\OrganizationProfile;
use App\Models\Address;
use Faker\Factory as Faker;

class OrganizationProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('organization_profiles')->truncate();
        $faker = Faker::create();
        $organizationAccounts = Account::where('account_type', 'organization')->get();
        $addresses = Address::all();

         if ($addresses->isEmpty()) {
             $this->command->info('Addresses table is empty. Please run AddressesSeeder first.');
             return;
        }


        foreach ($organizationAccounts as $account) {
             // Check if profile already exists
            if (!$account->organizationProfile) {
                 OrganizationProfile::create([
                    'account_id' => $account->id,
                    'name' => $faker->unique()->company,
                    'address_id' => $addresses->random()->id, // ربط بعنوان عشوائي موجود
                    'info' => $faker->catchPhrase . ' focused on ' . $faker->bs,
                    'website_url' => $faker->url,
                    'contact_email' => $faker->unique()->companyEmail,
                ]);
            }
        }
        $this->command->info("Seeded organization profiles.");
    }
}
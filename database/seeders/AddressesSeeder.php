<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\City;
use Faker\Factory as Faker;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('addresses')->truncate();
        $faker = Faker::create('ar_SY'); // حاول استخدام Faker للغة العربية السورية إن أمكن
        $cities = City::all();

        if ($cities->isEmpty()) {
            $this->command->info('Cities table is empty. Please run CitiesSeeder first.');
            return;
        }

        $numberOfAddresses = 50; // عدد العناوين الوهمية التي تريد إنشاءها

        for ($i = 0; $i < $numberOfAddresses; $i++) {
            $city = $cities->random(); // اختر مدينة عشوائية

            Address::create([
                'street_address' => $faker->streetAddress,
                'city_id' => $city->id,
                'postal_code' => $faker->postcode,
            ]);
        }
         $this->command->info("Seeded {$numberOfAddresses} addresses.");
    }
}
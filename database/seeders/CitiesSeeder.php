<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Models\Country;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('cities')->truncate();

        $syria = Country::where('code', 'SY')->first();
        $turkey = Country::where('code', 'TR')->first();
        $lebanon = Country::where('code', 'LB')->first();
        $jordan = Country::where('code', 'JO')->first();
        $germany = Country::where('code', 'DE')->first();
        $egypt = Country::where('code', 'EG')->first();


        $cities = [];

        if ($syria) {
            $cities[] = ['name' => 'Damascus', 'country_id' => $syria->id];
            $cities[] = ['name' => 'Aleppo', 'country_id' => $syria->id];
            $cities[] = ['name' => 'Homs', 'country_id' => $syria->id];
            $cities[] = ['name' => 'Hama', 'country_id' => $syria->id];
            $cities[] = ['name' => 'Latakia', 'country_id' => $syria->id];
        }

        if ($turkey) {
             $cities[] = ['name' => 'Istanbul', 'country_id' => $turkey->id];
             $cities[] = ['name' => 'Gaziantep', 'country_id' => $turkey->id];
             $cities[] = ['name' => 'Mersin', 'country_id' => $turkey->id];
        }
         if ($lebanon) {
             $cities[] = ['name' => 'Beirut', 'country_id' => $lebanon->id];
        }
         if ($jordan) {
             $cities[] = ['name' => 'Amman', 'country_id' => $jordan->id];
        }
         if ($germany) {
             $cities[] = ['name' => 'Berlin', 'country_id' => $germany->id];
             $cities[] = ['name' => 'Munich', 'country_id' => $germany->id];
        }
         if ($egypt) {
             $cities[] = ['name' => 'Cairo', 'country_id' => $egypt->id];
        }

        foreach ($cities as $city) {
             // Check if city with the same name and country exists before creating
            $existingCity = City::where('name', $city['name'])
                                ->where('country_id', $city['country_id'])
                                ->first();
            if (!$existingCity) {
                 City::create($city);
            }
        }
    }
}
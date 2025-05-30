<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country; // تأكد من استخدام النموذج الصحيح

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // يمكنك مسح الجدول قبل الإضافة لتجنب التكرار إذا كنت تعيد تشغيل Seeder
        // DB::table('countries')->truncate(); // استخدم truncate بحذر في الإنتاج

        $countries = [
            ['name' => 'Syria', 'code' => 'SY'],
            ['name' => 'Turkey', 'code' => 'TR'],
            ['name' => 'Lebanon', 'code' => 'LB'],
            ['name' => 'Jordan', 'code' => 'JO'],
            ['name' => 'Germany', 'code' => 'DE'], // مثال لدولة في الخارج
            ['name' => 'Egypt', 'code' => 'EG'],
        ];

        foreach ($countries as $country) {
            Country::firstOrCreate(['code' => $country['code']], $country);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProblemCategory;
use Illuminate\Support\Facades\DB;

class ProblemCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('problem_categories')->truncate();

        // Main categories
        $infra = ProblemCategory::firstOrCreate(
            ['name' => 'Infrastructure'],
            ['description' => 'Problems related to buildings, roads, utilities, etc.']
        );
        $edu = ProblemCategory::firstOrCreate(
             ['name' => 'Education'],
             ['description' => 'Problems related to schools, universities, curriculum, etc.']
        );
        $health = ProblemCategory::firstOrCreate(
             ['name' => 'Health'],
             ['description' => 'Problems related to hospitals, clinics, medical supplies, etc.']
        );
        $economy = ProblemCategory::firstOrCreate(
             ['name' => 'Economy'],
             ['description' => 'Problems related to unemployment, poverty, businesses, etc.']
        );
        $env = ProblemCategory::firstOrCreate(
             ['name' => 'Environment'],
             ['description' => 'Problems related to pollution, waste management, natural resources, etc.']
        );
        $energy = ProblemCategory::firstOrCreate(
             ['name' => 'Energy'],
             ['description' => 'Problems related to electricity, fuel, renewable energy, etc.']
        );
         $social = ProblemCategory::firstOrCreate(
             ['name' => 'Social Issues'],
             ['description' => 'Problems related to social cohesion, displacement, community support, etc.']
        );


        // Subcategories (linking to parents)
        if ($infra) {
             ProblemCategory::firstOrCreate(
                ['name' => 'Roads & Bridges', 'parent_category_id' => $infra->id],
                ['description' => 'Problems related to transportation networks.']
            );
             ProblemCategory::firstOrCreate(
                 ['name' => 'Water & Sanitation', 'parent_category_id' => $infra->id],
                 ['description' => 'Problems related to clean water and sewage systems.']
            );
        }

        if ($edu) {
             ProblemCategory::firstOrCreate(
                 ['name' => 'School Buildings', 'parent_category_id' => $edu->id],
                 ['description' => 'Problems related to the physical state of schools.']
            );
        }
         if ($health) {
             ProblemCategory::firstOrCreate(
                 ['name' => 'Healthcare Access', 'parent_category_id' => $health->id],
                 ['description' => 'Problems related to getting medical help.']
            );
        }

         $this->command->info("Seeded problem categories.");

    }
}
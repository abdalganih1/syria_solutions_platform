<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrganizationProfile;
use App\Models\ProblemCategory;
use Illuminate\Support\Facades\DB; // استخدم DB Facade للجداول Pivot البسيطة

class OrganizationCategoryInterestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('organization_category_interests')->truncate(); // Use truncate with caution

        $organizations = OrganizationProfile::all();
        $categories = ProblemCategory::all();

        if ($organizations->isEmpty() || $categories->isEmpty()) {
            $this->command->info('Organization Profiles or Problem Categories table is empty. Please run previous seeders.');
            return;
        }

        $interestsToCreate = 15; // عدد الارتباطات بين المنظمات والفئات

        for ($i = 0; $i < $interestsToCreate; $i++) {
            $organization = $organizations->random();
            $category = $categories->random();

            try {
                 // Insert directly into the pivot table
                DB::table('organization_category_interests')->insert([
                    'organization_profile_id' => $organization->id,
                    'problem_category_id' => $category->id,
                    'created_at' => now(), // Add timestamps if they exist in migration
                    'updated_at' => now(), // Add timestamps if they exist in migration
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                // Catch unique constraint violation for the composite primary key
                 // $this->command->warn("Skipping duplicate interest for Org Profile ID: {$organization->id}, Category ID: {$category->id}");
                 continue; // Skip if duplicate
            }
        }
         $this->command->info("Seeded {$interestsToCreate} organization category interests.");
    }
}
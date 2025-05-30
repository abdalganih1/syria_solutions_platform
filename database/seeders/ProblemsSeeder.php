<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problem;
use App\Models\Account;
use App\Models\ProblemCategory;
use Faker\Factory as Faker;

class ProblemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('problems')->truncate();
        $faker = Faker::create('ar_SY'); // حاول استخدام Faker للغة العربية
        $submitters = Account::whereIn('account_type', ['individual', 'organization', 'admin'])->get();
        $categories = ProblemCategory::all();

        if ($submitters->isEmpty() || $categories->isEmpty()) {
            $this->command->info('Accounts or ProblemCategories table is empty. Please run previous seeders.');
            return;
        }

        $numberOfProblems = 30;

        for ($i = 0; $i < $numberOfProblems; $i++) {
            $submitter = $submitters->random();
            $category = $categories->random();

            Problem::create([
                'title' => $faker->sentence(mt_rand(5, 10)),
                'description' => $faker->paragraphs(mt_rand(2, 5), true),
                'submitted_by_account_id' => $submitter->id,
                'category_id' => $category->id,
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Published', 'Published', 'Published', 'UnderReview', 'Hidden']), // معظمها منشورة
                'tags' => implode(',', $faker->words(mt_rand(1, 5))),
            ]);
        }
        $this->command->info("Seeded {$numberOfProblems} problems.");
    }
}
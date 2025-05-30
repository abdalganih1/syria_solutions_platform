<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Badge;
use Illuminate\Support\Facades\DB;

class BadgesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('badges')->truncate();

        $badges = [
            [
                'name' => 'Novice Contributor',
                'description' => 'Earned by posting your first comment.',
                'image_url' => '/images/badges/novice.png', // مثال لمسار الصورة
                'required_points' => 10, // يحتاج 10 نقاط
                'required_adopted_comments_count' => 0, // ولا يحتاج تعليقات معتمدة
            ],
            [
                'name' => 'Rising Thinker',
                'description' => 'Awarded for reaching 100 points.',
                'image_url' => '/images/badges/rising_thinker.png',
                'required_points' => 100,
                'required_adopted_comments_count' => 0,
            ],
            [
                'name' => 'Problem Solver I',
                'description' => 'Earned when one of your comments is adopted as a solution.',
                'image_url' => '/images/badges/solver_1.png',
                'required_points' => 0, // لا يحتاج نقاط محددة
                'required_adopted_comments_count' => 1, // يحتاج تعليق واحد معتمد
            ],
            [
                'name' => 'Problem Solver II',
                'description' => 'Awarded when 3 of your comments are adopted as solutions.',
                'image_url' => '/images/badges/solver_2.png',
                'required_points' => 0,
                'required_adopted_comments_count' => 3,
            ],
             [
                'name' => 'Community Favorite',
                'description' => 'Given for receiving 50 upvotes across your comments.',
                'image_url' => '/images/badges/favorite.png',
                'required_points' => 50, // قد تربط النقاط بالUpvotes
                'required_adopted_comments_count' => 0,
            ],
        ];

        foreach ($badges as $badge) {
            Badge::firstOrCreate(['name' => $badge['name']], $badge);
        }
        $this->command->info("Seeded badges.");
    }
}
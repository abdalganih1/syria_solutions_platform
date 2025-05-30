<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Account;
use App\Models\Problem;
use Faker\Factory as Faker;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('comments')->truncate();
        $faker = Faker::create('ar_SY'); // حاول استخدام Faker للغة العربية
        $authors = Account::whereIn('account_type', ['individual', 'organization'])->get(); // المنظمات يمكن أن تعلق
        $problems = Problem::all();

        if ($authors->isEmpty() || $problems->isEmpty()) {
            $this->command->info('Accounts or Problems table is empty. Please run previous seeders.');
            return;
        }

        $numberOfCommentsPerProblem = 5;
        $replyChance = 0.3; // 30% chance to be a reply

        foreach ($problems as $problem) {
            $rootComments = []; // Store comments created for this problem to use as parents

            for ($i = 0; $i < $numberOfCommentsPerProblem; $i++) {
                $author = $authors->random();
                $parent_comment_id = null;

                // Decide if this comment is a reply and if there are parent comments available
                if (!empty($rootComments) && $faker->randomFloat(1, 0, 1) < $replyChance) {
                    $parent_comment_id = $faker->randomElement($rootComments)->id;
                }

                $comment = Comment::create([
                    'content' => $faker->paragraph(mt_rand(1, 3)),
                    'author_account_id' => $author->id,
                    'problem_id' => $problem->id,
                    'parent_comment_id' => $parent_comment_id,
                    'total_votes' => $faker->numberBetween(0, 50), // تصويتات عشوائية مبدئية
                ]);

                // If it's a root comment, add it to the list of potential parents
                if ($parent_comment_id === null) {
                    $rootComments[] = $comment;
                }
            }
        }
        $this->command->info("Seeded comments for {$problems->count()} problems.");
    }
}
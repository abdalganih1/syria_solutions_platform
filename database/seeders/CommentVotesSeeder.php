<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CommentVote;
use App\Models\Comment;
use App\Models\Account;
use Faker\Factory as Faker;

class CommentVotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('comment_votes')->truncate(); // Use truncate with caution
        $faker = Faker::create();
        $comments = Comment::all();
        $voters = Account::where('account_type', 'individual')->get(); // نفترض أن الأفراد هم من يصوتون بشكل أساسي

        if ($comments->isEmpty() || $voters->isEmpty()) {
            $this->command->info('Comments or Individual Accounts table is empty. Please run previous seeders.');
            return;
        }

        $votesPerComment = 5; // عدد متوسط من التصويتات لكل تعليق
        $voteValues = [-1, 1]; // القيم الممكنة للتصويت

        foreach ($comments as $comment) {
            $usedVoters = []; // لتجنب تكرار تصويت نفس المستخدم على نفس التعليق

            for ($i = 0; $i < $votesPerComment; $i++) {
                $voter = $voters->random();

                // Skip if this voter already voted on this comment in this seeding run
                if (in_array($voter->id, $usedVoters)) {
                    continue;
                }

                try {
                    CommentVote::create([
                        'comment_id' => $comment->id,
                        'voter_account_id' => $voter->id,
                        'vote_value' => $faker->randomElement($voteValues),
                    ]);
                    $usedVoters[] = $voter->id;
                } catch (\Illuminate\Database\QueryException $e) {
                    // Catch unique constraint violation if it happens despite checks
                    // This can happen if running multiple times without truncate or if logic is complex
                     // $this->command->warn("Skipping duplicate vote for Comment ID: {$comment->id} by Account ID: {$voter->id}");
                     continue; // Skip if duplicate vote constraint is violated
                }
            }
            // Optional: Update comment's total_votes after seeding votes for it
            // In a real app, this update should ideally happen via a database trigger
            // or a dedicated event/listener when a vote is cast.
            $comment->total_votes = $comment->votes()->sum('vote_value');
            $comment->save();
        }
        $this->command->info("Seeded comment votes and updated total_votes.");
    }
}
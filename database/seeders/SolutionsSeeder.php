<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Solution;
use App\Models\Comment;
use App\Models\OrganizationProfile;
use App\Models\Account; // Needed to find the author of the comment to give points
use Faker\Factory as Faker;

class SolutionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('solutions')->truncate();
        $faker = Faker::create();
        $comments = Comment::all();
        $organizations = OrganizationProfile::all();

        if ($comments->isEmpty() || $organizations->isEmpty()) {
            $this->command->info('Comments or Organization Profiles table is empty. Please run previous seeders.');
            return;
        }

        $numberOfAdoptedSolutions = 10; // عدد الحلول المعتمدة الوهمية

        $adoptedComments = []; // Keep track of comment IDs already adopted

        for ($i = 0; $i < $numberOfAdoptedSolutions; $i++) {
            // Find a comment that hasn't been adopted yet
            $comment = $comments->whereNotIn('id', $adoptedComments)->random();
            $organization = $organizations->random();

            if (!$comment) {
                $this->command->warn('Not enough unique comments to adopt.');
                break; // Stop if no more un-adopted comments are available
            }

            try {
                Solution::create([
                    'comment_id' => $comment->id,
                    'adopting_organization_profile_id' => $organization->id,
                    'status' => $faker->randomElement(['UnderConsideration', 'Adopted', 'ImplementationInProgress', 'ImplementationCompleted', 'RejectedByOrganization']),
                    'organization_notes' => $faker->sentence,
                ]);

                $adoptedComments[] = $comment->id; // Add to list of adopted comments

                // --- Logic to award points to the comment author (as per your project rules) ---
                $commentAuthor = Account::find($comment->author_account_id);
                if ($commentAuthor) {
                    $pointsToAdd = 50; // مثال: منح 50 نقطة عند اعتماد التعليق
                    $commentAuthor->points += $pointsToAdd;
                    $commentAuthor->save();
                    // $this->command->info("Awarded {$pointsToAdd} points to Account ID: {$commentAuthor->id} for adopted comment ID: {$comment->id}");
                }
                 // --- End of point awarding logic ---


            } catch (\Illuminate\Database\QueryException $e) {
                // Catch unique constraint violation if the same comment is somehow selected twice
                 // $this->command->warn("Skipping duplicate solution creation for Comment ID: {$comment->id}");
                 continue;
            }
        }
         $this->command->info("Seeded {$numberOfAdoptedSolutions} adopted solutions.");
    }
}
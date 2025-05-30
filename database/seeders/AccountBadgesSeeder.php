<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccountBadge;
use App\Models\Account;
use App\Models\Badge;
use Faker\Factory as Faker;

class AccountBadgesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('account_badges')->truncate();
        $faker = Faker::create();
        $accounts = Account::where('account_type', 'individual')->get(); // نفترض أن الأفراد هم من يحصلون على الألقاب
        $badges = Badge::all();

        if ($accounts->isEmpty() || $badges->isEmpty()) {
            $this->command->info('Accounts or Badges table is empty. Please run previous seeders.');
            return;
        }

        $numberOfBadgesToAward = 20; // عدد الألقاب الوهمية التي ستمنح

        for ($i = 0; $i < $numberOfBadgesToAward; $i++) {
            $account = $accounts->random();
            $badge = $badges->random();

            try {
                AccountBadge::create([
                    'account_id' => $account->id,
                    'badge_id' => $badge->id,
                    'awarded_at' => $faker->dateTimeBetween('-1 year', 'now'),
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                // Catch unique constraint violation (if account already has this badge)
                 // $this->command->warn("Skipping duplicate badge for Account ID: {$account->id}, Badge ID: {$badge->id}");
                 continue; // Skip this iteration if duplicate
            }
        }
        $this->command->info("Seeded {$numberOfBadgesToAward} account badges.");
    }
}
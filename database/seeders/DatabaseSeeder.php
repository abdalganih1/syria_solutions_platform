<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountriesSeeder::class,
            CitiesSeeder::class,
            AddressesSeeder::class, // Addresses need Cities
            ProblemCategoriesSeeder::class,
            AccountsSeeder::class, // Accounts needed for Profiles, Problems, Comments, Votes
            UserProfilesSeeder::class, // UserProfiles need Accounts and Addresses
            OrganizationProfilesSeeder::class, // OrganizationProfiles need Accounts and Addresses
            BadgesSeeder::class, // Badges are independent
            ProblemsSeeder::class, // Problems need Accounts and ProblemCategories
            CommentsSeeder::class, // Comments need Accounts and Problems
            CommentVotesSeeder::class, // CommentVotes need Accounts and Comments
            SolutionsSeeder::class, // Solutions need Comments and OrganizationProfiles
            AccountBadgesSeeder::class, // AccountBadges need Accounts and Badges
            OrganizationCategoryInterestsSeeder::class, // Needs OrganizationProfiles and ProblemCategories
        ]);
    }
}

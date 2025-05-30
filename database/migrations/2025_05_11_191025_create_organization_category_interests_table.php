<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('organization_category_interests', function (Blueprint $table) {
            $table->foreignId('organization_profile_id')->constrained('organization_profiles')->onDelete('cascade'); // ref: > OrganizationProfiles.id
            $table->foreignId('problem_category_id')->constrained('problem_categories')->onDelete('cascade'); // ref: > ProblemCategories.id
            $table->timestamps(); // Optional

            // Primary key for composite key
            $table->primary(['organization_profile_id', 'problem_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_category_interests');
    }
};

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
        Schema::create('solutions', function (Blueprint $table) {
            $table->id(); // pk, increment integer
            $table->foreignId('comment_id')->unique()->constrained('comments')->onDelete('cascade'); // unique, not null, ref: > Comments.id
            $table->foreignId('adopting_organization_profile_id')->constrained('organization_profiles')->onDelete('cascade'); // not null, ref: > OrganizationProfiles.id
            // Using string for ENUM: adopted_solution_status_enum { UnderConsideration, Adopted, ImplementationInProgress, ImplementationCompleted, RejectedByOrganization }
            $table->string('status')->default('UnderConsideration'); // not null, default 'UnderConsideration'
            $table->text('organization_notes')->nullable(); // text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solutions');
    }
};

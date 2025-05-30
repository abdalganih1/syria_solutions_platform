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
        Schema::create('problems', function (Blueprint $table) {
            $table->id(); // pk, increment integer
            $table->string('title', 255)->notNull(); // varchar(255), not null
            $table->text('description')->notNull(); // text, not null
            $table->foreignId('submitted_by_account_id')->constrained('accounts')->onDelete('cascade'); // not null, ref: > Accounts.id
            $table->foreignId('category_id')->constrained('problem_categories')->onDelete('cascade'); // not null, ref: > ProblemCategories.id
            // Using string for ENUM: problem_urgency_enum { Low, Medium, High }
            $table->string('urgency')->default('Medium'); // not null, default 'Medium'
             // Using string for ENUM: problem_status_enum { Draft, Published, UnderReview, Hidden, Suspended, Resolved, Archived }
            $table->string('status')->default('Published'); // not null, default 'Published'
            $table->text('tags')->nullable(); // text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problems');
    }
};

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
        Schema::create('problem_categories', function (Blueprint $table) {
            $table->id(); // pk, increment integer
            $table->string('name', 100)->unique(); // varchar(100), unique, not null
            $table->text('description')->nullable(); // text
            $table->foreignId('parent_category_id')->nullable()->constrained('problem_categories')->onDelete('set null'); // ref: > ProblemCategories.id (self-reference)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problem_categories');
    }
};

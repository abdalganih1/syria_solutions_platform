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
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // pk, increment integer
            $table->text('content')->notNull(); // text, not null
            $table->foreignId('author_account_id')->constrained('accounts')->onDelete('cascade'); // not null, ref: > Accounts.id
            $table->foreignId('problem_id')->constrained('problems')->onDelete('cascade'); // not null, ref: > Problems.id
            $table->foreignId('parent_comment_id')->nullable()->constrained('comments')->onDelete('cascade'); // ref: - Comments.id (self-reference), nullable
            $table->integer('total_votes')->default(0)->notNull(); // integer, default 0, not null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

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
        Schema::create('comment_votes', function (Blueprint $table) {
            $table->id(); // pk, increment integer
            $table->foreignId('comment_id')->constrained('comments')->onDelete('cascade'); // not null, ref: > Comments.id
            $table->foreignId('voter_account_id')->constrained('accounts')->onDelete('cascade'); // not null, ref: > Accounts.id
            $table->integer('vote_value')->notNull(); // integer, not null (+1 or -1)
            $table->timestamps(); // Using timestamps() for created_at/updated_at
            // Add unique constraint for composite key
            $table->unique(['comment_id', 'voter_account_id']);
             // Note: Add CHECK constraint in database for vote_value IN (1, -1)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_votes');
    }
};

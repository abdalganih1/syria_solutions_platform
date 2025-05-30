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
        Schema::create('account_badges', function (Blueprint $table) {
            $table->id(); // pk, increment integer
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade'); // not null, ref: > Accounts.id
            $table->foreignId('badge_id')->constrained('badges')->onDelete('cascade'); // not null, ref: > Badges.id
            $table->timestamp('awarded_at')->useCurrent(); // timestamp, not null, default current time
            // Add unique constraint for composite key
            $table->unique(['account_id', 'badge_id']);
            // No timestamps() here as awarded_at is sufficient
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_badges');
    }
};

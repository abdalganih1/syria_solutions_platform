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
        Schema::create('badges', function (Blueprint $table) {
            $table->id(); // pk, increment integer
            $table->string('name', 100)->unique(); // varchar(100), unique, not null
            $table->text('description')->nullable(); // text
            $table->string('image_url', 255)->nullable(); // varchar(255)
            $table->integer('required_adopted_comments_count')->default(0)->notNull(); // integer, default 0, not null
            $table->integer('required_points')->default(0)->notNull(); // integer, default 0, not null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};

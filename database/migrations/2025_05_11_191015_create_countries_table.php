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
        Schema::create('countries', function (Blueprint $table) {
            $table->id(); // pk, increment integer
            $table->string('name', 100)->unique(); // varchar(100), unique, not null
            $table->char('code', 2)->unique()->nullable(); // char(2), unique
            $table->timestamps(); // Optional timestamps for static data tables, but harmless
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};

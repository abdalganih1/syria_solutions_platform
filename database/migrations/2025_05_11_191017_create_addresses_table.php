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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id(); // pk, increment integer
            $table->string('street_address', 255)->nullable(); // varchar(255)
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade'); // not null, ref: > Cities.id
            $table->string('postal_code', 20)->nullable(); // varchar(20)
            $table->timestamps(); // Optional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};

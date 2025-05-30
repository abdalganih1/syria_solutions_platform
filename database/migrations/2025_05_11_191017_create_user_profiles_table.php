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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id(); // pk, increment integer
            $table->foreignId('account_id')->unique()->constrained('accounts')->onDelete('cascade'); // unique, not null, ref: > Accounts.id
            $table->string('first_name', 100)->nullable(); // varchar(100)
            $table->string('last_name', 100)->nullable(); // varchar(100)
            $table->string('phone', 30)->nullable(); // varchar(30)
            $table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('set null'); // ref: > Addresses.id
            $table->text('bio')->nullable(); // text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};

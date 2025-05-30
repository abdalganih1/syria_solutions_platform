<?php
// database/migrations/YYYY_MM_DD_HHMMSS_create_accounts_table.php

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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id(); // pk, increment integer
            $table->string('username')->unique(); // varchar(255), unique, not null
            $table->string('email')->unique(); // varchar(255), unique, not null
            // Laravel uses 'password' field name for authentication
            $table->string('password'); // varchar(255), not null (password_hash)
            // Using string for ENUM, will validate in application code
            $table->string('account_type'); // not null, enum: individual, organization, admin
            $table->integer('points')->default(0); // integer, default 0, not null
            $table->boolean('is_active')->default(true); // boolean, default true, not null

            // Default Laravel auth fields (optional but good practice if using auth features)
            $table->rememberToken();

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
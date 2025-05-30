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
        Schema::create('organization_profiles', function (Blueprint $table) {
            $table->id(); // pk, increment integer
            $table->foreignId('account_id')->unique()->constrained('accounts')->onDelete('cascade'); // unique, not null, ref: > Accounts.id
            $table->string('name', 255)->notNull(); // varchar(255), not null
            $table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('set null'); // ref: > Addresses.id
            $table->text('info')->nullable(); // text
            $table->string('website_url', 255)->nullable(); // varchar(255)
            $table->string('contact_email', 255)->nullable(); // varchar(255)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_profiles');
    }
};

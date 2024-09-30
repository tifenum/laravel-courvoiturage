<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contactdetails')->nullable(); // String field for contact details
            $table->string('password');
            $table->string('role')->nullable();
            $table->string('place')->nullable(); // Nullable: Only relevant for 'agence'
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes(); // Optional: For soft delete functionality
        });

        // Insert a default admin account
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'contactdetails' => '1234567890',
            'password' => Hash::make('123456789'), // Set a default password
            'role' => 'ADMIN', // Assign the role of admin
            'place' => null, // Set to null or a specific place if needed
            'email_verified_at' => now(), // Set as verified
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

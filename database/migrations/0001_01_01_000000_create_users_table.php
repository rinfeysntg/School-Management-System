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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');  // Changed to integer as 'age' should be a number
            $table->string('address');
            $table->string('username')->unique(); // Ensured username is unique
            $table->string('email')->unique();    // Ensured email is unique
            $table->string('password');
            $table->unsignedInteger('role_id'); // Use unsigned integer for role_id (mapping to role IDs)
            $table->timestamps(); // Added timestamps to track created and updated dates
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // Drop the users table if rollback occurs
    }
};

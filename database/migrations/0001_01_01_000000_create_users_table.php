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
            $table->integer('age');  
            $table->string('address');
            $table->string('username')->unique(); 
            $table->string('email')->unique();    
            $table->string('password')->default('SCHOOL-AUTOMATE');
            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('set null');
            $table->foreignId('course_id')->nullable()->constrained('courses')->onDelete('set null');
            $table->string('year_level')->nullable();
            $table->string('block')->nullable();
            $table->foreignId('role_id')->constrained('roles')->onDelete('set null');
            $table->timestamps(); 
            $table->integer('first_time_log_in')->default(1);
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

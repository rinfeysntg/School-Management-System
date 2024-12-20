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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id')->constrained('courses')->onDelete('set null');
            $table->string('year_level');
            $table->string('block');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('set null');
            $table->foreignId('user_id')->constrained('users')->onDelete('set null');
            $table->string('days_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

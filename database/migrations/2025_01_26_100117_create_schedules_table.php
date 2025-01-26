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
            $table->unsignedBigInteger('course_id')->nullable(); 
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');
            $table->string('year_level');
            $table->string('block');
            $table->unsignedBigInteger('subject_id')->nullable(); 
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('set null');
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('building_id')->nullable(); 
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('set null');
            $table->unsignedBigInteger('room_id')->nullable(); 
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('set null');
            $table->unsignedBigInteger('curriculum_id')->nullable(); 
            $table->foreign('curriculum_id')->references('id')->on('curriculums')->onDelete('set null');
            $table->string('days');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->timestamps();
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

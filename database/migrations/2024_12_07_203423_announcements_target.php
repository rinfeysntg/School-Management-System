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
        Schema::create('announcements_targets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('set null');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('set null');
            $table->foreignId('event_id')->constrained('events')->onDelete('set null');
            $table->foreignId('room_id')->constrained('rooms')->onDelete('set null');
            $table->foreignId('department_id')->constrained('departments')->onDelete('set null');
            $table->foreignId('user_id')->constrained('users')->onDelete('set null');
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

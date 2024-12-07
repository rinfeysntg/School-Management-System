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
            $table->integer('course_id')->constrained('courses')->onDelete('set null');
            $table->integer('subject_id')->constrained('subjects')->onDelete('set null');
            $table->integer('event_id')->constrained('events')->onDelete('set null');
            $table->integer('room_id')->constrained('rooms')->onDelete('set null');
            $table->integer('department_id')->constrained('departments')->onDelete('set null');
            $table->integer('user_id')->constrained('users')->onDelete('set null');
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

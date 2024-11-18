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
            $table->integer('course_id');
            $table->integer('subject_id');
            $table->integer('event_id');
            $table->integer('room_id');
            $table->integer('department_id');
            $table->integer('user_id');
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

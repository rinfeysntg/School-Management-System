<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Attendances extends Migration
{
    public function up()
    {
        // Check if the 'attendances' table already exists before creating it
        if (!Schema::hasTable('attendances')) {
            Schema::create('attendances', function (Blueprint $table) {
                $table->id();
                // Ensure the foreign key columns are unsignedBigInteger
                $table->unsignedBigInteger('student_id');
                $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
                
                $table->unsignedBigInteger('subject_id');
                $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
                
                $table->date('date');
                $table->enum('status', ['present', 'absent', 'late']);
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        // Drop the 'attendances' table if it exists
        Schema::dropIfExists('attendances');
    }
}


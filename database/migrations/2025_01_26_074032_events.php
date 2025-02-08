<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('event_date');
            $table->time('event_time')->nullable();
            $table->string('year_level');
            $table->string('block');
            
            // Foreign key for course
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('cascade'); // Cascade delete for course
            
            // Foreign key for department
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')
                ->references('id')->on('departments')
                ->onDelete('cascade'); // Cascade delete for department
            
            // Add indexes on foreign keys for performance
            $table->index('course_id');
            $table->index('department_id');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

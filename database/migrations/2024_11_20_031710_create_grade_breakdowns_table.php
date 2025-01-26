<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_breakdowns', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Student name
            $table->integer('attendance'); // Attendance percentage
            $table->integer('quizzes'); // Quizzes percentage
            $table->integer('assignments'); // Assignments percentage
            $table->integer('exams'); // Exams percentage
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade_breakdowns');
    }
};

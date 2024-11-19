<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsEnrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_enrollment', function (Blueprint $table) {
            $table->id(); // Primary key column
            $table->string('name'); // Student name column
            $table->string('status')->default('not_enrolled'); // Enrollment status column, defaulting to 'not_enrolled'
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
        Schema::dropIfExists('students_enrollment'); // Drop the table if rolling back the migration
    }
}

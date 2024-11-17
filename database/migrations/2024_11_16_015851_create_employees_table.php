<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role'); // e.g., "teacher", "staff", etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee');
    }
}

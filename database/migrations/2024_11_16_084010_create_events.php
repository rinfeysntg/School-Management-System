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
        $table->date('date');
        $table->string('year_level');
        $table->string('block');
        $table->unsignedBigInteger('course_id');
        $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        $table->unsignedBigInteger('department_id');
        $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('events');
}

};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
            Schema::create('activities', function (Blueprint $table) {
                $table->id(); 
                $table->string('name'); 
                $table->integer('score'); 
                $table->integer('max_score'); 
                $table->unsignedBigInteger('student_id'); 
                $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
                $table->unsignedBigInteger('prof_id'); 
                $table->foreign('prof_id')->references('id')->on('users')->onDelete('cascade');
                $table->unsignedBigInteger('subject_id'); 
                $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade'); 
                $table->integer('grade');             
                $table->timestamps(); 
            });
    }


    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};

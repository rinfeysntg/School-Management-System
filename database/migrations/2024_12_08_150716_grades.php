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
        Schema::create('grade', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); 
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('prof_id'); 
            $table->foreign('prof_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('final_grade', 5, 2)->nullable();
            $table->integer('final_point')->nullable();
            $table->string('term');
            $table->year('year');
            $table->timestamps();
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

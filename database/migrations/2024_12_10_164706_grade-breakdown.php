<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up()
    {
        Schema::create('grade_percentages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade'); 
            $table->decimal('quiz_percentage', 5, 2);  
            $table->decimal('exam_percentage', 5, 2); 
            $table->decimal('assignment_percentage', 5, 2);  
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grade_percentages');
    }
};

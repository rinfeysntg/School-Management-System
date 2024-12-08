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
        Schema::create('activity_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id'); 
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->integer('grade');
            $table->decimal('percentage', 5, 2); // Percentage weight of this activity in the grade
            $table->decimal('grade_acquired', 5, 2); // Grade acquired for this activity
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_grades');
    }
};

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
        // Ensure curriculums table exists before creating the subjects table
        if (Schema::hasTable('curriculums')) {
            Schema::create('subjects', function (Blueprint $table) {
                $table->id();
                $table->string('code');
                $table->string('name');
                $table->longText('description')->nullable();
                // curriculum_id matches the referenced column type in curriculums table
                $table->unsignedBigInteger('curriculum_id');
                // Foreign key constraint
                $table->foreign('curriculum_id')->references('id')->on('curriculums')->onDelete('cascade');
                $table->timestamps();
            });
        } else {
            // Handle the case when the curriculums table does not exist
            throw new \Exception("The curriculums table does not exist. Please run the curriculums migration first.");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Corrected to plural table name
        Schema::dropIfExists('subjects');
    }
};

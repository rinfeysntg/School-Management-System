<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Check if the table exists
        if (!Schema::hasTable('event_attendances')) {
            // Create the table if it doesn't exist
            Schema::create('event_attendances', function (Blueprint $table) {
                // Setting the engine to InnoDB for foreign key support
                $table->engine = 'InnoDB';
                
                // Primary key for the table
                $table->id();
                
                // Foreign keys for event_id and student_id
                $table->unsignedBigInteger('event_id');
                $table->unsignedBigInteger('student_id');
                
                // Timestamp for when the student attended the event
                $table->timestamp('attended_at');
                
                // Timestamps for record tracking (created_at, updated_at)
                $table->timestamps();
                
                // Define foreign keys with cascade on delete
                $table->foreign('event_id')
                    ->references('id')
                    ->on('events')
                    ->onDelete('cascade');
                    
                $table->foreign('student_id')
                    ->references('id')
                    ->on('students')
                    ->onDelete('cascade');
            });
        }
    }

    // Rollback method (if needed)
    public function down()
    {
        Schema::dropIfExists('event_attendances');
    }
};

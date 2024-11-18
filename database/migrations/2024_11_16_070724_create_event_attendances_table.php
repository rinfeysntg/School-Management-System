<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   // Example for creating the event_attendances table
   public function up()
   {
       if (!Schema::hasTable('event_attendances')) {
           Schema::create('event_attendances', function (Blueprint $table) {
               $table->id();
               $table->unsignedBigInteger('event_id');
               $table->unsignedBigInteger('student_id');
               $table->timestamp('attended_at');
               $table->timestamps();
   
               $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
               $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
           });
       }
   }
   

    
};

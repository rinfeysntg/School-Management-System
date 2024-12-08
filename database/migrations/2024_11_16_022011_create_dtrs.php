<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtrs extends Migration

{
    public function up()
{
    if (!Schema::hasTable('dtrs')) {
        Schema::create('dtrs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('date');
            $table->time('time_in');
            $table->time('time_out')->nullable();
            $table->timestamps();
        });
    }
}
}

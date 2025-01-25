<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDtrsTableV2 extends Migration
{
    public function up()
    {
        // Check if the table doesn't exist before creating
        if (!Schema::hasTable('dtrs')) {
            Schema::create('dtrs', function (Blueprint $table) {
                $table->id();
                // Foreign key for employee_id
                $table->foreignId('employee_id')->constrained()->onDelete('cascade');
                // Automatically set the current date
                $table->date('date')->default(DB::raw('CURRENT_DATE'));
                // Use timestamp for time_in and time_out to capture exact time
                $table->timestamp('time_in')->nullable(); // Time of entry
                $table->timestamp('time_out')->nullable(); // Time of exit
                $table->timestamps(); // Created and updated timestamps
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('dtrs');
    }
}

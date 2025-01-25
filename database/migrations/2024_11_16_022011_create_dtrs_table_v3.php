<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDtrsTableV3 extends Migration
{
    public function up()
    {
        // Check if the table doesn't already exist
        if (!Schema::hasTable('dtrs')) {
            Schema::create('dtrs', function (Blueprint $table) {
                $table->id();
                // Foreign key for employee_id
                $table->foreignId('employee_id')->constrained()->onDelete('cascade');
                // Default date to the current date
                $table->date('date')->default(DB::raw('CURRENT_DATE'));
                // Automatically capture time_in when logging in
                $table->timestamp('time_in')->useCurrent();
                // Nullable time_out for when the employee logs out later
                $table->timestamp('time_out')->nullable();
                $table->timestamps(); // created_at and updated_at
            });
        }
    }

    public function down()
    {
        // Drop the table if it exists
        Schema::dropIfExists('dtrs');
    }
}

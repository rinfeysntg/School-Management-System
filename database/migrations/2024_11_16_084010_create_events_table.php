<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Drop the foreign key constraints if any exist (replace 'event_attendances_event_id_foreign' with your actual constraint names)
        DB::statement('SET foreign_key_checks = 0;'); // Disable foreign key checks to drop the table if it already exists
        Schema::dropIfExists('events'); // Drop the events table if it exists already
        DB::statement('SET foreign_key_checks = 1;'); // Re-enable foreign key checks

        // Create the events table
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        // Drop the events table in case of rollback
        Schema::dropIfExists('events');
    }
};


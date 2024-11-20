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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('rate');
            $table->unsignedInteger('role_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        chema::dropIfExists('positions'); // Drop the positions table if rollback occurs
    }
};

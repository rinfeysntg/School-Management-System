<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('events', function (Blueprint $table) {
        $table->date('date')->nullable()->change();  // Make 'date' nullable
    });
}

public function down()
{
    Schema::table('events', function (Blueprint $table) {
        $table->date('date')->nullable(false)->change();  // Revert the change
    });
}

};

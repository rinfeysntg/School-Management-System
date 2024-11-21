<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFinalGradeToGradeBreakdownsTable extends Migration
{
    public function up()
    {
        Schema::table('grade_breakdowns', function (Blueprint $table) {
            $table->integer('final_grade')->nullable();  // Adjust type as needed
        });
    }

    public function down()
    {
        Schema::table('grade_breakdowns', function (Blueprint $table) {
            $table->dropColumn('final_grade');
        });
    }
}

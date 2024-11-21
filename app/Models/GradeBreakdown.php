<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeBreakdown extends Model
{
    use HasFactory;

    // Define the table associated with the model (if it's different from the plural of the model name)
    protected $table = 'grade_breakdowns';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'name', 'attendance', 'quizzes', 'assignments', 'exams', 'final_grade'
    ];
}

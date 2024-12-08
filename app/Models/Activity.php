<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'score',
        'max_score',
        'subject_id',
        'student_id', // Student ID
        'prof_id', // Professor ID
    ];

    public function activityGrades()
    {
        return $this->hasMany(ActivityGrade::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function student()
    {
        return $this->belongsTo(Users::class, 'student_id');
    }

    public function professor()
    {
        return $this->belongsTo(Users::class, 'prof_id');
    }
}

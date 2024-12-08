<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', // Student ID
        'final_grade',
        'final_point',
        'term',
        'year',
        'prof_id', // Professor ID
    ];

    public function student()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function professor()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}

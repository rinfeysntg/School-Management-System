<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'year_level', 
        'block', 
        'subject_id',
        'user_id',
        'days_time'
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }
    
    public function subject() {
        return $this->belongsTo(Subject::class);
    }
    
    public function user() {
        return $this->belongsTo(Users::class);
    }
}

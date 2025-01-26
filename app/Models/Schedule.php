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
        'days',
        'start_time',
        'end_time',
        'curriculum_id',
        'building_id',
        'room_id'
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

    public function curriculum() {
        return $this->belongsTo(Curriculum::class);
    }

    public function building() {
        return $this->belongsTo(Building::class);
    }
    public function room() {
        return $this->belongsTo(Room::class);
    }
}

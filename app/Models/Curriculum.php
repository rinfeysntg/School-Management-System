<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 
        'name', 
        'user_id',
        'course_id'
    ];
    protected $table = 'curriculums';
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'curriculum_subject');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
                                                //                  for course
    public function course()                                             
    {
    return $this->belongsTo(Course::class);
    }   

    public function user()                                             
    {
    return $this->belongsTo(Users::class, 'user_id');
    } 
}

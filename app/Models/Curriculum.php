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
        'program_head',
        'course_id'
    ];
    protected $table = 'curriculums';
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
                                                //                  for course
    public function course()                                             
    {
    return $this->belongsTo(Course::class);
    }   
}

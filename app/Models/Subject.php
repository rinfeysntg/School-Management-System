<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'name', 
        'description', 
        'curriculum_id'
    ];

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }

    public function announcements()
    {
        return $this->morphMany(Announcement::class, 'target');
    }

    public function gradePercentage()
    {
        return $this->hasMany(GradePercentage::class, 'subject_id');
    }
}


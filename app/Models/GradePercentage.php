<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradePercentage extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id', 'quiz_percentage', 'exam_percentage', 'assignment_percentage'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}

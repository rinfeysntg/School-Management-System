<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityGrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'grade_id',
        'percentage',
        'grade_acquired',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}

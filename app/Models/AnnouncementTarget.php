<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementTarget extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'subject_id', 'event_id', 'department_id', 'user_id'];

    public function announcements()
    {
        return $this->morphMany(Announcement::class, 'target');
    }
}

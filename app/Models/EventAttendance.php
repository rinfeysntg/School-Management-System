<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAttendance extends Model
{
    use HasFactory;

    
    protected $table = 'event_attendances';


    protected $fillable = ['event_id', 'student_id', 'attended_at'];


    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id'); 
    }


    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function setAttendedAtAttribute($value)
    {
        $this->attributes['attended_at'] = \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function hasAttended($eventId, $studentId)
    {
        return $this->where('event_id', $eventId)
                    ->where('student_id', $studentId)
                    ->exists();
    }
}

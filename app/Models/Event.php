<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',         
        'event_date',    
        'event_time',
        'department_id',
        'course_id',
        'year_level',
        'block',      
    ];

    
    protected $casts = [
        'event_date' => 'date',            
        'event_time' => 'datetime:H:i',   
    ];

    
    public function eventAttendances()
    {
        return $this->hasMany(EventAttendance::class);
    }

    
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

  
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    
    public function students()
    {
        return $this->belongsToMany(Users::class, 'event_attendances', 'event_id', 'student_id')
                    ->withPivot('status')  
                    ->withTimestamps();
    }

    
    public function getFormattedEventDateAttribute()
    {
        return $this->event_date 
            ? $this->event_date->format('F j, Y') 
            : 'Not Set';
    }

    
    public function getFormattedEventTimeAttribute()
    {
        return $this->event_time 
            ? $this->event_time->format('H:i') 
            : 'Not Set';
    }

    
    public function setEventTimeAttribute($value)
    {

        $this->attributes['event_time'] = $value 
            ? Carbon::createFromFormat('H:i', $value)->format('H:i')
            : null;
    }


    public function setEventDateAttribute($value)
    {

        $this->attributes['event_date'] = $value 
            ? Carbon::parse($value)->toDateString()
            : null;
    }


    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>', Carbon::now());
    }


    public function scopePast($query)
    {
        return $query->where('event_date', '<', Carbon::now());
    }


    public function isUpcoming()
    {
        return $this->event_date->isFuture();
    }


    public function isPast()
    {
        return $this->event_date->isPast();
    }

    public function announcements()
    {
        return $this->morphMany(Announcement::class, 'target');
    }

    public function hasUserAttended($userId)
    {
        return $this->students()->where('user_id', $userId)->exists();
    }
}

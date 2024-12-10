<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    /**
     * Specify the fillable attributes.
     */
    protected $fillable = [
        'name',          // Event name
        'event_date',    // Event date
        'event_time',
        'department_id',
        'course_id',
        'year_level',
        'block',      
    ];

    /**
     * Automatically cast attributes to specific data types.
     */
    protected $casts = [
        'event_date' => 'date',            // Ensures 'event_date' is a Carbon instance
        'event_time' => 'datetime:H:i',   // Ensures 'event_time' is a datetime formatted as "HH:mm"
    ];

    /**
     * Define the relationship between Event and EventAttendance.
     * An event can have many event attendances.
     */
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

    /**
     * Define the relationship between Event and Student.
     * A student can attend many events through event attendance.
     */
    public function students()
    {
        return $this->belongsToMany(Users::class, 'event_attendances')
                    ->withTimestamps(); 
    }

    /**
     * Accessor for the formatted event date.
     *
     * @return string
     */
    public function getFormattedEventDateAttribute()
    {
        return $this->event_date 
            ? $this->event_date->format('F j, Y') // Example: "January 1, 2024"
            : 'Not Set';
    }

    /**
     * Accessor for the formatted event time.
     *
     * @return string
     */
    public function getFormattedEventTimeAttribute()
    {
        return $this->event_time 
            ? $this->event_time->format('H:i') // Example: "14:30"
            : 'Not Set';
    }

    /**
     * Mutator to ensure 'event_time' is stored in a consistent format.
     *
     * @param mixed $value
     */
    public function setEventTimeAttribute($value)
    {
        // Ensure event_time is in the "HH:mm" format
        $this->attributes['event_time'] = $value 
            ? Carbon::createFromFormat('H:i', $value)->format('H:i')
            : null;
    }

    /**
     * Mutator to ensure 'event_date' is stored in a consistent format.
     *
     * @param mixed $value
     */
    public function setEventDateAttribute($value)
    {
        // Ensure event_date is in the "YYYY-MM-DD" format
        $this->attributes['event_date'] = $value 
            ? Carbon::parse($value)->toDateString()
            : null;
    }

    /**
     * Define the scope for upcoming events (filters events that have not yet occurred).
     * Example usage: Event::upcoming()->get()
     */
    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>', Carbon::now());
    }

    /**
     * Define the scope for past events (filters events that have already occurred).
     * Example usage: Event::past()->get()
     */
    public function scopePast($query)
    {
        return $query->where('event_date', '<', Carbon::now());
    }

    /**
     * Define a helper method to check if an event is in the future.
     * Example usage: $event->isUpcoming()
     */
    public function isUpcoming()
    {
        return $this->event_date->isFuture();
    }

    /**
     * Define a helper method to check if an event is in the past.
     * Example usage: $event->isPast()
     */
    public function isPast()
    {
        return $this->event_date->isPast();
    }

    public function announcements()
    {
        return $this->morphMany(Announcement::class, 'target');
    }

    public function attendees()
    {
    return $this->belongsToMany(Users::class);
    }
    
}

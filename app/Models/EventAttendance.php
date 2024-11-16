<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAttendance extends Model
{
    use HasFactory;

    // Define the table name (optional if it matches plural form of model name)
    protected $table = 'event_attendances';

    // Specify which columns can be mass-assigned
    protected $fillable = ['event_id', 'student_id', 'attended_at'];

    /**
     * Get the event that this attendance belongs to.
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id'); // Foreign key is 'event_id'
    }

    /**
     * Get the student that this attendance belongs to.
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id'); // Foreign key is 'student_id'
    }
}


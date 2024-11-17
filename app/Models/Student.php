<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'name',  // Name of the student
        'email', // Email of the student (ensure it's unique)
    ];

    /**
     * Define the relationship between students and attendance.
     * A student can have many attendance records.
     */
    public function attendance()
    {
        return $this->hasMany(Attendance::class); // A student can have many attendance records
    }

    /**
     * Define the relationship between students and event attendances.
     * A student can attend many events.
     */
    public function eventAttendances()
    {
        return $this->hasMany(EventAttendance::class); // A student can have many event attendances
    }

    /**
     * Optionally, if you want to return a student's full name or other combined attributes.
     */
    public function getFullNameAttribute()
    {
        return $this->name;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Model
{
    use HasFactory;
    public $timestamps =false;

    protected $fillable = [
        'name', 
        'age', 
        'address', 
        'username', 
        'email', 
        'password', 
        'department_id', 
        'course_id', 
        'year_level', 
        'block', 
        'role_id'
    ];

    public function role()
{
    return $this->belongsTo(Role::class);
}

    public function department()
{
    return $this->belongsTo(Department::class, 'department_id');
}

    public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}

    public function enrollments()
{
    return $this->hasMany(Enrollment::class);
}
    public function announcements()
{
    return $this->morphMany(Announcement::class, 'target');
}

    public function schedule()
{
    return $this->hasMany(Schedule::class, 'user_id');
}

    public function dtrs()
{
    return $this->hasMany(Dtr::class);
}

    public function payments()
{
    return $this->hasMany(Payment::class); 
}

}

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
    return $this->belongsTo(Role::class, 'role_id');
}

    public function department()
{
    return $this->belongsTo(Department::class, 'department_id');
}

    public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}

}

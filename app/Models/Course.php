<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public $timestamps=false;
    
    protected $fillable = [
        'name',
        'description',
        'department_id',
    ];

    public function department()                                             
    {
    return $this->belongsTo(Department::class);
    } 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Define the fillable columns (adjust as needed)
    protected $fillable = [
        'code',
        'name', 
        'description', 
        'curriculum_id'
    ];
}
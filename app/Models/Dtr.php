<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtr extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date',
        'time_in',
        'time_out',
    ];

    // Define the relationship with the Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

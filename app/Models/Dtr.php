<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtr extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'employee_id',
        'date',  // The date is set automatically in the migration
        'time_in',  // Automatically set in the controller
        'time_out',  // Can be set later
    ];

    // Automatically cast time_in and time_out to datetime instances
    protected $casts = [
        'time_in' => 'datetime',  // Ensure that time_in is treated as a datetime instance
        'time_out' => 'datetime', // Ensure that time_out is treated as a datetime instance
    ];

    // Define the relationship with the Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

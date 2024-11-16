<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if the table name is plural form of model)
    protected $table = 'subjects';

    // Define the fillable attributes for mass assignment
    protected $fillable = ['name']; // assuming the subject table has a 'name' column
}

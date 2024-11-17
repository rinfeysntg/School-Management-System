<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'role',
    ];

    // Define the relationship with the Dtr model
    public function dtrs()
    {
        return $this->hasMany(Dtr::class);
    }
}

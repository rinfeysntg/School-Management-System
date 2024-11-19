<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'date_start',
        'date_end',
        'amount',
        'deductions',
        'user_id'
    ];
}

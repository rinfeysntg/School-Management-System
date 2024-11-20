<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'id',
        'purpose',
        'amount',
        'receipt',
        'user_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    use HasFactory;
    protected $fillable = [
        'id',
        'purpose',
        'amount',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class); 
    }
}

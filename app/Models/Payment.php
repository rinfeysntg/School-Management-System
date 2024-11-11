<?php
use App\Models\Payment;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Specify the fields that are mass assignable
    protected $fillable = [
        'user_id',
        'amount',
        'schedule',
        'status',
    ];

    // Add any relationships, accessors, or other methods as needed
}

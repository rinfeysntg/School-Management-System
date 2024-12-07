<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date', 'target_type', 'target_id', 'message'];

    public function target()
    {
        return $this->morphTo();
    }

}
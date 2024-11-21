<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Model
{
    use HasFactory;
    public $timestamps =false;

    public function role()
{
    return $this->belongsTo(Role::class);
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
  
    protected $fillable = ['name', 'description', 'building_id'];

    public function building()                                             
    {
    return $this->belongsTo(Building::class);
    } 

    public function announcements()
    {
        return $this->morphMany(Announcement::class, 'target');
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

}

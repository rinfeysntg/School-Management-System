<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Role;
use App\Models\Department;
use App\Models\Course;
use App\Models\Schedule;

class Professor extends Controller
{
    public function index()
    {

        return view('professor');
    }

    public function profSchedule() 
    {
        $user = session('user'); 


        $schedules = Schedule::with(['course', 'subject'])
        ->where('id', $user->id) 
        ->get();

        return view('professor.professor_sched', compact('schedules'));
    }
}
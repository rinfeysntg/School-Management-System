<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Role;
use App\Models\Department;
use App\Models\Course;
use App\Models\Schedule;

class Students extends Controller
{
    public function index()
    {
        return view('student');
    }

    
    public function enrollmentForm()
    {

        $currentUser = session('user');
    

        $user = Users::where('name', $currentUser->name)->first();
    

        $enrollment = $user->enrollments()->where('status', 'Enrolled')->first();
    

        $status = $enrollment ? 'Enrolled' : 'Not Enrolled';
    

        return view('student.enrollment_students', compact('user', 'status'));
    }

    public function studentProfile() 
    {
        $user = session('user');
        $student = Users::with(['role', 'department', 'course'])
                            ->where('id', $user->id)
                            ->firstOrFail();

        return view('student.profile', compact('student'));
    }

    public function studentSchedule() 
    {
        $user = session('user');

        $schedules = Schedule::with(['course', 'subject', 'user'])
        ->where('course_id', $user->course_id)
        ->where('year_level', $user->year_level)
        ->where('block', $user->block)
        ->whereHas('course', function ($query) use ($user) {
            $query->where('department_id', $user->department_id);
        })
        ->get();

    return view('student.student_sched', compact('schedules'));
    }
    
}

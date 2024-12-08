<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Role;
use App\Models\Department;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Activity;

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

    public function studentAnnouncement()
{
    $user = session('user'); 

    $announcements = Announcement::where(function ($query) use ($user) {
        $query->where(function ($subQuery) use ($user) {
            $subQuery->where('target_type', 'student')
                ->where('target_id', $user->id);
        })
        ->orWhere(function ($subQuery) use ($user) {
            $subQuery->where('target_type', 'course')
                ->where('target_id', $user->course_id);
        })
        ->orWhere(function ($subQuery) use ($user) {
            $subQuery->where('target_type', 'department')
                ->where('target_id', $user->department_id);
        })
        ->orWhere(function ($subQuery) use ($user) {
            $subQuery->where('target_type', 'subject')
                ->whereIn('target_id', function ($scheduleQuery) use ($user) {
                    $scheduleQuery->select('subject_id') 
                        ->from('schedules')
                        ->where('user_id', $user->id);
                });
        });
    })
    ->get();

    return view('announcements.studentview', compact('announcements'));
}

public function studentActivities()
{
    $user = session('user');

    $activities = Activity::where('student_id', $user->id)
        ->with(['subject']) 
        ->get();

    return view('student.activities', compact('activities'));
}
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Role;
use App\Models\Department;
use App\Models\Course;

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
    
    
}

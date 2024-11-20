<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Students extends Controller
{
    public function index()
    {

        return view('student.student_dashboard');
    }

    public function enrollmentForm()
    {

        $currentUser = session('user');
    

        $user = User::where('name', $currentUser->name)->first();
    

        $enrollment = $user->enrollments()->where('status', 'Enrolled')->first();
    

        $status = $enrollment ? 'Enrolled' : 'Not Enrolled';
    

        return view('student.enrollment_students', compact('user', 'status'));
    }
    
    
}

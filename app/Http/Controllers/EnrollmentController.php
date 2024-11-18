<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\User;

class EnrollmentController extends Controller
{
    public function enroll()
    {
        
        $users = User::where('role_id', 7)
            ->whereDoesntHave('enrollments', function ($query) {
                $query->where('status', 'Enrolled');
            })
            ->get();
        
        return view('enrollment', compact('users'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id', 
            'status' => 'required|string',
        ]);

        Enrollment::create([
            'user_id' => $validated['user_id'], 
            'status' => $validated['status'],
            'enrollment_date' => now(),       
        ]);

        return redirect()->route('enrollmentDashboard')->with('success', 'Student enrolled successfully!');
    }
}

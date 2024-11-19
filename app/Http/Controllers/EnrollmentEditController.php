<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class EnrollmentEditController extends Controller
{
    // Show the edit enrollment form
    public function edit($id)
    {
        // Fetch the specific enrollment by ID
        $enrollment = Enrollment::findOrFail($id);
        
        // Fetch all users for the dropdown
        $users = User::all();
        
        // Return the view and pass necessary data
        return view('enrollment.enrollmentEdit');
    }

    // Handle updating the enrollment
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:NotEnrolled,Enrolled',
        ]);

        // Find the enrollment and update the data
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->user_id = $validated['user_id'];
        $enrollment->status = $validated['status'];
        $enrollment->save();

        return redirect()->route('enrollDashboard')->with('success', 'Enrollment Status Updated');
    }
}




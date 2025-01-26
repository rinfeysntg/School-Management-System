<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Users;
use Illuminate\Http\Request;

class EnrollmentEditController extends Controller
{

    public function edit($id)
    {

        $enrollment = Enrollment::findOrFail($id);
        

        $users = Users::all();
        

        return view('enrollment.enrollmentEdit');
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:NotEnrolled,Enrolled',
        ]);


        $enrollment = Enrollment::findOrFail($id);
        $enrollment->user_id = $validated['user_id'];
        $enrollment->status = $validated['status'];
        $enrollment->save();

        return redirect()->route('enrollDashboard')->with('success', 'Enrollment Status Updated');
    }
}




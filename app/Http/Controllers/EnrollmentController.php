<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Users;

class EnrollmentController extends Controller
{
    public function enroll()
    {
        $users = Users::where('role_id', 7)
            ->whereDoesntHave('enrollments', function ($query) {
                $query->where('status', 'Enrolled');
            })
            ->get();

        return view('enrollment.enrollment', compact('users'));
    }

    public function searchUsers(Request $request)
    {
        $search = $request->input('search', '');

        $users = Users::where('name', 'LIKE', "%$search%")
                    ->orWhere('id', 'LIKE', "%{$search}%")->get();

        return response()->json($users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
            ];
        }));
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

        return redirect()->route('enrollDashboard')->with('success', 'Student enrolled successfully!');
    }

    public function showEnrollmentTable()
    {
        Enrollment::where('status', 'Not Enrolled')->delete();

        $enrollments = Enrollment::with('user')->get();

        return view('enrollment.enrollmentTable', compact('enrollments'));
    }

    public function showNotEnrollmentTable()
    {
        $users = Users::where('role_id', 7)
            ->whereDoesntHave('enrollments')
            ->get();

        return view('enrollment.enrollmentTableNot', compact('users'));
    }

    public function edit(Enrollment $enrollment)
    {
        return view('enrollment.enrollmentEditTable', compact('enrollment'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $enrollment->update($request->all());
        return redirect()->route('enrollmentTable')->with('success', 'Enrollment updated successfully!');
    }
}

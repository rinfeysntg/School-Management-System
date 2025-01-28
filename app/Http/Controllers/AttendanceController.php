<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Users;
use App\Models\Subject;
use App\Models\Schedule;
use App\Models\Event;
use App\Models\EventAttendance;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('attendance.attendance');  // Loads the main attendance page with buttons
    }

    public function studentDashboard()
    {
        $user = session('user'); 

        $attendance = Attendance::where('student_id', $user->id)->get();

        $total = $attendance->count();
        $present = $attendance->where('status', 'present')->count();
        $absent = $attendance->where('status', 'absent')->count();
        $late = $attendance->where('status', 'late')->count();

        return view('attendance.student-dash', compact('attendance', 'total', 'present', 'absent', 'late'));
    }

    public function teacherDashboard(Request $request)
    {
        $user = session('user'); 

        $schedules = Schedule::where('user_id', $user->id)->get();

        $subjects = Subject::whereIn('id', $schedules->pluck('subject_id'))->get();
        
        $students = Users::where('role_id', 7)->get();

        if ($request->has('subject_id') && $request->subject_id != '') {
            $attendance = Attendance::with('student')
                ->where('subject_id', $request->subject_id)
                ->whereIn('subject_id', $schedules->pluck('subject_id'))
                ->get();
        } else {
            $attendance = Attendance::with('student')
                ->whereIn('subject_id', $schedules->pluck('subject_id'))
                ->get();
        }    

        return view('attendance.teacher-dash', compact('students', 'attendance', 'schedules','subjects'));
    }
    
    public function create()
    {
        $user = session('user');

        $schedules = Schedule::where('user_id', $user->id)->get();

        $subjects = Subject::whereIn('id', $schedules->pluck('subject_id'))->get();

        $students = Users::where('role_id', 7) 
                        ->get();

        return view('attendance.create', compact('students', 'schedules', 'subjects'));
    }

    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'student_id' => 'required|exists:users,id',
        'subject_id' => 'required|exists:subjects,id',
        'date' => 'required|date',
        'status' => 'required|in:present,absent,late',
    ]);

    // Check if the student already has an attendance record for the same subject and date
    $existingAttendance = Attendance::where('student_id', $request->student_id)
                                    ->where('subject_id', $request->subject_id)
                                    ->where('date', $request->date)
                                    ->first();

    if ($existingAttendance) {
        // Return with an error message if the record already exists
        return back()->withErrors(['duplicate' => 'Attendance for this student on this date and subject already exists.']);
    }

    // Create a new attendance record if no duplicate is found
    Attendance::create([
        'student_id' => $request->student_id,
        'subject_id' => $request->subject_id,
        'date' => $request->date,
        'status' => $request->status,
    ]);

    return redirect()->route('teacher.dashboard')->with('success', 'Attendance record created successfully!');
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

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $students = Users::where('role_id', 7)->get();
        $subjects = Subject::all(); 

        return view('attendance.edit', compact('attendance', 'students', 'subjects')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:present,absent,late',
        ]);
    
        $attendance = Attendance::findOrFail($id);
    
        $attendance->update([
            'status' => $request->status,
        ]);
    
        return redirect()->route('teacher.dashboard')->with('success', 'Attendance record updated successfully!');
    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('teacher.dashboard')->with('success', 'Attendance record deleted successfully!');
    }

}

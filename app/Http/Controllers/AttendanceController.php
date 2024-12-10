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

        $students = Users::where('role_id', 6)->get();

        if ($request->has('subject_id') && $request->subject_id != '') {
            $attendance = Attendance::with('student')
                ->where('subject_id', $request->subject_id) // Filter by the selected subject
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

        $students = Users::where('role_id', 6) 
                        ->get();

        return view('attendance.create', compact('students', 'schedules', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id', 
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late',
        ]);

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
        $students = Users::where('role_id', 6)->get();
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

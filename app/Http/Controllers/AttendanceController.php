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

        $students = Users::where('role_id', 7) 
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

    public function createEventForm()
    {
        return view('attendance.events.create-event');  
    }

    public function storeEvent(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date', 
            'event_time' => 'required|date_format:H:i', 
        ]);

        Event::create([
            'name' => $request->event_name,
            'event_date' => $request->event_date, 
            'event_time' => $request->event_time,  
        ]);

        return redirect()->route('attendance.events.list')->with('success', 'Event created successfully!');
    }

    public function eventAttendanceForm($eventId)
    {
        $event = Event::findOrFail($eventId); 
        return view('attendance.events.create-event', compact('event')); 
    }

    public function storeEventAttendance(Request $request, $eventId)
    {
        $request->validate([
            'attended_at' => 'required|date',
            'time_in' => 'required|date_format:H:i',
            'time_out' => 'nullable|date_format:H:i|after:time_in',
        ]);

        EventAttendance::create([
            'event_id' => $eventId,
            'student_id' => auth()->id(), 
            'attended_at' => $request->attended_at,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
        ]);

        return redirect()->route('attendance.events.create')->with('success', 'Event attendance logged successfully!');
    }

    public function eventAttendees($eventId)
    {
        $event = Event::findOrFail($eventId); 
        $attendees = EventAttendance::where('event_id', $eventId)->get();  

        return view('attendance.events.attendees', compact('event', 'attendees'));  
    }

    public function eventList()
    {
        $events = Event::all();  
        return view('attendance.events.list', compact('events'));  
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Event;
use App\Models\EventAttendance;

class AttendanceController extends Controller
{
    // Show the attendance page with buttons for Student and Teacher
    public function index()
    {
        return view('attendance.attendance');  // Loads the main attendance page with buttons
    }

    // Show the student dashboard (read-only view)
    public function studentDashboard()
    {
        $studentId = auth()->id(); // Ensure a student is authenticated
        $attendance = Attendance::where('student_id', $studentId)->get();

        // Calculate attendance summary
        $total = $attendance->count();
        $present = $attendance->where('status', 'present')->count();
        $absent = $attendance->where('status', 'absent')->count();
        $late = $attendance->where('status', 'late')->count();

        return view('attendance.student-dash', compact('attendance', 'total', 'present', 'absent', 'late'));
    }

    // Show the teacher dashboard (with CRUD functionality)
    public function teacherDashboard()
    {
        // Fetch all students and attendance records
        $students = Student::all();
        $attendance = Attendance::with('student')->get(); // Include student info

        return view('attendance.teacher-dash', compact('students', 'attendance'));
    }

    // Display the form for creating a new attendance record
    public function create()
    {
        $students = Student::all(); // Fetch all students
        $subjects = Subject::all(); // Fetch all subjects

        return view('attendance.create', compact('students', 'subjects')); // Pass subjects to the view
    }

    // Store a new attendance record
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id', // Validate subject selection
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late',
        ]);

        // Create the attendance record
        Attendance::create([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id, // Store subject_id
            'date' => $request->date,
            'status' => $request->status,
        ]);

        // Redirect to teacher dashboard with success message
        return redirect()->route('attendance.teacherDashboard')->with('success', 'Attendance record created successfully!');
    }

    // Edit an attendance record
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $students = Student::all(); // Fetch all students
        $subjects = Subject::all(); // Fetch all subjects

        return view('attendance.edit', compact('attendance', 'students', 'subjects')); // Pass subjects to the view
    }

    // Update an attendance record
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id', // Validate subject selection
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late',
        ]);

        // Find and update the attendance record
        $attendance = Attendance::findOrFail($id);
        $attendance->update([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id, // Update subject_id
            'date' => $request->date,
            'status' => $request->status,
        ]);

        // Redirect to teacher dashboard with success message
        return redirect()->route('attendance.teacherDashboard')->with('success', 'Attendance record updated successfully!');
    }

    // Delete an attendance record
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendance.teacherDashboard')->with('success', 'Attendance record deleted successfully!');
    }

    // Show the form for creating a new event (Teacher view)
    public function createEventForm()
    {
        return view('attendance.events.create-event');  // Make sure this view exists
    }

    // Store a new event (Teacher submits the event creation form)
    public function storeEvent(Request $request)
    {
        // Validate the event creation request
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date', // Ensure valid date format
            'event_time' => 'required|date_format:H:i', // Ensure valid time format
        ]);

        // Store the new event
        Event::create([
            'name' => $request->event_name,
            'event_date' => $request->event_date,  // Ensure the correct attribute name 'event_date'
            'event_time' => $request->event_time,  // Ensure the correct attribute name 'event_time'
        ]);

        // Redirect to the event list or event creation page with success message
        return redirect()->route('attendance.events.list')->with('success', 'Event created successfully!');
    }

    // Show the form for logging event attendance (time-in and time-out)
    public function eventAttendanceForm($eventId)
    {
        $event = Event::findOrFail($eventId); // Retrieve the event by ID
        return view('attendance.events.create-event', compact('event')); // Use create-event blade view
    }

    // Store event attendance (student logs time-in and time-out for events)
    public function storeEventAttendance(Request $request, $eventId)
    {
        // Validate the incoming request
        $request->validate([
            'attended_at' => 'required|date',
            'time_in' => 'required|date_format:H:i',
            'time_out' => 'nullable|date_format:H:i|after:time_in', // Ensure time-out is after time-in
        ]);

        // Store the event attendance record
        EventAttendance::create([
            'event_id' => $eventId,
            'student_id' => auth()->id(), // Use the authenticated student ID
            'attended_at' => $request->attended_at,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
        ]);

        // Redirect back with a success message
        return redirect()->route('attendance.events.create')->with('success', 'Event attendance logged successfully!');
    }

    // View the list of students who attended the event (Teacher view)
    public function eventAttendees($eventId)
    {
        $event = Event::findOrFail($eventId);  // Retrieve the event
        $attendees = EventAttendance::where('event_id', $eventId)->get();  // Get attendees for the event

        return view('attendance.events.attendees', compact('event', 'attendees'));  // Pass event and attendees to the view
    }

    // View the list of all created events (Teacher view)
    public function eventList()
    {
        $events = Event::all();  // Fetch all events
        return view('attendance.events.list', compact('events'));  // Return the event list view
    }
}

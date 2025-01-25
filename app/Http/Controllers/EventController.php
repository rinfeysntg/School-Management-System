<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Attendance;
use App\Models\Student; // Assuming you have a Student model for managing students
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the events with pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Paginate events, 10 per page
        $events = Event::paginate(10);
        return view('attendance.events.list', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attendance.events.create'); // A view to create new events
    }

    /**
     * Store a newly created event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required|date_format:H:i', // Ensure correct time format
        ]);

        // Store the new event
        Event::create([
            'name' => $request->event_name,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
        ]);

        // Redirect back to the event list with success message
        return redirect()->route('attendance.events.list')->with('success', 'Event created successfully!');
    }

    /**
     * Show the form for editing the specified event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the event by its ID
        $event = Event::findOrFail($id);
        return view('attendance.events.edit', compact('event'));
    }

    /**
     * Update the specified event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the event by ID
        $event = Event::findOrFail($id);

        // Validate the form input
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required|date_format:H:i', // Ensure correct time format
        ]);

        // Update the event with the new data
        $event->update([
            'name' => $request->event_name,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
        ]);

        // Redirect back to the event list with success message
        return redirect()->route('attendance.events.list')->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified event from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the event by ID and delete it
        $event = Event::findOrFail($id);
        $event->delete();

        // Redirect back with success message
        return redirect()->route('attendance.events.list')->with('success', 'Event deleted successfully!');
    }

    /**
     * Show the attendees for a specific event.
     *
     * @param  int  $eventId
     * @return \Illuminate\Http\Response
     */
    public function eventAttendees($eventId)
    {
        // Find the event and its attendees
        $event = Event::findOrFail($eventId);
        $attendees = $event->attendees; // Assuming you have a relationship with students or attendance model

        return view('attendance.events.attendees', compact('event', 'attendees'));
    }

    /**
     * Show the form to mark attendance for a specific event (Student view).
     *
     * @param  int  $eventId
     * @return \Illuminate\Http\Response
     */
    public function eventAttendanceForm($eventId)
    {
        // Find the event
        $event = Event::findOrFail($eventId);
        return view('attendance.events.attend', compact('event'));
    }

    /**
     * Store the event attendance (POST request).
     *
     * @param  int  $eventId
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEventAttendance(Request $request, $eventId)
    {
        // Validate the student ID
        $request->validate([
            'student_id' => 'required|exists:students,id', // Ensure the student exists in the database
        ]);

        // Check if the student has already marked attendance
        $existingAttendance = Attendance::where('event_id', $eventId)
                                        ->where('student_id', $request->student_id)
                                        ->first();

        if ($existingAttendance) {
            return redirect()->route('attendance.event.attendees', $eventId)->with('error', 'You have already marked your attendance.');
        }

        // Create new attendance record
        Attendance::create([
            'event_id' => $eventId,
            'student_id' => $request->student_id,
        ]);

        // Redirect back with success message
        return redirect()->route('attendance.event.attendees', $eventId)->with('success', 'Attendance recorded successfully!');
    }

    /**
     * Show the event attendance record for a specific student.
     *
     * @param  int  $eventId
     * @param  int  $studentId
     * @return \Illuminate\Http\Response
     */
    public function showStudentAttendance($eventId, $studentId)
    {
        // Find the event and student attendance record
        $event = Event::findOrFail($eventId);
        $student = Student::findOrFail($studentId);
        $attendance = Attendance::where('event_id', $eventId)->where('student_id', $studentId)->first();

        return view('attendance.events.studentAttendance', compact('event', 'student', 'attendance'));
    }
}

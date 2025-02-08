<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Course;
use App\Models\Department;
use App\Models\Users;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the events with pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = session('user');
        $perPage = $request->input('perPage', 10); // Get pagination size, default 10
    
        if ($user && isset($user->department_id)) {
            $events = Event::with(['course', 'department'])
                ->where('department_id', $user->department_id) // Filter by user's department
                ->paginate($perPage);
        } else {
            $events = Event::with(['course', 'department'])->paginate($perPage);
        }

        return view('attendance.events.list', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $departments = Department::all();
        return view('attendance.events.create-event', compact('courses', 'departments'));
    }

    /**
     * Store a newly created event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255|unique:events,event_name',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'event_time' => 'nullable|date_format:H:i',
            'year_level' => 'required|string',
            'block' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'department_id' => 'required|exists:departments,id',
        ]);

        Event::create([
            'name' => $request->event_name,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'year_level' => $request->year_level,
            'block' => $request->block,
            'course_id' => $request->course_id,
            'department_id' => $request->department_id,
        ]);

        return redirect()->route('attendance.events.list')->with('success', 'Event created successfully!');
    }

    /**
     * Show the form for editing the specified event.
     *
     * @param  Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $courses = Course::all();
        $departments = Department::all();
        return view('attendance.events.edit', compact('event', 'courses', 'departments'));
    }

    /**
     * Update the specified event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'event_name' => 'required|string|unique:events,event_name,' . $event->id,
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'event_time' => 'nullable|date_format:H:i',
            'year_level' => 'required|string',
            'block' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'department_id' => 'required|exists:departments,id',
        ]);

        $event->update([
            'name' => $request->event_name,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'year_level' => $request->year_level,
            'block' => $request->block,
            'course_id' => $request->course_id,
            'department_id' => $request->department_id,
        ]);

        return redirect()->route('attendance.events.list')->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified event from storage.
     *
     * @param  Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('attendance.events.list')->with('success', 'Event deleted successfully!');
    }

    /**
     * Show the attendees for a specific event.
     *
     * @param  Event  $event
     * @return \Illuminate\Http\Response
     */
    public function eventAttendees(Event $event)
    {
        $attendees = Users::where('course_id', $event->course->id)
            ->where('department_id', $event->department->id)
            ->where('year_level', $event->year_level)
            ->where('block', $event->block)
            ->get();

        return view('attendance.events.attendees', compact('event', 'attendees'));
    }

    /**
     * Mark attendance for a user in an event.
     *
     * @param  Request  $request
     * @param  Event  $event
     * @param  Users  $user
     * @return \Illuminate\Http\Response
     */
    public function markAttendance(Request $request, Event $event, Users $user)
    {
        // Update or attach attendance status
        if ($user->events()->wherePivot('event_id', $event->id)->exists()) {
            $user->events()->updateExistingPivot($event->id, [
                'status' => $request->status,
            ]);
        } else {
            $user->events()->attach($event->id, [
                'status' => $request->status,
            ]);
        }

        return redirect()->route('attendance.event.attendees', $event->id);
    }
}

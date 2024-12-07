<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Course;
use App\Models\Users;
use App\Models\Subject;
use App\Models\AnnouncementTarget;
use App\Models\Department;
use App\Models\Event;

class AnnouncementCreateController extends Controller
{
    /**
     * Show the create announcement form.
     */
    public function create()
    {
        $departments = Department::all();
        $courses = Course::all();
        $subjects = Subject::all();
        $events = Event::all();
        $students = Users::where('role_id', 7)
                ->get();
        

    return view('announcements.createannouncement', compact(
        'departments', 'courses', 'subjects', 'events', 'students'
    ));
    }

    public function searchTargets(Request $request)
{
    $type = $request->input('type');
    $search = $request->input('search', '');

    \Log::info("Searching for $type with search term: $search");

    $results = match ($type) {
        'department' => Department::where('name', 'LIKE', "%$search%")->get(),
        'course' => Course::where('name', 'LIKE', "%$search%")->get(),
        'subject' => Subject::where('name', 'LIKE', "%$search%")->get(),
        'event' => Event::where('name', 'LIKE', "%$search%")->get(),
        'student' => Users::where('name', 'LIKE', "%$search%")->get(),
        default => collect(),
    };

    \Log::info("Found results: ", $results->toArray());

    return response()->json($results->map(function ($item) {
        return [
            'id' => $item->id,
            'name' => $item->name,
        ];
    }));
}


public function store(Request $request)
{
    \Log::info("Storing announcement with data: ", $request->all());

    $request->validate([
        'title' => 'required|string|max:255',
        'date' => 'required|date',
        'target_type' => 'required|in:department,course,subject,event,student',
        'target_id' => 'required|integer',
        'message' => 'required|string',
    ]);

    Announcement::create([
        'title' => $request->input('title'),
        'date' => $request->input('date'),
        'target_type' => $request->input('target_type'),
        'target_id' => $request->input('target_id'),
        'message' => $request->input('message'),
    ]);

    return redirect()->route('announcements.announcement')->with('success', 'Announcement created successfully.');
}
}





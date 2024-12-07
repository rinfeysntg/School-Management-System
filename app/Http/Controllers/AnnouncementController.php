<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Course;
use App\Models\Users;
use App\Models\Subject;
use App\Models\AnnouncementTarget;
use App\Models\Department;
use App\Models\Event;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // Display all announcements
    public function index()
    {
        $announcements = Announcement::with('target')->get(); // Retrieve all announcements from the database
        return view('announcements.announcement', compact('announcements')); // Return the view with the announcements data
    }

    // Delete a specific announcement
    public function destroy(Announcement $announcement)
    {
        $announcement->delete(); // Delete the specific announcement
        return redirect()->route('announcements.announcement')->with('success', 'Announcement deleted successfully.');
    }

    // Edit a specific announcement
    public function edit($id)
    {
        // Retrieve the announcement by its ID
        $announcement = Announcement::findOrFail($id);

        // Get all possible targets
        $departments = Department::all();
        $courses = Course::all();
        $subjects = Subject::all();
        $students = Users::where('role_id', 7)->get(); // Assuming role_id 7 is for students

        // Return the edit view with the announcement and targets data
        return view('announcements.editannouncement', compact('announcement', 'departments', 'courses', 'subjects', 'students'));
    }

    // Update a specific announcement
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'target_type' => 'required|in:department,course,subject,student', // Ensure target_type is valid
            'target_id' => 'required|exists:' . $this->getTargetTable($request->input('target_type')) . ',id', // Validate the target ID
            'message' => 'required|string',
        ]);

        // Find the announcement by ID and update it
        $announcement = Announcement::findOrFail($id);
        
        // Update the announcement
        $announcement->update([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'message' => $request->input('message'),
            'target_type' => $request->input('target_type'),
            'target_id' => $request->input('target_id'), // Set the target ID
        ]);

        // Redirect back to the announcements page with a success message
        return redirect()->route('announcements.announcement')->with('success', 'Announcement updated successfully.');
    }

    private function getTargetTable($targetType)
    {
        return match ($targetType) {
            'department' => 'departments',
            'course' => 'courses',
            'subject' => 'subjects',
            'student' => 'users', // Assuming 'users' table for students
            default => throw new \InvalidArgumentException('Invalid target type'),
        };
    }

    // Display announcements for students
    public function studentIndex()
    {
        $announcements = Announcement::all(); // Retrieve all announcements
        return view('announcements.studentview', compact('announcements')); // Return the student view
    }

    // Show full announcement details
    public function show($id)
    {
        // Retrieve the announcement by its ID
        $announcement = Announcement::findOrFail($id);

        // Return the view with the full announcement data
        return view('announcements.fullannouncement', compact('announcement'));
    }
}
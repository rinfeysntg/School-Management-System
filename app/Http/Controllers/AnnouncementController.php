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
    public function index()
    {
        $announcements = Announcement::with('target')->get(); 
        return view('announcements.announcement', compact('announcements')); 
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete(); 
        return redirect()->route('announcements.announcement')->with('success', 'Announcement deleted successfully.');
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);

        $departments = Department::all();
        $courses = Course::all();
        $subjects = Subject::all();
        $students = Users::where('role_id', 7)->get(); // Assuming role_id 7 is for students

        return view('announcements.editannouncement', compact('announcement', 'departments', 'courses', 'subjects', 'students'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'target_type' => 'required|in:department,course,subject,student', // Ensure target_type is valid
            'target_id' => 'required|exists:' . $this->getTargetTable($request->input('target_type')) . ',id', // Validate the target ID
            'message' => 'required|string',
        ]);

        $announcement = Announcement::findOrFail($id);
        
        $announcement->update([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'message' => $request->input('message'),
            'target_type' => $request->input('target_type'),
            'target_id' => $request->input('target_id'), // Set the target ID
        ]);

        return redirect()->route('announcements.announcement')->with('success', 'Announcement updated successfully.');
    }

    private function getTargetTable($targetType)
    {
        return match ($targetType) {
            'department' => 'departments',
            'course' => 'courses',
            'subject' => 'subjects',
            'student' => 'users', 
            default => throw new \InvalidArgumentException('Invalid target type'),
        };
    }

    public function show($id)
    {
        $announcement = Announcement::findOrFail($id);

        return view('announcements.fullannouncement', compact('announcement'));
    }
}
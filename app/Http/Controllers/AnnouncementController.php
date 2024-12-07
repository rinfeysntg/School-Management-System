<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementTarget;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // Display all announcements
    public function index()
    {
        $announcements = Announcement::all(); // Retrieve all announcements from the database
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
        $announcementTargets = AnnouncementTarget::all(); // Get all available targets

        // Return the edit view with the announcement and targets data
        return view('announcements.editannouncement', compact('announcement', 'announcementTargets'));
    }

    // Update a specific announcement
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'announcements_target_id' => 'required|exists:announcements_target,id', // Ensure the target exists
            'message' => 'required|string',
        ]);

        // Find the announcement by ID and update it
        $announcement = Announcement::findOrFail($id);
        $announcement->update([
            'title' => $request->input('title'),
            'announcements_target_id' => $request->input('announcement_target_id'),
            'message' => $request->input('message'),
        ]);

        // Redirect back to the announcements page with a success message
        return redirect()->route('announcements.announcement')->with('success', 'Announcement updated successfully.');
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
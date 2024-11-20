<?php


namespace App\Http\Controllers;


use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all(); // Retrieve all announcements from the database
        return view('announcements.announcement', compact('announcements')); // Return the view with the announcements data
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete(); // Delete the specific announcement
        return redirect()->route('announcements.announcement')->with('success', 'Announcement deleted successfully.');
    }

    public function edit($id)
    {
        // Retrieve the announcement by its ID
        $announcement = Announcement::findOrFail($id);

        // Return the edit view with the announcement data
        return view('announcements.editannouncement', compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'announcement_target_id' => 'required|integer',
            'message' => 'required|string',
        ]);

        // Update the announcement in the database
        $announcement = Announcement::findOrFail($id);
        $announcement->update([
            'title' => $request->input('title'),
            'announcement_target_id' => $request->input('announcement_target_id'),
            'message' => $request->input('message'),
        ]);

        // Redirect back to the announcements page with a success message
        return redirect()->route('announcements.announcement')->with('success', 'Announcement updated successfully.');
    }

    public function studentIndex()
    {
        $announcements = Announcement::all(); // Retrieve all announcements
        return view('announcements.studentview', compact('announcements')); // Return the student view
    }

    public function show($id)
    {
        // Retrieve the announcement by its ID
        $announcement = Announcement::findOrFail($id);

        // Return the view with the full announcement data
        return view('announcements.fullannouncement', compact('announcement'));
    }


}
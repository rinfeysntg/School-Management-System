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
}
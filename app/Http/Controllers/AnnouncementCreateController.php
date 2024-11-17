<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementCreateController extends Controller
{
    /**
     * Show the create announcement form.
     */
    public function create()
    {
        return view('announcements.createannouncement');
    }

    /**
     * Store a newly created announcement in the database.
     */
    public function store(Request $request)
    {
        // Log the request data to check what is being passed
        \Log::info($request->all());

        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'announcement_target_id' => 'required|integer',
            'message' => 'required|string',
        ]);

        // Create the announcement
        Announcement::create([
            'title' => $request->input('title'),
            'announcement_target_id' => $request->input('announcement_target_id'),
            'message' => $request->input('message'),
        ]);

        // Redirect to the announcements page with a success message
        return redirect()->route('announcements.announcement')->with('success', 'Announcement created successfully.');
    }
}





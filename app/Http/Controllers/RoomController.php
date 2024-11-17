<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;


class RoomController extends Controller
{
    public function create()
    {
        return view('rooms.create_rooms'); 
    }

   
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'building_id' => 'required|integer', 
        ]);

        
        Room::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'building_id' => $request->input('building_id'),
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room created successfully!');
    }

   
    public function index()
    {
        $rooms = Room::all(); 
        return view('rooms.view_rooms', compact('rooms')); 
    }

    //EDIT//

    public function edit($id)
{
    $room = Room::findOrFail($id); 
    return view('rooms.edit_rooms', compact('room')); 
}

public function update(Request $request, $id)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'building_id' => 'required|integer',
    ]);

   
    $room = Room::findOrFail($id);
    $room->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'building_id' => $request->input('building_id'),
    ]);

    return redirect()->route('rooms.index')->with('success', 'Room updated successfully!');
}


public function destroy($id)
{
    $room = Room::findOrFail($id); 
    $room->delete(); 

    return redirect()->route('rooms.index')->with('success', 'Room deleted successfully!');
}

}

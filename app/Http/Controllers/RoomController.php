<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Building;


class RoomController extends Controller
{
    public function create()
    {
        $buildings = Building::all();
        return view('rooms.create_rooms', compact('buildings'));
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:rooms,name',
            'description' => 'nullable|string',
            'building_id' => 'required|exists:buildings,id',
        ]);

        Room::create($validated);

        return redirect()->route('building.index')->with('success', 'Room created successfully!');
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
    $buildings = Building::all();
    return view('rooms.edit_rooms', compact('room', 'buildings')); 
}

public function update(Request $request, $id)
{
    
    $request->validate([
        'name' => 'required|string|max:255|unique:rooms,name,' . $id,
        'description' => 'nullable|string',
        'building_id' => 'required|exists:buildings,id',
    ]);

   
    $room = Room::findOrFail($id);
    $room->update($request->all());

    return redirect()->route('rooms.index')->with('success', 'Room updated successfully!');
}


public function destroy($id)
{
    $room = Room::findOrFail($id); 
    $room->delete(); 

    return redirect()->route('rooms.index')->with('success', 'Room deleted successfully!');
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Building;


class BuildingController extends Controller
{
    public function create()
    {
        return view('building.create_building'); 
    }

   
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        
        Building::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('building.index')->with('success', 'Building created successfully!');
    }

   
    public function index()
    {
        $buildings = Building::all(); 
        return view('building.view_buildings', compact('buildings')); 
    }

    //EDIT//

    public function edit($id)
{
    $building = Building::findOrFail($id); 
    return view('building.edit_building', compact('building')); 
}

public function update(Request $request, $id)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

   
    $building = Building::findOrFail($id);
    $building->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
    ]);

    return redirect()->route('building.index')->with('success', 'Building updated successfully!');
}


public function destroy($id)
{
    $building = Building::findOrFail($id); 
    $building->delete(); 

    return redirect()->route('building.index')->with('success', 'Building deleted successfully!');
}

}

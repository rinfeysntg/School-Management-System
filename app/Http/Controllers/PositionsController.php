<?php

namespace App\Http\Controllers;

use App\Models\Positions;
use App\Models\Role; // Include the Role model
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    // role mapping

    protected $roleMapping = [
        'admin' => 1,
        'registrar' => 2,
        'treasury' => 3,
        'program_head' => 4,
        'human_resource' => 5,
        'professors' => 6,
        'students' => 7,
    ];

    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Query the Positions model
        $positions = Positions::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%")
                         ->orWhere('rate', 'like', "%{$search}%");
        })->get();

       // Fetch roles from the database
       $roles = Role::all();

        return view('position.Positions', compact('positions', 'roles'));
    }

    // Store new position
    public function store(Request $request)
{
    // Validate the input data, ensuring name and description are unique
    $request->validate([
        'name' => 'required|string|max:255|unique:positions,name',
        'description' => 'required|string|max:255|unique:positions,description',
        'rate' => 'required|numeric',
        'role_id' => 'required|exists:roles,id',
    ], [
        'name.unique' => 'The name has already been taken.',
        'description.unique' => 'The description has already been used.',
    ]);

    // Create a new position
    $positions = new Positions();
    $positions->name = $request->get('name');
    $positions->description = $request->get('description');
    $positions->rate = $request->get('rate');
    $positions->role_id = $request->get('role_id');
    $positions->save();

    // Redirect with success message
    return redirect()->route('positionsController')->with('success', 'Position created successfully.');
}


    // Delete position
    public function delete($id)
    {
        $positions = Positions::find($id);

        if (!$positions) {
            return redirect()->route('positionsController')->with('error', 'Position not found.');
        }

        $positions->delete();

        return redirect()->route('positionsController')->with('success', 'Position deleted successfully.');
    }

    // Show the pre-edit form for a position
    public function preEdit($id)
    {
        $positions = Positions::find($id);
        $roles = Role::all(); // Fetch roles for the dropdown

        if (!$positions) {
            return redirect()->route('positionsController')->with('error', 'Position not found.');
        }

        return view('positions.edit', ['positions' => $positions]);
    }

    // Edit position details
    // Edit position details
public function edit(Request $request)
{
    // Get the position to be updated
    $position = Positions::find($request->id);

    if (!$position) {
        return redirect()->route('positionsController')->with('error', 'Position not found.');
    }

    // Check if any of the name or description already exists (excluding the current position)
    $existingPosition = Positions::where(function ($query) use ($request) {
        $query->where('name', $request->name)
              ->orWhere('description', $request->description);
    })->where('id', '!=', $request->id) // Exclude the current position from the check
    ->first();

    if ($existingPosition) {
        return redirect()->back()->withErrors([
            'name' => 'The name has already been taken.',
            'description' => 'The description has already been used.',
        ]);
    }

    // Update position details
    $position->name = $request->name;
    $position->description = $request->description;
    $position->rate = $request->rate;
    $position->role_id = $request->role_id;

    // Save changes
    $position->save();

    return redirect()->route('positionsController')->with('success', 'Position updated successfully.');
}


}

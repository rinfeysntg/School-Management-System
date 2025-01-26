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
        $positions = new Positions();
        $positions->name = $request->get('name');
        $positions->description = $request->get('description');
        $positions->rate = $request->get('rate');
        $role = $request->get('role_id');  // This will be the role name (e.g., 'admin')
        $positions->role_id = $request->get('role_id');

        $positions->save();

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
    public function edit(Request $req)
    {
        $positions = Positions::find($req->id);

        if (!$positions) {
            return redirect()->route('positionsController')->with('error', 'Position not found.');
        }

        $positions->name = $req->name;
        $positions->description = $req->description;
        $positions->rate = $req->rate;
        $role = $req->role_id;
        $positions->role_id = $req->role_id; // Update role ID

        $positions->save();

        return redirect()->route('positionsController')->with('success', 'Position updated successfully.');
    }

}

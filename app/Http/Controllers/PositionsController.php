<?php

namespace App\Http\Controllers;

use App\Models\Positions;
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

        // Define role names mapping
        $roleNames = [
            1 => 'Admin',
            2 => 'Registrar',
            3 => 'Treasury',
            4 => 'Program Head',
            5 => 'Human Resource',
            6 => 'Professors',
            7 => 'Students',
        ];

        return view('position.Positions', compact('positions', 'roleNames'));
    }

    // Store new position
    public function store(Request $request)
    {
        $positions = new Positions();
        $positions->name = $request->get('name');
        $positions->description = $request->get('description');
        $positions->rate = $request->get('rate');
        $role = $request->get('role_id');  // This will be the role name (e.g., 'admin')
        $positions->role_id = $this->roleMapping[$role] ?? 0; // Map role name to role_id (default to 0 if not found)

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
        $positions->role_id = $this->roleMapping[$role] ?? 0;

        $positions->save();

        return redirect()->route('positionsController')->with('success', 'Position updated successfully.');
    }

}

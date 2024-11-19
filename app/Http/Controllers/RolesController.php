<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Department; // Import the Department model
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Query the Roles model
        $roles = Roles::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('yearlevel', 'like', "%{$search}%");
        })->get();

        // Fetch departments from the database
        $departments = Department::all(); // Retrieve all departments

        // Return view with filtered roles and department names
        return view('role.roles', compact('roles', 'departments'));
    }

    // Store new role
    public function store(Request $request)
    {
        $roles = new Roles();
        $roles->name = $request->get('name');
        $roles->description = $request->get('description');
        $roles->yearlevel = $request->get('yearlevel');
        $roles->department_id = $request->get('department_id'); // Save selected department ID

        $roles->save();

        return redirect()->route('rolesController')->with('success', 'Role created successfully.');
    }

    // Delete role
    public function delete($id)
    {
        $roles = Roles::find($id);

        if (!$roles) {
            return redirect()->route('rolesController')->with('error', 'Role not found.');
        }

        $roles->delete();

        return redirect()->route('rolesController')->with('success', 'Role deleted successfully.');
    }

    // Show the pre-edit form for a role
    public function preEdit($id)
    {
        $roles = Roles::find($id);
        $departments = Department::all(); // Fetch all departments for the dropdown

        if (!$roles) {
            return redirect()->route('rolesController')->with('error', 'Role not found.');
        }

        return view('role.edit', compact('roles', 'departments'));
    }

    // Edit role details
    public function edit(Request $req)
    {
        $roles = Roles::find($req->id);

        if (!$roles) {
            return redirect()->route('rolesController')->with('error', 'Role not found.');
        }

        $roles->name = $req->name;
        $roles->description = $req->description;
        $roles->yearlevel = $req->yearlevel;
        $roles->department_id = $req->department_id; // Update with selected department ID

        $roles->save();

        return redirect()->route('rolesController')->with('success', 'Role updated successfully.');
    }
}

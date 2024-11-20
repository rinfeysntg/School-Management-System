<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Department; // Import the Department model
use Illuminate\Http\Request;

class RolesController extends Controller
{
    // Display all roles with search functionality
    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Query the Roles model with optional search functionality
        $roles = Roles::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('yearlevel', 'like', "%{$search}%");
        })->get();

        // Fetch all departments from the database
        $departments = Department::all();

        // Return the view with filtered roles and departments
        return view('role.roles', compact('roles', 'departments'));
    }

    // Store a new role in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'yearlevel' => 'nullable|string|max:100',
            'department_id' => 'required|exists:departments,id', // Validate department_id
        ]);

        // Create a new role and save the data
        $roles = new Roles();
        $roles->name = $request->get('name');
        $roles->description = $request->get('description');
        $roles->yearlevel = $request->get('yearlevel');
        $roles->department_id = $request->get('department_id'); // Save the department ID

        // Save the role to the database
        $roles->save();

        // Redirect back with a success message
        return redirect()->route('rolesController')->with('success', 'Role created successfully.');
    }

    // Delete a specific role
    public function delete($id)
    {
        // Find the role by ID
        $roles = Roles::find($id);

        if (!$roles) {
            return redirect()->route('rolesController')->with('error', 'Role not found.');
        }

        // Delete the role
        $roles->delete();

        // Redirect back with a success message
        return redirect()->route('rolesController')->with('success', 'Role deleted successfully.');
    }

    // Show the pre-edit form for a specific role
    public function preEdit($id)
    {
        // Find the role by ID and fetch all departments
        $roles = Roles::find($id);
        $departments = Department::all(); // Fetch all departments for the dropdown

        if (!$roles) {
            return redirect()->route('rolesController')->with('error', 'Role not found.');
        }

        // Return the edit view with the role and departments
        return view('role.edit', compact('roles', 'departments'));
    }

    // Update the details of a specific role
    public function edit(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'yearlevel' => 'nullable|string|max:100',
            'department_id' => 'required|exists:departments,id', // Validate department_id
        ]);

        // Find the role by ID
        $roles = Roles::find($request->id);

        if (!$roles) {
            return redirect()->route('rolesController')->with('error', 'Role not found.');
        }

        // Update the role details
        $roles->name = $request->name;
        $roles->description = $request->description;
        $roles->yearlevel = $request->yearlevel;
        $roles->department_id = $request->department_id; // Update department_id

        // Save the changes to the database
        $roles->save();

        // Redirect back with a success message
        return redirect()->route('rolesController')->with('success', 'Role updated successfully.');
    }
}

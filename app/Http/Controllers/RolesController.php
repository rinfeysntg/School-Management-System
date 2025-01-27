<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
        $roles = Role::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get();

        // Return the view with filtered roles and departments
        return view('role.roles', compact('roles'));
    }

    // Store a new role in the database
    public function store(Request $request)
{
    // Validate the incoming request data
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:roles,name', // Ensure role name is unique
    ]);

    // Create a new role and save the data
    $roles = new Role();
    $roles->name = $request->get('name');

    // Save the role to the database
    $roles->save();

    // Redirect back with a success message
    return redirect()->route('rolesController')->with('success', 'Role created successfully.');
}


    // Delete a specific role
    public function delete($id)
    {
        // Find the role by ID
        $roles = Role::find($id);

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
        $roles = Role::find($id);

        if (!$roles) {
            return redirect()->route('rolesController')->with('error', 'Role not found.');
        }

        // Return the edit view with the role and departments
        return view('role.edit', compact('roles'));
    }

    // Update the details of a specific role
    public function edit(Request $request)
{
    // Validate the incoming request data
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:roles,name,' . $request->id, // Ensure role name is unique excluding the current role
    ]);

    // Find the role by ID
    $roles = Role::find($request->id);

    if (!$roles) {
        return redirect()->route('rolesController')->with('error', 'Role not found.');
    }

    // Update the role details
    $roles->name = $request->name;

    // Save the changes to the database
    $roles->save();

    // Redirect back with a success message
    return redirect()->route('rolesController')->with('success', 'Role updated successfully.');
}

}

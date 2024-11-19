<?php

namespace App\Http\Controllers;

use App\Models\Roles;  // Import the Roles model
use Illuminate\Http\Request;

class RolesController extends Controller
{
    protected $roleMapping = [
        'CAMS' => 1,
        'CAS' => 2,
        'CBA' => 3,
        'CCJE' => 4,
        'CECT' => 5,
        'CHTM' => 6,
        'COED' => 7,
        'CON' => 8,
    ];

    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Query the Roles model (changed from Users to Roles)
        $roles = Roles::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('yearlevel', 'like', "%{$search}%");
        })->get();

        // Define role names mapping
        $roleNames = $this->roleMapping;

        // Return view with filtered roles and role names
        return view('role.roles', compact('roles', 'roleNames'));
    }

    // Store new role
    public function store(Request $request)
    {
        $roles = new Roles();
        $roles->name = $request->get('name');
        $roles->description = $request->get('description');
        $roles->yearlevel = $request->get('yearlevel');
        $role = $request->get('dept_id');  // This will be the role name (e.g., 'admin')
        $roles->dept_id = $this->roleMapping[$role] ?? 0; // Map role name to role_id (default to 0 if not found)

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

        if (!$roles) {
            return redirect()->route('rolesController')->with('error', 'Role not found.');
        }

        return view('role.edit', ['roles' => $roles]);
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
        $role = $req->dept_id;  // This will be the role name (e.g., 'admin')
        $roles->dept_id = $this->roleMapping[$role] ?? 0; // Map role name to role_id (default to 0 if not found)

        $roles->save();

        return redirect()->route('rolesController')->with('success', 'Role updated successfully.');
    }
}



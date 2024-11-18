<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // Role mapping array for converting role names to database values
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

        // Query the Users model
        $users = Users::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('username', 'like', "%{$search}%");
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

        // Return view with filtered users and role names
        return view('user.users', compact('users', 'roleNames'));
    }

    // Store new user
    public function store(Request $request)
    {
        $users = new Users();
        $users->name = $request->get('name');
        $users->age = $request->get('age');
        $users->address = $request->get('address');
        $users->username = $request->get('username');
        $users->email = $request->get('email');
        $users->password = $request->get('password'); // Store password as plain text
        $role = $request->get('role_id');  // This will be the role name (e.g., 'admin')
        $users->role_id = $this->roleMapping[$role] ?? 0; // Map role name to role_id (default to 0 if not found)

        $users->save();

        return redirect()->route('usersController')->with('success', 'User created successfully.');
    }

    // Delete user
    public function delete($id)
    {
        $users = Users::find($id);

        if (!$users) {
            return redirect()->route('usersController')->with('error', 'User not found.');
        }

        $users->delete();

        return redirect()->route('usersController')->with('success', 'User deleted successfully.');
    }

    // Show the pre-edit form for a user
    public function preEdit($id)
    {
        $users = Users::find($id);

        if (!$users) {
            return redirect()->route('usersController')->with('error', 'User not found.');
        }

        return view('users.edit', ['users' => $users]);
    }

    // Edit user details
    public function edit(Request $req)
    {
        $users = Users::find($req->id);

        if (!$users) {
            return redirect()->route('usersController')->with('error', 'User not found.');
        }

        $users->name = $req->name;
        $users->age = $req->age;
        $users->address = $req->address;
        $users->username = $req->username;
        $users->email = $req->email;
        $users->password = $req->password; // Store password as plain text
        $role = $req->role_id;  // This will be the role name (e.g., 'admin')
        $users->role_id = $this->roleMapping[$role] ?? 0; // Map role name to role_id (default to 0 if not found)

        $users->save();

        return redirect()->route('usersController')->with('success', 'User updated successfully.');
    }
}


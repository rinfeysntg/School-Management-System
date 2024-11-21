<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Role; // Include the Role model
use Illuminate\Http\Request;

class UsersController extends Controller
{
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

        // Fetch roles from the database
        $roles = Role::all();

        // Return view with filtered users and roles
        return view('user.users', compact('users', 'roles'));
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
        $users->password = $request->get('password'); // Do not encrypt the password

        // Fetch the role by ID and save the role's name in role_id
        $role = Role::find($request->get('role_id'));
        $users->role_id = $role ? $role->id : null; // Save role name if exists

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
        $roles = Role::all(); // Fetch roles for the dropdown

        if (!$users) {
            return redirect()->route('usersController')->with('error', 'User not found.');
        }

        return view('users.edit', compact('users', 'roles'));
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
        $users->password = $req->password; // Do not encrypt the password

        // Fetch the role by ID and save the role's name in role_id
        $role = Role::find($req->role_id);
        $users->role_id = $role ? $role->id : null; // Save role name if exists

        $users->save();

        return redirect()->route('usersController')->with('success', 'User updated successfully.');
    }
}
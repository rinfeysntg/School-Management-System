<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Role;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Query the Users model
        $users = Users::with(['role', 'department', 'course'])
        ->when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('username', 'like', "%{$search}%");
        })->get();

        // Fetch roles from the database
        $roles = Role::all();
        $departments = Department::all();
        $courses = Course::all();

        // Return view with filtered users and roles
        return view('user.users', compact('users', 'roles', 'departments', 'courses'));
    }

    // Store new user
    public function store(Request $request)
    {
    // Validate input data
    $request->validate([
        'name' => 'required|string|max:255|unique:users,name',
        'email' => 'required|email|max:255|unique:users,email',
        'username' => 'required|string|max:255|unique:users,username',
        'age' => 'required|integer',
        'address' => 'required|string|max:255',
        'department_id' => 'nullable|exists:departments,id',
        'course_id' => 'nullable|exists:courses,id',
        'role_id' => 'required|exists:roles,id',
    ], [
        'name.unique' => 'The name has already been taken.',
        'email.unique' => 'The email has already been registered.',
        'username.unique' => 'The username has already been taken.',
    ]);

    // Create the new user
    $users = new Users();
    $users->name = $request->get('name');
    $users->age = $request->get('age');
    $users->address = $request->get('address');
    $users->username = $request->get('username');
    $users->email = $request->get('email');

    // Set the default password
    $users->password = 'SCHOOL-AUTOMATE';  // Default password

    // Handle the department and course relationships
    $department = Department::find($request->get('department_id'));
    $users->department_id = $department ? $department->id : null;

    $course = Course::find($request->get('course_id'));
    $users->course_id = $course ? $course->id : null;

    // Handle the role relationship
    $role = Role::find($request->get('role_id'));
    $users->role_id = $role ? $role->id : null;

    // Save the user
    $users->save();

    // Redirect with success message
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
        $roles = Role::all();
        $departments = Department::all();
        $courses = Course::all(); 

        if (!$users) {
            return redirect()->route('usersController')->with('error', 'User not found.');
        }

        return view('user.edit', compact('users', 'roles', 'departments', 'courses'));
    }

    // Edit user details
    public function edit(Request $req)
{
    // Get the user to be updated
    $users = Users::find($req->id);

    if (!$users) {
        return redirect()->route('usersController')->with('error', 'User not found.');
    }

    // Check if any of the name, email, or username already exists (excluding the current user)
    $existingUser = Users::where(function ($query) use ($req) {
        $query->where('name', $req->name)
              ->orWhere('email', $req->email)
              ->orWhere('username', $req->username);
    })->where('id', '!=', $req->id) // Exclude the current user from the check
    ->first();

    if ($existingUser) {
        return redirect()->back()->withErrors([
            'name' => 'The name has already been taken.',
            'email' => 'The email has already been registered.',
            'username' => 'The username has already been taken.',
        ]);
    }

    // Update user details
    $users->name = $req->name;
    $users->age = $req->age;
    $users->address = $req->address;
    $users->username = $req->username;
    $users->email = $req->email;
    $users->password = $req->password; // Handle password update as needed

    // Handle relationships
    $users->department_id = $req->department_id;
    $users->course_id = $req->course_id;
    $users->role_id = $req->role_id;

    // Save changes
    $users->save();

    return redirect()->route('usersController')->with('success', 'User updated successfully.');
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Role;
use App\Models\Department;
use App\Models\Course;

class ProgramHead extends Controller
{
    public function index()
    {

        return view('programhead');
    }

    public function createStudentIndex(Request $request) {
        
        $search = $request->input('search');
        $user = session('user');
        
        $users = Users::with(['role', 'department', 'course'])
        ->where('department_id', $user->department_id)
        ->where('role_id', 7)
        ->when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('username', 'like', "%{$search}%");
        })->get();



        $roles = Role::all();
        $departments = Department::all();
        $courses = Course::all();

        
        return view('student.students', compact('users', 'roles', 'departments', 'courses'));
    }

    public function storeStudent(Request $request)
    {
        $users = new Users();
        $users->name = $request->get('name');
        $users->age = $request->get('age');
        $users->address = $request->get('address');
        $users->username = $request->get('username');
        $users->email = $request->get('email');
        $users->password = $request->get('password');

        $department = Department::find($request->get('department_id'));
        $users->department_id = $department ? $department->id : null; 

        $course = Course::find($request->get('course_id'));
        $users->course_id = $course ? $course->id : null; 

        $users->year_level = $request->get('year_level');
        $users->block = $request->get('block');

        $users->role_id = 7;

        $users->save();

        return redirect()->route('students_index')->with('success', 'Student added successfully.');
    }


    public function deleteStudent($id)
    {
        $users = Users::find($id);

        if (!$users) {
            return redirect()->route('students_index')->with('error', 'Student not found.');
        }

        $users->delete();

        return redirect()->route('students_index')->with('success', 'Student deleted successfully.');
    }

    // Edit user details
    public function editStudent(Request $req)
    {
        $users = Users::find($req->id);

        if (!$users) {
            return redirect()->route('students_index')->with('error', 'Student not found.');
        }

        $users->name = $req->name;
        $users->age = $req->age;
        $users->address = $req->address;
        $users->username = $req->username;
        $users->email = $req->email;
        $users->password = $req->password;

        $department = Department::find($req->department_id);
        $users->department_id = $department ? $department->id : null; 

        $course = Course::find($req->course_id);
        $users->course_id = $course ? $course->id : null;

        $users->year_level = $req->get('year_level');
        $users->block = $req->get('block');

        $users->role_id = 7;

        $users->save();

        return redirect()->route('students_index')->with('success', 'Student updated successfully.');
    }

    
}

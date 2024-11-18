<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {

        return view('course.course');
    }

    //see dropdown
    public function createCourse()
    {
        $departments = Department::all(); 
        return view('course.course', compact('departments'));
    }


    // submmit to courses table
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'department_id' => 'required|exists:departments,id',
    ]);

    Course::create([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'department_id' => $validated['department_id'],
    ]);

    return redirect()->route('courseDashboard')->with('success', 'Course Created!');
}


}

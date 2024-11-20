<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Department;

class courseTabledashboard extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::all();
        $departments = Department::all();

        if ($request->has('department_id') && $request->department_id != '') {
            $courses = Course::where('department_id', $request->department_id)->get();
        } else {
            $courses = collect();
        }
        return view('course.courseTable', compact('courses', 'departments'));
    }

    public function show($id)
    {
        $departments = Department::all();
        $courses = Course::with('department')->findOrFail($id);
        return view('course.courseTable', compact('courses'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Department;

class courseTabledashboard extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('course.courseTable', compact('courses'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Department;

class courseEditController extends Controller
{
    public function edit($id)
    {
        $course = Course::findOrFail($id);  
        $departments = Department::all();   
        return view('courseEdit', compact('course', 'departments'));  
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'department_id' => 'required|exists:departments,id',
    ]);

    $course = Course::findOrFail($id);
    $course->update([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'department_id' => $validated['department_id'],
    ]);

    return redirect()->route('courseDashboard')->with('success', 'Course Updated!');
}


    // Delete a specific course
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete(); // Delete the course
        return redirect()->route('courseTable')->with('success', 'Course deleted successfully!');
    }
}

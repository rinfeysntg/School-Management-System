<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Course;
use App\Models\Users;
use App\Models\Subject;

class ScheduleController extends Controller
{
    public function create($curriculumId)
    {

        $curriculum = Curriculum::with('subjects')->findOrFail($curriculumId);
        $courses = Course::all();
        $users = User::where('role', 'professors')->get();

        return view('schedule.create_sched', [
            'curriculum' => $curriculum,
            'subjects' => $curriculum->subjects, // Pass only related subjects
            'courses' => $courses,
            'users' => $users,
        ]);
    }

    public function index()
        {
            $schedules = Schedule::with(['course', 'subject', 'user'])->get(); // Include related models
            return view('schedule.index_sched', compact('schedules'));
        }
   
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'year_level' => 'nullable|string',
            'block' => 'nullable|string',
            'subject_id' => 'required|exists:subjects,id',
            'user_id' => 'required|exists:users,id',
            'days_time' => 'nullable|string',
        ]);

        
        Schedule::create([
            'course_id' => $validated['course_id'],
            'year_level' => $validated['year_level'],
            'block' => $validated['block'],
            'subject_id' => $validated['subject_id'],
            'user_id' => $validated['user_id'],
            'days_time' => $validated['days_time'],
        ]);

        return redirect()->route('subjects_program_head')->with('success', 'Schedule created successfully!');
    }

    //EDIT//

    public function edit($id, $curriculumId)
{
    $schedules = Schedule::findOrFail($id); 
    $curriculum = Curriculum::with('subjects')->findOrFail($curriculumId);
    $courses = Course::all();
    $users = User::where('role', 'professors')->get();

    return view('schedule.edit_sched', compact('schedules', 'curriculum', 'courses', 'users')); 
}

public function update(Request $request, $id)
{
    
    $request->validate([
        'course_id' => 'required|exists:courses,id',
        'year_level' => 'nullable|string',
        'block' => 'nullable|string',
        'subject_id' => 'required|exists:subjects,id',
        'user_id' => 'required|exists:users,id',
        'days_time' => 'nullable|string',
    ]);

   
    $schedule = Schedule::findOrFail($id);
    $schedule->update($request->all());

    return redirect()->route('schedule.index')->with('success', 'Schedule updated successfully!');
}


public function destroy($id)
{
    $schedule = Schedule::findOrFail($id); 
    $schedule->delete(); 

    return redirect()->route('schedule.index')->with('success', 'Schedule deleted successfully!');
}
}

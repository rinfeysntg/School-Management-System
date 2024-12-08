<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Course;
use App\Models\Users;
use App\Models\Subject;
use App\Models\Curriculum;

class ScheduleController extends Controller
{
    public function create($curriculumId)
    {
        $user = session('user');
        $curriculum = Curriculum::with('subjects')->findOrFail($curriculumId);
        $courses = Course::all();
        $users = Users::where('role_id', 5)
                ->where('department_id', $user->department_id)
                ->get();

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
            'curriculum_id' => 'required|exists:curriculums,id',
        ]);

        
        Schedule::create([
            'course_id' => $validated['course_id'],
            'year_level' => $validated['year_level'],
            'block' => $validated['block'],
            'subject_id' => $validated['subject_id'],
            'user_id' => $validated['user_id'],
            'days_time' => $validated['days_time'],
            'curriculum_id' => $validated['curriculum_id'],
        ]);

        return redirect()->route('schedule.show', ['curriculumId' => $validated['curriculum_id']]);
    }



    //EDIT//

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $curriculum = Curriculum::with('subjects')->findOrFail($schedule->curriculum_id);
        $subjects = $curriculum->subjects;
        $courses = Course::all();
        $users = Users::where('role_id', 5)->get();
    
        return view('schedule.edit_sched', compact('schedule', 'curriculum', 'subjects' ,'courses', 'users'));
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
        'curriculum_id' => 'required|exists:curriculums,id',
    ]);

   
    $schedule = Schedule::findOrFail($id);
    $schedule->update($request->all());

    return redirect()->route('curriculums_program_head')->with('success', 'Schedule updated successfully!');
}


public function destroy($id)
{
    $schedule = Schedule::findOrFail($id); 
    $schedule->delete(); 

    return redirect()->route('curriculums_program_head')->with('success', 'Schedule deleted successfully!');
}
}

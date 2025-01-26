<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Course;
use App\Models\Users;
use App\Models\Subject;
use App\Models\Curriculum;
use App\Models\Building;

class ScheduleController extends Controller
{
    public function create($curriculumId)
    {
        $user = session('user');
        $curriculum = Curriculum::with('subjects')->findOrFail($curriculumId);
        $courses = Course::all();
        $users = Users::where('role_id', 6)
                ->where('department_id', $user->department_id)
                ->get();
        $buildings = Building::with('rooms')->get();

        return view('schedule.create_sched', [
            'curriculum' => $curriculum,
            'subjects' => $curriculum->subjects,
            'courses' => $courses,
            'users' => $users,
            'buildings' => $buildings,
        ]);
    }

    public function index()
        {
            $schedules = Schedule::with(['course', 'subject', 'user', 'building'])->get(); 
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
                'days' => 'nullable|array', // Validate as an array
                'days.*' => 'in:Mon,Tue,Wed,Thu,Fri,Sat,Sun', // Ensure valid day values
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i|after:start_time',
                'building_id' => 'required|exists:buildings,id',
                'room_id' => 'required|exists:rooms,id',
                'curriculum_id' => 'required|exists:curriculums,id',
            ]);
        
            Schedule::create([
                'course_id' => $validated['course_id'],
                'year_level' => $validated['year_level'],
                'block' => $validated['block'],
                'subject_id' => $validated['subject_id'],
                'user_id' => $validated['user_id'],
                'days' => implode(',', $validated['days'] ?? []), 
                'start_time' => $validated['start_time'],
                'end_time' => $validated['end_time'],
                'building_id' => $validated['building_id'],
                'room_id' => $validated['room_id'],
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
        $users = Users::where('role_id', 6)->get();
        $buildings = Building::with('rooms')->get();
    
        return view('schedule.edit_sched', compact('schedule', 'curriculum', 'subjects' ,'courses', 'users', 'buildings'));
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'course_id' => 'required|exists:courses,id',
        'year_level' => 'nullable|string',
        'block' => 'nullable|string',
        'subject_id' => 'required|exists:subjects,id',
        'user_id' => 'required|exists:users,id',
        'days' => 'nullable|array',
        'days.*' => 'in:Mon,Tue,Wed,Thu,Fri,Sat,Sun',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
        'curriculum_id' => 'required|exists:curriculums,id',
    ]);

    $schedule = Schedule::findOrFail($id);
    $schedule->update([
        'course_id' => $validated['course_id'],
        'year_level' => $validated['year_level'],
        'block' => $validated['block'],
        'subject_id' => $validated['subject_id'],
        'user_id' => $validated['user_id'],
        'days' => implode(',', $validated['days'] ?? []),
        'start_time' => $validated['start_time'],
        'end_time' => $validated['end_time'],
        'curriculum_id' => $validated['curriculum_id'],
    ]);

    return redirect()->route('curriculums_program_head')->with('success', 'Schedule updated successfully!');
}


public function destroy($id)
{
    $schedule = Schedule::findOrFail($id); 
    $schedule->delete(); 

    return redirect()->route('curriculums_program_head')->with('success', 'Schedule deleted successfully!');
}
}

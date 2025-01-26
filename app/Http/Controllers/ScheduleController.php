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

            $overlappingProfSchedule = Schedule::where('user_id', $validated['user_id'])
            ->where(function ($query) use ($validated) {
                $query->whereRaw("FIND_IN_SET(days, ?)", [implode(',', $validated['days'] ?? [])])
                      ->where(function ($q) use ($validated) {
                          $q->whereBetween('start_time', [$validated['start_time'], $validated['end_time']])
                            ->orWhereBetween('end_time', [$validated['start_time'], $validated['end_time']])
                            ->orWhere(function ($subQuery) use ($validated) {
                                $subQuery->where('start_time', '<', $validated['start_time'])
                                         ->where('end_time', '>', $validated['end_time']);
                            });
                      });
            })
            ->exists();
    
        if ($overlappingProfSchedule) {
            return back()->withErrors(['time' => 'The selected time overlaps with another schedule for the same professor.']);
        }

            $duplicateSchedule = Schedule::where('course_id', $validated['course_id'])
                        ->where('year_level', $validated['year_level'])
                        ->where('block', $validated['block'])
                        ->where('subject_id', $validated['subject_id'])
                        ->where('curriculum_id', $validated['curriculum_id'])
                        ->exists();

            if ($duplicateSchedule) {
                return back()->withErrors(['duplicate' => 'A similar schedule already exists.']);
            }

            $overlappingSchedule = Schedule::where('room_id', $validated['room_id'])
                ->whereRaw("FIND_IN_SET(days, ?)", [implode(',', $validated['days'] ?? [])])
                ->where(function ($query) use ($validated) {
                    $query->whereBetween('start_time', [$validated['start_time'], $validated['end_time']])
                        ->orWhereBetween('end_time', [$validated['start_time'], $validated['end_time']]);
                })
                ->exists();

            if ($overlappingSchedule) {
                return back()->withErrors(['time' => 'The selected time and days overlap with another schedule in the same room.']);
            }
            
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

    $duplicateSchedule = Schedule::where('course_id', $validated['course_id'])
        ->where('year_level', $validated['year_level'])
        ->where('block', $validated['block'])
        ->where('subject_id', $validated['subject_id'])
        ->where('curriculum_id', $validated['curriculum_id'])
        ->where('id', '!=', $schedule->id)
        ->exists();

    if ($duplicateSchedule) {
        return back()->withErrors(['duplicate' => 'A similar schedule already exists.']);
    }

    // Prevent overlapping times on the same days
    $overlappingSchedule = Schedule::where('room_id', $validated['room_id'])
        ->whereRaw("FIND_IN_SET(days, ?)", [implode(',', $validated['days'] ?? [])])
        ->where(function ($query) use ($validated) {
            $query->whereBetween('start_time', [$validated['start_time'], $validated['end_time']])
                  ->orWhereBetween('end_time', [$validated['start_time'], $validated['end_time']]);
        })
        ->where('id', '!=', $schedule->id)
        ->exists();

    if ($overlappingSchedule) {
        return back()->withErrors(['time' => 'The selected time and days overlap with another schedule in the same room.']);
    }

    // Prevent duplicate subjects in the same curriculum
    $duplicateSubject = Schedule::where('curriculum_id', $validated['curriculum_id'])
        ->where('subject_id', $validated['subject_id'])
        ->where('id', '!=', $schedule->id)
        ->exists();

    if ($duplicateSubject) {
        return back()->withErrors(['subject_id' => 'This subject is already assigned to the curriculum.']);
    }

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

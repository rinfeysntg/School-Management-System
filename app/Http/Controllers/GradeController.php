<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\ActivityGrade;
use App\Models\Grade;
use App\Models\Users;
use App\Models\Schedule;
use App\Models\Subject;

class GradeController extends Controller
{

    public function showAllActivities()
    {
        $professor = session('user');

        $activities = Activity::where('prof_id', $professor->id)
        ->with(['activityGrades', 'subject', 'student'])
        ->get();

        return view('academics.activities', compact('activities'));
    }

    public function storeActivity(Request $request)
    {
        $professor = session('user');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'score' => 'required|numeric|min:0',
            'max_score' => 'required|numeric|min:0',
            'subject_id' => 'required|exists:subjects,id',
            'student_id' => 'required|exists:users,id',
        ]);

        $grade = ($validated['score'] / $validated['max_score']) * 100;

        $activity = Activity::create([
            'name' => $validated['name'],
            'score' => $validated['score'],
            'max_score' => $validated['max_score'],
            'subject_id' => $validated['subject_id'],
            'student_id' => $validated['student_id'], 
            'prof_id' => $professor->id,
            'grade' => $grade,
        ]);

        return redirect()->route('activities.index')->with('success', 'Activity created successfully.');
    }

    public function createActivity()
{
    $professor = session('user');

    $schedules = Schedule::where('user_id', $professor->id)->get();

    $subjects = Subject::whereIn('id', $schedules->pluck('subject_id'))->get();
    
    $students = Users::where('role_id', 6)->get(); 

    return view('academics.create_activity', compact('subjects', 'students'));
}

public function searchUsers(Request $request)
{
    $search = $request->input('search', '');

    $students = Users::where('name', 'LIKE', "%$search%")
                ->orWhere('id', 'LIKE', "%{$search}%")->get();

    return response()->json($students->map(function ($student) {
        return [
            'id' => $student->id,
            'name' => $student->name,
        ];
    }));
}

public function editActivity($id)
{
    $professor = session('user');
    $schedules = Schedule::where('user_id', $professor->id)->get();
    $subjects = Subject::whereIn('id', $schedules->pluck('subject_id'))->get();
    $activity = Activity::findOrFail($id);
    $students = Users::where('role_id', 6)->get();

    return view('academics.edit_activity', compact('activity', 'subjects', 'students'));
}

public function updateActivity(Request $request, $id)
{
    $professor = session('user');
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'score' => 'required|numeric|min:0',
        'max_score' => 'required|numeric|min:0',
        'subject_id' => 'required|exists:subjects,id',
        'student_id' => 'required|exists:users,id',
    ]);

    $grade = ($validated['score'] / $validated['max_score']) * 100;

    $activity = Activity::findOrFail($id);
    $activity->update([
        'name' => $validated['name'],
        'score' => $validated['score'],
        'max_score' => $validated['max_score'],
        'subject_id' => $validated['subject_id'],
        'student_id' => $validated['student_id'],
        'prof_id' => $professor->id,
        'grade' => $grade,
    ]);

    return redirect()->route('activities.index')->with('success', 'Activity updated successfully.');
}

public function destroyActivity($id)
{
    $activity = Activity::findOrFail($id);
    $activity->delete();

    return redirect()->route('activities.index')->with('success', 'Activity deleted successfully.');
}


}

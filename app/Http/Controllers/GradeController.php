<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\ActivityGrade;
use App\Models\Grade;
use App\Models\Users;
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

    public function showGradeBreakdown($term, $year)
    {
        $grades = Grade::where('term', $term)
            ->where('year', $year)
            ->with(['student', 'professor', 'activities.activityGrades'])
            ->get();

        return view('academics.grade_breakdown', compact('grades'));
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

    // Link activity grade to a student
    public function storeActivityGrade(Request $request)
    {
        $validated = $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'grade_id' => 'required|exists:grades,id',
            'percentage' => 'required|numeric|min:0|max:100',
            'grade_acquired' => 'required|numeric|min:0|max:100',
        ]);

        $activityGrade = ActivityGrade::create([
            'activity_id' => $validated['activity_id'],
            'grade_id' => $validated['grade_id'],
            'percentage' => $validated['percentage'],
            'grade_acquired' => $validated['grade_acquired'],
        ]);

        return redirect()->back()->with('success', 'Activity grade added successfully.');
    }

    // Calculate final grade for a student based on activities
    public function calculateFinalGrade($userId, $term, $year)
    {
        $grades = Grade::where('user_id', $userId)
            ->where('term', $term)
            ->where('year', $year)
            ->with('activities.activityGrades')
            ->get();

        foreach ($grades as $grade) {
            $totalWeightedScore = 0;
            $totalWeight = 0;

            foreach ($grade->activities as $activity) {
                $activityGrade = $activity->activityGrades->first();
                if ($activityGrade) {
                    $totalWeightedScore += $activityGrade->grade_acquired * ($activityGrade->percentage / 100);
                    $totalWeight += $activityGrade->percentage;
                }
            }

            $grade->final_grade = $totalWeight > 0 ? $totalWeightedScore / $totalWeight : 0;
            $grade->save();
        }

        return redirect()->back()->with('success', 'Final grades calculated successfully.');
    }

    public function createActivity()
{
    $subjects = Subject::all(); 
    $students = Users::where('role_id', 7)->get(); 

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

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradeBreakdown;

class GradeController extends Controller
{
    public function showStudentActivities($studentId)
    {
        $activities = Activity::where('user_id', $studentId)->with('activityGrades')->get();

        return view('student.activities', compact('activities'));
    }

    // Show grade breakdown for a specific term and year
    public function showGradeBreakdown($term, $year)
    {
        $grades = Grade::where('term', $term)->where('year', $year)->with('activities')->get();

        return view('professor.grade_breakdown', compact('grades'));
    }

    // Add a new activity
    public function storeActivity(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'score' => 'required|numeric|min:0',
            'max_score' => 'required|numeric|min:0',
            'subject_id' => 'required|exists:subjects,id',
            'student_id' => 'required|exists:users,id', 
            'prof_id' => 'required|exists:users,id', 
        ]);

        $activity = Activity::create($validated);

        return redirect()->back()->with('success', 'Activity created successfully');
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

        $activityGrade = ActivityGrade::create($validated);

        return redirect()->back()->with('success', 'Activity grade added successfully');
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

        return redirect()->back()->with('success', 'Final grades calculated successfully');
    }
}

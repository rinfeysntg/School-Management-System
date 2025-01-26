<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\ActivityGrade;
use App\Models\Grade;
use App\Models\Users;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\GradePercentage;

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

public function showStudents(Request $request)
{
    $professor = session('user');

    $schedules = Schedule::where('user_id', $professor->id)->get();
    $subjectIds = $schedules->pluck('subject_id');
    $subjects = Subject::whereIn('id', $subjectIds)->get();

    $students = collect(); 

    if ($request->filled('subject_id') && $request->filled('block')) {
        $selectedSubjectId = $request->input('subject_id');
        $selectedBlock = $request->input('block');

        $scheduleForSubject = $schedules->where('subject_id', $selectedSubjectId)
            ->where('block', $selectedBlock)
            ->first();

        if ($scheduleForSubject) {
            $students = Users::where('course_id', $scheduleForSubject->course_id)
                ->where('year_level', $scheduleForSubject->year_level)
                ->where('block', $scheduleForSubject->block)
                ->get();
        }
    } else {
        $students = Users::whereIn('course_id', $schedules->pluck('course_id'))
            ->whereIn('year_level', $schedules->pluck('year_level'))
            ->whereIn('block', $schedules->pluck('block'))
            ->get();
    }

    $finalGrades = [];
    foreach ($students as $student) {
        $gradePercentage = GradePercentage::where('subject_id', $request->input('subject_id'))->first();

        if ($gradePercentage) {
            $activities = Activity::where('student_id', $student->id)
                ->where('subject_id', $request->input('subject_id'))
                ->get();

            // Initialize variables to calculate the grades
            $totalQuizGrade = 0;
            $totalExamGrade = 0;
            $totalAssignmentGrade = 0;
            $quizCount = 0;
            $examCount = 0;
            $assignmentCount = 0;

            // Loop through each activity and categorize them by type
            foreach ($activities as $activity) {
                if (str_contains(strtolower($activity->name), 'quiz')) {
                    $quizCount++;
                    $totalQuizGrade += $activity->grade;
                } elseif (str_contains(strtolower($activity->name), 'exam')) {
                    $examCount++;
                    $totalExamGrade += $activity->grade;
                } elseif (str_contains(strtolower($activity->name), 'assignment')) {
                    $assignmentCount++;
                    $totalAssignmentGrade += $activity->grade;
                }
            }

            // Average quiz grade if multiple quizzes
            if ($quizCount > 0) {
                $totalQuizGrade /= $quizCount;
            }
            if ($examCount > 0) {
                $totalExamGrade /= $examCount;
            }
            if ($assignmentCount > 0) {
                $totalAssignmentGrade /= $assignmentCount;
            }

            // Multiply by respective percentages
            $finalQuizGrade = $totalQuizGrade * ($gradePercentage->quiz_percentage / 100);
            $finalExamGrade = $totalExamGrade * ($gradePercentage->exam_percentage / 100);
            $finalAssignmentGrade = $totalAssignmentGrade * ($gradePercentage->assignment_percentage / 100);

            // Calculate final grade
            $finalGrade = $finalQuizGrade + $finalExamGrade + $finalAssignmentGrade;

            // Store the final grade
            $finalGrades[$student->id] = $finalGrade;
        }
    }

    return view('academics.students', compact('students', 'subjects', 'finalGrades', 'schedules'));
}

public function showStudentGrade(Request $request)
{
    $student = session('user');

    $schedules = Schedule::where('course_id', $student->course_id)
                         ->where('year_level', $student->year_level)
                         ->where('block', $student->block)
                         ->get();

    $subjects = Subject::whereIn('id', $schedules->pluck('subject_id'))->get();

    $finalGrades = [];
    $professors = [];

    foreach ($subjects as $subject) {

        $schedule = $schedules->where('subject_id', $subject->id)->first();
        
        if ($schedule) {
            $professor = Users::find($schedule->user_id); 
            $professors[$subject->id] = $professor; 
        }

        $gradePercentage = GradePercentage::where('subject_id', $subject->id)->first();

        if ($gradePercentage) {
            $activities = Activity::where('student_id', $student->id)
                ->where('subject_id', $subject->id)
                ->get();

            $totalQuizGrade = 0;
            $totalExamGrade = 0;
            $totalAssignmentGrade = 0;
            $quizCount = 0;
            $examCount = 0;
            $assignmentCount = 0;

            // Loop through activities and categorize them by type
            foreach ($activities as $activity) {
                if (str_contains(strtolower($activity->name), 'quiz')) {
                    $quizCount++;
                    $totalQuizGrade += $activity->grade;
                } elseif (str_contains(strtolower($activity->name), 'exam')) {
                    $examCount++;
                    $totalExamGrade += $activity->grade;
                } elseif (str_contains(strtolower($activity->name), 'assignment')) {
                    $assignmentCount++;
                    $totalAssignmentGrade += $activity->grade;
                }
            }

            // Average quiz, exam, and assignment grades if multiple
            if ($quizCount > 0) {
                $totalQuizGrade /= $quizCount;
            }
            if ($examCount > 0) {
                $totalExamGrade /= $examCount;
            }
            if ($assignmentCount > 0) {
                $totalAssignmentGrade /= $assignmentCount;
            }

            // Multiply by respective percentages
            $finalQuizGrade = $totalQuizGrade * ($gradePercentage->quiz_percentage / 100);
            $finalExamGrade = $totalExamGrade * ($gradePercentage->exam_percentage / 100);
            $finalAssignmentGrade = $totalAssignmentGrade * ($gradePercentage->assignment_percentage / 100);

            // Calculate final grade
            $finalGrade = $finalQuizGrade + $finalExamGrade + $finalAssignmentGrade;

            // Store the final grade for each subject
            $finalGrades[$subject->id] = $finalGrade;
        }
    }

    // Pass the data to the view
    return view('student.student_grade', compact('student', 'subjects', 'finalGrades', 'schedules', 'professors'));
}



}

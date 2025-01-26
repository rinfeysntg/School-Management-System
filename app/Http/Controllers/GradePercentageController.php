<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradePercentage;
use App\Models\Subject;
use App\Models\Schedule;

class GradePercentageController extends Controller
{
    public function index()
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Unauthorized access. Please log in.']);
        }

        $gradePercentages = GradePercentage::with('subject')
            ->where('prof_id', $user->id)
            ->get();

        return view('academics.grade_percentage_index', compact('gradePercentages'));
    }

    public function showForm()
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Unauthorized access. Please log in.']);
        }

        $schedules = Schedule::where('user_id', $user->id)->get();
        $subjects = Subject::whereIn('id', $schedules->pluck('subject_id'))->get();

        return view('academics.grade_percentage_form', compact('subjects'));
    }

    public function store(Request $request)
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Unauthorized access. Please log in.']);
        }

        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'quiz_percentage' => 'required|numeric|min:0|max:100',
            'exam_percentage' => 'required|numeric|min:0|max:100',
            'assignment_percentage' => 'required|numeric|min:0|max:100',
        ], [
            'subject_id.required' => 'Subject selection is required.',
            'subject_id.exists' => 'Selected subject does not exist.',
            'quiz_percentage.*' => 'Quiz percentage must be a number between 0 and 100.',
            'exam_percentage.*' => 'Exam percentage must be a number between 0 and 100.',
            'assignment_percentage.*' => 'Assignment percentage must be a number between 0 and 100.',
        ]);

        $totalPercentage = $validated['quiz_percentage'] + $validated['exam_percentage'] + $validated['assignment_percentage'];
        if ($totalPercentage != 100) {
            return redirect()->back()->withErrors(['error' => 'The total percentages must add up to 100%.']);
        }

        // Check for duplicate
        $existing = GradePercentage::where('subject_id', $validated['subject_id'])
            ->where('prof_id', $user->id)
            ->first();
        if ($existing) {
            return redirect()->back()->withErrors(['error' => 'Grade percentages for this subject already exist.']);
        }

        GradePercentage::create([
            'subject_id' => $validated['subject_id'],
            'quiz_percentage' => $validated['quiz_percentage'],
            'exam_percentage' => $validated['exam_percentage'],
            'assignment_percentage' => $validated['assignment_percentage'],
            'prof_id' => $user->id,
        ]);

        return redirect()->route('grade_percentages.index')->with('success', 'Grade percentages created successfully.');
    }

    public function edit($subjectId)
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Unauthorized access. Please log in.']);
        }

        $gradePercentage = GradePercentage::where('subject_id', $subjectId)
            ->where('prof_id', $user->id)
            ->first();

        if (!$gradePercentage) {
            return redirect()->route('grade_percentages.index')->with('error', 'Grade percentage not found.');
        }

        $schedules = Schedule::where('user_id', $user->id)->get();
        $subjects = Subject::whereIn('id', $schedules->pluck('subject_id'))->get();

        return view('academics.grade_percentage_edit', compact('subjects', 'gradePercentage'));
    }

    public function update(Request $request, $subjectId)
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Unauthorized access. Please log in.']);
        }

        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'quiz_percentage' => 'required|numeric|min:0|max:100',
            'exam_percentage' => 'required|numeric|min:0|max:100',
            'assignment_percentage' => 'required|numeric|min:0|max:100',
        ]);

        $totalPercentage = $validated['quiz_percentage'] + $validated['exam_percentage'] + $validated['assignment_percentage'];
        if ($totalPercentage != 100) {
            return redirect()->back()->withErrors(['error' => 'The total percentages must add up to 100%.']);
        }

        $gradePercentage = GradePercentage::where('subject_id', $subjectId)
            ->where('prof_id', $user->id)
            ->first();

        if ($gradePercentage) {
            $gradePercentage->update([
                'quiz_percentage' => $validated['quiz_percentage'],
                'exam_percentage' => $validated['exam_percentage'],
                'assignment_percentage' => $validated['assignment_percentage'],
            ]);

            return redirect()->route('grade_percentages.index')->with('success', 'Grade percentages updated successfully.');
        }

        return redirect()->route('grade_percentages.index')->with('error', 'Grade percentage not found.');
    }

    public function destroy($subjectId)
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Unauthorized access. Please log in.']);
        }

        $gradePercentage = GradePercentage::where('subject_id', $subjectId)
            ->where('prof_id', $user->id)
            ->first();

        if ($gradePercentage) {
            $gradePercentage->delete();
            return redirect()->route('grade_percentages.index')->with('success', 'Grade percentages deleted successfully.');
        }

        return redirect()->route('grade_percentages.index')->with('error', 'No grade percentages found.');
    }
}

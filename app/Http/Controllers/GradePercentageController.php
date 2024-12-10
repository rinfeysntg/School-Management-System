<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradePercentage;
use App\Models\Subject;


class GradePercentageController extends Controller
{
    public function index()
    {
        $gradePercentages = GradePercentage::with('subject')->get();
        return view('academics.grade_percentage_index', compact('gradePercentages'));
    }

    // Display the form to create or update grade percentages
    public function showForm()
    {
        $subjects = Subject::all();  // Get all subjects to display in the dropdown
        
        return view('academics.grade_percentage_form', compact('subjects'));
    }

    public function store(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',  // Ensure the subject exists
            'quiz_percentage' => 'required|numeric|min:0|max:100',
            'exam_percentage' => 'required|numeric|min:0|max:100',
            'assignment_percentage' => 'required|numeric|min:0|max:100',
        ]);
    
        // Check if the percentages add up to 100%
        $totalPercentage = $validated['quiz_percentage'] + $validated['exam_percentage'] + $validated['assignment_percentage'];
        if ($totalPercentage != 100) {
            return redirect()->back()->withErrors(['error' => 'The total percentages must add up to 100%']);
        }
    
        // Create the grade percentage record
        GradePercentage::create([
            'subject_id' => $validated['subject_id'],
            'quiz_percentage' => $validated['quiz_percentage'],
            'exam_percentage' => $validated['exam_percentage'],
            'assignment_percentage' => $validated['assignment_percentage'],
        ]);
    
        // Redirect to the index page with success message
        return redirect()->route('grade_percentages.index')->with('success', 'Grade percentages created successfully.');
    }
    

    // Show the form to edit grade percentages for a specific subject
    public function edit($subjectId)
{
    // Retrieve the list of subjects and the grade percentage for the specific subject
    $subjects = Subject::all();
    $gradePercentage = GradePercentage::where('subject_id', $subjectId)->first();

    // If no grade percentage is found, redirect with an error
    if (!$gradePercentage) {
        return redirect()->route('grade_percentages.index')->with('error', 'Grade percentage not found.');
    }

    // Pass the subjects and grade percentage to the view
    return view('academics.grade_percentage_edit', compact('subjects', 'gradePercentage'));
}

    // Update grade percentages
    public function update(Request $request, $subjectId)
{
    // Validate the input data
    $validated = $request->validate([
        'subject_id' => 'required|exists:subjects,id', // Ensure the subject exists
        'quiz_percentage' => 'required|numeric|min:0|max:100',
        'exam_percentage' => 'required|numeric|min:0|max:100',
        'assignment_percentage' => 'required|numeric|min:0|max:100',
    ]);

    // Check if the percentages add up to 100%
    $totalPercentage = $validated['quiz_percentage'] + $validated['exam_percentage'] + $validated['assignment_percentage'];
    if ($totalPercentage != 100) {
        return redirect()->back()->withErrors(['error' => 'The total percentages must add up to 100%']);
    }

    // Find the grade percentage record by subject_id and update
    $gradePercentage = GradePercentage::where('subject_id', $subjectId)->first();

    if ($gradePercentage) {
        // Update the grade percentage record
        $gradePercentage->update([
            'quiz_percentage' => $validated['quiz_percentage'],
            'exam_percentage' => $validated['exam_percentage'],
            'assignment_percentage' => $validated['assignment_percentage'],
        ]);

        // Redirect to the index page with success message
        return redirect()->route('grade_percentages.index')->with('success', 'Grade percentages updated successfully.');
    }

    // If grade percentage not found, redirect with an error message
    return redirect()->route('grade_percentages.index')->with('error', 'Grade percentage not found.');
}
    // Delete grade percentages for a subject
    public function destroy($subjectId)
    {
        $gradePercentage = GradePercentage::where('subject_id', $subjectId)->first();

        if ($gradePercentage) {
            $gradePercentage->delete();
            return redirect()->route('grade_percentages.index')->with('success', 'Grade percentages deleted successfully.');
        }

        return redirect()->route('grade_percentages.index')->with('error', 'No grade percentages found.');
    }
}

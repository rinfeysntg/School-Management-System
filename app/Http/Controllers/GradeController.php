<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradeBreakdown;

class GradeController extends Controller
{
    // Show the grade breakdown for all students
    public function showGradeBreakdown()
    {
        // Fetch all grade breakdown records from the database
        $gradeBreakdowns = GradeBreakdown::all();

        // Return the view with the data
        return view('professor.grade_breakdown', compact('gradeBreakdowns'));
    }

    // Show the form to calculate grade
    public function showCalculateGradeForm()
    {
        return view('professor.calculate_grade');
    }

    // Store grade breakdown data
    public function storeGradeBreakdown(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'attendance' => 'required|numeric|min:0|max:100',
            'quizzes' => 'required|numeric|min:0|max:100',
            'assignments' => 'required|numeric|min:0|max:100',
            'exams' => 'required|numeric|min:0|max:100',
        ]);

        // Create a new grade breakdown entry
        $gradeBreakdown = GradeBreakdown::create([
            'name' => $validated['name'],
            'attendance' => $validated['attendance'],
            'quizzes' => $validated['quizzes'],
            'assignments' => $validated['assignments'],
            'exams' => $validated['exams'],
        ]);

        // Calculate the final grade (you can adjust the calculation as needed)
        $gradeBreakdown->final_grade = $this->calculateFinalGrade($gradeBreakdown);
        $gradeBreakdown->save();

        return redirect()->route('professor.grade_breakdown')->with('success', 'Grade Breakdown created successfully');
    }

    // Calculate the final grade based on attendance, quizzes, assignments, and exams
    private function calculateFinalGrade(GradeBreakdown $gradeBreakdown)
    {
        // Example calculation: Adjust weights based on your requirements
        return ($gradeBreakdown->attendance * 0.2) + 
               ($gradeBreakdown->quizzes * 0.3) + 
               ($gradeBreakdown->assignments * 0.2) + 
               ($gradeBreakdown->exams * 0.3);
    }
}

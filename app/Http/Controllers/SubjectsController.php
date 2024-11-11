<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function create()
    {
        return view('subjects.create_subject');
    }

    public function store(Request $request)
    {
        Subject::create([
            'code' => $request->get('code'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'curriculum_id' => $request->get('curriculum_id')
        ]);

        return redirect()->route('subject_home')->with('success', 'Subject created successfully!');
    }

    // public function StudentIndex()
    // {
        
    // $subjects = Subject::all(); 

    // return view('subjects.student_subjects', compact('subjects'));
    // }
    public function AdminIndex()
    {
        $subjects = Subject::all();
        return view('subjects.admin_subjects', compact('subjects'));
    }

    
}


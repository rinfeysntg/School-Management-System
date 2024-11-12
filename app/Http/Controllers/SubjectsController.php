<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function create()
    {
        $curriculums = Curriculum::all();
        return view('subjects.create_subject', compact('curriculums'));
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'curriculum_id' => 'required|exists:curriculums,id',
        ]);

        
        Subject::create($validated);

        
        return redirect()->route('curriculums_index')->with('success', 'Subject created successfully!');
    }

    public function AdminIndex()
    {
        $subjects = Subject::all();
        return view('subjects.subjects', compact('subjects'));
    }

    
}


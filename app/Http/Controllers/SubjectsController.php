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
            'description' => 'nullable|string',
            'curriculum_id' => 'required|exists:curriculums,id',
        ]);

        
        Subject::create($validated);

        
        return redirect()->route('curriculums_index');
    }

    public function AdminIndex()
    {
        $subjects = Subject::all();
        return view('subjects.subjects', compact('subjects'));
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($request->all());

        return redirect()->route('subjects');
    }

    
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subjects');
    }

}


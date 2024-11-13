<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
   
    public function index()
    {
        $curriculums = Curriculum::all();
        return view('subjects.curriculums.index_curriculum', compact('curriculums'));
    }

    
    public function create()
    {
                                                                                 
        $courses = Course::all();
        return view('subjects.curriculums.create_curriculum', compact('courses'));
    }

   
    public function store(Request $request)
    {
     
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'program_head' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id'                   
        ]);

        
        Curriculum::create($request->all());

        
        return redirect()->route('curriculums_index');
    }

    public function show($id)
    {
        $curriculum = Curriculum::with('subjects')->findOrFail($id);
        return view('subjects.curriculums.show', compact('curriculum'));
    }
}

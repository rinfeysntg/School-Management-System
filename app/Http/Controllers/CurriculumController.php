<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Course;
use Illuminate\Http\Request;


class CurriculumController extends Controller
{
   
    public function index(Request $request)
    {
        $curriculums = Curriculum::all();
        $courses = Course::all();

        if ($request->has('course_id') && $request->course_id != '') {
            $curriculums = Curriculum::where('course_id', $request->course_id)->get();
        } else {
            $curriculums = collect();
        }

        return view('subjects.curriculums.index_curriculum', compact('curriculums', 'courses'));
    }

    
    public function create()
    {
                                                                                 
        $courses = Course::all();
        return view('subjects.curriculums.create_curriculum', compact('courses'));
    }

   
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'program_head' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id' 
        ]);
    
        
        Curriculum::create([
            'code' => $validated['code'],
            'name' => $validated['name'],
            'program_head' => $validated['program_head'],
            'course_id' => $validated['course_id'], 
        ]);
    
        
        return redirect()->route('curriculums_index');
    }

    public function show($id)
    {
        $courses = Course::all();
        $curriculum = Curriculum::with('subjects')->findOrFail($id);
        return view('subjects.curriculums.show', compact('curriculum'));
    }

    public function edit($id)
    {
        $courses = Course::all();
        $curriculum = Curriculum::findOrFail($id);
        return view('subjects.curriculums.edit_cur', compact('curriculum','courses'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'program_head' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id' 
        ]);

        $curriculum = Curriculum::findOrFail($id);
        $curriculum->update($request->all());

        return redirect()->route('curriculums_index');
    }

    
    public function destroy($id)
    {
        $curriculum = Curriculum::findOrFail($id);
        $curriculum->delete();

        return redirect()->route('curriculums_index');
    }
}

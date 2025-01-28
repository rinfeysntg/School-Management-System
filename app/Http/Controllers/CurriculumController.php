<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Course;
use App\Models\Users;
use App\Models\Subject;
use Illuminate\Http\Request;


class CurriculumController extends Controller
{
   
    public function index(Request $request)
{
    $courses = Course::all();
    
    $curriculums = Curriculum::with('user');
    if ($request->has('course_id') && $request->course_id != '') {
        $curriculums = $curriculums->where('course_id', $request->course_id);
    }

    
    $curriculums = $curriculums->get();

    return view('subjects.curriculums.index_curriculum', compact('curriculums', 'courses'));
}

    public function programheadIndex() {

        $user = session('user');


            if ($user->role_id == 4) {
                $curriculums = Curriculum::where('user_id', $user->id)->get();
            } else {
                $curriculums = collect();
            }

            return view('subjects.curriculums.index_program_head', compact('curriculums'));
    }

    public function programheadShow($id)
{
    $user = session('user');

    // Find the curriculum and ensure it belongs to the logged-in Program Head
    $curriculum = Curriculum::where('id', $id)
                            ->where('user_id', $user->id)  // Ensure the curriculum is assigned to the Program Head
                            ->with('subjects')
                            ->firstOrFail();

    return view('subjects.curriculums.show_programhead', compact('curriculum'));
}
    
    public function create()
    {
                                                                                 
        $courses = Course::all();
        $users = Users::whereHas('role', function ($query) {
            $query->where('name', 'program_head');
        })->get();
        return view('subjects.curriculums.create_curriculum', compact('courses', 'users'));
    }

   
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:curriculums,code',
            'name' => 'required|string|max:255|unique:curriculums,name',
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id' 
        ]);
    
        
        Curriculum::create([
            'code' => $validated['code'],
            'name' => $validated['name'],
            'user_id' => $validated['user_id'],
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

    public function listSubjects($curriculumId)
    {
        $curriculum = Curriculum::findOrFail($curriculumId); 
        $subjects = Subject::all();

        return view('subjects.list_subjects', compact('subjects', 'curriculum'));
    }


    public function showSchedule($curriculumId)
    {
        $curriculum = Curriculum::with('schedules')->findOrFail($curriculumId);
        return view('schedule.index_sched', compact('curriculum'));
    }

    public function edit($id)
{
    $courses = Course::all();
    $users = Users::all();
    $curriculum = Curriculum::findOrFail($id);

    return view('subjects.curriculums.edit_cur', compact('curriculum', 'courses', 'users'));
}


    
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:curriculums,code,' . $id,
            'name' => 'required|string|max:255|unique:curriculums,name,' . $id,
            'user_id' => 'required|exists:users,id',
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

    public function attachSubjects(Request $request, $id)
{
    $curriculum = Curriculum::findOrFail($id);

    
    $request->validate([
        'subjects' => 'array',
        'subjects.*' => 'exists:subjects,id',
    ]);

   
    $curriculum->subjects()->syncWithoutDetaching($request->input('subjects', []));

    return view('subjects.curriculums.show', compact('curriculum'));
}

    public function detachSubject($curriculumId, $subjectId)
    {
       $curriculum = Curriculum::findOrFail($curriculumId);

       $curriculum->subjects()->detach($subjectId);

       return view('subjects.curriculums.show', compact('curriculum'));
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;

class DepartmentController extends Controller
{
    public function create()
    {
        return view('dept.create_dept'); 
    }

   
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'building_id' => 'required|integer', 
        ]);

        
        Department::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'building_id' => $request->input('building_id'),
        ]);

        return redirect()->route('dept.index')->with('success', 'Department created successfully!');
    }

   
    public function index()
    {
        $depts = Department::all(); 
        return view('dept.view_rooms', compact('depts')); 
    }

    //EDIT//

    public function edit($id)
{
    $dept = dept::findOrFail($id); 
    return view('dept.edit_dept', compact('dept')); 
}

public function update(Request $request, $id)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'building_id' => 'required|integer',
    ]);

   
    $dept = Department::findOrFail($id);
    $dept->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'building_id' => $request->input('building_id'),
    ]);

    return redirect()->route('dept.index')->with('success', 'DEpartment updated successfully!');
}


public function destroy($id)
{
    $dept = Department::findOrFail($id); 
    $dept->delete(); 

    return redirect()->route('dept.index')->with('success', 'Department deleted successfully!');
}
}

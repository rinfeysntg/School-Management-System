<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;

class DepartmentController extends Controller
{
    public function create()
    {
        return view('department.create_dept'); 
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

        return redirect()->route('department.index')->with('success', 'Department created successfully!');
    }

   
    public function index()
    {
        $departments = Department::all(); 
        return view('department.view_dept', compact('departments')); 
    }

    //EDIT//

    public function edit($id)
{
    $department = Department::findOrFail($id); 
    return view('department.edit_dept', compact('department')); 
}

public function update(Request $request, $id)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'building_id' => 'required|integer',
    ]);

   
    $department = Department::findOrFail($id);
    $department->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'building_id' => $request->input('building_id'),
    ]);

    return redirect()->route('department.index')->with('success', 'Department updated successfully!');
}


public function destroy($id)
{
    $department = Department::findOrFail($id); 
    $department->delete(); 

    return redirect()->route('department.index')->with('success', 'Department deleted successfully!');
}
}

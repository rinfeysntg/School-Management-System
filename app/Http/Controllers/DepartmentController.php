<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Building;

class DepartmentController extends Controller
{
    public function create()
    {
        $buildings = Building::all();
        return view('department.create_dept', compact('buildings'));
    }

   
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name',
            'description' => 'nullable|string',
            'building_id' => 'required|exists:buildings,id' 
        ]);

        
        Department::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'building_id' => $validated['building_id'],
        ]);

        return redirect()->route('department.index')->with('success', 'Department created successfully!');
    }

   
    public function index(Request $request)
    {
        $departments = Department::all(); 
        $buildings = Building::all();

        if ($request->has('building_id') && $request->building_id != '') {
            $departments = Department::where('building_id', $request->building_id)->get();
        } else {
            $departments = collect();
        }

        return view('department.view_dept', compact('departments', 'buildings')); 
    }

    public function show($id)
    {
        $buildings = Building::all();
        $departments = Department::with('buildings')->findOrFail($id);
        return view('department.view_dept', compact('departments'));
    }

    //EDIT//

    public function edit($id)
{
    $department = Department::findOrFail($id); 
    $buildings = Building::all();
    return view('department.edit_dept', compact('department', 'buildings')); 
}

public function update(Request $request, $id)
{
    
    $request->validate([
        'name' => 'required|string|max:255|unique:departments,name',
        'description' => 'nullable|string',
        'building_id' => 'required|exists:buildings,id',
    ]);

   
    $department = Department::findOrFail($id);
    $department->update($request->all());

    return redirect()->route('department.index')->with('success', 'Department updated successfully!');
}


public function destroy($id)
{
    $department = Department::findOrFail($id); 
    $department->delete(); 

    return redirect()->route('department.index')->with('success', 'Department deleted successfully!');
}
}

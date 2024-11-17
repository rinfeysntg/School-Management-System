<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dtr;
use App\Models\Employee; // Assuming you have an Employee model

class DtrController extends Controller
{
    // Show the DTR form for time in/out
    public function showForm()
    {
        $employees = Employee::all(); // Get the list of all employees
        return view('attendance.dtr.form', compact('employees')); // Pass the employees list to the form view
    }

    // Store the DTR record
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'employee_id' => 'required|exists:employees,id', // Ensure the employee exists in the database
            'date' => 'required|date', // Validate date format
            'time_in' => 'required|date_format:H:i', // Validate time_in format
            'time_out' => 'nullable|date_format:H:i|after:time_in', // Validate time_out format, if provided, and ensure it's after time_in
        ]);

        // Store the new DTR record
        Dtr::create([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
        ]);
        

        // Redirect to the DTR index page with a success message
        return redirect()->route('dtr.index')->with('success', 'DTR record saved successfully!');
    }

    // Display all DTR records
    public function index()
    {
        // Fetch DTR records along with employee details
        $dtrs = Dtr::with('employee')->get();
        return view('attendance.dtr.index', compact('dtrs')); // Pass the DTR records to the view
    }

    // Show a single DTR record
    public function show($id)
    {
        $dtr = Dtr::with('employee')->findOrFail($id); // Fetch the DTR record with the associated employee
        return view('attendance.dtr.show', compact('dtr')); // Pass the DTR record to the show view
    }
}

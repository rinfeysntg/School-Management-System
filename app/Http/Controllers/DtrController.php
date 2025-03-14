<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dtr;
use App\Models\Users; // Assuming you have an Employee model

class DtrController extends Controller
{
    // Show the DTR form for time in/out
    public function showForm()
    {
        $employees = Users::where('role_id', '!=', 6)->get();
        return view('attendance.dtr.form', compact('employees')); // Pass the employees list to the form view
    }

    // Store the DTR record
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'employee_id' => 'required|exists:users,id', // Ensure the employee exists in the database
            // 'date' => 'required|date', // Validate date format
            // 'time_in' => 'required|date_format:H:i', // Validate time_in format
            // 'time_out' => 'nullable|date_format:H:i|after:time_in', // Validate time_out format, if provided, and ensure it's after time_in
        ]);
        
        
        $currentDate = now()->format('Y-m-d');
        $currentTime = now()->format('H:i:s');

        $data = Dtr::where('employee_id', $request->input('employee_id'))
                    ->whereDate('created_at', $currentDate)
                    ->first();

        if ($data) {
            $data->time_out = $currentTime;
            $data->save();
        } else {
            $newData = new Dtr();
            $newData->employee_id = $request->input('employee_id');
            $newData->date = $currentDate;
            $newData->time_in = $currentTime;
            $newData->save();
        }

        // Store the new DTR record
        // Dtr::create([
        //     'employee_id' => $request->employee_id,
        //     'date' => $request->date,
        //     'time_in' => $request->time_in,
        //     'time_out' => $request->time_out,
        // ]);
        

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

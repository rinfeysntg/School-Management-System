<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentDashboard extends Controller
{
    public function index()
    {

        return view('departmentDashboard');
    }
}

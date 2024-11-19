<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Students extends Controller
{
    public function index()
    {

        return view('student.student_dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class enrollmentDashboard extends Controller
{
    public function index()
    {

        return view('enrollmentDashboard');
    }
}
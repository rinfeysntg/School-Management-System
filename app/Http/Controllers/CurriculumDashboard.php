<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurriculumDashboard extends Controller
{
    public function index()
    {

        return view('curriculumDashboard');
    }
}

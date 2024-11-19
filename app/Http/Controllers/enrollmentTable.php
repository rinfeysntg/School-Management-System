<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class enrollmentTable extends Controller
{
    public function index()
    {

        return view('enrollment.enrollmentTable');
    }
}

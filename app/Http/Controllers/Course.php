<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Course extends Controller
{
    public function index()
    {

        return view('course');
    }
}

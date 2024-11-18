<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Enrollment extends Controller
{
    public function index()
    {

        return view('enrollment');
    }
}

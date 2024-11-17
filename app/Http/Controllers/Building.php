<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Building extends Controller
{
    public function index()
    {

        return view('building');
    }
}

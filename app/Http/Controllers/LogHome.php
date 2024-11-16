<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogHome extends Controller
{
    public function index()
    {

        return view('login');
    }
}

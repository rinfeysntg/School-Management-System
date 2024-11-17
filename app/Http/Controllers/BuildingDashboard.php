<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildingDashboard extends Controller
{
    public function index()
    {

        return view('buildingDashboard');
    }
}

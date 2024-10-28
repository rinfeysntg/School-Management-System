<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayrollDashboardController extends Controller
{
    //
    public function index()
    {
        $names = array(array('first_name' => 'Simone Roy', 'surname'=>'Abello'), array('first_name'=> 'Princess', 'surname'=>'Javier'), array('first_name'=>'Jake', 'surname'=>'The Dog'));
        return view('payroll_dashboard')->with('names', $names);
    }
}

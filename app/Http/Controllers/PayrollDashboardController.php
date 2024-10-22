<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayrollDashboardController extends Controller
{
    //
    public function index()
    {
        return view('payroll_dashboard');
    }
}

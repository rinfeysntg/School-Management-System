<?php

use App\Http\Controllers\PayrollDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('login');
});

Route::get('/payroll_dashboard', [PayrollDashboardController::class, 'index']);
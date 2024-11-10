<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

// Route for the login page
Route::get('/', function (){
    return view('login');
});

// Route for the registrar dashboard
Route::get('/registrar', function (){
    return view('registrar.registrar_dashboard');
});

// Route for creating a building
Route::get('/create_building', function (){
    return view('registrar.create_building');
});

// Route for creating payments
Route::get('/create_payments', function (){
    return view('create_payments'); // Ensure this matches the location of your Blade file
});

// Route to store the payment data
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentHistoryController; // Add a new controller for payment history

// Route for the login page
Route::get('/', function () {
    return view('login');
});

// Route for the registrar dashboard
Route::get('/registrar', function () {
    return view('registrar.registrar_dashboard');
});

// Route for creating a building
Route::get('/create_building', function () {
    return view('registrar.create_building');
});

// Route for creating payments
Route::get('/create_payments', function () {
    return view('create_payments'); // Ensure this matches the location of your Blade file
});

// Route to store the payment data
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

// New Route for Viewing Payment History
Route::get('/payment-history', [PaymentHistoryController::class, 'index'])->name('payment.history');

// New Route for Finalizing Payment
Route::get('/payment-done', [PaymentController::class, 'done'])->name('payment.done');

// New Route to view specific payment details
Route::get('/payment-details/{id}', [PaymentController::class, 'show'])->name('payment.details');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAuth;

Route::get('/', function (){
    return view('login');
});

Route::post('/login', [LoginAuth::class, 'Login'])->name('login');

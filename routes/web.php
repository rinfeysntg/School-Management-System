<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAuth;
use App\Http\Controllers\Registrar;
use App\Http\Controllers\Department;

Route::get('/', function (){
    return view('login');
});

// initial login funct
Route::post('/login', [LoginAuth::class, 'Login'])->name('login');

// registrar site
Route::get('/registrar', [Registrar::class, 'index'])->name('registrar');
Route::get('/department', [Department::class, 'index'])->name('department');





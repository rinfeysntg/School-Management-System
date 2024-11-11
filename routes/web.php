<?php

use App\Http\Controllers\SubjectsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('login');
});

//test

Route::get('/registrar', function (){
    return view('registrar.registrar_dashboard');
});

Route::get('/create_building', function (){
    return view('registrar.create_building');
});

//subjects
Route::get('/admin/subjects', [SubjectsController::class, 'AdminIndex'])->name('admin_subjects');
Route::get('/subjects/create', [SubjectsController::class, 'create'])->name('create_subject');
Route::post('/subjects/store', [SubjectsController::class, 'store'])->name('store_subject');
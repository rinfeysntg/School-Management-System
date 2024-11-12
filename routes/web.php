<?php

use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\CurriculumController;
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

// Subjects
Route::get('/subjects', [SubjectsController::class, 'AdminIndex'])->name('subjects');
Route::get('/subjects/create', [SubjectsController::class, 'create'])->name('create_subject');
Route::post('/subjects/store', [SubjectsController::class, 'store'])->name('store_subject');

// Curriculum
Route::get('/curriculums', [CurriculumController::class, 'index'])->name('curriculums_index');
Route::get('/curriculums/create', [CurriculumController::class, 'create'])->name('curriculums_create');
Route::post('/curriculums', [CurriculumController::class, 'store'])->name('curriculums_store');
Route::get('/curriculums/{id}', [CurriculumController::class, 'show'])->name('curriculums_show');
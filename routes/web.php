<?php

use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\PayrollDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AnnouncementCreateController;

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
Route::get('/subjects/{id}/edit', [SubjectsController::class, 'edit'])->name('subjects_edit');
Route::put('/subjects/{id}', [SubjectsController::class, 'update'])->name('subjects_update');
Route::delete('/subjects/{id}', [SubjectsController::class, 'destroy'])->name('subjects_destroy');
// Curriculum
Route::get('/curriculums', [CurriculumController::class, 'index'])->name('curriculums_index');
Route::get('/curriculums/create', [CurriculumController::class, 'create'])->name('curriculums_create');
Route::post('/curriculums', [CurriculumController::class, 'store'])->name('curriculums_store');
Route::get('/curriculums/{id}', [CurriculumController::class, 'show'])->name('curriculums_show');
Route::get('/curriculums/{id}/edit', [CurriculumController::class, 'edit'])->name('curriculums_edit');
Route::put('/curriculums/{id}', [CurriculumController::class, 'update'])->name('curriculums_update');
Route::delete('/curriculums/{id}', [CurriculumController::class, 'destroy'])->name('curriculums_destroy');
// Payroll
Route::get('/payroll_dashboard', [PayrollDashboardController::class, 'index']);

// Announcement

Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcements.announcement');
Route::get('/announcement/create', [AnnouncementCreateController::class, 'create'])->name('announcement.create');
Route::post('/announcement', [AnnouncementCreateController::class, 'store'])->name('announcement.store');
Route::delete('/announcement/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
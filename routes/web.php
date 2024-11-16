<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAuth;
use App\Http\Controllers\Registrar;
use App\Http\Controllers\Department;
use App\Http\Controllers\Course;
use App\Http\Controllers\Curriculum;
use App\Http\Controllers\LogHome;
use App\Http\Controllers\CourseDashboard;
use App\Http\Controllers\CurriculumDashboard;
use App\Http\Controllers\DepartmentDashboard;

Route::get('/', function (){
    return view('login');
});

Route::get('/', [LogHome::class, 'index'])->name('/');

// initial login funct
Route::post('/login', [LoginAuth::class, 'Login'])->name('login');

// registrar site
Route::get('/registrar', [Registrar::class, 'index'])->name('registrar');
Route::get('/department', [Department::class, 'index'])->name('department');
Route::get('/departmentdashboard', [DepartmentDashboard::class, 'index'])->name('departmentDashboard');
Route::get('/course', [Course::class, 'index'])->name('course');
Route::get('/coursedashboard', [CourseDashboard::class, 'index'])->name('courseDashboard');
Route::get('/curriculum', [Curriculum::class, 'index'])->name('curriculum');
Route::get('/curriculumdashboard', [CurriculumDashboard::class, 'index'])->name('curriculumDashboard');





<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAuth;
use App\Http\Controllers\Registrar;
use App\Http\Controllers\Department;
use App\Http\Controllers\Course;
use App\Http\Controllers\Curriculum;
use App\Http\Controllers\Subject;
use App\Http\Controllers\Building;
use App\Http\Controllers\buildingTable;
use App\Http\Controllers\departmentTable;
use App\Http\Controllers\courseTable;
use App\Http\Controllers\curriculumTable;


Route::get('/', function (){
    return view('login');
});

// initial login funct
Route::post('/login', [LoginAuth::class, 'Login'])->name('login');

// registrar site
Route::get('/registrar', [Registrar::class, 'index'])->name('registrar');
Route::get('/department', [Department::class, 'index'])->name('department');
Route::get('/course', [Course::class, 'index'])->name('course');
Route::get('/curriculum', [Curriculum::class, 'index'])->name('curriculum');
Route::get('/subject', [Subject::class, 'index'])->name('subject');
Route::get('/building', [Building::class, 'index'])->name('building');
Route::get('/buildingTable', [buildingTable::class, 'index'])->name('buildingTable');
Route::get('/departmentTable', [departmentTable::class, 'index'])->name('departmentTable');
Route::get('/courseTable', [courseTable::class, 'index'])->name('courseTable');
Route::get('/curriculumTable', [curriculumTable::class, 'index'])->name('curriculumTable');




<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAuth;
use App\Http\Controllers\Registrar;
use App\Http\Controllers\Department;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Curriculum;
use App\Http\Controllers\Subject;
use App\Http\Controllers\Building;
use App\Http\Controllers\buildingTable;
use App\Http\Controllers\departmentTable;
use App\Http\Controllers\courseTabledashboard;
use App\Http\Controllers\curriculumTable;

use App\Http\Controllers\LogHome;
use App\Http\Controllers\CourseDashboard;
use App\Http\Controllers\CurriculumDashboard;
use App\Http\Controllers\DepartmentDashboard;
use App\Http\Controllers\BuildingDashboard;
use App\Http\Controllers\courseEditController;

// Route::get('/', function (){
//     return view('login');
// });

Route::get('/', [LoginAuth::class, 'Unback']);
Route::get('/login', [LoginAuth::class, 'Unback']);


Route::get('login', [LoginAuth::class, 'LoginPage'])->name('login');
Route::post('login', [LoginAuth::class, 'login']);
Route::get('logout', [LoginAuth::class, 'logout'])->name('logout');


// registrar site
Route::get('/registrar', [Registrar::class, 'index'])->name('registrar');



Route::get('/department', [Department::class, 'index'])->name('department');
Route::get('/departmentdashboard', [DepartmentDashboard::class, 'index'])->name('departmentDashboard');


// dashboard course
Route::get('/coursedashboard', [CourseDashboard::class, 'index'])->name('courseDashboard');

//add course
Route::get('/course', [CourseController::class, 'createCourse'])->name('course');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

//course table
// Route for the course table dashboard
Route::get('/course-table', [courseTabledashboard::class, 'index'])->name('courseTable');

// Route for editing a course
Route::get('/course/{id}/edit', [courseEditController::class, 'edit'])->name('courses.edit');
Route::put('/course/{id}', [courseEditController::class, 'update'])->name('courses.update');
// Route for deleting a course
Route::get('/course-table/delete/{id}', [courseEditController::class, 'destroy'])->name('courseTable.delete');



Route::get('/curriculum', [Curriculum::class, 'index'])->name('curriculum');
Route::get('/curriculumdashboard', [CurriculumDashboard::class, 'index'])->name('curriculumDashboard');



Route::get('/subject', [Subject::class, 'index'])->name('subject');



Route::get('/building', [Building::class, 'index'])->name('building');
Route::get('/buildingdashboard', [BuildingDashboard::class, 'index'])->name('buildingDashboard');
Route::get('/buildingTable', [buildingTable::class, 'index'])->name('buildingTable');



Route::get('/departmentTable', [departmentTable::class, 'index'])->name('departmentTable');
Route::get('/curriculumTable', [curriculumTable::class, 'index'])->name('curriculumTable');




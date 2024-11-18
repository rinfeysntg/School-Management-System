<?php

use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\PayrollDashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginAuth;
use App\Http\Controllers\Registrar;
use App\Http\Controllers\Department;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\courseTabledashboard;
use App\Http\Controllers\LogHome;
use App\Http\Controllers\CourseDashboard;
use App\Http\Controllers\courseEditController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DtrController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AnnouncementCreateController;

Route::get('/', function () {
    return view('login');
});

// login routes
Route::get('/', [LoginAuth::class, 'Unback']);
Route::get('/login', [LoginAuth::class, 'Unback']);
Route::get('login', [LoginAuth::class, 'LoginPage'])->name('login');
Route::post('login', [LoginAuth::class, 'login']);
Route::get('logout', [LoginAuth::class, 'logout'])->name('logout');


// registrar site
Route::get('/registrar', [Registrar::class, 'index'])->name('registrar');


// Test routes
Route::get('/student', function () {
    return view('student.student_dashboard');
});

Route::get('/treasury', function () {
    return view('treasury.treasury_dashboard');
});

Route::get('/program-head', function () {
    return view('program-head.program-head_dashboard');
});

//Course
Route::get('/coursedashboard', [CourseDashboard::class, 'index'])->name('courseDashboard');
Route::get('/course', [CourseController::class, 'createCourse'])->name('course');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/course-table', [courseTabledashboard::class, 'index'])->name('courseTable');
Route::get('/course/{id}/edit', [courseEditController::class, 'edit'])->name('courses.edit');
Route::put('/course/{id}', [courseEditController::class, 'update'])->name('courses.update');
Route::get('/course-table/delete/{id}', [courseEditController::class, 'destroy'])->name('courseTable.delete');

// Building
Route::get('/buildings', [BuildingController::class, 'index'])->name('building.index');
Route::get('/rooms/create_building', [BuildingController::class, 'create'])->name('building.create');
Route::post('/buildings', [BuildingController::class, 'store'])->name('building.store');
Route::get('/buildings/{id}/edit', [BuildingController::class, 'edit'])->name('building.edit');
Route::put('/buildings/{id}', [BuildingController::class, 'update'])->name('building.update');
Route::delete('/buildings/{id}', [BuildingController::class, 'destroy'])->name('building.destroy');

//Rooms
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/create_rooms', [RoomController::class, 'create'])->name('rooms.create');
Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');
Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');

//Departments
Route::get('/departments', [DepartmentController::class, 'index'])->name('department.index');
Route::get('/departments/create_department', [DepartmentController::class, 'create'])->name('department.create');
Route::post('/departments', [DepartmentController::class, 'store'])->name('department.store');
Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('department.edit');
Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('department.update');
Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy');

// Attendance routes

Route::get('/attendance', [AttendanceController::class, 'index']);
Route::get('/attendance/student', [AttendanceController::class, 'studentDashboard'])->name('student.dashboard');
Route::get('/attendance/teacher', [AttendanceController::class, 'teacherDashboard'])->name('teacher.dashboard');
Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
Route::get('/attendance/edit/{id}', [AttendanceController::class, 'edit'])->name('attendance.edit');
Route::put('/attendance/update/{id}', [AttendanceController::class, 'update'])->name('attendance.update');
Route::delete('/attendance/destroy/{id}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');


// DTR routes
Route::get('/attendance/dtr/form', [DtrController::class, 'showForm'])->name('dtr.form');
Route::post('/attendance/dtr/store', [DtrController::class, 'store'])->name('dtr.store');
Route::get('/attendance/dtr', [DtrController::class, 'index'])->name('dtr.index');
Route::get('/attendance/dtr/{id}', [DtrController::class, 'show'])->name('dtr.show');


// Event routes handled by EventController
Route::prefix('attendance/events')->group(function () {
    // Show Event Creation Form (Teacher view)
    Route::get('create', [EventController::class, 'create'])->name('attendance.events.create');
    
    // Store Event (Teacher/Admin submits event creation)
    Route::post('/', [EventController::class, 'store'])->name('attendance.events.store');
    
    // Show the list of events (Teacher or Admin view)
    Route::get('/', [EventController::class, 'index'])->name('attendance.events.list');
    
    // Show Event Edit Form
    Route::get('{id}/edit', [EventController::class, 'edit'])->name('attendance.events.edit');
    
    // Update event (PUT request)
    Route::put('{id}', [EventController::class, 'update'])->name('attendance.events.update');
    
    // Delete event (DELETE request)
    Route::delete('{id}', [EventController::class, 'destroy'])->name('attendance.events.destroy');
    
    // Show Event Attendees List (Teacher view)
    Route::get('{event}/attendees', [EventController::class, 'eventAttendees'])->name('attendance.event.attendees');
    
    // Store Event Attendance Form (Student view)
    Route::get('{event}/attend', [EventController::class, 'eventAttendanceForm'])->name('attendance.event.create');
    
    // Store Event Attendance (POST request)
    Route::post('{event}/attend', [EventController::class, 'storeEventAttendance'])->name('attendance.event.store');
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
Route::post('/curriculums/store', [CurriculumController::class, 'store'])->name('curriculums_store');
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

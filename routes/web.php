<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DtrController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('login');
});

// Test routes
Route::get('/registrar', function () {
    return view('registrar.registrar_dashboard');
});

Route::get('/create_building', function () {
    return view('registrar.create_building');
});

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

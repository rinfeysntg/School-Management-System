<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\PayrollDashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Enrollment;
use App\Http\Controllers\enrollmentDashboard;
use App\Http\Controllers\enrollmentTable;
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
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\Students;
use App\Http\Controllers\Admin;
use App\Http\Controllers\ProgramHead;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Professor;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Treasury;

Route::get('/', function () {
    return view('login');
});

// login routes
Route::get('/', [LoginAuth::class, 'Unback']);
Route::get('/login', [LoginAuth::class, 'Unback']);
Route::get('login', [LoginAuth::class, 'LoginPage'])->name('login');
Route::post('login', [LoginAuth::class, 'login']);
Route::get('logout', [LoginAuth::class, 'logout'])->name('logout');


// dashboard sites
Route::get('/registrar', [Registrar::class, 'index'])->name('registrar');
Route::get('/admin', [Admin::class, 'index'])->name('admin');
Route::get('/treasury', [Treasury::class, 'index'])->name('treasury');

//professor
Route::get('/professor', [Professor::class, 'index'])->name('professor');
Route::get('/professor_schedule', [Professor::class, 'profSchedule'])->name('prof.schedule');

//program head
Route::get('/program_head', [ProgramHead::class, 'index'])->name('program_head');
Route::get('/program_head/curriculums', [CurriculumController::class, 'programheadIndex'])->name('curriculums_program_head');
Route::get('/program_head/{id}', [CurriculumController::class, 'programheadShow'])->name('subjects_program_head');
    //students crud
    Route::get('/students_programhead', [ProgramHead::class, 'createStudentIndex'])->name('students_index');
    Route::post('/student/store', [ProgramHead::class, 'storeStudent'])->name('store_student');
    Route::delete('/student/delete/{id}', [ProgramHead::class, 'deleteStudent'])->name('delete_student');
    Route::post('/student/edit', [ProgramHead::class, 'editStudent'])->name('edit_student');

//student
Route::get('/students', [Students::class, 'index'])->name('student_dashboard');
Route::get('/profile', [Students::class, 'studentProfile'])->name('student.profile');
Route::get('/student_schedule', [Students::class, 'studentSchedule'])->name('student.schedule');
Route::get('/students/enrollment', [Students::class, 'enrollmentForm'])->name('enrollment_dashboard');
Route::get('/student/activities', [Students::class, 'studentActivities'])->name('student.activities');


// users
Route::get('/userController', [UsersController::class, 'index'])->name('usersController');
Route::get('/user/create', [UsersController::class, 'create'])->name('create_user');
Route::post('/user/store', [UsersController::class, 'store'])->name('store_user');
Route::delete('/user/delete/{id}', [UsersController::class, 'delete'])->name('delete_user');
Route::get('/user/edit/{id}', [UsersController::class, 'preEdit'])->name('edit_user_page');
Route::post('/user/edit', [UsersController::class, 'edit'])->name('edit_user');
Route::get('/users', [UsersController::class, 'index'])->name('usersController');

// positions
Route::get('/PositionsController', [PositionsController::class, 'index'])->name('positionsController');
Route::get('/position/create', [PositionsController::class, 'create'])->name('create_position');
Route::post('/position/store', [PositionsController::class, 'store'])->name('store_position');
Route::delete('/position/delete/{id}', [PositionsController::class, 'delete'])->name('delete_position');
Route::get('/position/edit/{id}', [PositionsController::class, 'preEdit'])->name('edit_position_page');
Route::post('/position/edit', [PositionsController::class, 'edit'])->name('edit_position');

// roles
Route::get('/roleController', [RolesController::class, 'index'])->name('rolesController');
Route::get('/role/create', [RolesController::class, 'create'])->name('create_role');
Route::post('/role/store', [RolesController::class, 'store'])->name('store_role');
Route::delete('/role/delete/{id}', [RolesController::class, 'delete'])->name('delete_role');
Route::get('/role/edit/{id}', [RolesController::class, 'preEdit'])->name('edit_role_page');
Route::post('/role/edit', [RolesController::class, 'edit'])->name('edit_role');
Route::get('/roles', [RolesController::class, 'index'])->name('roleController');

//schedule
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
Route::get('/schedule/create/{curriculumId}', [ScheduleController::class, 'create'])->name('schedule.create');
Route::post('/schedule/store', [ScheduleController::class, 'store'])->name('schedule.store');
Route::get('/schedule/{id}/edit', [ScheduleController::class, 'edit'])->name('schedule.edit');
Route::get('/schedule/show/{curriculumId}', [CurriculumController::class, 'showSchedule'])->name('schedule.show');
Route::put('/schedule/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');

// Enrollment
Route::get('/enroll', [EnrollmentController::class, 'enroll'])->name('enrollStudents');
Route::get('/enrollDashboard', [enrollmentDashboard::class, 'index'])->name('enrollDashboard');
Route::post('/enroll/store', [EnrollmentController::class, 'store'])->name('enroll.store');
Route::get('/enrollments', [EnrollmentController::class, 'showEnrollmentTable'])->name('enrollmentTable');
Route::get('/enrollments/not', [EnrollmentController::class, 'showNotEnrollmentTable'])->name('enrollmentTableNot');
Route::get('/enrollments/{enrollment}/edit', [EnrollmentController::class, 'edit'])->name('enrollment.edit');
Route::put('/enrollments/{enrollment}', [EnrollmentController::class, 'update'])->name('enrollment.update');
Route::get('enrollment/search-users', [EnrollmentController::class, 'searchUsers'])->name('enrollment.searchUsers');

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
Route::get('/buildings/{id}', [BuildingController::class, 'show'])->name('buildings_show');
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
Route::get('attendance/search-users', [AttendanceController::class, 'searchUsers'])->name('attendance.searchUsers');

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
Route::get('/payroll', [PayrollDashboardController::class, 'index'])->name('payrollDashboard');
Route::get('/payroll/create', [PayrollDashboardController::class, 'create'])->name('payrolls');
Route::post('/payroll/store/', [PayrollDashboardController::class, 'store'])->name('payroll.store'); // Use POST for create
Route::get('/payroll/{id}/edit', [PayrollDashboardController::class, 'edit'])->name('payroll.edit');
Route::put('/payroll/{id}/', [PayrollDashboardController::class, 'update'])->name('payroll.update'); // Use PUT for update
Route::get('/payroll/delete/{id}', [PayrollDashboardController::class, 'destroy'])->name('payroll.delete');
Route::get('/payroll/{id}/pay', [PayrollDashboardController::class, 'pay'])->name('payroll.pay');
Route::post('/payroll/release', [PayrollDashboardController::class, 'release'])->name('payroll.release');


// Announcement
Route::get('/student-announcements', [Students::class, 'studentAnnouncement'])->name('announcement.student');
Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcements.announcement');
Route::get('/announcement/create', [AnnouncementCreateController::class, 'create'])->name('announcement.create');
Route::post('/announcement/store', [AnnouncementCreateController::class, 'store'])->name('announcement.store');
Route::delete('/announcement/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
Route::get('/announcement/{id}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit');
Route::put('/announcement/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');
Route::get('/announcement/{id}', [AnnouncementController::class, 'show'])->name('announcements.show');
Route::get('/search-targets', [AnnouncementCreateController::class, 'searchTargets'])->name('search.targets');

//payments

Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::get('/payment/create', [PaymentController::class, 'create'])->name('payments.create');
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payments.store');
Route::get('payment/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
Route::put('payment/{id}', [PaymentController::class, 'update'])->name('payments.update');
Route::delete('payment/delete/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');
Route::get('payment/receipt/{id}', [PaymentController::class, 'showReceipt'])->name('payments.receipt');
Route::get('payments/search-users', [PaymentController::class, 'searchUsers'])->name('payments.searchUsers');


//Grade Calculator
Route::get('/professor/grade-breakdown', [GradeController::class, 'showGradeBreakdown'])->name('professor.grade_breakdown');
Route::get('/professor/calculate-grade', [GradeController::class, 'showCalculateGradeForm'])->name('professor.calculate_grade');
Route::post('/professor/store-grade-breakdown', [GradeController::class, 'storeGradeBreakdown'])->name('professor.store_grade_breakdown');

Route::get('/students/{id}/activities', [GradeController::class, 'showStudentActivities'])
    ->name('students.activities'); // e.g., /students/1/activities

// Show grade breakdown for a specific term and year
Route::get('/grades/{term}/{year}', [GradeController::class, 'showGradeBreakdown'])
    ->name('grades.breakdown'); // e.g., /grades/1/2023

// Add a new activity
Route::post('/activities/store', [GradeController::class, 'storeActivity'])
    ->name('activities.store'); // e.g., POST /activities/store

// Link activity grade to a student
Route::post('/activities/grade/store', [GradeController::class, 'storeActivityGrade'])
    ->name('activities.grade.store'); // e.g., POST /activities/grade/store

// Calculate the final grade for a student in a specific term and year
Route::get('/grades/calculate/{userId}/{term}/{year}', [GradeController::class, 'calculateFinalGrade'])
    ->name('grades.calculate'); // e.g., /grades/calculate/1/1/2023

Route::get('/activities', [GradeController::class, 'showAllActivities'])->name('activities.index');
Route::get('/activities/create', [GradeController::class, 'createActivity'])->name('activities.create');
Route::get('/activities/{id}/edit', [GradeController::class, 'editActivity'])->name('activities.edit');
Route::put('/activities/{id}', [GradeController::class, 'updateActivity'])->name('activities.update');
Route::delete('/activities/{id}', [GradeController::class, 'destroyActivity'])->name('activities.destroy');










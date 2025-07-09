<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController; // Import the CourseController  ✅ Step 9: Role-based Restrictions (Middleware)
use App\Http\Controllers\SubjectController; // Import the CourseController  ✅ Step 9: Role-based Restrictions (Middleware)
use App\Http\Controllers\EnrollmentController; // Import the CourseController  ✅ Step 9: Role-based Restrictions (Middleware)
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// ✅ Updated Dashboard Route with Role-based Redirects
Route::get('/dashboard', function () {
    $role = Auth::user()->role;

    if ($role === 'admin' || $role === 'staff') {
        return view('dashboard'); // Admin/staff dashboard
    } else {
        return view('students.dashboard'); // Student dashboard
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Profile Routes with Avatar Upload Support
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Step 9: Role-based Restrictions (Middleware)
// Only 'admin' and 'staff' can manage courses
Route::middleware(['auth', 'role:admin,staff'])->group(function () {
    Route::resource('courses', CourseController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('enrollments', EnrollmentController::class);

    // ✅ Export all courses as PDF
    Route::get('/courses/export/all', [CourseController::class, 'exportAllCourses'])->name('courses.export.all');

    // ✅ Export single course as PDF
    Route::get('/courses/export/{course}', [CourseController::class, 'exportCourse'])->name('courses.export.single');

    // Subject PDF exports
    Route::get('subjects/export/all', [SubjectController::class, 'exportAll'])->name('subjects.export.all');
    Route::get('subjects/export/{subject}', [SubjectController::class, 'exportSingle'])->name('subjects.export.single');

    // Enrollment PDF exports
    Route::get('enrollments/export/all', [EnrollmentController::class, 'exportAll'])->name('enrollments.export.all');
    Route::get('enrollments/export/{enrollment}', [EnrollmentController::class, 'exportSingle'])->name('enrollments.export.single');

    // ✅ Dashboard API for admin/staff
    Route::get('/api/enrollments/chart', [DashboardController::class, 'enrollmentChart'])->name('dashboard.enrollment.chart');
});

// ✅ User-specific routes (Students)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/my-enrollments', [EnrollmentController::class, 'myEnrollments'])->name('my.enrollments');
    Route::get('/my-enrollments/{enrollment}/pdf', [EnrollmentController::class, 'exportMyEnrollment'])->name('my.enrollment.pdf');
});

// Avatar-specific routes
Route::middleware('auth')->group(function () {
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
    Route::delete('/profile/avatar', [ProfileController::class, 'deleteAvatar'])->name('profile.avatar.delete');
});

Route::get('/courses/export-all', [CourseController::class, 'exportAllCourses'])->name('courses.exportAll');
Route::get('/courses/export/{id}', [CourseController::class, 'exportCourse'])->name('courses.export');

Route::get('/enrollments/{enrollment}/export', [EnrollmentController::class, 'exportSingle'])->name('enrollments.exportSingle');

require __DIR__ . '/auth.php';
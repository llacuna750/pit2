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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $role = Auth::user()->role;

    if ($role === 'admin' || $role === 'staff') {
        return view('dashboard'); // Admin/staff dashboard
    } else {
        return view('students.dashboard'); // Student dashboard
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware(['auth', 'role:admin'])->group(function () { // ✅ Step 9: Role-based Restrictions (Middleware)
//     Route::resource('courses', CourseController::class);
// });

// ✅ Step 9: Role-based Restrictions (Middleware)
// Only 'admin' and 'staff' can manage courses
Route::middleware(['auth', 'role:admin|staff'])->group(function () {  // Fixed role separator from || to |
    Route::resource('courses', CourseController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('enrollments', EnrollmentController::class);

    // ✅ Export all courses as PDF
    Route::get('/courses/export/all', [CourseController::class, 'exportAllCourses'])->name('courses.export.all');

    // ✅ Export single course as PDF
    Route::get('/courses/export/{id}', [CourseController::class, 'exportCourse'])->name('courses.export.single');

    // Subject PDF exports
    Route::get('subjects/export/all', [SubjectController::class, 'exportAll'])->name('subjects.export.all');
    Route::get('subjects/export/{subject}', [SubjectController::class, 'exportSingle'])->name('subjects.export.single');

    // Enrollment PDF exports
    Route::get('enrollments/export/all', [EnrollmentController::class, 'exportAll'])->name('enrollments.export.all');
    Route::get('enrollments/export/{enrollment}', [EnrollmentController::class, 'exportSingle'])->name('enrollments.export.single');
});

// User-specific routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/my-enrollments', [EnrollmentController::class, 'myEnrollments'])->name('my.enrollments');
});

// ❌ Remove these duplicate routes (they're already in the admin/staff group above)
// Route::resource('courses', CourseController::class)->middleware('auth'); // 9.1
// Route::resource('subjects', SubjectController::class)->middleware('auth');  // 9.1
// Route::resource('subjects', SubjectController::class);
// Route::resource('enrollments', EnrollmentController::class);


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/my-enrollments', [EnrollmentController::class, 'myEnrollments'])->name('my.enrollments');
    Route::get('/my-enrollments/{enrollment}/pdf', [EnrollmentController::class, 'exportMyEnrollment'])->name('my.enrollment.pdf');
});
Route::middleware(['auth', 'role:admin || staff'])->get('/api/enrollments/chart', [DashboardController::class, 'enrollmentChart']);

Route::get('/api/enrollments/chart', [DashboardController::class, 'enrollmentChart']);

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController; // Import the CourseController  ✅ Step 9: Role-based Restrictions (Middleware)


use App\Http\Controllers\SubjectController; // Import the CourseController  ✅ Step 9: Role-based Restrictions (Middleware)
use App\Http\Controllers\EnrollmentController; // Import the CourseController  ✅ Step 9: Role-based Restrictions (Middleware)



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
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
Route::middleware(['auth', 'role:admin || staff'])->group(function () {
    Route::resource('courses', \App\Http\Controllers\CourseController::class);
});

Route::resource('courses', CourseController::class)->middleware('auth'); // 9.1
Route::resource('subjects', SubjectController::class)->middleware('auth');  // 9.1
Route::resource('enrollments', EnrollmentController::class)->middleware('auth'); // 9.1


// ✅ Export all courses as PDF
Route::get('/courses/export/all', [CourseController::class, 'exportAllCourses'])->name('courses.export.all');

// ✅ Export single course as PDF
Route::get('/courses/export/{id}', [CourseController::class, 'exportCourse'])->name('courses.export.single');


require __DIR__.'/auth.php';

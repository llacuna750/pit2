<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // ✅ Step 8: Generate PDF Reports


class CourseController extends Controller
{
    public function exportAllCourses()
    {
        $courses = Course::all();
        $pdf = Pdf::loadView('pdf.all_courses', compact('courses'));
        return $pdf->download('all_courses.pdf');
    }
    // Individual PDF Example:  
    public function exportCourse($id)
    {
        $course = Course::findOrFail($id);
        $pdf = Pdf::loadView('pdf.course', compact('course'));
        return $pdf->download("course_{$id}.pdf");
    } // ✅ Step 8: Generate PDF Reports

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)  // ✅ Step 6: Add Pagination + Search in Index (Example: CourseController@index)
    {
        $search = $request->input('search');
        $courses = Course::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        })->paginate(3);

        return view('courses.index', compact('courses', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255']);
        Course::create(['title' => $request->title]);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate(['title' => 'required|string|max:255']);
        $course->update(['title' => $request->title]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted.');
    }
}

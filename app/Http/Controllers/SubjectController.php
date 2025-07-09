<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SubjectController extends Controller
{

    public function exportAll()
    {
        $subjects = Subject::with('course')->get();
        $pdf = Pdf::loadView('pdf.all_subjects', compact('subjects'));
        return $pdf->download('all_subjects.pdf');
    }

    public function exportSingle(Subject $subject)
    {
        $subject->load('course');
        $pdf = Pdf::loadView('pdf.subject', compact('subject'));
        return $pdf->download("subject_{$subject->id}.pdf");
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $subjects = Subject::with('course')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(3);

        return view('subjects.index', compact('subjects', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('subjects.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        Subject::create($validated);

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        // Optional: show detail view
        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $courses = Course::all();
        return view('subjects.edit', compact('subject', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $subject->update($validated);

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }
}

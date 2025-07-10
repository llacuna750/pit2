<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{

    public function myEnrollments()
    {
        $enrollments = Enrollment::with('subject')
            ->where('user_id', Auth::id())
            ->paginate(5);

        return view('students.my_enrollments', compact('enrollments'));
    }

    // In EnrollmentController.php
    public function exportMyEnrollment(Enrollment $enrollment)
    {
        if ($enrollment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $enrollment->load(['subject.course']); // Eager load relationships

        // Pass the single enrollment in an array to match the view's expectations
        return PDF::loadView('pdf.my_enrollment', [
            'enrollments' => collect([$enrollment]) // Wrap in collection to maintain count() etc
        ])->download("my_enrollment_{$enrollment->id}.pdf");
    }


    public function index(Request $request)
    {
        $search = $request->input('search');

        $enrollments = Enrollment::with(['user', 'subject'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhereHas('subject', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            })
            ->paginate(3);

        return view('enrollments.index', compact('enrollments', 'search'));
    }

    public function create()
    {
        $users = User::all();
        $subjects = Subject::all();
        return view('enrollments.create', compact('users', 'subjects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'enrolled_at' => 'required|date',
        ]);

        Enrollment::create($validated);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully.');
    }

    public function edit(Enrollment $enrollment)
    {
        $users = User::all();
        $subjects = Subject::all();
        return view('enrollments.edit', compact('enrollment', 'users', 'subjects'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'enrolled_at' => 'required|date',
        ]);

        $enrollment->update($validated);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }

    // Export All PDF
    public function exportAll()
    {
        $enrollments = Enrollment::with(['user', 'subject'])->get();
        $pdf = Pdf::loadView('pdf.all_enrollments', compact('enrollments'));
        return $pdf->download('all_enrollments.pdf');
    }

    // Export Single PDF
    public function exportSingle(Enrollment $enrollment)
    {
        $enrollment->load(['user', 'subject']);
        $pdf = Pdf::loadView('pdf.enrollment', compact('enrollment'));
        return $pdf->download("enrollment_{$enrollment->id}.pdf");
    }

    public function exportAllMyEnrollments()
    {
        $enrollments = Enrollment::with(['subject.course'])
            ->where('user_id', Auth::id())
            ->get();

        if ($enrollments->isEmpty()) {
            return redirect()->route('my.enrollments')
                ->with('error', 'No enrollments found to export.');
        }

        $pdf = PDF::loadView('pdf.my_enrollment', compact('enrollments'));
        return $pdf->download('my_enrollments_report_' . now()->format('Y-m-d') . '.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class DashboardController extends Controller
{
    // Chart data for enrollments per subject
    public function enrollmentChart()
    {
        $subjects = Subject::withCount('enrollments')->get();

        return response()->json([
            'subjects' => $subjects->pluck('name'),
            'counts' => $subjects->pluck('enrollments_count'),
        ]);
    }
}

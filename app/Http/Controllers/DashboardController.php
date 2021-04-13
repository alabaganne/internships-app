<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return \Inertia\Inertia::render('Dashboard', [
            'internships_count' => \App\Models\Internship::all()->count(),
            'university_supervisors_count' => \App\Models\UniversitySupervisor::all()->count(),
            'companies_count' => \App\Models\Company::all()->count(),
            'student_applications_count' => 0
        ]);
    }
}

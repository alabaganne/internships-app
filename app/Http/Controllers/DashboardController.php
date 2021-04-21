<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Resources\InternshipApplicationResource;

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
        $props = [
            'internships_count' => \App\Models\Internship::all()->count(),
            'university_supervisors_count' => \App\Models\UniversitySupervisor::all()->count(),
            'companies_count' => \App\Models\Company::all()->count(),
            'applications_count' => 0,
        ];

        $user = auth()->user();
        if($user->isStudent()) {
            $props['applications'] = InternshipApplicationResource::collection(
                Application::with('internship', 'internship.company', 'internship.company.user', 'internship.company.city', 'internship.field')
                    ->where('student_id', $user->userable->id)
                    ->latest()
                    ->take(5)
                    ->get()
            );
        }

        return \Inertia\Inertia::render('Dashboard', $props);
    }
}

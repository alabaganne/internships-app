<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Http\Resources\InternshipResource;
use App\Models\Application;
use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    public function index() // TODO: only students are authorized to access this route
    {
        $field_name = Auth::user()->isStudent() ? 'student_id' : 'company_id';

        return Inertia::render('Applications/Index', [
            'applications' => ApplicationResource::collection(
                Application::with('internship', 'internship.company', 'internship.company.user', 'internship.company.city', 'internship.field')
                    ->where($field_name, Auth::user()->userable->id)
                    ->paginate(10)
            )
        ]);
    }

    public function create(Internship $internship)
    {
        return Inertia::render('Applications/Edit', [
            'internship' => new InternshipResource($internship)
        ]);
    }

    public function store(Internship $internship, ApplicationRequest $request)
    {
        auth()->user()->userable->internshipApplications()->attach($internship, [
            'cover_letter' => $request->input('cover_letter'),
            'message' => $request->input('message'),
            'company_id' => $internship->company_id,
            // TODO: handle attachments upload and store the path to them.
        ]);

        return Redirect::route('applications.index');
    }

    public function show(Application $application)
    {
        return Inertia::render('Applications/Show', [
            'application' => new ApplicationResource($application)
        ]);
    }

    public function edit(Application $application)
    {
        return Inertia::render('Applications/Edit', [
            'internship' => new InternshipResource(
                Internship::findOrFail($application->internship_id)
            ),
            'application' => $application,
        ]);
    }

    public function update(Application $application, ApplicationRequest $request)
    {
        $application->update($request->validated());

        return Redirect::route('applications.show', $application);
    }

    public function destroy(Application $application) {
        $application->delete();

        return Redirect::route('applications.index');
    }
}

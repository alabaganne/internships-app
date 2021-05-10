<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Http\Resources\InternshipResource;
use App\Models\Application;
use App\Models\Internship;
use App\Notifications\ApplicationReviewed;
use App\Notifications\ApplicationSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Application::class);
    }

    public function index() // TODO: only students are authorized to access this route
    {
        $field_name = Auth::user()->isStudent() ? 'student_id' : 'company_id';

        return Inertia::render('Applications/Index', [
            'applications' => ApplicationResource::collection(
                Application::with('internship', 'internship.company', 'internship.city', 'internship.field')
                    ->where($field_name, Auth::user()->userable->id)
                    ->latest()
                    ->paginate(8)
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
        $application = Application::create([
            'student_id' => $request->user()->userable->id,
            'internship_id' => $internship->id,
            'cover_letter' => $request->cover_letter,
            'message' => $request->message,
            'company_id' => $internship->company_id,
			'city_id' => auth()->user()->id
        ]);

        $application->company->user->notify(new ApplicationSubmitted($application));

        return Redirect::route('applications.index')->with('toast', [
            'action' => 'store',
            'message' => 'Your application has been submitted.'
        ]);
    }

    public function show(Application $application)
    {
        return Inertia::render('Applications/Show', [
            'application' => [
				'id' => $application->id,
				'name' => $application->name,
				'cover_letter' => $application->cover_letter,
				'message' => $application->message,
				'attachments' => $application->attachments,
				'status' => $application->status,
				'student' => [
					'id' => $application->student->id,
					'name' => $application->student->user->name,
					'email' => $application->student->user->email,
					'phone_number' => $application->student->user->phone_number,
					'image' => $application->student->user->image,
				],
				'internship' => [
					'id' => $application->internship->id,
					'title' => $application->internship->title,
				]
			]
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

        return Redirect::route('applications.show', $application)->with('toast', [
            'action' => 'update',
            'message' => 'Application updated successfully.'
        ]);
    }

    public function destroy(Application $application) {
        $application->delete();

        return Redirect::route('applications.index')->with('toast', [
            'action' => 'destroy',
            'message' => 'Your applications has been deleted.'
        ]);
    }

    public function reply(Application $application, Request $request) { // only companies are authorized to access this route
        $application->update(
            $request->validate([
                'status' => 'required|boolean'
            ])
        );

        $application->student->user->notify(new ApplicationReviewed($application));

        return Redirect::back()->with('toast', [
            'action' => 'notification',
            'message' => 'A notification has been sent to the student.'
        ]);
    }
}

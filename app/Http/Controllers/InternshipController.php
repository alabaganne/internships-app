<?php

namespace App\Http\Controllers;

use App\Http\Requests\InternshipRequest; // validations
use App\Http\Resources\InternshipResource; // formatting the response
use App\Models\Application;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\City;
use App\Models\Field;
use App\Models\Company;
use App\Models\Internship;
use Illuminate\Support\Facades\Redirect;

class InternshipController extends Controller
{
    public function index()
    {
        return Inertia::render('Internships/Index', [
            'internships' => InternshipResource::collection(Internship::latest()->paginate(10)),
            'cities' => City::all(),
            'fields' => Field::select('id', 'name')->get(),
            'companies' => Company::all()->transform(function($company) {
                return [
                    'id' => $company->id,
                    'name' => $company->user->name
                ];
            })
        ]);
    }

    public function get_company_supervisors()
    {
        return Company::find(auth()->user()->userable->id)->company_supervisors()->get()
            ->map(function($supervisor) {
                return [
                    'id' => $supervisor->id,
                    'name' => $supervisor->user->name,
                ];
            });
    }

    public function get_fields() {
        return Field::select('id', 'name')->get();
    }

    public function create()
    {
        return Inertia::render('Internships/Edit', [
            'fields' => $this->get_fields(),
            'company_supervisors' => $this->get_company_supervisors()
        ]);
    }
    
    public function store(InternshipRequest $request)
    {
        $data = $request->validated();
        $data['company_id'] = auth()->user()->userable->id;

        Internship::create($data);

        return Redirect::route('internships.index');
    }

    public function getStudentApplication($internship) {
        return Application::where('student_id', auth()->user()->userable->id)
            ->where('internship_id', $internship->id)
            ->first();
    }

    public function show(Internship $internship) {
        $props = [
            'internship' => new InternshipResource($internship)
        ];

        if(auth()->user()->isStudent())
            $props['application'] = $this->getStudentApplication($internship);

        return Inertia::render('Internships/Show', $props);
    }

    public function edit(Internship $internship)
    {
        return Inertia::render('Internships/Edit', [
            'internship' => $internship,
            'fields' => $this->get_fields(),
            'company_supervisors' => $this->get_company_supervisors()
        ]);
    }

    public function update(InternshipRequest $request, Internship $internship)
    {
        $internship->update($request->validated());

        return Redirect::route('internships.show', $internship->id);
    }


    public function destroy(Internship $internship)
    {
        $internship->delete();

        return Redirect::route('internships.index');
    }
}

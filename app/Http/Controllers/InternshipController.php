<?php

namespace App\Http\Controllers;

use App\Http\Requests\InternshipRequest; // validations
use App\Http\Resources\InternshipResource; // formatting the response
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\City;
use App\Models\Field;
use App\Models\Company;
use App\Models\Internship;

class InternshipController extends Controller {

    public function index() {
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

    public function get_company_supervisors() {
        return Company::find(auth()->user()->userable->id)->company_supervisors()->get()
            ->map(function($supervisor) {
                return [
                    'id' => $supervisor->id,
                    'name' => $supervisor->user->name,
                ];
            });
    }

    public function create() {
        return Inertia::render('Internships/Edit', [
            'fields' => Field::all(),
            'company_supervisors' => $this->get_company_supervisors()
        ]);
    }
    
    public function store(InternshipRequest $request) {
        $data = $request->validated();
        $data['company_id'] = auth()->user()->userable->id;

        Internship::create($data);

        return redirect()->route('internships.index');
    }

    public function show(Internship $internship) {
        return Inertia::render('Internships/Show', [
            'internship' => new InternshipResource($internship)
        ]);
    }

    public function edit(Internship $internship) {
        return Inertia::render('Internships/Edit', [
            'internship' => $internship,
            'fields' => Field::all(),
            'company_supervisors' => $this->get_company_supervisors()
        ]);
    }

    public function update(InternshipRequest $request, Internship $internship) {
        $internship->update($request->validated());

        return redirect()->route('internships.show', $internship->id);
    }


    public function destroy(Internship $internship) {
        $internship->delete();

        return redirect()->route('internships.index');
    }
}

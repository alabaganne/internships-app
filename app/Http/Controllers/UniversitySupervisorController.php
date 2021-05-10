<?php

namespace App\Http\Controllers;

use App\Http\Requests\UniversitySupervisorRequest;
use App\Models\UniversitySupervisor;
use App\Models\User;
use App\Models\Field;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UniversitySupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('UniversitySupervisors/Index', [
            'university_supervisors' => UniversitySupervisor::with('field')
				->paginate(12)
				->through(function ($supervisor) {
					return [
						'id' => $supervisor->id,
						'user_id' => $supervisor->user->id,
						'name' => $supervisor->user->name,
						'email' => $supervisor->user->email,
						'photo' => $supervisor->user->photo,
						'field' => [
							'name' => $supervisor->field->name,
						]
						];
				}),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('UniversitySupervisors/Edit', [
            'fields' => Field::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniversitySupervisorRequest $request)
    {
        UniversitySupervisor::create($request->only('field_id'))
            ->user()->save(
                User::create($request->only('name', 'email', 'phone_number'))
            );

        return Redirect::route('university_supervisors.index')->with('toast', [
            'action' => 'store',
            'message' => 'A new university Supervisor has been added.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UniversitySupervisor  $universitySupervisor
     * @return \Illuminate\Http\Response
     */
    public function show(UniversitySupervisor $universitySupervisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UniversitySupervisor  $universitySupervisor
     * @return \Illuminate\Http\Response
     */
    public function edit(UniversitySupervisor $universitySupervisor)
    {
        return Inertia::render('UniversitySupervisors/Edit', [
            'university_supervisor' => [
				'id' => $universitySupervisor->id,
				'name' => $universitySupervisor->user->name,
				'email' => $universitySupervisor->user->email,
				'phone_number' => $universitySupervisor->user->phone_number,
				'field_id' => $universitySupervisor->field_id,
			],
            'fields' => Field::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UniversitySupervisor  $universitySupervisor
     * @return \Illuminate\Http\Response
     */
    public function update(UniversitySupervisorRequest $request, UniversitySupervisor $universitySupervisor)
    {
        $universitySupervisor->user()->update(
            $request->only('name', 'email', 'phone_number')
        );

        $universitySupervisor->update($request->only('field_id'));

        return Redirect::route('university_supervisors.index')->with('toast', [
            'action' => 'update',
            'message' => 'University Supervisor updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UniversitySupervisor  $universitySupervisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(UniversitySupervisor $universitySupervisor)
    {
        $universitySupervisor->user()->delete();
        $universitySupervisor->delete();

        return Redirect::route('university_supervisors.index')->with('toast', [
            'action' => 'destroy',
            'message' => 'University Supervisor deleted successfully.'
        ]);
    }
}

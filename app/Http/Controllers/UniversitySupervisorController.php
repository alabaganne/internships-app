<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\UniversitySupervisor;
use Illuminate\Http\Request;
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
            'university_supervisors' => UserResource::collection(UniversitySupervisor::paginate(12)),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UniversitySupervisor  $universitySupervisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UniversitySupervisor $universitySupervisor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UniversitySupervisor  $universitySupervisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(UniversitySupervisor $universitySupervisor)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CompanySupervisor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompanySupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('CompanySupervisors/Index');
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
     * @param  \App\Models\CompanySupervisor  $companySupervisor
     * @return \Illuminate\Http\Response
     */
    public function show(CompanySupervisor $companySupervisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanySupervisor  $companySupervisor
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanySupervisor $companySupervisor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanySupervisor  $companySupervisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanySupervisor $companySupervisor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanySupervisor  $companySupervisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanySupervisor $companySupervisor)
    {
        //
    }
}

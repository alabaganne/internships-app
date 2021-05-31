<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanySupervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CompanySupervisorController extends Controller
{
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
    public function edit(Company $company, CompanySupervisor $companySupervisor)
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
        $company_id = $companySupervisor->company_id;

        $companySupervisor->user()->delete();
        $companySupervisor->delete();

        return Redirect::route('companies.show', $company_id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    public function index()
    {
        // 
    }

    public function create(Internship $internship)
    {
        return Inertia::render('Applications/Edit', [
            'internship' => $internship
        ]);
    }

    public function store(Internship $internship, Request $request)
    {
        // store student application
        $student_id = auth()->user()->userable->id;
    }
}

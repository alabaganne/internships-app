<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Http\Request;

use Inertia\Inertia;

class LikeController extends Controller // only students are authorized to access this controller
{
    public $student;

    public function __construct()
    {
        $this->student = auth()->user()->userable;
    }

    public function index()
    {
        return Inertia::render('Likes/Index', [
            'liked_internships' => $this->student->liked_internships
        ]);
    }

    public function store(Internship $internship)
    {
        $this->student->liked_internships()->attach($internship);
    }

    public function destroy(Internship $internship)
    {
        $this->student->liked_internships()->detach($internship);
    }
}

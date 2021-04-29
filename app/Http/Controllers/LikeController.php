<?php

namespace App\Http\Controllers;

use App\Http\Resources\InternshipResource;
use App\Models\Internship;
use Illuminate\Http\Request;

use Inertia\Inertia;

class LikeController extends Controller // only students are authorized to access this controller
{
    public function index()
    {
        return Inertia::render('Internships/Likes', [
            'internships' => InternshipResource::collection(
                auth()->user()->userable->likes
            )
        ]);
    }

    public function store(Internship $internship)
    {
        $response = auth()->user()->userable->likes()->toggle($internship);

        return $response;
    }
}

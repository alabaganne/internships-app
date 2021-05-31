<?php

namespace App\Http\Controllers;

use App\Http\Resources\InternshipResource;
use App\Models\Internship;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LikeController extends Controller // only students are authorized to access this controller
{
    public function index()
    {
        return Inertia::render('Internships/Likes', [
            'likes' => InternshipResource::collection(auth()->user()->userable->likes)
        ]);
    }

    public function store(Internship $internship)
    {
        auth()->user()->userable->likes()->toggle($internship);

        return response()->json();
    }
}

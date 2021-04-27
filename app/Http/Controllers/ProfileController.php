<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Field;
use App\Models\User;

use Inertia\Inertia;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function edit() {
        return Inertia::render('Profile/Edit', [
            'cities' => City::all(),
            'fields' => Field::all(),
            'user' => auth()->user()
        ]);
    }

    public function update() {
        //
    }

    public function destroy(Request $request) {
        // delete account
    }
}

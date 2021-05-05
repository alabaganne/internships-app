<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Field;
use Inertia\Inertia;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit() {
        $props = [
            'fields' => Field::all(),
            'cities' => City::all()
        ];

        return Inertia::render('Profile/Edit', $props);
    }

    public function update(Request $request) {
		$user_id = auth()->user()->id;

        $request->validate([
			'name' => 'required',
			'email' => "required|email|unique:users,email,{$user_id}",
			'phone_number' => "nullable|unique:users,phone_number,{$user_id}",
			'linkedin_profile_url' => 'nullable|url',
			'city_id' => 'nullable',
			'about' => 'nullable',
			'website' => 'nullable|url',
		]);
    }

    public function destroy(Request $request) {
        // delete account
    }
}

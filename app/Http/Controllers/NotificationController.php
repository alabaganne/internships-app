<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Redirect;

class NotificationController extends Controller
{
    public function store(Notification $notification)
    {
        if(!$notification->read_at) {
            $notification->update([
                'read_at' => now()
            ]);
        }

        return response()->json($notification, 200);
    }

	public function clear() {
		auth()->user()->notifications()->delete();

		return Redirect::back();
	}
}

<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificationController extends Controller
{
    /**
     * Mark notification as read.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Notification $notification)
    {
        if(!$notification->read_at) {
            $notification->update([
                'read_at' => now()
            ]);
        }

        return response()->json($notification, 200);
    }
}

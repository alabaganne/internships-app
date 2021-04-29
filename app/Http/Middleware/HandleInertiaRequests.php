<?php

namespace App\Http\Middleware;

use App\Http\Resources\NotificationResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $shared = [
            'auth' => [
                'user' => $request->user(),
            ]
        ];

        $user = auth()->user();
        if($user) {
            if($user->isStudent()) {
                $shared['likes_count'] = $user->userable->likes->count();
            }

            if($user->isStudent() || $user->isCompany()) {
                $shared['notifications'] = NotificationResource::collection(
                    $request->user()->notifications()
                        ->latest()
                        ->take(8)
                        ->get()
                );
            }
        }

        if(Session::has('toast')) {
            $shared['toast'] = Session::get('toast');
        }

        return array_merge(parent::share($request), $shared);
    }
}

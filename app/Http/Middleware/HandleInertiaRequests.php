<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
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

        $student = auth()->user() && auth()->user()->isStudent() ? auth()->user()->userable : NULL;
        if($student) {
            $shared['likes_count'] = $student->likes->count();
        }

        return array_merge(parent::share($request), $shared);
    }
}

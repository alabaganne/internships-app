<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$auth_id = auth()->user()->id;

        return Inertia::render('Messages/Index', [
			'contacts' => User::whereHas('sentMessages', function ($query) use ($auth_id) {
				$query->where('to_id', $auth_id);
			})->orWhereHas('receivedMessages', function ($query) use ($auth_id) {
				$query->where('from_id', $auth_id);
			})
				->orderBy('name')
				->get()
				->transform(function ($contact) use ($auth_id) {
					return [
						'id' => $contact->id,
						'name' => $contact->name,
						'email' => $contact->email,
						'image' => $contact->image,
						'userable_type' => $contact->userable_type,
						'messages' => Message::where(function ($query) use ($contact, $auth_id) {
								$query->where('from_id', $contact->id)
									->where('to_id', $auth_id);
							})
							->orWhere(function ($query) use ($contact, $auth_id) {
								$query->where('from_id', $auth_id)
									->where('to_id', $contact->id);
							})
							->orderBy('created_at', 'asc')
							->get()
							->transform(function ($message) {
								return [
									'id' => $message->id,
									'from_id' => $message->from_id,
									'to_id' => $message->to_id,
									'text' => $message->text,
									'read_at' => $message->read_at,
									'created_at' => $message->created_at->calendar(),
								];
							})
					];
				})
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		Message::create([
			'from_id' => auth()->user()->id,
			'to_id' => $request->to_id,
			'text' => $request->text,
		]);

        return Redirect::route('messages.index', [ 'id' => $request->to_id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }
}

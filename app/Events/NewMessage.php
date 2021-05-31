<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

	public $to_id;
	public \App\Models\Message $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($to_id, $message)
    {
        $this->to_id = $to_id;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('user.' . $this->to_id);
    }

	public function broadcastAs()
	{
		return 'messages';
	}

	public function broadcastWith() {
		return [
			'toast' => [
				'message' => "{$this->message->sender->name} Sent you a message.",
				'type' => 'message'
			],
			'message' => $this->message
		];
	}
}

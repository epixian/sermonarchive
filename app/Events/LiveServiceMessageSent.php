<?php

namespace App\Events;

use App\Message;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class LiveServiceMessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var Message */
    public $message;
    /** @var User */
    public $user;

    /**
     * Create the event.
     *
     * @return void
     */
    public function __construct(Message $message, User $user)
    {
        $this->message = $message->message;
        $this->user = $user->name;
    }

    /**
     * Set the broadcast channel name.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('nlglive-channel');
    }

    /**
     * Set the broadcast event name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'nlglive-event';
    }
}

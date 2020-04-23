<?php

namespace App\Events;

use App\State\StateInterface;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderStateChangedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var StateInterface */
    private $state;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(StateInterface $state)
    {
        $this->state = $state;
    }

    public function getState(): StateInterface
    {
        return $this->state;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

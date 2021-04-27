<?php

namespace App\Providers;

use App\Models\Tray;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TrayCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Tray
     */
    public $tray;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Tray $tray)
    {
        $this->tray = $tray;
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

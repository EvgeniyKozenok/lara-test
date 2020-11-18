<?php

namespace App\Events;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ApiRequestHit
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Carbon
     */
    private $time;
    /**
     * @var User
     */
    private $user;

    /**
     * Create a new event instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->time = Carbon::now();
        $this->user = $user;
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

    public function getUserId(): int
    {
        return $this->user->__get('id');
    }

    public function getTime(): Carbon
    {
        return $this->time;
    }
}

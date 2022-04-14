<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class GetRequestEvent implements ShouldBroadcast{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $index;
    
    public function __construct($index)
    {
        $this->index = $index;
        echo "<p>GetRequestEvent:$index</p>";
        // $user = User::get();
        // $response['data'] = $user;
        // $response['status'] = 200;
        // echo json_encode($response);
    }

    public function broadcastWith()
    {
        $user = User::get();
        $response['data'] = $user;
        $response['status'] = 200;
        $response['index'] = $this->index;
        return $response;
        // return [
        //     'hello' => 'there'
        // ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new Channel('channel');
        return new Channel('EventTriggered');
    }
}

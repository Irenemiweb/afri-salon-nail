<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reserva;

class NewReserv implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reserva;
    public $comfim_pendingCount;
    public function __construct(Reserva $reserva, $comfim_pendingCount)
    {
        $this->reserva = $reserva;
        $this->comfim_pendingCount = $comfim_pendingCount;
    }


    public function broadcastOn()
    {
        return new Channel('reservas');
    }
    public function broadcastAs()
    {
        return 'NewReserv';  // Esto define el nombre del evento
    }
}

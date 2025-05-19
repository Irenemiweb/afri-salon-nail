<?php

namespace App\View\Components\Reserva\Servicio;

use Illuminate\View\Component;
use App\Models\Reserva;

class OffcanvaNotifyNewReserv extends Component
{
    public $reservasPendientes;
    public function __construct()
    {
        $this->reservasPendientes = Reserva::where('status', 'pending')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.reserva.servicio.offcanva-notify-new-reserv', [
            'reservasPendientes' => $this->reservasPendientes,
        ]);
    }
}

<?php

namespace App\View\Components\PanelAdmin;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use App\Models\Reserva;
use Carbon\Carbon;

class Citas extends Component
{
    public $citasProximas;
    public $citasTerminadas;
    public function __construct()
    {

        $userId = Auth::id(); // Obtén el ID del usuario autenticado

        $now = Carbon::now();

        // Obtener citas próximas para el usuario autenticado
        $this->citasProximas = Reserva::where('user_id', $userId)
            ->where('date_time', '>=', $now)
            // ->whereIn('status', ['pending', 'confirmed', 'pagada'])
            ->get();

        // Obtener citas terminadas para el usuario autenticado
        $this->citasTerminadas = Reserva::where('user_id', $userId)
            ->where('date_time', '<', $now)
            // ->whereIn('status', ['completada', 'no_asistida'])
            ->get();
    }
    // public function mount()
    // {
    //     // Fecha y hora actuales
    //     $now = Carbon::now();

    //     // Obtener citas próximas: citas con fecha y hora futura o no caducadas
    //     $this->citasProximas = Reserva::where('date_time', '>=', $now)
    //         // ->whereIn('status', ['pending', 'confirmed', 'pagada'])
    //         ->get();

    //     // Obtener citas terminadas: citas pasadas que no fueron canceladas
    //     $this->citasTerminadas = Reserva::where('date_time', '<', $now)
    //         // ->whereIn('status', ['completada', 'no_asistida'])
    //         ->get();
    // }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin.citas', [
            'citasProximas' => $this->citasProximas,
            'citasTerminadas' => $this->citasTerminadas,
        ]);
    }
}

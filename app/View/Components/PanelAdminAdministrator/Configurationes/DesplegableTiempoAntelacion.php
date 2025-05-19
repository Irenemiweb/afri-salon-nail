<?php

namespace App\View\Components\PanelAdminAdministrator\Configurationes;

use Illuminate\View\Component;
use App\Models\AntelacionTiempoReserva;
class DesplegableTiempoAntelacion extends Component
{
    public $tiemposAntelacion;

    // Constructor para cargar los tiempos de la tabla
    public function __construct()
    {
        // Obtener todos los registros de la tabla antelacion_tiempo_reserva
        $this->tiemposAntelacion = AntelacionTiempoReserva::all();
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin-administrator.configurationes.desplegable-tiempo-antelacion');
    }
}

<?php

namespace App\View\Components\PanelAdminAdministrator\Configurationes;

use Illuminate\View\Component;

class DesplegableCambioFechaReserva extends Component
{
    public $cambioFechas;
    public function __construct()
    {
        $this->cambioFechas = [
            "Al menos una hora antes de la cita.",
            "Al menos 2 horas antes de la cita.",
            "Al menos 3 horas antes de la cita.",
            "Al menos 6 horas antes de la cita.",
            "Al menos 12 horas antes de la cita.",
            "Al menos un día antes de la cita.",
            "Al menos 2 días antes de la cita.",
            "Al menos 3 días antes de la cita.",
            "Al menos 4 días antes de la cita.",
            "Al menos 5 días antes de la cita.",
            "Al menos 7 días antes de la cita.",
            "Al menos 10 días antes de la cita."
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin-administrator.configurationes.desplegable-cambio-fecha-reserva');
    }
}

<?php

namespace App\View\Components\PanelAdminAdministrator\Desplegables;

use Illuminate\View\Component;
use DateTime;

class DesplegaHoraFin extends Component
{
    public $tiempoServicioFin;
    public $dataHourReserv;

    public function __construct()
    {
        // Inicializar el arreglo en la propiedad $this->tiempoServicio
        $this->tiempoServicioFin = [];
        $horaInicio = new DateTime('09:00');
        $horaFin = new DateTime('21:00');

        while ($horaInicio <= $horaFin) {
            $this->tiempoServicioFin[] = $horaInicio->format('H:i');
            $horaInicio->modify('+5 minutes');
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin-administrator.desplegables.desplega-hora-fin', [
            'tiempoServicio' => $this->tiempoServicioFin,
            'dataHourReserv' => $this->dataHourReserv
        ]);
    }
}

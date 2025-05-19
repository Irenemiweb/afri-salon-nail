<?php

namespace App\View\Components\PanelAdminAdministrator\Desplegables;

use Illuminate\View\Component;
use DateTime;
class DesplegaHoraIni extends Component
{
    public $tiempoServicio;
    public $dataHourReserv;

    public function __construct()
    {
        // Inicializar el arreglo en la propiedad $this->tiempoServicio
        $this->tiempoServicio = [];
        $horaInicio = new DateTime('09:00');
        $horaFin = new DateTime('21:00');

        while ($horaInicio <= $horaFin) {
            $this->tiempoServicio[] = $horaInicio->format('H:i');
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
        return view('components.panel-admin-administrator.desplegables.desplega-hora-ini', [
            'tiempoServicio' => $this->tiempoServicio,
            'dataHourReserv' => $this->dataHourReserv
        ]);
    }
}

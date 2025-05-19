<?php

namespace App\View\Components\PanelAdminAdministrator\Desplegables;

use Illuminate\View\Component;
use DateTime;

class DesplegaHoraFinAddService extends Component
{
    public $tiempoServicio;
    public $dataHourReserv;
    public $tiempoServicioFin;

    public $contenedorHorasInicio;
    public $classDataHour;
    public $idImputInicio;
    public $contenedorHorasFin;
    public $classDataHourFin;
    public $idInputFin;

    public function __construct(
        $contenedorHorasInicio,
        $classDataHour,
        $idImputInicio,
        $contenedorHorasFin,
        $classDataHourFin,
        $idInputFin,
    )
    {
        $this->contenedorHorasInicio = $contenedorHorasInicio;
        $this->classDataHour = $classDataHour;
        $this->idImputInicio = $idImputInicio;
        $this->contenedorHorasFin = $contenedorHorasFin;
        $this->classDataHourFin = $classDataHourFin;
        $this->idInputFin = $idInputFin;

        $this->tiempoServicio = [];
        $horaInicio = new DateTime('09:00');
        $horaFin = new DateTime('21:00');

        while ($horaInicio <= $horaFin) {
            $this->tiempoServicio[] = $horaInicio->format('H:i');
            $horaInicio->modify('+5 minutes');
        }

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
        return view('components.panel-admin-administrator.desplegables.desplega-hora-fin-add-service', [
            'tiempoServicio' => $this->tiempoServicio,
            'tiempoServicioFin' => $this->tiempoServicioFin,
            'dataHourReserv' => $this->dataHourReserv,
        ]);
    }
}

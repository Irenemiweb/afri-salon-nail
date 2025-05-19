<?php

namespace App\View\Components\PanelAdminAdministrator\Configurationes;

use Illuminate\View\Component;

class DesplegableAntelacionReserva extends Component
{
    public $antelacionReserva;

    public function __construct()
    {
        $this->antelacionReserva = [
            "máx. con 7 días de antelación",
            "máx. con 14 días de antelación",
            "máx. con un mes de antelación",
            "máx. con 2 meses de antelación",
            "máx. con 3 meses de antelación",
            "máx. con 6 meses de antelación",
            "máx. con 12 meses de antelación",
            "máx. con 24 meses de antelación"
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin-administrator.configurationes.desplegable-antelacion-reserva');
    }
}

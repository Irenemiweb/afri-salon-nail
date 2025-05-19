<?php

namespace App\View\Components\PanelAdminAdministrator\Configurationes;

use Illuminate\View\Component;

class OpcionesAvanzadas extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin-administrator.configurationes.opciones-avanzadas');
    }
}

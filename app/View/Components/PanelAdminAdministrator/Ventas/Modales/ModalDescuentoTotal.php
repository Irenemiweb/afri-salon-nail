<?php

namespace App\View\Components\PanelAdminAdministrator\Ventas\Modales;

use Illuminate\View\Component;

class ModalDescuentoTotal extends Component
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
        return view('components.panel-admin-administrator.ventas.modales.modal-descuento-total');
    }
}

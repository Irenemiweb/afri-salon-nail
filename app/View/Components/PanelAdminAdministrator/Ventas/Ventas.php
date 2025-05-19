<?php

namespace App\View\Components\PanelAdminAdministrator\Ventas;

use Illuminate\View\Component;
use App\Models\Empleada;

class Ventas extends Component
{
    public $empleados;
    public function __construct()
    {
        $this->empleados = Empleada::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin-administrator.ventas.ventas');
    }
}

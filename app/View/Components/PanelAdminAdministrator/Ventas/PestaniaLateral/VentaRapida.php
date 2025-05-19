<?php

namespace App\View\Components\PanelAdminAdministrator\Ventas\PestaniaLateral;

use Illuminate\View\Component;
use App\Models\Servicio;
use App\Models\Empleada;

class VentaRapida extends Component
{
   public $allServices;
   public $empleados;
   public $iniciales;

    public function __construct()
    {
        $this->empleados = Empleada::all();
    //    $this->allServices = Servicio::all();
       $this->allServices = Servicio::where('activo', 'si')->get();

       $this->iniciales ='';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin-administrator.ventas.pestania-lateral.venta-rapida');
    }
}

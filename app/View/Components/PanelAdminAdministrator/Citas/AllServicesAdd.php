<?php

namespace App\View\Components\PanelAdminAdministrator\Citas;

use Illuminate\View\Component;
use App\Models\Servicio;
use App\Models\CategoriaServicio;

class AllServicesAdd extends Component
{
    public $servicios;
    public $categorias;

    public function __construct()
    {
        // $this->servicios = Servicio::all();
        $this->servicios = Servicio::where('activo', 'si')->get();

        $this->categorias = CategoriaServicio::all();
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin-administrator.citas.all-services-add', [
            'servicios' => $this->servicios,
            'categorias' => $this->categorias
        ]);
    }
}

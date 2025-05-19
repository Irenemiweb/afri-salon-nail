<?php

namespace App\View\Components\PanelAdminAdministrator\Citas;

use Illuminate\View\Component;


class AddService extends Component
{
    public $datosColocar;

    /**
     * Create a new component instance.
     *
     * @param array $data
     * @return void
     */
    public function __construct($datosColocar = [])
    {
        $this->datosColocar = $datosColocar;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin-administrator.citas.add-service', [
            'datosColocar' => $this->datosColocar
        ]);
    }
}

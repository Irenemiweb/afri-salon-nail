<?php

namespace App\View\Components\PanelAdminAdministrator\Citas;

use Illuminate\View\Component;
use App\Models\Empleada;

class ModalSelectEmple extends Component
{
    public $empleadas;
    public $data;

    public function __construct($data = [])
    {
        $this->empleadas = Empleada::all();
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin-administrator.citas.modal-select-emple', [
            'empleadas' => $this->empleadas,
            'data' => $this->data, // Aquí pasamos $data a la vista

        ]);
    }
}

<?php

namespace App\View\Components\PanelAdminAdministrator\Citas;

use Illuminate\View\Component;
use App\Models\User;

class ModalCancelarReserva extends Component
{
    public $users;
    public function __construct()
    {
       $this->users = User::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin-administrator.citas.modal-cancelar-reserva');
    }
}

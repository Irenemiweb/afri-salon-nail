<?php

namespace App\View\Components\PanelAdminAdministrator\Ventas\Offcanvas;

use Illuminate\View\Component;
use App\Models\User;
class ElegirCliente extends Component
{
  public $clientes;
  public $iniciales;
    public function __construct()
    {
        $this->clientes = User::where('is_admin', 0)  // Filtra los usuarios cuyo campo is_admin sea 0
        ->orderBy('name', 'asc') // Ordena por 'name' en orden ascendente
        ->orderBy('primer_apellido', 'asc') // Luego, ordena por 'primer_apellido' en orden ascendente
        ->get();
        // Crear un array con las iniciales de cada cliente
        $this->iniciales = $this->clientes->map(function($cliente) {
            // Obtener las iniciales del nombre y primer apellido
            $inicial = strtoupper(substr($cliente->name, 0, 1)) . strtoupper(substr($cliente->primer_apellido, 0, 1));

            return $inicial;
        });
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin-administrator.ventas.offcanvas.elegir-cliente');
    }
}

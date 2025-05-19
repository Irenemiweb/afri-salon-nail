<?php

namespace App\View\Components\PanelAdminAdministrator\Clientes;

use Illuminate\View\Component;
use App\Models\User;
use App\Models\Reserva;
use Carbon\Carbon;


class Principal extends Component
{
    public $clientes;
    public $iniciales;
    public $totalClientes;
    public $firstClient;
    // public $reservasFirstClient;
    public $proximasFclient;
    public $terminadasFclient;
    public $totalProximas;
    public $totalFinalizadas;
    public $id_inputSearch33;
    public $onkeyup;
    public $fechaUltimaReserva;
    public $totalInasistencias;
    public $totalReservas;
    public $totalCancelaciones;
    public $totalGastado;
    public $porcentaje;
    public function __construct()
    {
        $clientes = User::where('is_admin', 0)  // Filtra los usuarios cuyo campo is_admin sea 0
        ->orderBy('name', 'asc') // Ordena por 'name' en orden ascendente
        ->orderBy('primer_apellido', 'asc') // Luego, ordena por 'primer_apellido' en orden ascendente
        ->get();

    // Crear un array con las iniciales de cada cliente
    $iniciales = $clientes->map(function($cliente) {
        // Obtener las iniciales del nombre y primer apellido
        $inicial = strtoupper(substr($cliente->name, 0, 1)) . strtoupper(substr($cliente->primer_apellido, 0, 1));

        return $inicial;
    });
    $this->id_inputSearch33 = '';
    $this->onkeyup = '';
    // Asignar las dos colecciones a las propiedades
    $this->clientes = $clientes;
    $this->iniciales = $iniciales;
    // Obtener el total de clientes
    $this->totalClientes = $clientes->count();
    // Obtener el primer cliente
    $this->firstClient = $clientes->first();
    $userId = $this->firstClient->id; // Obtén el ID del usuario autenticado

    $now = Carbon::now();

    // Obtener citas próximas para el usuario autenticado
    $this->proximasFclient = Reserva::where('user_id', $userId)
        ->where('date_time', '>=', $now)
        // ->whereIn('status', ['pending', 'confirmed', 'pagada'])
        ->get();
    $this->totalProximas = $this->proximasFclient->count();
    // Obtener citas terminadas para el usuario autenticado
    $this->terminadasFclient = Reserva::where('user_id', $userId)
        ->where('date_time', '<', $now)
        // ->whereIn('status', ['completada', 'no_asistida'])
        ->get();
    $this->totalFinalizadas = $this->terminadasFclient->count();

   // Obtenemos la reserva más reciente
    $ultimaReservaTerminada = $this->terminadasFclient->sortByDesc('date_time')->first();

    // Comprobamos si existe una reserva y luego formateamos la fecha
    if ($ultimaReservaTerminada) {
        $this->fechaUltimaReserva = Carbon::parse($ultimaReservaTerminada->date_time)
            ->locale('es')  // Establecer idioma a español
            ->isoFormat('D MMM YYYY');  // Formato: día mes abreviado año
    } else {
        $this->fechaUltimaReserva = '-';  // Mensaje si no hay reservas
    }
    $this->totalInasistencias = $this->firstClient->inasistencias()->count();
    $this->totalReservas = Reserva::where('user_id', $userId)->count();
    $this->totalCancelaciones = $this->firstClient->cancelaciones()->count();
    $this->totalGastado = Reserva::where('user_id', $userId)->sum('total_payment');
    $descuento = $this->firstClient->descuentos->first();  // Obtiene el primer descuento
    $this->porcentaje = $descuento->porcentaje;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin-administrator.clientes.principal');
    }
}

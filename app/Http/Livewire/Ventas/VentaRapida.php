<?php

namespace App\Http\Livewire\Ventas;

use Livewire\Component;
use App\Models\Servicio;
use App\Models\Empleada;

class VentaRapida extends Component
{
    public $allServices;
    public $empleados;
    public $iniciales;
    public $pollCount = 0;
    public $maxPolls = 1;

    // Agregamos la propiedad $listeners aquí para escuchar el evento resetPollCount
    protected $listeners = ['resetPollCount' => 'resetPollCount'];

    public function mount()
    {
        $this->empleados = Empleada::all();
        $this->allServices = Servicio::where('activo', 'si')->get();
        $this->iniciales = '';
    }
    public function manejarPoll(){
        $this->incrementPollCount();
        $this->actualizarServicios();
    }
    public function actualizarServicios()
    {
        $this->allServices = Servicio::where('activo', 'si')->get();
    }

    public function render()
    {
        return view('livewire.ventas.venta-rapida');
    }

    // Incrementa pollCount si no ha alcanzado el máximo
    public function incrementPollCount()
    {
        if ($this->pollCount < $this->maxPolls) {
            $this->pollCount++;
        }
    }

    // Resetea pollCount a cero
    public function resetPollCount()
    {
        $this->pollCount = 0;
    }

    // Resetear pollCount si fuera necesario en algún caso específico
    public function resetPoll()
    {
        $this->pollCount = 0;
    }
}




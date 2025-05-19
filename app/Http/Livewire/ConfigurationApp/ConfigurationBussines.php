<?php

namespace App\Http\Livewire\ConfigurationApp;

use Livewire\Component;

class ConfigurationBussines extends Component
{
    public $isVisible = true; // Se mostrará inicialmente en principio
    // Método para ocultar el componente cuando se emite el evento
    public function hideComponent()
    {
        $this->isVisible = false;
    }
    // Este método muestra el componente
    public function showComponent()
    {
        $this->isVisible = true;
    }
    public function render()
    {
        return view('livewire.configuration-app.configuration-bussines');
    }
    // Escuchar el evento para ocultarse
    protected $listeners = [
        'loadConfigurationBussines' => 'showComponent',  // Mostrar
        'hideConfigurationBussines' => 'hideComponent'   // Ocultar
    ];
}

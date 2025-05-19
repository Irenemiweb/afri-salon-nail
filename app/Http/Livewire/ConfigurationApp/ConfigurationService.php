<?php

namespace App\Http\Livewire\ConfigurationApp;

use Livewire\Component;

class ConfigurationService extends Component
{
    public $isVisible = false;//para controlar la visibilidad
    // Método para mostrar el componente
    public function showComponent()
    {
        $this->isVisible = true; // Cambia la visibilidad a true cuando se llama
    }
    public function hideComponent()
    {
        $this->isVisible = false;
    }
    // Escuchar el evento para ocultarse
    protected $listeners = [
        'loadConfigurationService' => 'showComponent',  // Mostrar
        'hideConfigurationService' => 'hideComponent'   // Ocultar
    ];
    public function render()
    {
        return view('livewire.configuration-app.configuration-service');
    }
}

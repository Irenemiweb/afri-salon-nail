<?php

namespace App\Http\Livewire\ConfigurationApp;

use Livewire\Component;
use App\Models\CategoriaServicio;
use App\Models\Servicio;

class ShowAllServices extends Component
{
    public $isVisible = false;//para controlar la visibilidad en un principio
    // Este método muestra el componente
    public function showComponent()
    {
        $this->isVisible = true;
    }

    // Este método oculta el componente
    public function hideComponent()
    {
        $this->isVisible = false;
    }
    public function render()
    {
        $servicios = Servicio::where('activo', 'si')->get();
        $categorias = CategoriaServicio::where('activo', 'si')->get();
        return view('livewire.configuration-app.show-all-services', compact('servicios', 'categorias'));
    }
    protected $listeners = [
        'loadShowAllService' => 'showComponent',  // Mostrar
        'hideShowAllService' => 'hideComponent'   // Ocultar
    ];
}

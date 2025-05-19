<?php

namespace App\View\Components\layouts;

use Illuminate\View\Component;
use Carbon\Carbon;
use App\Models\CategoriaServicio;
use App\Models\Servicio;
class Index extends Component
{

    public $fechaActual2;
    public $categoriasIndex;
    public $servicios;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categoriasIndex = CategoriaServicio::all();
        // $this->servicios = Servicio::all();
        $this->servicios = Servicio::where('activo', 'si')->get();

        Carbon::setLocale('es');
        $this->fechaActual2 = Carbon::now('Europe/Madrid'); // Fecha actual
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.index', [
            'fechaActual' => $this->fechaActual2->format('Y-m-d'),
            'categoriasIndex' => $this->categoriasIndex,
            'servicios' => $this->servicios
        ]);
    }
}

<?php

namespace App\View\Components\FormNewService;

use Illuminate\View\Component;
use App\Models\CategoriaServicio;
use App\Models\ColorServicio;

class FormNewService extends Component
{
    public $categoryService;
    public $nombreServicio;
    public $descripcionServicio;
    public $horaService;
    public $minutoService;
    public $precioServicio;
    public $colorServicio;
    public $tipoPrecio;
    public $images = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categoryService = CategoriaServicio::all();
        $this->colorServicio = ColorServicio::all();
        $this->horaService = [];
        for ($i = 0; $i < 24; $i++) {
            $this->tiempoServicio[] = "{$i}h";
        }
        $this->minutoService = [];
        for ($i = 0; $i < 60; $i += 5) {
            $this->minutoService[] = "{$i}min";
        }
        $this->tipoPrecio = [
            'Fijo',
            'Variable',
            'No mostrar',
            'Gratis',
            'Desde'
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-new-service.form-new-service', [
            'colorServicio' => $this->colorServicio,
            'categoryService' => $this->categoryService,
            'tiempoServicio' => $this->tiempoServicio,
            'minutoService' => $this->minutoService,
            'tipoPrecio' => $this->tipoPrecio
        ]);
    }
}

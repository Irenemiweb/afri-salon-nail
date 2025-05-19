<?php

namespace App\View\Components\navigation;

use Illuminate\View\Component;
use App\Models\Categoria;
class NavigationCategory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categorias;
    public function __construct()
    {
        // $this->categorias = Categoria::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navigation.navigation-category', [
            // 'categorias' => $this->categorias,
        ]);
    }
}

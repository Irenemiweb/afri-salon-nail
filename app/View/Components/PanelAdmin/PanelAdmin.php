<?php

namespace App\View\Components\PanelAdmin;

use Illuminate\View\Component;

class PanelAdmin extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $valuesMap;
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panel-admin.panel-admin');
    }
}

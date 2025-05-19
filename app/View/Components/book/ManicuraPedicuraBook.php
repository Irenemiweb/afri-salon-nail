<?php

namespace App\View\Components\book;

use Illuminate\View\Component;

class ManicuraPedicuraBook extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
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
        return view('components.book.manicura-pedicura-book');
    }
}

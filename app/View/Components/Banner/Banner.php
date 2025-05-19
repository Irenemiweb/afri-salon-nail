<?php

namespace App\View\Components\Banner;

use Illuminate\View\Component;
use Carbon\Carbon;
class Banner extends Component
{
    public $notice1;
    public $subNotice1;
    public $buton1_text;
    public $notice2;
    public $subNotice2;
    public $buton2_text;
    public $notice3;
    public $subNotice3;
    public $buton3_text;
    public $buton3a_text;
    public $fechaEspecifica1;
    public $fechaEspecifica2;
    public $fechaActual;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // fecha actual
        $this->fechaActual = Carbon::now()->locale('es')->isoFormat('D MMMM YYYY');
        // Definir una fecha específica
        $this->fechaEspecifica1 = Carbon::createFromFormat('Y-m-d', '2024-12-01')
        ->locale('es')
        ->isoFormat('D MMMM YYYY');
        $this->fechaEspecifica2 = Carbon::createFromFormat('Y-m-d', '2025-03-10')
        ->locale('es')
        ->isoFormat('D MMMM YYYY');
        $this->notice1 = 'Vamos, hazte soci@';
        $this->subNotice1= 'Es gratis y disfrutarás de cosas exclusibas, tarjetas regalo, bonos . . . ';
        $this->buton1_text = 'Hacerme soci@';

        $this->notice2 = 'Adelante!!';
        $this->subNotice2= 'Echa un vistazo a nuestro salón y conoce a nuestro equipo.';
        $this->buton2_text = 'Entrar';

        $this->notice3 = 'Guala!!';
        $this->subNotice3= 'Nuestros servicios y productos a tu disposición. Ahora puedes hacer tu reserva o compra online.';
        $this->buton3_text = 'Servicios';
        $this->buton3a_text = 'Productos';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.banner.banner', [
            "notice1" => $this->notice1,
            "subNotice1" => $this->subNotice1,
            "buton1_text" => $this->buton1_text,
            "notice2" => $this->notice2,
            "subNotice2" => $this->subNotice2,
            "buton2_text" => $this->buton2_text,
            "notice3" => $this->notice3,
            "subNotice3" => $this->subNotice3,
            "buton3_text" => $this->buton3_text,
            "buton3a_text" => $this->buton3a_text,
            'fechaActual' =>$this->fechaActual,
            'fechaEspecifica1' =>$this->fechaEspecifica1,
            'fehcaEspecifica2' =>$this->fechaEspecifica2
        ]);
    }
}

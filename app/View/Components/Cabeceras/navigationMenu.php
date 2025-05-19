<?php

namespace App\View\Components\Cabeceras;

use Illuminate\View\Component;
use App\Models\User;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class navigationMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $messenger_color;
    public $users;
    public $unseenCounter;
    public $pruebaNavegador;
    public function __construct()
    {
        $this->messenger_color = Auth::user()->messenger_color;
        $this->users = User::where('id', '!=', auth()->user()->id)->get();
        $this->unseenCounter = Chatify::countUnseenMessages();
        $this->pruebaNavegador = 'CABECERA';
        // $this->unseenCounter = 2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render($id = null)
    {
        return view('components.cabeceras.navigation-menu', [
            'pruebaNavegador' => $this->pruebaNavegador,
            'unseenCounter' => $this->unseenCounter,
            'users' => $this->users,
            'id' => $id ?? 0,
            'messengerColor' => $this->messenger_color ? $this->messenger_color : Chatify::getFallbackColor(),
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }
}

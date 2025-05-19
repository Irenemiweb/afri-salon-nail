<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public $messenger_color;
    public $users;
    public $unseenCounter;
    public $categorias;

    public function __construct()
    {
        $this->messenger_color = Auth::user()->messenger_color;
        $this->users = User::where('id', '!=', auth()->user()->id)->get();

        $this->unseenCounter = Chatify::countUnseenMessages();
        $this->unseenCounter = 2;
        // $this->categorias = Categoria::all();

    }

     public function render($id = null)
    {
        return view('layouts.app', [
            'unseenCounter' => $this->unseenCounter,
            'users' => $this->users,
            'id' => $id ?? 0,
            'messengerColor' => $this->messenger_color ? $this->messenger_color : Chatify::getFallbackColor(),
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
            // 'categorias' => $this->categorias,
        ]);
    }
}

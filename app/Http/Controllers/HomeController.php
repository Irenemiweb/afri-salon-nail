<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Servicio;
use App\Models\ImageNewService;
use App\Models\CategoriaServicio;
use App\Models\User;
use App\Models\Empleada;
use Carbon\Carbon;
use App\Models\Categoriageneral;
class HomeController extends Controller
{
    public function index($id = null)
    {
        $messenger_color = Auth::user()->messenger_color;

        return view('components.layouts.index', [
            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }
    public function manipediBook($id = null){
          $messenger_color = Auth::check() ? Auth::user()->messenger_color : null;
         return view('components.layouts.maniPedi-book', [

            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            // 'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
            'dark_mode' => optional(Auth::user())->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }
    public function initPage( $id = null){
        // dd($executeJavascript2);
        $initPage = "hola estas en initPage";
        $empleadas = Empleada::all();
        $clientes = User::all();
        $categoriasGenerales = Categoriageneral::all();
        // Verificar si hay menos de 6 clientes y duplicarlos si es necesario
        //para que funcione el bucle
        if (count($clientes) < 6) {
            $clientes = $clientes->concat($clientes); // Duplica la lista
        }
        $categoriasIndex = CategoriaServicio::all();
        // $servicios = Servicio::all();
        $servicios = Servicio::where('activo', 'si')->get();

        $imagenesDelServicio = ImageNewService::all();
        // $categorias = Categoria::all();
        $messenger_color = Auth::check() ? Auth::user()->messenger_color : null;
        Carbon::setLocale('es');
        $fechaActual2 = Carbon::now('Europe/Madrid'); // Fecha actual
        $anioActual = $fechaActual2->format('Y');
        $mesActual = $fechaActual2->translatedFormat('F Y');
        return view('components.layouts.index', [
            'initPage' => $initPage,
            'clientes' => $clientes,
            'categoriasIndex' => $categoriasIndex,
            'fechaActual2' => $fechaActual2,
            'mesActual' => $mesActual,
            'anioActual' =>$anioActual,
            'servicios' =>$servicios,
            'imagenesDelServicio' =>$imagenesDelServicio,
            'empleadas' =>$empleadas,
            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            // 'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
            'dark_mode' => optional(Auth::user())->dark_mode < 1 ? 'light' : 'dark',
            'categoriasGenerales' => $categoriasGenerales
        ]);
    }
    public function initPageReservServ( $id = null){
        // dd($executeJavascript2);
        $empleadas = Empleada::all();
        $clientes = User::all();
        // Verificar si hay menos de 6 clientes y duplicarlos si es necesario
        //para que funcione el bucle
        $executeJavascript2 = true;
        if (count($clientes) < 6) {
            $clientes = $clientes->concat($clientes); // Duplica la lista
        }
        $categoriasIndex = CategoriaServicio::all();
        // $servicios = Servicio::all();
        $servicios = Servicio::where('activo', 'si')->get();

        $imagenesDelServicio = ImageNewService::all();
        // $categorias = Categoria::all();
        // $messenger_color = Auth::user()->messenger_color;
        Carbon::setLocale('es');
        $fechaActual2 = Carbon::now('Europe/Madrid'); // Fecha actual
        $anioActual = $fechaActual2->format('Y');
        $mesActual = $fechaActual2->translatedFormat('F Y');
        return view('components.layouts.index', [
            'executeJavascript2' => $executeJavascript2,
            'clientes' => $clientes,
            'categoriasIndex' => $categoriasIndex,
            'fechaActual2' => $fechaActual2,
            'mesActual' => $mesActual,
            'anioActual' =>$anioActual,
            'servicios' =>$servicios,
            'imagenesDelServicio' =>$imagenesDelServicio,
            'empleadas' =>$empleadas
            // 'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            // 'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }
}

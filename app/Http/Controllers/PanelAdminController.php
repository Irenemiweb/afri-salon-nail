<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PanelAdminController extends Controller
{
    public $valuesMap;
    public function __construct()
    {
        $this->valuesMap = [
            'user' => ['User', 'tab_user_button', 'panel/User'],
            'upProduct' => ['ProductUp', 'tab_user_product', 'panel/Up'],
            'message' => ['Mensajes_user', 'tab_user_message', 'panel/Mensajes_user'],
            'product' => ['Productos', 'tab_user_product', 'panel/Productos'],
            'reservas' => ['Reservas', 'tab_user_reservas2', 'panel/Reservas'],
            'compras' => ['Compras', 'tab_user_compras', 'panel/Compras'],
            'estatistic' => ['Estatistic', 'tab_user_estatistic', 'panel/Estatistic'],
            'favoritos' => ['Favoritos', 'tab_user_favoritos', 'panel/Favoritos'],
            'monedero' => ['Monedero', 'tab_user_monedero', 'panel/Monedero'],
            'gualazonpro' => ['GualazonPro', 'tab_user_gualazonpro', 'panel/GualazonPro'],
            'ayuda' => ['Ayuda', 'tab_user_ayuda', 'panel/Ayuda'],
            'configuracion' => ['Configuracion', 'tab_user_configuracion', 'panel/Configuracion'],
        ];
    }

    public function panelAdminUser( $id = null){
        $messenger_color = Auth::user()->messenger_color;
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('components.panel-admin.panel-admin', [
            'users' => $users,
            'valuesMap' => $this->valuesMap,
            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
      }

    public function panelAdminUser_up( $id = null){
        $messenger_color = Auth::user()->messenger_color;
        $users = User::where('id', '!=', auth()->user()->id)->get();
        $executeJavaScript = true;
        $value= 'upProduct';
        return view('components.panel-admin.panel-admin', [
            'executeJavaScript' => $executeJavaScript,
            'value' => $value,
            'valuesMap' => $this->valuesMap,
            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }
    public function panelAdminUser_Product( $id = null){
        $executeJavaScript = true;
        $value = 'product';
        return view('components.panel-admin.panel-admin', [
            'executeJavaScript' => $executeJavaScript,
            'value' => $value,
            'valuesMap' => $this->valuesMap,
            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }
    public function panelAdminUser_Message( $id = null){
        $messenger_color = Auth::user()->messenger_color;
        $executeJavaScript = true;
        $value = 'message';
        return view('components.panel-admin.panel-admin', [
            'executeJavaScript' => $executeJavaScript,
            'value' => $value,
            'valuesMap' => $this->valuesMap,
            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }
    public function panelAdminUser_Reservas(){
        $messenger_color = Auth::user()->messenger_color;
        $executeJavaScript = true;
        $value = 'reservas';
        return view('components.panel-admin.panel-admin', [
            'executeJavaScript' => $executeJavaScript,
            'value' => $value,
            'valuesMap' => $this->valuesMap,
            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }
    public function panelAdminUser_Compras(){
        $messenger_color = Auth::user()->messenger_color;
        $executeJavaScript = true;
        $value = 'compras';
        return view('components.panel-admin.panel-admin', [
            'executeJavaScript' => $executeJavaScript,
            'value' => $value,
            'valuesMap' => $this->valuesMap,
            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }
    public function panelAdminUser_Estatistic(){
        $messenger_color = Auth::user()->messenger_color;
        $executeJavaScript = true;
        $value = 'estatistic';
        return view('components.panel-admin.panel-admin', [
            'executeJavaScript' => $executeJavaScript,
            'value' => $value,
            'valuesMap' => $this->valuesMap,
            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }
    public function panelAdminUser_Favoritos(){
        $executeJavaScript = true;
        $value = 'favoritos';
        return view('components.panel-admin.panel-admin', [
            'executeJavaScript' => $executeJavaScript,
            'value' => $value,
            'valuesMap' => $this->valuesMap
        ]);
    }
    public function panelAdminUser_Monedero(){
        $executeJavaScript = true;
        $value = 'monedero';
        return view('components.panel-admin.panel-admin', [
            'executeJavaScript' => $executeJavaScript,
            'value' => $value,
            'valuesMap' => $this->valuesMap
        ]);
    }
    public function panelAdminUser_GualazonPro(){
        $executeJavaScript = true;
        $value = 'gualazonpro';
        return view('components.panel-admin.panel-admin', [
            'executeJavaScript' => $executeJavaScript,
            'value' => $value,
            'valuesMap' => $this->valuesMap
        ]);
    }
    public function panelAdminUser_Ayuda(){
        $executeJavaScript = true;
        $value = 'ayuda';
        return view('components.panel-admin.panel-admin', [
            'executeJavaScript' => $executeJavaScript,
            'value' => $value,
            'valuesMap' => $this->valuesMap
        ]);
    }
    public function panelAdminUser_Configuracion(){
        $executeJavaScript = true;
        $value = 'configuracion';
        return view('components.panel-admin.panel-admin', [
            'executeJavaScript' => $executeJavaScript,
            'value' => $value,
            'valuesMap' => $this->valuesMap
        ]);
    }
    public function saveImage(Request $request)
    {
        try {
            $user = Auth::user();

            // Obtener la imagen en base64 del formulario
            $imageData = $request->input('image');

            // Obtener el tipo de imagen desde el prefijo base64
            if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
                $imageType = strtolower($type[1]); // jpg, png, gif, etc.
                $imageData = substr($imageData, strpos($imageData, ',') + 1);
            } else {
                throw new \Exception('Formato de imagen no válido');
            }

            // Reemplazar espacios con '+'
            $imageData = str_replace(' ', '+', $imageData);

            // Decodificar la imagen
            $image = base64_decode($imageData);

            // Crear un nombre único para la imagen
            $imageName = 'profile_' . $user->id . '_' . uniqid() . '.' . $imageType;

            // Guardar la imagen en el almacenamiento
            Storage::put('public/profile-photos/' . $imageName, $image);

            // Guardar la ruta de la imagen en la base de datos
            $user->profile_photo_path = 'profile-photos/' . $imageName;
            $user->save();

            return response()->json(['message' => 'Imagen guardada correctamente', 'image' => $user->profile_photo_path]);
        } catch (\Exception $e) {
            // Registrar el error en los logs de Laravel
            \Log::error('Error al guardar la imagen: ' . $e->getMessage());
            return response()->json(['error' => 'Error al guardar la imagen', 'message' => $e->getMessage()], 500);
        }
    }

}


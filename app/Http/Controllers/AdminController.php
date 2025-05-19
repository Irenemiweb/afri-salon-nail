<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Support\Facades\Auth;
use App\Models\TemporaryImageNewService;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class AdminController extends Controller
{
    public $valuesMap;
    public $colorOptions;
    public function __construct()
    {
        $this->valuesMap = [
            'user' => ['User_administrator', 'tab_administrator_button', 'admin/dashboard/User'],
            'ventas' => ['Ventas_administrator', 'tab_administrator_ventas', 'admin/dashboard/Ventas_administrator'],
            'citas' => ['Citas_administrator', 'tab_administrator_citas', 'admin/dashboard/Citas_administrator'],
            'message' => ['Mensajes_administrator', 'tab_administrator_message', 'admin/dashboard/Mensajes_administrator'],
            'estatistic' => ['Estatistic_administrator', 'tab_administrator_estatistic', 'admin/dashboard/Estatistic'],
            'inventario' => ['Inventario_administrator', 'tab_administrator_inventario', 'admin/dashboard/Inventario'],
            'empleados' => ['Empleados_administrator', 'tab_administrator_empleados', 'admin/dashboard/Empleados'],
            'tarjetabono' => ['Tarjeta-bono_administrator', 'tab_administrator_tarjetaBono', 'admin/dashboard/Tarjeta-bono'],
            'perfilNegocio' => ['Perfil-negocio_administrator', 'tab_administrator_perfilNegocio', 'admin/dashboard/Perfil-negocio'],
            'clientes' => ['Clientes_administrator', 'tab_administrator_clientes', 'admin/dashboard/Clientes_administrator'],
            'configuracion' => ['Configuracion_administrator', 'tab_administrator_configuracion', 'admin/dashboard/Configuracion_administrator'],
            'configuracion_createService' => ['Configuracion_administrator', 'tab_administrator_configuracion', 'admin/dashboard/Configuracion_createService'],
            'configuracion_showAllservice' => ['Configuracion_administrator', 'tab_administrator_configuracion', 'admin/dashboard/Configuracion_showAllServices'],
        ];

        $this->colorOptions = [
            'yellow' => 'Yellow',
            'blue' => 'Blue',
            'navy_blue' => 'Navy Blue',
            'beige' => 'Beige',
            'white' => 'White',
            'coral' => 'Coral',
            'gold' => 'Gold',
            'gray' => 'Gray',
            'space_gray' => 'Space Gray',
            'lilac' => 'Lilac',
            'brown' => 'Brown',
            'orange' => 'Orange',
            'black' => 'Black',
            'rose_gold' => 'Rose Gold',
            'silver' => 'Silver',
            'red' => 'Red',
            'pink' => 'Pink',
            'green' => 'Green',
            'night_green' => 'Night Green',
            'violet' => 'Violet',
            'multicolor' => 'Multicolor',
            'other' => 'Other'
        ];
    }
    public function dashboard()
    {
        $messenger_color = Auth::user()->messenger_color;

        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('components.panel-admin-administrator.administrator', [

            'users' => $users,
            'valuesMap' => $this->valuesMap,
            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }

    public function dashboard_userNormal()
    {
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

    private function loadAdminPanelView($value, $id = null, $showDiv = null)
    {
        $messenger_color = Auth::user()->messenger_color;
        $executeJavaScript = true;
        $executeCalendar = true;
        return view('components.panel-admin-administrator.administrator', [
            'executeCalendar' => $executeCalendar,
            'executeJavaScript' => $executeJavaScript,
            'value' => $value,
            'valuesMap' => $this->valuesMap,
            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
            'colorOptions' => $this->colorOptions,
            'sowDiv' => $showDiv,
        ]);
    }
    public function panelAdministrator_Ventas($id = null)
    {
        return $this->loadAdminPanelView('ventas', $id);
    }

    public function panelAdministrator_Citas($id = null)
    {
        return $this->loadAdminPanelView('citas', $id);
    }

    public function panelAdministrator_Mensajes($id = null)
    {

        return $this->loadAdminPanelView('message', $id);
    }

    public function panelAdministrator_Estatistics($id = null)
    {
        return $this->loadAdminPanelView('estatistic', $id);
    }

    public function panelAdministrator_Inventario($id = null)
    {
        return $this->loadAdminPanelView('inventario', $id);
    }

    public function panelAdministrator_Empleados($id = null)
    {
        return $this->loadAdminPanelView('empleados', $id);
    }

    public function panelAdministrator_Tarjeta_bono($id = null)
    {
        return $this->loadAdminPanelView('tarjetabono', $id);
    }

    public function panelAdministrator_Perfil_negocio($id = null)
    {
        return $this->loadAdminPanelView('perfilNegocio', $id);
    }

    public function panelAdministrator_Clientes($id = null)
    {
        return $this->loadAdminPanelView('clientes', $id);
    }

    public function panelAdministrator_Configuracion($id = null)
    {
        return $this->loadAdminPanelView('configuracion', $id);
    }
    public function panelAdministrator_ConfiguracionShowAllServices($id = null)
    {

        return $this->loadAdminPanelView('configuracion_showAllservice', $id);
    }
    public function panelAdministrator_createService($id = null)
    {
        $idUser = auth()->id();
        $temporaryImages = TemporaryImageNewService::where('id_user', $idUser)->get(); // Usar ->get() para obtener todos

        if($temporaryImages->isNotEmpty()) { // Verificar si hay imágenes temporales
            foreach ($temporaryImages as $temporaryImage) {
                // Eliminar el directorio de cada imagen temporal
                Storage::deleteDirectory('imagesServices_/tmp/' . $temporaryImage->folder);
                $temporaryImage->delete(); // Eliminar el registro de la base de datos
            }
        }
        return $this->loadAdminPanelView('configuracion_createService', $id);
    }
}

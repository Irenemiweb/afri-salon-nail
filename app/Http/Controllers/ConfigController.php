<?php

namespace App\Http\Controllers;
use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Models\CategoriaServicio;
use App\Models\Empleada;
use App\Models\Reserva;
use App\Models\User;
use App\Models\InfoAdicionalCliente;
use Carbon\Carbon;
use App\Models\Descuento;
use App\Models\ConfiguracionReserva;
use App\Models\Recibo;
use App\Models\ReciboServicioVendido;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReciboReserva;


class ConfigController extends Controller
{
    // public function showPayments()
    // {
    //     // Aquí puedes devolver solo la vista que quieres cargar dinámicamente
    //     return view('components.settings.payments');
    // }
    public function showConfigServices()
    {
        // Aquí puedes devolver solo la vista que quieres cargar dinámicamente
        return view('components.panel-admin-administrator.configuracion.config-servicios');
    }
    public function showConfig(){
        return view('components.panel-admin-administrator.configuracion.configuracion');
    }

    public function showEditServices()
    {
        // Devolver otra vista para la información del negocio
        return view('components.panel-admin-administrator.configuracion.config-servicios_b');
    }

public function getServicesByIdArray(Request $request){
    $ids_services = $request->input('id_serviceArray'); // Array de IDs de servicios
    $serviciosEncontrados = [];
    $no_encontrados = [];

    if (is_array($ids_services)) {
        // Buscar los servicios en la base de datos
        $servicios = Servicio::whereIn('id', $ids_services)->get();

        // Separar los encontrados y no encontrados
        foreach ($ids_services as $id) {
            $servicio = $servicios->firstWhere('id', $id);
            if ($servicio) {
                $serviciosEncontrados[] = $servicio;
            } else {
                $no_encontrados[] = $id;
            }
        }

        return response()->json([
            'serviciosEncontrados' => $serviciosEncontrados,
            'no_encontrados' => $no_encontrados,
        ]);
    } else {
        return response()->json([
            'error' => 'El parámetro ids_services debe ser un array.',
        ], 400); // Respuesta con código de error 400 (Bad Request)
    }
}

public function storeServiciosVendidos(Request $request){
      // dd($request->all());
  // Obtener el id del recibo (único) desde la solicitud
  $id_recibo = $request->input('id_recibo');

  // Obtener el array de servicios con los descuentos
  $servicios = $request->input('arrayServiciosVendidos');

  // Comenzamos una transacción
  DB::beginTransaction();

  try {
      // Creamos un array para almacenar los registros creados con éxito
      $registrosGuardados = [];

      // Iteramos sobre el array de servicios
      foreach ($servicios as $servicioData) {
          // Obtener el servicio por su ID
          $servicio = Servicio::find($servicioData['idServicio']);

          if ($servicio) {
                $descuento_servicio = floatval($servicioData['descuento_servicio']);
                $precio = floatval($servicioData['precio']);
                $id_empleado = $servicioData['id_empleado'];
                if($id_empleado === "cualquiera"){
                    $id_empleado = null;
                }
                else{
                    $id_empleado =  $servicioData['id_empleado'];
                }
              // Calcular el importe del descuento
              $descuento_importe = ($descuento_servicio / 100) * $precio;

              // Crear el registro en la tabla 'recibos_servicios_vendidos'
              $registro = ReciboServicioVendido::create([
                  'id_servicio' => $servicioData['idServicio'],
                  'id_recibo' => $id_recibo,  // El id del recibo es el mismo para todos
                  'descuento_porcentaje' => $servicioData['descuento_servicio'],
                  'descuento_importe' => $descuento_importe,

                  'empleado_id' => $id_empleado, // Suponiendo que lo pasas en la solicitud
              ]);

              // Guardamos el registro exitoso en el array
              $registrosGuardados[] = $registro;
          }
      }

      // Si llegamos aquí, todos los registros fueron creados con éxito
      DB::commit(); // Confirmamos la transacción

      // Retornamos la respuesta con los registros guardados
      return response()->json([
          'message' => 'Todos los servicios fueron añadidos al recibo correctamente.',
          'data' => $registrosGuardados // Aquí puedes devolver los registros guardados
      ], 201);

  } catch (\Exception $e) {
      // Si algo sale mal, revertimos todos los cambios
      DB::rollBack();

      // Devolvemos el error
      return response()->json([
          'message' => 'Error al añadir servicios al recibo.',
          'error' => $e->getMessage()  // Puedes incluir más detalles si es necesario
      ], 500);
  }
}
public function enviarRecibo(Request $request){
        // Obtener la reserva por ID
        // dd($request->all());
        $recibo = Recibo::findOrFail($request->id_recibo);
        $serviciosVendidos = ReciboServicioVendido::where('id_recibo', $request->id_recibo)->get();


        // Enviar el correo con los detalles de la reserva
        Mail::to($request->emailCliente)->send(new ReciboReserva($recibo, $request->all(), $serviciosVendidos));

        return response()->json([
            'enviado' => true
        ]);
}

public function createTicket(Request $request){
    // dd($request->all());
    $creado = false;
    // Crear el nuevo recibo
    $recibo = Recibo::create([
        'id_cliente' => $request->id_cliente_,
        'tipo_impuesto' => "21",
        'valor_neto' => $request->valor_neto,
        'importe_impuesto' => $request->importe_impuesto,
        'valor_bruto' => $request->valor_bruto,
        'subtotal' => $request->subtotal,
        'descuento_total' => $request->descuento_total,
        'descuento_total_porcentaje' => $request-> descuento_total_porcentaje,
        'responsable_cobro' => $request->responsable_cobro
    ]);
    // Comprobar si el servicio existe
    if ($recibo) {
        $creado = true;
        return response()->json([
            'creado' => $creado,
            'recibo' => $recibo
        ]);
    } else {
        return response()->json([
            'creado' => $creado
        ]);
    }
}


public function get_all_clients() {
    $clientes = User::where('is_admin', 0)  // Filtra los usuarios cuyo campo is_admin sea 0
    ->orderBy('name', 'asc') // Ordena por 'name' en orden ascendente
    ->orderBy('primer_apellido', 'asc') // Luego, ordena por 'primer_apellido' en orden ascendente
    ->get();
    // Crear un array con las iniciales de cada cliente
    $iniciales = $clientes->map(function($cliente) {
        // Obtener las iniciales del nombre y primer apellido
        $inicial = strtoupper(substr($cliente->name, 0, 1)) . strtoupper(substr($cliente->primer_apellido, 0, 1));

        return $inicial;
    });
    // Verificar si se encontraron clientes
    if ($clientes->isNotEmpty()) {
        return response()->json([
            'encontrado' => true,
            'clientesAll' => $clientes,
            'iniciales' => $iniciales,
        ]);
    } else {
        return response()->json([
            'encontrado' => false,
        ]);
    }
}

public function getClienteById(Request $request){
    $encontrado = false;
    $id_cliente = $request->input('id_cliente_');

    // Buscar el servicio en la base de datos
    $cliente = User::find($id_cliente);

    // Comprobar si el servicio existe
    if ($cliente) {
        $encontrado = true;
        return response()->json([
            'encontrado' => $encontrado,
            'cliente' => $cliente,
        ]);
    } else {
        return response()->json([
            'encontrado' => $encontrado,
        ]);
    }
}
public function getReservaById(Request $request){
    $encontrado = false;
    $id_reserva = $request->input('id_reserva');

    // Buscar el servicio en la base de datos
    $reserva = Reserva::find($id_reserva);

    // Comprobar si el servicio existe
    if ($reserva) {
        $encontrado = true;
        return response()->json([
            'encontrado' => $encontrado,
           'reserva' => $reserva,
        ]);
    } else {
        return response()->json([
            'encontrado' => $encontrado,
        ]);
    }
}

    public function getServiceById(Request $request){
        $encontrado = false;
        $id_service = $request->input('id_service');

        // Buscar el servicio en la base de datos
        $servicio = Servicio::find($id_service);

        // Comprobar si el servicio existe
        if ($servicio) {
            $encontrado = true;
            return response()->json([
                'encontrado' => $encontrado,
                'servicio' => $servicio,
            ]);
        } else {
            return response()->json([
            'encontrado' => $encontrado,
            ]);
        }
    }
    public function getAllEmpleados(Request $request) {
        $empleados = Empleada::all();  // Obtiene todos los empleados de la base de datos marcarNotificacionLeidabyId

        // Verificar si se encontraron empleados
        if ($empleados->isNotEmpty()) {
            return response()->json([
                'encontrado' => true,
                'empleadosAll' => $empleados,
            ]);
        } else {
            return response()->json([
                'encontrado' => false,
            ]);
        }
    }

    public function marcarTodasNotificacionLeida(){
        $marcadas = false;
        Reserva::whereIn('status', ['confirmed', 'pending'])
           ->where('comprobada', 'no')
           ->update(['comprobada' => 'si']);
        $marcadas = true;
           return response()->json([
            'marcadas' => $marcadas,
        ]);

    }

    public function marcarNotificacionLeidabyId(Request $request)
{
    $marcada = false;

    // Asegurarse de que el id_reserva está presente en la solicitud
    $idReserva = $request->input('id_reserva');

    // Actualizar solo la reserva con el id_reserva proporcionado y con status 'confirmed' o 'pending'
    $reserva = Reserva::whereIn('status', ['confirmed', 'pending'])
                      ->where('comprobada', 'no')
                      ->where('id', $idReserva)  // Filtrar por id_reserva
                      ->update(['comprobada' => 'si']);

    // Si se actualizó alguna reserva, marcarla como true
    if ($reserva) {
        $marcada = true;
        return response()->json([
            'reserva'=> $reserva,
            'marcada' => $marcada,
        ]);
    }else{
        return response()->json([
            'marcada' => $marcada,
        ]);
    }

}



    public function getConfigReservas(){
    $configuraciones = ConfiguracionReserva::all();

    // Verificar si se encontraron configuraciones
    if ($configuraciones->isNotEmpty()) {

        return response()->json([
            'encontrado' => true,
            'configuraciones' => $configuraciones,
        ]);
    } else {
        return response()->json([
            'encontrado' => false,
        ]);
    }
    }

    public function getEmpleadosByIds(Request $request){
        $encontrado = false;
        // Obtener el array de IDs de empleados desde la solicitud
        $ids_empleados = $request->input('ids_empleados');  // Asegúrate de que el input sea un array

        // Buscar los empleados cuyos IDs están en el array
        $empleados = Empleada::whereIn('id', $ids_empleados)->get();

        // Verificar si se encontraron empleados
        if ($empleados->isNotEmpty()) {
            $encontrado = true;
            return response()->json([
                'encontrado' => $encontrado,
                'empleados' => $empleados,
            ]);
        } else {
            return response()->json([
                'encontrado' => $encontrado,
            ]);
        }
    }
    //PLANTILLAS
    public function obtenerVistaServiciosConfiguracion(){
        $servicios = Servicio::where('activo', 'si')->get();
        // Aquí se puede realizar cualquier lógica adicional si es necesario
        return view('plantillas.plantilla-servicios-configuracion', compact('servicios'));
    }
    public function obtenerVistaShowAllServices(){
        $servicios = Servicio::where('activo', 'si')->get();
        $categorias = CategoriaServicio::where('activo', 'si')->get();
        return view('livewire.configuration-app.show-all-services', compact('servicios', 'categorias'));

    }
    public function obtenerVistaOffcanvasNewReservCalendar(){
        return view('components.panel-admin-administrator.citas.calendario.offcanvas-new-reserv');
    }
    public function changeNameCategory(Request $request){
        $modificado = false;
        $categori = CategoriaServicio::find($request->input('category_id'));
        $oldNameCategorie = $categori->categoria;

        if($categori){
            $categori->categoria = $request->input('category_name');
            $categori->save();
            // Obtener los servicios que están asociados a la categoría vieja
            $servicios = Servicio::where('categoria', $oldNameCategorie)->get();

            // Cambiar la categoría de cada servicio
            foreach ($servicios as $servicio) {
                $servicio->categoria = $request->input('category_name');
                $servicio->save();
            }
            $modificado = true;
            return response()->json([
                'modificado' => $modificado,
                'categoria' => $categori,
            ]);
        }else {
            return response()->json([
            'modificado' => $modificado,
            ]);
        }
    }

    public function deleteCategory(Request $request){
        $eliminado = false;
        $categoria = CategoriaServicio::find($request->input('category_id'));
        $oldNameCategorie = $categoria->categoria;
        if($categoria){
            $categoria->activo = 'no';
            $categoria->save();
            // $categori->categoria = $request->input('category_name');
            // $categori->save();
            // Obtener los servicios que están asociados a la categoría vieja
            $servicios = Servicio::where('categoria', $oldNameCategorie)->get();

            // Cambiar la categoría de cada servicio
            foreach ($servicios as $servicio) {
                $servicio->categoria = 'No categorizado';
                $servicio->save();
            }
            $eliminado = true;
            return response()->json([
                'eliminado' => $eliminado,
                // 'categoria' => $categori,
            ]);
        }else {
            return response()->json([
            'eliminado' => $eliminado,
            ]);
        }

    }
    public function getAllCategories(){
        $encontrado=false;
        $categorias = CategoriaServicio::where('activo', 'si')->get();
        if ($categorias->isNotEmpty()) {
            return response()->json([
                'encontrado' => true,
                'categorias' => $categorias
            ]);
        } else {
            return response()->json([
                'encontrado' => false,
            ]);
        }
    }

    public function getAllServices(){
        $encontrado=false;
        $services = Servicio::where('activo', 'si')->get();
        if ($services->isNotEmpty()) {
            return response()->json([
                'encontrado' => true,
                'services' => $services
            ]);
        } else {
            return response()->json([
                'encontrado' => false,
            ]);
        }
    }

    public function getEmpleadoById(Request $request){
        $encontrado = false;
        $id_empleado = $request->input('empleado_id');

        // Buscar el servicio en la base de datos
        $empleado = Empleada::find($id_empleado);

        // Comprobar si el servicio existe
        if ($empleado) {
            $encontrado = true;
            return response()->json([
                'encontrado' => $encontrado,
                'empleado' => $empleado,
            ]);
        } else {
            return response()->json([
            'encontrado' => $encontrado,
            ]);
        }
    }

    public function storageNewCategoria(Request $request){
        // dd($request->all());
        $creada = false;
        $nombreCategoria = $request->input('nombreCategoria');
        // Guardar la imagen si existe
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('img_categorias', 'public'); // Guardar imagen en 'storage/app/public/categorias'
            // dd($imagePath);
            if ($nombreCategoria) {

            // Crear la categoría solo con el nombre que viene en el request getServiceById
            $nuevaCategoria = CategoriaServicio::create([
                'categoria' => $nombreCategoria,
                'imagen' => $imagePath,
            ]);


            $creada = true;

            return response()->json([
                'categoriaCreada' => $creada,
                'nuevaCategoria' => $nuevaCategoria->categoria
            ]);
        }
        }


        return response()->json([
            'categoriaCreada' => $creada,
        ]);
    }

    public function getFristClient(Request $request){
        $firstClient='';
        if($request->has('cliente_id') && $request->input('cliente_id') === 'primero'){
            $firstClient = User::orderBy('name', 'asc')
            ->orderBy('primer_apellido', 'asc')
            ->first();
        }else{
            $firstClient = User::find($request->input('cliente_id'));
        }
        // $firstClient = User::orderBy('name', 'asc')
        // ->orderBy('primer_apellido', 'asc')
        // ->first();
        // Crear un array con las iniciales de cada cliente
        $inicial = strtoupper(substr($firstClient->name, 0, 1)) . strtoupper(substr($firstClient->primer_apellido, 0, 1));
        $userId = $firstClient->id; // Obtén el ID del usuario autenticado

        $now = Carbon::now();

        // Obtener citas próximas para el usuario autenticado
        $proximasFclient = Reserva::where('user_id', $userId)
        ->where('date_time', '>=', $now)
        // ->whereIn('status', ['pending', 'confirmed', 'pagada'])
        ->get();
        $totalProximas = $proximasFclient->count();
        // Obtener citas terminadas para el usuario autenticado
        $terminadasFclient = Reserva::where('user_id', $userId)
        ->where('date_time', '<', $now)
        // ->whereIn('status', ['completada', 'no_asistida'])
        ->get();
        $totalFinalizadas = $terminadasFclient->count();
        // Si deseas acceder al servicio de cada reserva, puedes mapear la colección:
        $serviciosTerminados = $terminadasFclient->map(function ($reserva) {
            return [
                'hora' => $reserva->servicio->horaNewService, // Relación Servicio
                'minuto' => $reserva->servicio->minutosNewService,
                'borderColor' => $reserva->servicio->borderColor,
                'nombre' => $reserva->servicio->nombre,
                'precio' => $reserva->servicio->precio,
            ];
        });

        // Si deseas acceder al servicio de cada reserva, puedes mapear la colección:
        $serviciosProximos = $proximasFclient->map(function ($reserva) {
            return [
                'hora' => $reserva->servicio->horaNewService, // Relación Servicio
                'minuto' => $reserva->servicio->minutosNewService,
                'borderColor' => $reserva->servicio->borderColor,
                'nombre' => $reserva->servicio->nombre,
                'precio' => $reserva->servicio->precio,
            ];
        });


        $empleadasTerminadas = $terminadasFclient->map(function ($reserva) {
            return [
                'nombre' => $reserva->empleada->nombre, // Relación Empleada
                'apellido' => $reserva->empleada->primerApellido,
            ];
        });

        $empleadasProximas = $terminadasFclient->map(function ($reserva) {
            return [
                'nombre' => $reserva->empleada->nombre, // Relación Empleada
                'apellido' => $reserva->empleada->primerApellido,
            ];
        });
        // Obtener el total de reservas realizadas por el usuario
        $totalReservas = Reserva::where('user_id', $userId)->count();
        $totalCancelaciones = $firstClient->cancelaciones()->count();
        // Calcular el total gastado por el cliente
        $totalGastado = Reserva::where('user_id', $userId)->sum('total_payment');

       // Obtenemos la reserva más reciente
        $ultimaReservaTerminada = $terminadasFclient->sortByDesc('date_time')->first();

        // Comprobamos si existe una reserva y luego formateamos la fecha
        if ($ultimaReservaTerminada) {
            $fechaUltimaReserva = Carbon::parse($ultimaReservaTerminada->date_time)
                ->locale('es')  // Establecer idioma a español
                ->isoFormat('D MMM YYYY');  // Formato: día mes abreviado año
        } else {
            $fechaUltimaReserva = '-';  // Mensaje si no hay reservas
        }

        $descuento = $firstClient->descuentos->first();  // Obtiene el primer descuento
        $porcentaje = $descuento->porcentaje;
        $totalInasistencias = $firstClient->inasistencias()->count();
        return response()->json([
            'firstClient' => $firstClient,
            'proximasFclient' => $proximasFclient,
            'terminadasFclient' => $terminadasFclient,
            'totalProximas' => $totalProximas,
            'totalFinalizadas' => $totalFinalizadas,
            'firstClientInitials' => $inicial,
            'infoAdicionalCliente' => [
                    'numeroCitas' => $totalReservas,
                    'inasistencias' => $totalInasistencias,
                    'cancelaciones' => $totalCancelaciones,
                    'ultimaVisita' => $fechaUltimaReserva ?? '-',
                    'totalIngresos' => $totalGastado,
                    'descuentos' => $porcentaje,
                    'clienteConfianza' =>$firstClient->cliente_confianza,
                ],
            'serviciosTerminados' => $serviciosTerminados,
            'serviciosProximos' => $serviciosProximos,
            'empleadasTerminadas' => $empleadasTerminadas,
            'empleadasProximas' => $empleadasProximas,
        ]);
    }
    public function searchClient(Request $request)
{
    $query = $request->input('query');

    // Comprobamos si hay un término de búsqueda
    if ($query) {
        // Dividimos el término de búsqueda en palabras individuales
        $terms = explode(' ', $query);

        // Si hay más de una palabra, buscamos ambas palabras en nombre y apellido
        $clientes = User::where(function($queryBuilder) use ($terms) {
            foreach ($terms as $term) {
                $queryBuilder->where('name', 'LIKE', "%$term%")
                             ->orWhere('primer_apellido', 'LIKE', "%$term%");
            }
        })->get();
    } else {
        // Si no se proporciona un término de búsqueda, devolvemos todos los clientes
        $clientes = User::all();
    }

    // Mapear los resultados a la estructura esperada
    $clientes = $clientes->map(function($cliente) {
        return [
            'id' => $cliente->id,
            'nombre' => $cliente->name,
            'primer_apellido' => $cliente->primer_apellido,
            'iniciales' => strtoupper(substr($cliente->name, 0, 1) . substr($cliente->primer_apellido, 0, 1)), // Iniciales
        ];
    });

    return response()->json($clientes);
}

}

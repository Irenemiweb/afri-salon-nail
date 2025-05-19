<?php

namespace App\Http\Controllers;
use App\View\Components\Reserva\Servicio\OffcanvaReservaServicio;  // Importa la clase

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Reserva;
use App\Models\Empleada;
use App\Models\Servicio;
use App\Models\User;
use App\View\Components\Reserva\Servicio\ContinueReserv;
use App\Events\NewReserv;
use App\Models\Cancelacion;
use App\Models\Inasistencia;
use App\Models\ConfiguracionReserva;
use App\Models\ReservaServicio;
use Illuminate\Support\Facades\DB;

class ReservaServicioController extends Controller
{
    protected $offcanvaReservaServicio;

    // Inyectamos el servicio en el controlador
    public function __construct(OffcanvaReservaServicio $offcanvaReservaServicio)
    {
        $this->offcanvaReservaServicio = $offcanvaReservaServicio;
    }
    public function confirmarReserva(Request $request){
        $id_reserva = $request->input('id_reserva');
        $reserva = Reserva::find($id_reserva);
        $confirmada = false;
        $pendingCount3 = 0;
        if ($reserva) {

            $reserva->status = 'confirmed';
            $reserva->save();
            $confirmada = true;
            $pendingCount3 = Reserva::where('status', 'pending')->count();
            if ($pendingCount3 >= 0) {
                broadcast(new NewReserv($reserva, $pendingCount3));
            }
            return response()->json([
                'confirmada' => $confirmada,
                'pendingCount' => $pendingCount3
            ]);

            // return response()->json(['success' => true]);
        }
        return response()->json([
            'confirmada' => $confirmada,
            'pendingCount' => $pendingCount3
        ]);
    }
    public function guardarInasistencia(Request $request){
        $creada=false;
        $reserva = Reserva::find($request->input('id_reserva'));
        $inasistencia = new Inasistencia();
        $inasistencia->id_user = $reserva->user_id;
        $inasistencia->id_reserva = $reserva->id;
        $inasistencia->fecha = $reserva->date_time;
        $inasistencia->save();
        $creada = true;
        return response()->json([
            'creada' => $creada
        ]);
    }

    public function saveConfigReserv(Request $request){
        $guardada = false;
        $configuracion = ConfiguracionReserva::first();
        // Usamos el método update() para modificar los atributos del modelo
        if($configuracion){
            $configuracion->update($request->all());
            $guardada = true;
            return response()->json([
                'guardada' => $guardada,
                'configuracion' => $configuracion
            ]);
        }else{
            $guardada = false;
            return response()->json([
                'guardada' => $guardada
            ]);
        }
    }

    public function cancelledReservaMultiple(Request $request){
        // dd($request->all());
       // Obtener los IDs de las reservas desde la solicitud
        $reservasIds = $request->input('reservasIds');

        // Obtener las reservas por los IDs
        $reservas = Reserva::whereIn('id', $reservasIds)->get();

        // Verificar si hay reservas que cancelar
        if ($reservas->isEmpty()) {
            return response()->json(['canceladas' => false, 'message' => 'No se encontraron reservas']);
        }

        // Procesar cada reserva y realizar la cancelación
        foreach ($reservas as $reserva) {

            // Lógica para cancelar la reserva
            // Ejemplo: $reserva->cancelar(); o cualquier lógica de cancelación que tengas
            $reserva->status = 'cancelled'; // Ejemplo de actualización del estado
            $reserva->save();
        }

        // Retornar respuesta indicando éxito
        return response()->json(['canceladas' => true]);
    }

    public function cancelledReserva(Request $request){
        //  dd($request->all());
        $id_reserva = $request->input('id_reserva');
        $reserva = Reserva::find($id_reserva);
        $cancelada = false;
        $pendingCount3 = 0;
        if ($reserva) {

            $reserva->status = 'cancelled';
            $reserva->save();
            //registrar la cancelación
            $user = User::find($request->input('idResponsable'));
            $tipoUsuario = null;
            if ($user->is_admin == 1) {
                $tipoUsuario = 'empleado'; // Si es admin (empleado)
            } elseif ($user->is_admin == 0) {
                $tipoUsuario = 'cliente';  // Si es cliente (is_admin = 2)
            }

            $cancelacion = new Cancelacion();
            $cancelacion->reserva_id = $reserva->id;
            $cancelacion->motivo_cancelacion = $request->input('motivoCancelacion', 'No especificado');
            $cancelacion->cancelado_por = $request->input('responsablecancelacion'); // 'cliente' o 'empleado'
            $cancelacion->id_user = $request->input('idResponsable');
            $cancelacion->tipo_usuario = $tipoUsuario; // 'cliente' o 'empleado'
            $cancelacion->save();

            $cancelada = true;
            $pendingCount3 = Reserva::where('status', 'pending')
            ->orWhere('status', 'confirmed')
            ->count();
            if ($pendingCount3 >= 0) {
                broadcast(new NewReserv($reserva, $pendingCount3));
            }
            return response()->json([
                'cancelada' => $cancelada,
                'pendingCount' => $pendingCount3
            ]);

            // return response()->json(['success' => true]);
        }
        return response()->json([
            'cancelada' => $cancelada,
            'pendingCount' => $pendingCount3
        ]);
    }
    public function anularcancelledReservaMultiple(Request $request){
    //  dd($request->all());
       // Obtener los IDs de las reservas desde la solicitud
        $id_reservas = $request->input('id_reservas');
        $status = $request->input('oldStatus');
        // Obtener las reservas por los IDs
        $reservas = Reserva::whereIn('id', $id_reservas)->get();
        // dd($reservas);
        // Verificar si hay reservas que cancelar
        if ($reservas->isEmpty()) {
            return response()->json(['canceladas' => false, 'message' => 'No se encontraron reservas']);
        }

        // Procesar cada reserva y realizar la cancelación
        foreach ($reservas as $index => $reserva) {
            $oldStatus = $status[$index];
            // Lógica para cancelar la reserva
            // Ejemplo: $reserva->cancelar(); o cualquier lógica de cancelación que tengas
            $reserva->status = $oldStatus; // Ejemplo de actualización del estado
            $reserva->save();
        }

        // Retornar respuesta indicando éxito
        return response()->json(['canceladas' => true]);
        }

    public function anularcancelledReserva(Request $request){
        // dd($request->input('oldStatus'));
        $id_reserva = $request->input('id_reserva');
        $reserva = Reserva::findOrFail($id_reserva);
        $anularCancelacion = false;
        $pendingCount3 = 0;
        if ($reserva) {
            $reserva->status = $request->input('oldStatus');
            $reserva->save();
            $cancelacion = $reserva->cancelaciones()->where('reserva_id', $reserva->id)->first();
            $cancelacion->delete();
            $anularCancelacion = true;

            return response()->json([
                'anulada' => $anularCancelacion,
            ]);
        }
    }

    public function obtenerHoras(Request $request){
        // Obtener la fecha seleccionada y convertirla a un objeto Carbon
        $fechaSeleccionada = Carbon::createFromFormat('Y-m-d', $request->input('fecha'));
        $duracion = $request->input('duracion');  // Duración en minutos (ej. 90 para 1h 30m)

        // Inicializar el array de horas disponibles
        $horasDisponibles = [];
        $minutoRedondeado = 0;

        // Comprobar si la fecha seleccionada es hoy
        if ($fechaSeleccionada->isToday()) {
            $horaActual = Carbon::now('Europe/Madrid');

            // Si la hora actual es 20:00 o más, se pasa al siguiente día y no muestra horas del día actual
            if ($horaActual->hour >= 20) {
                $fechaSeleccionada->addDay(); // Incrementa el día en uno
                $horaInicio = 9; // Empezar desde las 9:00 del día siguiente
            } else {
                // Si es hoy y no ha pasado de las 20:00, empezar desde la hora actual redondeada al próximo múltiplo de 15
                $minutoRedondeado = ceil($horaActual->minute / 15) * 15;
                if ($minutoRedondeado == 60) {
                    $horaActual->addHour();
                    $minutoRedondeado = 0;
                }
                $horaInicio = $horaActual->hour;
            }
        } else {
            // Si no es hoy, empezar desde las 9:00
            $horaInicio = 9;
        }

       // Definir la hora de cierre del negocio según el día de la semana
        $horaCierre = $fechaSeleccionada->isSaturday() ? $fechaSeleccionada->copy()->setTime(14, 15) : $fechaSeleccionada->copy()->setTime(20, 1);

        // Definir la hora de inicio del almuerzo y de fin del almuerzo
        $inicioAlmuerzo = $fechaSeleccionada->copy()->setTime(14, 15);
        $finAlmuerzo = $fechaSeleccionada->copy()->setTime(15, 0);

        // Generar horas disponibles desde la hora de inicio hasta la hora de cierre
        for ($hora = $horaInicio; $hora < $horaCierre->hour; $hora++) {
            for ($minuto = ($hora == $horaInicio ? $minutoRedondeado : 0); $minuto < 60; $minuto += 15) {
                $horaInicioReserva = $fechaSeleccionada->copy()->setTime($hora, $minuto);
                $horaFinReserva = $horaInicioReserva->copy()->addMinutes($duracion); // Fin de la reserva basado en la duración

                // Verificar que la hora de fin no exceda la hora de cierre
                if ($horaFinReserva->greaterThan($horaCierre)) {
                    continue; // Salta a la siguiente iteración si excede la hora de cierre
                }

                // Verificar que la reserva no interfiera con el horario de comida
                if (($horaInicioReserva->lessThan($finAlmuerzo) && $horaFinReserva->greaterThanOrEqualTo($inicioAlmuerzo))) {
                    continue; // Salta si el servicio abarca el horario de comida
                }

                $empleadasDisponibles = Empleada::whereDoesntHave('reservas', function ($query) use ($horaInicioReserva, $horaFinReserva) {
                    $query->where(function ($query) use ($horaInicioReserva, $horaFinReserva) {
                        $query->where('date_time', '<', $horaFinReserva) // Ocupación antes de la hora de fin
                            ->whereRaw('DATE_ADD(date_time, INTERVAL duration MINUTE) > ?', [$horaInicioReserva]); // Ocupación que empieza antes de la hora de inicio
                    })
                    ->where('status', '!=', 'cancelled'); // Añadir condición para que el estado no sea "cancelled"
                })->exists();


                // Si hay al menos una empleada disponible, añadir la franja horaria (solo una vez)
                if ($empleadasDisponibles) {
                    $horasDisponibles[] = $horaInicioReserva->format('H:i');
                }
            }
        }
        // Devuelve las horas disponibles como respuesta JSON
        return response()->json([
            'horasDisponibles' => $horasDisponibles
        ]);
        // return response()->json($horasDisponibles);
    }

    private function verificarDisponibilidad($empleadoId, $horaReserva, $duracion){
    // Es un ID
    $empleada = Empleada::find($empleadoId);

    // Si no se encuentra la empleada, devolver no disponible
    if (!$empleada) {
        return false;
    }

    // Convertir $horaReserva a un objeto Carbon si es una cadena de texto
    $horaReserva = Carbon::parse($horaReserva);

    // Calcular la hora de fin de la reserva solicitada
    $horaFinReserva = $horaReserva->copy()->addMinutes($duracion);

    // Verificar si hay reservas que entren en conflicto con la hora solicitada
    $reservaOcupada = Reserva::where('empleada_id', $empleada->id)
        ->where(function ($query) use ($horaReserva, $horaFinReserva) {
            // Buscar reservas que empiecen antes del fin de la reserva solicitada
            $query->where('date_time', '<', $horaFinReserva)
                // Y que terminen después del inicio de la reserva solicitada
                ->whereRaw('DATE_ADD(date_time, INTERVAL duration MINUTE) > ?', [$horaReserva]);
        })
        ->exists();

    // Si existe una reserva en conflicto, el empleado no está disponible
    return !$reservaOcupada; // true si está disponible, false si no lo está
}


    //VERIFICA DISPONIBILIDAD DE TODOS LOS EMPLEADOS
    public function verificarDisponibilidadEmpleados(Request $request) {
        $fechaString = $request->input('fechaReserva'); // Fecha en formato 'Y-m-d'
        $horaInicioString = $request->input('horaInicioReserva'); // Hora en formato 'H:i'
        $duracionString = $request->input('duracionReserva'); // Duración en minutos (string)

        // Combinar la fecha y la hora de inicio en un solo objeto Carbon
        $fechaHoraReserva = Carbon::createFromFormat('Y-m-d H:i', $fechaString . ' ' . $horaInicioString);

        // Convertir la duración (string) en minutos
        $duracion = intval($duracionString);

        // Obtener todos los empleados
        $empleados = Empleada::all();

        // Inicializar un array para almacenar la disponibilidad de cada empleado
        $disponibilidadEmpleados = [];

        // Calcular la hora de fin de la reserva solicitada
        $horaFinReserva = $fechaHoraReserva->copy()->addMinutes($duracion);

        // Recorrer cada empleado y verificar su disponibilidad
        // Recorrer cada empleado y verificar su disponibilidad
        foreach ($empleados as $empleado) {
            // Verificar si hay reservas que entren en conflicto con la hora y fecha solicitada
            $reservaOcupada = Reserva::where('empleada_id', $empleado->id)
                ->where('status', '!=', 'cancelled') // Añadir la condición de que el estado no sea "cancelled"
                ->where(function ($query) use ($fechaHoraReserva, $horaFinReserva) {
                    // Buscar reservas que empiecen antes del fin de la reserva solicitada
                    $query->where('date_time', '<', $horaFinReserva)
                        // Y que terminen después del inicio de la reserva solicitada
                        ->whereRaw('DATE_ADD(date_time, INTERVAL duration MINUTE) > ?', [$fechaHoraReserva]);
                })
                ->exists();

            // Si no hay reservas en conflicto, está disponible
            $disponibilidadEmpleados[] = [
                'idEmpleado' => $empleado->id,
                'empleado' => $empleado->nombre,  // O puedes usar $empleado->id si prefieres
                'disponible' => !$reservaOcupada,
                'fecha_hora_reserva' => $fechaHoraReserva
            ];
        }


        // Retornar la disponibilidad de los empleados
        return response()->json([
            'disponibilidadEmpleados' => $disponibilidadEmpleados
        ]);
    }

    public function obtenerEmpleadoCualquiera(Request $request){
        // Obtener la fecha y hora de inicio y duración de la reserva
        $fechaInicio = Carbon::parse($request->date_time);
        $fechaFin = $fechaInicio->copy()->addMinutes($request->duration);

        // Obtener empleados ocupados en el rango de tiempo
        $empleadasOcupadas = Reserva::where(function ($query) use ($fechaInicio, $fechaFin) {
            $query->where(function ($q) use ($fechaInicio, $fechaFin) {
                // Comprobar solapamiento
                $q->where('date_time', '<', $fechaFin)
                  ->whereRaw("DATE_ADD(date_time, INTERVAL duration MINUTE) > ?", [$fechaInicio]);
            });
        })->pluck('empleada_id')->toArray();

        // Obtener todos los IDs de empleados (esto debería idealmente venir de la tabla Empleadas)
        $todasEmpleadas = Reserva::distinct()->pluck('empleada_id')->toArray();

        // Obtener empleados disponibles
        $empleadasDisponibles = array_diff($todasEmpleadas, $empleadasOcupadas);

        // Si hay empleados disponibles, seleccionar uno aleatoriamente
        if (!empty($empleadasDisponibles)) {
            $empleadaSeleccionada = $empleadasDisponibles[array_rand($empleadasDisponibles)];

            // Asignar el empleado seleccionado al request
            $request->merge(['empleada_id' => $empleadaSeleccionada]);

            return true; // Indica que se asignó un empleado
        }

        // Si no hay empleados disponibles
        return false; // No se asignó ningún empleado
    }

function storeReservaMultiple(Request $request){
    //  dd($request->all());
    $creada = false;
    if ($request->empleada_id == 'cualquiera') {
        $this->obtenerEmpleadoCualquiera($request);
    }
    $servicesWithTimes = json_decode($request->input('arrayCompleto'), true);
    // dd($servicesWithTimes);
    // Iniciar una transacción para garantizar que todos los cambios se apliquen correctamente
    DB::beginTransaction();

    try {
        // Crear el reserva_servicio
        $reserva_servicio = ReservaServicio::create([
            'total_payment' => $request['total_payment'],
            'nota_interna' => $request['nota_interna'],
            'message_for_client' => $request['mensaje_cliente'],
        ]);
        // foreach ($servicesWithTimes as $service) {
        //     $duracion = $service['duracion'];
        //     $empleadaId = $service['id_empleado'];
        //     $horaReserva = $service['date_time'];  // Aquí se toma la fecha de inicio de la reserva
        //     $disponibilidad = $this->verificarDisponibilidad($empleadaId, $horaReserva, $duracion);
        //     $disponibilidades[] = $disponibilidad;
        // }
        // dd($servicesWithTimes);
        // Iterar a través del array de servicios
        foreach ($servicesWithTimes as $index => $service) {
            $duracion = $service['duracion'];
            $empleadaId = $service['id_empleado'];
            $horaReserva = $service['date_time'];  // Aquí se toma la fecha de inicio de la reserva
            $disponibilidad = $this->verificarDisponibilidad($empleadaId, $horaReserva, $duracion);

            // dd($disponibilidad);
            // Si no está disponible, cancelar la transacción y devolver un error
            if ($disponibilidad === false) {
                // dd($disponibilidad);
                DB::rollBack();
                return response()->json([
                    'reservaCreada' => $creada,
                    'motivo' => 'Empleado no disponible'
                ]);
            }

            // Crear una nueva reserva
            Reserva::create([
                'user_id' => $request['user_id'],
                'service_id' => $service['id'],
                'date_time' =>  $service['date_time'],
                'status' => $request->status,
                'duration' => $duracion,
                'empleada_id' => $service['id_empleado'],
                'mensaje_for_client' => $request['mensaje_cliente'],
                'empleado_seleccionado' => $service['seleccionaCliente'],
                'nota_interna' => $request->nota_interna,
                'mensaje_cliente' => $request->mensaje_cliente,
                'multiple' => $reserva_servicio->id
            ]);
        }

        // Si todo está bien, hacer commit de la transacción
        DB::commit();

        $creada = true;
        //Emitir el evento si hay pendientes o no
        // broadcast(new NewReserv($reserva, $comfim_pendingCount));
        return response()->json([
            'reservaCreada' => $creada
        ]);

    } catch (\Exception $e) {
        // Si ocurre un error, revertir todos los cambios
        DB::rollBack();
        return response()->json([
            'reservaCreada' => $creada,
            'motivo' => $e->getMessage()
        ]);
    }
}


function storeReserva(Request $request){
    // dd($request->all());
    $creada = false;
    if ($request->empleada_id == 'cualquiera') {
        $this->obtenerEmpleadoCualquiera($request);
    }
    //última comprobación por si hay dos personas al mismo tiempo haciendo reserva
    $disponible = $this->verificarDisponibilidad($request->empleada_id, $request->date_time, $request->duration);
    if (!$disponible) {
        return response()->json([
            'reservaCreada' => $creada
        ]);
    }else{
        $reserva = Reserva::create($request->all());

        //verificar si existen reservas pendientes
        $comfim_pendingCount = Reserva::where(function($query) {
            $query->where('status', 'confirmed')
                ->orWhere('status', 'pending');
        })
        ->where('comprobada', 'no')
        ->count();
        $creada = true;

        //Emitir el evento si hay pendientes o no
        broadcast(new NewReserv($reserva, $comfim_pendingCount));
        return response()->json([
            'reservaCreada' => $creada
        ]);
    }
}

public function getMultiServices(Request $request){
    $reservaServicios = Reserva::where('multiple', $request->id_multiple)->get();

    return response()->json([
        'serviciosMultiple' => $reservaServicios
    ]);
}

public function actualizarFechaReserva(Request $request){

    // Validación de los datos entrantes
    $validated = $request->validate([
        'reserva_id' => 'required|exists:reservas,id',  // Asegura que la reserva existe
        'nueva_fecha' => 'required|date',  // Validar que la nueva fecha es una fecha válida
    ]);

    // Encontrar la reserva por su ID
    $reserva = Reserva::find($request->reserva_id);

    // Si la reserva se encuentra, se actualiza la fecha
    if ($reserva) {
        $nuevaFecha = Carbon::parse($request->nueva_fecha)->setTimezone('Europe/Madrid');
        $reserva->date_time = $nuevaFecha;
        $reserva->save();

        return response()->json(['success' => true, 'nueva_fecha' => $nuevaFecha]);

        // Si la reserva no puede ser actualizada, devolver error
        // return response()->json(['success' => false, 'message' => 'No se puede reprogramar una cita con este estado.'], 400);
    }

    // Si no se encuentra la reserva, respondemos con un error
    return response()->json(['success' => false, 'message' => 'Reserva no encontrada.'], 400);

}

public function upStatusEndReserv(Request $request){
$updteEnd = false;
$color = 'black';
$idReserva = $request->input('reserva_id');
    $reserva = Reserva::findOrFail($idReserva);
    if ($reserva) {
       // Actualizar el estado
    $reserva->status = 'Finalizada';
    $reserva->save();
    $updteEnd = true;
    }
    return response()->json([
        'updteEnd' => $updteEnd,
        'color' =>$color
    ]);

}

public function getEmpleadosCalendar(){
    return response()->json(Empleada::all()->map(function ($empleado) {
        return [
            'id' => $empleado->id,
            'title' => $empleado->nombre, // Nombre del empleado
        ];
    }));
}

public function getReservas()
{
    // Cargar reservas con las relaciones
    $reservas = Reserva::with(['servicio', 'empleada', 'user'])
    ->where('status', '!=', 'cancelled')
    ->get();

    $eventos = $reservas->map(function ($reserva) {
        // $start = Carbon::parse($reserva->date_time)->timezone(config('app.timezone'));

        // $end = Carbon::parse($reserva->date_time)
        //     ->addMinutes($reserva->duration)
        //     ->timezone(config('app.timezone'));

        $start = Carbon::parse($reserva->date_time);

        $end = Carbon::parse($reserva->date_time)
            ->addMinutes($reserva->duration);

        // Establecer el color según el estado de la reserva
        $color = match($reserva->status) {
            'confirmed' => '#00BE70',
            'pending' => 'orange',
            'cancelled' => 'red',
            'Finalizada' => 'black',
            default => 'gray', // Color por defecto si no coincide con ninguno
        };

        return [
            // 'title' => $reserva->servicio->nombre ?? 'Reserva de Servicio', // Título basado en el servicio
            'id' => 'eventoTemporalAsignado_1_' . $reserva->id,
            'title' =>  $this->getDescripcion($reserva),
            'start' => $start->toDateTimeString(),
            'end' => $end->toDateTimeString(),
            'description' => $reserva->nota,
            'color' => $color, // Asignar color aquí
            'resourceId' => $reserva->empleada->id, // ID del empleado
            'extendedProps' => [
                'servicio' => [
                    'id' => $reserva->servicio->id,
                    'categoria' => $reserva->servicio->categoria ?? null,
                    'nombre' => $reserva->servicio->nombre ?? 'Servicio no especificado',
                    'descripcion' => $reserva->servicio->descripcion ?? null,
                    'precio' => $reserva->servicio->precio ?? null,
                    'duracion' => $reserva->servicio->duration ?? null,
                    'reservM' =>$reserva->servicio->minutosNewService,
                    'reservH' =>$reserva->servicio->horaNewService,
                    'borderColor' =>$reserva->servicio->borderColor
                ],
                'empleada' => [
                    'id' => $reserva->empleada->id ?? null,
                    'nombre' => $reserva->empleada->nombre ?? 'Sin asignar',
                    'apellido' =>$reserva->empleada->primerApellido,
                    'imagenEmple' => $reserva->empleada->img_empleada ?? null,
                    'telefono' => $reserva->empleada->telefono ?? null,
                ],
                'usuario' => [
                    'id' => $reserva->user->id ?? null,
                    'nombre' => $reserva->user->name ?? 'Usuario no registrado',
                    'primerApellido' => $reserva->user->primer_apellido ?? 'Usuario no registrado',
                    'email' => $reserva->user->email ?? 'email@no-disponible.com',
                    'telefono' => $reserva->user->telefono ?? null,
                    'imagenUser' => $reserva->user->profile_photo_path ?? null,
                ],
                'fecha' =>$reserva->date_time,
                'duracion' =>$reserva->duration,
                'reservaId' =>$reserva->id,
                'status' => $reserva->status,
                'nota' => $reserva->nota,
                'fecha_creacion' => $reserva->created_at->toDateTimeString(),
                'fecha_actualizacion' => $reserva->updated_at->toDateTimeString(),
                'seleccionado_cliente'=>$reserva->empleado_seleccionado,
                'nota_interna' =>$reserva->nota_interna,
                'mensaje_cliente'=>$reserva->mensaje_cliente,
                'multiple' =>$reserva->multiple,
                'status_payment' => $reserva->status_payment,
            ]
        ];
    });

    return response()->json($eventos);
}

// Función para obtener la descripción según el usuario
public function getDescripcion($reserva)
{
    if ($reserva->user && $reserva->user->id !== null) {
        // Si el usuario tiene un ID, mostramos su nombre, apellido y el servicio
        return $reserva->user->name . ' ' . $reserva->user->primer_apellido . ' • ' . $reserva->servicio->nombre;
    } else {
        // Si no tiene ID o no hay usuario, mostramos "Cliente sin cita previa" seguido del servicio
        return 'Cliente sin cita previa • ' . $reserva->servicio->nombre;
    }
}

public function checkPendingReservations() {
    // Obtén todas las reservas pendientes
    $reservasPendientes = Reserva::where(function($query) {
        $query->where('status', 'confirmed')
              ->orWhere('status', 'pending');
    })
    ->where('comprobada', 'no')  // Agregar la condición de 'comprobada' = 'no'
    ->with(['user', 'servicio']) // Cargar las relaciones `user` y `servicio`
    ->get();


    $pendingCount2 = Reserva::where(function($query) {
        $query->where('status', 'confirmed')
              ->orWhere('status', 'pending');
    })
    ->where('comprobada', 'no')
    ->count();

    // Verifica si hay reservas pendientes y devuelve las reservas en JSON
    return response()->json([
        'pending' => $reservasPendientes->isNotEmpty(),
        'reservas' => $reservasPendientes,  // Incluye las reservas pendientes en la respuesta
        'pendingCount2' =>$pendingCount2
    ]);
}
public function obtenerHoraRedondeadaSegunMes($fecha)
{
    // Convertir la fecha recibida a un objeto Carbon en la zona horaria 'Europe/Madrid'
    $horaActual = Carbon::parse($fecha, 'Europe/Madrid')->setTimezone('Europe/Madrid');

    // Obtener el mes actual
    $mesActual = Carbon::now('Europe/Madrid')->month;

    // Verificar si el mes recibido es diferente al mes actual
    if ($horaActual->month != $mesActual) {
        // Si el mes no es el actual, devolver las 9:00 del primer día del mes recibido
        $horaActual->setDate($horaActual->year, $horaActual->month, 1);
        $horaActual->setTime(9, 0);  // Establecer las 9:00 AM
        // Poner los segundos a cero para un redondeo exacto
        $horaActual->second = 0;

        // Formatear la hora redondeada a 'H:i' y devolverla
        return $horaActual->format('H:i');
    } else {
        // Si el mes es el actual, usar la función que redondea la hora
        $horaActual = $this->offcanvaReservaServicio->obtenerHoraRedondeada();
        return $horaActual;
    }

    // Devolver la hora en el formato deseado

}
public function getAllDays(){
        $horaFin2 = Carbon::createFromTime(20, 0, 1);
        Carbon::setLocale('es');
        $horaInicio2 =  $this->offcanvaReservaServicio->obtenerHoraRedondeada();
        $fechaActual = Carbon::now('Europe/Madrid'); // Fecha actual
        $fechaActual2 = Carbon::now('Europe/Madrid'); // Fecha actual
        $fechaActual3 = Carbon::now('Europe/Madrid'); // Fecha actual
        $anioActual = Carbon::now('Europe/Madrid')->format('Y');
        $ultimoDiaDel2030 = Carbon::create(2026, 12, 31); // 31 de diciembre del 2030
        $diasHasta2030 = []; // Inicializar el array


        if ($fechaActual->hour > 20 || ($fechaActual->hour === 20 && $fechaActual->minute >= 15)) {
            $fechaActual->addDay(); // Pasa al siguiente día
            $fechaActual2->addDay();
            $fechaActual3->addDay();
        }

        //Si la fecha actual es domingo (7), avanzar hasta el próximo lunes (1)
        if ($fechaActual->isSunday()) {
            $fechaActual2->next(Carbon::MONDAY); // Avanza al próximo lunes
            $fechaActual3->next(Carbon::MONDAY);
        }
        // Recorrer desde la fecha actual hasta el 31 de diciembre de 2030
        for ($fecha = $fechaActual->copy(); $fecha->lte($ultimoDiaDel2030); $fecha->addDay()) {
            $diasHasta2030[] = [
                'dia_semana' => $fecha->translatedFormat('D'),  // Nombre del día
                'numero_dia' => $fecha->format('d'),            // Número del día
                'mes_anio'   => $fecha->translatedFormat('F Y'), // Mes y año
                'fecha'      => $fecha->format('Y-m-d'),
                'mes'        => $fecha->translatedFormat('F'),   // Mes en español (ej. "Septiembre")
                'anio'       => $fecha->format('Y'),             // Formato completo de fecha (YYYY-MM-DD)
            ];
        }
        $fechaActual2 = $fechaActual2->format('Y-m-d');
        $mesActual = $fechaActual->translatedFormat('F Y'); // Mes y año actual
        return response()->json([
            'allDays' => $diasHasta2030, // Pasas el array normalmente
            'mesActualAllDays' => $mesActual,
            'fechaActual' => $fechaActual->format('Y-m-d'), // Pasar la fecha actual a la vista
            'fechaActual2AllDays' => $fechaActual2,
            'fechaActual3' => $fechaActual3,
            'horaInicioAllDays' => $horaInicio2,
            'horaFin' => $horaFin2->format('H:i'),
            'anioActualAllDays' => $anioActual,
        ]);

}


public function getDiasByMes(Request $request){
    // Obtener la fecha en formato "Sat Feb 01 2025 00:00:00 GMT+0100 (hora estándar de Europa central)"
    $fechaString = $request->input('nombre_mes');  // Ejemplo: "Sat Feb 01 2025 00:00:00 GMT+0100 (hora estándar de Europa central)"

    // Eliminar la parte del texto que no es relevante: "(hora estándar de Europa central)"
    $fechaString = preg_replace('/\s*\(.*\)$/', '', $fechaString);

    // Usamos la función obtenerHoraRedondeadaSegunMes()
    $horaInicioSegunMes = $this->obtenerHoraRedondeadaSegunMes($fechaString);

    // Usar Carbon::parse para convertir la fecha al formato de Carbon
    try {
        // Parsear la fecha
        $fecha = Carbon::parse($fechaString);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Formato de fecha incorrecto'], 400);
    }

    // Obtener el mes actual
    $mesActual = Carbon::now()->month;

    // Establecer el primer día del mes según el mes recibido
    if ($fecha->month == $mesActual) {
        // Si el mes seleccionado es el mes actual, ajustamos el primer día al día de hoy
        // $primerDiaDelMes = Carbon::now()->startOfDay();
        $fechaActual = Carbon::now('Europe/Madrid');
        if ($fechaActual->hour > 20 || ($fechaActual->hour === 20 && $fechaActual->minute >= 15)) {
            $fechaActual->addDay(); // Pasa al siguiente día
        }
        if ($fechaActual->isSunday()) {
            $fechaActual->addDay(); // Avanza al próximo lunes
        }
    }else {
        $fechaActual = $fecha->copy()->startOfMonth();

        // Si el mes seleccionado no es el actual, usamos el primer día del mes
        if ($fechaActual->isSunday()) {
            $fechaActual->next(Carbon::MONDAY); // Avanza al próximo lunes
        }
    }

    // Obtenemos el último día del mes
    $ultimoDiaDelMes = $fechaActual->copy()->endOfMonth();

    // Inicializamos el array de los días del mes
    $diasMes = [];

    // Iteramos sobre todos los días del mes
    for ($fecha = $fechaActual; $fecha <= $ultimoDiaDelMes; $fecha->addDay()) {
        $diasMes[] = [
            'dia_semana' => $fecha->translatedFormat('D'),  // Nombre del día (ej. "Lun", "Mar", etc.)
            'numero_dia' => $fecha->format('d'),            // Número del día (ej. "01", "02", etc.)
            'mes_anio'   => $fecha->translatedFormat('F Y'), // Mes y año (ej. "Enero 2025")
            'fecha'      => $fecha->format('Y-m-d'),         // Fecha completa (ej. "2025-01-01")
            'mes'        => $fecha->translatedFormat('F'),   // Mes en español (ej. "Enero")
            'anio'       => $fecha->format('Y'),             // Año (ej. "2025")
        ];
    }

    // Devolver la respuesta JSON
    return response()->json([
        'diasMesSeleccionado' => $diasMes,
        'horaInicioSegunMes' => $horaInicioSegunMes
    ]);
}


}

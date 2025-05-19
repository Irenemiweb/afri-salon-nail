// var urlAplicacion = "https://salonnail.kesug.com";
var urlAplicacion = "/laravel/salon-manicura/public";
var selectedServiceIds = [];
var selectedServiceIds2 = [];
var servicesWithTimes = [];
var nombreEmpleado='';
var apellidoEmpleado='';
var fechaReserva='';
var infoArrayEnvio=[];
var empleadosReservas=[];
var serviciosVentaRapida = [];
var serviciosVentaRapida_ids = [];
var descuentosVentaRapida = [];
var descuentoTotal=0;
var responsableCobroId='';
var tdOriginalWidth = null; // Para almacenar el ancho original del <td>
var empleadoIdOpenClosedCalendar='';
var eventIdChangeCalendar='';
var colorBordeNewReservCalendar='';
var colorBordeReservArray = [];
var oldStatus='';
var idEventModify = '';

var idEventoEliminarEditarNewReserv='';
var idEventoInicial = '';//almacena id evento clicado multiple == null;
//clic reservas multiples
var eventIdChangeCalendarArray = [];
var oldStatusArray = [];
var nombreEmpleadosArray = [];
// var idEventoAniadidoArray = [];

//elimina el id del servicio segun su index
function removeServiceByIndex(index) {
    // Elimina el elemento en el índice especificado de selectedServiceIds
    selectedServiceIds.splice(index, 1);
    selectedServiceIds2.splice(index, 1);
}

//modifica el id del index enviado
function modifyServiceByIndex(index, serviceId) {
    // Modifica el valor del array en el índice especificado con el ID proporcionado
    // selectedServiceIds[index] = serviceId;
    selectedServiceIds2[index] = serviceId;
}

function modifyServicesWithTimesNewReservByIndex(index) {
    let horaFin = document.querySelector('.slotHoraFinCorbrarServicioAddCalendar').textContent.trim();
    let horaInicio = document.querySelector('.slotHorasCobrarServicioAddCalendar').textContent.trim();
    let duracion = calcularDuracion(horaInicio, horaFin);
    let idServivioAddTarjetaBlanca = document.querySelector('.selectServiceAddCalendar').getAttribute('data-service');
    let idEmpleado = document.querySelector('.slotEmpleadoAddInicioCalendarAdd').getAttribute('data-empleid').trim();
    let serleccionaClienteValor = obtenerValorCorazon('.solicitadoClientePantalla2');
    servicesWithTimes[index].duracion = duracion;
    servicesWithTimes[index].horaFin = horaFin;
    servicesWithTimes[index].horaInicio = horaInicio;
    servicesWithTimes[index].id = parseInt(idServivioAddTarjetaBlanca.trim(), 10);
    servicesWithTimes[index].id_empleado = idEmpleado;
    servicesWithTimes[index].seleccionaCliente = serleccionaClienteValor;
}

function modifyServicesWithTimesByIndex(index) {
    let horaFin = document.querySelector('.slotHoraFinCorbrarServicioAdd').textContent.trim();
    let horaInicio = document.querySelector('.slotHorasCobrarServicioAdd').textContent.trim();
    let duracion = calcularDuracion(horaInicio, horaFin);
    let idServivioAddTarjetaBlanca = document.querySelector('.selectServiceAdd').getAttribute('data-service');
    let idEmpleado = document.querySelector('.slotEmpleadoAdd').getAttribute('data-empleid').trim();
    let serleccionaClienteValor = obtenerValorCorazon('.solicitadoClientePantallaInfoClientePantallaDos');
    servicesWithTimes[index].duracion = duracion;
    servicesWithTimes[index].horaFin = horaFin;
    servicesWithTimes[index].horaInicio = horaInicio;
    servicesWithTimes[index].id = idServivioAddTarjetaBlanca;
    servicesWithTimes[index].id_empleado = idEmpleado;
    servicesWithTimes[index].seleccionaCliente = serleccionaClienteValor;
}

//FUNCIÓN PARA AÑADIR ID SERVICIO AL ARRAY
function addServiceArray(serviceId) {
    selectedServiceIds.push(serviceId);
    selectedServiceIds2.push(serviceId);
}

//FUNCIÓN PARA AÑADIR ARRAY DE IDS
function addServiceArrayIds(serviceIds) {
    serviceIds.forEach(id => {
        selectedServiceIds.push(id);
        selectedServiceIds2.push(id);
    });
}


//funcion añadir descuentos en array
function addServiceDiscountArray(index) {
    let importeDescuentoServi = document.getElementById('uid-335-input').value;

    if (importeDescuentoServi) {
        // Verificar si el índice ya existe en el array
        if (descuentosVentaRapida[index]) {
            // Si el índice existe, modificar el valor
            descuentosVentaRapida[index].descuentoServicio = parseFloat(importeDescuentoServi);
        } else {
            // Si el índice no existe, agregar un nuevo objeto en el array
            descuentosVentaRapida.push({
                descuentoServicio: parseFloat(importeDescuentoServi),
            });
        }
    }

    // //console.log(descuentosVentaRapida, "array descuentos");
}

//eliminar porcentaje
function actualizarDescuentoPrecioArrayVentaRapida(index){
    let imputPrecio = document.getElementById('uid-317-input').value;
    let imputDescuentoPorcentaje = document.getElementById('uid-319-input').value;
    if (imputDescuentoPorcentaje.endsWith('%')) {
        imputDescuentoPorcentaje = imputDescuentoPorcentaje.slice(0, -1); // Elimina el último carácter '%'
    }
    if (imputPrecio.endsWith('€')) {
        imputPrecio = imputPrecio.slice(0, -1); // Elimina el último carácter '€'
    }
    // //console.log(index, "index", imputPrecio, "precio", imputDescuentoPorcentaje, "porcentaje");
     let indexActualizar = parseInt(index);
    for (let i = 0; i < serviciosVentaRapida.length; i++) {
        if (i === indexActualizar) {
            serviciosVentaRapida[i].precio = parseInt(imputPrecio);
            serviciosVentaRapida[i].descuento_servicio = parseInt(imputDescuentoPorcentaje);
            break;
        }
    }
// //console.log(serviciosVentaRapida, "array actualizado");
}

function insertarVentaRapidaSoloIds(id_servicio){
    serviciosVentaRapida_ids.push(id_servicio);
}
//insertar en array venta rápida
function insertarServicioEmpleadoArrayVentaRapida(id_servicio, nombreEmpleado, precioServicio, idEmpleado){
    serviciosVentaRapida.push({
        idServicio: id_servicio,
        nombre_Empleado: nombreEmpleado,
        precio: precioServicio,
        descuento_servicio: 0,
        id_empleado:idEmpleado
    });
    // //console.log(serviciosVentaRapida, "desde funcion array");

}
//eliminar de array venta rápida
function eliminarArrayVentaRapida(serviceId) {
    serviceId = parseInt(serviceId, 10);
    // //console.log(serviceId, "metodo removeidarray");
    serviciosVentaRapida = selectedServiceIds.filter(id => id !== serviceId);
}

//FUNCIÓN PARA ELIMINAR SERVICIO DEL ARRAY
function removeServiceArray(serviceId) {
    serviceId = parseInt(serviceId, 10);
    // //console.log(serviceId, "metodo removeidarray");
    servicesWithTimes = selectedServiceIds.filter(id => id !== serviceId);
    selectedServiceIds2 = selectedServiceIds.filter(id => id !== serviceId);
    selectedServiceIds = selectedServiceIds.filter(id => id !== serviceId);
    //console.log(`Servicio ${serviceId} eliminado.`, selectedServiceIds);
    // //console.log(servicesWithTimes, "servicios con tiempo reliminar de array");
    // updateUI();
}

//boton eliminar notificaciones reservas
let eliminarNotificacionReserva = document.getElementById('remove_notification_reserv');
if(eliminarNotificacionReserva){
    eliminarNotificacionReserva.addEventListener('click', function(event){
        event.preventDefault();
        marcarTodasNotificacionRevisada(function(marcadas) {
            //mensaje notificaciones eliminadas
            let stylos = 'position: absolute;right: 5rem;top: 16px;z-index: 9;';
            insertMessageResolAction('Notificaciones eliminadas con éxito', '#canvasNotificationNewReserv', stylos, 'ok');
            //cambiar la vista de las notificacines
            showReservPending();
            //poner contador a cero
            removeAllRedPoin();
            // //console.log(marcadas, "MARCADAS");

        });

    });
}

//eliminar notifivacion reserva indidualmente
function deleteNotification(id_reserva){
    // //console.log(id_reserva, "ID RESERVA");

    marcarNotificacionById(id_reserva, function(reserva, marcada) {
        if(marcada === true){
            // //console.log(reserva, "reserva", marcada, "marcada");
            let stylos = 'position: absolute;right: 5rem;top: 16px;z-index: 9;';
            insertMessageResolAction('Notificacion eliminada', '#canvasNotificationNewReserv', stylos, 'ok');
        }
        showReservPending();
        checkPendingReservations();
    });

}

//FUNCION QUE DEVUELVE COLOR MÁS CLARO QUE EL QUE RECIBE
function lightenedColor(color, percent, opacity) {
    // Si el color está en formato 'rgb(r, g, b)', extraemos los valores de r, g y b
    if (color.startsWith('rgb')) {
        const rgbValues = color.match(/\d+/g); // Extraer los valores de r, g, b
        var r = parseInt(rgbValues[0]);
        var g = parseInt(rgbValues[1]);
        var b = parseInt(rgbValues[2]);
    }
    // Si el color ya está en formato hexadecimal, convertimos directamente
    else if (color[0] === '#') {
        color = color.slice(1);
        r = parseInt(color.substring(0, 2), 16);
        g = parseInt(color.substring(2, 4), 16);
        b = parseInt(color.substring(4, 6), 16);
    } else {
        // //console.log('Formato de color no soportado');
        return null;
    }

    // Aumentar el brillo de cada componente
    r = Math.min(255, Math.floor(r + (255 - r) * (percent / 100)));
    g = Math.min(255, Math.floor(g + (255 - g) * (percent / 100)));
    b = Math.min(255, Math.floor(b + (255 - b) * (percent / 100)));

    // Convertir los valores RGB de nuevo a hexadecimal
    const lightenedColor = `#${r.toString(16).padStart(2, '0')}${g.toString(16).padStart(2, '0')}${b.toString(16).padStart(2, '0')}`;

    // Calcular la opacidad y devolver en formato rgba
    const alpha = Math.min(1, Math.max(0, opacity)); // Asegurar que la opacidad esté en el rango [0, 1]
    return `rgba(${r}, ${g}, ${b}, ${alpha})`;
}



function gravatarURL(email, size = 40) {
    return `https://www.gravatar.com/avatar/${email}?s=${size}&d=identicon&r=g`; // URL de Gravatar con parámetros
}


    var calendar; // Variable global para almacenar la instancia de FullCalendar
    let isCalendarInitialized = false;
    function initializeCalendar() {
        // //console.log("inicializar calendar");
        if (isCalendarInitialized) {
            // Si ya está inicializado, destruye la instancia
            calendar.destroy();
            isCalendarInitialized = false;
        }
            const calendarEl = document.getElementById('calendar');
            var currentDate = new Date();

            // // Verificar si la hora actual es mayor a las 21:00
            // if (currentDate.getHours() >= 20) {
            //     // Si la hora es mayor o igual a 21, sumamos un día
            //     currentDate.setDate(currentDate.getDate() + 1);
            // }
             calendar = new FullCalendar.Calendar(calendarEl, {
                schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source', // Necesario para vista de recursos
                dayMaxEventRows: true,
                views: {
                    dayGridMonth: {
                    dayMaxEventRows: 1
                  },
                  timeGridWeek: {
                    dayMaxEventRows: 1
                  },

                },
                moreLinkContent:function(args){
                    return '+ '+args.num;
                },
                firstDay: 1,
                nowIndicator: "true",
                initialDate: currentDate,
                initialView: 'resourceTimeGridDay',
                headerToolbar: {
                    left: 'today listWeek',
                    center: 'prev title next',
                    right: 'dayGridMonth ,resourceTimeGridWeek, resourceTimeGridDay'
                },
                buttonText:    {
                    today:    'Hoy',
                    month:    'Mes',
                    week:     'Semana',
                    day:      'Día',
                    list:     'Lista',
                  },
                slotMinTime: '09:00',
                slotMaxTime: '20:15',
                locale: 'es',
                height: 'auto', // Ajusta la altura según el contenido
                contentHeight: 'auto', // También ajusta la altura del contenido
                selectable: true,
                editable: true,
                slotDuration: '00:15:00',
                // slotLabelInterval: "",
                slotLabelInterval: '01:00',
                slotLabelFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    meridiem: 'short'  // Esto es para tener AM/PM si es necesario
                },
                noEventsText: 'No hay eventos para mostrar',
                allDaySlot: false,//ocultar sección all-day
                resources:'empleados',
                events: 'reservas',
                eventOverlap: false, // No permitir solapamiento de eventos
                slotEventOverlap: false,
                eventContent: function(eventInfo) {
                return {
                    html: '<div class="event-container">' +
                            '<div class="event-time">' + formatTime(eventInfo.event.start) + ' - '+formatTime(eventInfo.event.end)+'</div>' +  // Hora
                            '<div class="event-description">' + eventInfo.event.title + '</div>' +  // Descripción
                            '</div>'
                };
                },
                // Definir cómo se deben cargar los recursos (empleados)
                resources: function(fetchInfo, successCallback, failureCallback) {
                    let csrfToken = $('meta[name="csrf-token"]').attr("content");
                    let url = "empleados"; // Ruta para obtener los empleados desde el servidor

                    // Hacer una petición AJAX al servidor usando jQuery
                    $.ajax({
                        url: url, // Ruta que definimos en web.php
                        method: 'GET', // Usamos GET ya que es para obtener los empleados
                        data: {
                            _token: csrfToken, // Token CSRF para seguridad
                        },
                        success: function(data) {
                            // Llamamos al successCallback con los datos recibidos
                            successCallback(data);
                        },
                        error: function(xhr, status, error) {
                            // Llamamos al failureCallback en caso de error
                            failureCallback(error);
                        }
                    });
                },
                // Personalización de la celda de recursos (empleados)
                resourceLabelContent: function(arg) {
                    // pestañas empleados plegar o abrir calendar vista semana y dia
                    if (calendar.view.type === 'resourceTimeGridDay') {
                        return {
                            html: `
                                <span style="font-size: 14px;" class="empleado_nombre">${arg.resource.title}</span>
                                <span onclick="showHideEmpleDia(${arg.resource.id})" class="empleadoPlegarDia fc-icon fc-icon-chevron-right" role="img" data-index="empleadoPlegar${arg.resource.id}"></span>
                            `
                        };
                    }
                    if (calendar.view.type === 'resourceTimeGridWeek') {
                        return {
                            html: `
                                <span style="font-size: 14px;" class="empleado_nombre">${arg.resource.title}</span>
                                <span onclick="showHideEmpleSemana(${arg.resource.id})" class="empleadoPlegarSemana fc-icon fc-icon-chevron-right" role="img" data-index="empleadoPlegar${arg.resource.id}"></span>
                            `
                        };
                    }
                },
                // Este evento se dispara cuando la vista del calendario se ha montado
                viewDidMount: function(info) {
                    // día libre
                    $('.fc-day-sun .fc-daygrid-day-events').each(function() {
                        if ($(this).find('span').length === 0) {
                            $(this).append('<span style="color: #8c8b88;text-transform: none;font-size: .75rem;font-weight: 500;line-height: 1.5em;">Día libre</span>');
                        }
                    });

                    // Aquí manipulamos el texto en la vista de lista vacía
                    // let noHayServicios = document.querySelector('.fc-list-empty .fc-list-empty-cushion');
                    // if (noHayServicios) {
                    //     noHayServicios.textContent = "No hay servicios para mostrar";
                    // }

                    // Agregar o quitar la clase 'list-view-active' dependiendo de la vista actual
                    if (info.view.type === 'list') {
                        document.body.classList.add('list-view-active');
                    } else {
                        document.body.classList.remove('list-view-active');
                    }
                },
                 //esto es para eventos
                 eventDidMount: function(info) {
                    const evento = info.event;
                    const now = new Date();
                    const eventEl = info.el;
                    let iconDiv = createDivNoteCorazon();
                    let iconNota = createIconNote();
                    let iconCorazon = createIconCorazon();
                    let iconPagado = createIconPayment();


                    if(evento.extendedProps){
                        const tieneNota = evento.extendedProps.nota || evento.extendedProps.nota_interna;
                        const clienteSeleccionado = evento.extendedProps.seleccionado_cliente === 1;
                        const estaPagado = evento.extendedProps.status_payment === "Pagado";

                        // Limpiar contenedor por si tiene contenido anterior
                        $(iconDiv).empty();

                        // 1. Nota + Corazón + Pagado
                        if (tieneNota && clienteSeleccionado && estaPagado) {
                            const combinado = createDivWithNoteCora(document.createElement('div')); // esto incluye nota + cora
                            $(iconDiv).append(combinado);
                            $(iconDiv).append(iconPagado); // 💰
                            eventEl.appendChild(iconDiv);
                        }
                        // 2. Nota + Corazón
                        else if (tieneNota && clienteSeleccionado) {
                            const combinado = createDivWithNoteCora(document.createElement('div'));
                            $(iconDiv).append(combinado);
                            eventEl.appendChild(iconDiv);
                        }
                        // 3. Nota + Pagado
                        else if (tieneNota && estaPagado) {
                            $(iconDiv).append(iconNota);
                            $(iconDiv).append(iconPagado);
                            eventEl.appendChild(iconDiv);
                        }
                        // 4. Corazón + Pagado (sin nota)
                        else if (clienteSeleccionado && estaPagado && !tieneNota) {
                            $(iconDiv).append(iconCorazon);
                            $(iconDiv).append(iconPagado);
                            eventEl.appendChild(iconDiv);
                        }
                        // 5. Solo Nota
                        else if (tieneNota && !clienteSeleccionado && !estaPagado) {
                            $(iconDiv).append(iconNota);
                            eventEl.appendChild(iconDiv);
                        }
                        // 6. Solo Corazón
                        else if (clienteSeleccionado && !tieneNota && !estaPagado) {
                            $(iconDiv).append(iconCorazon);
                            eventEl.appendChild(iconDiv);
                        }
                        // 7. Solo Pagado
                        else if (estaPagado && !tieneNota && !clienteSeleccionado) {
                            $(iconDiv).append(iconPagado);
                            eventEl.appendChild(iconDiv);
                        }
                        // 8. Ninguna condición
                        else {
                            if (iconDiv) iconDiv.remove();
                        }

                        fechaReserva =  evento.extendedProps.fecha;

                        if(eventEl){
                            eventEl.setAttribute('data-idreserv', evento.extendedProps.reservaId);
                        }
                        if (evento.extendedProps && evento.extendedProps.empleada && evento.extendedProps.empleada.imagenEmple) {
                            eventEl.setAttribute('data-urlImgEmple', evento.extendedProps.empleada.imagenEmple);
                        }

                        document.querySelector('.fechaCitaInfo').setAttribute('data-date', evento.extendedProps.fecha);
                        if(eventEl){
                            if(evento.extendedProps.servicio){
                                eventEl.style.setProperty('background-color', lightenedColor(evento.extendedProps.servicio.borderColor, 70, 0.52));
                                eventEl.style.setProperty('border-left', `4px solid ${evento.extendedProps.servicio.borderColor}`, 'important');
                            }
                        }

                        let divCombo = document.querySelector('.divComboStatusReserv');
                        let despleStatus = document.querySelector('.header_actions_oRFfx');
                        if (evento.extendedProps.status === 'Finalizada') {
                            eventEl ? eventEl.style.boxShadow = 'none' : null;

                            divCombo ? divCombo.classList.remove('d-none') :null;

                            //VACIAMOS EL DESPLEGABLE
                            $(despleStatus).empty();
                            $(despleStatus).append(`
                               <div onclick="actionPresButon('faltaCliente')" class="header_buttonCancel_kUEPy faltaCliente header_size--14-b_XJC3t">
                                    <span class="b-icon iconFont icon-noshow" type="font" style="font-size: 22px;"></span>
                                    Falta del cliente
                                </div>
                            `);
                        }
                        else if (evento.extendedProps.status === 'confirmed') {

                            divCombo ? divCombo.classList.remove('d-none') :null;

                            $(despleStatus).empty();
                            $(despleStatus).append(`
                                <div onclick="actionPresButon('cancelarCitaOption')" class="cancelarCitaOption header_buttonCancel_kUEPy header_size--14-b_XJC3t">
                                    <span class="b-icon iconFont icon-cancel-thin" style="font-size: 28px;"></span>
                                    Cancelar cita
                                </div>
                            `);
                        }
                        else if (evento.extendedProps.status === 'cancelled' || evento.extendedProps.status === 'pending') {
                            // let divCombo = document.querySelector('.divComboStatusReserv');
                            divCombo ? divCombo.classList.add('d-none') :null;
                            // if (divCombo) {
                            //     divCombo.classList.add('d-none');
                            // }
                        }
                        // Comprobar si el evento ha finalizado
                        if (new Date(evento.end) < now && evento.extendedProps.status !== 'completada'  && evento.extendedProps.status !== 'cancelled' && evento.extendedProps.status !== 'pagada' && evento.extendedProps.status !== 'Finalizada' && evento.extendedProps.status) {
                            // //console.log(evento, "comprobar si finaliza evento");

                            let updateStatusReservUrl = 'actualizar-estado-reserva';
                            let csrfToken = $('meta[name="csrf-token"]').attr("content");
                            $.ajax({
                                url: updateStatusReservUrl,
                                method: 'POST',
                                data: {
                                    _token: csrfToken,
                                    reserva_id: evento.extendedProps.reservaId
                                },
                                success: function(response) {
                                    // const updateEndReserv = response.updteEnd;
                                    // if(updateEndReserv === true){
                                    //     initializeCalendar();
                                    // }
                                },
                                error: function(xhr) {
                                    //console.log('Error al actualizar el status', xhr);
                                }
                            });
                            evento.setExtendedProp('status', 'Finalizada');

                        }
                        let loader = document.querySelector('#loaderSperaAdministrator');
                        setTimeout(() => {
                            loader.classList.add('d-none');
                        }, 300);
                    }

                },
                datesSet: function(info) {
                    // poner la imagen de cuadrícula que hay arriba de los horarios calendario
                    if (calendar.view.type === 'resourceTimeGridDay') {
                        updateTableView('resourceTimeGridDay');
                      } else if (calendar.view.type === 'resourceTimeGridWeek') {
                        updateTableView('resourceTimeGridWeek');
                      } else {
                        updateTableView(); // Caso para otras vistas que no son 'timeGridDay' ni 'timeGridWeek'
                      }
                },
                eventDrop: function(info) {
                    // Obtener la nueva fecha y hora del evento
                    const nuevaFecha = info.event.start.toISOString(); // La fecha en formato ISO 8601
                    const reservaId = info.event.extendedProps.reservaId; // Obtener el ID de la reserva asociada al evento
                    // Realizar la solicitud AJAX para actualizar la cita en la base de datos
                    let updateDateUrl = 'actualizar-fecha-reserva'; // Ruta a la que hacemos el POST
                    let csrfToken = $('meta[name="csrf-token"]').attr("content");
                    $.ajax({
                        url: updateDateUrl,
                        method: 'POST',
                        data: {
                            _token: csrfToken,
                            reserva_id: reservaId,
                            nueva_fecha: nuevaFecha,
                        },
                        success: function(response) {
                            if (response.success) {
                                // Mostrar el cuadro de confirmación
                                const confirmarModificacion = confirm('¿Deseas modificar esta cita?');
                                if (confirmarModificacion) {
                                    // Si el usuario acepta, proceder con la actualización de la cita
                                    alert('Cita actualizada correctamente');
                                    const evento2 = info.event;
                                    // Actualiza extendedProps.fecha con la nueva fecha
                                    evento2.setExtendedProp('fecha', response.nueva_fecha);
                                    const extendedProps2 = evento2.extendedProps;
                                    // //console.log(extendedProps2.fecha);
                                } else {
                                    // Si el usuario cancela, revertir cambios (si es necesario)
                                    alert('No se realizaron cambios.');
                                    info.revert();
                                }
                            } else {
                                // Si algo salió mal, revertir los cambios en el calendario
                                info.revert();
                                alert(response.message || 'Hubo un problema al actualizar la cita.');
                            }
                        },
                        error: function(xhr) {
                            //console.log('Error al actualizar la cita', xhr);
                            info.revert();  // Revertir los cambios si hubo un error
                            alert('Error en la comunicación con el servidor.');
                        }
                    });
                },
                eventResize: function(info) {
                    alert('Evento redimensionado a: ' + info.event.end.toISOString());
                },
                eventClick: function (info) {
                    //botonDeshabilitado
                    let miDiv = document.querySelector('.fc-header-toolbar');
                    let botones = miDiv.getElementsByTagName('button');
                    for (let boton of botones) {
                    boton.disabled = true;
                    }

                    loaderWiteSmall();
                    let calendar036 = document.getElementById('calendar');

                    calendar036.classList.add('calendarEstrecho');
                    if(info.event.extendedProps.multiple === null){
                        // loaderWiteSmall();
                        oldStatus = info.event.extendedProps.status;
                        // //console.log(info.event, "EVENT CLICK---info.event");
                        eventIdChangeCalendar='';
                        eventIdChangeCalendar = info.event.id;
                        colorBordeNewReservCalendar='';
                        eventIdChangeCalendarArray = [];
                        colorBordeNewReservCalendar = info.event.extendedProps.servicio.borderColor;
                        eventIdChangeCalendarArray.push(info.event.id);
                        // var originalBackgroundColor = info.event.backgroundColor;
                        montarOffcanvasLateralTodaInfo(info);
                        infoArrayEnvio = [];
                        infoArrayEnvio = info;


                    }else{
                        // loaderWiteMegaSmall();
                        // //console.log(info, "EVENTCLICK--info");

                        let multiple_id = info.event.extendedProps.multiple;
                        //obtenemos todos los eventos
                        let events = calendar.getEvents();
                        // //console.log(events);

                        // Filtramos los eventos que tienen el mismo valor en 'multiple'
                        let serviciosMultiples = events.filter(event => event.extendedProps.multiple === multiple_id);
                        serviciosMultiples.sort((a, b) => a.start - b.start); // Orden en orden ascendente (el evento que empieza primero va primero)
                        // //console.log(serviciosMultiples, "SERVICIOS MULTIPLES");
                        infoArrayEnvio = [];
                        infoArrayEnvio = serviciosMultiples;
                        // //console.log(infoArrayEnvio, "EVENT CLICK---infoArrayEnvio");
                        eventIdChangeCalendarArray = [];
                        oldStatusArray = [];
                        colorBordeReservArray = [];
                        //guardamos los ids eventos en array
                        serviciosMultiples.forEach(event => {
                            eventIdChangeCalendarArray.push(event.id);
                            oldStatusArray.push(event.extendedProps.status);
                            colorBordeReservArray.push(event.extendedProps.servicio.borderColor);
                        });
                        montarOffcanvasLateralTodaInfo(serviciosMultiples, multiple_id);
                    }
                }
            });
            calendar.render();
            setTimeout(() => {
                calendar.updateSize();
            }, 1500);
            window.dispatchEvent(new Event('resize'));
            isCalendarInitialized = true;
    }

    // Función para añadir opciones al desplegable
    function appendStatusOption(despleStatus, action, text, iconClass, fontSize) {
        $(despleStatus).append(`
            <div onclick="actionPresButon('${action}')" class="${action} header_buttonCancel_kUEPy header_size--14-b_XJC3t">
                <span class="b-icon iconFont ${iconClass}" type="font" style="font-size: ${fontSize}px;"></span>
                ${text}
            </div>
        `);
    }

    // poner la imagen de cuadrícula que hay arriba de los horarios calendario
    function updateTableView(viewType) {
        resetAllTdVisibility();
        const citasAdministrator = document.getElementById('Citas_administrator');
        const tbody = document.querySelector('.fc-scrollgrid-section-body table tbody');

        // Eliminar la clase 'heigEspecifico' si la vista es 'timeGridDay' o 'timeGridWeek'
        citasAdministrator.classList.remove('heigEspecifico');

        if (!tbody) return; // Salir si el tbody no existe

        // Lógica para 'resourceTimeGridDay' y 'resourceTimeGridWeek'
        let trClass;
        let existingTrClass;

        if (viewType === 'resourceTimeGridDay') {
          trClass = 'custom-tr';
          existingTrClass = 'custom-tr-week';
        } else if (viewType === 'resourceTimeGridWeek') {
          trClass = 'custom-tr-week';
          existingTrClass = 'custom-tr';
        }

        // Si la vista es 'resourceTimeGridDay' o 'resourceTimeGridWeek'
        if (trClass && existingTrClass) {
          // Eliminar la fila existente con la clase de la vista anterior
          const existingTr = tbody.querySelector(`.${existingTrClass}`);
          if (existingTr) existingTr.remove();

          // Comprobar si ya existe la fila de la vista actual
          const existingTrCurrent = tbody.querySelector(`.${trClass}`);
          if (!existingTrCurrent) {
            const tr = createTableRow(trClass);
            tbody.insertBefore(tr, tbody.firstChild);
          }
        } else {
          // Si no es 'timeGridDay' ni 'timeGridWeek', agregar la clase 'heigEspecifico'
          citasAdministrator.classList.add('heigEspecifico');
        }
      }
      function createTableRow(className) {
        const tr = document.createElement('tr');
        tr.classList.add(className);

        const td1 = document.createElement('td');
        tr.appendChild(td1);

        const td2 = document.createElement('td');
        td2.classList.add('td_vacioImagen');
        tr.appendChild(td2);

        return tr;
      }

    //función que restablece los tds de calendar por el conflicto de cambio de vistas
    function resetAllTdVisibility() {
        const allTds = document.querySelectorAll('td.oculto');
        allTds.forEach(function(td) {
            td.classList.remove('oculto');
        });

        const allThs = document.querySelectorAll('th.thOculto');
        allThs.forEach(function(th) {
            // //console.log(th);

            let thOcultos33 = th.querySelector('a.fc-col-header-cell-cushion');
            if(thOcultos33){
                thOcultos33.classList.remove('hideWeek');
                // //console.log("existe");
            }else{
                // //console.log("no existen");
            }
            th.classList.remove('thOculto');
        });
        const allThsNombre = document.querySelectorAll('th .nombreFlechaPlegado');
        allThsNombre.forEach(function(thNombre) {
            thNombre.classList.remove('nombreFlechaPlegado');
        });
    }

    // Función que se ejecuta cuando se hace clic en el botón
    function showHideEmpleDia(idEmpleado) {
        empleadoIdOpenClosedCalendar = idEmpleado;

        // Selecciona la vista de día
        let vistaDia = document.querySelector('.fc-resourceTimeGridDay-view');
        // //console.log(vistaDia, "vistaDia");

        // Solo si la vista de día existe
        if (vistaDia) {
            // Selecciona todos los <td> con el data-resource-id igual a idEmpleado dentro de la vista de día
            const tds = vistaDia.querySelectorAll(`td[data-resource-id="${idEmpleado}"]`);
            const th = vistaDia.querySelector(`th[data-resource-id="${idEmpleado}"]`);
            if (th) {
                // Si el <th> tiene la clase 'thOculto', la quitamos
                if (th.classList.contains('thOculto')) {
                    th.classList.remove('thOculto'); // Quitamos la clase 'thOculto'
                    th.querySelector('.empleado_nombre').classList.remove('nombreFlechaPlegado');
                    // //console.log("Se ha mostrado el <th> y se ha quitado la clase thOculto");
                } else {
                    th.classList.add('thOculto'); // Añadimos la clase 'thOculto'
                    th.querySelector('.empleado_nombre').classList.add('nombreFlechaPlegado');
                    // //console.log("Se ha ocultado el <th> y se ha añadido la clase thOculto");
                }
            }
            // Si existen <td>s que coinciden
            if (tds.length > 0) {
                tds.forEach(function(td) {
                    // Si el <td> tiene la clase 'oculto', lo mostramos
                    if (td.classList.contains('oculto')) {
                        td.classList.remove('oculto'); // Mostrar el <td>
                        // //console.log("Se ha mostrado el <td> con el idEmpleado:", idEmpleado);
                    } else {
                        td.classList.add('oculto'); // Ocultar el <td>
                        // //console.log("Se ha ocultado el <td> con el idEmpleado:", idEmpleado);
                    }
                });
            }
        }
    }

    //abre y cierra el empleado seleccionado en la vista semana
    function showHideEmpleSemana(idEmpleado) {
        empleadoIdOpenClosedCalendar = idEmpleado;
        // Selecciona la vista de día
        let vistaDia = document.querySelector('.fc-resourceTimeGridWeek-view');
        const tds = vistaDia.querySelectorAll(`td[data-resource-id="${idEmpleado}"]`);
      // Seleccionamos todos los <th> con el atributo data-resource-id igual a idEmpleado
      const ths = vistaDia.querySelectorAll(`th[data-resource-id="${idEmpleado}"]`);

      ths.forEach(function(th) {
          if (th) {
              // Verificar si el <th> tiene la clase 'thOculto'
              if (th.classList.contains('thOculto')) {
                  // Verificar que el elemento 'a.fc-col-header-cell-cushion' existe antes de modificar su clase
                  const cushion = th.querySelector('a.fc-col-header-cell-cushion');
                  if (cushion) {
                      cushion.classList.remove('hideWeek');
                  }

                  // Quitamos la clase 'thOculto' del <th>
                  th.classList.remove('thOculto');

                  // Verificar si el elemento con clase 'empleado_nombre' existe antes de intentar modificarlo
                  const empleadoNombre = th.querySelector('.empleado_nombre');
                  if (empleadoNombre) {
                      empleadoNombre.classList.remove('nombreFlechaPlegado');
                  }

                //   //console.log("Se ha mostrado el <th> y se ha quitado la clase thOculto");
              } else {
                  // De nuevo, verificamos que 'a.fc-col-header-cell-cushion' exista antes de intentar modificar su clase
                  const cushion = th.querySelector('a.fc-col-header-cell-cushion');
                  if (cushion) {
                      cushion.classList.add('hideWeek');
                  }

                  // Añadimos la clase 'thOculto' al <th>
                  th.classList.add('thOculto');

                  // Verificar si el elemento con clase 'empleado_nombre' existe antes de intentar modificarlo
                  const empleadoNombre = th.querySelector('.empleado_nombre');
                  if (empleadoNombre) {
                      empleadoNombre.classList.add('nombreFlechaPlegado');
                  }

                //   //console.log("Se ha ocultado el <th> y se ha añadido la clase thOculto");
              }
          }
      });


            // Si existen <td>s que coinciden
            if (tds.length > 0) {
                tds.forEach(function(td) {
                    // Si el <td> tiene la clase 'oculto', lo mostramos
                    if (td.classList.contains('oculto')) {
                        td.classList.remove('oculto'); // Mostrar el <td>
                        // //console.log("Se ha mostrado el <td> con el idEmpleado:", idEmpleado);
                    } else {
                        td.classList.add('oculto'); // Ocultar el <td>
                        // //console.log("Se ha ocultado el <td> con el idEmpleado:", idEmpleado);
                    }
                });
            } else {
                //console.log("No se encontraron <td> con el idEmpleado:", idEmpleado);
            }
            // Seleccionamos el segundo <tr> dentro del <thead> con la clase 'presentation'
//             const thOcultos = document.querySelectorAll('.thOculto'); // Seleccionamos todos los <th> con la clase 'thOculto'

// if (thOcultos.length > 0) {
//     thOcultos.forEach(function(oculto) { // Recorremos todos los <th> con la clase 'thOculto'
//         // Seleccionamos los elementos con la clase 'fc-scrollgrid-sync-inner' dentro de cada <th>
//         const thOcultos2 = oculto.querySelectorAll('a.fc-col-header-cell-cushion');

//         thOcultos2.forEach(function(oculto2) { // Recorremos todos los elementos con la clase 'fc-scrollgrid-sync-inner'
//             if (oculto2) {
//                 // Si el <th> tiene la clase 'hideWeek', la quitamos, si no, la añadimos
//                 if (oculto2.classList.contains('hideWeek')) {
//                     oculto2.classList.remove('hideWeek'); // Quitamos la clase 'hideWeek'
//                     //console.log("Se ha quitado la clase 'hideWeek' del <th> con el data-resource-id:", idEmpleado);
//                 } else {
//                     oculto2.classList.add('hideWeek'); // Añadimos la clase 'hideWeek'
//                     //console.log("Se ha añadido la clase 'hideWeek' al <th> con el data-resource-id:", idEmpleado);
//                 }
//             } else {
//                 //console.log("No se ha encontrado un elemento con la clase 'fc-scrollgrid-sync-inner'");
//             }
//         });
//     });
// }


    }


function redimensionadoCalendar(){
    setTimeout(() => {
        calendar.updateSize();
    }, 1500);
}

var linksMasDos = document.querySelectorAll('.fc-daygrid-more-link.fc-more-link');
linksMasDos.forEach(function (link) {
    link.addEventListener('click', function(event){
        event.preventDefault();


    });
});
let empleadosPestaniasCalendar = document.querySelectorAll('.fc-resourceTimeGridDay-view table table tr th .empleadoPlegar');
empleadosPestaniasCalendar.forEach(function(empleadoPestania){
    empleadoPestania.addEventListener('click', function(event){

        event.preventDefault();
        // //console.log(empleadoPestania, "empleadoPestania");

    });
});

function montarOffcanvasLateralTodaInfo(info, id_multipleCalendar = null){
    resetArrays();
    showDivNotas('datos_reserva0106');
    // //console.log(info, "mostrar offcanvas lateral");
    calendar.changeView('resourceTimeGridDay');
    blockPointerEvents();
    let popoverReservas = document.querySelector('.fc-popover.fc-more-popover');
    popoverReservas ? popoverReservas.remove(): null;
    let fechaFlatpickrDiv = document.querySelector('.fechaCitaInfo');
    let divNota = document.querySelector('.notasInfoCliente');
    let indicadorNota = document.querySelector('.indicatorNotasNewReservInfo');

    let divMensajeCliente = document.getElementById('business_noteInfo');
    let labelMensajeCliente = document.querySelector('.business_noteInfo ');
    let divNotaInterna = document.getElementById('business_noteNewReserv');
    let labelNotaInterna = document.querySelector('.business_noteNewReserv');
     //desplegables es global
     let divCombo = document.querySelector('.divComboStatusReserv');
     let despleStatus = document.querySelector('.header_actions_oRFfx');
     initDatePiker();//calendario
     //sólo un servicio
    if(id_multipleCalendar === null){
        // //console.log("SOLO UN SERVICIO");

        fechaFlatpickrDiv.setAttribute('data-datePiker', info.event.start);

        const evento = info.event;
        const extendedProps = evento.extendedProps;

        //si hay nota cliente
        if(extendedProps.nota !== null){
            $(divNota).empty();
            $(divNota).append(`
                <div class="notes-and-info-tab_messageFromClient_k2cdB notes-and-info-tab_size--14-sb_n2YHe shadow">
                    <p class="notes-and-info-tab_messageFromClientLabel_Blzdv notes-and-info-tab_size--12_fjeYr">Mensaje del cliente</p>
                        ${extendedProps.nota}
                </div>
            `);
        indicadorNota.classList.add('b-tabs_tabIndicator_vu4Y2');
        }else{
            $(divNota).empty();
            indicadorNota.classList.remove('b-tabs_tabIndicator_vu4Y2');
        }

        //si hay mensaje para cliente
        if(extendedProps.mensaje_cliente !== null){
            divMensajeCliente.value = extendedProps.mensaje_cliente;
            indicadorNota.classList.contains('b-tabs_tabIndicator_vu4Y2') ? null : indicadorNota.classList.add('b-tabs_tabIndicator_vu4Y2');
            labelMensajeCliente.classList.add('labelUp');
        }else{
            divMensajeCliente.value ='';
            labelMensajeCliente.classList.remove('labelUp');
        }


        //si hay nota interna
        if(extendedProps.nota_interna !== null){
            // //console.log(extendedProps.nota_interna);

            divNotaInterna.value = extendedProps.nota_interna;
            indicadorNota.classList.contains('b-tabs_tabIndicator_vu4Y2') ? null : indicadorNota.classList.add('b-tabs_tabIndicator_vu4Y2');
            labelNotaInterna.classList.add('labelUp');
        }else{
            divNotaInterna.value ='';
            labelNotaInterna.classList.remove('labelUp');
        }

        //si empleado seleccionado por cliente
        let corazon = document.querySelector('.solicitadoClientePantallaInfoCliente');
        if(evento.extendedProps.seleccionado_cliente === 1){
            corazon.src = urlAplicacion + "/storage/calendar/corazonRojoEmpleCliente.svg";
            document.getElementById('solicictaCliente').value = 1;
        }else{
            corazon.src = urlAplicacion + "/storage/calendar/heart-empty.svg";
        }

        //si existe cliente
        let existeCliente = extendedProps.usuario.id;
        if(existeCliente){
            showDivClienInfo('basket-customer-card0101Info');
            let usuario = extendedProps.usuario;
            // //console.log(usuario, "USUARIO");
            insertarTarjetaClienteSelecionadoExtentrop(usuario, '.basket-customer-card0101Info', 'card_empty_info');

        }else{
            showDivClienInfo('basket-customer-card0101Info');
            document.getElementById('clienteDetails').style.display = 'none';
            document.querySelector('.basket-customer-card0101Info').style.display = 'block';
        }

        let divTarjetasIniciales = document.querySelector('.subbookings-list_container_nMAxs .tarjetasIncialesMostrarOcultar');
        divTarjetasIniciales.classList.remove('d-none');
        let divTarjetasNuevas = document.querySelector('.subbookings-list_container_nMAxs .nuevasTarjetasMostrarOcultar');
        $(divTarjetasNuevas).empty();

        cambiarTotales(extendedProps.servicio.precio);

        //añadir opcion al desplegable
        // Asegurarse de que ambos elementos existen antes de continuar
        if (divCombo && despleStatus) {
            divCombo.classList.remove('d-none'); // Mostrarlo de forma predeterminada
            // Limpiar el desplegable de acciones
            $(despleStatus).empty();
            switch (extendedProps.status) {
                case 'cancelled':
                    divCombo.classList.add('d-none');
                    break;
                case 'confirmed':
                    $(despleStatus).append(`
                        <div onclick="actionPresButon('cancelarCitaOption')" class="cancelarCitaOption header_buttonCancel_kUEPy header_size--14-b_XJC3t">
                            <span class="b-icon iconFont icon-cancel-thin" style="font-size: 28px;"></span>
                            Cancelar cita
                        </div>
                    `);
                    break;
                case 'Finalizada':
                    $(despleStatus).append(`
                        <div onclick="actionPresButon('faltaCliente')" class="header_buttonCancel_kUEPy faltaCliente header_size--14-b_XJC3t">
                            <span class="b-icon iconFont icon-noshow" type="font" style="font-size: 22px;"></span>
                            Falta del cliente
                        </div>
                    `);
                    break;
                default:
                    break;
            }
        }
        //poner clase a cabecera infoServicio
        setClass(extendedProps.status, '.headerInfoService');

        //añadimos el id del servicio al array
        addServiceArray(extendedProps.servicio.id);
        // //console.log(extendedProps.seleccionado_cliente, "OFFCANVASiNFOlATERAL--seleccionadoCliente");

        meterHorasArrayInicio('.slotHorasCobrarServicio', '.slotHoraFinCorbrarServicio', '.slotEmpleadoAddInicio', extendedProps.seleccionado_cliente, extendedProps.duracion);

        // Llenar las secciones con los datos seccion servicio info
        let idOffcanvasBig = document.getElementById('eventDetailsModal');
        if (idOffcanvasBig) {
            idOffcanvasBig.setAttribute('data-idReserv', extendedProps.reservaId);
        }
        //ponemos la fecha visible
        let fechaReserva = formatDate2(extendedProps.fecha);
        document.querySelector('.fechaCitaInfo').textContent = fechaReserva;

        let duracion = extendedProps.servicio.duracion; // Ejemplo: 60, 90, etc.
        // Convertir la duración
        let duracionFormateada = duracion >= 60
            ? `${Math.floor(duracion / 60)}h ${duracion % 60 !== 0 ? duracion % 60 + 'min' : ''}`
            : `${duracion}min`;

        //TARJETA SERVICIO DENTRO OFFCANVAS INFO RESERVA
        document.querySelector('.services_serviceDecorator_ldMxA').style.borderColor = `${extendedProps.servicio.borderColor}`;
        document.querySelector('.services_serviceWrapper_gug5x').setAttribute('data-idServiceAdd',extendedProps.servicio.id );
        // document.querySelector('.servives_serviceWrapper_gug5x').setAttribute('data-idEvent', eventId);
        document.querySelector('.services_serviceName_YhbTW').innerHTML = `
            ${extendedProps.servicio.nombre}
            <span class="services_serviceDuration_Zb36z duration services_size--14_Mfwds">
            ${duracionFormateada}
            </span>
        `;

        document.querySelector('.services_serviceDuration_Zb36z').setAttribute('data-oldDuration', extendedProps.servicio.duracion);
        document.querySelector('.services_servicePrice_wErzf').textContent = extendedProps.servicio.precio;
        document.querySelector('.slotHorasCobrarServicio').textContent = formatTime(extendedProps.fecha);
        document.querySelector('.slotHorasCobrarServicio').setAttribute('data-hourReserv', formatTime(extendedProps.fecha));
        document.querySelector('.slotHoraFinCorbrarServicio').textContent = obtenerHoraEuropaCentral(info.event.end);

        //empleado pongo nombre empleado global
        nombreEmpleado = extendedProps.empleada.nombre;
        ponerNomIdEmpleInicio(nombreEmpleado, extendedProps.empleada.id);
        apellidoEmpleado = extendedProps.empleada.apellido;
        const eventDetailsModal = new bootstrap.Offcanvas(document.getElementById('eventDetailsModal'));
        eventDetailsModal.show();

        // calendar.gotoDate(extendedProps.fecha)
        // eliminarEventoCalendario(info.event.id);
        ponerEventoInicialmenteModify(info);
        // //console.log(servicesWithTimes, "OFFCANVASiNFO--servicesWitTimes");

    }else{

        calendar.gotoDate(info[0].start);

        fechaFlatpickrDiv.setAttribute('data-datePiker', info[0].start);
        if(info.event){
            fechaFlatpickrDiv.setAttribute('data-datePiker', info.event.start);
        }

        //si hay mensaje para el cliente:
        if(info[0].extendedProps.mensaje_cliente){
            divMensajeCliente.value = info[0].extendedProps.mensaje_cliente;
            indicadorNota.classList.contains('b-tabs_tabIndicator_vu4Y2') ? null : indicadorNota.classList.add('b-tabs_tabIndicator_vu4Y2');
            labelMensajeCliente.classList.add('labelUp');
        }else{
            divMensajeCliente.value ='';
            labelMensajeCliente.classList.remove('labelUp');
        }

        //si hay nota interna
        if(info[0].extendedProps.nota_interna){

            divNotaInterna.value = info[0].extendedProps.nota_interna;
            indicadorNota.classList.contains('b-tabs_tabIndicator_vu4Y2') ? null : indicadorNota.classList.add('b-tabs_tabIndicator_vu4Y2');
            labelNotaInterna.classList.add('labelUp');
        }else{
            divNotaInterna.value ='';
            labelNotaInterna.classList.remove('labelUp');
        }
        //si existe cliente
        let existeCliente =  info[0].extendedProps.usuario.id;
        if(existeCliente){
            showDivClienInfo('basket-customer-card0101Info');
            let usuario = info[0].extendedProps.usuario;
            insertarTarjetaClienteSelecionadoExtentrop(usuario, '.basket-customer-card0101Info', 'card_empty_info');
        }else{
            showDivClienInfo('basket-customer-card0101Info');
            document.getElementById('clienteDetails').style.display = 'none';
            document.querySelector('.basket-customer-card0101Info').style.display = 'block';
        }

        let divTarjetasIniciales = document.querySelector('.subbookings-list_container_nMAxs .tarjetasIncialesMostrarOcultar');
        divTarjetasIniciales.classList.add('d-none');
        let multiple_id = id_multipleCalendar;
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var url = "get-multiples-forReserve";
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: csrfToken,
                id_multiple: multiple_id,
            },
            success: function(data) {
                let serviciosMultiple = data.serviciosMultiple;
                serviciosMultiple.sort((a, b) => new Date(a.date_time) - new Date(b.date_time));
                // //console.log(serviciosMultiple, "offcancasInfo--serviciosMultiple");

                if(serviciosMultiple.length >0){
                    // //console.log(serviciosMultiple, "serviciosMultiple");
                    let divTarjetasNuevas = document.querySelector('.subbookings-list_container_nMAxs .nuevasTarjetasMostrarOcultar');
                    let htmlContent = '';
                    let totalPricePay=0;
                    let fechaReserva = formatDate2(serviciosMultiple[0].date_time);
                    document.querySelector('.fechaCitaInfo').textContent = fechaReserva;
                    // Crear un array con solo los service_id usando map()
                    let serviceIds = serviciosMultiple.map(service => service.service_id);
                    addServiceArrayIds(serviceIds);
                    getServicesById(serviceIds, function (servicios){
                        getAllEmpleados(function(empleadosReservas) {
                            let inicialesEmpleados = [];
                            nombreEmpleadosArray = [];
                            let apellidos = [];
                            let idsEmpleados = [];
                            // Recorremos el array servicesWithTimes
                            serviciosMultiple.forEach(service => {
                                // Buscamos el empleado correspondiente usando el id_empleado
                                let empleado = empleadosReservas.find(emp => emp.id === parseInt(service.empleada_id));
                                if (empleado) {
                                    // Obtenemos las primeras dos letras del nombre del empleado
                                    let iniciales = empleado.nombre.substring(0, 2).toUpperCase();
                                    let nombre = empleado.nombre;
                                    let apellido = empleado.primerApellido;
                                    let idEmpleado = empleado.id;
                                    idsEmpleados.push(idEmpleado);
                                    inicialesEmpleados.push(iniciales);
                                    nombreEmpleadosArray.push(nombre);
                                    apellidos.push(apellido);
                                }
                            });
                            servicios.forEach((servicio, index) => {
                                let horaInicio03 = formatTime(serviciosMultiple[index].date_time);
                                let horaFin03 = calculateEndTime(serviciosMultiple[index].date_time, serviciosMultiple[index].duration);
                                let id_empleada03 = serviciosMultiple[index].empleada_id;
                                let seleccionaCliente03 = serviciosMultiple[index].empleado_seleccionado;
                                let duracion03 = serviciosMultiple[index].duration;
                                meterHorasArrayMultiple(servicio.id, horaInicio03, horaFin03, id_empleada03, seleccionaCliente03, duracion03);

                                // Convertir el precio a número flotante
                                let precioNumerico = parseFloat(servicio.precio);
                                totalPricePay += precioNumerico;

                                // Comprobar si horaInicio es 0
                                let tiempoFormateada = comprobar603090(serviciosMultiple[index].duration);

                                // Obtener la horaInicio y horaFin del elemento correspondiente en servicesWithTimes por índice
                                let apellido55 = apellidos[index];
                                let nombreEmpleado55 = nombreEmpleadosArray[index];
                                let inicialesEmpleado33 = inicialesEmpleados[index];
                                let horaInicio = formatTime(serviciosMultiple[index].date_time);
                                let horaFin = calculateEndTime(serviciosMultiple[index].date_time, serviciosMultiple[index].duration);
                                // // let servicioHorario = servicesWithTimes[index];
                                let seleccionaCliente = serviciosMultiple[index].empleado_seleccionado;
                                let duracionServicio = `${horaInicio} - ${horaFin}`;

                                // Construir HTML
                                htmlContent += construirHtmlTarjetasFinales(
                                    servicio.borderColor,
                                    servicio.nombre,
                                    servicio.precio,
                                    duracionServicio,
                                    tiempoFormateada,
                                    nombreEmpleado55,
                                    inicialesEmpleado33,
                                    apellido55,
                                    seleccionaCliente,
                                    // eventIdChangeCalendarArray[index]
                                );
                            });

                            // Agregar todo el contenido generado al contenedor nuevo
                            $(divTarjetasNuevas).empty();
                            $(divTarjetasNuevas).append(htmlContent);



                            //cambiar el precio en pantalla principal
                            addHtmlDivPrecioFinal(totalPricePay, '#eventDetailsModal p[data-testid="appointment-price"]', '#eventDetailsModal div[data-testid="appointment-to-be-paid"]');
                            // //console.log(servicesWithTimes, "withTimes multiples");
                            let reservaTerminaMasTarde = getReservaMasTarde(serviciosMultiple);
                            if (divCombo && despleStatus) {
                                divCombo.classList.remove('d-none'); // Mostrarlo de forma predeterminada
                                // Limpiar el desplegable de acciones
                                $(despleStatus).empty();
                                switch (reservaTerminaMasTarde.status) {
                                    case 'cancelled':
                                        divCombo.classList.add('d-none');
                                        break;
                                    case 'confirmed':
                                        $(despleStatus).append(`
                                            <div onclick="actionPresButon('cancelarCitaOption')" class="cancelarCitaOption header_buttonCancel_kUEPy header_size--14-b_XJC3t">
                                                <span class="b-icon iconFont icon-cancel-thin" style="font-size: 28px;"></span>
                                                Cancelar cita
                                            </div>
                                        `);
                                        break;
                                    case 'Finalizada':
                                        $(despleStatus).append(`
                                            <div onclick="actionPresButon('faltaCliente')" class="header_buttonCancel_kUEPy faltaCliente header_size--14-b_XJC3t">
                                                <span class="b-icon iconFont icon-noshow" type="font" style="font-size: 22px;"></span>
                                                Falta del cliente
                                            </div>
                                        `);
                                        break;
                                    default:
                                        break;
                                }
                            }

                            setClass(reservaTerminaMasTarde.status, '.headerInfoService');
                            let eventDetailsModal = new bootstrap.Offcanvas(document.getElementById('eventDetailsModal'));
                            eventDetailsModal.show();
                            setTimeout(() => {
                                eventIdChangeCalendarArray.forEach((eventId, index) => {
                                    let eventInfo = info[index];;
                                    let fechaFlatpickrDiv = document.querySelector('.fechaCitaInfo');
                                    let fechaFlatpickr = fechaFlatpickrDiv.getAttribute('data-datePiker');
                                    eventInfo.setStart(fechaFlatpickr);
                                    eventInfo.setProp('classNames', ['temporal']);
                                    eventInfo.setProp('borderColor', eventInfo.borderColor);
                                    calendar.render();
                                });
                            }, 300);

                            // ponerEventoInicialmenteModify(infoArrayEnvio);
                            //añadimos los ids del evento a las tarjetas html para cuando clic en "editar" eventoTemporalAsignado_
                            let tarjetasServiciosMultiples = document.querySelectorAll('.subbookings-list_card_j4UGY');
                            tarjetasServiciosMultiples.forEach((tarjeta, index) => {
                                boton = tarjeta.querySelector('.buttonEditEvent');
                                boton.setAttribute('data-index', eventIdChangeCalendarArray[index]);
                                boton.setAttribute('data-border', colorBordeReservArray[index]);
                                boton.setAttribute('data-new', false);
                            });

                        });
                    });
                }
            },
            error: function(xhr) {
                //console.log('Error al guardar el nombre de la categoria', xhr);
            }
        });
    }
}

function cambiarTotales(total){
    const visualizaPrecio = document.querySelector('[data-testid="appointment-price"]');
    if (visualizaPrecio) {
        visualizaPrecio.textContent = total;
    }
    const DivvisualizaPrecioAPagar = document.querySelector('[data-testid="appointment-to-be-paid"]');
    if (DivvisualizaPrecioAPagar) {
        let visualizadorPagarP = DivvisualizaPrecioAPagar.querySelector('.b-heading-xl');
        visualizadorPagarP.textContent = total;
    }
    const visualizaPrecio2 = document.querySelector('[data-testid="appointment-price2"]');
    if (visualizaPrecio2) {
        visualizaPrecio2.textContent = total;
    }
    const DivvisualizaPrecioAPagar2 = document.querySelector('[data-testid="appointment-to-be-paid2"]');
    if (DivvisualizaPrecioAPagar2) {
        let visualizadorPagarP2 = DivvisualizaPrecioAPagar2.querySelector('.b-heading-xl');
        visualizadorPagarP2.textContent = total;
    }

}
//calendario tipo datepiker de javascript calendario pequeño
function initDatePiker(){
    const fechaCitaInfo = document.getElementById('datePikerfechaCitaInfo2');
    let fechaFlatpickrDiv = document.querySelector('.fechaCitaInfo');
    // //console.log(fechaFlatpickr, "fecha del atributo");
    let fechaActual = new Date();
    let horaActual = fechaActual.getHours();
    let minutosActual = fechaActual.getMinutes();
    // Verificamos si la hora es mayor a las 19:50
    if (horaActual > 19 || (horaActual === 19 && minutosActual > 50)) {
        // Si es más tarde de las 19:50, configuramos la fecha para el día siguiente
        fechaActual.setDate(fechaActual.getDate() + 1);
        fechaActual.setHours(0, 0, 0, 0); // Establecer a medianoche para el día siguiente
    }
    let fechaFormateada= formatDateForFlatpickr(fechaActual);
    // //console.log(fechaFormateada, "fecha formateada");
    // Asignar el atributo data-piker con el formato deseado al inicio
    fechaFlatpickrDiv.setAttribute('data-datepiker', fechaActual.toString());


    fechaFlatpickrDiv.setAttribute('data-date', fechaFormateada);
    flatpickr(fechaCitaInfo, {
        inline: false, // Muestra el calendario como popup
        allowInput: true, // Permite escribir en el input
        clickOpens: true,
        enableTime: false, // Solo seleccionar fecha
        dateFormat: "D, d M.", // Formato: "lun, 2 dic"
        defaultDate: fechaFormateada, // Fecha que se marcará con un círculo
        disableMobile: true,
        locale: {
            firstDayOfWeek: 1,
            weekdays: {
                shorthand: ['dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb'],
                longhand: ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'],
            },
            months: {
                shorthand: ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'],
                longhand: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
            },
        },
        onChange: function (selectedDates, dateStr, instance) {
            loaderWiteSmall();
            document.querySelector('.fechaCitaInfo').setAttribute('data-datepiker', selectedDates);
            // //console.log(selectedDates, dateStr, "selected y dateStr");
            let fechaGotodate = formatearFecha02(selectedDates);

            if(calendar){
                calendar.gotoDate(fechaGotodate);
            }
            // if(comprobarSiEmpleadoAsignadoNewReservCalendar('.slotEmpleadoAddInicio')){
                let fecha = document.querySelector('.fechaCitaInfo').getAttribute('data-datepiker');
                // //console.log(fecha, "fecha");

                let horaInicio = document.querySelector('.slotHorasCobrarServicio').textContent;
                let horaFin = document.querySelector('.slotHoraFinCorbrarServicio').textContent;
                let start = formatFechaConHora(fecha, horaInicio);  // Fecha y hora de inicio
                let end = formatFechaConHora(fecha, horaFin);

                 //estamos en la pantalla donde hay tarjetas drag para cambio fecha new reserv Calendar
            let existenTarjetasDrag = document.querySelectorAll('.nuevasTarjetasMostrarOcultar .subboking-drag-el');
            if(existenTarjetasDrag.length>0){
                //console.log("DATEPIKERONCHANGE--multple y servicesWitTimes", servicesWithTimes);

                setTimeout(() => {
                    // eventIdChangeCalendarArray.forEach((eventId, index) => {
                    //     eliminarEventoCalendario(eventId);
                    // });
                    mostrarEventosArrayMejorado('.fechaCitaInfo');
                    // cambiarFechaEventosArray(fecha);
                    // mostrarEventosArrayNewReservCalendar('.fechaCitaInfo');
                }, 400);

            }else{
                //console.log("DATEPIKER ONCHANGE--simple");
                setTimeout(() => {
                    eliminarEventoCalendario(idEventoInicial);
                    cambiarFechaEvento(eventIdChangeCalendar, start, end);
                    document.querySelector('.fechaCitaInfo').setAttribute('data-date', dateStr);

                }, 400);
            }
            fechaFlatpickrDiv.textContent = dateStr;
        },
    });
}

function mostrarEventosArrayMejorado(datepiker){
    let eventosParaCrear = [];
    setTimeout(() => {
        eventIdChangeCalendarArray.forEach((eventId, index) => {
            //console.log(eventId, "mostrarEventosArrayMejorado--eventId");
            eventosParaCrear.push(calendar.getEventById(eventId));
            eliminarEventoCalendario(eventId);
            eliminarEventosTemporales(eventId);
        });
        eliminarEventoCalendario(idEventoInicial);

    }, 200);

    eliminarEventosTemporales('temporalArray_');
    eliminarEventosTemporales('eventoTemporal_2_');
    //console.log(eventosParaCrear, "eventosParaCrear");


    //console.log(selectedServiceIds2, "selectedServiceIds2");

    getServicesById(selectedServiceIds2,function (servicios){
        let title = 'Cliente sin cita previa';
        if(infoArrayEnvio.length===0){
            if(existeNombreCliente() !== false){
                title = existeNombreCliente();
            }
        }

        let fecha55 = '';
        if(document.getElementById(datepiker)){
            fecha55 = document.getElementById(datepiker).getAttribute('data-datepiker');
        }else{
            fecha55 =document.querySelector(datepiker).getAttribute('data-datepiker');
        }
        if(existeNombreClienteComun('.basket-customer-card0101Info') !== false){
            title = existeNombreClienteComun('.basket-customer-card0101Info');
        }
        let extendedProps='';
        servicios.forEach((servicio, index) => {
            // //console.log(infoArrayEnvio[index]);
            let horaInicio55 = servicesWithTimes[index].horaInicio;
            let horaFin55 = servicesWithTimes[index].horaFin;

            let id_empleado55 = servicesWithTimes[index].id_empleado
            if(eventosParaCrear[index]){
                extendedProps = eventosParaCrear[index].extendedProps;
            }else{
                extendedProps = {
                    servicio:{
                        nombre: servicio.nombre,
                        borderColor: servicio.borderColor,
                        duracion: calcularDuracion(horaInicio55.trim(), horaFin55.trim()),
                        precio: servicio.precio,
                        id: servicio.id,
                    },
                    empleada:{
                        nombre: nombreEmpleadosArray[index],
                        id: id_empleado55,
                    },
                    horaInicio: horaInicio55.trim(),
                    horaFin: horaFin55.trim(),
                };
            }

            // //console.log(id_empleado55, "empleado 55");

            let start55 = formatFechaConHora(fecha55, horaInicio55);  // Fecha y hora de inicio
            let end55 = formatFechaConHora(fecha55, horaFin55);
            let fechaInicial55 = start55.split('T')[0];
            let eventData = {
                classNames: ['temporal', `temporalArray_${index}`],
                // id: `temporalArray_${index}`,//esto es lo que sirve para eliminarlo
                id: eventIdChangeCalendarArray[index],
                title:  title + ' • ' + servicio.nombre,
                start: start55,  // Fecha y hora de inicio
                end: end55,      // Fecha y hora de finalización
                extendedProps: extendedProps,
                resourceId: id_empleado55,
            };
            // //console.log(eventData);

            if (calendar) {
                calendar.addEvent(eventData);
            }
        });
        setTimeout(() => {
            servicios.forEach((servicio, index) => {
                let eventoTemporal = document.querySelector(`.fc-event.temporalArray_${index}`);
                if (eventoTemporal) {
                    eventoTemporal.style.setProperty('border-left', `4px solid ${servicio.borderColor}`, 'important');
                }
            });
        }, 1000);
        let eventos = calendar.getEvents();
    //console.log(eventos, "mostrarEventosArrayMejorado--eventos");
    });
}

/// Función que convierte un string "d-m-Y" a formato datetime (YYYY-MM-DD HH:mm:ss)
function convertir_string_dataDate(dateStr) {
    const parts = dateStr.split("-");
    const day = parseInt(parts[0], 10);
    const month = parseInt(parts[1], 10) - 1;
    const year = parseInt(parts[2], 10);
    const date = new Date(year, month, day);
    const formattedDate = `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')} ${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}:${date.getSeconds().toString().padStart(2, '0')}`;

    return formattedDate;
  }

//mini calendario para años cliente
function initDatePikerClient(){
    const calendarFechaCliente = document.getElementById('cumpleCliente001');
    if (calendarFechaCliente) {
        flatpickr(calendarFechaCliente, {
            inline: false, // Muestra el calendario como popup
            allowInput: true, // Permite escribir en el input
            clickOpens: true,
            enableTime: false, // Solo seleccionar fecha
            dateFormat: "d-m-Y", // Formato: "lun, 2 dic"
            // defaultDate: fechaFormateada, // Fecha que se marcará con un círculo
            disableMobile: true,
            slotEventOverlap: false,
            eventOverlap: false,
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ['dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb'],
                    longhand: ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'],
                },
                months: {
                    shorthand: ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'],
                    longhand: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
                },
            }, // Cambiar a español
            onChange: function (selectedDates, dateStr, instance) {
                calendarFechaCliente.setAttribute('data-happy-date',  convertir_string_dataDate(dateStr));
                // Cambia el contenido del párrafo al seleccionar una fecha
                // fechaFlatpickrDiv.textContent = dateStr;
            },
        });
    }
}

initDatePikerClient();


//cruz cerrar offcanvas info reserva
// let closedOffcanvasInfoReserv = document.querySelector('.closedOffcanvasInfoReserv');
// if(closedOffcanvasInfoReserv){
//     closedOffcanvasInfoReserv.addEventListener('click', function (event) {
//         event.preventDefault();
function closedOffcanvasInfoReserv(){
        console.log("clic en cruz");

        let eventosConTemporalDos = document.querySelectorAll('.temporal2');
        let miDiv = document.querySelector('.fc-header-toolbar');
        let botones = miDiv.getElementsByTagName('button');
        for (let boton of botones) {
            boton.disabled = false;
        }

        let divTarjetasIniciales = document.querySelector('.subbookings-list_container_nMAxs .tarjetasIncialesMostrarOcultar');

        divTarjetasIniciales.classList.remove('d-none');
        let divTarjetasNuevas = document.querySelector('.subbookings-list_container_nMAxs .nuevasTarjetasMostrarOcultar');
        $(divTarjetasNuevas).empty()
        cerrarModalCategorias('.comboStatusReserv');
        cerrarModalCategorias('.contenedorHorasFin');
        cerrarModalCategorias('.contenedorHorasInicio');
        resetArrays();
        openCloseComboStatus();
        insertartarjetaSeleccionaCliente('.basket-customer-card0101Info', 'card_empty_info');

        //mostrar pestaña info reserva
        let pestaniaCita = document.querySelector('.cita_tab');
        if (pestaniaCita) {
            document.querySelectorAll('.b-tabs_tabDefaultActive_CYkQd').forEach(function(elemento) {
                elemento.classList.remove('b-tabs_tabDefaultActive_CYkQd');
            });
            pestaniaCita.classList.add('b-tabs_tabDefaultActive_CYkQd');
            showDivNotas('datos_reserva0106');
        }
            // //console.log("hay info.event");
            checkPendingReservations();
            // setTimeout(() => {
                initializeCalendar();
            // }, 500);

        let calendar037 = document.getElementById('calendar');
        calendar037.classList.remove('calendarEstrecho');
        $('#eventDetailsModal').offcanvas('hide');
        enablePointerEvents();
        calendar.render();
        // console.log(servicesWithTimes.length,eventIdChangeCalendar, eventosConTemporalDos, "serviceWtimes.leng eventIdChangeCalendar");
        // console.log(servicesWithTimes, infoArrayEnvio,selectedServiceIds, selectedServiceIds2,colorBordeReservArray,eventIdChangeCalendarArray, "flecha atras servicesTime y infoarayEnvio, eventIdChangeCalendarArray");
        // console.log("------------------------------");
//      });
// }
}

function cerrarCombo(combo){
    let comboAbierto = document.querySelector(combo);
    if (comboAbierto) {
        comboAbierto.classList.toggle('d-none');
    }
}
//ABRE Y CIERRA LAS CATEGORIAS DE LOS SERVICIOS
document.addEventListener('DOMContentLoaded', function () {
    // Seleccionar todos los encabezados primer showAllservicesChange
    const headers = document.querySelectorAll('.services-list_header_zR0q6');
    headers.forEach(header => {
        header.addEventListener('click', function () {
            const targetId = header.getAttribute('data-target');
            const targetContent = document.getElementById(targetId);

            // Alternar la visibilidad del contenido
            if (targetContent.style.display === 'none') {
                targetContent.style.display = 'block';
            } else {
                targetContent.style.display = 'none';
            }
        });
    });

    // Seleccionar todos los encabezados showAllservicesAdd
    const headersAdd = document.querySelectorAll('.services-list_header_zR0q6Add');
    headersAdd.forEach(header => {
        header.addEventListener('click', function () {
            const targetId = header.getAttribute('data-target');
            const targetContent = document.getElementById(targetId);

            // Alternar la visibilidad del contenido
            if (targetContent.style.display === 'none') {
                targetContent.style.display = 'block';
            } else {
                targetContent.style.display = 'none';
            }
        });
    });
});
//CLIC EN TARJETA BLANCA AÑADIR SERVICIO PANTALLA AÑADIR SERVICIO
const tarjetaSecundaria = document.querySelector('.services_serviceInfo_iDMQwAdd');
if (tarjetaSecundaria) {
    tarjetaSecundaria.addEventListener('click', function (){

        toggleOffcanvas('offcanvasShowAllServicesChangeAdd', 'offcanvasAddServicesChange');
    });
}

//FUNCIÓN PARA METER TARJETA EN TARJETA BLANCA
function aniadirServicioHtml(colorBorde, nombre, duracion, precio, divContenedor, clase){
    let divContenedorTarjeta = document.querySelector(divContenedor);
    $(divContenedorTarjeta).empty();
    $(divContenedorTarjeta).append(`
        <div class="services_serviceWrapper_gug5x ">
            <div class="services_serviceDecorator_ldMxA" style="border-color:${colorBorde}">
            </div>
            <div class="${clase}">
                <div class="services_serviceName_YhbTW services_size--16-sb_M5xdn txt--ellipsis">
                    <span class="services_serviceName_YhbTW_span services_size--14_Mfwds">
                        ${nombre}
                    </span>
                    <span class="services_serviceDuration_Zb36z duration services_size--14_Mfwds">
                        ${duracion}min
                    </span>
                </div>
                <div class="services_servicePrice_wErzf services_size--16-sb_M5xdn">
                    ${precio} €
                </div>
            </div>
        </div>
    `);
    if(clase === 'services_serviceInfo_iDMQwAddCalendar'){
        const div = document.querySelector('.addServiceCalendar');
        // Si se encuentra el div, cambiamos la clase
        if (div) {
            div.classList.remove('addServiceCalendar'); // Eliminamos la clase antigua
            div.classList.add('addServiceCalendar66');    // Añadimos la nueva clase
            clicTarjetaModificarServicioIncialCalendar();
        }
    }
}

//CLIC TARJETA VERDE AÑADIR SERVICIO
document.addEventListener('DOMContentLoaded', function () {
    //seleccionar tarjetas serviciosAdd
    const targetServicesAdd = document.querySelectorAll('.services-list_serviceVariant_i9qZrAdd');
    if (targetServicesAdd) {
        targetServicesAdd.forEach(targetAdd => {
            // //console.log(selectedServiceIds);
            targetAdd.addEventListener('click', function () {
                let id_serviceChangeAdd = targetAdd.getAttribute('data-serviciochange');//id_servicio seleccionado
                var csrfToken = $('meta[name="csrf-token"]').attr("content");
                var url = "get-serviceById";
                // Hacer una petición AJAX al servidor
                $.ajax({
                    url: url, // Ruta que definimos en web.php
                    method: 'POST',
                    data: {
                        _token: csrfToken, // Token CSRF para seguridad
                        id_service: id_serviceChangeAdd,
                    },
                    success: function(data) {
                        if(data.encontrado){
                            // //console.log(data.servicio);
                            //añadimos la tarjeta al html
                            aniadirServicioHtml(data.servicio.borderColor, data.servicio.nombre, data.servicio.duration, data.servicio.precio, '.selectServiceAdd', 'services_serviceInfo_iDMQwAdd');

                            //añadimos atributo
                            document.querySelector('.selectServiceAdd').setAttribute('data-service', data.servicio.id);

                            //cambiamos hora fin poniendo la horainicio + lo que dura el servicio
                            let horaInicioAdd2 = document.querySelector('.slotHorasCobrarServicioAdd').textContent;
                            let divContenedorHoraFinAdd = document.querySelector('.slotHoraFinCorbrarServicioAdd');
                            let duracionCompleta =  data.servicio.duration.toString()+'min';
                            divContenedorHoraFinAdd.textContent = calcularHoraFin(horaInicioAdd2, duracionCompleta);

                            //cerramos offcanvasServicios y abrimos añadirServicio
                            toggleOffcanvas('offcanvasShowAllServicesChangeAdd', 'offcanvasAddServicesChange');

                            //comprobamos si campo vacío empleado para deshabilitar botón guardar
                            let visualizaNEmpleado = document.querySelector('.visualizadorNombreEmpleado');
                            visualizaNEmpleado.textContent === 'Selecciona Empleado' ? null : document.getElementById('uid-377-input').disabled = false;
                            // if(visualizaNEmpleado.textContent === 'Selecciona Empleado'){
                            // }else{
                            //     document.getElementById('uid-377-input').disabled = false;
                            // }

                            let eventoTemporalCalendario2 = document.querySelector('.fc-event.temporal2');
                            if(eventoTemporalCalendario2){
                               //console.log("CLIC TARJETAVERDE--hay temporaldos");

                                actualizarEvento(eventIdChangeCalendar, data.servicio.nombre, data.servicio.borderColor, '.fc-event.temporal2');
                                //tengo que cambiar colorBorde tambien
                                colorBordeNewReservCalendar = data.servicio.borderColor;
                            }else{
                                //console.log("CLIC TARJETAVERDE--NO hay temporaldos");
                                colorBordeNewReservCalendar = data.servicio.borderColor;
                            }
                        }
                    },
                    error: function(xhr) {
                        //console.log('Error al guardar el nombre de la categoria', xhr);
                    }
                });
                // //console.log(selectedServiceIds);
            });
        });
    }

    // CLIKC TARJETA VERDE MODIFIVAR SERVICIO INICIAL
    const targetServices = document.querySelectorAll('.services-list_serviceVariant_i9qZr');
    if (targetServices) {
        targetServices.forEach(target => {
            target.addEventListener('click', function (event) {
                event.preventDefault();
                let id_serviceChange = target.getAttribute('data-serviciochange');
                var csrfToken = $('meta[name="csrf-token"]').attr("content");
                var url = "get-serviceById";
                // Hacer una petición AJAX al servidor
                $.ajax({
                    url: url, // Ruta que definimos en web.php
                    method: 'POST',
                    data: {
                        _token: csrfToken, // Token CSRF para seguridad
                        id_service: id_serviceChange,
                    },
                    success: function(data) {
                        if(data.encontrado){
                            //cambio el data-id
                            let div_old_service = document.querySelector('.services_serviceWrapper_gug5x');
                            let id_serviceOld = div_old_service.getAttribute('data-idserviceadd');
                            removeServiceArray(id_serviceOld);
                            addServiceArray(data.servicio.id);
                            div_old_service.setAttribute('data-idserviceadd', data.servicio.id);
                            //eliminamos del array el viejo y añado el nuevo


                            //bordecolor
                            let borderColor = document.querySelector('.services_serviceDecorator_ldMxA');
                            let serviceName = document.querySelector('.services_serviceName_YhbTW');
                            let servicePrice = document.querySelector('.services_servicePrice_wErzf');

                            borderColor.style.borderColor = `${data.servicio.borderColor}`;
                            servicePrice.textContent = `${data.servicio.precio} €`;
                            $(serviceName).empty();
                            $(serviceName).append(`
                                ${data.servicio.nombre}
                                <span class="services_serviceDuration_Zb36z duration services_size--14_Mfwds">
                                    ${data.servicio.duration}min
                                </span>
                            `);
                            cambiarTotales(data.servicio.precio);
                            //poner hora acorde al nuevo servicio ponerHoraFinInicio(horaFin); calculateEndTime(dateTime, duration)
                            let horaInicio = obtenerHoraInicioInicio();
                            let horaFin = calculateEndTime(horaInicio, data.servicio.duration);

                            ponerHoraFinInicio(horaFin);
                            let eventoTemporalCalendario = document.querySelector('.fc-event.temporal');
                                if(eventoTemporalCalendario){
                                    // //console.log(eventoTemporalCalendario, "eventoTemporalCalendarioSeleccionaSErvicio");
                                    actualizarEvento(eventIdChangeCalendar, data.servicio.nombre, data.servicio.borderColor, '.fc-event.temporal');
                                    showDivBotonGuardarInfo('saveChangesFooterInfo');
                                    colorBordeNewReservCalendar = data.servicio.borderColor;
                                }
                            //cerramos offcanvas de servicios y abrimos info
                            let eventDetailsOffcanvas = bootstrap.Offcanvas.getInstance(document.getElementById('offcanvasShowAllServicesChange'));
                            if (eventDetailsOffcanvas) {
                                eventDetailsOffcanvas.hide();
                            }

                            // Abrir el offcanvas con id "offcanvasShowAllServicesChange"
                            const allServicesOffcanvas = new bootstrap.Offcanvas(document.getElementById('eventDetailsModal'));
                            allServicesOffcanvas.show();
                        }
                    },
                    error: function(xhr) {
                        //console.log('Error al guardar el nombre de la categoria', xhr);
                    }
                });
                // //console.log(selectedServiceIds, "contenido array");
            });
        });
    }
});

//FUNCION OBTENER HORAS PANTALLAINICIO
function obtenerHoraInicioInicio(){
    let divHoraInicioIcinial2 = document.querySelector('.getOldService');
    if (divHoraInicioIcinial2) {
        let horaIncioIncio = document.querySelector('.slotHorasCobrarServicio').textContent;
        return horaIncioIncio;
    }
}
function obtenerHoraFinInicio(){
    if(document.querySelector('.slotHoraFinCorbrarServicio')){
        let horaFinInicio = document.querySelector('.slotHoraFinCorbrarServicio').textContent;
        return horaFinInicio;
    }
}
function ponerHoraFinInicio(horaFin){
    if(document.querySelector('.slotHoraFinCorbrarServicio')){
        document.querySelector('.slotHoraFinCorbrarServicio').textContent = horaFin;
    }
}
function obtenerHoraInicioSecundaria(){
    let horaIncioSecundaria = document.querySelector('.slotHorasCobrarServicioAdd').textContent;
    return horaIncioSecundaria;
}
function obtenerHoraFinSecundaria(){
    let horaFinSecundaria = document.querySelector('.slotHoraFinCorbrarServicioAdd').textContent;
    return horaFinSecundaria;
}
function obtenerIdEmpleInicio(slotEmpleado){
    // //console.log(slotEmpleado, "slotEmpleado");
    slotEmpleado = slotEmpleado.trim();
    if(document.querySelector(slotEmpleado)){
        // //console.log(document.querySelector(slotEmpleado));

        return document.querySelector(slotEmpleado).getAttribute('data-empleado');
    }
}
function obtenerIdEmpleSecundario(slotEmpleado){
    if(document.querySelector(slotEmpleado)){
        return document.querySelector(slotEmpleado).getAttribute('data-empleid');
    }
}
function comprobarHorasServicioInicio(){
    let divContenedorServicioInicial = document.querySelector('.getOldService');//el servicio del inicio
    if (divContenedorServicioInicial) {
        let horaInicioComprobar = obtenerHoraInicioInicio();
        let horaFinComprobar = obtenerHoraFinInicio();
        let empleadoComprobar = obtenerIdEmpleInicio('.slotEmpleadoAddInicio');
        let firstService = servicesWithTimes[0]; // Obtener la primera posición del array

        // Comprobar si `horaInicio` y `horaFin` coinciden con las variables
        if (firstService.horaInicio !== horaInicioComprobar || firstService.horaFin !== horaFinComprobar || firstService.empleado !== empleadoComprobar) {
            // Actualizar `horaInicio` y `horaFin` si no coinciden
            firstService.horaInicio = horaInicioComprobar;
            firstService.horaFin = horaFinComprobar;
            firstService.empleado = empleadoComprobar;
        }
    }
}

//FUNCIÓN OBTENER HORAfIN DE TARJETAS GRANDES AL AÑADIR SERVICIO
function obtenerHoraFinUltimaPosicion(array) {
    if (array.length === 0) {
        return null; // O un valor predeterminado si el array está vacío
    }
    return array[array.length - 1].horaFin;
}

//FUNCIÓN OBTENER EMPLEADO POR ID
function obtenerEmpleById(id_empleado){
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var url = "get-empleadoById";
    // Hacer una petición AJAX al servidor
    $.ajax({
        url: url, // Ruta que definimos en web.php
        method: 'POST',
        data: {
            _token: csrfToken, // Token CSRF para seguridad
            empleado_id: id_empleado,
        },
        success: function(data) {
            if (data.empleado) {
                // //console.log(data.empleado);

            }
        },
        error: function(xhr) {
            //console.log('Error desde añadir pantalla principal', xhr);
        }
    });

}

//FUNCION METER HORAS ARRAY INICIO
function meterHorasArrayInicio(slotHoraIncio, slotHoraFin, slotEmpleadoIncio, seleccionaCliente_value, duracion){
   //obtener hora inicio fin y id servicio pantalla principal
    //let id_servicioNoModify = document.querySelector('.getOldService').getAttribute('data-idserviceadd');//el servicio del inicio
    setTimeout(() => {
        let horaIncioPantallaPrincipalNoModify = document.querySelector(slotHoraIncio).textContent;
        let horaFinPantallaPrincipalNoModify = document.querySelector(slotHoraFin).textContent;

        // //console.log(horaIncioPantallaPrincipalNoModify, horaFinPantallaPrincipalNoModify, "horas arrayInicio");
        let idEmpleada = obtenerIdEmpleInicio(slotEmpleadoIncio);
        selectedServiceIds.forEach(serviceId => {
            servicesWithTimes.push({
                id: serviceId,
                horaInicio: horaIncioPantallaPrincipalNoModify,
                horaFin: horaFinPantallaPrincipalNoModify,
                id_empleado: idEmpleada,
                seleccionaCliente: seleccionaCliente_value,
                duracion: duracion
            });
        });
        //reseteo el input seleccionaCliente
        let seleccionaCliente = document.getElementById('solicictaCliente');
        if(seleccionaCliente){
        seleccionaCliente.value= 0;
        }
        selectedServiceIds = [];
        // //console.log(servicesWithTimes, "METERhORASaRRAYiNCIO--sevicesWitTimes");
    }, 600);
}

function meterHorasArrayInicioNoTimeOut(slotHoraIncio, slotHoraFin, slotEmpleadoIncio, seleccionaCliente_value){
    //obtener hora inicio fin y id servicio pantalla principal
     //let id_servicioNoModify = document.querySelector('.getOldService').getAttribute('data-idserviceadd');//el servicio del inicio
    //  setTimeout(() => {
         let horaIncioPantallaPrincipalNoModify = document.querySelector(slotHoraIncio).textContent;
         let horaFinPantallaPrincipalNoModify = document.querySelector(slotHoraFin).textContent;
         let durationCalendar = calcularDuracion(horaIncioPantallaPrincipalNoModify, horaFinPantallaPrincipalNoModify);
         // //console.log(horaIncioPantallaPrincipalNoModify, horaFinPantallaPrincipalNoModify, "horas arrayInicio");
         let idEmpleada = obtenerIdEmpleInicio(slotEmpleadoIncio);
         selectedServiceIds.forEach(serviceId => {
             servicesWithTimes.push({
                 id: serviceId,
                 horaInicio: horaIncioPantallaPrincipalNoModify,
                 horaFin: horaFinPantallaPrincipalNoModify,
                 id_empleado: idEmpleada,
                 seleccionaCliente: seleccionaCliente_value,
                 duracion: durationCalendar
             });
         });
         //reseteo el input seleccionaCliente
         let seleccionaCliente = document.getElementById('solicictaCliente');
         if(seleccionaCliente){
         seleccionaCliente.value= 0;
         }
         selectedServiceIds = [];
        //  //console.log(servicesWithTimes, "servicesWihTime");
    //  }, 600);
 }

 function meterHorasArrayMultiple(serviceId, horaIncio, horaFin, idEmpleada, seleccionaCliente_value, duracion){
    servicesWithTimes.push({
        id: serviceId,
        horaInicio: horaIncio,
        horaFin: horaFin,
        id_empleado: idEmpleada,
        seleccionaCliente: seleccionaCliente_value,
        duracion: duracion
    });
 }

//FUNCIÓN PARA METER HORAS PANTALLA ADD SERVICIO
function meterHorasArraySecundaria(slothoraInicio, slotHoraFin, slotEmpleado, duracion){
    let horaIncioScreenAddService = document.querySelector(slothoraInicio).textContent.trim();
    let seleccionaCliente = document.getElementById('solicictaCliente').value;
    // if(infoArrayEnvio.length){
    //     seleccionaCliente =
    // }
    let horaFinScreenAddService = document.querySelector(slotHoraFin).textContent.trim();
    let idEmpleadaSecun = obtenerIdEmpleSecundario(slotEmpleado);
    // //console.log(horaIncioScreenAddService, seleccionaCliente, horaFinScreenAddService, idEmpleadaSecun, "METERhORASsECUNDARIAS--variables");

    selectedServiceIds.forEach(serviceId => {
            servicesWithTimes.push({
                id: serviceId,
                horaInicio: horaIncioScreenAddService,
                horaFin: horaFinScreenAddService,
                id_empleado:idEmpleadaSecun,
                seleccionaCliente: seleccionaCliente,
                duracion: duracion
            });
        });
        selectedServiceIds = [];
}

//FUNCIÓN PARA CREAR UN ARRAY CON ID SERVICIO Y SU INIHORA Y FINHORA
// function meterHorasEnArray(){
//     //obtener hora inicio fin y id servicio pantalla principal
//     let id_servicioNoModify = document.querySelector('.getOldService').getAttribute('data-idserviceadd');//el servicio del inicio
//     let horaIncioPantallaPrincipalNoModify = document.querySelector('.slotHorasCobrarServicio').textContent;
//     let horaFinPantallaPrincipalNoModify = document.querySelector('.slotHoraFinCorbrarServicio').textContent;

//     //obtener hora inicio fin y id pantalla añadir servicio
//     let id_servicioScreenAddService = document.querySelector('.selectServiceAdd').getAttribute('data-service');
//     let horaIncioScreenAddService = document.querySelector('.slotHorasCobrarServicioAdd').textContent;
//     let horaFinScreenAddService = document.querySelector('.slotHoraFinCorbrarServicioAdd').textContent;

//     // Estructura para almacenar servicios con horarios asignados
//     //console.log(id_servicioNoModify, id_servicioScreenAddService, "los ids");

//     // Recorrer el array de servicios seleccionados
//     let divContenedorServicioInicial = document.querySelector('.services_serviceWrapper_gug5x');
//     if(divContenedorServicioInicial){
//         //console.log("hay contenedor inicial");
//         selectedServiceIds.forEach(serviceId => {
//             if (serviceId == id_servicioNoModify) {
//                 servicesWithTimes.push({
//                     id: serviceId,
//                     horaInicio: horaIncioPantallaPrincipalNoModify,
//                     horaFin: horaFinPantallaPrincipalNoModify
//                 });
//             }
//             else if(serviceId == id_servicioScreenAddService){
//                 servicesWithTimes.push({
//                     id: serviceId,
//                     horaInicio: horaIncioScreenAddService,
//                     horaFin: horaFinScreenAddService
//                 });
//             }
//         });
//     }else{
//         //console.log("no hay contenedor");
//         selectedServiceIds.forEach(serviceId => {
//             if (serviceId == id_servicioScreenAddService) {
//                 servicesWithTimes.push({
//                     id: serviceId,
//                     horaInicio: horaIncioScreenAddService,
//                     horaFin: horaFinScreenAddService
//                 });
//             }
//         });
//     }
// }

//FUNCIÓN QUE DEVUELVE DURACIÓN FORMATEADA 09:00 - 10:00
function formatearDuracion(servicio_id){
    let duracion = "";
    // Buscamos en el array servicesWithTimes el objeto que coincida con el id del servicio actual
    const serviceTime = servicesWithTimes.find(time => time.id === servicio_id);

    // Si encontramos un servicio coincidente, construimos la duración en el formato "10:45 - 12:15"
    if (serviceTime && serviceTime.horaInicio && serviceTime.horaFin) {
        duracion = `${serviceTime.horaInicio} - ${serviceTime.horaFin}`;
    }
    return duracion;
}

//FUNCIÓN PARA COMPROBAR 60,30,90
function comprobar603090(servicio_duracion){
    let duracion2 = servicio_duracion; // Ejemplo: 60, 90, etc.

    // Convertir la duración
    let tiempoFormateada = duracion2 >= 60
        ? `${Math.floor(duracion2 / 60)}h ${duracion2 % 60 !== 0 ? duracion2 % 60 + 'min' : ''}`
        : `${duracion2}min`;
        return tiempoFormateada;
}
//FUNCIÓN PARA COMPROBAR 60,30,90
function comprobar603090SinM(servicio_duracion){
    let duracion2 = servicio_duracion; // Ejemplo: 60, 90, etc.

    // Convertir la duración
    let tiempoFormateada = duracion2 >= 60
        ? `${Math.floor(duracion2 / 60)}h ${duracion2 % 60 !== 0 ? duracion2 % 60 + 'm' : ''}`
        : `${duracion2}m`;
        return tiempoFormateada;
}

//FUNCION OBTENER INICIALES
function obtenerIniciales(nombre, apellido1) {
    // Obtener la primera letra de cada apellido y convertirla a mayúsculas
    let inicial1 = nombre.trim().charAt(0).toUpperCase();

    if(apellido1 == null){
        return inicial1;
    }else{
        let inicial2 = apellido1.trim().charAt(0).toUpperCase();
        return `${inicial1}${inicial2}`;
    }
}
function obtenerIniciales2(nombreApellido) {
    // Separar el nombre completo en un arreglo con el espacio como delimitador
    let partes = nombreApellido.trim().split(' ');

    // Obtener la primera letra del nombre y del apellido, y convertirlas a mayúsculas
    let inicial1 = partes[0].charAt(0).toUpperCase(); // Primera letra del nombre
    let inicial2 = partes[1].charAt(0).toUpperCase(); // Primera letra del apellido

    // Devolver las iniciales concatenadas
    return `${inicial1}${inicial2}`;
}

//FUNCIÓN CREAR HTML TARJETAS FINALES CLIC BOTON GUARDAR 10:00 - 02:00= duracionServicio, tiempoformateado 60,90,
function construirHtmlTarjetasFinales(borderColor, nombre, precio, duracionServicio, tiempoFormateada2, empleadoNombre, inicialesEmple, empleadoApellido, seleccionaCliente, id_evento = null){
    // let inicialesEmpleado = obtenerIniciales(empleadoNombre, empleApellido);
    // //console.log(seleccionaCliente, "SELECCIONAcLIENTE");
    let id_buton='';
    let atributo ='';
    if(id_evento){
        id_buton = id_evento;
        atributo = `data-index='${id_evento}'`;
    }
    let corazonSeleccionaCliente = '';
    if( parseInt(seleccionaCliente) === 1){
        corazonSeleccionaCliente = `
        <div class="padding-left-8">
            <img class="b-icon_img_I0kuC" src="${urlAplicacion}/storage/calendar/corazonRojoEmpleCliente.svg" data-testid="subbooking-staffer-is-requested" style="height: 15px;">
        </div>
        `;
    }
    let htmlContentTarjetaFinal = '';
    htmlContentTarjetaFinal= `
    <div class="subboking-drag-el">
         <div class="subbookings-list_card_j4UGY">
             <div class="margin-top-16 margin-bottom-16 index_booking_gZD1_">
                 <div class="index_details_QnFeq" style="max-height: 146px">
                     <div class="service_service_f0ki6">
                         <div class="service_border_sBKgz" style="border-color: ${borderColor};"></div>
                         <div class="service_name_kNYW0 service_size--16-sb_ZwJhS">
                             <div class="d-flex service_nameTitle_UOYvQ"> <span style="max-width: 6rem;" class="me-2 txt--ellipsis">${nombre}</span>  ${precio} € </div>
                             <button id="${id_buton}" ${atributo} onclick="showModifyService(this)" class="buttonEditEvent index_button_TfmOz index_size--md_G1gdK index_theme--default_AtMGF index_slotTheme--default_pktIt service_pointerAll_Kr2yW margin-left-16">
                                 <div class="index_caption_W6r_J"> Editar </div>
                             </button>
                         </div>
                         <p class="mb-0 service_duration_IOD4B service_size--14_Q5I2p"> ${duracionServicio} <strong>·</strong>&nbsp;
                             <span class="service_durationTime_WILLi">
                                 <span class="duration"> ${tiempoFormateada2} </span>
                             </span>
                         </p>
                     </div>
                     <div class="index_resourceRow_cOELM">
                         <div class="padding-right-8 b-resource_resource_kWRm8 b-resource_size-xs_Da3bZ">
                             <div class="b-avatar_avatar_pJzSu" style="width: 32px; height: 32px; flex: 0 0 32px;">
                                 <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px;"> ${inicialesEmple} </div>
                             </div>
                             <div class="padding-left-8">
                                 <div class="resource_resourceLabel_yIrJp resource_size--10_lMDC9"> Empleado </div>
                                 <div class="size--14"> ${empleadoNombre} ${empleadoApellido}</div>
                             </div>
                             ${corazonSeleccionaCliente}
                         </div>
                     </div>
                     <div class="drag-icon_dragIcon_R71aJ">
                         <span class="b-icon iconFont icon-drag-n-drop" style="font-size: 10px;"></span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 `;
 return htmlContentTarjetaFinal;
}

function showModifyService(botonServiceModify){
    // console.log(botonServiceModify, "botonServiceModify");

    let id_evento33 = botonServiceModify.getAttribute('data-index');
    let newReserv = botonServiceModify.getAttribute('data-new');
    let id_evento = id_evento33;
    idEventModify = '';
    idEventModify = id_evento;
    eventIdChangeCalendar = id_evento;
    // let events = calendar.getEvents();
    // let eventBorderColor = events.filter(event => event.id === id_evento);
    let borderColor = botonServiceModify.getAttribute('data-border');
    colorBordeNewReservCalendar = borderColor;
    // if(eventBorderColor.length){
    //     if(eventBorderColor[0].extendedProps.servicio){
    //         colorBordeNewReservCalendar = eventBorderColor[0].extendedProps.servicio.borderColor;
    //     }else{
    //         colorBordeNewReservCalendar = eventBorderColor[0].borderColor;
    //     }
    // }
    // console.log(colorBordeNewReservCalendar, "colorBordeNewReservCalendar");//color borde servicio a editar

    // if (document.querySelector('.newReservCalendar00')) {
    //     toggleOffcanvas('newReservCalendar', 'offcanvasAddServicesChange');
    // }
    if(newReserv === true || newReserv === 'true'){
        //console.log("new reserv");
        document.getElementById('uid-377-inputCalendar').classList.remove('index_is--disabled_w97Nq');

        if(document.querySelector('.allServicesAddCalendar00').classList.contains('allservicesModificarInicialCalendar')){
            document.querySelector('.allServicesAddCalendar00').classList.remove('allservicesModificarInicialCalendar');
        }else if(document.querySelector('.allServicesAddCalendar00').classList.contains('allservicesVistaOtroServicioCalendar')){
            document.querySelector('.allServicesAddCalendar00').classList.remove('allservicesVistaOtroServicioCalendar');
        }
        document.querySelector('.newReservCalendar00').style.display='none';
        document.querySelector('.allServicesAddCalendar00').style.display='none';
        document.querySelector('.allServicesAddCalendar00Add').style.display='block';

        document.querySelector('.buttonEditStrackModifyNewReserv').style.display= "flex";
        document.querySelector('.buttonSavetrackModifyNewReserv').style.display= 'none';

    }else{
        toggleOffcanvas('eventDetailsModal', 'offcanvasAddServicesChange');
        document.querySelector('.buttonEditStrack').style.display= "flex";
        document.querySelector('.buttonAddStrack').style.display= 'none';
        //console.log("NO new reserv");
    }
    // let botonesCreateReserv = document.querySelector('.buttonAddStrack');
    // botonesCreateReserv.style.display = 'none';
    // let botonesModifyService = document.querySelector('.buttonEditStrack');

    // botonesModifyService.style.display = 'flex';

    let event = calendar.getEventById(id_evento);
    //console.log(event, "event, botonEditar");
    // //console.log(events, "todos eventos, botonEditar");

    let eventosConTemporalDos = document.querySelectorAll('.temporal2');
    if(eventosConTemporalDos.length > 0){
        eventosConTemporalDos.forEach(evento => {
            if(!evento.classList.contains('temporal')){
                evento.classList.add('temporal');
            }
            evento.classList.remove('temporal2');
        });
    }
    event.setProp('classNames', (event.classNames || []).concat('temporal2'));

    //ponemos el título
    let posicion = infoArrayEnvio.findIndex(evento => evento.id === id_evento33);
     //console.log(posicion, "posicion");
    let divTitulo = '';
    if(newReserv === true || newReserv === 'true'){
        divTitulo = document.querySelector('.allServicesAddCalendar00Add .b-custom-header_headerTitle_ogW55');
    }else{
        divTitulo = document.querySelector('#offcanvasAddServicesChange .b-custom-header_headerTitle_ogW55');
    }
   let titulo = `
        <span class="b-custom-header_title_GTxIs b-custom-header_wordBreakAll_U_pxk totalServiciosAñadidos">Servicio #${posicion+1}</span>
    `;
    $(divTitulo).empty();
    $(divTitulo).append(titulo);

    //insertarmos tarjeta servicio
    if(event.extendedProps.servicio){
        // console.log("hay extemtrop servicio", event.extendedProps.servicio);
        if(newReserv === true || newReserv === 'true'){
            let duracion026 = event.extendedProps.duracion;
            if(duracion026){
                duracion026 = duracion026;
            }else{
                duracion026 = calcularDuracion(obtenerHoraEuropaCentral(event.start), obtenerHoraEuropaCentral(event.end));
            }
            //console.log(event.extendedProps.duracion, "event.extendedProps.duracion");

            aniadirServicioHtml(event.extendedProps.servicio.borderColor, event.extendedProps.servicio.nombre, duracion026, event.extendedProps.servicio.precio, '.selectServiceAddCalendar', 'services_serviceInfo_iDMQwAddCalendar');
            document.querySelector('.selectServiceAddCalendar').setAttribute('data-service', event.extendedProps.servicio.id);
        }else{
            aniadirServicioHtml(event.extendedProps.servicio.borderColor, event.extendedProps.servicio.nombre, event.extendedProps.duracion, event.extendedProps.servicio.precio, '.selectServiceAdd', 'services_serviceInfo_iDMQwAdd');
            document.querySelector('.selectServiceAdd').setAttribute('data-service', event.extendedProps.servicio.id);
        }
    }else{
        // console.log("NO HAY------ hay extemtrop servicio");
    }

    let imagen = '';
    if(newReserv === true || newReserv === 'true'){
        // idEventoEliminarEditarNewReserv = id_evento;
         //hora inicio fin
        document.querySelector('.slotHorasCobrarServicioAddCalendar').textContent = obtenerHoraEuropaCentral(event.start);
        document.querySelector('.slotHoraFinCorbrarServicioAddCalendar').textContent = obtenerHoraEuropaCentral(event.end);

        //empleado
        document.querySelector('.slotEmpleadoAddInicioCalendarAdd').textContent = event.extendedProps.empleada.nombre;
        document.querySelector('.slotEmpleadoAddInicioCalendarAdd').setAttribute('data-empleid', event.extendedProps.empleada.id);
        document.querySelector('.slotEmpleadoAddInicioCalendarAdd').setAttribute('data-empleado', event.extendedProps.empleada.id);
        imagen = document.querySelector('.solicitadoClientePantalla2');

        //ponemos el check a las horas inicio
        marcarHoraSeleccionada('.contenedorHorasInicioAddCalendar', obtenerHoraEuropaCentral(event.start));
        //ponemos el check a las horas fin
        marcarHoraSeleccionada('.contenedorHorasFinAddCalendar', obtenerHoraEuropaCentral(event.end));

    }else{
         //hora inicio fin
        document.querySelector('.slotHorasCobrarServicioAdd').textContent = obtenerHoraEuropaCentral(event.start);
        document.querySelector('.slotHoraFinCorbrarServicioAdd').textContent = obtenerHoraEuropaCentral(event.end);

        //empleado
        document.querySelector('.slotEmpleadoAdd').textContent = event.extendedProps.empleada.nombre;
        document.querySelector('.slotEmpleadoAdd').setAttribute('data-empleid', event.extendedProps.empleada.id);
        document.querySelector('.slotEmpleadoAdd').setAttribute('data-empleado', event.extendedProps.empleada.id);
        imagen = document.querySelector('.solicitadoClientePantallaInfoClientePantallaDos');
    }
    //corazon
    let seleccionaCliente='';
    //console.log(servicesWithTimes[posicion], "servicesWithTimes[posicion]");

    if(event.extendedProps.seleccionado_cliente){
        // console.log("hay extentrop selecciona_cliente", event.extendedProps.seleccionado_cliente);

        seleccionaCliente = event.extendedProps.seleccionado_cliente;
        //console.log("hay extentrop selecciona_cliente");
    }else{
        // console.log("no hay extentrop selecciona_cliente", servicesWithTimes[posicion]);

        seleccionaCliente = servicesWithTimes[posicion].seleccionaCliente;
        // //console.log("no hay extentrop selecciona_cliente");
        // seleccionaCliente =1;
    }
    if(seleccionaCliente === 1 || seleccionaCliente === '1'){
        imagen.src = urlAplicacion + "/storage/calendar/corazonRojoEmpleCliente.svg";
    }else{
        imagen.src = urlAplicacion + "/storage/calendar/heart-empty.svg";
    }
}

function eliminarTemporalDos(idEventModify){
    let eventRemoveTemporalDos = calendar.getEventById(idEventModify);
    // //console.log(eventRemoveTemporalDos, "eventRemoveTemporalDos");

    if (eventRemoveTemporalDos && eventRemoveTemporalDos.classNames) {
        // Eliminar la clase 'temporal2' del array classNames
        var index = eventRemoveTemporalDos.classNames.indexOf('temporal2');
        if (index !== -1) {
            eventRemoveTemporalDos.classNames.splice(index, 1); // Elimina la clase 'temporal2'
        }
        eventRemoveTemporalDos.setProp('classNames', eventRemoveTemporalDos.classNames); // Esto actualiza las clases en el DOM del evento
    }
    // //console.log(eventRemoveTemporalDos, "eventRemoveTemporalDos sin temporal");
}


// function marcarHoraSeleccionada(contenedorHoras, horaSeleccionada){
//     let ContenedorHorasInicio = document.querySelector(contenedorHoras);
//     // Eliminar selección previa
//     $(contenedorHoras + ' .index_--selected_oUDGp').removeClass('index_--selected_oUDGp');
//     $(contenedorHoras + ' .index_--highlighted__3J43').removeClass('index_--highlighted__3J43');

//     let horaInicioSeleccionada = ContenedorHorasInicio.querySelector(`[data-time="${horaSeleccionada}"]`);
//     $(horaInicioSeleccionada).addClass('index_--selected_oUDGp index_--highlighted__3J43');
// }

function marcarHoraSeleccionada(contenedorHoras, horaSeleccionada) {
    // Validar que horaSeleccionada tenga un valor válido
    if (!horaSeleccionada || horaSeleccionada.trim() === '') {
        console.warn('horaSeleccionada está vacía o no es válida');
        return;
    }

    let ContenedorHorasInicio = document.querySelector(contenedorHoras);
    if (!ContenedorHorasInicio) {
        console.warn('No se encontró el contenedor: ' + contenedorHoras);
        return;
    }

    // Eliminar selección previa
    $(contenedorHoras + ' .index_--selected_oUDGp').removeClass('index_--selected_oUDGp');
    $(contenedorHoras + ' .index_--highlighted__3J43').removeClass('index_--highlighted__3J43');

    // Buscar el elemento con la hora seleccionada
    let horaInicioSeleccionada = ContenedorHorasInicio.querySelector(`[data-time="${horaSeleccionada.trim()}"]`);

    if (horaInicioSeleccionada) {
        $(horaInicioSeleccionada).addClass('index_--selected_oUDGp index_--highlighted__3J43');
    } else {
        console.warn('No se encontró elemento con data-time=' + horaSeleccionada);
    }
}

function guardarEditNewReserv(){
const buttonModifyNewReserv = document.getElementById('uid-377-inputEditNewReserv');
if (buttonModifyNewReserv) {
    buttonModifyNewReserv.addEventListener('click', function () {
        // eliminarTemporalDos(idEventModify);

        let eventosConTemporalDos = document.querySelectorAll('.temporal2');
        if(eventosConTemporalDos.length > 0){
            eventosConTemporalDos.forEach(evento => {
                if(!evento.classList.contains('temporal')){
                    evento.classList.add('temporal');
                }
                evento.classList.remove('temporal2');
            });
        }
        // //console.log(infoArrayEnvio, "BOTONgUARDAR-- infoArrayEnvio");
        let idServivioAddTarjetaBlanca = document.querySelector('.selectServiceAddCalendar').getAttribute('data-service');
         // añadimos servicio nuevo al array
        //  //console.log(infoArrayEnvio, "infoArrayEnvio--event");//undefined


        //  if(!infoArrayEnvio.event){
        //     console.log("no hay infoArrayEnvio.event");
        //     selectedServiceIds=[];
        // }
        // selectedServiceIds.push(parseInt(idServivioAddTarjetaBlanca.trim(), 10));

        //index array a modificar
        let indexArrayModificarTex = document.querySelector('.allServicesAddCalendar00Add .totalServiciosAñadidos').textContent;
        let indexArrayModificar = indexArrayModificarTex.split('#')[1];
        indexArrayModificar = parseInt(indexArrayModificar) - 1;
        // console.log(indexArrayModificar,idServivioAddTarjetaBlanca, "indexArrayModificar idServicio a modificar");

        //console.log(servicesWithTimes,selectedServiceIds2, "servicesWithTimesModificado y ids2 NO MODIFICADO");
        modifyServiceByIndex(indexArrayModificar, parseInt(idServivioAddTarjetaBlanca.trim(), 10));
        // console.log(selectedServiceIds2, "ids2 modificado");

        modifyServicesWithTimesNewReservByIndex(indexArrayModificar);
        // console.log(servicesWithTimes, "servicesWithTimesModificado");

        //console.log(indexArrayModificar, "indexArrayModificar");
        // let events = calendar.getEvents();
        //console.log(servicesWithTimes,selectedServiceIds2, "servicesWithTimesModificado y ids2 modificado");


        //console.log(selectedServiceIds, selectedServiceIds2,  "BOTONgUARDARnewReserv--selectedServicesIds");
        getServicesById(selectedServiceIds2, function (servicios){
            let borderColor = document.querySelector('.selectServiceAddCalendar .services_serviceDecorator_ldMxA').style.borderColor;
            borderColor = borderColor.trim();
            let nombreServicio = document.querySelector('.selectServiceAddCalendar .services_serviceName_YhbTW_span').textContent;
            nombreServicio = nombreServicio.trim();
            let horaInicio = document.querySelector('.slotHorasCobrarServicioAddCalendar').textContent.trim();
            let horaFin = document.querySelector('.slotHoraFinCorbrarServicioAddCalendar').textContent.trim();
            let idEmpleado = document.querySelector('.slotEmpleadoAddInicioCalendarAdd').getAttribute('data-empleid').trim();
            let nombre_Empleado = document.querySelector('.slotEmpleadoAddInicioCalendarAdd').textContent.trim();
            let precioServicio1 = document.querySelector('.selectServiceAddCalendar .services_servicePrice_wErzf').textContent.trim();
            precioServicio1 = precioServicio1.replace('€', '');
            //console.log(eventoExtentropModificar, "evento a modificar con el nuevo servicio");
            document.querySelector('.newReservCalendar00').style.display = 'block';
            resetAddServiceScreen('.selectServiceAddCalendar', '.slotEmpleadoAddInicioCalendarAdd');
            document.querySelector('.allServicesAddCalendar00Add').style.display = 'none';

            let botonesCreateReserv = document.querySelector('.buttonSavetrackModifyNewReserv');
            botonesCreateReserv.style.display = 'flex';
            let botonesModifyService = document.querySelector('.buttonEditStrackModifyNewReserv');
            botonesModifyService.style.display = 'none';
            // toggleOffcanvas('offcanvasAddServicesChange', 'eventDetailsModal');

             //esconder el contenedor de las tarjetas para poner las nueva offcPrincipal
             let divTarjetasIniciales = document.querySelector('.tarjetasIncialesMostrarOcultarCalendar');
             // $(divVaciar).empty();
             divTarjetasIniciales.classList.add('d-none');
             let divTarjetasNuevas = document.querySelector('.nuevasTarjetasMostrarOcultarCalendar');
             let htmlContent = '';
             let totalPricePay=0;

            //obtenemos los empleados existeNombreClienteComun
            getAllEmpleados(function(empleadosReservas) {
                //modificar el extentrop del evento:
             let eventoExtentropModificar = calendar.getEventById(idEventModify);//idEventModify viene de showModifyService
             console.log(eventoExtentropModificar, "evento a modificar");
            if (eventoExtentropModificar.extendedProps && eventoExtentropModificar.extendedProps.servicio) {
                eventoExtentropModificar.extendedProps.servicio.borderColor = borderColor;
                eventoExtentropModificar.extendedProps.servicio.nombre = nombreServicio;
                eventoExtentropModificar.extendedProps.servicio.duracion = calcularDuracion(horaInicio, horaFin);
                eventoExtentropModificar.extendedProps.servicio.precio = precioServicio1;
                eventoExtentropModificar.extendedProps.servicio.id = idServivioAddTarjetaBlanca;
                eventoExtentropModificar.extendedProps.empleada.id = idEmpleado;
                eventoExtentropModificar.extendedProps.empleada.nombre = nombre_Empleado;
                eventoExtentropModificar.extendedProps.horaInicio = horaInicio;
                eventoExtentropModificar.extendedProps.horaFin = horaFin;
                //eliminar el evento de infoArrayEnvio y añadir el modificado
                let index = infoArrayEnvio.findIndex(item => item.id === idEventModify);

                if (index !== -1) {
                  // Reemplazamos el elemento en ese índice con el nuevo elemento
                  infoArrayEnvio.splice(index, 1, eventoExtentropModificar);
                }
            }else{
            //console.log("no hay eventoExtentrop");

            }
                let inicialesEmpleados = [];
                nombreEmpleadosArray = [];
                let apellidos = [];
                // Recorremos el array servicesWithTimes
                servicesWithTimes.forEach(service => {
                    // Buscamos el empleado correspondiente usando el id_empleado
                    let empleado = empleadosReservas.find(emp => emp.id === parseInt(service.id_empleado));
                    if (empleado) {
                        // Obtenemos las primeras dos letras del nombre del empleado
                        let iniciales = empleado.nombre.substring(0, 2).toUpperCase();
                        let nombre = empleado.nombre;
                        let apellido = empleado.primerApellido;
                        inicialesEmpleados.push(iniciales);
                        nombreEmpleadosArray.push(nombre);
                        apellidos.push(apellido);
                    }
                });

                //recorremos todos los serviciosEncontrados generar html tarjetas
                //iteramos a la misma vez por las horas haciendo coincidir los indices
                servicios.forEach((servicio, index) => {

                    // Convertir el precio a número flotante
                    let precioNumerico = parseFloat(servicio.precio);

                    // Sumar el precio del servicio al total
                    totalPricePay += precioNumerico;

                    // Comprobar si horaInicio es 0
                    let tiempoFormateada = comprobar603090(servicio.duration);

                    // Obtener la horaInicio y horaFin del elemento correspondiente en servicesWithTimes por índice
                    let apellido55 = apellidos[index];
                    let nombreEmpleado55 = nombreEmpleadosArray[index];
                    let inicialesEmpleado33 = inicialesEmpleados[index];
                    let servicioHorario = servicesWithTimes[index];
                    let seleccionaCliente = servicesWithTimes[index].seleccionaCliente;
                    let duracionServicio = servicioHorario
                        ? `${servicioHorario.horaInicio} - ${servicioHorario.horaFin}`
                        : "Horario no disponible";

                    // Construir HTML
                    htmlContent += construirHtmlTarjetasFinales(
                        servicio.borderColor,
                        servicio.nombre,
                        servicio.precio,
                        duracionServicio,
                        tiempoFormateada,
                        nombreEmpleado55,
                        inicialesEmpleado33,
                        apellido55,
                        seleccionaCliente
                    );
                });
                // Agregar todo el contenido generado al contenedor nuevo
                $(divTarjetasNuevas).empty();
                $(divTarjetasNuevas).append(htmlContent);

                //cambiar el precio en pantalla principal
                addHtmlDivPrecioFinal(totalPricePay, '#newReservCalendar p[data-testid="appointment-price2"]', '#newReservCalendar div[data-testid="appointment-to-be-paid2"]');

               //añadir los idesEventos a los botones
                let tarjetasServiciosMultiples = document.querySelectorAll('.subbookings-list_card_j4UGY');
                tarjetasServiciosMultiples.forEach((tarjeta, index) => {
                    boton = tarjeta.querySelector('.buttonEditEvent');
                    boton.setAttribute('data-index', eventIdChangeCalendarArray[index]);
                    boton.setAttribute('data-border', colorBordeReservArray[index]);
                    boton.setAttribute('data-new', true);
                });
                console.log(servicesWithTimes, infoArrayEnvio, "guardarModificado servicesTime y inofArrayEmvio");
            });
        });

    });
}
}
guardarEditNewReserv();

const buttonModifyReserv = document.getElementById('uid-377-inputEditReserv');
if (buttonModifyReserv) {
    buttonModifyReserv.addEventListener('click', function () {
        // eliminarTemporalDos(idEventModify);

        let eventosConTemporalDos = document.querySelectorAll('.temporal2');
        if(eventosConTemporalDos.length > 0){
            eventosConTemporalDos.forEach(evento => {
                evento.classList.add('temporal');
                evento.classList.remove('temporal2');
            });
        }

         // loaderWite();
        // //console.log(infoArrayEnvio, "BOTONgUARDAR-- infoArrayEnvio");
        let idServivioAddTarjetaBlanca = document.querySelector('.selectServiceAdd').getAttribute('data-service');
         // añadimos servicio nuevo al array
        //  //console.log(infoArrayEnvio, "infoArrayEnvio--event");//undefined


         if(!infoArrayEnvio.event){
            // //console.log("no hay infoArrayEnvio.event");
            selectedServiceIds=[];
        }
        selectedServiceIds.push(parseInt(idServivioAddTarjetaBlanca.trim(), 10));

        //index array a modificar
        let indexArrayModificarTex = document.querySelector('.totalServiciosAñadidos').textContent;
        let indexArrayModificar = indexArrayModificarTex.split('#')[1];
        indexArrayModificar = parseInt(indexArrayModificar) - 1;

        modifyServiceByIndex(indexArrayModificar, parseInt(idServivioAddTarjetaBlanca.trim(), 10));
        modifyServicesWithTimesByIndex(indexArrayModificar);
        //console.log(indexArrayModificar, "indexArrayModificar");
        // let events = calendar.getEvents();
        //console.log(servicesWithTimes, "servicesWithTimesModificado");


        //console.log(selectedServiceIds," , ", selectedServiceIds2,  "BOTONgUARDAR--selectedServicesIds");
        getServicesById(selectedServiceIds2, function (servicios){
             //modificar el extentrop del evento:
             let eventoExtentropModificar = calendar.getEventById(idEventModify);
             // //console.log(event, "evento a modificar");
                 if (eventoExtentropModificar.extendedProps && eventoExtentropModificar.extendedProps.servicio) {
                     let borderColor = document.querySelector('.selectServiceAdd .services_serviceDecorator_ldMxA').style.borderColor;
                     borderColor = borderColor.trim();
                     let nombreServicio = document.querySelector('.selectServiceAdd .services_serviceName_YhbTW_span').textContent;
                     nombreServicio = nombreServicio.trim();
                     let horaInicio = document.querySelector('.slotHorasCobrarServicioAdd').textContent.trim();
                     let horaFin = document.querySelector('.slotHoraFinCorbrarServicioAdd').textContent.trim();
                     let idEmpleado = document.querySelector('.slotEmpleadoAdd').getAttribute('data-empleid').trim();
                     let nombre_Empleado = document.querySelector('.slotEmpleadoAdd').textContent.trim();
                     let precioServicio1 = document.querySelector('.selectServiceAdd .services_servicePrice_wErzf').textContent.trim();
                     precioServicio1 = precioServicio1.replace('€', '');
                     eventoExtentropModificar.extendedProps.servicio.borderColor = borderColor;
                     eventoExtentropModificar.extendedProps.servicio.nombre = nombreServicio;
                     eventoExtentropModificar.extendedProps.servicio.duracion = calcularDuracion(horaInicio, horaFin);
                     eventoExtentropModificar.extendedProps.servicio.precio = precioServicio1;
                     eventoExtentropModificar.extendedProps.servicio.id = idServivioAddTarjetaBlanca;
                     eventoExtentropModificar.extendedProps.empleada.id = idEmpleado;
                     eventoExtentropModificar.extendedProps.empleada.nombre = nombre_Empleado;
                     eventoExtentropModificar.extendedProps.horaInicio = horaInicio;
                     eventoExtentropModificar.extendedProps.horaFin = horaFin;
                   }else{
                    //console.log("no hay eventoExtentrop");

                   }
                   //console.log(eventoExtentropModificar, "evento a modificar con el nuevo servicio");
            resetAddServiceScreen('.selectServiceAdd', '.slotEmpleadoAdd ');
            let botonesCreateReserv = document.querySelector('.buttonAddStrack');
            botonesCreateReserv.style.display = 'flex';
            let botonesModifyService = document.querySelector('.buttonEditStrack');
            botonesModifyService.style.display = 'none';
            toggleOffcanvas('offcanvasAddServicesChange', 'eventDetailsModal');

             //esconder el contenedor de las tarjetas para poner las nueva offcPrincipal
             let divTarjetasIniciales = document.querySelector('.subbookings-list_container_nMAxs .tarjetasIncialesMostrarOcultar');
             // $(divVaciar).empty();
             divTarjetasIniciales.classList.add('d-none');
             let divTarjetasNuevas = document.querySelector('.subbookings-list_container_nMAxs .nuevasTarjetasMostrarOcultar');
             let htmlContent = '';
             let totalPricePay=0;

            //obtenemos los empleados existeNombreClienteComun
            getAllEmpleados(function(empleadosReservas) {
                let inicialesEmpleados = [];
                nombreEmpleadosArray = [];
                let apellidos = [];
                // Recorremos el array servicesWithTimes
                servicesWithTimes.forEach(service => {
                    // Buscamos el empleado correspondiente usando el id_empleado
                    let empleado = empleadosReservas.find(emp => emp.id === parseInt(service.id_empleado));
                    if (empleado) {
                        // Obtenemos las primeras dos letras del nombre del empleado
                        let iniciales = empleado.nombre.substring(0, 2).toUpperCase();
                        let nombre = empleado.nombre;
                        let apellido = empleado.primerApellido;
                        inicialesEmpleados.push(iniciales);
                        nombreEmpleadosArray.push(nombre);
                        apellidos.push(apellido);
                    }
                });

                //recorremos todos los serviciosEncontrados generar html tarjetas
                //iteramos a la misma vez por las horas haciendo coincidir los indices
                servicios.forEach((servicio, index) => {

                    // Convertir el precio a número flotante
                    let precioNumerico = parseFloat(servicio.precio);

                    // Sumar el precio del servicio al total
                    totalPricePay += precioNumerico;

                    // Comprobar si horaInicio es 0
                    let tiempoFormateada = comprobar603090(servicio.duration);

                    // Obtener la horaInicio y horaFin del elemento correspondiente en servicesWithTimes por índice
                    let apellido55 = apellidos[index];
                    let nombreEmpleado55 = nombreEmpleadosArray[index];
                    let inicialesEmpleado33 = inicialesEmpleados[index];
                    let servicioHorario = servicesWithTimes[index];
                    let seleccionaCliente = servicesWithTimes[index].seleccionaCliente;
                    let duracionServicio = servicioHorario
                        ? `${servicioHorario.horaInicio} - ${servicioHorario.horaFin}`
                        : "Horario no disponible";

                    // Construir HTML
                    htmlContent += construirHtmlTarjetasFinales(
                        servicio.borderColor,
                        servicio.nombre,
                        servicio.precio,
                        duracionServicio,
                        tiempoFormateada,
                        nombreEmpleado55,
                        inicialesEmpleado33,
                        apellido55,
                        seleccionaCliente
                    );
                });
                // Agregar todo el contenido generado al contenedor nuevo
                $(divTarjetasNuevas).empty();
                $(divTarjetasNuevas).append(htmlContent);

                //cambiar el precio en pantalla principal
                addHtmlDivPrecioFinal(totalPricePay, '#eventDetailsModal p[data-testid="appointment-price"]', '#eventDetailsModal div[data-testid="appointment-to-be-paid"]');

               //añadir los idesEventos a los botones
                let tarjetasServiciosMultiples = document.querySelectorAll('.subbookings-list_card_j4UGY');
                tarjetasServiciosMultiples.forEach((tarjeta, index) => {
                    boton = tarjeta.querySelector('.buttonEditEvent');
                    boton.setAttribute('data-index', eventIdChangeCalendarArray[index]);
                    boton.setAttribute('data-border', colorBordeReservArray[index]);
                    boton.setAttribute('data-new', false);
                });
            });
        });

        //console.log(servicesWithTimes, infoArrayEnvio, "guardarModificado servicesTime y inofArrayEmvio");
    });
}


//FUNCIÓN QUE AÑADE DIV PRECIO FINAL OFFCANVAS INICIAL
function addHtmlDivPrecioFinal(totalPagar, divTotal, divApagar){
    const priceElement = document.querySelector(divTotal);//TOTAL
    let priceTobePay =  document.querySelector(divApagar);// A PAGAR
    if (priceElement) {
        priceElement.textContent= totalPagar.toFixed(2).replace('.', ',')+' €';
        $(priceTobePay).empty();
        let htmlTobePay = `
            <p style="margin:0px;" class="b-paragraph-m b-text-secondary"> A pagar </p>
            <p class="totalPagarNewReservCalendar b-heading-xl" style="font-weight: 700"> ${totalPagar.toFixed(2).replace('.', ',')} € </p>
        `;
        $(priceTobePay).append(htmlTobePay);
    }

}
function meterIdEmpleadoEnArray(arrayCompletoTodosDatos){
    //console.log(arrayCompletoTodosDatos, arrayCompletoTodosDatos.length,"array enviado a función");
    let ids_empleados = [];
    // Recorremos el array con un bucle for
    for (let i = 0; i < arrayCompletoTodosDatos.length; i++) {
        ids_empleados.push(arrayCompletoTodosDatos[i].id_empleado);
    }

    //console.log(ids_empleados, "ids empleados con foreach");
    return ids_empleados;
}



function getEmpleadosById(arrayCompleto, callback){
    //console.log(arrayCompleto, "array completo peticion ajax de empleados");
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var url = "obtener-empleadosByIds";
    // Hacer una petición AJAX al servidor
    $.ajax({
        url: url, // Ruta que definimos en web.php
        method: 'POST',
        data: {
            _token: csrfToken, // Token CSRF para seguridad
            ids_empleados: arrayCompleto,
        },
        success: function(response) {
            const empleadosReservas = response.empleados;

            //console.log(empleadosReservas, "empleados by id");
            // Ejecutar el callback con los datos
            callback(empleadosReservas);
        },
        error: function(xhr) {
            console.error("Error en la solicitud AJAX");
        }
    });
}

function getAllEmpleados(callback){
    // //console.log(arrayCompleto, "array completo peticion ajax de empleados");
var csrfToken = $('meta[name="csrf-token"]').attr("content");
var url = "obtener-allEmpleados";
// Hacer una petición AJAX al servidor
$.ajax({
    url: url, // Ruta que definimos en web.php
    method: 'POST',
    data: {
        _token: csrfToken, // Token CSRF para seguridad
    },
    success: function(response) {
        const empleadosReservas = response.empleadosAll;

        // //console.log(empleadosReservas, "empleados by id");

        // Ejecutar el callback con los datos
        callback(empleadosReservas);
    },
    error: function(xhr) {
        console.error("Error en la solicitud AJAX");
    }
});
}

//funcion marcar notificaciones como revisadas para no mostrar
function marcarTodasNotificacionRevisada(callback){
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var url = "marcar-notificacionRevisadaTodas";
    // Hacer una petición AJAX al servidor
    $.ajax({
        url: url, // Ruta que definimos en web.php
        method: 'POST',
        data: {
            _token: csrfToken, // Token CSRF para seguridad
        },
        success: function(response) {
           const marcadas = response.marcadas;
           callback(marcadas);
        },
        error: function(xhr) {
            //console.log('Error desde añadir pantalla principal', xhr);
        }
    });
}

function marcarNotificacionById(id_reserva, callback){
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var url = "marcar-notificacionRevisadaById";
    // Hacer una petición AJAX al servidor
    $.ajax({
        url: url, // Ruta que definimos en web.php
        method: 'POST',
        data: {
            _token: csrfToken, // Token CSRF para seguridad
            id_reserva: id_reserva,
        },
        success: function(response) {
           const marcada = response.marcada;
           const reserva = response.reserva;
           callback(reserva, marcada);
        },
        error: function(xhr) {
            //console.log('Error al marcar la notificacion como comprobada', xhr);
        }
    });
}


function getServicesById(arrayIdServicios, callback){
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var url = "get-serviceByIdArray";
    // Hacer una petición AJAX al servidor
    $.ajax({
        url: url, // Ruta que definimos en web.php
        method: 'POST',
        data: {
            _token: csrfToken, // Token CSRF para seguridad
            id_serviceArray: arrayIdServicios,
        },
        success: function(response) {
           const servicios = response.serviciosEncontrados;
           callback(servicios);
        },
        error: function(xhr) {
            //console.log('Error desde añadir pantalla principal', xhr);
        }
    });
}

function obtenerInicialesNombreYmeterEnArray() {
    let inicialesEmpleados = [];

    // Llamamos a getAllEmpleados para obtener la lista de empleados
    getAllEmpleados(function(empleadosReservas) {
        // Recorremos el array servicesWithTimes
        servicesWithTimes.forEach(service => {
            // Buscamos el empleado correspondiente usando el id_empleado
            let empleado = empleadosReservas.find(emp => emp.id === parseInt(service.id_empleado));

            if (empleado) {
                // Obtenemos las primeras dos letras del nombre del empleado
                let iniciales = empleado.nombre.substring(0, 2).toUpperCase();
                inicialesEmpleados.push(iniciales);
            }
        });

        // Aquí puedes hacer algo con el array de iniciales de empleados
        //console.log(inicialesEmpleados, "INICIALES EMPLEADOS");  // Muestra el array con las iniciales
        return inicialesEmpleados;
    });
}


//CLIC EN BOTON GUARDAR CAMBIOS ADDSERVICE
const buttonAddServiceAdd = document.getElementById('uid-377-input');
if (buttonAddServiceAdd) {
    buttonAddServiceAdd.addEventListener('click', function (event) {
        event.preventDefault();
        let eventosConTemporalDos = document.querySelectorAll('.temporal2');
        if(eventosConTemporalDos.length > 0){
            eventosConTemporalDos.forEach(evento => {
                evento.classList.add('temporal');
                evento.classList.remove('temporal2');
            });
        }
        //guardo el id del evento creado al asignar el empleado
        eventIdChangeCalendarArray.push(eventIdChangeCalendar);
        colorBordeReservArray.push(colorBordeNewReservCalendar);
        let idServivioAddTarjetaBlanca = document.querySelector('.selectServiceAdd').getAttribute('data-service');
        // //console.log(servicesWithTimes, "Guardar--servicesWithTimes");
        // //console.log(eventIdChangeCalendarArray, "Guardar--eventIdChangeCalendarArray");


        // añadimos servicio nuevo al array
        if(!infoArrayEnvio.event){
            selectedServiceIds=[];
        }
        // //console.log(selectedServiceIds, "BOTONgUARDAR--selectedServicesIds");
        // //console.log(idServivioAddTarjetaBlanca, "botonGuardar--idServivioAddTarjetaBlanca");

        addServiceArray(parseInt(idServivioAddTarjetaBlanca.trim(), 10));
        getServicesById(selectedServiceIds2, function (servicios){
            // //console.log(servicios, "servicios en el callback");

            // //console.log(selectedServiceIds, "BOTONgURARDAR--selectedServicesIds antes");
           let duracion = convertirAHorasMinutos(document.querySelector('.selectServiceAdd .services_serviceDuration_Zb36z').textContent);
           meterHorasArraySecundaria('.slotHorasCobrarServicioAdd', '.slotHoraFinCorbrarServicioAdd', '.slotEmpleadoAdd', duracion);

           if(servicesWithTimes.length <=1){
                comprobarHorasServicioInicio();
            }

           resetAddServiceScreen('.selectServiceAdd', '.slotEmpleadoAdd ');
            //cerrrar ofcanvas addservice abrir infopagar(principal)
            toggleOffcanvas('offcanvasAddServicesChange', 'eventDetailsModal');

             //esconder el contenedor de las tarjetas para poner las nueva offcPrincipal
             let divTarjetasIniciales = document.querySelector('.subbookings-list_container_nMAxs .tarjetasIncialesMostrarOcultar');
             // $(divVaciar).empty();
             divTarjetasIniciales.classList.add('d-none');
             let divTarjetasNuevas = document.querySelector('.subbookings-list_container_nMAxs .nuevasTarjetasMostrarOcultar');
             let htmlContent = '';
             let totalPricePay=0;

            //obtenemos los empleados existeNombreClienteComun
            getAllEmpleados(function(empleadosReservas) {
                let inicialesEmpleados = [];
                nombreEmpleadosArray = [];
                let apellidos = [];
                // Recorremos el array servicesWithTimes
                servicesWithTimes.forEach(service => {
                    // Buscamos el empleado correspondiente usando el id_empleado
                    let empleado = empleadosReservas.find(emp => emp.id === parseInt(service.id_empleado));
                    if (empleado) {
                        // Obtenemos las primeras dos letras del nombre del empleado
                        let iniciales = empleado.nombre.substring(0, 2).toUpperCase();
                        let nombre = empleado.nombre;
                        let apellido = empleado.primerApellido;
                        inicialesEmpleados.push(iniciales);
                        nombreEmpleadosArray.push(nombre);
                        apellidos.push(apellido);
                    }
                });

                //recorremos todos los serviciosEncontrados generar html tarjetas
                //iteramos a la misma vez por las horas haciendo coincidir los indices
                servicios.forEach((servicio, index) => {

                    // Convertir el precio a número flotante
                    let precioNumerico = parseFloat(servicio.precio);

                    // Sumar el precio del servicio al total
                    totalPricePay += precioNumerico;

                    // Comprobar si horaInicio es 0
                    let tiempoFormateada = comprobar603090(servicio.duration);

                    // Obtener la horaInicio y horaFin del elemento correspondiente en servicesWithTimes por índice
                    let apellido55 = apellidos[index];
                    let nombreEmpleado55 = nombreEmpleadosArray[index];
                    let inicialesEmpleado33 = inicialesEmpleados[index];
                    let servicioHorario = servicesWithTimes[index];
                    let seleccionaCliente = servicesWithTimes[index].seleccionaCliente;
                    let duracionServicio = servicioHorario
                        ? `${servicioHorario.horaInicio} - ${servicioHorario.horaFin}`
                        : "Horario no disponible";

                    // Construir HTML
                    htmlContent += construirHtmlTarjetasFinales(
                        servicio.borderColor,
                        servicio.nombre,
                        servicio.precio,
                        duracionServicio,
                        tiempoFormateada,
                        nombreEmpleado55,
                        inicialesEmpleado33,
                        apellido55,
                        seleccionaCliente
                    );
                });
                // Agregar todo el contenido generado al contenedor nuevo
                $(divTarjetasNuevas).empty();
                $(divTarjetasNuevas).append(htmlContent);

                //cambiar el precio en pantalla principal
                addHtmlDivPrecioFinal(totalPricePay, '#eventDetailsModal p[data-testid="appointment-price"]', '#eventDetailsModal div[data-testid="appointment-to-be-paid"]');
                // //console.log(servicesWithTimes, "servicios con tiempo");
                if(infoArrayEnvio.event){

                    eliminarEventosTemporales('eventoTemporal_');
                    // mostrarEventosArrayNewReservCalendar('.fechaCitaInfo');
                    mostrarEventosArrayMejorado('.fechaCitaInfo');
                }else{
                    // eliminarEventosTemporales('eventoTemporal_');
                    // //console.log("mas de dos");
                }
                 //añadir los idesEventos a los botones
                 let tarjetasServiciosMultiples = document.querySelectorAll('.subbookings-list_card_j4UGY');
                 if(tarjetasServiciosMultiples.length > 0){
                    tarjetasServiciosMultiples.forEach((tarjeta, index) => {
                        boton = tarjeta.querySelector('.buttonEditEvent');
                        boton.setAttribute('data-index', eventIdChangeCalendarArray[index]);
                        boton.setAttribute('data-border', colorBordeReservArray[index]);
                        boton.setAttribute('data-new', false);
                    });
                 }
            });
        });
        // //console.log(servicesWithTimes, infoArrayEnvio, "servicesWi y infoArrayEnvio botón guardar");

    });
}


function resetAddServiceScreen(divContenedor, slotNombreEmpleado){
    let slotNombre = document.querySelector(slotNombreEmpleado);
    if(slotNombre){
        // //console.log(slotNombre, "existe slotNombre");

        let existeDataEmpleado = slotNombre.getAttribute('data-empleado');
        let existeDateEmpleadoId = slotNombre.getAttribute('data-empleid');
        if(existeDataEmpleado || existeDateEmpleadoId){
            // //console.log("existe empleado");
            slotNombre.textContent="Selecciona empleado";
            slotNombre.removeAttribute('data-empleado');
            slotNombre.setAttribute('data-empleid', 'cualquiera');
        }else{
            // //console.log("no existe empleado");

        }
    }else{
        // //console.log("no existe slotNOmbre");

    }
    let divSelectedServiceAdd = document.querySelector(divContenedor);
    // //console.log(divContenedor, "contenedor en RESET");
    let tieneAtributo = divSelectedServiceAdd.getAttribute('data-service');
    if(tieneAtributo){
        divSelectedServiceAdd.removeAttribute('data-service');
    }
    $(divSelectedServiceAdd).empty();
    let htmlAddserviceReset = `
    <div class="services-wrapper_serviceEmpty_pbusk">
        Seleccionar servicio
        <span class="b-icon iconFont icon-arrow-right services-wrapper_serviceArrow_h8V47"></span>
    </div>
    `;
    $(divSelectedServiceAdd).append(htmlAddserviceReset);
}

//CLICAR EN "SELECCIONAR OTRO SERVICIO"
let botonAddServiceAdd = document.querySelector('.selectServiceAdd');
if (botonAddServiceAdd) {
    botonAddServiceAdd.addEventListener('click', function () {
        // //console.log(selectedServiceIds);
        // //console.log(servicesWithTimes, "servicios con tiempo");
        toggleOffcanvas('offcanvasAddServicesChange', 'offcanvasShowAllServicesChangeAdd');
    });

}

//FUNCIÓN QUE ABRE Y CIERRA OFCANVAS
function toggleOffcanvas(closeId, openId) {
    // Cerrar el offcanvas especificado por closeId
    const closeOffcanvas = bootstrap.Offcanvas.getInstance(document.getElementById(closeId));
    if (closeOffcanvas) {
        closeOffcanvas.hide();
    }

    // Abrir el offcanvas especificado por openId
    const openOffcanvas = new bootstrap.Offcanvas(document.getElementById(openId));
    openOffcanvas.show();
}

// CLICK TARJETA INICIAL MANEJA APERTURA SHOWALLSERVICES MODIFICAR SERVICIO INICIAL
const serviceInfoClosedDetailsModal = document.querySelector('.services_serviceInfo_iDMQw');
if (serviceInfoClosedDetailsModal) {
    serviceInfoClosedDetailsModal.addEventListener('click', function () {
        //console.log("entramos en los servicios");

        toggleOffcanvas('eventDetailsModal', 'offcanvasShowAllServicesChange');
    });
}

// MANEJA CIERRE SHOWALLSERVICES
const exitShowAllServices = document.querySelectorAll('.exitShowAllServicesChange');
exitShowAllServices.forEach(service => {
    service.addEventListener('click', function () {
        let eventosConTemporalDos = document.querySelectorAll('.temporal2');
        if(eventosConTemporalDos.length > 0){
            eventosConTemporalDos.forEach(evento => {
                evento.classList.add('temporal');
                evento.classList.remove('temporal2');
            });
        }


        // showDivClienInfo('basket-customer-card0101Info');
        // document.getElementById('clienteDetails').style.display = 'none';
        // document.querySelector('.basket-customer-card0101Info').style.display = 'block';
        // insertartarjetaSeleccionaCliente('.basket-customer-card0101Info', 'card_empty_info');

        resetAddServiceScreen('.selectServiceAdd', '.slotEmpleadoAddInicioCalendarAdd');
        cerrarTodosLosOffcanvas();
        //quitar 1 al contador de servicios
        let totalServicios = selectedServiceIds2.length;
        let divTotalServicios = document.querySelector('.totalServiciosAñadidos');
        divTotalServicios.textContent = `Servicio #${totalServicios}`;
        let visualizaNEmpleado = document.querySelector('.visualizadorNombreEmpleado');
        visualizaNEmpleado.textContent = 'Selecciona Empleado';
        visualizaNEmpleado.setAttribute('data-empleid', 'cualquiera');
        visualizaNEmpleado.setAttribute('data-empleado', 'cualquiera');
        // Método 1: Usando filter para crear un nuevo array sin el elemento
        infoArrayEnvio = infoArrayEnvio.filter(item => item.id !== eventIdChangeCalendar);
        eliminarEventoCalendario(eventIdChangeCalendar);
        eventIdChangeCalendar='';
        abrirOffcanvas('eventDetailsModal');
        let botonesGuardarModificacion = document.querySelector('.buttonEditStrack');
        if(botonesGuardarModificacion){
            botonesGuardarModificacion.style.display='none';
            document.querySelector('.buttonAddStrack').style.display='flex';
        }
        // console.log(servicesWithTimes.length,eventIdChangeCalendar, eventosConTemporalDos, "serviceWtimes.leng eventIdChangeCalendar");
        // console.log(servicesWithTimes, infoArrayEnvio,selectedServiceIds, selectedServiceIds2,colorBordeReservArray,eventIdChangeCalendarArray, "flecha atras servicesTime y infoarayEnvio, eventIdChangeCalendarArray");
        // console.log("------------------------------");
    });
});

const cancelShowAllServices = document.getElementById('uid-376-input');
if(cancelShowAllServices){
    cancelShowAllServices.addEventListener('click', function () {
        resetAddServiceScreen('.selectServiceAdd', '.slotEmpleadoAddInicioCalendarAdd');
        cerrarTodosLosOffcanvas();
        //quitar 1 al contador de servicios
        let totalServicios = selectedServiceIds2.length;
        let divTotalServicios = document.querySelector('.totalServiciosAñadidos');
        divTotalServicios.textContent = `Servicio #${totalServicios}`;
        let visualizaNEmpleado = document.querySelector('.visualizadorNombreEmpleado');
        visualizaNEmpleado.textContent = 'Selecciona Empleado';
        abrirOffcanvas('eventDetailsModal');
    });
}


// var totalServiciosReservados;
//MANEJA BOTÓN AÑADIR SERVICIO
const ShowAddServices = document.getElementById('uid-319-inputAniadirServicio');//boton añadir servicio
if (ShowAddServices) {
    ShowAddServices.addEventListener('click', function () {
        //deshabilitar botón guardar
        document.querySelectorAll('.temporal2').forEach(function(element) {
            element.classList.remove('temporal2');
            element.classList.add('temporal');
        });
        document.getElementById("uid-377-input").disabled = true;
        eventIdChangeCalendar = '';
        //abrir y cerrar ofcanvas
        toggleOffcanvas('eventDetailsModal', 'offcanvasAddServicesChange');

        let totalServicios = selectedServiceIds2.length + 1;
        let divTotalServicios = document.querySelector('.totalServiciosAñadidos');
        divTotalServicios.textContent = `Servicio #${totalServicios}`;

        //ponemos hora inicio con 30 minutos de separación y hora fin
        let horaInicio='';

         let imagen = document.querySelector('.solicitadoClientePantallaInfoCliente');
        if(servicesWithTimes.length >= 2){
            //obtener última posicion array
            horaInicio = servicesWithTimes[servicesWithTimes.length - 1].horaFin;
        }else if(servicesWithTimes.length === 0){
            //console.log("es igual a cero");

            let serleccionaClienteValor = obtenerValorCorazon('.solicitadoClientePantallaInfoCliente');

            let duracion = calcularDuracion(document.querySelector('.slotHorasCobrarServicio').textContent, document.querySelector('.slotHoraFinCorbrarServicio').textContent);
            meterHorasArrayInicio('.slotHorasCobrarServicio', '.slotHoraFinCorbrarServicio', '.slotEmpleadoAddInicio', serleccionaClienteValor, duracion);
            horaInicio = obtenerHoraFinInicio();


        }else{
            //console.log("es igual a uno");

             //comprobar si camvio corazon servicio inicial
             setTimeout(() => {
                // Comprobar si 'src' contiene 'corazonRojo'
                if (imagen && imagen.src.includes('corazonRojo')) {
                    servicesWithTimes[0].seleccionaCliente = 1;
                } else {
                    servicesWithTimes[0].seleccionaCliente = 0;
                }
                servicesWithTimes[0].horaInicio = obtenerHoraInicioInicio();
                servicesWithTimes[0].horaFin = obtenerHoraFinInicio();
                //comprobar si cambio empleado servicio inicial
                servicesWithTimes[0].id_empleado = document.querySelector('.slotEmpleadoAddInicio').getAttribute('data-empleado');
             }, 400);
             horaInicio = obtenerHoraFinInicio();
             //cojer hora fin pantalla anterior y ponerla de inicio allServicesAddCalendar00Add
        }
        document.querySelector('.slotHoraFinCorbrarServicioAdd').textContent = calcularHoraFin(horaInicio, '30min');
        document.querySelector('.slotHorasCobrarServicioAdd').textContent = horaInicio;
    });
}

//ABRIR CERRAR COMBO CAMBIO ESTATUS
function openCloseComboStatus() {
    let botonAbrirComboStatus = document.querySelector('.botonAbrirComboStatus');
    let combo = document.querySelector('.comboStatusReserv');
    if (botonAbrirComboStatus) {
        $(botonAbrirComboStatus).off('click').on('click', function(event) {
            event.preventDefault();
            // //console.log("clic combo status");
            if (combo.style.display === 'none' || combo.style.display === '') {
                combo.style.display = 'block'; // Mostrar el combo
            } else {
                combo.style.display = 'none'; // Ocultar el combo
            }
        });
    }
}
openCloseComboStatus();
//PONER CLASE SEGUN STATUS EN DIV CABECERA INFO SERVICIO
function setClass(status, div){
    const headerInfoService = document.querySelector(div);
    let comunClass = 'headerInfoService offcanvas-header align-items-center d-flex position-relative header_header_T53u1';
    // Establece las clases dinámicamente
    if (status === 'pending') {
        headerInfoService.className = 'reservaPendiente '+ comunClass;
        document.querySelector('.reservStatus').textContent = 'Pendiente';
        let reservPendindTitle = document.querySelector('.reservStatus');
        $(reservPendindTitle).append(`
            <span class="tocaCampanita" style="font-size: small;text-transform: initial;">
                (Toca la campanita para cambiar el estado)
            </span>
        `);
    }
    else if (status === 'Finalizada') {
        headerInfoService.className = 'reservaFinalizada '+ comunClass;
        document.querySelector('.reservStatus').textContent = 'Finalizado';
    } else if (status === 'cancelled') {
        headerInfoService.className = 'bg-danger text-white '+ comunClass;
        document.querySelector('.reservStatus').textContent = 'Cancelado';
    } else if (status === 'no_asistida') {
        headerInfoService.className = 'bg-warning text-black '+ comunClass;
        document.querySelector('.reservStatus').textContent = 'Inasistencia';
    } else if (status === 'confirmed') {
        headerInfoService.className = 'bg-success text-white '+comunClass;
        document.querySelector('.reservStatus').textContent = 'Confirmado';
    }
     else {
        // Clase por defecto si no coincide ningún estado
        headerInfoService.className = 'headerInfoService purify_Ks8Q8dHEaaaFeDYdNtADtw==';
    }
}

// funcion mensajes alerta
function insertMessageResolAction(mensaje, divContenedor, style, type){
    let divDondeInsertar = document.querySelector(divContenedor);
    let iconType='';
    let classes ='';
    if(type === 'error'){
        iconType = ` <i style="font-size: 30px" class="fa fa-exclamation-triangle text-danger me-3 align-self-center" aria-hidden="true"></i>`;
        classes = `alert-success-dark`;
    }else if(type === 'ok'){
        iconType = `<i style="font-size: 30px" class="fa fa-check-circle text-success me-3 align-self-center" aria-hidden="true"></i>`;
        classes = `alert-success-green`;
    }
    let mensajeInsertar = `
    <div class="" style=" ${style}">
        <div style="" class="slideLeft alert ${classes} d-flex rounded-3" role="alert">
            ${iconType}
            <div class="text-content">
                <div class="notification-header">
                    <button style="right: 12px" type="button" class=" position-absolute btn-close btn-sm ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div style="top: 10px" class="notification-body position-relative"> ${mensaje}</div>
            </div>
        </div>
    </div>
    `;
    $(divDondeInsertar).append(mensajeInsertar);
}


//CANCELAR RESERVA DESDE OPCION DESPLEGABLE
function actionPresButon(butonAction){
    // //console.log(butonAction, "accion del botón");
    let idOffcanvasBig = document.getElementById('eventDetailsModal');
    let idReserva = idOffcanvasBig.getAttribute('data-idReserv');
    if(butonAction === 'cancelarCitaOption'){
        $('#modalCancelarReservaAdmin').modal('show');
        let cancelledButon = document.querySelector('.cancelledReservButton2030');
        if(cancelledButon){
            cancelledButon.addEventListener('click', function () {
                let valoresCancelacion = obtenerValoresCancelacion();

                $('#modalCancelarReservaAdmin').modal('show');
                let loader = document.querySelector('#loaderSperaAdministrator');
                loader.classList.remove('d-none');

                let csrfToken = $('meta[name="csrf-token"]').attr("content");
                let url = "cancelled-reserva";
                // Hacer una petición AJAX al servidor
                $.ajax({
                    url: url, // Ruta que definimos en web.php
                    method: 'POST',
                    data: {
                        _token: csrfToken, // Token CSRF para seguridad
                        id_reserva: idReserva,
                        responsablecancelacion: valoresCancelacion.responsableNombre,
                        motivoCancelacion: valoresCancelacion.motivoCancelacion,
                        idResponsable: valoresCancelacion.responsableId
                    },
                    success: function(data) {
                        if(data.cancelada){
                            cerrarTodosLosOffcanvas();
                            //inicializamos el calendario
                            initializeCalendar();

                            let stylos = 'position: absolute;right: 5rem;top: 16px;z-index: 9;';
                            insertMessageResolAction('Reserva cancelada con éxito', '.cal-wrapper', stylos, 'ok');
                        }
                    },
                    error: function(xhr) {
                        // //console.log('Error al obtener las horas', xhr);
                    }
                });
            });
        }
    }else if(butonAction === 'faltaCliente'){
        //console.log(butonAction, "falta cliente");
        let csrfToken = $('meta[name="csrf-token"]').attr("content");
        let url = "inasistencia-cliente";
        // Hacer una petición AJAX al servidor
        $.ajax({
            url: url, // Ruta que definimos en web.php
            method: 'POST',
            data: {
                _token: csrfToken, // Token CSRF para seguridad
                id_reserva: idReserva,
                // responsablecancelacion: valoresCancelacion.responsableNombre,
                // motivoCancelacion: valoresCancelacion.motivoCancelacion,
                // idResponsable: valoresCancelacion.responsableId
            },
            success: function(data) {
                if(data.creada){
                    cerrarTodosLosOffcanvas();
                    //inicializamos el calendario
                    initializeCalendar();

                    let stylos = 'position: absolute;right: 5rem;top: 16px;z-index: 9;';
                    insertMessageResolAction('Inasistencia del cliente guarda', '.cal-wrapper', stylos, 'ok');
                }
            },
            error: function(xhr) {
                // //console.log('Error al obtener las horas', xhr);
            }
        });

    }

}
function obtenerValoresCancelacion() {
    let motivoCancelacion = document.getElementById("motivoCancelacion001").value;
    let inputSelectResponsable = document.querySelector('#reseponsableCancelacion001Selected .vscomp-hidden-input');
    let DivnombreResponsable = document.querySelector('#reseponsableCancelacion001Selected .vscomp-value');
    let nombreResponsable = DivnombreResponsable.getAttribute('data-tooltip');
      return {
        motivoCancelacion: motivoCancelacion,
        responsableNombre: nombreResponsable,
        responsableId: inputSelectResponsable.value
      };
}

//CANCELAR RESERVA DESDE NOTIFICATIONS CARD
function cancelledReservB(boton){
    // Muestra el loader
    // Muestra el spinner
    let loader = document.querySelector('#loaderSperaAdministrator');
    loader.classList.remove('d-none'); // Asegúrate de que el spinner no esté oculto


    // Obtener la fecha de la reserva del atributo `data-fecha`
    const fechaReserva = boton.getAttribute('data-fecha');
    const idReservaCancelled = boton.getAttribute('data-idReserv');
    const divReserva = document.querySelector(`.cardAll[data-idReserva="${idReservaCancelled}"]`);
    const redPoindReservDelete = document.querySelector(`.redPoinNewReserv[data-reservredpoindid="${idReservaCancelled}"]`);
    //eliminar evento del offcanvas
    if (divReserva) {
        divReserva.remove();
    }
    if(redPoindReservDelete){
        redPoindReservDelete.remove();
    }
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var url = "cancelled-reserva";
    // Hacer una petición AJAX al servidor
    $.ajax({
        url: url, // Ruta que definimos en web.php
        method: 'POST',
        data: {
            _token: csrfToken, // Token CSRF para seguridad
            id_reserva: idReservaCancelled
        },
        success: function(data) {
            if(data.cancelada){
                //cambiamos el número de la campanita
                // Selecciona el elemento <a> con la clase "notificationNewReserv"
                const notificationLink = document.querySelector('.notificationNewReserv');

                // Accede al último elemento <b> dentro de "notificationNewReserv"
                const lastBElement = notificationLink.querySelector('b:last-of-type');

                // Luego, accede al <span> dentro del último <b> si existe
                const spanInsideLastB = lastBElement ? lastBElement.querySelector('span') : null;

                if (spanInsideLastB) {
                    // Realiza las acciones que necesites con el <span>
                    // //console.log(spanInsideLastB.textContent);
                    spanInsideLastB.textContent = data.pendingCount;
                }

                //inicializamos el calendario
                initializeCalendar();
                // Mover el calendario a la fecha de la reserva usando `gotoDate`
                setTimeout(() => {
                    if (calendar) {
                        calendar.gotoDate(fechaReserva);
                    } else {
                        console.error("El calendario no está inicializado.");
                    }
                }, 500);
    // loader.classList.add('d-none');

            }
        },
        error: function(xhr) {
            // //console.log('Error al obtener las horas', xhr);
        }
    });

}

function getReservaById(id_reserva){
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var url = "get-reservaById";
    // Hacer una petición AJAX al servidor
    $.ajax({
        url: url, // Ruta que definimos en web.php
        method: 'POST',
        data: {
            _token: csrfToken, // Token CSRF para seguridad
            id_reserva_: id_reserva
        },
        success: function(data) {
            if(data.confirmada){
                // spanInsideLastB.textContent = data.pendingCount;
            }
        },
        error: function(xhr) {
            // //console.log('Error al obtener las horas', xhr);
        }
    });
}

function comfirmReservB(boton){
    let loader = document.querySelector('#loaderSperaAdministrator');
    loader.classList.remove('d-none'); // Asegúrate de que el spinner no esté oculto
    // Obtener la fecha de la reserva del atributo `data-fecha`
    const fechaReserva = boton.getAttribute('data-fecha');
    const idReservaPendiente = boton.getAttribute('data-idReserv');
    const divReserva = document.querySelector(`.cardAll[data-idReserva="${idReservaPendiente}"]`);
    const redPoindReservDelete = document.querySelector(`.redPoinNewReserv[data-reservredpoindid="${idReservaPendiente}"]`);
    //eliminar evento del offcanvas
    if (divReserva) {
        divReserva.remove();
    }
    if(redPoindReservDelete){
        redPoindReservDelete.remove();
    }
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var url = "confirmar-reserva";
    // Hacer una petición AJAX al servidor
    $.ajax({
        url: url, // Ruta que definimos en web.php
        method: 'POST',
        data: {
            _token: csrfToken, // Token CSRF para seguridad
            id_reserva: idReservaPendiente
        },
        success: function(data) {
            if(data.confirmada){
                //cambiamos el número de la campanita
                // Selecciona el elemento <a> con la clase "notificationNewReserv"
                const notificationLink = document.querySelector('.notificationNewReserv');

                // Accede al último elemento <b> dentro de "notificationNewReserv"
                const lastBElement = notificationLink.querySelector('b:last-of-type');

                // Luego, accede al <span> dentro del último <b> si existe
                const spanInsideLastB = lastBElement ? lastBElement.querySelector('span') : null;

                if (spanInsideLastB) {
                    // Realiza las acciones que necesites con el <span>
                    // //console.log(spanInsideLastB.textContent);
                    spanInsideLastB.textContent = data.pendingCount;
                }
                //inicializamos el calendario
                initializeCalendar();
                // Mover el calendario a la fecha de la reserva usando `gotoDate`
                setTimeout(() => {
                    if (calendar) {
                        calendar.gotoDate(fechaReserva);

                    } else {
                        console.error("El calendario no está inicializado.");
                    }
                }, 500);
            }
        },
        error: function(xhr) {
            // //console.log('Error al obtener las horas', xhr);
        }
    });
}
        // });
    // });
    // if (citasTab.style.display !== 'none') {

    // }
// });
function showReservPending() {
    let divTarjetasReservasPendientesOffcanvas = document.getElementById('showReservPendingDiv');
    $(divTarjetasReservasPendientesOffcanvas).empty();

    fetch('check-pending-reservations') // Ruta que revisa si hay reservas pendientes
        .then(response => response.json())
        .then(data => {
            if (data.pending) {
                data.reservas.forEach(reserva => {
                    // Verificar si el servicio es "Dibujos a mano alzada"
                    let cardClass = "card cardAll"; // Clase predeterminada
                    let textColorStyle = ""; // Estilo predeterminado (sin color blanco)

                    if (reserva.servicio.nombre === "Dibujos a mano alzada") {
                        // Si es "Dibujos a mano alzada", quitar bg-danger-subtle y cambiar el texto a blanco
                        cardClass = "card cardAll"; // Sin la clase bg-danger-subtle
                        textColorStyle = "color: white;"; // Estilo para el texto blanco
                    }
                    let botonConfirmar = '';
                    if(reserva.status === 'pending'){
                        botonConfirmar = `
                            <button style="border: 1px solid #c7cbd4 !important;" onclick="comfirmReservB(this)" data-bs-dismiss="offcanvas" class="bg-white confirmar-cita btn btn-light" data-idReserv="${reserva.id}" data-fecha="${reserva.date_time.split(' ')[0]}">Confirmar</button>
                        `;
                    }

                    let botonShowInfoCliente= '';
                    let imgeClient='';
                    if(reserva.user && reserva.user.profile_photo_url){
                        imgeClient=`
                            <img class="rounded-circle imgCabecera" width="35" height="35" src="${reserva.user.profile_photo_url}" alt="${reserva.user.name}" />
                        `;
                        botonShowInfoCliente = `
                            <button onclick="showClientInfo(${reserva.user.id})" class="btn btn-dark" style="min-width: 80px" data-idClient="${reserva.user.id}" data-idReserv="${reserva.id}" data-fecha="${reserva.date_time.split(' ')[0]}">Cliente</button>
                        `;
                    }
                    // Construir el HTML de cada tarjeta de reserva pendiente
                    let tarjetaReserva = `
                        <div class="${cardClass}" data-idReserva="${reserva.id}">
                            ${imgeClient}
                            <div class="card-body">
                                <div class="text-section" style="align-content: center;">
                                    <h5 class="card-title" style="${textColorStyle}">${reserva.servicio.nombre}</h5>
                                    <p class="card-text" style="${textColorStyle}">${formatDate(reserva.date_time)} de ${formatTime(reserva.date_time)} a ${calculateEndTime(reserva.date_time, reserva.duration)}</p>
                                </div>
                                <div class="cta-section">
                                    <button type="button" class="btn btn-light bg-white b-button_theme--danger_EEM01" onclick="deleteNotification(${reserva.id})" style="min-width: 80px;border: 1px solid #c7cbd4 !important;">
                                        <span class="b-icon iconFont icon-trash" style="font-size: 23px;"></span>
                                    </button>
                                    ${botonConfirmar}
                                    <button onclick="cancelledReservB(this)" data-bs-dismiss="offcanvas" class="b-button_theme--danger_EEM01 btn btn-light bg-white" style="min-width: 80px;border: 1px solid #c7cbd4 !important;"" data-idReserv="${reserva.id}" data-fecha="${reserva.date_time.split(' ')[0]}">Cancelar</button>
                                    ${botonShowInfoCliente}
                                </div>
                            </div>
                        </div>
                    `;
                    // Insertar la tarjeta en el div
                    divTarjetasReservasPendientesOffcanvas.insertAdjacentHTML('beforeend', tarjetaReserva);
                });
            }else{
                divTarjetasReservasPendientesOffcanvas.innerHTML = '<p class="text-center">No hay reservas pendientes.</p>';
            }

        })
        .catch(error => console.error("Error al verificar reservas pendientes:", error));
}

function showClientInfo(id_cliente) {
    //console.log(id_cliente); // El id es correcto

    // Llamamos a la función para obtener el cliente por su ID
    getClientById(id_cliente).then(function(cliente) {
        //console.log(cliente); // Ahora puedes acceder al cliente correctamente

        // Actualiza los campos del modal con la información del cliente
        document.getElementById('clientName').textContent = cliente.name || 'No disponible';
        document.getElementById('clientEmail').textContent = cliente.email || 'No disponible';
        document.getElementById('clientPhone').textContent = cliente.telefono || 'No disponible';

        // Si estás usando Bootstrap, puedes usar el siguiente código para mostrar el modal
        var myModal = new bootstrap.Modal(document.getElementById('clientInfoModal'));
        myModal.show(); // Abre el modal
    }).catch(function(error) {
        //console.log("Error:", error); // Maneja el caso de error
    });
}


// function obtenerNombreEmpleInicio(){
//     if (document.querySelector('.slotEmpleadoAddInicio')) {
//         return document.querySelector('.slotEmpleadoAddInicio').textContent;
//     }
// }
function ponerNomIdEmpleInicio(nombreEmple, id_empleado){
    let slotNomEmpleInic = document.querySelector('.slotEmpleadoAddInicio');
    if (slotNomEmpleInic) {
        slotNomEmpleInic.setAttribute('data-empleado', id_empleado);
        slotNomEmpleInic.setAttribute('data-empleid', id_empleado);
        slotNomEmpleInic.innerHTML = nombreEmple;
    }
}
function formatearFeAnio(fechaCompleta) {
    const fecha = new Date(fechaCompleta);
    const año = fecha.getFullYear();
    const mes = String(fecha.getMonth() + 1).padStart(2, '0'); // Los meses comienzan desde 0
    const día = String(fecha.getDate()).padStart(2, '0');

    return `${año}-${mes}-${día}`;
}

// Ejemplo de uso
// const fechaEjemplo = "Fri Dec 13 2024 09:00:00 GMT+0100 (hora estándar de Europa central)";
// //console.log(convertirFechaAFormatoISO(fechaEjemplo)); // "2024-12-13"

function formatDate3(fecha) {
    const date = new Date(fecha);
    const anio = date.getFullYear();
    const mes = String(date.getMonth() + 1).padStart(2, '0'); // Mes es 0-indexado
    const dia = String(date.getDate()).padStart(2, '0');
    const horas = String(date.getHours()).padStart(2, '0');
    const minutos = String(date.getMinutes()).padStart(2, '0');
    const segundos = String(date.getSeconds()).padStart(2, '0');
    return `${anio}-${mes}-${dia} ${horas}:${minutos}:${segundos}`;
}
// Ejemplo de uso
// const fecha = "Fri Dec 13 2024 09:00:00 GMT+0100 (hora estándar de Europa central)";
// //console.log(formatearFecha(fecha)); // Salida: "2024-12-13 09:00:00"

function formatearFecha4(fecha, horaInicio) {
    // Convertir la fecha a un objeto Date
    const date = new Date(fecha);

    // Extraer el año, mes, y día de la fecha
    const anio = date.getFullYear();
    const mes = String(date.getMonth() + 1).padStart(2, '0'); // Mes es 0-indexado
    const dia = String(date.getDate()).padStart(2, '0');

    // Usar la horaInicio proporcionada, formateada como 'HH:MM'
    const [hora, minuto] = horaInicio.split(":");

    // Construir la cadena final en formato 'YYYY-MM-DD HH:MM:SS'
    return `${anio}-${mes}-${dia} ${hora}:${minuto}:00`;
}
// Ejemplo de uso
// const fecha = "Fri Dec 13 2024 09:00:00 GMT+0100 (hora estándar de Europa central)";
// const horaInicio = "09:00";
// //console.log(formatearFecha(fecha, horaInicio));   Salida: "2024-12-13 09:00:00"



function convertirAHorasMinutos(cadena) {
    // Inicializamos las variables de horas y minutos
    let horas = 0;
    let minutos = 0;

    // Buscamos y extraemos la cantidad de horas (si existe)
    const regexHoras = /(\d+)\s*h/;
    const matchHoras = cadena.match(regexHoras);
    if (matchHoras) {
        horas = parseInt(matchHoras[1]);
    }

    // Buscamos y extraemos la cantidad de minutos (si existe)
    const regexMinutos = /(\d+)\s*min/;
    const matchMinutos = cadena.match(regexMinutos);
    if (matchMinutos) {
        minutos = parseInt(matchMinutos[1]);
    }

    // Convertimos todo a minutos y devolvemos el total
    return (horas * 60) + minutos;
}
// Ejemplos de uso
////console.log(convertirAHorasMinutos("1h 30min")); 90

// Función para dar formato a la fecha
function formatDate(dateTime) {
    // //console.log(dateTime, "formatDate");

    const date = new Date(dateTime);
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString('es-ES', options);
}
formatDate();
function formatDate2(dateTime) {
    const date = new Date(dateTime);
    const options = {
        weekday: 'short', // Día de la semana abreviado
        day: 'numeric',   // Día del mes
        month: 'short'    // Mes abreviado
    };
    return date.toLocaleDateString('es-ES', options);
}

// Función para dar formato a la hora de inicio
//formato de entrada:"2024-12-18 09:00:00".
//formato de salida:"09:00".
function formatTime(dateTime) {
    const date = new Date(dateTime);
    return date.toLocaleTimeString('es-ES', { hour: '2-digit', minute: '2-digit' });
}

/**
 * Calcula la hora de fin de un servicio.
 *
 * @param {string} dateTime - Formato1:"09:00", Formato2:"2024-12-18 09:00:00".
 * @param {number} duration - Foramto: 60.
 * @returns {string} Formato: "11:45".
 */
function calculateEndTime(dateTime, duration) {
    let date;
    // Verificar si el formato es solo "HH:mm"
    if (/^\d{2}:\d{2}$/.test(dateTime)) {
        const [hours, minutes] = dateTime.split(':').map(Number);
        date = new Date();
        date.setHours(hours, minutes, 0, 0); // Establece la hora y minutos en la fecha actual
    } else {
        // Asume que es un formato de fecha completa
        date = new Date(dateTime);
    }
    // Sumar la duración en minutos
    date.setMinutes(date.getMinutes() + duration);
    return date.toLocaleTimeString('es-ES', { hour: '2-digit', minute: '2-digit' });
}

/**
 * Devuelve la fecha que se muestra en el flatPicker info reserva.
 *
 * @param {string} dateTime - Formato:"Fri Mar 14 2025 09:00:00 GMT+0100 (hora estándar de Europa central)".
 * @returns {string} Formato: "vie. 14 mar".
 */
function formatDateForFlatpickr(dateTime) {
    if (dateTime) {
        //objeto Date
        const date = new Date(dateTime);
        if (isNaN(date)) return "Fecha no válida";

        // Configuración para el formato "D, d M."
        const options = { weekday: 'short', day: '2-digit', month: 'short' };
        const formattedDate = date.toLocaleDateString('es-ES', options).replace(',', '.');
        return formattedDate;
    }
    return "Fecha inválida";
}

/**
 * Realiza una solicitud AJAX para obtener la disponibilidad de los empleados
 * en un horario y fecha específicos, llama a función que se encarga de mostrar visualmente la disponivilidad.
 * Formato de "disponibilidadEmpleados:
 * -disponible:true
 * -empleado:"África"
 * -fecha_hora_reserva:"2025-03-14T13:10:00.000000Z"
 * -idEmpleado:1"
 * @param {string} inicioServicio - Formato: "11:45".
 * @param {string} duracion - Formato:"30".
 * @param {string} diaSeleccionado - Formato:"2025-03-14".
 * @param {string} id_despleableSelecEmpleado_almohadilla - Formato:"#selectEmpleModalAddInicioCalendar".
*/
function peticionAjaxDisponibleEmpleados(inicioServicio, duracion, diaSeleccionado, id_despleableSelecEmpleado_almohadilla){
    let csrfToken = $('meta[name="csrf-token"]').attr("content");
    let empleadas_disponibles = "empleadas-disponibles";
    $.ajax({
        url: empleadas_disponibles,
        method: 'POST',
        data: {
            _token: csrfToken,
            horaInicioReserva: inicioServicio,
            duracionReserva: duracion,
            fechaReserva: diaSeleccionado
        },
        success: function(response) {
            const disponibilidadEmpleados = response.disponibilidadEmpleados;
            // //console.log(disponibilidadEmpleados);

            actualizarDisponibilidadEmpleadosCalendar(disponibilidadEmpleados, id_despleableSelecEmpleado_almohadilla);
        },
        error: function(xhr) {
            //console.log('Error al obtener las horas', xhr);
        }
    });
}

/**
 * Obtiene los datos de un cliente a partir de su ID.
 * Realiza una solicitud AJAX, devuelve promesa que resuelve con los datos del cliente o rechaza si no se encuentra.
 *
 * @param {string} id_cliente - El ID del cliente a buscar.
 * @returns {Promise<Object>} Una resuelta con datos del cliente.
 */
function getClientById(id_cliente) {
    return new Promise(function(resolve, reject) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var url = "get-clienteById";
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: csrfToken,
                id_cliente_: id_cliente
            },
            success: function(data) {
                if(data.encontrado) {
                    // //console.log(data.cliente, "devolución ajax");
                    resolve(data.cliente);
                } else {
                    reject("Cliente no encontrado");
                }
            },
            error: function(xhr) {
                //console.log('Error al obtener cliente', xhr);
                reject(xhr); // Rechazamos la promesa en caso de error
            }
        });
    });
}

/**
 * Solicitud AJAX para obtener todos los clientes .
 * Retorna una promesa que se resuelve con los datos de los clientes
 *
 * @returns {Promise<Object>} Una promesa que se resuelve con un objeto que contiene:
 * - `clientes` (Array): Un array con la lista de clientes obtenidos.
 * - `iniciales` (Array): Un array con las iniciales de los clientes.Formato: "AP"
 *
 * @throws {string} Si no se encuentran clientes, la promesa se rechaza con un mensaje de error.
 * @throws {Object} Si ocurre un error en la solicitud AJAX, la promesa se rechaza con el objeto de error.
 */
function getAllClients() {
    return new Promise(function(resolve, reject) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var url = "get-allClient";
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: csrfToken,
            },
            success: function(data) {
                if(data.encontrado) {
                    //console.log(data.clientesAll, "CLIENTES ALL", data.iniciales);
                    resolve({clientes: data.clientesAll, iniciales: data.iniciales});
                } else {
                    reject("Cliente no encontrado"); // Rechazamos si no se encuentra el cliente
                }
            },
            error: function(xhr) {
                //console.log('Error al obtener cliente', xhr);
                reject(xhr); // Rechazamos la promesa en caso de error
            }
        });
    });
}

/**
 * Pestaña clientes. Obtiene todos los clientes y sus iniciales, luego actualiza el contenedor HTML con los datos.
 * Utiliza la función `getAllClients` para obtener los datos y después genera dinámicamente los elementos HTML
 * para mostrar los clientes en la interfaz.
 *
 * @returns {void} Esta función no retorna nada, solo actualiza el DOM con los datos de los clientes.
 * @throws {string} Si ocurre un error al obtener los datos de los clientes, se captura y se muestra en la consola.
 */
function get_all_init(){
    // Llamamos a la función para obtener los clientes y sus iniciales
    getAllClients().then(function(data) {
        const { clientes, iniciales } = data; // Desestructuramos el objeto para obtener los clientes y las iniciales
        // //console.log(clientes); // Ahora puedes acceder a los clientes correctamente
        // //console.log(iniciales, "iniciales");
        var container = document.getElementById('suggestions-wrapper');

        // Vaciar el contenedor solo una vez antes de agregar los nuevos elementos
        $(container).empty();

        // Recorremos los clientes para crear los elementos HTML
        clientes.forEach(function(cliente, index) {
            let iniciales2 = iniciales[index]; // Obtener las iniciales para el cliente actual
            // Crear el HTML de la estructura que necesitas, hola que tal estas
            $(container).append(`
                <div>
                    <div data-clie="${cliente.id}" data-index="${index}" class="irenemiweb item_client0202 pointer ${index === 0 ? 'customer-el-list_active_ffoQG' : ''}" onclick="funcionClicTrajeta(this)">
                        <div class="customer-el-list_searchItem_mnR8f">
                            <div title="${cliente.nombre}" class="b-avatar_avatar_pJzSu" style="width: 40px; height: 40px; flex: 0 0 40px;">
                                <!-- Mostrar las iniciales dentro del div correspondiente -->
                                <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px; background-color:pink;">
                                    ${iniciales2}
                                </div>
                            </div>
                            <div class="customer-el-list_searchItemName_LLoTq customer-el-list_size--16_uLvgO">
                                <div class="txt--ellipsis">${cliente.name} ${cliente.primer_apellido}</div>
                            </div>
                            <div class="d-flex">
                                <!-- Aquí puedes agregar más información si lo necesitas -->
                            </div>
                        </div>
                    </div>
                </div>
            `);
        });

    }).catch(function(error) {
        //console.log("Error:", error); // Maneja el caso de error
    });
}

/**
 * Maneja la lógica para llamar a la función que marca visualmente el empleado seleccionado.
 * Esta función se activa al hacer clic en un botón y recoge la información necesaria
 * para realizar una solicitud AJAX que obtendrá la disponibilidad de los empleados
 * para un día y una hora específicos.
 *
 * @param {string} botonSelector - Selector CSS del div que abre el desplegable disponivilidad empleados.
 * @param {string} slotEmpleadoSelector - Selector CSS para el div visualizador nombre empleado
 * @param {string} horaServicioSelector - Selector CSS div hora de inicio.
 * @param {string} horaFinServicioSelector - Selector CSS div hora de fin.
 * @param {string} modalSelector - Selector CSS id para desplegable empleados que queremos abrir
 * @param {string} contenedorAtributoFecha - Selector CSS para datepiker de donde queremos obtener la fecha.
 *
 * @returns {void}
 */
function mostrarEmpleadoDisponible(botonSelector, slotEmpleadoSelector, horaServicioSelector, horaFinServicioSelector, modalSelector, contenedorAtributoFecha) {
    let botonAbrirModal = document.querySelector(botonSelector);
    if (botonAbrirModal) {
        botonAbrirModal.addEventListener('click', function(event){
            event.preventDefault();
            marcarEmpleSeleccionado(slotEmpleadoSelector);//marca al enpleado seleccionado en el desplegable
            let fechaElemento = document.querySelector(contenedorAtributoFecha);
            let inicioServicio = document.querySelector(horaServicioSelector).textContent;
            let diaSeleccionado1 = fechaElemento.getAttribute('data-datepiker');
            let horaFinServicio = document.querySelector(horaFinServicioSelector).textContent;
            let diaSeleccionado = formatearFeAnio(diaSeleccionado1);
            let duracion = calcularDuracion(inicioServicio, horaFinServicio);
            // //console.log(inicioServicio, horaFinServicio, duracion, "HORA FIN SERVICIO");
            // Llamada AJAX
            peticionAjaxDisponibleEmpleados(inicioServicio, duracion, diaSeleccionado, modalSelector);
        });
    }
}


//seleccionar empleado info reserva
mostrarEmpleadoDisponible('.styles_outerWrapper_AddEmpleInicio', '.slotEmpleadoAddInicio', '.slotHorasCobrarServicio', '.slotHoraFinCorbrarServicio', '#selectEmpleModalAddInicio', '.fechaCitaInfo');
//seleccionar empleado info reserva add
mostrarEmpleadoDisponible('.styles_outerWrapper_AddEmple', '.slotEmpleadoAdd', '.slotHorasCobrarServicioAdd', '.slotHoraFinCorbrarServicioAdd', '#selectEmpleModalAdd', '.fechaCitaInfo');
//seleccionar empleado calendar new reserv
mostrarEmpleadoDisponible('.styles_outerWrapper_AddEmpleInicioCalendar', '.slotEmpleadoAddInicioCalendar', '.slotHorasCobrarServicioCalendar', '.slotHoraFinCorbrarServicioCalendar', '#selectEmpleModalAddInicioCalendar', '.fechaCitaInfo22');
//seleccionar empleado calendar new reserv add
mostrarEmpleadoDisponible('.styles_outerWrapper_AddEmpleInicioCalendarAdd', '.slotEmpleadoAddInicioCalendarAdd', '.slotHorasCobrarServicioAddCalendar', '.slotHoraFinCorbrarServicioAddCalendar', '#selectEmpleModalAddInicioCalendarAdd', '.fechaCitaInfo22');

/**
 * Calcula la duración en minutos entre dos horas dadas en formato "HH:mm".
 *
 * @param {string} horaInicio - Formato "12:35".
 * @param {string} horaFin - Formato "13:05".
 *
 * @returns {string} Duración en minutos entre las dos horas. Foramto: "30".
 *
 * @throws {Error} Si alguno de los parámetros no está en formato "HH:mm" o si la hora de fin es anterior a la de inicio.
 *
 * @example
 * const duracion = calcularDuracion("12:35", "13:05");
 * //console.log(duracion); // "30"
 */
function calcularDuracion(horaInicio, horaFin) {
    // //console.log(horaInicio, horaFin, "calcularDuracion");

    // Convertir las horas en formato HH:mm a objetos Date
    const [horaInicioHoras, horaInicioMinutos] = horaInicio.split(':').map(Number);
    const [horaFinHoras, horaFinMinutos] = horaFin.split(':').map(Number);

    // Calcular los minutos totales desde las 00:00 para ambas horas
    const minutosInicio = horaInicioHoras * 60 + horaInicioMinutos;
    const minutosFin = horaFinHoras * 60 + horaFinMinutos;

    // Calcular la diferencia en minutos
    const diferenciaMinutos = minutosFin - minutosInicio;
    // //console.log(horaInicio, ":ininio ", horaFin, ":horafin ", diferenciaMinutos,":diferencia");
    // Devolver el resultado como una cadena
    // //console.log(diferenciaMinutos.toString(), "diferenciaMinutos");

    return diferenciaMinutos.toString();
}


/**
 * Actualiza visualmente la disponivilidad de los empleados del desplegable.
 *
 * @param {Array} disponibilidadEmpleados - Un arreglo de objetos.
 * Cada objeto tiene la siguiente estructura:
 *   - `disponible` {boolean}: Indica si el empleado está disponible (true) o no (false).
 *   - `empleado` {string}: El nombre del empleado.
 *   - `fecha_hora_reserva` {string}: La fecha y hora de la reserva en formato ISO 8601 (por ejemplo, "2025-03-14T13:10:00.000000Z").
 *   - `idEmpleado` {number}: El ID del empleado.
 *
 * @param {string} modal - El selector CSS del desplegable donde se encuentran los empleados.
 *
 * @returns {void} Solo actualiza el DOM con los cambios de disponibilidad.
 */
function actualizarDisponibilidadEmpleadosCalendar(disponibilidadEmpleados, modal) {
    let noDisponiblesCount = 0; // Contador de empleados "no disponibles"
    const totalEmpleados = disponibilidadEmpleados.length; // Total de empleados

    disponibilidadEmpleados.forEach(function(empleado) {
        // Seleccionar el elemento correspondiente al empleado en el DOM usando su ID
        const selectorBase = `${modal} [data-empId="${empleado.idEmpleado}"]`;
        const empleadoDiv = document.querySelector(selectorBase);
        const divAvatarEmpleado = document.querySelector(`${selectorBase} .avatarEmpleadoAdd`);
        const cursorEmpleado = document.querySelector(`${selectorBase} .empleadoCambiarCursor`);

        if (empleadoDiv) {
            // Limpiar cualquier mensaje anterior de disponibilidad
            const subtextDiv = empleadoDiv.querySelector('.subtext');
            // Eliminar las clases anteriores de disponibilidad
            subtextDiv.classList.remove('text-success', 'text-danger');
            // Verificar si el empleado está disponible
            if (empleado.disponible) {
                cursorEmpleado.classList.add('cursor-pointer');
                cursorEmpleado.classList.remove('empleadoDisabled');
                divAvatarEmpleado.classList.remove('opacity-50');
                subtextDiv.classList.add('text-success');
                subtextDiv.innerHTML = `
                    <span>Esteticista</span>
                    <span>
                        <span>
                            <span> • </span>
                        </span> Disponible
                    </span>`;
            } else {
                cursorEmpleado.classList.remove('cursor-pointer');
                cursorEmpleado.classList.add('empleadoDisabled');
                divAvatarEmpleado.classList.add('opacity-50');
                subtextDiv.classList.add('text-danger');
                subtextDiv.innerHTML = `
                    <span>Esteticista</span>
                    <span>
                        <span>
                            <span> • </span>
                        </span> No Disponible
                    </span>`;
                noDisponiblesCount++; // Incrementar el contador de "no disponibles"
            }
        }else{
        }
    });

    // Comprobar si todos los empleados están "no disponibles" empleadoCambiarCursorCualquiera
    let cursorEmpleadoCualquiera = document.querySelector(`${modal} .empleadoCambiarCursorCualquiera`);
    if (noDisponiblesCount === totalEmpleados) {
        if (cursorEmpleadoCualquiera) {
            cursorEmpleadoCualquiera.classList.remove('cursor-pointer');
            cursorEmpleadoCualquiera.classList.add('empleadoDisabled');
            let subtextDiv = cursorEmpleadoCualquiera.querySelector('.subtext span');
            subtextDiv.innerHTML = `
             <div class="subtext text-alert">
                <span style="color:red">
                    Todos los empleados están No Disponibles
                </span>
             </div>
            `;
        }

    }else{
        if(cursorEmpleadoCualquiera){
            cursorEmpleadoCualquiera.classList.remove('empleadoDisabled', 'opacity-50');
            cursorEmpleadoCualquiera.classList.add('cursor-pointer');
            let subtextDiv = cursorEmpleadoCualquiera.querySelector('.subtext');
            subtextDiv.innerHTML = `
                <div class="subtext text-success">
                <span>
                    Mayor disponivilidad
                </span>
            </div>
            `;
        }

    }
}

/**
 * Marca al empleado seleccionado en el interfaz visual inicialmente.
 * Marca al empleado correspondiente en el DOM agregando la clase `avatar-selected`.
 *
 * @param {string} slotNombre - El selector del elemento DOM donde se muestra el nombre del empleado.
 *
 * @returns {void} Solo actualiza el DOM.
 */
function marcarEmpleSeleccionado(slotNombre){
    // //console.log("marcarEmpleadoSeleccionado");

    let nombreEmpleadoSlot1 = document.querySelector(slotNombre);
    if(nombreEmpleadoSlot1){
    let nombreEmpleadoSlot = nombreEmpleadoSlot1.textContent;
    let empleadosPonerCheck = document.querySelectorAll('.avatarEmpleadoAdd');
        empleadosPonerCheck.forEach(function (empleado) {
            empleado.classList.remove('avatar-selected');
        });
        empleadosPonerCheck.forEach(function (empleado) {
            if(empleado.getAttribute('data-empleadaNombre') === nombreEmpleadoSlot){
                empleado.classList.add('avatar-selected');
            }
        });
    }
}

//AL CLICAR EN EL EMPLEADO DENTRO DEL MODAL SELECCIONAR EMPLEADO
function selectEmpleadoAdd(elemento, empleado_id, empleado_nombre, slotNombre, modalAbierto){
    if(elemento.classList.contains('empleadoDisabled')){

    }else{
        //ponemos icono avatar seleccionado
        let empleadosPonerCheck = document.querySelectorAll('.avatarEmpleadoAdd');
        empleadosPonerCheck.forEach(function (empleado) {
            empleado.classList.remove('avatar-selected');
        });
        elemento.querySelector('.avatarEmpleadoAdd').classList.add('avatar-selected');

        let visualizadorNombreEmpleadoSeleccionado = document.querySelector(slotNombre);
        //si empleado es "cualquiera"
        if(empleado_id === 0){
            visualizadorNombreEmpleadoSeleccionado.innerHTML = "Cualquier empleado";
            visualizadorNombreEmpleadoSeleccionado.setAttribute('data-empleId', 'cualquiera');
            visualizadorNombreEmpleadoSeleccionado.setAttribute('data-empleado', 'cualquiera');
        }else{
            visualizadorNombreEmpleadoSeleccionado.innerHTML = empleado_nombre;

            //manejo cambio empleado desde añadir reserva desde calendar para cambiar el evento temporal
            if(slotNombre === '.slotEmpleadoAddInicioCalendar'){
                let empleadoEliminar = document.querySelector('.slotEmpleadoAddInicioCalendar').getAttribute('data-empleid');
                if(empleadoEliminar.trim() === 'cualquiera'){
                    ponerEventoInicialmente(empleado_id);
                }else{
                    cambiarResourceIdEvento(eventIdChangeCalendar, empleado_id, ".fc-event.temporal");
                }
                //pantalla #2
            }else if(slotNombre === '.slotEmpleadoAddInicioCalendarAdd'){
                let empleadoEliminar2 = document.querySelector('.slotEmpleadoAddInicioCalendarAdd').getAttribute('data-empleid');
                if(empleadoEliminar2.trim() === 'cualquiera'){
                    ponerEventoPantalla2(empleado_id)
                    // //console.log("empleado segunda pantalla");
                }else{
                    cambiarResourceIdEvento(eventIdChangeCalendar, empleado_id, '.fc-event.temporal2');
                }
            }else if(slotNombre === '.slotEmpleadoAddInicio'){
                cambiarResourceIdEvento(eventIdChangeCalendar, empleado_id, ".fc-event.temporal");
            }else if(slotNombre === '.slotEmpleadoAdd'){
                let empleadoEliminar2 = document.querySelector('.slotEmpleadoAdd').getAttribute('data-empleid');
                if(empleadoEliminar2.trim() === 'cualquiera'){
                    ponerEventoPantalla2Info(empleado_id, empleado_nombre)
                }else{
                    cambiarResourceIdEvento(eventIdChangeCalendar, empleado_id, '.fc-event.temporal2');
                }
            }
            visualizadorNombreEmpleadoSeleccionado.setAttribute('data-empleId', empleado_id);
            visualizadorNombreEmpleadoSeleccionado.setAttribute('data-empleado', empleado_id);
        }
        cerrarModalCategorias(modalAbierto);

        //manejo habilitar deshabilitar boton
        let existeServicio = document.querySelector('.selectServiceAdd .services-wrapper_serviceEmpty_pbusk');
        if(!existeServicio){
            document.getElementById('uid-377-input').disabled = false;
        }
        let existeServicioCalendar = document.querySelector('.addServiceCalendar66 .services_serviceInfo_iDMQwAddCalendar')
        if (existeServicioCalendar) {
            document.getElementById('uid-798-input').classList.remove('index_is--disabled_w97Nq');
            document.getElementById('uid-3978-input').classList.remove('index_is--disabled_w97Nq');
            document.getElementById('uid-3978-input').removeAttribute('disabled');
        }

        //comprobamos que el empleado en añadir servicio #2 calendar está seleccionado
        if(document.querySelector('.allServicesAddCalendar00Add').style.display === "block"){
            let servicioSeleccionado = comprobarServicioSeleccionado('.selectServiceAddCalendar', 'Seleccionar servicio');
            if(servicioSeleccionado){
                document.getElementById('uid-377-inputCalendar').classList.remove('index_is--disabled_w97Nq');
            }
        }

    }
}

//comprobar que hora fin es mayor que inicio new reserv calendar
function esHoraFinMayorQueHoraInicio() {
    // Obtener las horas de inicio y fin de los elementos correspondientes
    let horaInicio = document.querySelector('.slotHorasCobrarServicioCalendar').textContent;
    let horaFin = document.querySelector('.slotHoraFinCorbrarServicioCalendar').textContent;

    // Convertir las horas en formato 'HH:mm' a minutos
    let [horaInicioH, horaInicioM] = horaInicio.split(':').map(Number);
    let [horaFinH, horaFinM] = horaFin.split(':').map(Number);

    // Convertir ambas horas a minutos
    let minutosInicio = horaInicioH * 60 + horaInicioM;
    let minutosFin = horaFinH * 60 + horaFinM;

    // Devolver true si la hora de fin es mayor que la hora de inicio
    return minutosFin > minutosInicio;
}


//función que calcula hora fin con formato de llegada 9:00
function calcularHoraFin(horaInicio, duracion) {
    // Separar la hora y los minutos de la hora de inicio
    const [horas, minutos] = horaInicio.split(':').map(Number);

    // Convertir la duración a minutos solo si contiene "min"
    const duracionEnMinutos = duracion.includes('min')
        ? parseInt(duracion.replace('min', '').trim(), 10)
        : parseInt(duracion, 10);

    // Crear un objeto Date para la hora de inicio
    const fecha = new Date();
    fecha.setHours(horas, minutos, 0, 0);

    // Añadir la duración al objeto Date
    fecha.setMinutes(fecha.getMinutes() + duracionEnMinutos);

    // Formatear la hora y los minutos de la hora final
    const horaFinal = String(fecha.getHours()).padStart(2, '0');
    const minutosFinal = String(fecha.getMinutes()).padStart(2, '0');

    // Devolver la hora final en formato "HH:MM"
    return `${horaFinal}:${minutosFinal}`;
}

//VENTA RÁPIDA -----------------------------------------------------------------------------------------------

//Final y cobrar mostrar tiquet
function createTicket(idCliente, importeImpuesto,valorNeto, valorBruto, sub_total,descuentoTotal, descuentoTotalPorcentaje) {
    return new Promise(function(resolve, reject) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var url = "create-ticket";
        // Hacer una petición AJAX al servidor
        $.ajax({
            url: url, // Ruta que definimos en web.php
            method: 'POST',
            data: {
                _token: csrfToken, // Token CSRF para seguridad
                id_cliente_: idCliente,
                tipo_impuesto:"21",
                importe_impuesto:importeImpuesto,
                valor_neto:valorNeto,
                valor_bruto:valorBruto,
                subtotal:sub_total,
                descuento_total: descuentoTotal,
                descuento_total_porcentaje: descuentoTotalPorcentaje,
                responsable_cobro: responsableCobroId
            },
            success: function(data) {
                if(data.creado) {
                    //console.log(data.recibo, "tiket");
                    resolve(data.recibo); // Resolvemos la promesa con el cliente
                } else {
                    reject("tiket"); // Rechazamos si no se encuentra el cliente
                }
            },
            error: function(xhr) {
                //console.log('Error al obtener cliente', xhr);
                reject(xhr); // Rechazamos la promesa en caso de error
            }
        });
    });
}

function storeServiciosVendidos(idRecibo){
    let updateStatusReservUrl = 'store-servicios-vendidos';
    let csrfToken = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        url: updateStatusReservUrl, // Ruta que definimos en web.php
        method: 'POST',
        data: {
            _token: csrfToken, // Token CSRF para seguridad
            id_recibo: idRecibo,
            empleado_id: null,
            arrayServiciosVendidos: serviciosVentaRapida
        },
        success: function(response) {
            const updateEndReserv = response.updteEnd;
            if(updateEndReserv === true){
                initializeCalendar();

                //console.log("status cambiado con exito");
            }
        },
        error: function(xhr) {
            //console.log('Error al actualizar el status', xhr);
        }
    });
}

function insertTargetPayment(){
    //console.log( "boton cobrar");
    let pagoEfectivoCambio = document.querySelector('.cambioMostrarOcultar');
    // let pagoCombinado = document.querySelector('.pagoCombinado66');
    let cambioMostrarOcultar='';
    let cantidadCambioMostrarOcultar='';
    let divCliente = document.querySelector('.customer-card_customer_PiI9d');
    let id_cliente=null;
    let cliente99='';
    let datosCliente ='';
    let metodoActivo = document.querySelector('.payment-types_paymentMethodActive_vBa20').textContent.trim();
    let fecha_hora = new Date().toLocaleString('es-ES', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    }).replace(',', '');

    let fecha = new Date().toLocaleString('es-ES', {
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    }).replace(',', '');
    let fechaEmail = new Date().toLocaleDateString('es-ES', {
        day: '2-digit',
        month: 'long',
        year: 'numeric'
    }).replace(',', '');
    let horaEmail = new Date().toLocaleString('es-ES', {
        hour: '2-digit',
        minute: '2-digit'
    }).replace(',', '');
    if(pagoEfectivoCambio.classList.contains('d-none')){
        //console.log("PAGO COMBINADO"); 21 de enero de 2025
        cambioMostrarOcultar = "0,00";
        cantidadCambioMostrarOcultar = convertirEnNumeroSolo(document.querySelector('.basketTotalPrecio').textContent).toFixed(2).replace('.', ',');
        //console.log(metodoActivo, "pago combinado");
        if (divCliente) {
            id_cliente = divCliente.getAttribute('data-index');
            getClientById(id_cliente).then(function(cliente) {
               cliente99 = cliente;
               datosCliente = montarTarjetaClienteTiket(cliente99);
               montarTarjetaTiket(cambioMostrarOcultar, cantidadCambioMostrarOcultar, datosCliente,fecha,fecha_hora, metodoActivo, cliente99, fechaEmail, horaEmail)
            }).catch(function(error) {
                //console.log("Error:", error); // Maneja el caso de error
            });
        }else{
            //console.log("no hay cliente");
            datosCliente='';
            montarTarjetaTiket(cambioMostrarOcultar, cantidadCambioMostrarOcultar, datosCliente,fecha,fecha_hora, metodoActivo, cliente99, fechaEmail, horaEmail)
        }
    }else{
        //console.log("PAGO  NO COMBINADO");
        cantidadCambioMostrarOcultar = document.getElementById('uid-317-inputMetodoPago').value;
        cantidadCambioMostrarOcultar = convertirEnNumeroSolo(cantidadCambioMostrarOcultar).toFixed(2).replace('.',',');
        cambioMostrarOcultar = document.querySelector('.cambio_800').textContent;
        cambioMostrarOcultar = convertirEnNumeroSolo(cambioMostrarOcultar).toFixed(2).replace('.',',');
        // //console.log(metodoActivo, cantidadCambioMostrarOcultar, cambioMostrarOcultar, ", NO COMBINADO");
        if (divCliente) {
            id_cliente = divCliente.getAttribute('data-index');
            getClientById(id_cliente).then(function(cliente) {
               cliente99 = cliente;
               datosCliente = montarTarjetaClienteTiket(cliente99);
               montarTarjetaTiket(cambioMostrarOcultar, cantidadCambioMostrarOcultar, datosCliente,fecha,fecha_hora, metodoActivo, cliente99, fechaEmail, horaEmail)
            }).catch(function(error) {
                //console.log("Error:", error); // Maneja el caso de error
            });
        }else{
            //console.log("no hay cliente");
            datosCliente='';
            montarTarjetaTiket(cambioMostrarOcultar, cantidadCambioMostrarOcultar, datosCliente,fecha,fecha_hora, metodoActivo, cliente99, fechaEmail, horaEmail)
        }
    }
    //console.log(cliente99, "cliente 99");
}

function montarTarjetaClienteTiket(cliente99){
   let datosCliente= `
    <div class="payment-receipt_receiptCustomer__F5o0">
        <div class="size--14-sb margin-right-4"> ${cliente99.name} ${cliente99.primer_apellido}, </div>
        <span class="flex inline items-center">
            <span> ${cliente99.telefono} </span>
        </span>
    </div>
   `;
   return datosCliente;
}

function montarTarjetaTiket(cambioMostrarOcultar, cantidadCambioMostrarOcultar, datosCliente, fecha, fecha_hora, metodoActivo, cliente99, fechaEmail, horaEmail) {
    let divContenedorTicket = document.querySelector('.index_checkoutView_oS9m6Secundario');
    let divContenedorTicketPrincipal = document.querySelector('.index_checkoutView_oS9m6Principal');
    let serviciosTicket='';
    getServicesById(serviciosVentaRapida_ids, function (servicios){
        servicios.forEach((servicio, index) => {
            let descuento = serviciosVentaRapida[index].descuento_servicio;
            let li_index = index;
            let servicio_idArray = serviciosVentaRapida[index].idServicio;
            // let nombreApellidoEmpleA = serviciosVentaRapida[index].nombre_Empleado;
            let precioAsignar = serviciosVentaRapida[index].precio;
            // Construir HTML construirHtmlTarjetasVentaRapida(nombreServicio, duracionServicio, precio, nombreApellidosEmpleado, inicialesEmpleado)
            serviciosTicket += construirTarjetaServiciosTiket(
                li_index,
                servicio.descripcion,
                comprobar603090SinM(servicio.duration),
                precioAsignar,
                servicio_idArray,
                descuento
            );
        });
        let tipoIva = "21";
        let subtotalTiket = document.querySelector('.divSubtotal').textContent;
        let valor_bruto = document.querySelector('.basketTotalPrecio').textContent;//total del tiket
        let resultadoIvaTicket = calcularIva(convertirEnNumeroSolo(valor_bruto), 0.21);
        let descuentoTotalPorcentaje = document.querySelector('.basket-discountPorcentajeShow').textContent;
        let descuentoTotalImporte = document.querySelector('.basket-discountShow').textContent;
        let metodoPagoTicket='';
        let importe1 = '';
        let metodopago1 = '';
        let importe2 = '';
        let metodopago2 = '';
        if(metodoActivo.trim() === 'Pago fraccionado'){
             importe1 = document.getElementById('uid-834-inputImporte1').value;
             metodopago1 = document.getElementById('uid-835-inputResto1').value;
             importe2 = document.getElementById('uid-834-inputImporte2').value;
             metodopago2 = document.getElementById('uid-835-inputResto2').value;
            metodoPagoTicket = `
            <div class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU payment-receipt_receiptRowPayments_JAX11">
                <div data-testid="payment-receipt-status" class="payment-receipt_receiptRowName_Me4zF"> Pagado • ${metodopago1} • ${fecha_hora} </div>
                <div data-testid="payment-receipt-amount-text" class="payment-receipt_receiptRowTotal_bf2SM">
                    <span>${importe1}</span>
                </div>
            </div>
            <div class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU payment-receipt_receiptRowPayments_JAX11">
                <div data-testid="payment-receipt-status" class="payment-receipt_receiptRowName_Me4zF"> Pagado • ${metodopago2} • ${fecha_hora} </div>
                <div data-testid="payment-receipt-amount-text" class="payment-receipt_receiptRowTotal_bf2SM">
                    <span>${importe2}</span>
                </div>
            </div>

            `;
        }else{
            metodoPagoTicket=`
            <div class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU payment-receipt_receiptRowPayments_JAX11">
                <div data-testid="payment-receipt-status" class="payment-receipt_receiptRowName_Me4zF"> Pagado • ${metodoActivo} • ${fecha_hora} </div>
                <div data-testid="payment-receipt-amount-text" class="payment-receipt_receiptRowTotal_bf2SM">
                    <span>${valor_bruto}</span>
                </div>
            </div>
            `;
        }
        //GUARDAR DATOS BASE DATOS
        createTicket(cliente99.id, resultadoIvaTicket.importeIva, resultadoIvaTicket.valorNeto, valor_bruto, subtotalTiket, descuentoTotalImporte, descuentoTotalPorcentaje).then(function(recibo) {
            divContenedorTicketPrincipal.classList.add('d-none');
            // $(divContenedorTicket).empty();
            $(divContenedorTicket).append(`
                <div class="index_paidWrapper_QWkLS" id="pago_finalizado_100" style="">
                <div class="row width-100 height-100 padding-left-32 padding-right-32">
                    <div class="col col-auto txt--center self-center padding-left-60 padding-right-60">
                        <div class="paid_paidWrapper_PMblG text-center">
                            <img src="https://d10n9ka7jp2kfo.cloudfront.net/pro/2b253d2d/img/success.a5dea691.svg" class="margin-bottom-16 b-icon_img_I0kuC">
                            <div data-testid="checkout-paid-info" class="size--28-b margin-bottom-16"> ¡Pago finalizado! </div>
                            <div data-testid="checkout-paid-change" class="paid_paidDescription_cDRUA paid_size--18_wZkDn">
                                <span class="size--18-sb">${cambioMostrarOcultar} € </span>
                                <span class="size--18-sb">cambio</span>
                                de ${cantidadCambioMostrarOcultar} €
                            </div>
                            <button id="uid-351-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt"  style="width: 100%;">
                                <div class="index_caption_W6r_J"> Ir al calendario </div>
                            </button>
                        </div>
                    </div>
                    <div class="col h-100">
                        <div class="scrollable h-100 column justify-center position-relative">
                            <div class="receipt_receiptWrapper_ZpUQq paid_receiptWrap_KsRkP">
                                <div class="receipt_receiptContent_W16zO">
                                <header class="receipt_receiptHeader_or90S">
                                        <div class="botonesCabeceraTiquet" style="">
                                            <div class="flex justify-end w-100">
                                                <button id="uid-353-input-enviarMail" class="index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--icon_yiHCJ" >
                                                    <div class="index_slotLeft_p6NJx">
                                                        <span class="padding-right-4 b-icon iconFont icon-ico_send" style="font-size: 30px;"></span>
                                                    </div>
                                                </button>
                                                <div class="margin-left-12 index_dropdown_yxIjB index_has--shadow_s6YH1 index_is--overlay_JG_3k">
                                                    <div class="index_toggle_sBt35">
                                                        <button id="uid-356-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--icon_yiHCJ">
                                                            <div class="index_slotLeft_p6NJx">
                                                                <span class="b-icon iconFont icon-more" style="font-size: 30px;"></span>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="enviarReciboCorreo d-none">
                                            <div class="row items-center">
                                                <div class="col col-auto">
                                                    <span class="esconderEnviarEmail pointer b-icon iconFont icon-nav-arrow-left" style="font-size: 18px;padding-bottom: 1rem;"></span>
                                                </div>
                                                <div class="col">
                                                    <div data-testid="error-input" class="index_container_jtGZY index_theme--error_q2ehf">
                                                        <div class="form-groupInput" style="margin-bottom: 0px">
                                                            <input onfocus="" onclick="" type="email" placeholder=" "
                                                                class="gualazonF inputsNewService" id="emailClienteRecivoSend"
                                                                value="" required
                                                                name="emailClienteRecivoSend"
                                                                onblur=""/>
                                                            <label for="emailClienteRecivoSend" class="styles_label_hleTI">Enviar recibo al cliente por email</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col col-auto">
                                                    <button id="uid-340-inputEnviarEmail" class="index_button_TfmOz index_size--md_G1gdK index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt receipt_receiptHeaderSend_XpRqZ">
                                                        <div style="padding: 16px 16px;" class="index_caption_W6r_J"> Enviar </div>
                                                    </button>
                                                </div>
                                                <div class="col col-12">
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="receipt_receiptReceipt_KzM2Z">
                                        <div class="payment-receipt_receipt_KbChH payment-receipt_size--14_pkege">
                                            <div class="receipt-status-badge_status_vwj1d receipt-status-badge_statusGreen_Aw6NK receipt-status-badge_size--md_INMcW receipt-status-badge_size--18-sb_Z0C9x"> Pagado </div>
                                            <div class="payment-receipt_receiptInfo_RrRnL margin-top-16">
                                                <div class="size--16-sb">Recibo ${recibo.numero_recibo} | ID ${recibo.id}</div>
                                                <div>${fecha}</div>
                                            </div>
                                            ${datosCliente}
                                            <div class="margin-top-16">
                                                <div class="margin-top-16"> MYA Nail art studio <div class="payment-receipt_receiptAltText_VrnDU payment-receipt_size--12_zJMLU">ourense 25, 32003, Ourense</div></div>
                                            </div>
                                            <div class="payment-receipt_receiptLabels_dbSin payment-receipt_size--10_bf2DQ">
                                                <div>Artículo</div>
                                                <div>Cantidad</div>
                                            </div>
                                            <div>
                                                ${serviciosTicket}
                                            </div>
                                            <hr class="payment-receipt_hr_6WSqP">

                                            <table class="payment-receipt_taxSummary_tF1kf">
                                                <thead class="color-08 size--10">
                                                    <tr><th></th><th>Tipo de Impuesto</th><th>Valor neto</th><th>Importe de impuesto</th><th>Valor bruto</th></tr>
                                                </thead>
                                                <tbody><tr data-testid="payment-receipt-tax-item-0"><td></td><td class="size--12">${tipoIva} %</td><td class="size--12">${resultadoIvaTicket.valorNeto.toString().replace('.',',')} €</td><td class="size--12">${resultadoIvaTicket.importeIva.toString().replace('.',',')} €</td><td class="size--12"><strong>${valor_bruto}</strong></td></tr></tbody>
                                            </table>
                                            <div data-testid="payment-receipt-summaries-subtotal" class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU">
                                                <div class="payment-receipt_receiptRowName_Me4zF"> Subtotal </div>
                                                <div class="payment-receipt_receiptRowTotal_bf2SM"> ${subtotalTiket}</div>
                                            </div>
                                            <div data-testid="${descuentoTotalPorcentaje}" class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU">
                                                <div class="payment-receipt_receiptRowName_Me4zF"> Descuento </div>
                                                <div class="payment-receipt_receiptRowTotal_bf2SM"> -${descuentoTotalImporte}</div>
                                            </div>
                                            <hr class="payment-receipt_hr_6WSqP">
                                            <div class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU payment-receipt_receiptRowAlt_CtByz">
                                                <div class="payment-receipt_receiptRowName_Me4zF"> Total </div>
                                                <div class="payment-receipt_receiptRowTotal_bf2SM payment-receipt_receiptRowTotalAlt_L_Ovf payment-receipt_size--16-sb_LEIqn"> ${valor_bruto}</div>
                                            </div>
                                            ${metodoPagoTicket}
                                            <div class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU payment-receipt_receiptRowTotalPaid_th16p">
                                                <div class="payment-receipt_receiptRowName_Me4zF"> Total pagado </div>
                                                <div data-testid="payment-receipt-paid" class="payment-receipt_receiptRowTotal_bf2SM size--12-b"> ${valor_bruto}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="receipt_break_EL1Lq">
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `);
        //guardar los servicios vendidos
                storeServiciosVendidos(recibo.id);
        //clic en el boton enviar recibo email
                $('#uid-353-input-enviarMail').on('click', function() {
                    $('.botonesCabeceraTiquet').addClass('d-none');
                    $('.enviarReciboCorreo').removeClass('d-none');
                });
                $('.esconderEnviarEmail').on('click', function() {
                    document.getElementById('emailClienteRecivoSend').value='';
                    $('.botonesCabeceraTiquet').removeClass('d-none');
                    $('.enviarReciboCorreo').addClass('d-none');
                });
                $('#uid-340-inputEnviarEmail').on('click', function() {
                    let emailCliente= document.getElementById('emailClienteRecivoSend').value;
                    let updateStatusReservUrl = 'envio-email-recibo';
                    let fecha_hora = `
                    ${fechaEmail} a las ${horaEmail}
                    `;
                    let csrfToken = $('meta[name="csrf-token"]').attr("content");
                    $.ajax({
                        url: updateStatusReservUrl,
                        method: 'POST',
                        data: {
                            _token: csrfToken,
                            emailCliente: emailCliente,
                            id_recibo: recibo.id,
                            fecha_email:fechaEmail,
                            fecha_email_hora:fecha_hora,
                            datos_cliente:cliente99,
                            tipoIva:tipoIva,
                            valor_neto: resultadoIvaTicket.valorNeto.toString().replace('.',','),
                            importe_iva:resultadoIvaTicket.importeIva.toString().replace('.',','),
                            valor_bruto: valor_bruto,
                            subtotal: subtotalTiket,
                            descuentoTotalPorcentaje:descuentoTotalPorcentaje,
                            descuentoTotalImporte:descuentoTotalImporte,
                            // metodoPagoTicket:metodoPagoTicket,
                            metodoActivo:metodoActivo,
                            importe1_: importe1,
                            metodopago1_: metodopago1,
                            importe2_:importe2,
                            metodopago2_: metodopago2,

                        },
                        success: function(response) {
                            if(response.enviado === true){
                                document.getElementById('emailClienteRecivoSend').value='';
                                document.querySelector('.enviarReciboCorreo').classList.add('d-none');
                                document.querySelector('.botonesCabeceraTiquet ').classList.remove('d-none');
                                let stylos = 'position: absolute;right: 5rem;top: 16px;z-index: 9;';
                                insertMessageResolAction('Revibo enviado con éxito', '.index_checkoutView_oS9m6Secundario', stylos, 'ok');
                            }else{
                                insertMessageResolAction('No hemos podido enviar el recibo', '.index_checkoutView_oS9m6Secundario', stylos, 'error');
                            }
                            //console.log(response.enviado, "respuesta envio email");
                        },
                        error: function(xhr) {
                            //console.log('Error al actualizar el status', xhr);
                        }
                    });

                });
        }).catch(function(error) {
            //console.log("Error:", error); // Maneja el caso de error uid-340-inputEnviarEmail
        });
    });

}
//calcular iva
function calcularIva(valorBruto, iva) {
   // Calcular el valor neto (sin IVA) y redondear a 2 decimales
   let valorNeto = (valorBruto / (1 + iva)).toFixed(2);

   // Calcular el importe del IVA y redondear a 2 decimales
   let importeIva = (valorBruto - valorNeto).toFixed(2);

    // Devolver el valor neto y el importe IVA en un objeto
    return {
        valorNeto: valorNeto,
        importeIva: importeIva
    };
}

function actionButoncloseOffcanvasSelectClient(id_input = null){
    if (id_input) {
        document.getElementById(id_input).value = '';  // Vaciar el valor del input
        buscar(`#${id_input}`);  // Llamar a la función buscar
    }
    let offcanvasSelectClientes = document.getElementById('offcanvasSelectClient');
    if (offcanvasSelectClientes.classList.contains('card_empty_calendarOffcanvas')) {
        $('#newReservCalendar').offcanvas('show');
    }
    if(offcanvasSelectClientes.classList.contains('card_empty_InfoOffcanvas')){
        $('#eventDetailsModal').offcanvas('show');
    }
    offcanvasSelectClientes.classList.remove('card_empty_ventasOffcanvas');
    offcanvasSelectClientes.classList.remove('card_empty_calendarOffcanvas');
    offcanvasSelectClientes.classList.remove('card_empty_InfoOffcanvas');
}

//FUNCION CLIC EN TARJETA VACÍA SELECCIONAR CLIENTE card_empty_calendarOffcanvas
function clicTarjetasBlancasSelectCliente(tarjetaVacia) {
    if (tarjetaVacia) {
        const offcanvas = document.getElementById('offcanvasSelectClient');
        $('#offcanvasSelectClient').offcanvas('show'); // Mantenemos la funcionalidad de jQuery para mostrar el offcanvas

        // Primero, eliminamos todas las clases relacionadas con los estados posibles
        offcanvas.classList.remove('card_empty_ventasOffcanvas', 'card_empty_calendarOffcanvas', 'card_empty_InfoOffcanvas');

        // Dependiendo de la clase de la tarjeta vacía, agregamos la clase correspondiente
        if (tarjetaVacia.classList.contains('card_empty_ventas')) {
            offcanvas.classList.add('card_empty_ventasOffcanvas');
        } else if (tarjetaVacia.classList.contains('card_empty_calendar')) {
            offcanvas.classList.add('card_empty_calendarOffcanvas');
            $('#newReservCalendar').offcanvas('hide');
        } else if (tarjetaVacia.classList.contains('card_empty_info')) {
            offcanvas.classList.add('card_empty_InfoOffcanvas');
            $('#eventDetailsModal').offcanvas('hide');
        }
    }
}

clicTarjetasBlancasSelectCliente();

//quita tarjeta cliente seleccionado y pone seleccionar cliente
function insertartarjetaSeleccionaCliente(divContenedor, claseDiferenciadora){
    let divClienteVenta = document.querySelector(divContenedor);
    $(divClienteVenta).empty();
    $(divClienteVenta).append(`
        <div class="b-shadow-card customer-card_emptyCustomer_XKrcQ ${claseDiferenciadora} customer-card_isWalkIn__KcSW pointer" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSelectClient" onclick="clicTarjetasBlancasSelectCliente(this)">
            <div data-v-3d594be1="" class="">
                <div data-v-3d594be1="" title="" class="b-avatar_avatar_pJzSu" style="width: 48px; height: 48px; flex: 0 0 48px;"></div>
            </div>
            <div data-v-3d594be1="" class="customer-card_customerContent_Pq14e color-07 size--16">
                <span data-v-3d594be1="">Selecciona un cliente o déjalo en blanco</span>
            </div>
            <div data-v-3d594be1="" class="customer-card_customerClose_kMCQ7">
                <span data-v-3d594be1="" class="b-icon iconFont icon-plus" style="font-size: 20px;"></span>
            </div>
        </div>
        `);
        //hacemos clic en la x cliente en nueva reserva calendar
        if(claseDiferenciadora.trim() === 'card_empty_calendar'){
            if(servicesWithTimes.length > 0){
                actualizarEventoClienteArray('Cliente sin cita previa');
            }else{
                actualizarEventoCliente(eventIdChangeCalendar, 'Cliente sin cita previa');
            }
        }
        if(claseDiferenciadora.trim() === 'card_empty_info'){
            //console.log(servicesWithTimes.length, "servicesWithTimes.length clase diferenciadora___________________");

            if(servicesWithTimes.length <= 1){
                actualizarEventoCliente(eventIdChangeCalendar, 'Cliente sin cita previa');
            }else{
                //console.log("actualizar evento array");

                actualizarEventoClienteArray('Cliente sin cita previa');
            }
        }else{
            //console.log("no es clase diferenciadora");

        }
}

// insertar tarjeta cliente seleccionado venta rápida
function insertarTarjetaClienteSelecionado(cliente, divInfoClienteEnviado, claseDiferenciadora){
    let divInfoCliente = document.querySelector(divInfoClienteEnviado);
    let iniciales = obtenerIniciales(cliente.name, cliente.primer_apellido);
    $(divInfoCliente).empty();
    $(divInfoCliente).append(`
        <div data-v-3d594be1="" class="b-shadow-card customer-card_customer_PiI9d" data-index="${cliente.id}">
            <div data-v-3d594be1="" class="customer-card_customerData_Ke3s5 d-flex">
                <div data-v-3d594be1="" title="${cliente.name} ${cliente.primer_apellido}" class="b-avatar_avatar_pJzSu" style="width: 40px; height: 40px; flex: 0 0 40px;">
                    <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px;"> ${iniciales} </div>
                </div>
                <div data-v-3d594be1="" class="customer-card_customerContent_Pq14e">
                    <div data-v-3d594be1="" class="customer-card_customerName_clLc6 customer-card_size--16-sb_kPC0E"> ${cliente.name} </div>
                    <div data-v-3d594be1="" class="color-07 size--14">
                        <span data-v-3d594be1="" class="flex inline items-center">
                            <span> ${cliente.telefono || 'No disponible'} </span>
                        </span>
                    </div>
                </div>
                <div data-v-3d594be1="" class="customer-card_customerClose_kMCQ7 flex" onclick="insertartarjetaSeleccionaCliente('${divInfoClienteEnviado}', '${claseDiferenciadora}')">
                    <span data-v-3d594be1="" class="b-icon iconFont icon-x" data-testid="basket-customer-card-close" style="font-size: 20px; align-items: center; display: flex;"></span>
                </div>
            </div>
        </div>
    `);
    clicTarjetasBlancasSelectCliente();
}
// insertar tarjeta cliente seleccionado extentorp
function insertarTarjetaClienteSelecionadoExtentrop(cliente, divInfoClienteEnviado, claseDiferenciadora){
    // //console.log(cliente, "cliente");

    let divInfoCliente = document.querySelector(divInfoClienteEnviado);
    let iniciales = obtenerIniciales(cliente.nombre, cliente.primerApellido);
    $(divInfoCliente).empty();
    $(divInfoCliente).append(`
        <div data-v-3d594be1="" class="b-shadow-card customer-card_customer_PiI9d" data-index="${cliente.id}">
            <div data-v-3d594be1="" class="customer-card_customerData_Ke3s5 d-flex">
                <div data-v-3d594be1="" title="${cliente.nombre} ${cliente.primerApellido}" class="b-avatar_avatar_pJzSu" style="width: 40px; height: 40px; flex: 0 0 40px;">
                    <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px;"> ${iniciales} </div>
                </div>
                <div data-v-3d594be1="" class="customer-card_customerContent_Pq14e">
                    <div data-v-3d594be1="" class="customer-card_customerName_clLc6 customer-card_size--16-sb_kPC0E"> ${cliente.nombre} </div>
                    <div data-v-3d594be1="" class="color-07 size--14">
                        <span data-v-3d594be1="" class="flex inline items-center">
                            <span> ${cliente.telefono || 'No disponible'} </span>
                        </span>
                    </div>
                </div>
                <div data-v-3d594be1="" class="customer-card_customerClose_kMCQ7 flex" onclick="insertartarjetaSeleccionaCliente('${divInfoClienteEnviado}', '${claseDiferenciadora}')">
                    <span data-v-3d594be1="" class="b-icon iconFont icon-x" data-testid="basket-customer-card-close" style="font-size: 20px; align-items: center; display: flex;"></span>
                </div>
            </div>
        </div>
    `);
    clicTarjetasBlancasSelectCliente();
}

//clic en tarjeta cliente seleccionado inserta tarjeta de cliente seleccionado
function funcionClicTrajeta2(cliente){
    let id_cliente = cliente.getAttribute('data-index');
    getClientById(id_cliente).then(function(cliente) {
        let nombreCliente = `${cliente.name} ${cliente.primer_apellido}`;
        if(document.getElementById('offcanvasSelectClient').classList.contains('card_empty_calendarOffcanvas')){
            // //console.log("cliente calendario");
            $('#newReservCalendar').offcanvas('show');
            insertarTarjetaClienteSelecionado(cliente, '.basket-customer-card0101Calendar', 'card_empty_calendar');
            actionButoncloseOffcanvasSelectClient();//quitamos las clases añadidas para diferenciarç
            //si hay muchos servicios new reserv calendar
            if(servicesWithTimes.length > 0){
                // //console.log("array punto lend");
                actualizarEventoClienteArray(nombreCliente);
            }else{
                // //console.log("actualizar evento");
                actualizarEventoCliente(eventIdChangeCalendar, nombreCliente);
            }
        }else if(document.getElementById('offcanvasSelectClient').classList.contains('card_empty_ventasOffcanvas')){
            // //console.log("cliente ventas");
            insertarTarjetaClienteSelecionado(cliente, '.basket-customer-card0101', 'card_empty_ventas');
            actionButoncloseOffcanvasSelectClient();//quitamos las clases añadidas para diferenciar

            //modificar evento
        }else if(document.getElementById('offcanvasSelectClient').classList.contains('card_empty_InfoOffcanvas')){
            insertarTarjetaClienteSelecionado(cliente, '.basket-customer-card0101Info', 'card_empty_info');
            actionButoncloseOffcanvasSelectClient();//quitamos las clases añadidas para diferenciar
            if(servicesWithTimes.length <= 1){
                // //console.log("actualizar evento");
                actualizarEventoCliente(eventIdChangeCalendar, nombreCliente);
            }else{
                // //console.log("array punto lend");
                actualizarEventoClienteArray(nombreCliente);
            }
        }
        $('#offcanvasSelectClient').offcanvas('hide');
    }).catch(function(error) {
    //console.log("Error:", error); // Maneja el caso de error
    });
}


//clic en tarjeta servicios si modal asignar empleado desactivado
function workAsig002(servicio_id, indexModalVentaRapida, precioServicio){
    //console.log(document.querySelector('.service-variant_item_Cye7B').getAttribute('data-bs-toggle'));
    if (document.querySelector('.service-variant_item_Cye7B').getAttribute('data-bs-toggle')=== null) {
        insertDateService(servicio_id, indexModalVentaRapida, precioServicio);
    }
}

//CLIC en el nombre del empleado asignar venta del desplegable
function selectEmpleAMark(indexDivVisualizador, empleNombreAsig, elemento, idEmpleado){
    // //console.log(indexDivVisualizador, empleNombreAsig, "función select emplea");
    let desplegableEmpleados= document.querySelector(`.droponAbrirEmpleA${indexDivVisualizador}`);
    if (desplegableEmpleados) {
        desplegableEmpleados.classList.add('d-none');
    }
    let divNOmbreEmpleA = document.querySelector(`.nombreEmpleadoA${indexDivVisualizador}`);
    divNOmbreEmpleA.textContent = empleNombreAsig;
    divNOmbreEmpleA.setAttribute('data-index', idEmpleado);
            let titleName = document.querySelector(`.titleEmpleadoA${indexDivVisualizador}`);
            titleName.setAttribute("title", empleNombreAsig);
            // //console.log(divNOmbreEmpleA,"ELEMENTO");

            const empleadosConTick = document.querySelectorAll('.select-staffer_highlight_tt5tB .b-icon.iconFont.icon-tick');
            empleadosConTick.forEach(tick => tick.remove()); // Elimina todos los ticks existentes
            let tickSpan = document.createElement('span');
            tickSpan.classList.add('margin-left-auto', 'b-icon', 'iconFont', 'icon-tick');
            tickSpan.style.fontSize = '24px'; // Ajusta el tamaño si es necesario
            elemento.appendChild(tickSpan);
            //cambiar e abatar <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px;"> KP </div>
            let iniciales = obtenerIniciales2(empleNombreAsig);
            $(titleName).empty();
            if (empleNombreAsig === 'No hay asignación de personal') {
                $(titleName).append(`
                    <div class="b-avatar_avatarImage_u3RVD" style="background-image: url(https://d10n9ka7jp2kfo.cloudfront.net/pro/dc6927ba/img/no-staffer.79c3c577.svg);"></div>
                `);
            }else{
                $(titleName).append(`
                    <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px;"> ${iniciales} </div>
                `);
            }
}

//CLIC en el nombre del empleado asignar venta del desplegable boton cambiar
function selectEmpleBotonCambiar(nombreEmpleado, idEmpleado){
    let modalEple = document.getElementById('droponAbrirEmpleBotonCambiar');
    let index_li = modalEple.getAttribute('data-liIndex');
    let encargadoCobro = modalEple.getAttribute('data-encargadocobro');
    let visualizaEncargadoCobro = document.querySelector('.responsableCobro');
    if(encargadoCobro === ''){
        index_li = parseInt(index_li);
        let iniciales = obtenerIniciales2(nombreEmpleado);
        let liElemento = document.querySelector(`.basket-transactions-list li[data-index="${index_li}"]`);
        // //console.log(liElemento, "elemento li", nombreEmpleado, "nombreEmpelado", idEmpleado, "idEmpleado");
        //cambiamos el nombre en el array
        let servicioId88 = liElemento.getAttribute('data-servicio');
        // Recorrer el array
        for (let i = 0; i < serviciosVentaRapida.length; i++) {
            // Comprobamos si el índice coincide con index_li
            if (i === index_li) {
                // Elimina el elemento del array en el índice i
                serviciosVentaRapida[i].nombre_Empleado = nombreEmpleado;
                serviciosVentaRapida[i].id_empleado = idEmpleado;
                break; // Terminamos el bucle después de eliminar el elemento
            }
        }
        // //console.log(serviciosVentaRapida, "arrayCompoleto");

        let divNombre_avatar = liElemento.querySelector('.assigned-staffer_assignedStaffer_cmkGT');
        $(divNombre_avatar).empty();
        if(nombreEmpleado.trim() === 'No hay asignación de personal'){
            $(divNombre_avatar).append(`
                <div title="No hay asignación de personal" class="padding-0 b-avatar_avatar_pJzSu b-avatar_avatarHasImage_i8yay" style="width: 28px; height: 28px;">
                    <div class="b-avatar_avatarImage_u3RVD" style="background-image: url(https://d10n9ka7jp2kfo.cloudfront.net/pro/dc6927ba/img/no-staffer.79c3c577.svg);"></div>
                </div>
                 <div class="lista_li_emple margin-left-8 margin-right-8 size--14 txt--ellipsis size--14-sb" >No hay asignación de personal</div>
                 <button id="uid-${index_li}-inputChangeEmple" data-index="${index_li}" class="index_button_TfmOz index_size--sm_z95WM index_theme--default_AtMGF index_slotTheme--icon_yiHCJ assigned-staffer_assignedStafferButton_XHCi1 margin-left-auto" data-testid="assigned-staffer-edit-commission" data-bs-toggle="modal" data-bs-target="#droponAbrirEmpleBotonCambiar" onclick="showEmpleDesple(this)">
                     <div class="index_slotLeft_p6NJx">
                         <img src="https://d10n9ka7jp2kfo.cloudfront.net/pro/dc6927ba/img/comission-edit.b159197c.svg" class="padding-left-8 b-icon_img_I0kuC" style="height: 14px;"></div>
                     <div class="index_caption_W6r_J"> Cambiar </div>
                 </button>
             `);

        }else{
            $(divNombre_avatar).append(`
                <div title="${nombreEmpleado}" class="padding-0 b-avatar_avatar_pJzSu assigned-staffer_assignedStafferAvatar_tCEbS" style="width: 28px; height: 28px; flex: 0 0 28px;">
                     <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px;">${iniciales}</div>
                </div>
                <div class="lista_li_emple margin-left-8 margin-right-8 size--14 txt--ellipsis size--14-sb">${nombreEmpleado}</div>
                <button id="uid-${index_li}-inputChangeEmple" data-index="${index_li}" class="index_button_TfmOz index_size--sm_z95WM index_theme--default_AtMGF index_slotTheme--icon_yiHCJ assigned-staffer_assignedStafferButton_XHCi1 margin-left-auto" data-testid="assigned-staffer-edit-commission" data-bs-toggle="modal" data-bs-target="#droponAbrirEmpleBotonCambiar" onclick="showEmpleDesple(this)">
                    <div class="index_slotLeft_p6NJx">
                        <img src="https://d10n9ka7jp2kfo.cloudfront.net/pro/dc6927ba/img/comission-edit.b159197c.svg" class="padding-left-8 b-icon_img_I0kuC" style="height: 14px;"></div>
                    <div class="index_caption_W6r_J"> Cambiar </div>
                </button>
            `);
        }
    }else{
        //console.log("lleno");
        visualizaEncargadoCobro.textContent = nombreEmpleado;
        responsableCobroId = idEmpleado;
        let botonesVentaRapidaEna = document.querySelector('.botonesEnabledVentaRapida');
        let botonesVentaRapiDisabled = document.querySelector('.botonesDisabledVentaRapida');
        botonesVentaRapidaEna.classList.remove("d-none");
        botonesVentaRapiDisabled.classList.add('d-none');
    }


}

// abrir cerrar desplegable selec emple asignar venta
function openModalEmpleA(desplegableindex){
    let desplegableAbrirEmpleA = document.querySelector(`.droponAbrirEmpleA${desplegableindex}`);
    desplegableAbrirEmpleA.classList.toggle('d-none'); // La clase 'd-none' oculta el div

}
//función abrir desplegable empleado boton cambiar
function openModalEmpleDesdeBoton(listaNombreCambiar){
    let desplegableAbrirEmpleA = document.querySelector(`.droponAbrirEmpleBotonCambiar`);
    desplegableAbrirEmpleA.classList.toggle('d-none'); // La clase 'd-none' oculta el div

}
function construirTarjetaServiciosTiket(indexli, nombreServicio, duracionServicio, precio, idSErvicio, discountValue){
let discountHtmlTiket = `
    <div class="payment-receipt_receiptAltText_VrnDU payment-receipt_size--12_zJMLU">
        <div class="row">
            <div class="col descuentoTiketFinal"></div>
            <div class="col-auto descuentoTiketFinal">
                <div class="txt--gray"> -${discountValue}% </div>
            </div>
        </div>
    </div>
    `;
    let htmlContentFinalTicket='';
    htmlContentFinalTicket=`
    <div class="margin-bottom-12" data-index="${indexli}" data-servicio="${idSErvicio}" data-discount="${discountValue}">
        <div class="payment-receipt_receiptItem_QWl3W">
            <div class="payment-receipt_receiptItemName_BOOqL"> ${nombreServicio} (${duracionServicio}) </div>
            <div class="payment-receipt_receiptItemQuantity_XWqsy"> x1 </div>
            <div class="payment-receipt_receiptItemTotal_U6yh4 payment-receipt_size--14-sb_r8Zux"> ${precio}€ </div>
        </div>
        ${discountHtmlTiket}
    `;
    return htmlContentFinalTicket;
}

//FUNCIÓN CREAR HTML TARJETAS FINALES CLIC BOTON GUARDAR
function construirHtmlTarjetasVentaRapida(indexli, nombreServicio, duracionServicio, precio, nombreApellidosEmpleado, idSErvicio, discountValue){


    let discountHtml = `
    <div class="row margin-bottom-0">
        <div class="col padding-bottom-0">
            <div class="size--12 color-07 importeDescuento"></div>
        </div>
        <div class="col col-4 padding-bottom-0">
            <div class="size--12 color-07 txt--right porcentajeDescuento"> Descuento ${discountValue}%</div>
        </div>
    </div>
    `;
    let inicialesEmpleado77 =  obtenerIniciales2(nombreApellidosEmpleado.trim());
    let seccionAbatar='';
    if(nombreApellidosEmpleado.trim() === 'No hay asignación de personal'){
        seccionAbatar=`
        <div title="No hay asignación de personal" class="padding-0 b-avatar_avatar_pJzSu b-avatar_avatarHasImage_i8yay" style="width: 28px; height: 28px;">
            <div class="b-avatar_avatarImage_u3RVD" style="background-image: url(https://d10n9ka7jp2kfo.cloudfront.net/pro/dc6927ba/img/no-staffer.79c3c577.svg);"></div>
        </div>
        `;
    }else{
        seccionAbatar=`
        <div title="${nombreApellidosEmpleado}" class="padding-0 b-avatar_avatar_pJzSu assigned-staffer_assignedStafferAvatar_tCEbS" style="width: 28px; height: 28px; flex: 0 0 28px;">
            <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px;">${inicialesEmpleado77}</div>
        </div>
        `;
    }
    let htmlContentTarjetaVentaRapidaFinal = '';
    htmlContentTarjetaVentaRapidaFinal= `
   <li data-index="${indexli}" data-servicio="${idSErvicio}" data-discount="${discountValue}">
        <div class="index_basketRow_CHIX3">
            <div data-testid="basket-row" class="basket-row_basketRow_MnpGk pointer" data-bs-toggle="modal" data-bs-target="#modificarArticulo" onclick="showEditBasket('${indexli}')">
                <div class="row margin-bottom-0 items-baseline">
                    <div class="col col-7 padding-bottom-0">
                        <div class="basket-row_basketRowName_HCisM basket-row_size--14_CO65x">
                            ${nombreServicio} (${duracionServicio})
                        </div>
                    </div>
                    <div class="col col-1 padding-bottom-0">
                        <div class="size--12 color-07 text-center">x1</div>
                    </div>
                    <div class="col padding-bottom-0">
                        <div class="size--14-sb txt--right liPrecio">${precio}€</div>
                    </div>
                </div>

                <div class="row margin-bottom-0">
                    <div class="col padding-bottom-0">
                        <div class="size--12 color-07"></div>
                    </div>
                </div>
            </div>
            `+discountHtml+`
            <div data-testid="assigned-staffer" class="assigned-staffer_assignedStaffer_cmkGT">`+seccionAbatar+`
                <div class="lista_li_emple margin-left-8 margin-right-8 size--14 txt--ellipsis size--14-sb">${nombreApellidosEmpleado}</div>
                <button id="uid-${indexli}-inputChangeEmple" data-index="${indexli}" class="pointert index_button_TfmOz index_size--sm_z95WM index_theme--default_AtMGF index_slotTheme--icon_yiHCJ assigned-staffer_assignedStafferButton_XHCi1 margin-left-auto" data-testid="assigned-staffer-edit-commission" data-bs-toggle="modal" data-bs-target="#droponAbrirEmpleBotonCambiar" onclick="showEmpleDesple(this)">
                    <div class="index_slotLeft_p6NJx">
                        <img src="https://d10n9ka7jp2kfo.cloudfront.net/pro/dc6927ba/img/comission-edit.b159197c.svg" class="padding-left-8 b-icon_img_I0kuC" style="height: 14px;"></div>
                    <div class="index_caption_W6r_J"> Cambiar </div>
                </button>
            </div>
        </div>
    </li>
 `;
 seccionAbatar='';
 return htmlContentTarjetaVentaRapidaFinal;
}

//muestra modal editar cesta
function showEditBasket(liElement_index){
    let liElemento = document.querySelector(`.basket-transactions-list li[data-index="${liElement_index}"]`);
    let modalEditbasket = document.getElementById('modificarArticulo');
    modalEditbasket.setAttribute('data-lista-li', liElement_index);
    //console.log(liElemento, " li EDITAR CESTA");
    let precio = liElemento.querySelector('.liPrecio').textContent;
    let porcentaje = liElemento.querySelector('.porcentajeDescuento').textContent;
    porcentaje =  porcentaje.match(/\d+%/); // Extrae el número seguido del símbolo '%' uid-335-input

    let inputTotalDescuentoServicio = document.getElementById('uid-335-input');
    let importeDescuento11='';
    //console.log(descuentosVentaRapida[parseInt(liElement_index)], "descuentos index li");

    if (descuentosVentaRapida[parseInt(liElement_index)]) {

        // Si el índice existe, modificar el valor
        importeDescuento11 = descuentosVentaRapida[parseInt(liElement_index)].descuentoServicio;
    }
    inputTotalDescuentoServicio.value= importeDescuento11;
    let nameService = liElemento.querySelector('.basket-row_basketRowName_HCisM').textContent;
    document.getElementById('uid-317-input').value = precio;//input del modal
    document.getElementById('uid-319-input').value = porcentaje;
    document.querySelector('.editBasketNameService').textContent = nameService;
}

//actualiza totales venta rápida
function actualizarTotalSubtotal(){
    let totalBasquet1 = 0;

    let totalDescuentosServicios = descuentosVentaRapida.reduce((total, item) => {
        return total + (item.descuentoServicio || 0);
    }, 0);

    let totalDescuentoTotal = descuentoTotal;//variable gloval

    serviciosVentaRapida.forEach(servicio => {
        let precioServicio = parseInt(servicio.precio);
        totalBasquet1 += precioServicio;  // Sumar el precio de cada servicio descuentosVentaRapida
    });
    let totalBasquetSubtotal = totalBasquet1 - totalDescuentosServicios;
    let totalBasquetTotal = totalBasquetSubtotal - totalDescuentoTotal;
    // //console.log(totalBasquet, "totalbasquet");

    // let intTotalBasquet = let num = +str; de string a numero int
    let dibSubtotal = document.querySelector('.divSubtotal');
    let totalPrecio = document.querySelector('.basketTotalPrecio');
    let input_uid317inputMetodoPago = document.getElementById('uid-317-inputMetodoPago');
    dibSubtotal.textContent = totalBasquetSubtotal.toFixed(2).replace('.', ',')+"€";
    totalPrecio.textContent = totalBasquetTotal.toFixed(2).replace('.', ',')+"€";
    input_uid317inputMetodoPago.value = totalBasquetTotal.toFixed(2).replace('.', ',');
}

//crea div para icono nota o corazon evento
function createDivNoteCorazon(){
    let iconDiv = document.createElement('div');
    iconDiv.classList.add('icons_icons_YFduH', 'index_icons_LluzP');
    iconDiv.style.setProperty('--b1c0b092', '16px');
    return iconDiv;
}

// crea imagen nota evento
function createIconNote(){
    let iconImg = document.createElement('img');
    iconImg.classList.add('b-icon_img_I0kuC', 'icons_icon_lMJWA');
    iconImg.src = urlAplicacion + "/storage/calendar/notaCliente.svg";
    iconImg.style.zIndex = '2';
    iconImg.style.left = '5px';
    iconImg.style.position = 'relative';
    return iconImg;
}
function createDivWithNoteCora(div33){
    div33.appendChild(createIconNote());
    div33.appendChild(createIconCorazon());
    return div33;
}
// crea image corazon evento
function createIconCorazon(){
    let iconImgCorazon = document.createElement('img');
    iconImgCorazon.classList.add('b-icon_img_I0kuC', 'icons_icon_lMJWA');
    iconImgCorazon.src = urlAplicacion + "/storage/calendar/corazonRojoPequenio.svg";
    iconImgCorazon.style.zIndex = '1';
    iconImgCorazon.style.left = '0px';
    iconImgCorazon.style.position = 'relative';
    return iconImgCorazon;
}

function createIconPayment(){
    let iconImgPayment = document.createElement('img');
    iconImgPayment.classList.add('b-icon_img_I0kuC', 'icons_icon_lMJWA');
    iconImgPayment.src = urlAplicacion + "/storage/calendar/iconPaiment.svg";
    iconImgPayment.style.zIndex = '1';
    iconImgPayment.style.left = '2px';
    iconImgPayment.style.position = 'relative';
    iconImgPayment.style.width = '13px';
    return iconImgPayment;
}

//CLIC EN BOTON GUARDAR uid-164-input Asignar venta insertDateService('1', '0', '10.00')id_servicio, index, servicio_precio
function insertDateService(servicio_id, indexModalVentaRapida, precioServicio){
    let htmlContentVentaRapida = '';
    let nombreVentaRapida = document.querySelector(`.nombreEmpleadoA${indexModalVentaRapida}`).textContent;
    let id_empleado = document.querySelector(`.nombreEmpleadoA${indexModalVentaRapida}`).getAttribute('data-index');
   console.log(nombreVentaRapida, "nombre empleado");

    //metemos la venta en el array
    insertarServicioEmpleadoArrayVentaRapida(servicio_id, nombreVentaRapida, parseFloat(precioServicio), id_empleado);

    insertarVentaRapidaSoloIds(servicio_id);
    // addServiceDiscountArray();
    let divllenar = document.querySelector('.basketFull');
    let listaTransacciones = document.querySelector('.basket-transactions-list');

    //comprobar si el cesto está vacio
    let divCestoVacio = document.querySelector('.index_basketEmpty_VF3Lr');
    let cestoLleno = divCestoVacio.classList.contains('d-none');
    // //console.log("ESTA tiene cosas? ", cestoLleno);
    if (cestoLleno) {
        //comprobar si lista li tiene atributo data-discount
        getServicesById(serviciosVentaRapida_ids, function (servicios){
            servicios.forEach((servicio, index) => {
                let descuento = serviciosVentaRapida[index].descuento_servicio;
                let li_index = index;
                let servicio_idArray = serviciosVentaRapida[index].idServicio;
                let nombreApellidoEmpleA = serviciosVentaRapida[index].nombre_Empleado;
                let precioAsignar = serviciosVentaRapida[index].precio;
                // Construir HTML construirHtmlTarjetasVentaRapida(nombreServicio, duracionServicio, precio, nombreApellidosEmpleado, inicialesEmpleado)
                htmlContentVentaRapida += construirHtmlTarjetasVentaRapida(
                    li_index,
                    servicio.descripcion,
                    comprobar603090SinM(servicio.duration),
                    precioAsignar,
                    nombreApellidoEmpleA,
                    servicio_idArray,
                    descuento
                );
            });
            // Agregar todo el contenido generado al contenedor nuevo
            $(listaTransacciones).empty();
            $(listaTransacciones).append(htmlContentVentaRapida);
        });
        // actualizar totales
        actualizarTotalSubtotal();
        actualizarDescuentoTotal();
    }
    else{

        divCestoVacio.classList.add('d-none');
        divllenar.classList.remove("d-none");
        getServicesById(serviciosVentaRapida_ids, function (servicios){
            servicios.forEach((servicio, index) => {
                let li_index = index;
                let precioAsignar = serviciosVentaRapida[index].precio;
                let descuento = serviciosVentaRapida[index].descuento_servicio;
                let servicio_idArray = serviciosVentaRapida[index].idServicio;
                let nombreApellidoEmpleA = serviciosVentaRapida[index].nombre_Empleado;
                // Construir HTML construirHtmlTarjetasVentaRapida(nombreServicio, duracionServicio, precio, nombreApellidosEmpleado, inicialesEmpleado)
                htmlContentVentaRapida += construirHtmlTarjetasVentaRapida(
                    li_index,
                    servicio.descripcion,
                    comprobar603090SinM(servicio.duration),
                    precioAsignar,
                    nombreApellidoEmpleA,
                    servicio_idArray,
                    descuento
                );
            });
            $(listaTransacciones).empty();
            $(listaTransacciones).append(htmlContentVentaRapida);
        });
        actualizarTotalSubtotal();
    }
}

function showEmpleDesple(boton){
    let modalSelecEmpleaBoton = document.getElementById('droponAbrirEmpleBotonCambiar');
    let index = boton.getAttribute('data-index');
    let optionSinAsingacion = document.querySelector('.sinAsignacionEmpleado');
    modalSelecEmpleaBoton.setAttribute('data-liIndex', index);
    let encargadoCobro = boton.getAttribute('data-responsable');
    if (encargadoCobro) {
        modalSelecEmpleaBoton.setAttribute('data-encargadoCobro', encargadoCobro);
        optionSinAsingacion.style.pointerEvents = 'none';
        optionSinAsingacion.style.opacity = '0.8';
    }else{
        modalSelecEmpleaBoton.setAttribute('data-encargadoCobro', '');
        optionSinAsingacion.style.pointerEvents = 'auto';  // Vuelve a permitir eventos del puntero
        optionSinAsingacion.style.opacity = '1';
    }
}



//controla boton eliminar desde el modal modificar cesta
let botonRemoveItemVentaRapida = document.querySelector('.buttonRemoveItem');
if (botonRemoveItemVentaRapida) {
    botonRemoveItemVentaRapida.addEventListener('click', function(event){
        event.preventDefault();
        let index_li = document.getElementById('modificarArticulo').getAttribute('data-lista-li');

        let elemento_li = document.querySelector(`.basket-transactions-list li[data-index="${index_li}"]`);
        // Recorrer el array
        //convierto string a int
        let numIndexLi = parseInt(index_li);  // Convierte el string en un número
        // Filtramos el array para eliminar el objeto con el idServicio igual al index
        for (let i = 0; i < serviciosVentaRapida.length; i++) {
            // Comprobamos si el índice coincide con index_li
            if (i === numIndexLi) {
                // Elimina el elemento del array en el índice i
                serviciosVentaRapida_ids.splice(i, 1);
                serviciosVentaRapida.splice(i, 1);
                break; // Terminamos el bucle después de eliminar el elemento
            }
        }
         //lo elimino de la vista
        if (elemento_li) {
            elemento_li.remove();
        }
        // actualizarTotalSubtotal();
    });
}

//controla el botón guardar modal modificar cesta
let botonGuardarItemVentaRapida = document.getElementById('uid-339-input');
if (botonGuardarItemVentaRapida) {
    botonGuardarItemVentaRapida.addEventListener('click', function(event){
        event.preventDefault();
        //obtenemos la etiqueta li a modificar = index del array
        let index_li = document.getElementById('modificarArticulo').getAttribute('data-lista-li');
        let elemento_li = document.querySelector(`.basket-transactions-list li[data-index="${index_li}"]`);
        //obtengo div precio
        let li_precio = elemento_li.querySelector('.liPrecio');
        //obtengo el precio desde el modal
        let precioModal = document.getElementById('uid-317-input').value;//modal
        //actualizo la vista
        precioModal.includes("€") ? li_precio.textContent = precioModal : li_precio.textContent = precioModal+"€";

        //console.log(elemento_li);
        //comprobar descuento %
        let descuentoModal1 = document.getElementById('uid-319-input').value;
        let descuentoModalAtribute = document.getElementById('uid-319-input').value;
        if (descuentoModalAtribute.includes("%")) {
            descuentoModalAtribute = descuentoModalAtribute.replace("%", "");  // Elimina el símbolo '%'
        }
        let descuentoModal = descuentoModal1.includes("%") ? descuentoModal1 : descuentoModal1+"%";
        //console.log(descuentoModal, "descuentoModal");
        //añadimos atributo data-discount para montar tarjetas
        elemento_li.setAttribute('data-discount', descuentoModalAtribute);
        //actualizo vista descuento
        let divDescuento = elemento_li.querySelector('.porcentajeDescuento');
        divDescuento.textContent = 'Descuento '+descuentoModalAtribute+'%';

        // actualizar total y subtotal porcentajeDescuento
        //añadimos descuento en array
        //console.log(serviciosVentaRapida, "guardar modificar antes ");

        actualizarDescuentoPrecioArrayVentaRapida(index_li);
        //console.log(serviciosVentaRapida, "guardar modificar despues ");
        addServiceDiscountArray(index_li);
        actualizarTotalSubtotal();
        actualizarDescuentoTotal();
    });
}

//FUNCION CONTROLA DOS DECIMALES INPUT PRECIO
function formatCurrencyOnBlur(input) {
    let value = input.value.trim();

    // Si el campo está vacío, asignar valor enviado
    if (value === '') {
        value = '0.00';
    }

    // Eliminar cualquier carácter no numérico y dejar el punto decimal
    value = value.replace(/[^\d.]/g, '');

    // Verificar si tiene un punto decimal
    if (value.indexOf('.') === -1) {
        // Si no tiene punto, agregar ".00"
        value = value + '.00';
    } else {
        let parts = value.split('.');

        // Limitar los decimales a dos
        parts[1] = (parts[1] || '').substring(0, 2);

        // Si solo tiene un decimal, agregar 0
        if (parts[1].length === 1) {
            parts[1] = parts[1] + '0';
        }

        value = parts.join('.');
    }

    // Actualizar el valor del input con el nuevo formato
    input.value = value;
}

//al clicar pierde el string %
function removePercentage(input) {
    // Eliminar el '%' si está presente en el valor del input
    if (input.value.endsWith('%')) {
        input.value = input.value.slice(0, -1); // Elimina el último carácter '%'
    }
}

//FUNCIÓN QUE CONTROLA PONER EL PORCENTAJE AL FINAL EN EL INPUT
function formatDiscountRate(input) {
    let value = input.value.trim();

    // Si el campo está vacío, asignar 0
    if (value === '') {
        value = '0';
    }

    // Eliminar cualquier carácter no numérico
    value = value.replace(/[^\d]/g, '');

    // Asegurar que el valor termine con el símbolo de porcentaje
    if (!value.endsWith('%')) {
        value = value + '%';
    }

    // Actualizar el valor del input con el nuevo formato
    input.value = value;
}

//FUNCIÓN CALCULA EL TOTAL DEL DESCUENTO NOW
function updateDiscount() {
    // Obtener los valores de los campos
    const price = parseFloat(document.getElementById('uid-317-input').value) || 0; // El precio modal
    const discountRate = parseFloat(document.getElementById('uid-319-input').value.replace('%', '')) || 0; // El porcentaje de descuento

    // Calcular el importe del descuento
    const discountPrice = (price * discountRate) / 100;

    // Actualizar el campo de "importe del descuento" con el resultado
    document.getElementById('uid-335-input').value = discountPrice.toFixed(2); // Mostrar con 2 decimales
}
function actualizarPorcentajeTotal(){
    let divPorcentaje33 = document.querySelector('.basket-discountPorcentajeShow').textContent;
    document.getElementById('uid-totalDescuento-input').value = divPorcentaje33;
    //console.log(divPorcentaje33, "porcentaje cajetin");
    if (divPorcentaje33.endsWith('%')) {
        divPorcentaje33 = divPorcentaje33.slice(0, -1); // Elimina el último carácter '%'
    }
    divPorcentaje33 = parseFloat(divPorcentaje33);

}

function actualizarDescuentoTotal(){
    let subtotal15= document.querySelector('.divSubtotal').textContent;
    if (subtotal15.endsWith('€')) {
        subtotal15 = subtotal15.slice(0, -1); // Elimina el último carácter '%'
    }
    subtotal15 = parseFloat(subtotal15);
    let porcentaje115 = document.querySelector('.basket-discountPorcentajeShow').textContent;

    if(porcentaje115){
        if(porcentaje115.endsWith('%')){
            porcentaje115 = porcentaje115.slice(0, -1);
        }
        porcentaje115 = parseFloat(porcentaje115);
    }
    const discountTotalPrice115 = (subtotal15 * porcentaje115) / 100;
    descuentoTotal = discountTotalPrice115;
    //console.log(descuentoTotal, "descuentoTotalarray", discountTotalPrice115, "importedescuento");

    actualizarTotalSubtotal();
    document.querySelector('.basket-discountShow').textContent= discountTotalPrice115+"€";
    //console.log(descuentoTotal, "descuentoTotalarray");

}

//boton guardar descuento total
let botonDescuentoTotal = document.getElementById('uid-guardarDescuentoTotal-input');
if (botonDescuentoTotal) {
    botonDescuentoTotal.addEventListener('click', function(event){
        event.preventDefault();

        let porcentajeDescuentoTotal = document.getElementById('uid-totalDescuento-input').value;
        let subtotalDescuentoTotal =  document.querySelector('.divSubtotal').textContent;
        // //console.log(porcentajeDescuentoTotal, "porcentajeTotal", totalPrecio, "precioTotal", subtotalDescuentoTotal, "subtotal importe");
        if (porcentajeDescuentoTotal.endsWith('%')) {
                porcentajeDescuentoTotal = porcentajeDescuentoTotal.slice(0, -1); // Elimina el último carácter '%'
            }

        if (subtotalDescuentoTotal.endsWith('€')) {
                subtotalDescuentoTotal = subtotalDescuentoTotal.slice(0, -1); // Elimina el último carácter '%'
            }

        porcentajeDescuentoTotal = parseFloat(porcentajeDescuentoTotal);
        // totalPrecio = parseFloat(totalPrecio);
        subtotalDescuentoTotal = parseFloat(subtotalDescuentoTotal);
        // //console.log(porcentajeDescuentoTotal, "porcentajeTotal", totalPrecio, "precioTotal", subtotalDescuentoTotal, "subtotal importe");
         // Calcular el importe del descuento
        const discountTotalPrice = (subtotalDescuentoTotal * porcentajeDescuentoTotal) / 100;
        // const totalPriceShow = subtotalDescuentoTotal - discountTotalPrice;
        let formattedPrice = new Intl.NumberFormat('de-DE', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(discountTotalPrice);
        // //console.log(formattedPrice, "importen con dos decimaes");
        let visualizaImporteDescuentoTotal = document.querySelector('.basket-discountShow');
        descuentoTotal = discountTotalPrice;

        visualizaImporteDescuentoTotal.textContent = formattedPrice+"€";
        document.querySelector('.basket-discountPorcentajeShow').textContent=porcentajeDescuentoTotal+"%";
        actualizarTotalSubtotal();
    });
}

// //clic en el botón continuar
// var botonContinuar23 = document.getElementById('uid-139-input');
// if(botonContinuar23){
//     botonContinuar23.addEventListener('click', function(event){
//         event.preventDefault(); // Evitar comportamiento predeterminado
//         let div_HlQSH = document.querySelector('.basket-layout_basketWrapper_HlQSH');
//         let input_uid317inputMetodoPago = document.getElementById('uid-317-inputMetodoPago');
//         let importePago = document.querySelector('.basketTotalPrecio').textContent;
//         let botonCambiarTitulo= document.querySelector('.botonCambiarTitulo');
//         // Agregar la clase 'hidden' para hacer desaparecer el div gradualmente
//         div_HlQSH.classList.add('hidden33');

//         // Esperar un tiempo (la duración de la transición) antes de mostrarlo nuevamente
//         setTimeout(function() {
//             div_HlQSH.classList.remove('hidden33');
//             showDiv('index_checkoutView_pvF8_VistaPagos');
//             input_uid317inputMetodoPago.value= importePago;
//             botonCambiarTitulo.textContent= "COBRAR";
//         }, 1000);
//         //console.log("clic en continuar");
//     });
// }

//clic en el botón continuar
function continueButtonPayment(){
    let div_HlQSH = document.querySelector('.basket-layout_basketWrapper_HlQSH');
    let input_uid317inputMetodoPago = document.getElementById('uid-317-inputMetodoPago');
    let importePago = document.querySelector('.basketTotalPrecio').textContent;
    let divBotonPagar123= document.querySelector('.insertPayButton');
    // Agregar la clase 'hidden' para hacer desaparecer el div gradualmente
    div_HlQSH.classList.add('hidden33');

    // Esperar un tiempo (la duración de la transición) antes de mostrarlo nuevamente
    setTimeout(function() {
        div_HlQSH.classList.remove('hidden33');
        showDivPagos('index_checkoutView_pvF8_VistaPagos');
        input_uid317inputMetodoPago.value= importePago;
        $(divBotonPagar123).empty();
        $(divBotonPagar123).append(`
            <button onclick="insertTargetPayment();" id="uid-1487-inputCobrar" class="index_button_TfmOz index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt index_resolveBtn_PxyxB" data-testid="continue-btn" style="width: 100%;">
                <div class="index_caption_W6r_J botonCambiarTitulo"> COBRAR </div>
            </button>
            `);
    }, 1000);
    //console.log("clic en continuar");
}
// var botonContinuar23 = document.getElementById('uid-139-input');
// if(botonContinuar23){
//     // if(botonContinuar23.textContent === "Continuar")
//     botonContinuar23.addEventListener('click', function(event){

//     });
// }


/// MÉTODOS DE PAGO

//cuando hacen clic en un método de pago click metodo pago
var metodosPado = document.querySelectorAll('.margin-bottom32MetodoPago .payment-types_col_ius7E');
metodosPado.forEach(function (metodo) {
    metodo.addEventListener('click', function(event){
        event.preventDefault(); // Evitar comportamiento predeterminado
        resetModalEfectivo();
        resetModalTarjeta();

        let tipoPago = metodo.getAttribute('data-type');
        let  inputPreciApagar = document.getElementById('uid-317-inputMetodoPago');
        inputPreciApagar.setAttribute('data-type', tipoPago);
        let elementoTipoPago2 = document.querySelector('.tipoPago2');
        // var elementoTipoPago2 = document.querySelector('[data-tipoPago2="efectivo"]');
        elementoTipoPago2.setAttribute('data-tipoPago2', tipoPago);
        // Primero, eliminar la clase de cualquier div que esté actualmente activo en todos los métodos

        let importePago = document.querySelector('.basketTotalPrecio').textContent;
        inputPreciApagar.value = importePago;
        document.querySelector('.cambio_800').textContent = "0,00";
        // if(tipoPago === "efectivo"){
            removePayC();
            validarBorde();
            calcularCambio();
        // }
        //console.log("clic en metodo");
        var metodoActivo = document.querySelector('.payment-types_paymentMethodActive_vBa20');
        if (metodoActivo) {
            metodoActivo.classList.remove('payment-types_paymentMethodActive_vBa20');
        }

        // Luego, agregar la clase al div contiguo dentro del método clicado
        var divContiguo = metodo.querySelector('div'); // Esto asume que es el primer div dentro de 'metodo'
        if (divContiguo) {
            divContiguo.classList.add('payment-types_paymentMethodActive_vBa20');
        }
    });
});


//cuando hacen clic en la cantidad a pagar uid-317-inputMetodoPago
const inputPreciApagar = document.getElementById('uid-317-inputMetodoPago');
if(inputPreciApagar){
    inputPreciApagar.addEventListener('click', function(event){
        event.preventDefault(); // Evitar comportamiento predeterminado
        // let tipoPago= inputPreciApagar.getAttribute('data-type');
        validarBorde();
        calcularCambio();
        let tipoPago = document.querySelector('.tipoPago2').getAttribute('data-tipopago2');

        if (tipoPago === 'efectivo') {
            var myModal = new bootstrap.Modal(document.getElementById('modalIntroducirImporte33'));
            myModal.show();
        }else if(tipoPago === 'suscirpcion' || tipoPago ===  'tarjetaRegalo' || tipoPago === 'bonoSesiones'){
            //modal encontrar tarjeta
        }else{
            var myModal = new bootstrap.Modal(document.getElementById('modalIntroducirImporte33Tarjetas'));
            myModal.show();
            let importePago = document.querySelector('.basketTotalPrecio').textContent;
            let inputPagoTarjeta = document.getElementById('uid-730-input');
            inputPagoTarjeta.value = importePago;
            //modal con restante boton_deshabilitado
        }


        //console.log("clic en input importe pagado");
    });
}


//resetea modal efectio
function resetModalEfectivo(){
    document.getElementById('uid-3034-input').value='';
    document.getElementById('uid-183-input').value='';
}

//resetea modal tarjeta
function resetModalTarjeta(){
    document.getElementById('uid-730-input').value = document.querySelector('.basketTotalPrecio').textContent;;
    document.querySelector('.divInputRestante').textContent = "0,00";
}
//resetea totales
function resetTotales063(){
    document.getElementById('uid-317-inputMetodoPago').value = document.querySelector('.basketTotalPrecio').textContent;
    document.querySelector('.divInputRestante').textContent = "0,00";
}
//convierte string en numero solo numero
function convertirEnNumeroSolo(string){
    if (string.endsWith('€')) {
        string = string.slice(0, -1); // Elimina el último carácter '%'
    }
    let numero = parseFloat(string.replace(',', '.'));
   return numero
}


//validar importe no sea maryor que importe cesta pago tarjeta
var inputImporteTarjeta = document.getElementById('uid-730-input');
if (inputImporteTarjeta) {
    inputImporteTarjeta.addEventListener('input', function() {
        var importeExterior = convertirEnNumeroSolo(document.querySelector('.basketTotalPrecio').textContent);
        var importeInterior = convertirEnNumeroSolo(inputImporteTarjeta.value);
        //console.log(importeInterior, "importe interior", importeExterior, "importe exterior");
        let cantidadCero_inferior = document.querySelector('.cantidadCero_inferior');
        let botonHabilitado = document.getElementById('uid-3039-inputTarjeta');
        if (importeInterior > importeExterior) {

                cantidadCero_inferior.textContent="El importe no puede superar la cantidad de: "+importeExterior.toFixed(2).replace('.', ',')+"€";
                cantidadCero_inferior.classList.remove('d-none');

                botonHabilitado.classList.add('boton_deshabilitado');

            inputImporteTarjeta.value = importeExterior;
        }else{
            cantidadCero_inferior.classList.add('d-none');
            botonHabilitado.classList.remove('boton_deshabilitado');
        }
    });
}


// Crear una función para generar el HTML de cada fila
function generarFilaPagoCombinado(importe1, tipoPago1, resto, tipoPago2) {
    return `
        <div>
                <div class="row items-center margin-bottom-16">
                    <div class="col col-4">
                        <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_size--md_sPOha styles_theme--default_x92vh styles_slotTheme--default_vYr1T">
                            <div class="styles_outerWrapper_NumuG" style="min-width: 0px;">
                                <div class="styles_labelWrapper_isbmo">
                                    <label class="styles_label_hleTI"> Cantidad </label>
                                </div>
                                <div class="styles_wrapper_hb1CA">
                                    <div class="styles_slotLeft_k29Ng"> € </div>
                                    <input value="${importe1}€" placeholder="" data-testid="amount" id="uid-834-inputImporte1" name="amount" readonly="readonly" type="text" autocomplete="on" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_size--md_sPOha styles_theme--default_x92vh styles_slotTheme--blank_iI8Uf styles_slotTheme--default_vYr1T">
                            <div class="styles_outerWrapper_NumuG" style="min-width: 0px;">
                                <div class="styles_labelWrapper_isbmo">
                                    <label class="styles_label_hleTI"> Método de pago </label>
                                </div>
                                <div class="styles_wrapper_hb1CA">
                                    <input data-tipoPago="${tipoPago1}" value="${tipoPago1}" placeholder="" data-testid="label" id="uid-835-inputResto1" name="label" readonly="readonly" type="text" autocomplete="on" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none;"  onclick="mostrarModalOpciones007('uid-835-inputResto1')">
                                    <div class="styles_slotRight_TkOzM">
                                        <span class="b-icon iconFont icon-arrow-down"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-auto txt--right flex">
                        <span onclick="removePayC();" class=" color-11 margin-top-4 pointer b-icon iconFont icon-x" style="font-size: 24px;"></span>
                    </div>
                </div>
            </div>
            <div>
            <div class="row items-center margin-bottom-16">
                <div class="col col-4">
                    <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_size--md_sPOha styles_theme--default_x92vh styles_slotTheme--default_vYr1T">
                        <div class="styles_outerWrapper_NumuG" style="min-width: 0px;">
                            <div class="styles_labelWrapper_isbmo">
                                <label class="styles_label_hleTI"> Cantidad </label>
                            </div>
                            <div class="styles_wrapper_hb1CA">
                                <div class="styles_slotLeft_k29Ng"> € </div>
                                <input value="${resto}" placeholder="" data-testid="amount" id="uid-834-inputImporte2" name="amount" readonly="readonly" type="text" autocomplete="on" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_size--md_sPOha styles_theme--default_x92vh styles_slotTheme--blank_iI8Uf styles_slotTheme--default_vYr1T">
                        <div class="styles_outerWrapper_NumuG" style="min-width: 0px;">
                            <div class="styles_labelWrapper_isbmo">
                                <label class="styles_label_hleTI"> Método de pago </label>
                            </div>
                            <div class="styles_wrapper_hb1CA">
                                <input data-tipoPago="${tipoPago2}" value="${tipoPago2}" placeholder="" data-testid="label" id="uid-835-inputResto2" name="label" readonly="readonly" type="text" autocomplete="on" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none;" onclick="mostrarModalOpciones007('uid-835-inputResto2')">
                                <div class="styles_slotRight_TkOzM">
                                    <span class="b-icon iconFont icon-arrow-down"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-auto txt--right flex">
                    <span onclick="removePayC();" class="color-11 margin-top-4 pointer b-icon iconFont icon-x" style="font-size: 24px;"></span>
                </div>
            </div>
        </div>
    `;
}

//clic en el input abrir modal cambio tipo pago
function mostrarModalOpciones007(id_input){
    document.getElementById('modalCambiarMetodoPago').setAttribute('data-idImput', id_input);
    let inputCambioTipoPago003 = document.getElementById('uid-835-inputResto1');
    let tipoPagoOcultar = inputCambioTipoPago003.getAttribute('data-tipopago');
    //console.log(tipoPagoOcultar, " tipo pago, clic para abrir modal cambio tipo pago");
    var elementos0069 = document.querySelectorAll('#modalCambiarMetodoPago .metodoPago004');
    // Iteramos sobre los elementos encontrados y mostramos el contenido de cada uno
    elementos0069.forEach(function(elemento0069) {
        // //console.log(elemento0069.textContent.trim(), "metodoPago004");
        if(elemento0069.textContent.trim() === tipoPagoOcultar.trim()){
            //console.log(elemento0069.textContent.trim(), "Si son iguales", tipoPagoOcultar.trim());
            elemento0069.classList.add('d-none');
        }else{
            //console.log(elemento0069.textContent.trim(), "No son iguales", tipoPagoOcultar.trim());
            elemento0069.classList.remove('d-none');
        }
        // //console.log(elemento.textContent); // Muestra el contenido de cada div con clase "metodoPago004"
    });
    var myModal = new bootstrap.Modal(document.getElementById('modalCambiarMetodoPago'));
        myModal.show(); // Abre el modal
}

//clic en tarjetas modal cambio método pago
var elementos0070 = document.querySelectorAll('#modalCambiarMetodoPago .metodoPago004');
if (elementos0070) {
        // Iteramos sobre los elementos encontrados y mostramos el contenido de cada uno
        elementos0070.forEach(function(elemento0070) {
            elemento0070.addEventListener('click', function(event){
                let id_input0006 = document.getElementById('modalCambiarMetodoPago').getAttribute('data-idimput');
                //console.log(elemento0070.textContent.trim()," clic en tarjeta", id_input0006, "id del imput");
                document.getElementById(id_input0006).value = elemento0070.textContent.trim();
                // event.preventDefault();
                // let input900_id = document.getElementById('modalCambiarMetodoPago').getAttribute('data-idimput');
                // document.getElementById(input900_id).value = elemento0070.textContent;
            });
        });
}


//función para eliminar los pagos combinados y abrir el normal
function removePayC(){
     let divMostrarCambio005 = document.querySelector('.cambioMostrarOcultar');
    let pagoCombinado105 = document.querySelector('.pagoCombinado66');
    $(pagoCombinado105).empty();
    divMostrarCambio005.classList.remove('d-none');
    //console.log("clic en elliminar pagocombindo");
    let inputPrincipalPago = document.getElementById('uid-317-inputMetodoPago');
    inputPrincipalPago.setAttribute('data-type', 'efectivo');
    //ponemos active efectivo metodo pago
    aniadirActiveMetodoPago('efectivo');

    validarBorde();
}

//añade active al método pago seleccionado
function aniadirActiveMetodoPago(dataType){
    var metodoActivo = document.querySelector('.payment-types_paymentMethodActive_vBa20');
    if (metodoActivo) {
        metodoActivo.classList.remove('payment-types_paymentMethodActive_vBa20');
    }
    var metodoActivar = document.querySelector(`[data-type="${dataType}"]`);
    var divContiguo005 = metodoActivar.querySelector('div');
    if (divContiguo005) {
        divContiguo005.classList.add('payment-types_paymentMethodActive_vBa20');
    }
}

//clic en boton guardar del modal introducir importe tarjeta modal todo menos efectivo
var botonGuardarImporteTarjeta = document.getElementById('uid-3039-inputTarjeta');
if (botonGuardarImporteTarjeta) {
    botonGuardarImporteTarjeta.addEventListener('click', function(event){
        event.preventDefault();
        let inputImporteTarjeta120 = document.getElementById('uid-730-input');
        let importeTrajeta120 = convertirEnNumeroSolo(inputImporteTarjeta120.value);

        let botonHabilitado = document.getElementById('uid-3039-inputTarjeta');
        let cantidadCero_inferior = document.querySelector('.cantidadCero_inferior');
        let tipoPago033 = document.querySelector('.tipoPago2').getAttribute('data-tipoPago2');
        if(inputImporteTarjeta.value < 1){
            cantidadCero_inferior.textContent= "Introduce una cantidad superior a 0€";
            cantidadCero_inferior.classList.remove('d-none');

            botonHabilitado.classList.add('boton_deshabilitado');
        }else{
            cantidadCero_inferior.classList.add('d-none');
            botonHabilitado.classList.remove('boton_deshabilitado');
            let importeRestante01 = document.querySelector('.divInputRestante').textContent;
            //console.log(importeRestante01, "importe restante01");
            $('#modalIntroducirImporte33Tarjetas').modal('hide');
            if(importeRestante01.trim() === '0,00'){
                // document.querySelector('.pagoCombinado66').classList.add('d-none');

            }else{
                aniadirActiveMetodoPago('Pago fraccionado');
                let divCambio = document.querySelector('.cambioMostrarOcultar');
                divCambio.classList.add('d-none');
                let divCombinado = document.querySelector('.pagoCombinado66');

                // Construir el contenido HTML con los datos dinámicos
                let contenido = `
                ${generarFilaPagoCombinado(importeTrajeta120.toFixed(2), tipoPago033 ,importeRestante01, 'Efectivo')}
                `;

                // Insertar el contenido generado en el contenedor
                $(divCombinado).append(contenido);
            }


        }

    });
}


//calcular importe restante modal introducir importe tarjeta
let inputEntrada126 = document.getElementById('uid-730-input');
function comprobarResto(){
    let divRestante = document.querySelector('.divInputRestante');
    let importeTotalCestaRestante = document.querySelector('.basketTotalPrecio').textContent;
    let valorInputEntrada126 = convertirEnNumeroSolo(inputEntrada126.value);
    importeTotalCestaRestante = convertirEnNumeroSolo(importeTotalCestaRestante);
    // //console.log(valorInputEntrada126, "inputEntrada", importeTotalCestaRestante," impoteCesta-------resto");
    let restante = importeTotalCestaRestante - valorInputEntrada126;

    // Mostrar el importe restante en el div
    divRestante.textContent = restante >= 0 ? restante.toFixed(2).replace('.', ',')+"€" : "0,00€";
}

if (inputEntrada126) {
    inputEntrada126.addEventListener('input', function() {
        comprobarResto();
        });
}


//clic en el boton cancelar modal importe tarjeta
let botonCancelarpagotarjeta55 = document.getElementById('uid-223-input-cancelarCantidadTarjetas');
if (botonCancelarpagotarjeta55) {
    botonCancelarpagotarjeta55.addEventListener('click', function(event){
        event.preventDefault();
        document.querySelector('.divInputRestante').textContent="0,00";
        $('#modalIntroducirImporte33Tarjetas').modal('hide');
    });
}



//clic boton cancelar modal efectivo
let botonCancelarpagoEfectivo20 = document.getElementById('uid-223-input-cancelarCantidad');
if (botonCancelarpagoEfectivo20) {
    botonCancelarpagoEfectivo20.addEventListener('click', function(event){
        event.preventDefault();
        resetModalEfectivo();
        validarBorde();
        resetTotales063();
        // $('#modalIntroducirImporte33Tarjetas').modal('hide');
    });
}


//PONE BORDE ROJO SI CANTIDAD INFERIOR A IMPORTE
var inputMetodoPago = document.getElementById('uid-3034-input');
var bordeCambiarColor = document.querySelector('.styles_outerWrapper_NumuGIntroducirImporte');
var botonDeshabilitado = document.getElementById('uid-3039-input');

// Función para comprobar el valor y cambiar el borde
function validarBorde() {
    let importePago = document.querySelector('.basketTotalPrecio').textContent;//IMPORTE DE LA CESTA
    //console.log(importePago, "valor importe pago texcontent");

    if (importePago.endsWith('€')) {
        importePago = importePago.slice(0, -1); // Elimina el último carácter '%'
        //console.log(importePago, "valor dentro if");
    }
    importePago = parseFloat(importePago.replace(',', '.'));
    // Comprobamos si el valor del input es un número y si es mayor o igual al importePago
    if (parseFloat(inputMetodoPago.value) >= importePago) {
        bordeCambiarColor.style.border = '1px solid #ebebeb'; // Restablecer el borde
        botonDeshabilitado.classList.remove('boton_deshabilitado');
    } else {
        bordeCambiarColor.style.border = '2px solid red'; // Borde rojo
        botonDeshabilitado.classList.add('boton_deshabilitado');
    }
}

// Función que calcula el cambio y actualiza el campo correspondiente
function calcularCambio() {
    let inputCambio = document.getElementById('uid-183-input');

    // Obtener el valor introducido por el usuario (cantidad recibida)
    let cantidadRecibida = convertirEnNumeroSolo(inputMetodoPago.value);  //parseFloat(inputMetodoPago.value.replace(',', '.'));
    let importePago = document.querySelector('.basketTotalPrecio').textContent; // IMPORTE DE LA CESTA
    // //console.log(cantidadRecibida,"cantidad redibida desde arriba ");

    // Convertir el valor de importePago a número flotante
    importePago = convertirEnNumeroSolo(importePago);
    //console.log(importePago, "importePago despu parsefloat");
    //console.log(cantidadRecibida, "cantidadRecibica", importePago, "imñortepago");
    // Comprobamos que la cantidad recibida sea un número válido y que sea mayor o igual que el importe
    if (!isNaN(cantidadRecibida) && cantidadRecibida >= importePago) {
        //console.log(cantidadRecibida, "cantidadRecibica", importePago, "imñortepago");

        let cambio = cantidadRecibida - importePago; // Calculamos el cambio
        //console.log(cambio, "cambio arriba------------");
        // Actualizamos el campo del cambio con dos decimales
        inputCambio.value = cambio.toFixed(2); // Se muestra con dos decimales
        //console.log(cambio, "cambio------------");
    } else {
        // Si el valor es inválido o no suficiente, limpiamos el campo de cambio
        inputCambio.value = '';
    }
}



// Añadimos el eventListener para que valide cuando el valor del input cambie
if (inputMetodoPago) {
    inputMetodoPago.addEventListener('input', function() {
        validarBorde();
        calcularCambio();
    });
}

// También podemos realizar una validación al cargar la página para establecer el estado inicial
// validarBorde();
// calcularCambio();


//clic en el boton guardar del modal introducir precio
let botonGuardarPrecioIntroducido = document.getElementById('uid-3039-input');
if(botonGuardarPrecioIntroducido){
    botonGuardarPrecioIntroducido.addEventListener('click', function(event){
        event.preventDefault();
        var inputMetodoPagovalor = document.getElementById('uid-3034-input').value;
        let visualizadorFinalImporte = document.getElementById('uid-317-inputMetodoPago');
        let inputCambiovalor = document.getElementById('uid-183-input').value;
        let visualizadoCambio = document.querySelector('.cambio_800');
        //console.log(inputMetodoPagovalor, "valor principal", inputCambiovalor, "cambio");
        visualizadorFinalImporte.value = parseFloat(inputMetodoPagovalor).toFixed(2)+"€"; // Se muestra con dos decimales
        visualizadoCambio.textContent= parseFloat(inputCambiovalor).toFixed(2).replace('.', ',')+' €';

    });
}

// CLIC EN NO VOLVER A MOSTRA MODAL ASIGNAR EMPLEADO
// Seleccionamos el input y el div contenedor
const checkbox001 = document.getElementById('uid-288-dont-ask-again');
const replacementDiv = document.querySelector('.input-checkbox_replacement_dMLsR');

// Agregamos un event listener para el evento 'change' en el checkbox
if (checkbox001) {
    checkbox001.addEventListener('change', function() {
        // Comprobamos si el checkbox está marcado
        let listaItems410 = document.querySelectorAll('.service-variant_item_Cye7B');
        let totalItems410 = listaItems410.length;
        if (checkbox001.checked) {
            // Si está marcado, agregamos la clase al div y cambiamos el valor del input a "true"
            replacementDiv.classList.add('input-checkbox_replacementChecked_uxNiJ');
            checkbox001.value = "true";

            listaItems410.forEach(function(item410) {
               item410.removeAttribute('data-bs-toggle');
               item410.removeAttribute('data-bs-target');
             });
        } else {
            // Si no está marcado, quitamos la clase del div y cambiamos el valor del input a "false"
            replacementDiv.classList.remove('input-checkbox_replacementChecked_uxNiJ');
            checkbox001.value = "false";
            listaItems410.forEach(function(item410, totalItems410) {
                item410.setAttribute('data-bs-toggle', 'modal');
                item410.setAttribute('data-bs-target', '#asignarVenta'+totalItems410);
              });
        }
    });
}
function reseteoVistaVentaPago(){
    reseteoVistaVenta();
    let divContenedorTicket = document.querySelector('.index_checkoutView_oS9m6Secundario');
    let divContenedorTicketPrincipal = document.querySelector('.index_checkoutView_oS9m6Principal');
    $(divContenedorTicket).empty();
    divContenedorTicketPrincipal.classList.remove('d-none');

}
function reseteoVistaVenta(){
    let contenedorTarjetasServiciosCalendar = document.querySelector('.appointment-card_appointment_F_IwZ');
    if(contenedorTarjetasServiciosCalendar){
        let divContenedorFechaHora = document.querySelector('.appointment-date_date_UsCxi');
        $(divContenedorFechaHora).empty();
        document.querySelector('.statusReservaCalendarCobrar').textContent = '';
        $('.tarjetasServiciosCobrarCalendar056').empty();
        contenedorTarjetasServiciosCalendar.style.display = 'none';
    }
    let div_HlQSH = document.querySelector('.basket-layout_basketWrapper_HlQSH');
    div_HlQSH.classList.add('hidden33');
    serviciosVentaRapida = [];
    serviciosVentaRapida_ids = [];
    descuentosVentaRapida = [];
    descuentoTotal=0;
    let divCestoVacio01 = document.querySelector('.index_basketEmpty_VF3Lr');
    let divCestolleno01 = document.querySelector('.basketFull');
    document.querySelector('.basketTotalPrecio').textContent = "0,00€";
    document.querySelector('.divInputRestante').textContent = "0,00";

    document.querySelector('.basket-discountPorcentajeShow').textContent="0%";
    document.querySelector('.basket-discountShow').textContent="0,00 €";
    document.querySelector('.botonesEnabledVentaRapida').classList.add('d-none');
    document.querySelector('.botonesDisabledVentaRapida').classList.remove('d-none');
    let listaCesta01 = document.querySelector('.basket-transactions-list');
    let divBotonPagar1234= document.querySelector('.insertPayButton');
    let pagosCombinados01 = document.querySelector('.pagoCombinado66');
    let cambioMostrar01 = document.querySelector('.cambioMostrarOcultar')
    let activarEfectivo = document.querySelector('.margin-bottom32MetodoPago .payment-types_col_ius7E[data-type="efectivo"]');
    resetModalEfectivo();
    resetModalTarjeta();
    // Esperar un tiempo (la duración de la transición) antes de mostrarlo nuevamente
     setTimeout(function() {
        div_HlQSH.classList.remove('hidden33');
        showDivPagos('salesNavigator-indexBasketContent');
        divCestolleno01.classList.add('d-none');
        divCestoVacio01.classList.remove('d-none');
       $(listaCesta01).empty();
       $(pagosCombinados01).empty();
       cambioMostrar01.classList.remove('d-none');
       var metodoActivo = document.querySelector('.payment-types_paymentMethodActive_vBa20');
        if (metodoActivo) {
            metodoActivo.classList.remove('payment-types_paymentMethodActive_vBa20');
        }
        activarEfectivo.querySelector('div').classList.add('payment-types_paymentMethodActive_vBa20');

        if(document.querySelector('.cambio_800')){
            document.querySelector('.cambio_800').textContent="0,00€";
        }
        // input_uid317inputMetodoPago.value= importePago;
        $(divBotonPagar1234).empty();
        $(divBotonPagar1234).append(`
            <button onclick="continueButtonPayment()" id="uid-139-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt index_resolveBtn_PxyxB" data-testid="continue-btn" style="width: 100%;">
                <div class="index_caption_W6r_J botonCambiarTitulo"> Continuar </div>
            </button>
            `);
        insertartarjetaSeleccionaCliente('.basket-customer-card0101', 'card_empty_ventas');

    }, 500);
}
//CLIC BOTÓN CANCELAR VENTA MODAL CANCELAR VENTA
let cancelarBoton01 = document.getElementById('uid-223-inputCancelarVenta0102');
if (cancelarBoton01) {
    cancelarBoton01.addEventListener('click', function(event){
        event.preventDefault();

        reseteoVistaVenta();
        $('#modalCancelarVenta33').modal('hide');
    });

}



// Función para mover el carrusel
function scrollCarousel(amount) {
    const nav = document.querySelector('.b-tabs_content_lxbV0OpcionesInfoCliente');
    nav.scrollLeft += amount;
}


/*CLIENTES*/
//clic en la tarjeta cliente
function funcionClicTrajeta(cliente){
     // Eliminar la clase activa del elemento actual (si existe)
     const currentActive = document.querySelector('.customer-el-list_active_ffoQG');
     if (currentActive) {
         currentActive.classList.remove('customer-el-list_active_ffoQG');
     }
     // Añadir la clase activa al elemento clicado
     cliente.classList.add('customer-el-list_active_ffoQG');
     document.querySelector('.index_customerWrapper_r1idQ').classList.add('list_customerCardMobileView_CfTzS');
     document.querySelector('.index_customerWrapper_r1idQ').classList.add('cutomers-list-with-banner');
     let id_cliente = cliente.getAttribute('data-clie');
     getFristClient(id_cliente);
}


//cambia citas proximas pasadas
const pestaniaProximaPasada = document.querySelectorAll('.li_proxima_pasada');
pestaniaProximaPasada.forEach(function(pestania) {
    pestania.addEventListener('click', function() {
        // let totalCitas0030 = pestania.getAttribute('data-total');
        const pestaniaActiva = document.querySelector('.b-tabs_tabBorderedActive_ff9lg_proximaPasada');
            if (pestaniaActiva) {
                pestaniaActiva.classList.remove('b-tabs_tabBorderedActive_ff9lg_proximaPasada');
                pestaniaActiva.setAttribute('data-testid', 'inactive');
                pestaniaActiva.setAttribute('tabindex', '-1');
            }
        pestania.classList.add('b-tabs_tabBorderedActive_ff9lg_proximaPasada');
        pestania.setAttribute('data-testid', 'active');
        pestania.setAttribute('tabindex', '0');
        if(pestania.classList.contains('li_proxima_cliente')){
            showDivClient('citasProximas_001_cliente');
        }else{
            showDivClient('citasPasadas_001_cliente');
        }
    });
});

function getFristClient(idCliente){
    //console.log(idCliente, "id cliente en frisct client");
    if (idCliente === 'primero') {
        const currentActive = document.querySelector('.customer-el-list_active_ffoQG');
        if (currentActive) {
            currentActive.classList.remove('customer-el-list_active_ffoQG');
        }
        document.querySelector('.item_client0202').classList.add('customer-el-list_active_ffoQG');
    }
    let updateStatusReservUrl = 'get-fristClient';
    let csrfToken = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        url: updateStatusReservUrl,
        method: 'POST',
        data: {
            _token: csrfToken,
            cliente_id: idCliente,
        },
        success: function(response) {

            montarTarjetaInfoCliente(response.firstClient, response.firstClientInitials, response.infoAdicionalCliente);

            updateClientListInfo(response.totalFinalizadas, response.totalProximas);

            // Manejo de citas terminadas y próximas
            handleAppointments(response.terminadasFclient, response.serviciosTerminados, response.empleadasTerminadas, '.listaCitasClienteTerminadas003', '.b-emptyPassadas', '.listaUl_ClienteTerminadas003');
            handleAppointments(response.proximasFclient, response.serviciosProximos, response.empleadasProximas, '.listaCitasClienteProximas003', '.b-emptyProximas', '.listaUl_ClienteProximas003');
        },
        error: function(xhr) {
            //console.log('Error al actualizar el status', xhr);
        }
    });
}

function montarTarjetaInfoCliente(primerCliente, inicialesFrisclient, infoAdicionalCliente){
    $('.inicilalesCliente0050').empty();
    $('.inicilalesCliente0050').append(`
       <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 32px;"> ${inicialesFrisclient}</div>
    `);
    document.querySelector('.index_fullName_i2BLH').textContent = primerCliente.name;
    document.querySelector('.inicilalesCliente0050').setAttribute('title', primerCliente.name);
    $('.index_headerPhone_Qcakf').empty();
    $('.index_headerPhone_Qcakf').append(`
        <span class="flex inline items-center">
            <span>${primerCliente.telefono}</span>
        </span>
     `);
     $('.index_visitsInfo_Uuncf').empty();
     $('.index_visitsInfo_Uuncf').append(`
        <div class="index_visitsInfoItem_zUjfI">
            <div class="index_title_AGBmy index_size--10_EjPcG">Citas</div>
            <div class="index_value_kD_oD index_size--14-sb_kg1ff">${infoAdicionalCliente.numeroCitas}</div>
        </div>
        <div class="index_visitsInfoItem_zUjfI">
            <div class="index_title_AGBmy index_size--10_EjPcG">Inasistencias</div>
            <div class="index_value_kD_oD index_size--14-sb_kg1ff">${infoAdicionalCliente.inasistencias}</div>
        </div>
        <div class="index_visitsInfoItem_zUjfI">
            <div class="index_title_AGBmy index_size--10_EjPcG">Cancelaciones</div>
            <div class="index_value_kD_oD index_size--14-sb_kg1ff">${infoAdicionalCliente.cancelaciones}</div>
        </div>
        <div class="index_visitsInfoItem_zUjfI">
            <div class="index_title_AGBmy index_size--10_EjPcG">Última visita</div>
            <div class="index_value_kD_oD index_size--14-sb_kg1ff">${infoAdicionalCliente.ultimaVisita}</div>
        </div>
        <div class="index_visitsInfoItem_zUjfI">
            <div class="index_title_AGBmy index_size--10_EjPcG">Ingresos totales</div>
            <div class="index_value_kD_oD index_size--14-sb_kg1ff">${infoAdicionalCliente.totalIngresos} €</div>
        </div>
        <div class="index_visitsInfoItem_zUjfI">
            <div class="index_title_AGBmy index_size--10_EjPcG">Descuento</div>
            <div class="index_value_kD_oD index_size--14-sb_kg1ff">${infoAdicionalCliente.descuentos}</div>
        </div>
        <div class="index_visitsInfoItem_zUjfI">
            <div class="index_title_AGBmy index_size--10_EjPcG">Cliente de confianza</div>
            <div class="index_value_kD_oD index_size--14-sb_kg1ff index_valueTrusted_sPXxO">${infoAdicionalCliente.clienteConfianza}ierne</div>
        </div>
     `);
}

// Función para actualizar la información del cliente
function updateClientListInfo(totalFinalizadas, totalProximas) {
    document.querySelector('.li_pasada_cliente').textContent = `Pasadas (${totalFinalizadas})`;
    document.querySelector('.li_proxima_cliente').textContent = `Próximas (${totalProximas})`;

    document.querySelector('.b-emptyPassadas').classList.toggle('d-none', totalFinalizadas > 0);
    document.querySelector('.listaUl_ClienteTerminadas003').classList.toggle('d-none', totalFinalizadas === 0);

    document.querySelector('.b-emptyProximas').classList.toggle('d-none', totalProximas > 0);
    document.querySelector('.listaUl_ClienteProximas003').classList.toggle('d-none', totalProximas === 0);
}

// Función para manejar citas (tanto terminadas como próximas)
function handleAppointments(citas, servicios, empleados, listSelector, emptySelector, listWrapperSelector) {
    if (citas.length === 0) return;

    $(listSelector).empty();

    citas.forEach(function(cita, index) {
        let fechaCita = new Date(cita.date_time);
        let mes = fechaCita.toLocaleString('es-ES', { month: 'short' });
        let dia = fechaCita.getDate();
        let hora = fechaCita.getHours().toString().padStart(2, '0');
        let minuto = fechaCita.getMinutes().toString().padStart(2, '0');
        let horaMinuto = `${hora}:${minuto}`;
        let status = cita.status;

        let divStatusClases = getStatusClass(status);

        let servicioNombre = servicios[index].nombre;
        let servicioBorderColor = servicios[index].borderColor;
        let duracion58 = (servicios[index].hora > 0)
            ? `${servicios[index].hora}h ${servicios[index].minuto}min`
            : `${servicios[index].minuto}min`;

        let empleado = empleados[index];
        let empleadoNombre = empleado ? `${empleado.nombre} ${empleado.apellido}` : "Empleado no disponible";
        let formattedTotal = cita.total_payment.toString().replace(".", ",") + " €";

        let divPagado = cita.status_payment === 'Pagado'
            ? `<div data-testid="receipt-status-badge-label" class="flex inline margin-bottom-4 receipt-status-badge_status_vwj1d receipt-status-badge_statusGreen_Aw6NK receipt-status-badge_size--xs_EtgLy receipt-status-badge_size--9-sb_zgSEq"> Pagado </div>`
            : '';

        $(listSelector).append(`
            <li>
                <div class="list_appointment_aww7c">
                    <div class="appointment_appointment_LmBLD">
                        <div class="appointment-date_date_UsCxi">
                            <div class="irenemiweb appointment-date_month_nFAjw appointment-date_size--12_Z4is5">${mes}</div>
                            <div class="appointment-date_day_zpfF4 appointment-date_size--20_BC_a_">${dia}</div>
                            <div class="appointment-date_hour_isz2C appointment-date_size--12_Z4is5">${horaMinuto}</div>
                        </div>
                        <div class="appointment_info_QK4CC">
                            <div class="${divStatusClases}">${status}</div>
                            ${divPagado}
                            <div class="appointment-service_service_KFga9">
                                <div class="appointment-service_serviceBar_d_tAg" style="border-left-width: 0px; border-color: ${servicioBorderColor};"></div>
                                <div class="appointment-service_serviceHeader_qO6qz appointment-service_size--14__gGWE margin-left-12"> ${servicioNombre} </div>
                                <div class="appointment-service_serviceSubHeader_OGHVA appointment-service_size--12_Hog21 margin-left-12">
                                    <span class="duration">${duracion58}</span>  • ${empleadoNombre}
                                </div>
                            </div>
                        </div>
                        <div class="appointment_additionals_Eg8kg appointment_additionalsLonger_J5WmT">
                            <div class="appointment_redo_m4i8Z">
                                <button type="button" class="b-button_button_QiVJW b-button_theme--iconSecondary_yYxhu appointment_redoButton_PBpSa" data-testid="appointment-redo-btn"> rehacer </button>
                            </div>
                        </div>
                        <div class="appointment_total_tXjTE appointment_size--16-sb_hG9l7">${formattedTotal}</div>
                    </div>
                    <hr class="list_hr_Am6We">
                </div>
            </li>
        `);
    });
}

// Función para obtener la clase correspondiente según el estado
function getStatusClass(status) {
    let divStatusClases = 'margin-bottom-4 style_status_xxjlV style_statusDefault_HPmTE style_status--xs_vvmA5 style_statusUpperCase_bkX7Z';
    if (status === 'confirmed' || status === 'Finalizada') {
        divStatusClases += ' style_statusGreen_lW62O';
    } else if (status === 'cancelled') {
        divStatusClases += ' style_statusGray_K1guG';
    } else if (status === 'no_asistida') {
        divStatusClases += ' style_statusRed_gfbPD';
    } else if (status === 'pending') {
        divStatusClases += ' style_statusWarning_lW62O';
    } else {
        //console.log('Estado desconocido');
    }
    return divStatusClases;
}


//flecha ocultar info cliente
var flechaOcultarInfoCliente = document.querySelector('.cerrarVistaInfoCliente');
if(flechaOcultarInfoCliente){
    flechaOcultarInfoCliente.addEventListener('click', function(){
        document.querySelector('.index_customerWrapper_r1idQ').classList.remove('list_customerCardMobileView_CfTzS');
        document.querySelector('.index_customerWrapper_r1idQ').classList.remove('cutomers-list-with-banner');

    });
}

//buscador de clientes
function buscar(inputSeachClient) {
    var filtro = $(inputSeachClient).val().toUpperCase();

    // Iterar sobre cada cliente
    $(".item_client0202").each(function() {
        // Obtener el texto del nombre y apellido del cliente
        var textoCliente = $(this).find(".customer-el-list_searchItemName_LLoTq").text().toUpperCase();

        // Verificar si el texto contiene el filtro
        if (textoCliente.indexOf(filtro) >= 0) {
            $(this).show();  // Si se encuentra el filtro, mostrar el cliente
        } else {
            $(this).hide();  // Si no, ocultar el cliente
        }
    });
}
//AÑADIR RESERVA DESDE CALENDAR

//FUNCION clicar boton añadir cita en calendarABRIR MODAL AÑADIR CITA
let botonAniadirCitaCalendar = document.getElementById('uid-3777-input');
if(botonAniadirCitaCalendar){
    botonAniadirCitaCalendar.addEventListener('click', function(event){
        event.preventDefault();

        openModalNewReservCalendar();
    });
}


//FUNCION ABRIR CERRAR MODAL NUEVA CITA CALENDAR
function openModalNewReservCalendar(){
    let divContenedorDropon = document.querySelector('.droponNuevaCitaCalendar');
    if (divContenedorDropon) {
        divContenedorDropon.classList.toggle('add-event_open_RxMza');
        let modalnewReservCalendar= document.querySelector('.droponNuevaReservaCalendar');
        modalnewReservCalendar.classList.toggle('d-none');
    }
}

//FUNCION GESTIONA APERTURA MODAL NUEVA RESERVA DESDE CALENDARIO
let botonesNewReservFaltaDispoCalendario = document.querySelectorAll('.add-event_button_DtVNQ');
    if (botonesNewReservFaltaDispoCalendario) {
        botonesNewReservFaltaDispoCalendario.forEach(function (boton) {
            // Verifica si el enlace ya tiene un listener registrado
            $(boton).off('click').on('click', function(event) {
                event.preventDefault();
                let dataUrl = boton.getAttribute('data-url3');
                if (dataUrl === 'add.reserve') {

                    initDatePikerNewReservCalendar();
                    openModalNewReservCalendar();//modal para elegir entre nueva cita y añadir falta disponibilidad
                    ponerHoraInicioActual();
                    ponerHoraActualMasTreinta();
                    const newReservCalendarModal = new bootstrap.Offcanvas(document.getElementById('newReservCalendar'));
                    let calendar = document.getElementById('calendar');

                    calendar.classList.add('calendarEstrecho');
                    initializeCalendar();
                    newReservCalendarModal.show();
                    showDivNotas('datos_reservaNewReserv0106');
                    colorBordeReservArray = [];
                    infoArrayEnvio = [];
                    // blockPointerEvents();
                     //botonDeshabilitado
                     let miDiv = document.querySelector('.fc-header-toolbar');
                     let botones = miDiv.getElementsByTagName('button');
                     for (let boton of botones) {
                     boton.disabled = true;
                     }
                }
                // else if(dataUrl === 'add.category'){
                //     abrirCerrarModalAniadirServico();
                //     abrirModal('newCategoryModal');
                // }
            });
        });
    }

//comprobar si existe servicio new reservCalendar
function existeServicioNewReservCalendar(){
    let hayServicio = '';
    if(document.querySelector('.services_serviceInfo_iDMQwAddCalendar')){
        hayServicio = document.querySelector('.services_serviceInfo_iDMQwAddCalendar').getAttribute('data-indexactual');
        if(hayServicio){
            return true;
            // title = title + ' •' + document.querySelector('.services_serviceInfo_iDMQwAddCalendar .services_serviceName_YhbTW_span').textContent;
        }else{
            return false
        }
    }
}

function existeNombreCliente(){
    let divTarjetaCliente = document.querySelector('.basket-customer-card0101Calendar .customer-card_customerData_Ke3s5');
    if(divTarjetaCliente){
       let nombreCliente = divTarjetaCliente.querySelector('.b-avatar_avatar_pJzSu').getAttribute('title');
    //    //console.log("existe cliente", nombreCliente);
       return nombreCliente;
    }else{
       return false;
    }
}

function existeNombreClienteComun(principalClass){
    // //console.log("entro en existeNombreClienteComun, principalClass: ", principalClass);

    let divTarjetaCliente = document.querySelector(`${principalClass} .customer-card_customerData_Ke3s5`);
    if(divTarjetaCliente){
       let nombreCliente = divTarjetaCliente.querySelector('.b-avatar_avatar_pJzSu').getAttribute('title');
    //    //console.log("existeNOmbreCliente", nombreCliente);
       return nombreCliente;
    }else{
       return false;
    }
}

    function ponerEventoInicialmente(id_empleado) {
        let fecha = document.getElementById('datePikerfechaCitaInfo22').getAttribute('data-datepiker');
        let horaInicio = document.querySelector('.slotHorasCobrarServicioCalendar').textContent;
        let horaFin = document.querySelector('.slotHoraFinCorbrarServicioCalendar').textContent;
        let start = formatFechaConHora(fecha, horaInicio);  // Fecha y hora de inicio
        let end = formatFechaConHora(fecha, horaFin);      // Fecha y hora de finalización
        let fechaInicial = start.split('T')[0];
        let title = 'Cliente sin cita previa';
        let eventId = `eventoTemporal_1_${start.replace(/:/g, "_")}`;
            // //console.log(eventId);

        if(existeNombreCliente() !== false){
            title = existeNombreCliente();
        }
        //para cambiar title si hay servicio
        if(existeServicioNewReservCalendar()){
            title = title + ' • ' + document.querySelector('.services_serviceInfo_iDMQwAddCalendar .services_serviceName_YhbTW_span').textContent.trim();
        }

        let eventData = {
                classNames: ['temporal', eventId],
                id: eventId,//esto es lo que sirve para eliminarlo
                title: title,
                start: start,  // Fecha y hora de inicio
                end: end,      // Fecha y hora de finalización
                resourceId: id_empleado,
        };
        // //console.log(eventData, "eventData ponerInicialmente");

        if (calendar) {
            calendar.changeView('resourceTimeGridDay');
            calendar.gotoDate(fechaInicial);
            let horaInicioObj = new Date(start);
            let horaInicioFormateada =
                horaInicioObj.getHours().toString().padStart(2, '0') + ":" +  // Obtener la hora con 2 dígitos
                horaInicioObj.getMinutes().toString().padStart(2, '0') + ":" +  // Obtener los minutos con 2 dígitos
                horaInicioObj.getSeconds().toString().padStart(2, '0');  // Obtener los segundos con 2 dígitos
            scrollToHour(horaInicioFormateada);
            calendar.addEvent(eventData);
        }
        //para poner borde si hay evento
        setTimeout(() => {
            let eventoTemporal = document.querySelector('.fc-event.temporal');
            if (eventoTemporal) {
                // //console.log(eventoTemporal, "eventoTemporal");

                if(existeServicioNewReservCalendar()){
                    eventoTemporal.style.setProperty('border-left', `4px solid ${colorBordeNewReservCalendar}`, 'important');
                }
            }
        }, 800);
        eventIdChangeCalendar = eventId;
    }

    function obtenerValorCorazon(divCorazon){
        let imagen = document.querySelector(divCorazon);
        let serleccionaClienteValor = '';
        if (imagen && imagen.src.includes('corazonRojo')) {
            serleccionaClienteValor = 1;
        } else {
            serleccionaClienteValor = 0;
        }
        return serleccionaClienteValor;
    }

    function ponerEventoInicialmenteModify(info){
        //console.log(info, "PONEReVENTOiNICIALMENTE--info");

        let event = '';
        let existeInfo = info.event;
        //si existe info.event se le asigna a event, de lo contrario a event se el asigna info
        existeInfo ?  event = info.event:  event = info;
        // if(existeInfo){
        //     //console.log(info, "existe infoEvent");

        // }else{
        //     //console.log(info, "no existe infoEvent");

        // }
        //console.log(event, "PONEReVENTOiNICIALMENTE--event", event.length, "EVENT.LENG");
        let csrfToken = $('meta[name="csrf-token"]').attr("content");

        if(!event.length){
            //console.log("NO HAY .LEND");

            eliminarEventoCalendario(info.event.id);
            idEventoInicial = info.event.id;
            // let url = "cancelled-reserva";
            // // Hacer una petición AJAX al servidor
            // $.ajax({
            //     url: url, // Ruta que definimos en web.php
            //     method: 'POST',
            //     data: {
            //         _token: csrfToken, // Token CSRF para seguridad
            //         id_reserva: event.extendedProps.reservaId,
            //         responsablecancelacion: null,
            //         motivoCancelacion: null,
            //         idResponsable: 4
            //     },
            //     success: function(data) {
            //         // if(data.cancelada){

            //         // }
            //     },
            //     error: function(xhr) {
            //         //console.log('Error al obtener las horas', xhr);
            //     }
            // });
            const eventInfo = info.event;
            // //console.log(eventInfo);

            let fecha = eventInfo.start;
            let horaInicio = obtenerHoraEuropaCentral(fecha);
            let start2 = formatFechaConHora(fecha, horaInicio);


            // Extraer la información relevante
            const title = eventInfo._def.title;  // Título del evento
            const start = eventInfo._instance.range.start;  // Fecha de inicio
            const end = eventInfo._instance.range.end;  // Fecha de fin (si está presente)
            // const eventId = `eventoTemporal_1_${start2.replace(/:/g, "_")}`;
            const eventId = eventIdChangeCalendar;
            // //console.log(start, end, "start y end");

            // Si la fecha de finalización no está presente, solo usamos la fecha de inicio
            const endDate = eventInfo.end;
            const startDate = eventInfo.start;

            // Extraer colores y otras propiedades de extendedProps si están presentes
            const backgroundColor = eventInfo._def.backgroundColor || "#FF5733";  // Color de fondo
            const borderColor = eventInfo._def.borderColor || "#FF5733";  // Color del borde
            const textColor = eventInfo._def.textColor || "#FFFFFF";  // Color del texto

            const event589 = {
                classNames: ['temporal', eventInfo._def.publicId],
                id: eventId,  // ID único del evento
                title: title,  // Título del evento
                start: startDate,  // Fecha de inicio (asegúrate de que sea un objeto Date)
                end: endDate,  // Fecha de finalización (si existe)
                borderColor: borderColor,  // Color del borde
                textColor: 'black',  // Color del texto
                extendedProps: eventInfo._def.extendedProps,  // Propiedades extendidas
                resourceId: eventInfo._def.extendedProps.empleada.id
            };
             //vamos a la fecha
             let fechaInicio = info.event._instance.range.start; // Obtener la fecha de inicio del evento
            //  //console.log(fechaInicio, "FECHA INICIO--------------");
             fechaInicio = formatearFecha02(fechaInicio);
            //  //console.log(fechaInicio, "FECHA INICIO formateada--------------");
             calendar.gotoDate(fechaInicio);
            // Añadir el evento al calendario
            calendar.addEvent(event589);
            //console.log("PONEREVENTO INICIALMENTE MODIFY EVENTO AÑADIRO--ponerEventoInicialmenteModify");

            // Opcional: forzar la actualización visual del calendario
            // calendar.render();
            eventIdChangeCalendar = eventId;
        }else{
            //console.log(eventIdChangeCalendarArray, "PONEREVENTO INICIALMENTE MODIFY--eventIdChangeCalendarArray");

            // //console.log("hay mas de uno");
            // eventIdChangeCalendarArray.forEach(eventId => {
            //     // //console.log(event, "eventIdChangeCalendarArray");
            //     eliminarEventoCalendario(eventId);
            // });
            // let idServiciosMultiples = [];
            // if(infoArrayEnvio.length){
            //     infoArrayEnvio.forEach(event => {
            //         idServiciosMultiples.push(event.extendedProps.reservaId);
            //     });
            // }
             // //console.log("Eventos cancelados");
                // Suponiendo que `info` es un array de eventos
                const eventos = info;  // Aquí `info` es un array de eventos

                eventos.forEach((eventInfo) => {
                    // Obtener la fecha de inicio del evento
                    let fecha = eventInfo.start;
                    let horaInicio = obtenerHoraEuropaCentral(fecha);
                    let start2 = formatFechaConHora(fecha, horaInicio);

                    // Extraer la información relevante
                    const title = eventInfo._def.title;  // Título del evento
                    const start = eventInfo._instance.range.start;  // Fecha de inicio
                    const end = eventInfo._instance.range.end;  // Fecha de fin (si está presente)
                    // const eventId = `eventoTemporal_1_${start2.replace(/:/g, "_")}`;
                    const eventId = `eventoTemporal_1_${ eventInfo._def.extendedProps.reservaId}`;
                    // Si la fecha de finalización no está presente, solo usamos la fecha de inicio
                    const endDate = eventInfo.end;
                    const startDate = eventInfo.start;

                    // Extraer colores y otras propiedades de extendedProps si están presentes
                    const backgroundColor = eventInfo._def.backgroundColor || "#FF5733";  // Color de fondo
                    const borderColor = eventInfo._def.borderColor || "#FF5733";  // Color del borde
                    const textColor = eventInfo._def.textColor || "#FFFFFF";  // Color del texto

                    const event = {
                        classNames: ['temporal', eventInfo._def.publicId],
                        id: eventId,  // ID único del evento
                        title: title,  // Título del evento
                        start: startDate,  // Fecha de inicio (asegúrate de que sea un objeto Date)
                        end: endDate,  // Fecha de finalización (si existe)
                        borderColor: borderColor,  // Color del borde
                        textColor: 'black',  // Color del texto
                        extendedProps: eventInfo._def.extendedProps,  // Propiedades extendidas
                        resourceId: eventInfo._def.extendedProps.empleada.id
                    };

                    // Vamos a la fecha de inicio del evento
                    let fechaInicio = eventInfo._instance.range.start; // Obtener la fecha de inicio del evento
                    fechaInicio = formatearFecha02(fechaInicio); // Formatear la fecha de inicio

                    // Mover el calendario a la fecha de inicio
                    calendar.gotoDate(fechaInicio);
                    //console.log(event, "PONEREVETO INICIALMENTE MODIFY--event");

                    // Añadir el evento al calendario
                    calendar.addEvent(event);

                    // Opcional: forzar la actualización visual del calendario
                    calendar.render();

                    // Si necesitas almacenar el ID del último evento agregado (por ejemplo, en `eventIdChangeCalendar`):
                    // eventIdChangeCalendar = eventId;
                });
            //marcar los eventos como cancelados
            // let csrfToken = $('meta[name="csrf-token"]').attr("content");
            // const url = 'cancelled-reservas-multiple';
            // fetch(url, {
            // method: 'POST',
            // headers: {
            //     'Content-Type': 'application/json',
            //     'X-CSRF-TOKEN': csrfToken // Enviar el token CSRF
            // },
            // body: JSON.stringify({
            //     reservasIds: idServiciosMultiples // Pasamos el array de reservas
            // })
            // })
            // .then(response => response.json()) // Si esperas una respuesta JSON
            // .then(data => {


            // })
            // .catch(error => {
            //     // Manejo de errores
            //     console.error('Error en la solicitud:', error);
            // });
        }
    }

    function loaderWite(){
        let loader = document.querySelector('#loaderSperaAdministrator2');
        loader.classList.remove('d-none');

        setTimeout(() => {
            loader.classList.add('d-none');
        }, 3500);
    }

    function loaderWiteSmall(){
        let loader = document.querySelector('#loaderSperaAdministrator2');
        loader.classList.remove('d-none');

        setTimeout(() => {
            loader.classList.add('d-none');
        }, 2000);
    }

    function loaderWiteMegaSmall(){
        let loader = document.querySelector('#loaderSperaAdministrator2');
        loader.classList.remove('d-none');

        setTimeout(() => {
            loader.classList.add('d-none');
        },1000);
    }
    function existeServicioPantalla2(tarjetaServicioClass){
        //para cambiar title si hay servicio
        let hayServicio = '';
        if(document.querySelector(tarjetaServicioClass)){
            hayServicio = document.querySelector(tarjetaServicioClass).getAttribute('data-service');
            if(hayServicio){
                return true
            }else{
                return false;
            }
        }
    }

    function ponerEventoPantalla2Info(id_empleado, empleado_nombre = null) {
        // //console.log(infoArrayEnvio, "infoArray desde pantalla2Info:" , id_empleado);

        // let fecha = infoArrayEnvio.event.start;
        let noExisteTarjetaServicio = document.querySelector('.selectServiceAdd .services-wrapper_serviceEmpty_pbusk');
        if(!noExisteTarjetaServicio){

        }
        let fecha = document.querySelector('.fechaCitaInfo').getAttribute('data-datepiker');
        let horaInicio = document.querySelector('.slotHorasCobrarServicioAdd').textContent;
        let horaFin = document.querySelector('.slotHoraFinCorbrarServicioAdd').textContent;
        let start = formatFechaConHora(fecha, horaInicio);  // Fecha y hora de inicio
        let end = formatFechaConHora(fecha, horaFin);      // Fecha y hora de finalización
        let fechaInicial = start.split('T')[0];
        let title = 'Cliente sin cita previa';
        let eventId = `eventoTemporal_2_${start.replace(/:/g, "_")}`;
        let precioServicio1 = '';
        let borderColor = 'transparent';
        let nombreServicio = '';
        let id_servicio = '';
        // //console.log(fecha, horaInicio, horaFin, start, end,title, eventId, "datos pantallaInfo2");
        // eventIdChangeCalendarArray.push(eventId);
            // //console.log(eventId);
        if(existeNombreClienteComun('.basket-customer-card0101Info') !== false){
            title = existeNombreClienteComun('.basket-customer-card0101Info');
        }
        //para cambiar title si hay servicio(tarjeta del servicio seleccionado)
        if(existeServicioPantalla2('.selectServiceAdd')){
            loaderWite();
            precioServicio1 = document.querySelector('.selectServiceAdd .services_servicePrice_wErzf').textContent;
            precioServicio1 = precioServicio1.replace('€', '');
            precioServicio1 = precioServicio1.trim();
            borderColor = document.querySelector('.selectServiceAdd .services_serviceDecorator_ldMxA').style.borderColor;
            borderColor = borderColor.trim();
            nombreServicio= document.querySelector('.services_serviceInfo_iDMQwAdd .services_serviceName_YhbTW_span').textContent;
            nombreServicio = nombreServicio.trim();
            id_servicio = document.querySelector('.selectServiceAdd').getAttribute('data-service');
            title = title + ' • ' + document.querySelector('.services_serviceInfo_iDMQwAdd .services_serviceName_YhbTW_span').textContent.trim();
        }
        let eventData016 = {
                classNames: ['temporal2', eventId],
                id: eventId,//esto es lo que sirve para eliminarlo
                extendedProps: {
                    servicio:{
                        nombre: nombreServicio,
                        borderColor: borderColor,
                        duracion: calcularDuracion(horaInicio.trim(), horaFin.trim()),
                        precio: precioServicio1,
                        id: id_servicio,
                    },
                    empleada:{
                        nombre: empleado_nombre,
                        id: id_empleado,
                    },
                    horaInicio: horaInicio,
                    horaFin: horaFin,
                },
                title: title,
                start: start,  // Fecha y hora de inicio
                end: end,      // Fecha y hora de finalización
                borderColor: colorBordeNewReservCalendar,
                resourceId: id_empleado,
                duracion: calcularDuracion(horaInicio.trim(), horaFin.trim()),
        };
        if (calendar) {
            calendar.addEvent(eventData016);
            //console.log(infoArrayEnvio, "infoArray desde pantalla2Info:");

            if(infoArrayEnvio.length){
                //console.log("hay infoArray.lend");

                infoArrayEnvio.push(eventData016);
            }else{
                //console.log("NO infoArray.lend");
                let infoArayTemporal = infoArrayEnvio.event;
                infoArrayEnvio = [];
                infoArrayEnvio.push(infoArayTemporal);
                infoArrayEnvio.push(eventData016);
                //console.log(infoArrayEnvio, "infoArray desde pantalla2Info:");
            }
        }else{
            //console.log("no hay calendar");

        }
        //para poner borde si hay evento
        setTimeout(() => {
            let eventoTemporal = document.querySelector('.fc-event.temporal2');
            if (eventoTemporal) {
                if(existeServicioPantalla2('.selectServiceAdd')){
                    eventoTemporal.style.setProperty('border-left', `4px solid ${colorBordeNewReservCalendar}`, 'important');
                }
            }
        }, 2500);

        // //console.log(servicesWithTimes, "Evento inicial");
         calendar.render();
        eventIdChangeCalendar = eventId;
        // let events = calendar.getEvents();
        // //console.log(events, "ponerEventoPantalla2Info--events");
    }

    function ponerEventoPantalla2(id_empleado) {
        // let events = calendar.getEvents();
        // // Filtramos los eventos que tienen el mismo valor en 'multiple'
        // let idEventoPantalla2 = events.filter(event => event.id === eventIdChangeCalendar);
        // //console.log(idEventoPantalla2, "EVENTO PANTALLA 2------------");

        let fecha = document.getElementById('datePikerfechaCitaInfo22').getAttribute('data-datepiker');
        let horaInicio = document.querySelector('.slotHorasCobrarServicioAddCalendar').textContent;
        let horaFin = document.querySelector('.slotHoraFinCorbrarServicioAddCalendar').textContent;
        let start = formatFechaConHora(fecha, horaInicio);  // Fecha y hora de inicio
        let end = formatFechaConHora(fecha, horaFin);      // Fecha y hora de finalización
        let fechaInicial = start.split('T')[0];
        let title = 'Cliente sin cita previa';
        let eventId = `eventoTemporal_2_${start.replace(/:/g, "_")}`;
            // //console.log(eventId);
        if(existeNombreCliente() !== false){
            title = existeNombreCliente();
        }
        //para cambiar title si hay servicio
        if(existeServicioPantalla2('.selectServiceAddCalendar')){
            title = title + ' • ' + document.querySelector('.services_serviceInfo_iDMQwAddCalendar .services_serviceName_YhbTW_span').textContent.trim();
        }
        let eventData = {
                classNames: ['temporal2', eventId],
                id: eventId,//esto es lo que sirve para eliminarlo
                title: title,
                start: start,  // Fecha y hora de inicio
                end: end,      // Fecha y hora de finalización
                description: 'Detalles de la cita',
                location: 'Ubicación de la cita',
                borderColor: colorBordeNewReservCalendar,  // Color del borde
                resourceId: id_empleado,
        };
        if (calendar) {
            calendar.changeView('resourceTimeGridDay');
            calendar.gotoDate(fechaInicial);
            let horaInicioObj = new Date(start);
            let horaInicioFormateada =
                horaInicioObj.getHours().toString().padStart(2, '0') + ":" +  // Obtener la hora con 2 dígitos
                horaInicioObj.getMinutes().toString().padStart(2, '0') + ":" +  // Obtener los minutos con 2 dígitos
                horaInicioObj.getSeconds().toString().padStart(2, '0');  // Obtener los segundos con 2 dígitos
            scrollToHour(horaInicioFormateada);
            calendar.addEvent(eventData);
        }
        //para poner borde si hay evento
        let eventoTemporal = document.querySelector('.fc-event.temporal2');
            if (eventoTemporal) {
                if(existeServicioPantalla2('.selectServiceAddCalendar')){
                    eventoTemporal.style.setProperty('border-left', `4px solid ${colorBordeNewReservCalendar}`, 'important');
                }
            }
        // //console.log(servicesWithTimes, "Evento inicial");
        eventIdChangeCalendar = eventId;
    }

    //función para cambiar el empleado del evento
    function cambiarResourceIdEvento(eventId, newResourceId, eventoTemporalEnviado) {
        // Obtener el evento por su ID
        let evento = calendar.getEventById(eventId);
        //console.log(eventId, newResourceId, eventoTemporalEnviado, "CAMBIARRESOURCEIDEVENTO--todas variables");

        // Verificar si el evento existe
        if (evento) {
            // Cambiar el resourceId del evento usando setResources
            evento.setResources([newResourceId]);
            // Ahora podemos actualizar cualquier otra propiedad que queramos (si es necesario)
            //console.log(`El resourceId del evento ${eventId} ha sido actualizado a: ${newResourceId}`);
        } else {
            //console.log(`No se encontró el evento con ID: ${eventId}`);
        }
        if(eventoTemporalEnviado === '.fc-event.temporal'){
            let eventoTemporal1 = document.querySelector('.fc-event.temporal');
            //console.log("es temporal");
            let hayServicio='';
            if (eventoTemporal1) {
                //console.log("hay temporal");
                if(document.querySelector('.services_serviceInfo_iDMQwAddCalendar')){
                    hayServicio = document.querySelector('.services_serviceInfo_iDMQwAddCalendar').getAttribute('data-indexactual');
                    if(hayServicio){
                        eventoTemporal1.style.setProperty('border-left', `4px solid ${colorBordeNewReservCalendar}`, 'important');
                    }
                }else if(document.querySelector('.services_serviceInfo_iDMQw')){
                    eventoTemporal1.style.setProperty('border-left', `4px solid ${colorBordeNewReservCalendar}`, 'important');
                }
            }
        }else if(eventoTemporalEnviado === '.fc-event.temporal2'){
            let eventoTemporal2 = document.querySelector('.fc-event.temporal2');
            //console.log("es temporal2");
            if (eventoTemporal2) {
                //para cambiar borde si hay servicio
                //console.log("hay temporal2 change empleado");

                if(document.querySelector('.selectServiceAddCalendar')){
                    //console.log("estamos en selecterviceaddCalendar");
                    let hayServicio2 = document.querySelector('.selectServiceAddCalendar').getAttribute('data-service');
                    let hayServicio2ChangeInfo = document.querySelector('.selectServiceAdd').getAttribute('data-service');
                    if(hayServicio2){
                        //console.log("hay servicio en change empleado");

                        eventoTemporal2.style.setProperty('border-left', `4px solid ${colorBordeNewReservCalendar}`, 'important');
                    }else if(hayServicio2ChangeInfo){
                        //console.log("hay con la clase cambiada servicio en change empleado");
                        eventoTemporal2.style.setProperty('border-left', `4px solid ${colorBordeNewReservCalendar}`, 'important');
                    }
                }
            }else{
                let eventoTemporal1 = document.querySelector('.fc-event.temporal');
                //console.log("es temporal");
                let hayServicio='';
                if (eventoTemporal1) {
                    //console.log(eventIdChangeCalendar, "eventIdChangeCalendar");
                    if(calendar.getEventById(eventIdChangeCalendar)){
                        //console.log(calendar.getEventById(eventIdChangeCalendar));
                        let id_eventoEditar2 = eventIdChangeCalendar;
                        let eventoElement1 = id_eventoEditar2.replace(/^eventoTemporal_/, 'eventoTemporalAsignado_');
                        let eventoElement = document.querySelector(`.${eventoElement1}`);
                        //console.log(eventoElement, "eventoelement1", eventoElement1);
                        if (eventoElement) {
                            // Asignar el estilo con 'important'
                            eventoElement.style.setProperty('border-left', `4px solid ${colorBordeNewReservCalendar}`, 'important');
                        }
                    }

                    else{
                        //console.log("hay temporal", eventoTemporal1);
                        if(document.querySelector('.services_serviceInfo_iDMQwAddCalendar')){
                            //console.log(colorBordeNewReservCalendar, "color");
                            hayServicio = document.querySelector('.services_serviceInfo_iDMQwAddCalendar').getAttribute('data-indexactual');
                            if(hayServicio){
                                //console.log(colorBordeNewReservCalendar, "color");
                                eventoTemporal1.style.setProperty('border-left', `4px solid ${colorBordeNewReservCalendar}`, 'important');
                            }
                        }else if(document.querySelector('.services_serviceInfo_iDMQw')){

                            //console.log(colorBordeNewReservCalendar, "color", eventoTemporal1);
                            eventoTemporal1.style.setProperty('border-left', `4px solid ${colorBordeNewReservCalendar}`, 'important');

                        }
                    }

                }
            }
        }
    }


    //función para cambiar hora inicio y posición evento añadir evento desde calendar
    function cambiarHoraInicioEvento(eventId, newStart) {
        //console.log(eventId, newStart, "cambiarHOraINicio--eventid,");

        // Obtener el evento por su ID
        let events = calendar.getEvents();
        //console.log(events, "CAMBIARhORAINCIOEVENTO--events");

        let event = calendar.getEventById(eventId);

        if(!event){
            event = document.querySelector(`.${eventId}`);
        }
        //console.log(event, "CAMBIARhORAiNICIOEVENTO--event");
        // Verificar si el evento existe
        if (event) {
            //console.log('%c'+event, 'color: yellow');
            // //console.log(event, "cambiarHoraInicioEvento--event");

            // Cambiar la hora de inicio
            event.setStart(newStart);

            // No es necesario renderizar, FullCalendar lo hace automáticamente
            //console.log(`La hora de inicio del evento ${eventId} ha sido actualizada a ${newStart}.`);
        } else {
            //console.log(`No se encontró el evento con ID: ${eventId}`);
        }
    }

    //cambia la hora fin del evento añadir desde calendario y por ende su ubicación
    function cambiarHoraFinEvento(eventId, newEnd) {
        // Obtener el evento por su ID
        let event = calendar.getEventById(eventId);

        // Verificar si el evento existe
        if (event) {
            // Cambiar la hora de fin
            event.setEnd(newEnd);

            // No es necesario renderizar, FullCalendar lo hace automáticamente
            // //console.log(`La hora de fin del evento ${eventId} ha sido actualizada a ${newEnd}.`);
        } else {
            //console.log(`No se encontró el evento con ID: ${eventId}`);
        }
    }




function eliminarEventoCalendario(id_evento){
    // initializeCalendar();
    var eventDiv = calendar.getEventById(id_evento);
    if(eventDiv){
    eventDiv.remove();
    //console.log("%cevento eliminado: " + id_evento, "color: green;");
    }else{
        //console.log("%cno existe el evento id: " + id_evento, "color: red;");

    }
}

//recibe formato:Wed Mar 05 2025 00:00:00 GMT+0100 (hora estándar de Europa central)
//devuleve foramto: 00:00
function obtenerHoraEuropaCentral(fechaString) {
    // Crear un objeto Date a partir de la cadena de fecha
    const fecha = new Date(fechaString);

    // Extraer la hora y los minutos en formato HH:mm
    const horas = String(fecha.getHours()).padStart(2, '0'); // Asegura que tenga dos dígitos
    const minutos = String(fecha.getMinutes()).padStart(2, '0'); // Asegura que tenga dos dígitos

    return `${horas}:${minutos}`;
  }

//recibe formato: 2025-03-21T12:15:00
//devuleve foramto: Wed Mar 05 2025 00:00:00 GMT+0100 (hora estándar de Europa central)
function convertirFechaEuropaCentral(fechaString) {
    // Crear un objeto Date a partir de la cadena de fecha
    const fecha = new Date(fechaString);

    // Verificar si la fecha es válida
    if (isNaN(fecha.getTime())) {
      return 'Fecha inválida';
    }

    // Devolver la fecha en el formato deseado
    return fecha.toString();
  }


// Función para convertir fecha y hora necesaria para evento calendar
function formatFechaConHora(fecha, hora) {
    // Asegurarse de que 'fecha' sea un objeto Date
    let fechaObj = new Date(fecha);  // Convertir a un objeto Date si no lo es

    // Comprobar si la conversión a Date fue exitosa
    if (isNaN(fechaObj)) {
        console.error('Fecha no válida:', fecha);
        return;  // Si la fecha no es válida, no continuar con la función
    }
    let anio = fechaObj.getFullYear();
    let mes = String(fechaObj.getMonth() + 1).padStart(2, '0');  // Los meses van de 0-11
    let dia = String(fechaObj.getDate()).padStart(2, '0');

    let fechaStr = `${anio}-${mes}-${dia}`;
    // //console.log(`${fechaStr}T${hora}:00`, "desde formatFechaConhora");
    return `${fechaStr}T${hora}:00`;
}

// funcion formateo a fecha
function formatearFecha02(fecha) {
    // Creamos un objeto Date a partir de la fecha recibida
    const fechaObj = new Date(fecha);

    // Extraemos el año, mes y día
    const year = fechaObj.getFullYear();
    const month = String(fechaObj.getMonth() + 1).padStart(2, '0'); // El mes comienza en 0, por eso sumamos 1
    const day = String(fechaObj.getDate()).padStart(2, '0'); // Aseguramos que el día tenga dos dígitos

    // Devolvemos la fecha en formato YYYY-MM-DD
    return `${year}-${month}-${day}`;
}
// Ejemplo de uso
// const fecha = "Wed Mar 05 2025 00:00:00 GMT+0100 (hora estándar de Europa central)";
// //console.log(formatearFecha02(fecha)); // 2025-03-05



// Función para redondear los minutos a la fracción de 5 minutos más cercana
function redondearMinutos(minutos) {
    return Math.round(minutos / 5) * 5;
}

function ponerHoraInicioActual() {
    const input = document.getElementById('horaNewServiceInputInicioCalendar');
    let divVisualizador = document.querySelector('.slotHorasCobrarServicioCalendar');
    // Obtener la hora actual
    const ahora = new Date();
    let hora = ahora.getHours();
    let minutos = ahora.getMinutes();

    // Si son más de las 19:50, establecer la hora como 9:00 del día siguiente
    if (hora > 19 || (hora === 19 && minutos > 50)) {
        ahora.setDate(ahora.getDate() + 1); // Aumenta un día
        ahora.setHours(9, 0, 0, 0); // Establece las 9:00 del día siguiente
    } else {
        // Si es antes de las 19:50, redondear los minutos a la fracción de 5 más cercana
        minutos = redondearMinutos(minutos);
        ahora.setMinutes(minutos);
        ahora.setSeconds(0); // Eliminar los segundos
    }

    // Verificar si es el día siguiente y son las 8:50 o después, poner las 9:00
    if (ahora.getHours() === 8 && ahora.getMinutes() >= 50) {
        ahora.setHours(9, 0, 0, 0); // Establecer las 9:00 del mismo día
    }

    // Obtener la hora en formato local "HH:mm"
    let horaFormateada = ahora.toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});
    input.value = horaFormateada;
    divVisualizador.textContent = horaFormateada;
    document.querySelector('.slotHorasCobrarServicioCalendar').setAttribute('data-hourreserv', horaFormateada);
    marcarHoraSeleccionada('.contenedorHorasInicioCalendar', horaFormateada);
}

function redondearMinutos(minutos) {
    return Math.round(minutos / 5) * 5; // Redondea los minutos al múltiplo de 5 más cercano
}


function ponerHoraActualMasTreinta(){
    const inputDesde = document.getElementById('horaNewServiceInputInicioCalendar');
    const inputHasta = document.getElementById('horaNewServiceInputFinCalendar');
    let divVisualizador = document.querySelector('.slotHoraFinCorbrarServicioCalendar');
    // Obtener la hora y minutos del primer input (inputDesde)
    let horaDesde = inputDesde.value.split(":");
    let hora = parseInt(horaDesde[0]);
    let minutos = parseInt(horaDesde[1]);

    // Crear un nuevo objeto Date con la hora obtenida del primer input
    let ahora = new Date();
    ahora.setHours(hora);
    ahora.setMinutes(minutos);
    ahora.setSeconds(0);
    ahora.setMinutes(ahora.getMinutes() + 30);

    // Redondear los minutos del resultado a la fracción de 5 más cercana
    let minutosRedondeados = redondearMinutos(ahora.getMinutes());
    ahora.setMinutes(minutosRedondeados);

    // Obtener el nuevo valor en formato "HH:mm" en la zona horaria local
    let horaFormateada = ahora.toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});
    inputHasta.value = horaFormateada;
    marcarHoraSeleccionada('.contenedorHorasFinCalendar', horaFormateada);
    divVisualizador.textContent = horaFormateada;
}



//FUNCION INICIALIZAR DATEPIKER NUEVA RESERVA CALENDARIO
function initDatePikerNewReservCalendar() {
    const fechaCitaInfo2 = document.getElementById('datePikerfechaCitaInfo22');
    let fechaFlatpickrDiv2 = document.querySelector('.fechaCitaInfoNewReservCalendar');
    // Obtenemos la fecha y la hora actuales
    let fechaActual = new Date();
    let horaActual = fechaActual.getHours();
    let minutosActual = fechaActual.getMinutes();
   // Verificamos si la hora es mayor a las 19:50
    if (horaActual > 19 || (horaActual === 19 && minutosActual > 50)) {
        // Si es más tarde de las 19:50, configuramos la fecha para el día siguiente
        fechaActual.setDate(fechaActual.getDate() + 1);
        fechaActual.setHours(0, 0, 0, 0); // Establecer a medianoche para el día siguiente
    }
    // Asignar el atributo data-piker con el formato deseado al inicio
    document.querySelector('.fechaCitaInfo22').setAttribute('data-datepiker', fechaActual.toString());
    // Si deseas formatear la fecha a un formato específico, puedes usar esta función (ejemplo 'D, d M.')
    let fechaFormateada2 = formatDateForFlatpickr(fechaActual); // Si la función formatDateForFlatpickr está definida
    document.querySelector('.fechaCitaInfo22').setAttribute('data-date', fechaFormateada2);

    fechaFlatpickrDiv2.textContent = fechaFormateada2;
    flatpickr(fechaCitaInfo2, {
        inline: false, // Muestra el calendario como popup
        allowInput: true, // Permite escribir en el input
        clickOpens: true,
        enableTime: false, // Solo seleccionar fecha
        dateFormat: "D, d M.", // Formato: "lun, 2 dic"
        defaultDate: fechaActual, // Fecha actual como predeterminada
        disableMobile: true,
        locale: {
            firstDayOfWeek: 1,
            weekdays: {
                shorthand: ['dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb'],
                longhand: ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'],
            },
            months: {
                shorthand: ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'],
                longhand: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
            },
        }, // Cambiar a español
        onChange: function (selectedDates, dateStr, instance) {
            // Asignar el atributo data-datePiker con el formato deseado
            document.querySelector('.fechaCitaInfo22').setAttribute('data-datepiker', selectedDates);
            // //console.log(selectedDates, dateStr, "selected y dateStr");
            let fechaGotodate = formatearFecha02(selectedDates);
            if(calendar){
                calendar.gotoDate(fechaGotodate);
            }
            // let empleadoExstente = comprobarSiEmpleadoAsignadoNewReservCalendar('.slotEmpleadoAddInicioCalendar');
            // //console.log(empleadoExstente, "existeEmpleado");

            if(comprobarSiEmpleadoAsignadoNewReservCalendar('.slotEmpleadoAddInicioCalendar')){
                let fecha = document.getElementById('datePikerfechaCitaInfo22').getAttribute('data-datepiker');
                let horaInicio = document.querySelector('.slotHorasCobrarServicioCalendar').textContent;
                let horaFin = document.querySelector('.slotHoraFinCorbrarServicioCalendar').textContent;
                let start = formatFechaConHora(fecha, horaInicio);  // Fecha y hora de inicio
                let end = formatFechaConHora(fecha, horaFin);
                cambiarFechaEvento(eventIdChangeCalendar, start, end);
            }
            //estamos en la pantalla donde hay tarjetas drag para cambio fecha new reserv Calendar
            let existenTarjetasDrag = document.querySelectorAll('.nuevasTarjetasMostrarOcultarCalendar .subboking-drag-el');
            if(existenTarjetasDrag.length>0){
                // mostrarEventosArrayNewReservCalendar('datePikerfechaCitaInfo22');
                mostrarEventosArrayMejorado('datePikerfechaCitaInfo22');
            }

            // Cambia el contenido del párrafo al seleccionar una fecha parseInt(id_empleado)
            document.querySelector('.fechaCitaInfo22').setAttribute('data-date', dateStr);
            fechaFlatpickrDiv2.textContent = dateStr;
        },
    });
}

//cambiar fecha evento new reserv calendar
function cambiarFechaEvento(eventId, nuevaFechaInicio, nuevaFechaFin) {

    // Obtener el evento por su ID
    let evento = calendar.getEventById(eventId);
    // //console.log();

    // Verificar si el evento existe
    if (evento) {
        evento.setProp('classNames', (evento.classNames || []).concat('temporal'));
        // Cambiar la fecha de inicio
        evento.setStart(nuevaFechaInicio);
        // Cambiar la fecha de fin
        evento.setEnd(nuevaFechaFin);
        // //console.log(`El evento con ID: ${eventId} ha sido actualizado con nuevas fechas.`);
    } else {
        //console.log(`No se encontró el evento con ID: ${eventId}`);
    }
    setTimeout(() => {
        let eventoTemporal = document.querySelector('.fc-event.temporal');
        if (eventoTemporal) {
            // //console.log("hay temporalFecha");

            eventoTemporal.style.setProperty('border-left', `4px solid ${colorBordeNewReservCalendar}`, 'important');
        }else{
            //console.log("no hay evento temporal");

        }
    }, 800);

}


function obtenerPrimerosEventosFullcalendar() {
    // Obtener el total de servicios
    let totalServices = servicesWithTimes.length;
    let events = calendar.getEvents();
    // let firstEvents = events.slice(0, totalServices);
    // Obtener los últimos 5 eventos de FullCalendar
    let lastEvents = events.slice(-totalServices);  // Esto obtiene los últimos 5 eventos del array
    // return firstEvents;
    return lastEvents;
}

function cambiarFechaEventosArray(fecha) {
    // setTimeout(() => {
        let events = calendar.getEvents();
    //console.log(events, "cambiarFechaEventosArray-events");
    //console.log(servicesWithTimes, "cambiarFechaEventosArray-servicesWithTimes");
    //eliminar eventos iniciales más añadidos
    let primerosEventos = obtenerPrimerosEventosFullcalendar();
    //console.log(primerosEventos, "cambiarFechaEventosArray-ultimosEventos");
    // }, 400);


    // //console.log(eventosIds, "EVENTOS IDS CAMBIAR FECHA Array");
    let eventosIds = [];
    // Itera sobre los eventos y obtiene sus IDs
    primerosEventos.forEach(function(event) {
        eventosIds.push(event.id);
    // // var calendar = $('#calendar').fullCalendar('getCalendar');
    });
    //console.log(eventosIds, "eventosIds");

    // Itera sobre el array de IDs de eventos
    eventosIds.forEach(function(eventId, index) {

        //console.log(eventId, "eventId");

        // Busca el evento por su ID
        var event = calendar.getEventById(eventId);
        if (event) {
            let start = formatFechaConHora(fecha, servicesWithTimes[index].horaInicio);  // Fecha y hora de inicio
            let end = formatFechaConHora(fecha, servicesWithTimes[index].horaFin);      // Fecha y hora de finalización
            // Cambia la fecha de inicio y fin del evento
            event.setStart(start);
            event.setEnd(end);  // Si el evento tiene duración, puedes ajustarlo aquí
            event.setProp('classNames', ['temporal']);
            //console.log(event, "evento con fecha cambiada");
        }
    });
    calendar.render();

}
// Cambiar fecha evento en calendario
// function cambiarFechaEventoParaModificar(eventId, nuevaFechaInicio, nuevaFechaFin) {
//     //console.log(eventId, nuevaFechaInicio, nuevaFechaFin, "cambiarFechaEvento");

//     // Obtener el evento por su ID
//     let evento = calendar.getEventById(eventId);

//     // Verificar si el evento existe
//     if (evento) {
//         // Cambiar la fecha de inicio
//         evento.setStart(nuevaFechaInicio);
//         // Cambiar la fecha de fin
//         evento.setEnd(nuevaFechaFin);

//         // Forzar la actualización del evento (re-renderizar)
//         evento.setProp('start', nuevaFechaInicio);
//         evento.setProp('end', nuevaFechaFin);

//         // También puedes forzar el calendario a que se actualice completamente
//         calendar.render(); // Esto es útil si el evento no se está renderizando correctamente

//         //console.log(`El evento con ID: ${eventId} ha sido actualizado con nuevas fechas.`);
//     } else {
//         //console.log(`No se encontró el evento con ID: ${eventId}`);
//     }

//     // Actualizar el estilo del evento temporal con un pequeño retraso
//     setTimeout(() => {
//         let eventoTemporal = document.querySelector('.fc-event.temporal');
//         if (eventoTemporal) {
//             // Cambiar el borde del evento temporal
//             eventoTemporal.style.setProperty('border-left', `4px solid ${colorBordeNewReservCalendar}`, 'important');
//         }
//     }, 800);
// }


function comprobarEmpleadoSelect(slotEmpleado, contenido){
    if(document.querySelector(slotEmpleado).textContent.trim() === contenido){
        // setTimeout(() => {
        //     alert("Selecciona empleado");
        // }, 500);
        return false;
    }else{
        return true;
    }
}

function comprobarServicioSeleccionado(slotServicio, contenido){
    if(document.querySelector(slotServicio).textContent.trim() === contenido){

        return false;
    }else{
        return true;
    }
}


//FUNCION CLIC EN TRAJETAS SERVICIOS CALENDAR
// Función auxiliar para mostrar el servicio
function mostrarServicio(data, horaFin, contenedor) {
    aniadirServicioHtml(data.servicio.borderColor, data.servicio.nombre, data.servicio.duration, data.servicio.precio, contenedor, 'services_serviceInfo_iDMQwAddCalendar');
    // document.querySelector('.slotHoraFinCorbrarServicioAddCalendar').textContent = horaFin;
    document.querySelector('.newReservCalendar00').style.display = 'none';
    document.querySelector('.allServicesAddCalendar00').style.display = 'block';
    document.querySelector('.allservicesVistaOtroServicioCalendar').style.display = 'none';
}

// Función auxiliar para mostrar mensaje de confirmación
function confirmarExcesoDeHora(horaFinDate) {
    const horaReferencia = new Date("1970-01-01T20:00:00"); // hora de referencia 20:00
    return horaFinDate > horaReferencia;
}

// Función principal que maneja el clic en las tarjetas de servicio CALENDAR
function clicTarjetasVerdesServiciosCalendar() {
    const targetServicesAddCalendar = document.querySelectorAll('.services-list_serviceVariant_i9qZrAdd_calendar');
    if (targetServicesAddCalendar.length) {
        targetServicesAddCalendar.forEach(targetAddCale => {
            targetAddCale.addEventListener('click', function (event) {
                event.preventDefault();

                const id_serviceChange = targetAddCale.getAttribute('data-serviciochange');
                const csrfToken = $('meta[name="csrf-token"]').attr("content");
                const url = "get-serviceById";

                // Hacer una petición AJAX al servidor
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        _token: csrfToken,
                        id_service: id_serviceChange,
                    },
                    success: function (data) {
                        if (data.encontrado) {
                            let contenedor = '';
                            let horaFin;
                            // //console.log(data.servicio.duration, "DURATION");

                            //SI ES PANTALLA #2 servicio CALENDAR, referencia a servicios tarjeta verde calendar
                            if (document.querySelector('.allServicesAddCalendar00').classList.contains('allservicesVistaOtroServicioCalendar')) {
                                // //console.log("pantalla #2");

                                document.querySelector('.selectServiceAddCalendar').setAttribute('data-service', data.servicio.id);
                                const empleadoSeleccionado2 = comprobarEmpleadoSelect('.slotEmpleadoAddInicioCalendarAdd', 'Selecciona Empleado');
                                if (empleadoSeleccionado2) {
                                    document.getElementById('uid-377-inputCalendar').classList.remove('index_is--disabled_w97Nq');
                                }

                                const horaInicioAddCalendar = document.querySelector('.slotHorasCobrarServicioAddCalendar').textContent;
                                horaFin = calcularHoraFin(horaInicioAddCalendar, data.servicio.duration.toString());
                                const horaFinDate = new Date("1970-01-01T" + horaFin + ":00");

                                if (confirmarExcesoDeHora(horaFinDate)) {
                                    const confirmarHoraExcedeCierre = confirm('!!Atención el servicio excede la hora de cierre, ¿Deseas continuar?');
                                    if (confirmarHoraExcedeCierre) {
                                        contenedor = '.selectServiceAddCalendar';
                                        mostrarServicio(data, horaFin, contenedor);
                                    }
                                } else {
                                    contenedor = '.selectServiceAddCalendar';
                                    mostrarServicio(data, horaFin, contenedor);
                                }

                                let eventoTemporalCalendario2 = document.querySelector('.fc-event.temporal2');
                                if(eventoTemporalCalendario2){
                                    // //console.log(eventoTemporalCalendario2, "eventoTemporalCalendarioSeleccionaSErvicio");
                                    actualizarEvento(eventIdChangeCalendar, data.servicio.nombre, data.servicio.borderColor, '.fc-event.temporal2');
                                }else{
                                    colorBordeNewReservCalendar = data.servicio.borderColor;
                                }
                                //SI ES PANTALLA MODIFICAR SERVICIO INICIAL CALENDAR
                            } else {
                                // //console.log("pantalla inicial servicio");
                                if (document.querySelector('.allServicesAddCalendar00').classList.contains('allservicesModificarInicialCalendar')) {
                                    contenedor = '.addServiceCalendar66';
                                    const id_serviceOld = document.querySelector('.services_serviceInfo_iDMQwAddCalendar').getAttribute('data-indexActual');
                                    removeServiceArray(id_serviceOld);
                                } else {
                                    contenedor = '.addServiceCalendar';
                                }

                                if (document.querySelector('.allServicesAddCalendar00')) {
                                    document.querySelector('.allServicesAddCalendar00').style.display = 'none';
                                }

                                document.querySelector('.newReservCalendar00').style.display = 'block';
                                aniadirServicioHtml(data.servicio.borderColor, data.servicio.nombre, data.servicio.duration, data.servicio.precio, contenedor, 'services_serviceInfo_iDMQwAddCalendar');
                                document.querySelector('.services_serviceInfo_iDMQwAddCalendar').setAttribute('data-indexActual', data.servicio.id);

                                addServiceArray(data.servicio.id);
                                cambiarTotales(data.servicio.precio);

                                const horaInicio00 = document.querySelector('.slotHorasCobrarServicioCalendar').getAttribute('data-hourreserv');
                                const horafin00 = calculateEndTime(horaInicio00, data.servicio.duration);
                                // //console.log(horafin00, "HORA FIN");

                                document.querySelector('.slotHoraFinCorbrarServicioAddCalendar').textContent = horafin00;

                                //comprobar si hay evento para poner border y title
                                let eventoTemporalCalendario = document.querySelector('.fc-event.temporal');
                                if(eventoTemporalCalendario){
                                    // //console.log(eventoTemporalCalendario, "eventoTemporalCalendarioSeleccionaSErvicio");
                                    actualizarEvento(eventIdChangeCalendar, data.servicio.nombre, data.servicio.borderColor, '.fc-event.temporal');

                                }else{
                                    colorBordeNewReservCalendar = data.servicio.borderColor;
                                }
                            }

                            const empleadoSeleccionado = comprobarEmpleadoSelect('.slotEmpleadoAddInicioCalendar', 'Selecciona Empleado');
                            if (empleadoSeleccionado) {
                                document.getElementById('uid-798-input').classList.remove('index_is--disabled_w97Nq');
                                document.getElementById('uid-3978-input').classList.remove('index_is--disabled_w97Nq');
                                document.getElementById('uid-3978-input').removeAttribute('disabled');
                            }
                        }
                    },
                    error: function (xhr) {
                        //console.log('Error al guardar el nombre de la categoria', xhr);
                    }
                });
            });
        });
    }
}

clicTarjetasVerdesServiciosCalendar();

//función cambiarPrimeraParte titulo evento new reserv calendar
function cambiarSegundaParteTitleEvent(id_evento, descripcion){
     let evento = calendar.getEventById(id_evento);
     let tituloActual = evento.title; // Obtener el título actual, si existe
     evento.setProp('title', tituloActual + ' • ' + descripcion);
     if (evento) {
     }
}


// Función para actualizar la descripción y el borde del evento en new reserv calendar
function actualizarEvento(eventId, nuevaDescripcion, colorBorde, eventoTemporalEnviado) {
    //console.log("entro en actualizar evento", eventId, nuevaDescripcion, colorBorde, eventoTemporalEnviado);

    // Cambiamos el borde sólo visualmente para inicio
    let eventoTemporal = document.querySelector(eventoTemporalEnviado);
    if (eventoTemporal) {
        eventoTemporal.style.setProperty('border-left', `4px solid ${colorBorde}`, 'important');
    }

    // Cambiamos la variable para otros métodos que la utilizan
    let evento = calendar.getEventById(eventId);  // Obtener el evento por ID
    colorBordeNewReservCalendar = colorBorde;

    // Verificar si el evento existe
    if (evento) {
        let tituloActual = evento.title || ''; // Obtener el título actual, si existe

        // Verificar si el título contiene un punto gordo (•)
        if (tituloActual.includes('•')) {
            // Dividir el título en dos partes: antes y después del punto gordo
            let partes = tituloActual.split('•');
            // Cambiar todo lo que está después del punto por nuevaDescripcion
            evento.setProp('title', partes[0] + ' • ' + nuevaDescripcion);
        } else {
            // Si no hay punto gordo, agregar nuevaDescripcion al final del título
            evento.setProp('title', tituloActual + ' • ' + nuevaDescripcion);
        }

        // Cambiar el estilo 'border-left' del evento
        //console.log(evento.id, "EVENTO ID___________________");

        let eventEl = document.querySelector(`#${evento.id}`);  // Obtener el elemento del evento
        if (eventEl) {
            eventEl.style.setProperty('border-left', `4px solid ${colorBorde}`, 'important');
        }
    } else {
        //console.log(`No se encontró el evento con ID: ${eventId}`);
    }
}


//función que cambia el title del evento si hay cliente
function actualizarEventoCliente(eventId, cliente) {
    //console.log("entro en actualizarEventoCliente");

    //console.log("eventoId: ", eventId, "cliente: ", cliente);

    // Obtener el evento utilizando el id del evento
    let evento = calendar.getEventById(eventId);  // Usando FullCalendar como ejemplo para obtener el evento por id

    if (evento) {
        // Obtener el título actual del evento
        let tituloActual = evento.title; // Si no tiene un título, se inicializa como cadena vacía

        // Comprobar si el título contiene el "punto gordo" (•)
        if (tituloActual.includes('•')) {
            // Dividir el título en dos partes: antes y después del punto gordo
            let partes = tituloActual.split('•');
            // Cambiar todo lo que está antes del punto por la variable 'cliente'
            evento.setProp('title', cliente + ' • ' + partes[1].trim());
        } else {
            // Si no hay punto gordo, simplemente poner el título como 'cliente'
            evento.setProp('title', cliente);
        }
    } else {
        //console.log(`No se encontró el evento con id ${eventId}`);
    }
}

function actualizarEventoClienteArray(cliente) {
    // //console.log("entramos en actualizarEventoClienteArray");

    // Obtener todos los eventos del calendario
    let eventos = calendar.getEvents();  // FullCalendar: Obtiene todos los eventos

    // Filtrar los eventos cuyo id comienza con 'temporalArray_'
    // let eventosFiltrados = eventos.filter(evento => evento.id.startsWith('temporalArray_'));
   // Imprime el contenido del array infoArrayEnvio
//console.log(infoArrayEnvio, "actualizarEventoClienteArray--infoArrayEnvio");

// Inicializa un array vacío para almacenar los eventos filtrados
let eventosFiltrados = [];

// Filtra los eventos que tienen un id que empieza con 'temporalArray_'
eventosFiltrados = eventos.filter(evento => evento.id.startsWith('temporalArray_'));
//console.log(eventosFiltrados, "eventosFiltrados--temporalArray_");

// Si hay elementos en infoArrayEnvio, ejecutamos más filtros
if (infoArrayEnvio.length) {
    // Filtra los eventos que tienen un id que empieza con 'eventoTemporal_'
    eventosFiltrados = eventos.filter(evento => evento.id.startsWith('eventoTemporal_'));

    // Si se encontraron eventos de tipo 'eventoTemporal_'
    if (eventosFiltrados.length > 0) {
        // Creamos un array para almacenar los eventos correspondientes a los ids de infoArrayEnvio
        let eventosFiltrados2 = [];

        // Para cada evento en infoArrayEnvio, obtenemos el evento correspondiente del calendario
        infoArrayEnvio.forEach(eventArray => {
            eventosFiltrados2.push(calendar.getEventById(eventArray.id));
        });

        // Si se encontraron eventos en eventosFiltrados2, los unimos a los eventosFiltrados
        if (eventosFiltrados2.length > 0) {
            eventosFiltrados = [...eventosFiltrados, ...eventosFiltrados2];
        }
    } else {
        // Si no se encontraron eventos tipo 'eventoTemporal_', filtramos nuevamente por 'temporalArray_'
        eventosFiltrados = eventos.filter(evento => evento.id.startsWith('temporalArray_'));
        //console.log(eventosFiltrados, "eventosFiltrados--temporalArray_");
    }

    // Si no se encontraron eventos en eventosFiltrados
    if (eventosFiltrados.length === 0) {
        //console.log("eventosFiltrados.length === 0");

        // Filtra nuevamente los eventos por 'temporalArray_'
        eventosFiltrados = eventos.filter(evento => evento.id.startsWith('temporalArray_'));

        // Si aún no se encontraron eventos, se buscan los eventos iniciales desde infoArrayEnvio
        if (eventosFiltrados.length === 0) {
            infoArrayEnvio.forEach(eventArray => {
                eventosFiltrados.push(calendar.getEventById(eventArray.id));
            });
        }
    }
    let events = calendar.getEvents();
    //console.log(events, "eventos--calendar.getEvents");
}

    // //console.log(eventosFiltrados, "ACTUALIZAReVENTOaRRAY--eventosFiltrados");
    // //console.log(infoArrayEnvio.length, "ACTUALIZAReVENTOaRRAY--infoArrayEnvio.lend");
    // //console.log(eventIdChangeCalendarArray, "ACTUALIZAReVENTOaRRAY--idsEventosArray");
    // //console.log(infoArrayEnvio, "ACTUALIZAReVENTOaRRAY--infoArrayEnvio");

    // if(infoArrayEnvio[0].extendedProps){
    //     if(infoArrayEnvio[0].extendedProps.multiple){
    //         //console.log("tiene multiple");

    //     }else{
    //         //console.log("no tiene multipel");

    //     }
    // }

    // Recorrer cada evento filtrado y actualizar su título
    eventosFiltrados.forEach(evento => {
        //console.log(evento, "evento");

        let tituloActual = evento.title || '';  // Obtener el título actual del evento

        // Comprobar si el título contiene el "punto gordo" (•)
        if (tituloActual.includes('•')) {
            // Dividir el título en dos partes: antes y después del punto gordo
            let partes = tituloActual.split('•');
            // Cambiar todo lo que está antes del punto por la variable 'cliente'
            evento.setProp('title', cliente + ' • ' + partes[1].trim());
        } else {
            // Si no hay punto gordo, simplemente poner el título como 'cliente'
            evento.setProp('title', cliente);
        }
    });

}

//BOTON GUARDAR NEW RESERV
function botonGuardarCalendar(){
    const botonGuardarServicio = document.getElementById('uid-377-inputCalendar');
    if(botonGuardarServicio){
        botonGuardarServicio.addEventListener('click', function () {
            // //console.log("clic en guardar");
            // loaderWite();
            document.getElementById('uid-377-inputCalendar').classList.add('index_is--disabled_w97Nq');

            let id_servicio0120 = document.querySelector('.selectServiceAddCalendar').getAttribute('data-service');
            addServiceArray(parseInt(id_servicio0120, 10));


            let element33 = document.querySelector('.selectServiceAddCalendar .services_serviceDecorator_ldMxA');
            let style = window.getComputedStyle(element33);
            let colorborde = style.borderColor;
            // colorborde = colorborde.split(':')[1];
            colorBordeReservArray.push(colorborde);
;
            let horaIncioAddCalendar = document.querySelector('.slotHorasCobrarServicioAddCalendar').textContent;
            let horaFinAddCalendar = document.querySelector('.slotHoraFinCorbrarServicioAddCalendar').textContent;
            let duracion = calcularDuracion(horaIncioAddCalendar, horaFinAddCalendar);

            meterHorasArraySecundaria('.slotHorasCobrarServicioAddCalendar', '.slotHoraFinCorbrarServicioAddCalendar', '.slotEmpleadoAddInicioCalendarAdd', duracion);

            resetAddServiceScreen('.selectServiceAddCalendar', '.slotEmpleadoAddInicioCalendarAdd');
            document.querySelector('.allServicesAddCalendar00Add').style.display = 'none';
            document.querySelector('.newReservCalendar00').style.display = 'block';
            let divTarjetasInicialesCalendar = document.querySelector('.tarjetasIncialesMostrarOcultarCalendar');
            divTarjetasInicialesCalendar.classList.add('d-none');

            let divNuevasTrajetasCalendar = document.querySelector('.nuevasTarjetasMostrarOcultarCalendar');
            getServicesById(selectedServiceIds2,function (servicios){
               let htmlContentCalendar = '';
               let totalPricePay=0;
                //obtenemos los empleados
                getAllEmpleados(function(empleadosReservas) {
                    let inicialesEmpleados = [];
                    nombreEmpleadosArray = [];
                    let apellidos = [];
                     // Recorremos el array servicesWithTimes
                     servicesWithTimes.forEach(service => {
                        // Buscamos el empleado correspondiente usando el id_empleado
                        let empleado = empleadosReservas.find(emp => emp.id === parseInt(service.id_empleado));
                        if (empleado) {
                            // Obtenemos las primeras dos letras del nombre del empleado
                            let iniciales = empleado.nombre.substring(0, 2).toUpperCase();
                            let nombre = empleado.nombre;
                            let apellido = empleado.primerApellido;
                            inicialesEmpleados.push(iniciales);
                            nombreEmpleadosArray.push(nombre);
                            apellidos.push(apellido);
                        }
                    });
                    servicios.forEach((servicio, index) => {
                        let precioNumerico = parseFloat(servicio.precio);
                        totalPricePay += precioNumerico;
                        let tiempoFormateada = comprobar603090(servicio.duration);
                        let apellido55 = apellidos[index];
                        let nombreEmpleado55 = nombreEmpleadosArray[index];
                        let inicialesEmpleado33 = inicialesEmpleados[index];
                        let servicioHorario = servicesWithTimes[index];
                        let seleccionaCliente = servicesWithTimes[index].seleccionaCliente;
                        let duracionServicio = servicioHorario
                            ? `${servicioHorario.horaInicio} - ${servicioHorario.horaFin}`
                            : "Horario no disponible";
                         // Construir HTML
                         htmlContentCalendar += construirHtmlTarjetasFinales(
                            servicio.borderColor,
                            servicio.nombre,
                            servicio.precio,
                            duracionServicio,
                            tiempoFormateada,
                            nombreEmpleado55,
                            inicialesEmpleado33,
                            apellido55,
                            seleccionaCliente
                        );
                    });
                     // Agregar todo el contenido generado al contenedor nuevo newReservCalendar
                     $(divNuevasTrajetasCalendar).empty();
                     $(divNuevasTrajetasCalendar).append(htmlContentCalendar);
                     addHtmlDivPrecioFinal(totalPricePay, '#newReservCalendar p[data-testid="appointment-price2"]', '#newReservCalendar div[data-testid="appointment-to-be-paid2"]');
                     eventIdChangeCalendarArray = [];
                     infoArrayEnvio = [];

                     let eventos = calendar.getEvents();
                    // Filtrar los eventos cuyo id empiece con "eventoTemporal_"
                    let eventosTemporales = eventos.filter(event => event.id.startsWith('eventoTemporal_'));
                    eventosTemporales.forEach(evento => {
                        eventIdChangeCalendarArray.push(evento.id);
                        infoArrayEnvio.push(evento);
                    });


                     eliminarEventosTemporales('eventoTemporal_');
                     let tarjetasServiciosMultiples = document.querySelectorAll('.subbookings-list_card_j4UGY');
                     tarjetasServiciosMultiples.forEach((tarjeta, index) => {
                         boton = tarjeta.querySelector('.buttonEditEvent');
                         boton.setAttribute('data-index', eventIdChangeCalendarArray[index]);
                         boton.setAttribute('data-border', colorBordeReservArray[index]);
                         boton.setAttribute('data-new', true);
                     });
                    //  //console.log(selectedServiceIds2, "servicios Ids2", servicesWithTimes, "serviciosTiempo__");
                    //  mostrarEventosArrayNewReservCalendar('datePikerfechaCitaInfo22');
                    mostrarEventosArrayMejorado('datePikerfechaCitaInfo22');
                    console.log(servicesWithTimes, infoArrayEnvio,selectedServiceIds, selectedServiceIds2,colorBordeReservArray,eventIdChangeCalendarArray, "boton guardar servicesTime y infoarayEnvio, eventIdChangeCalendarArray");
                });
            });
        });
    }
}
botonGuardarCalendar();



// Llamar a la función para ambos botones



//METER HORAS ARRAY VISTA CALENDAR
function meterHorasArrayVistaCalendar(){
    let horaIncioScreenCalendar = document.querySelector('.slotHorasCobrarServicioCalendar').textContent;
    let horaFinScreenCalendar = document.querySelector('.slotHoraFinCorbrarServicioCalendar').textContent;
    let idEmpleadaCalendar = document.querySelector('.slotEmpleadoAddInicioCalendar').getAttribute('data-empleid');
    selectedServiceIds.forEach(serviceId => {
            servicesWithTimes.push({
                id: serviceId,
                horaInicio: horaIncioScreenCalendar,
                horaFin: horaFinScreenCalendar,
                id_empleado:idEmpleadaCalendar
            });
        });
        //console.log(servicesWithTimes, "servicios con tiempo calendar");
        selectedServiceIds = [];
}


//función que abre allServices en la vista calendario
function openAllservicesPlantillaCalendar(){
    document.querySelector('.newReservCalendar00').style.display='none';
    document.querySelector('.allServicesAddCalendar00').style.display='block';
}

//FUNCION CLIC EN TARJETA BLANCA AÑADIR SERVICIO DESDE CALENDAR addServiceCalendar
function clicWhiteTargeAddServiceCalendar(){
    const tarjetaAniadirServicio = document.querySelector('.addServiceCalendar');
    if (tarjetaAniadirServicio) {
        tarjetaAniadirServicio.addEventListener('click', function () {
            openAllservicesPlantillaCalendar();
        });
    }
}
clicWhiteTargeAddServiceCalendar();

//FUNCIÓN CLIC EN TARJETA SERVICIO PARA MODIFICAR CALENDAR
function clicTarjetaModificarServicioIncialCalendar(){
    const tarjetaSecundarioCalendar = document.querySelector('.addServiceCalendar66');
    if (tarjetaSecundarioCalendar) {
        tarjetaSecundarioCalendar.addEventListener('click', function (){
            //console.log("CLIC EN TARJETA ");
            document.querySelector('.allServicesAddCalendar00').classList.add('allservicesModificarInicialCalendar');
        });
    }
}

//CLICAR EN "SELECCIONAR OTRO SERVICIO vista servicio #2 calendar"
function clicTarjetaSeleccionarOtroServicioCalendar(){
    let botonAddServiceAddCalendar = document.querySelector('.selectServiceAddCalendar');
    if (botonAddServiceAddCalendar) {
        botonAddServiceAddCalendar.addEventListener('click', function () {
        document.querySelector('.allServicesAddCalendar00').classList.add('allservicesVistaOtroServicioCalendar');
        openAllservicesPlantillaCalendar();
    });
}
}
clicTarjetaSeleccionarOtroServicioCalendar();

//FUNCION CLIC BOTON AÑADIR SERVICIO VISTA CALENDARIO
function clicBotonAniaridServicioCalendar(){
    // const botonAddMoreService = document.getElementById('uid-3978-input');//boton añadir servicio uid-3978-input
    // if (botonAddMoreService) {
    //     botonAddMoreService.addEventListener('click', function (event) {
            // event.preventDefault();
            if(document.querySelector('.allServicesAddCalendar00').classList.contains('allservicesModificarInicialCalendar')){
                document.querySelector('.allServicesAddCalendar00').classList.remove('allservicesModificarInicialCalendar');
            }else if(document.querySelector('.allServicesAddCalendar00').classList.contains('allservicesVistaOtroServicioCalendar')){
                document.querySelector('.allServicesAddCalendar00').classList.remove('allservicesVistaOtroServicioCalendar');
            }

            let seleccionaCliente_valor = document.getElementById('solicictaCliente').value;
            let horaInicioDuracion = document.querySelector('.slotHorasCobrarServicioCalendar').textContent;
            let horaFinDuracion = document.querySelector('.slotHoraFinCorbrarServicioCalendar').textContent;
            let duracion = calcularDuracion(horaInicioDuracion, horaFinDuracion);
            // let tarjetaInicio = document.querySelector('.tarjetasIncialesMostrarOcultarCalendar');
            let tarjetasServiciosMultiples = document.querySelectorAll('.subbookings-list_card_j4UGY');
            // console.log(tarjetasServiciosMultiples.length, "tarjetasServiciosMultiples");

            if(tarjetasServiciosMultiples.length === 0){
                meterHorasArrayInicio('.slotHorasCobrarServicioCalendar', '.slotHoraFinCorbrarServicioCalendar', '.slotEmpleadoAddInicioCalendar', seleccionaCliente_valor, duracion);
                let element = document.querySelector('.addServiceCalendar66 .services_serviceDecorator_ldMxA');
                if(element){
                    let style = window.getComputedStyle(element);
                    let colorborde = style.borderColor;
                    // colorborde = colorborde.split(':')[1];
                    colorBordeReservArray.push(colorborde);
                }
            }


            document.querySelector('.newReservCalendar00').style.display='none';
            document.querySelector('.allServicesAddCalendar00').style.display='none';
            document.querySelector('.allServicesAddCalendar00Add').style.display='block';

            let totalServicios = selectedServiceIds2.length + 1;
            let divTotalServicios = document.querySelector('.totalServiciosAñadidosCalendar');
            if(!divTotalServicios){
                divTotalServicios = document.querySelector('.allServicesAddCalendar00Add .totalServiciosAñadidos');
            }
            divTotalServicios.textContent = `Servicio #${totalServicios}`;

            let horaInicioAddCalendar='';
            let divHoraInicioAddCalendar = document.querySelector('.slotHorasCobrarServicioAddCalendar');
            if(servicesWithTimes.length >= 2){
                //obtener última posicion array
                horaInicioAddCalendar = servicesWithTimes[servicesWithTimes.length - 1].horaFin;
            }else{
                //cojer hora fin pantalla anterior y ponerla de inicio allServicesAddCalendar00Add
                horaInicioAddCalendar = document.querySelector('.slotHoraFinCorbrarServicioCalendar').textContent;
            }

            document.querySelector('.slotHoraFinCorbrarServicioAddCalendar').textContent = calcularHoraFin(horaInicioAddCalendar, '30min');
            divHoraInicioAddCalendar.textContent = horaInicioAddCalendar;

            //marcar hora inicio
            marcarHoraSeleccionada('.contenedorHorasInicioAddCalendar', horaInicioAddCalendar);
            //marcar hora fin
            marcarHoraSeleccionada('.contenedorHorasFinAddCalendar', calcularHoraFin(horaInicioAddCalendar, '30min'));

            //resetear corazon selecionaCliente de la vista ass new reserv
            let corazonCalendarPantalla2 = document.querySelector('.solicitadoClientePantalla2 ');
            corazonCalendarPantalla2.src = urlAplicacion + "/storage/calendar/heart-empty.svg";
            document.getElementById('solicictaCliente').value = 0;
            console.log(colorBordeReservArray, "boton añadir ArrayBorde");
    //     });
    // }
}
// clicBotonAniaridServicioCalendar();
//FLECHA ATRAS NEW RESERV
function resetPantalla2NewReservCalendar(){
    // const fechaAtras = document.querySelector('.exitShowAllServicesChangeCalendar');
    // if (fechaAtras) {
        // fechaAtras.addEventListener('click', function (event){
            // event.preventDefault();
            let eventosConTemporalDos = document.querySelectorAll('.temporal2');
            //vacio .leng=1
            //Cuando le damos a seleccionar empleado aparece en calendar y .leng=1
            if(servicesWithTimes.length > 0){
                if(eventosConTemporalDos.length > 0){
                    eliminarEventoCalendario(eventIdChangeCalendar);

                };
                if(servicesWithTimes.length === 1){
                    colorBordeReservArray = [];
                }else{
                    // colorBordeReservArray.pop(); //quitar última posición array
                    colorBordeReservArray = colorBordeReservArray.slice(0, servicesWithTimes.length);
                }

            }
            //general para todos
            document.getElementById('uid-377-inputCalendar').classList.add('index_is--disabled_w97Nq');
            let corazon = document.querySelector('.solicitadoClientePantalla2');
            corazon.srcc = urlAplicacion + "/storage/calendar/heart-empty.svg";

            document.querySelector('.contenedorHorasFinAddCalendarclass').classList.remove('border-warning2');
            let errorHoraFinMenorqueInicio = document.querySelector('.alert024');
            $(errorHoraFinMenorqueInicio).empty();
            resetAddServiceScreen('.selectServiceAddCalendar', '.slotEmpleadoAddInicioCalendarAdd');
            document.querySelector('.allServicesAddCalendar00Add').style.display='none';
            document.querySelector('.newReservCalendar00').style.display='block';
            // console.log(servicesWithTimes.length,eventIdChangeCalendar, eventosConTemporalDos, "serviceWtimes.leng eventIdChangeCalendar");
            // console.log(servicesWithTimes, infoArrayEnvio,selectedServiceIds, selectedServiceIds2,colorBordeReservArray,eventIdChangeCalendarArray, "flecha atras servicesTime y infoarayEnvio, eventIdChangeCalendarArray");
            // console.log("------------------------------");
        // });
    // }
}
// resetPantalla2NewReservCalendar();

//flecha atras change service new reserv calendar
function backNewReservChangeInitial(){
    document.querySelector('.allServicesAddCalendar00').style.display='none';
    document.querySelector('.newReservCalendar00').style.display='block';
}

//clic en la cruz cerrar offcanvas-newReserv-calendar
function clicCruzNewReserCalendar(){
    showAllNewReservCalendarPlantilla();
    // const cruzNewReservCalendar= document.querySelector('.closedOffcanvasNewReservCalendar span');
    // if (cruzNewReservCalendar) {
    //     cruzNewReservCalendar.addEventListener('click', function (){
        //cerrar add new service

            let vistaAddNewService = document.querySelector('.allServicesAddCalendar00Add');
            if(vistaAddNewService){
                vistaAddNewService.style.display='none';
            }
            let eventosConTemporalDos = document.querySelectorAll('.temporal2');
            // // //console.log("CLIC EN cruz ");
            let divErrorHoraFinMenorqueInicio= document.querySelector('.alert023');
            $(divErrorHoraFinMenorqueInicio).empty();
            document.querySelector('.contenedorHorasFinCalendarclass').classList.remove('border-warning2');


            $('#newReservCalendar').offcanvas('hide');
            resetArrays();
            colorBordeReservArray = [];

            //sólo hay un servicio inicial
            // if(servicesWithTimes.length === 0){
            //     eliminarEventoCalendario(eventIdChangeCalendar);
            // }
            scrollToHour('09:00:00');
            let calendar032 = document.getElementById('calendar');
            calendar032.classList.remove('calendarEstrecho');
            initializeCalendar();
            enablePointerEvents();
            // havilitar botones
            let miDiv = document.querySelector('.fc-header-toolbar');
            let botones = miDiv.getElementsByTagName('button');
            for (let boton of botones) {
                boton.disabled = false;
            }
            // console.log(servicesWithTimes.length,eventIdChangeCalendar, eventosConTemporalDos, "serviceWtimes.leng eventIdChangeCalendar");
            // console.log(servicesWithTimes, infoArrayEnvio,selectedServiceIds, selectedServiceIds2,colorBordeReservArray,eventIdChangeCalendarArray, "flecha atras servicesTime y infoarayEnvio, eventIdChangeCalendarArray");
            // console.log("------------------------------");
    //     });
    // }
}

//clic flecha atras vista añadir servico calendar
function clicFlechaAtrasVistaAniadirServicio(){
    const flecha = document.querySelector('.closedOffcanvasNewReservCalendar00Add');
    if (flecha) {
        flecha.addEventListener('click', function (){
            //console.log("CLIC EN flecha ");
            // showAllNewReservCalendarPlantilla();
        });
    }
}
// clicBotonAniaridServicioCalendar();

function resetArrays(){
    selectedServiceIds = [];
    selectedServiceIds2 = [];
    servicesWithTimes = [];
    // nombreEmpleado='';
    // apellidoEmpleado='';
    // fechaReserva='';
    // infoArrayEnvio=[];
    // empleadosReservas=[];
    // eventIdChangeCalendar='';
    // colorBordeNewReservCalendar='';
    // colorBordeReservArray = [];
    // oldStatus='';
    // idEventModify = '';
    // idEventoInicial = '';//almacena id evento clicado multiple == null;
    // //clic reservas multiples
    // eventIdChangeCalendarArray = [];
    // oldStatusArray = [];
    // nombreEmpleadosArray = [];
    // //console.log(selectedServiceIds.length, selectedServiceIds2.length, servicesWithTimes.length);

}
// obtener plantilla offcanvasNewReserv calendar
function showAllNewReservCalendarPlantilla(){
    fetch('show-newReservCalendar-plantilla')
    .then(response => response.text())
    .then(data => {
        $('.contenedorOfcanvasNewReservCalendar').empty();
        document.querySelector('.contenedorOfcanvasNewReservCalendar').innerHTML = data;
        clicWhiteTargeAddServiceCalendar();
        clicTarjetasVerdesServiciosCalendar();
        // clicCruzNewReserCalendar();
        seleccionarElemento('.contenedorHorasInicioAddCalendar', 'horaNewServiceInputInicioAddCalendar', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgHorasInicioAddCalendar');
        seleccionarElemento('.contenedorHorasFinAddCalendar', 'horaNewServiceInputFinAddCalendar', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgHorasFinAddCalendar');
        seleccionarElemento('.contenedorHorasInicioCalendar', 'horaNewServiceInputInicioCalendar', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgHorasInicioCalendar');
        seleccionarElemento('.contenedorHorasFinCalendar', 'horaNewServiceInputFinCalendar', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgHorasFinCalendar');
        // clicBotonAniaridServicioCalendar();
        clicTarjetasBlancasSelectCliente();
        seleccionarElemento('.contenedorEmpleadosInicioCalendar', 'uid-inicio-inputCalendar', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgEmpleadoAddInicioCalendar');
        seleccionarElemento('.contenedorEmpleadosInicioCalendarAdd', 'uid-inicio-inputCalendarAdd', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgEmpleadoAddInicioCalendarAdd');
        // Llamar a la función para ambos botones
        mostrarEmpleadoDisponible('.styles_outerWrapper_AddEmpleInicioCalendar', '.slotEmpleadoAddInicioCalendar', '.slotHorasCobrarServicioCalendar', '.slotHoraFinCorbrarServicioCalendar', '#selectEmpleModalAddInicioCalendar', '.fechaCitaInfo22');
        mostrarEmpleadoDisponible('.styles_outerWrapper_AddEmpleInicioCalendarAdd', '.slotEmpleadoAddInicioCalendarAdd', '.slotHorasCobrarServicioAddCalendar', '.slotHoraFinCorbrarServicioAddCalendar', '#selectEmpleModalAddInicioCalendarAdd', '.fechaCitaInfo22');
        clicTarjetaSeleccionarOtroServicioCalendar();
        botonGuardarCalendar();
        guardarEditNewReserv();
        gurardarReservaNewReservCalendar();
        manejarClicPestania('.cita_tabNewReserv', 'datos_reservaNewReserv0106');
        manejarClicPestania('.nota_tabNewReserv', 'notas_reservaNewReserv0106');
        // clicFlechaAtrasPantalla2NewReservCalendar();
        manejarEstilosTexareaLabel('.business_secret_noteNewReserv', 'business_secret_noteNewReserv');
        manejarEstilosTexareaLabel('.business_noteNewReservInfo', 'business_noteNewReservInfo');
        manejarEstilosTexareaLabel('.business_noteInfo', 'business_noteInfo');
        manejarEstilosTexareaLabel('.business_noteNewReserv', 'business_noteNewReserv');
        actualizarIndicadorNotaTodosInputs();
        resetArrays();
    })
    .catch(error => console.error('Error al cargar los servicios:', error));
}

//hace scroll hasta la hora recibida
function scrollToHour(targetHour) {
    // Asegúrate de que el calendario esté renderizado y disponible
    const scrollGridBody = document.querySelector('.fc-scrollgrid-section-body');  // El contenedor principal del calendario
    if (!scrollGridBody) {
        //console.log("No se pudo encontrar el contenedor del calendario.");
        return;
    }

    // Función para redondear la hora a la más cercana de 00, 15, 30, 45 minutos
    function roundToNearestQuarterHour(timeString) {
        const [hour, minute, second] = timeString.split(':').map(Number);  // Extraer hora, minuto y segundo

        // Redondear los minutos a la más cercana de 15, 30, 45 o 00 minutos
        const roundedMinute = Math.round(minute / 15) * 15;

        // Asegurarse de que si los minutos son 60, avanzamos la hora y volvemos a 00
        const finalHour = roundedMinute === 60 ? (hour + 1) % 24 : hour;
        const finalMinute = roundedMinute === 60 ? 0 : roundedMinute;

        // Reconstruir el tiempo redondeado
        return `${String(finalHour).padStart(2, '0')}:${String(finalMinute).padStart(2, '0')}:00`;
    }

    // Redondeamos la hora target al múltiplo más cercano de 15, 30, o en punto
    const roundedTime = roundToNearestQuarterHour(targetHour);

    // Buscar todos los tds dentro del tbody que contienen la hora
    const tds = scrollGridBody.querySelectorAll('table tbody tr td');

    // Buscar el td correspondiente a la hora redondeada
    for (let td of tds) {
        let dateTime = td.getAttribute('data-time'); // Asegúrate de que el atributo sea el correcto
        if (dateTime === roundedTime) {
            // Si encontramos el td que tiene el atributo con la hora correcta, hacemos scroll hacia él
            td.scrollIntoView({ behavior: 'smooth', block: 'center' });
            // //console.log("Desplazándose a la hora redondeada: " + roundedTime);
            return;
        }
    }
    // //console.log("No se encontró la hora redondeada especificada: " + roundedTime);
}

//mostrar Eventos en array new reserv calendar existeNombreClienteComun
function mostrarEventosArrayNewReservCalendar(datepiker){
        let events = calendar.getEvents();
        //console.log(events, "MOSTRAREVENTOSARRAYNEWRESERVCALENDAR EVENTOS");
        eliminarEventosTemporales('temporalArray_');
        // eliminarEventosTemporales('eventoTemporalAsignado_')
        getServicesById(selectedServiceIds2,function (servicios){
            //console.log(infoArrayEnvio.length, "info-modificar");
            //console.log(infoArrayEnvio.length, "añadirCitaCalendar");


            let title = 'Cliente sin cita previa';
            if(infoArrayEnvio.length===0){
                if(existeNombreCliente() !== false){
                    title = existeNombreCliente();
                }
            }

            let fecha55 = '';
            if(document.getElementById(datepiker)){
                fecha55 = document.getElementById(datepiker).getAttribute('data-datepiker');
            }else{
                fecha55 =document.querySelector(datepiker).getAttribute('data-datepiker');
            }
            if(existeNombreClienteComun('.basket-customer-card0101Info') !== false){
                title = existeNombreClienteComun('.basket-customer-card0101Info');
            }
            servicios.forEach((servicio, index) => {
                //console.log(infoArrayEnvio[index]);

                let horaInicio55 = servicesWithTimes[index].horaInicio;
                let horaFin55 = servicesWithTimes[index].horaFin;

                let id_empleado55 = servicesWithTimes[index].id_empleado
                // //console.log(id_empleado55, "empleado 55");

                let start55 = formatFechaConHora(fecha55, horaInicio55);  // Fecha y hora de inicio
                let end55 = formatFechaConHora(fecha55, horaFin55);
                let fechaInicial55 = start55.split('T')[0];
                let eventData = {
                    classNames: ['temporal', `temporalArray_${index}`],
                    id: `temporalArray_${index}`,//esto es lo que sirve para eliminarlo
                    title:  title + ' • ' + servicio.nombre,
                    start: start55,  // Fecha y hora de inicio
                    end: end55,      // Fecha y hora de finalización
                    resourceId: id_empleado55,
                };
                // //console.log(eventData);

                if (calendar) {
                    calendar.addEvent(eventData);
                }
            });
            setTimeout(() => {
                servicios.forEach((servicio, index) => {
                    let eventoTemporal = document.querySelector(`.fc-event.temporalArray_${index}`);
                    if (eventoTemporal) {
                        eventoTemporal.style.setProperty('border-left', `4px solid ${servicio.borderColor}`, 'important');
                    }
                });
            }, 2000);
        });
}


//ELIMINA LOS EVENTOS TEMPORALES NEW RESERV CALENDAR
function eliminarEventosTemporales(claseEventoTemporal) {
    //console.log("eliminarEventoTemporal", claseEventoTemporal);

    // Obtener todos los eventos del calendario
    const eventos = calendar.getEvents();
    // Filtrar los eventos cuyo id empiece con "eventoTemporal_"
    const eventosTemporales = eventos.filter(event => event.id.startsWith(claseEventoTemporal));
    eventosTemporales.forEach(evento => {
        evento.remove();
        //console.log(`Evento temporal eliminado: ${evento.id}`);
    });
}

// ELIMINA LOS EVENTOS TEMPORALES NEW RESERV CALENDAR segun clase
function eliminarEventosTemporalesByClass(claseEventoTemporal) {
    //console.log("eliminarEventoTemporal", claseEventoTemporal);

    // Obtener todos los eventos del calendario
    const eventos = calendar.getEvents();

    // Filtrar los eventos que tienen alguna clase que empieza con 'claseEventoTemporal'
    const eventosTemporales = eventos.filter(event => {
        // //console.log(event.classNames, "classnames");

        // Obtener todas las clases del evento
        const clasesEvento = event.el.classList;  // event.el es el elemento DOM asociado al evento
        // Comprobar si alguna clase empieza con 'claseEventoTemporal'
        return Array.from(clasesEvento).some(clase => clase.startsWith(claseEventoTemporal));
    });

    // Eliminar los eventos temporales encontrados
    eventosTemporales.forEach(evento => {
        evento.remove();
        // //console.log(`Evento temporal eliminado: ${evento.id}`);
    });
}



//BOTON GUARDAR NUEVA RESERVA NEW RESERV CALENDAR
function gurardarReservaNewReservCalendar(){
    let botonGuardarNuevaReservaCalendar = document.getElementById('uid-798-input');
    if(botonGuardarNuevaReservaCalendar){
        botonGuardarNuevaReservaCalendar.addEventListener('click', function (event) {
            let loader = document.querySelector('#loaderSperaAdministrator');
            loader.classList.remove('d-none');
            // general
            event.preventDefault();
            let id_cliente = null;
            let existeCliente = existeNombreCliente();
            if(existeCliente !== false){
                id_cliente = document.querySelector('.basket-customer-card0101Calendar .customer-card_customer_PiI9d').getAttribute('data-index');
            }
            // //console.log(id_cliente, "idcliente");
            let dateTime1 = document.getElementById("datePikerfechaCitaInfo22").getAttribute('data-datepiker');//Fri Dec 13 2024 09:00:00 GMT+0100 (hora estándar de Europa central)"


            let notaInternaCalendar = document.getElementById('business_secret_noteNewReserv').value.trim() || null;
            let mensaje_for_client = document.getElementById('business_noteNewReservInfo').value.trim() || null;
            let divuserId = document.querySelector('.customer-card_customer_PiI9d');
            let userIdCalendar = null;
            if(divuserId){
                userIdCalendar = divuserId.getAttribute('data-index');
            }
            let total_pagarReservaNewCalendar = parseFloat(document.querySelector('.totalPagarNewReservCalendar').textContent);
            let csrfToken = $('meta[name="csrf-token"]').attr("content");
            let crear_reserva='';
            getConfiguracionReservas(function(configuraciones){
                let confirmacionAutomaticaCalendar = configuraciones[0].confirmacion_automatica;
                confirmacionAutomaticaCalendar = confirmacionAutomaticaCalendar === 'si' ? 'confirmed' : 'pending';
                //sólo hay un servicio
                if(servicesWithTimes.length === 0){
                    let seleccionaCliente_valor = document.getElementById('solicictaCliente').value;
                    servicesWithTimes = [];
                    // cogemos duración de tarjeta servicio
                    //ME HE QUEDADO AQUÍ 2
                    meterHorasArrayInicioNoTimeOut('.slotHorasCobrarServicioCalendar', '.slotHoraFinCorbrarServicioCalendar', '.slotEmpleadoAddInicioCalendar', seleccionaCliente_valor);
                    let durationCalendar = calcularDuracion(servicesWithTimes[0].horaInicio, servicesWithTimes[0].horaFin);
                    let dateTimeCalendar = formatearFecha4(dateTime1, servicesWithTimes[0].horaInicio);//2024-12-13 09:00:00
                    //console.log(dateTimeCalendar, "dateTime");

                    // Obtener la fecha y hora actuales
                    let fechaActual = new Date();
                    // Convertir la fecha del evento a un objeto Date, reemplazando el espacio por 'T' para que sea válido
                    let fechaEvento = new Date(dateTimeCalendar.replace(' ', 'T'));
                    if (fechaEvento < fechaActual) {
                        confirmacionAutomaticaCalendar = "Finalizada";
                    }


                    //para calendar gotodate
                    let horaInicio = servicesWithTimes[0].horaInicio;
                    // let horaFin = servicesWithTimes[0].horaFin;y
                    let start = formatFechaConHora(dateTime1, horaInicio);  // Fecha y hora de inicio
                    // let end = formatFechaConHora(fecha, horaFin);      // Fecha y hora de finalización
                    let fechaInicial = start.split('T')[0];
                        crear_reserva = "reservas-store";
                        $.ajax({
                            url: crear_reserva,
                            method: 'POST',
                            data: {
                                _token: csrfToken,
                                service_id: servicesWithTimes[0].id,
                                date_time: dateTimeCalendar,
                                status: confirmacionAutomaticaCalendar,
                                duration: durationCalendar,
                                empleada_id: servicesWithTimes[0].id_empleado,
                                nota: null,
                                user_id: userIdCalendar,
                                total_payment: total_pagarReservaNewCalendar,
                                empleado_seleccionado:servicesWithTimes[0].seleccionaCliente,
                                nota_interna: notaInternaCalendar,
                                mensaje_cliente:mensaje_for_client
                            },
                            success: function(response) {
                                const reserva_creada = response.reservaCreada;
                                if(reserva_creada === true){
                                    showAllNewReservCalendarPlantilla();
                                    $('#newReservCalendar').offcanvas('hide');
                                    resetArrays();
                                    let calendar032 = document.getElementById('calendar');
                                    calendar032.classList.remove('calendarEstrecho');
                                    initializeCalendar();
                                    calendar.gotoDate(fechaInicial);
                                    loader.classList.add('d-none');
                                    let stylos = 'position: fixed;right: 5rem;top: 76px;z-index: 9;';
                                    insertMessageResolAction('Reserva creada con éxito', '#Citas_administrator', stylos, "ok");
                                }else{
                                    alert('Atención!! la hora seleccionada o el empleado no están disponibles, inténtelo de nuevo cambiando esos datos');
                                    loader.classList.add('d-none');
                                }
                            },
                            error: function(xhr) {
                                //console.log('Error al obtener las horas', xhr);
                            }
                        });
                }else{//muchos servicios
                    //para calendar gotodate
                    let horaInicio = servicesWithTimes[0].horaInicio;
                    // let horaFin = servicesWithTimes[0].horaFin;y
                    let start = formatFechaConHora(dateTime1, horaInicio);  // Fecha y hora de inicio
                    // let end = formatFechaConHora(fecha, horaFin);      // Fecha y hora de finalización
                    let fechaInicial = start.split('T')[0];
                    servicesWithTimes.forEach(service => {
                        service.date_time = formatearFecha4(dateTime1, service.horaInicio);
                      });
                    // //console.log("muchos servcios");
                    // //console.log(servicesWithTimes, "servicios con tiempo multiples");
                    // servicesWithTimes.forEach(function(service) {
                        // let dateTimeMultiple = formatearFecha4(dateTime1, service.horaInicio);
                        let urlMultiple = "reservas-store-multiple";
                        $.ajax({
                            url: urlMultiple,
                            method: 'POST',
                            data: {
                                _token: csrfToken,
                                arrayCompleto: JSON.stringify(servicesWithTimes),
                                date_time1: dateTime1,
                                status: confirmacionAutomaticaCalendar,
                                user_id: userIdCalendar,
                                total_payment: total_pagarReservaNewCalendar,
                                nota_interna: notaInternaCalendar,
                                mensaje_cliente: mensaje_for_client,
                                multiple: 0
                            },
                            success: function(response) {
                                const reserva_creada = response.reservaCreada;
                                const motivo = response.motivo;
                                if (reserva_creada === true) {
                                    showAllNewReservCalendarPlantilla();
                                    $('#newReservCalendar').offcanvas('hide');
                                    resetArrays();
                                    let calendar032 = document.getElementById('calendar');
                                    calendar032.classList.remove('calendarEstrecho');
                                    initializeCalendar();
                                    calendar.gotoDate(fechaInicial);
                                    loader.classList.add('d-none');
                                    let stylos = 'position: fixed;right: 5rem;top: 76px;z-index: 9;';
                                    insertMessageResolAction('Reserva múltiple creada con éxito', '#Citas_administrator', stylos, "ok");
                                } else {
                                    alert(motivo);
                                    loader.classList.add('d-none');
                                }
                            },
                            error: function(xhr) {
                                //console.log('Error al obtener las horas', xhr);
                            }
                        });
                    // });
                }
            });
        });
    }
}
gurardarReservaNewReservCalendar();

//devuelve la reserva del array que termina más tarde
function getReservaMasTarde(reservas) {
    let reservaMasTarde = null;
    let horaFinMasTarde = -1; // Inicializamos la hora más tardía en un valor muy bajo

    reservas.forEach(reserva => {
        // Convertimos la fecha y hora de inicio de la reserva (date_time)
        const fechaInicio = new Date(reserva.date_time); // 'date_time' está en formato 'YYYY-MM-DD HH:mm:ss'

        // Calculamos la hora de fin sumando la duración (en minutos)
        const horaFin = new Date(fechaInicio.getTime() + reserva.duration * 60000); // 60000 ms = 1 minuto

        // Comparamos si esta reserva termina más tarde que la anterior
        if (horaFin.getTime() > horaFinMasTarde) {
            horaFinMasTarde = horaFin.getTime();
            reservaMasTarde = reserva;
        }
    });

    return reservaMasTarde;
}


// cambia corazon de color y asigna al input seleccionado cliente
function changeheart(imagen) {
    const imgElement = document.querySelector(imagen);
    if (imgElement.src.includes('heart-empty.svg')) {
        // Si es el corazón vacío, cambiar a corazón rojo
        imgElement.src = urlAplicacion + "/storage/calendar/corazonRojoEmpleCliente.svg";
        imgElement.alt = 'corazon rojo';
        document.getElementById('solicictaCliente').value = 1;
    } else {
        // Si no es el corazón vacío, cambiar a corazón vacío
        imgElement.src = urlAplicacion + "/storage/calendar/heart-empty.svg";
        imgElement.alt = 'corazon vacio';
        document.getElementById('solicictaCliente').value = 0;
    }
}




//poner y quitar estilos
// Función común para manejar los clics en las pestañas
function manejarClicPestania(tabSelector, divId) {
    let pestania = document.querySelector(tabSelector);
    if (pestania) {
        pestania.addEventListener('click', function () {
            // Eliminar la clase activa de todas las pestañas
            document.querySelectorAll('.b-tabs_tabDefaultActive_CYkQd').forEach(function(elemento) {
                elemento.classList.remove('b-tabs_tabDefaultActive_CYkQd');
            });
            // Añadir la clase activa a la pestaña clicada
            pestania.classList.add('b-tabs_tabDefaultActive_CYkQd');
            // Mostrar el div correspondiente
            showDivNotas(divId);
        });
    }
}
manejarClicPestania('.cita_tab', 'datos_reserva0106');
manejarClicPestania('.nota_tab', 'notas_info0106');
manejarClicPestania('.cita_tabNewReserv', 'datos_reservaNewReserv0106');
manejarClicPestania('.nota_tabNewReserv', 'notas_reservaNewReserv0106');

// Función para manejar los eventos y estilos en el textarea y su label
function manejarEstilosTexareaLabel(labelSelector, textAreaId) {
    const label = document.querySelector(labelSelector);
    const textArea = document.getElementById(textAreaId);
    if(textArea){
        // Añadimos un evento de clic para agregar la clase "labelUp"
    textArea.addEventListener('click', function() {
        // //console.log("clic textare ", textAreaId);

        label.classList.add('labelUp');
      });

      // Añadimos un evento de blur para quitar la clase "labelUp" cuando pierda el foco
      textArea.addEventListener('blur', function() {
        if (textArea.value.trim() === "") {
          label.classList.remove('labelUp');
        }
      });

      // Función para hacer crecer el textarea
      function adjustHeight() {
        textArea.style.height = 'auto';
        const newHeight = textArea.scrollHeight + 14;
        textArea.style.height = `${newHeight}px`;
      }

      // Añadimos un evento de input para ajustar la altura dinámicamente business_noteNewReservInfo, business_noteInfo, business_noteNewReserv
      textArea.addEventListener('input', adjustHeight);
    }else{
        //console.log("no existe el txtarea ", textAreaId);

    }

  }
  manejarEstilosTexareaLabel('.business_secret_noteNewReserv', 'business_secret_noteNewReserv');
  manejarEstilosTexareaLabel('.business_noteNewReservInfo', 'business_noteNewReservInfo');
  manejarEstilosTexareaLabel('.business_noteInfo', 'business_noteInfo');
  manejarEstilosTexareaLabel('.business_noteNewReserv', 'business_noteNewReserv');


  //pone y quita el punto naranja de nota o mensaje existente
  function actualizarIndicadorNota(textareaIds, spanClass) {
    // Obtener los elementos textarea
    const textareas = textareaIds.map(id => document.getElementById(id));
    const spanIndicador = document.querySelector(spanClass);
    // Comprobar si al menos uno de los textarea tiene texto
    const tieneTexto = textareas.some(textarea => textarea && textarea.value.trim());
    if (spanIndicador) {
      if (tieneTexto) {
        spanIndicador.classList.add('b-tabs_tabIndicator_vu4Y2');
      } else {
        spanIndicador.classList.remove('b-tabs_tabIndicator_vu4Y2');
      }
    }
  }

  function actualizarIndicadorNotaTodosInputs(){
    // Añadir los eventos de input para los textareas
    if(document.getElementById('business_secret_noteNewReserv')){
        document.getElementById('business_secret_noteNewReserv').addEventListener('input', () => {
            actualizarIndicadorNota(['business_secret_noteNewReserv', 'business_noteNewReservInfo'], '.indicatorNotasNewReserv');
          });
    }
    if(document.getElementById('business_noteNewReservInfo')){
        document.getElementById('business_noteNewReservInfo').addEventListener('input', () => {
            actualizarIndicadorNota(['business_secret_noteNewReserv', 'business_noteNewReservInfo'], '.indicatorNotasNewReserv');
        });
    }
    if(document.getElementById('business_noteNewReserv')){
        document.getElementById('business_noteNewReserv').addEventListener('input', () => {
            actualizarIndicadorNota(['business_noteNewReserv', 'business_noteInfo'], '.indicatorNotasNewReservInfo');
        });
    }
    if(document.getElementById('business_noteInfo')){
        document.getElementById('business_noteInfo').addEventListener('input', () => {
            actualizarIndicadorNota(['business_noteNewReserv', 'business_noteInfo'], '.indicatorNotasNewReservInfo');
          });
    }


  }
actualizarIndicadorNotaTodosInputs();

const miOffcanvas = document.getElementById('eventDetailsModal');
if(miOffcanvas){
    miOffcanvas.addEventListener('shown.bs.offcanvas', () => {
        document.getElementById('contentTabs').style.overflow = 'auto';// Habilita el scroll
    });

    miOffcanvas.addEventListener('hidden.bs.offcanvas', () => {
        document.getElementById('contentTabs').style.overflow = ''; // Vuelve a la normalidad
    });
}



//metodo para bloquear los clics de los eventos cuando offcanvas abierto
function blockPointerEvents(){
    let cabecera = document.querySelector('.navbarAdminPanel');
    let pestaniasLaterales = document.querySelector('.tabsAdministrator');
    let calendarioABloquear = document.querySelector('.fc-resourceTimeGridDay-view tbody');
    // Desactivar interacción
    cabecera.style.pointerEvents = 'none';
    pestaniasLaterales.style.pointerEvents = 'none';
    calendarioABloquear.style.pointerEvents = 'none';
}
function enablePointerEvents(){
    let cabecera = document.querySelector('.navbarAdminPanel');
    let pestaniasLaterales = document.querySelector('.tabsAdministrator');
    let calendarioABloquear = document.querySelector('.fc-resourceTimeGridDay-view tbody');

    cabecera.style.pointerEvents = 'auto';
    pestaniasLaterales.style.pointerEvents = 'auto';
    calendarioABloquear.style.pointerEvents = 'auto';
}

//COBRAR SERVICIO DESDE CALENDAR
function showViewCobrarServicioCalendar(){
    //contenedor
    let divContenedorContenedores = document.querySelector('.wrapper_tabcontent');
    let contenedoresActivos = divContenedorContenedores.querySelectorAll('.active');
    contenedoresActivos.forEach(function(contenedor) {
        contenedor.classList.remove('active');
    });
    let vistaVentaRapida = document.getElementById('Ventas_administrator');
    vistaVentaRapida.classList.add('active');

    //pestanias
    let divContenedorPestanias = document.querySelector('.tabsAdministrator');
    let pestaniasActivas = divContenedorPestanias.querySelectorAll('.active');
    pestaniasActivas.forEach(function(pestania) {
        pestania.classList.remove('active');
    });
    let pestaniaVentas = document.getElementById('tab_administrator_ventas');
    pestaniaVentas.classList.add('active');
    enablePointerEvents();
    let eventosConTemporalDos = document.querySelectorAll('.temporal2');
    console.log(infoArrayEnvio.length, infoArrayEnvio);

    serviciosVentaRapida_ids = [];
    serviciosVentaRapida_ids = [];

    if(infoArrayEnvio.length){
        console.log("multiple");
        insertServiciosDesdeArray(infoArrayEnvio);
        if(infoArrayEnvio[0].extendedProps.usuario.id){
            insertarTarjetaClienteSelecionadoCobrarCalendar(usuario, '.basket-customer-card0101', 'card_empty_ventas');
            // insertarTarjetaClienteSelecionado(cliente, '.basket-customer-card0101', 'card_empty_ventas');
        }else{
            console.log("no tiene usuario");
        }
    }else{
        console.log("solo unoa");
        let nombreEmpleado = `${infoArrayEnvio.event.extendedProps.empleada.nombre} ${infoArrayEnvio.event.extendedProps.empleada.apellido}`;
        let id_servicio = infoArrayEnvio.event.extendedProps.servicio.id;
        let usuario = infoArrayEnvio.event.extendedProps.usuario;
        insertDateServiceByCobrarCalendar(id_servicio, nombreEmpleado, infoArrayEnvio.event.extendedProps.empleada.id, infoArrayEnvio.event.extendedProps.servicio.precio, usuario);
        if(usuario.id){
            insertarTarjetaClienteSelecionadoCobrarCalendar(usuario, '.basket-customer-card0101', 'card_empty_ventas');
            // insertarTarjetaClienteSelecionado(cliente, '.basket-customer-card0101', 'card_empty_ventas');
        }else{
            console.log("no tiene usuario");
        }
    }
    insertTarjetaServiciosCobrarCalendar();
    closedOffcanvasInfoReserv();
    //  console.log(servicesWithTimes.length,eventIdChangeCalendar, eventosConTemporalDos, "serviceWtimes.leng eventIdChangeCalendar");
    // console.log(servicesWithTimes, infoArrayEnvio,selectedServiceIds, selectedServiceIds2,colorBordeReservArray,eventIdChangeCalendarArray, "flecha atras servicesTime y infoarayEnvio, eventIdChangeCalendarArray");
    // console.log("------------------------------");
}

// FUNCIÓN PARA cobrar SERVICIOS DESDE ARRAY
function insertServiciosDesdeArray(infoArrayEnvio) {
    let htmlContentVentaRapida = '';
    let divllenar = document.querySelector('.basketFull');
    let listaTransacciones = document.querySelector('.basket-transactions-list');
    let divCestoVacio = document.querySelector('.index_basketEmpty_VF3Lr');
    let cestoLleno = divCestoVacio.classList.contains('d-none');

    infoArrayEnvio.forEach((evento, index) => {
        const props = evento.extendedProps;

        const servicio = props.servicio;
        const empleado = props.empleada;
        const precio = servicio.precio;

        // Insertar en arrays de ventas rápidas
        insertarServicioEmpleadoArrayVentaRapida(
            servicio.id,
            `${empleado.nombre} ${empleado.apellido}`,
            parseFloat(precio),
            empleado.id
        );

        insertarVentaRapidaSoloIds(servicio.id);
    });

    getServicesById(serviciosVentaRapida_ids, function (servicios) {
        servicios.forEach((servicio, index) => {
            console.log(serviciosVentaRapida[index]);
            const datosVenta = serviciosVentaRapida[index];

            htmlContentVentaRapida += construirHtmlTarjetasVentaRapida(
                index,
                servicio.descripcion.trim(),
                comprobar603090SinM(servicio.duration),
                datosVenta.precio,
                datosVenta.nombre_Empleado,
                datosVenta.idServicio,
                datosVenta.descuento_servicio
            );
        });

        $(listaTransacciones).empty();
        $(listaTransacciones).append(htmlContentVentaRapida);

        if (!cestoLleno) {
            divCestoVacio.classList.add('d-none');
            divllenar.classList.remove('d-none');
        }

        actualizarTotalSubtotal();
        actualizarDescuentoTotal();
    });
}



// FUNCIÓN INSERTAR DATOS PARA COBRAR DESDE CALENDAR
function insertDateServiceByCobrarCalendar(servicio_id, nombreEmpleado, id_empleado026, precioServicio){

    let htmlContentVentaRapida = '';
    let nombreVentaRapida = nombreEmpleado;
    let id_empleado = id_empleado026;
    // //console.log(precioServicio, "Precio servicio");
    //metemos la venta en el array
    insertarServicioEmpleadoArrayVentaRapida(servicio_id, nombreVentaRapida, parseFloat(precioServicio), id_empleado);

    insertarVentaRapidaSoloIds(servicio_id);
    // addServiceDiscountArray();
    let divllenar = document.querySelector('.basketFull');
    let listaTransacciones = document.querySelector('.basket-transactions-list');

    //comprobar si el cesto está vacio
    let divCestoVacio = document.querySelector('.index_basketEmpty_VF3Lr');
    let cestoLleno = divCestoVacio.classList.contains('d-none');
    // //console.log("ESTA tiene cosas? ", cestoLleno);
    if (cestoLleno) {
        //comprobar si lista li tiene atributo data-discount
        getServicesById(serviciosVentaRapida_ids, function (servicios){
            servicios.forEach((servicio, index) => {
                let descuento = serviciosVentaRapida[index].descuento_servicio;
                let li_index = index;
                let servicio_idArray = serviciosVentaRapida[index].idServicio;
                let nombreApellidoEmpleA = serviciosVentaRapida[index].nombre_Empleado;
                let precioAsignar = serviciosVentaRapida[index].precio;
                // Construir HTML construirHtmlTarjetasVentaRapida(nombreServicio, duracionServicio, precio, nombreApellidosEmpleado, inicialesEmpleado)
                htmlContentVentaRapida += construirHtmlTarjetasVentaRapida(
                    li_index,
                    servicio.descripcion,
                    comprobar603090SinM(servicio.duration),
                    precioAsignar,
                    nombreApellidoEmpleA,
                    servicio_idArray,
                    descuento
                );
            });
            // Agregar todo el contenido generado al contenedor nuevo
            $(listaTransacciones).empty();
            $(listaTransacciones).append(htmlContentVentaRapida);
        });
        // actualizar totales
        actualizarTotalSubtotal();
        actualizarDescuentoTotal();
    }
    else{
        divCestoVacio.classList.add('d-none');
        divllenar.classList.remove("d-none");
        getServicesById(serviciosVentaRapida_ids, function (servicios){
            servicios.forEach((servicio, index) => {
                let li_index = index;
                let precioAsignar = serviciosVentaRapida[index].precio;
                let descuento = serviciosVentaRapida[index].descuento_servicio;
                let servicio_idArray = serviciosVentaRapida[index].idServicio;
                let nombreApellidoEmpleA = serviciosVentaRapida[index].nombre_Empleado;
                // Construir HTML construirHtmlTarjetasVentaRapida(nombreServicio, duracionServicio, precio, nombreApellidosEmpleado, inicialesEmpleado)
                htmlContentVentaRapida += construirHtmlTarjetasVentaRapida(
                    li_index,
                    servicio.descripcion,
                    comprobar603090SinM(servicio.duration),
                    precioAsignar,
                    nombreApellidoEmpleA,
                    servicio_idArray,
                    descuento
                );
            });
            $(listaTransacciones).empty();
            $(listaTransacciones).append(htmlContentVentaRapida);
        });
        actualizarTotalSubtotal();
    }
}

// insertar tarjeta cliente seleccionado venta rápida
function insertarTarjetaClienteSelecionadoCobrarCalendar(cliente, divInfoClienteEnviado, claseDiferenciadora){
    let divInfoCliente = document.querySelector(divInfoClienteEnviado);
    let iniciales = obtenerIniciales(cliente.nombre, cliente.primerApellido);
    $(divInfoCliente).empty();
    $(divInfoCliente).append(`
        <div data-v-3d594be1="" class="b-shadow-card customer-card_customer_PiI9d" data-index="${cliente.id}">
            <div data-v-3d594be1="" class="customer-card_customerData_Ke3s5 d-flex">
                <div data-v-3d594be1="" title="${cliente.nombre} ${cliente.primerApellido}" class="b-avatar_avatar_pJzSu" style="width: 40px; height: 40px; flex: 0 0 40px;">
                    <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px;"> ${iniciales} </div>
                </div>
                <div data-v-3d594be1="" class="customer-card_customerContent_Pq14e">
                    <div data-v-3d594be1="" class="customer-card_customerName_clLc6 customer-card_size--16-sb_kPC0E"> ${cliente.nombre} </div>
                    <div data-v-3d594be1="" class="color-07 size--14">
                        <span data-v-3d594be1="" class="flex inline items-center">
                            <span> ${cliente.telefono || 'No disponible'} </span>
                        </span>
                    </div>
                </div>
                <div data-v-3d594be1="" class="customer-card_customerClose_kMCQ7 flex" onclick="insertartarjetaSeleccionaCliente('${divInfoClienteEnviado}', '${claseDiferenciadora}')">
                    <span data-v-3d594be1="" class="b-icon iconFont icon-x" data-testid="basket-customer-card-close" style="font-size: 20px; align-items: center; display: flex;"></span>
                </div>
            </div>
        </div>
    `);
    clicTarjetasBlancasSelectCliente();
}

//función que inserta la tarjeta servicio en cobrar desde calendar
function insertTarjetaServiciosCobrarCalendar(){
    document.querySelector('.appointment-card_appointment_F_IwZ').style.display = "flex";

    let divContenedorFechaHora = document.querySelector('.appointment-date_date_UsCxi');
    $(divContenedorFechaHora).empty();
    $(divContenedorFechaHora).append(`
        <div class="appointment-date_month_nFAjw appointment-date_size--12_Z4is5">abr.</div>
        <div class="appointment-date_day_zpfF4 appointment-date_size--20_BC_a_">21</div>
        <div class="appointment-date_hour_isz2C appointment-date_size--12_Z4is5">10:00</div>
    `);
    let statusCobrar = '';
    let htmlContent = '';
    if(infoArrayEnvio.length){
        //multiple
        statusCobrar = infoArrayEnvio[0].extendedProps.status;
        infoArrayEnvio.forEach(evento => {
            const servicioNombre = evento.extendedProps.servicio.nombre;

            const html = `
                <div class="appointment-card_appointmentService_gsMNj">
                    <div class="appointment-card_appointmentServiceBar_BvsJO"></div>
                    <p style="margin-bottom: 0px" class="size--14 txt--ellipsis margin-left-12">
                        ${servicioNombre}
                    </p>
                </div>
            `;
            htmlContent += html;
        });
    }else{
        statusCobrar = infoArrayEnvio.event.extendedProps.status;
        //solo uno
        htmlContent = `
         <div class="appointment-card_appointmentService_gsMNj">
            <div class="appointment-card_appointmentServiceBar_BvsJO"></div>
            <p style="margin-bottom: 0px" class="size--14 txt--ellipsis margin-left-12">${infoArrayEnvio.event.extendedProps.servicio.nombre}</p>
        </div>
        `;
    }
    document.querySelector('.statusReservaCalendarCobrar').textContent = statusCobrar;
    let divContendorServicios = document.querySelector('.tarjetasServiciosCobrarCalendar056');
    $(divContendorServicios).empty();
    $(divContendorServicios).append(htmlContent);
}

//la x borrar servicios cobrar calendar
let botonBorrarCobrarCalendar = document.querySelector('.botonCerrarTarjeta028');
if(botonBorrarCobrarCalendar){
    botonBorrarCobrarCalendar.addEventListener('click', function (event) {
        event.preventDefault();
        console.log("boton x");

        reseteoVistaVenta();
    });
}
//botón abrir offcanvas version movil
let botonAbrirOffcanvas = document.querySelector('.side-menu_toggle_VbZoX');
if(botonAbrirOffcanvas){
    botonAbrirOffcanvas.addEventListener('click', function (event) {
        // event.preventDefault();
        console.log("clic en menu lateral");

        let menuLateral = document.querySelector('.tabs');
        menuLateral.classList.toggle('mostrarTabs');
    });
}

//cambiar vista mes
function changeView023(){
    setTimeout(() => {
    calendar.changeView('resourceTimeGridDay');

    }, 300);
}

//botones pestañas administrator
document.querySelectorAll('.tablinksAdministrator').forEach(button => {
    button.addEventListener('click', () => {
        setMessengerId(0);
        $('meta[name="id"]').attr('content', '0');
        let newUrl = urlAplicacion+'/admin/dashboard/Mensajes_administrator/';
        let metaTag = document.querySelector('meta[name="url"]');
        console.log(newUrl, "newurl");


        $(".messenger-list-item").removeClass("m-list-active");
        // setTimeout(() => {
        metaTag.setAttribute('content', newUrl);
        console.log(metaTag, "metatag", setMessengerId(), "setMessengerId");
    });
  });
  //usuario normal
  document.querySelectorAll('.tablinks').forEach(button => {
    button.addEventListener('click', () => {
        setMessengerId(0);
        $('meta[name="id"]').attr('content', '0');
        let newUrl = urlAplicacion+'/admin/dashboard/Mensajes_administrator/';
        let metaTag = document.querySelector('meta[name="url"]');
        console.log(newUrl, "newurl");


        $(".messenger-list-item").removeClass("m-list-active");
        // setTimeout(() => {
        metaTag.setAttribute('content', newUrl);
        // console.log(metaTag, "metatag", setMessengerId(), "setMessengerId");
    });
  });

  //si el navegador es edge
  let sentmessage = document.querySelector('.messenger-sendCard');
  if (navigator.userAgent.includes("Edg/")) {
    if(sentmessage){
        sentmessage.classList.add("is-edge-marginBotom");
    console.log("estamos en edge");
    }
}else{
    if(sentmessage){
        sentmessage.classList.remove("is-edge-marginBotom");
        console.log("no estamos en edge");

    }

}
//fdafdsafsa eventDetailsModal fdfdg

var calendar; // Variable global para almacenar la instancia de FullCalendar
let isCalendarInitialized = false;
function initializeCalendar() {
    // console.log("inicializar calendar");
    if (isCalendarInitialized) {
        // Si ya está inicializado, destruye la instancia
        calendar.destroy();
        isCalendarInitialized = false;
    }
        const calendarEl = document.getElementById('calendar');
         calendar = new FullCalendar.Calendar(calendarEl, {
            schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source', // Necesario para vista de recursos
            dayMaxEventRows: true, // for all non-TimeGrid views
            //para que no se apilen los eventos vista dia
            // eventMaxStack: 0,
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
            initialDate: new Date(),
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
                fetch('empleados')
                .then(response => response.json())
                .then(data => successCallback(data))
                .catch(error => failureCallback(error));
            },
            // Personalización de la celda de recursos (empleados)
            resourceLabelContent: function(arg) {
                // console.log(arg);

                // Aquí podemos personalizar el nombre del empleado
                // Verificamos el tipo de vista actual
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
            viewDidMount: function(info) {
                    const evento = info.event;
                    const eventEl = info.el;
                        if(eventEl){
                            // console.log(eventEl, "eventEl");
                            // console.log(evento, "evento");
                        }
                // día libre
                $('.fc-day-sun .fc-daygrid-day-events').each(function() {
                    if ($(this).find('span').length === 0) {
                        $(this).append('<span style="color: #8c8b88;text-transform: none;font-size: .75rem;font-weight: 500;line-height: 1.5em;">Día libre</span>');
                    }
                });
                // Este evento se dispara cuando la vista del calendario se ha montado

                // Aquí manipulamos el texto en la vista de lista vacía
                let noHayServicios = document.querySelector('.fc-list-empty-cushion');
                if (noHayServicios) {
                    noHayServicios.textContent = "No hay servicios para mostrar";
                }

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
                if(evento.extendedProps){
                    fechaReserva =  evento.extendedProps.fecha;
                    // console.log(fechaReserva, "fechaReserva");
                    if(eventEl){
                        eventEl.setAttribute('data-idreserv', evento.extendedProps.reservaId);
                    }
                    if (evento.extendedProps && evento.extendedProps.empleada && evento.extendedProps.empleada.imagenEmple) {
                        eventEl.setAttribute('data-urlImgEmple', evento.extendedProps.empleada.imagenEmple);
                    }

                    document.querySelector('.fechaCitaInfo').setAttribute('data-date', evento.extendedProps.fecha);
                    if(eventEl){
                        if(evento.extendedProps.servicio){
                            eventEl.style.setProperty('background-color', lightenedColor(evento.extendedProps.servicio.borderColor, 70, 0.52), 'important');
                            eventEl.style.setProperty('border-left', `4px solid ${evento.extendedProps.servicio.borderColor}`, 'important');
                        }
                    }
                    //si evento tiene nota del cliente
                    const iconDiv = document.createElement('div');
                         iconDiv.classList.add('icons_icons_YFduH', 'index_icons_LluzP');
                         iconDiv.style.setProperty('--b1c0b092', '16px');
                    if (evento.extendedProps.nota === null || evento.extendedProps.nota === undefined ) {
                    }else{
                         const iconImg = document.createElement('img');
                         iconImg.classList.add('b-icon_img_I0kuC', 'icons_icon_lMJWA');
                         iconImg.src = "/laravel/salon-manicura/public//storage/calendar/notaCliente.svg";
                         iconImg.style.zIndex = '2';
                         iconImg.style.left = '5px';
                         iconImg.style.position = 'relative';
                         iconDiv.appendChild(iconImg);
                         eventEl.appendChild(iconDiv);
                    }
                    //si el empleado a sido elegido por el cliente
                    if(evento.extendedProps.seleccionado_cliente === 0){

                    }else if(evento.extendedProps.seleccionado_cliente === 1){
                        const iconImgCorazon = document.createElement('img');
                        iconImgCorazon.classList.add('b-icon_img_I0kuC', 'icons_icon_lMJWA');
                        iconImgCorazon.src = "/laravel/salon-manicura/public/storage/calendar/corazonRojoPequenio.svg";
                        iconImgCorazon.style.zIndex = '1';
                        iconImgCorazon.style.left = '0px';
                        iconImgCorazon.style.position = 'relative';
                        iconDiv.appendChild(iconImgCorazon);
                        eventEl.appendChild(iconDiv);
                    }
                    //-------------------------------
                    if (evento.extendedProps.status === 'Finalizada') {

                        if(eventEl){
                        eventEl.style.boxShadow = 'none';
                        }
                        let divCombo = document.querySelector('.divComboStatusReserv');
                        if (divCombo) {
                            divCombo.classList.remove('d-none');
                        }
                        //VACIAMOS EL DESPLEGABLE
                        let despleStatus = document.querySelector('.header_actions_oRFfx');
                        $(despleStatus).empty();
                        $(despleStatus).append(`
                           <div onclick="actionPresButon('faltaCliente')" class="header_buttonCancel_kUEPy faltaCliente header_size--14-b_XJC3t">
                                <span class="b-icon iconFont icon-noshow" type="font" style="font-size: 22px;"></span>
                                Falta del cliente
                            </div>
                        `);
                    }
                    else if (evento.extendedProps.status === 'confirmed') {
                        let divCombo = document.querySelector('.divComboStatusReserv');
                        if (divCombo) {
                            divCombo.classList.remove('d-none');
                        }
                        let despleStatus = document.querySelector('.header_actions_oRFfx');
                        $(despleStatus).empty();
                        $(despleStatus).append(`
                            <div onclick="actionPresButon('cancelarCitaOption')" class="cancelarCitaOption header_buttonCancel_kUEPy header_size--14-b_XJC3t">
                                <span class="b-icon iconFont icon-cancel-thin" style="font-size: 28px;"></span>
                                Cancelar cita
                            </div>
                        `);
                    }
                    else if (evento.extendedProps.status === 'cancelled' || evento.extendedProps.status === 'pending') {
                        let divCombo = document.querySelector('.divComboStatusReserv');
                        if (divCombo) {
                            divCombo.classList.add('d-none');
                        }
                    }
                    // Comprobar si el evento ha finalizado
                    if (new Date(evento.end) < now && evento.extendedProps.status !== 'completada'  && evento.extendedProps.status !== 'cancelled' && evento.extendedProps.status !== 'pagada' && evento.extendedProps.status !== 'Finalizada' && evento.extendedProps.status) {
                        // Hacer una solicitud al servidor para actualizar el estado

                        let updateStatusReservUrl = 'actualizar-estado-reserva';
                        let csrfToken = $('meta[name="csrf-token"]').attr("content");
                        $.ajax({
                            url: updateStatusReservUrl, // Ruta que definimos en web.php
                            method: 'POST',
                            data: {
                                _token: csrfToken, // Token CSRF para seguridad
                                reserva_id: evento.extendedProps.reservaId
                            },
                            success: function(response) {
                                const updateEndReserv = response.updteEnd;
                                if(updateEndReserv === true){
                                    initializeCalendar();

                                    // console.log("status cambiado con exito");
                                }
                            },
                            error: function(xhr) {
                                console.log('Error al actualizar el status', xhr);
                            }
                        });
                    }
                    let loader = document.querySelector('#loaderSperaAdministrator');
                    setTimeout(() => {
                    loader.classList.add('d-none'); // Asegúrate de que el spinner no esté oculto

                    }, 300);
                }

            },
            datesSet: function(info) {
                // const evento = info.event;
                // const eventEl = info.el;
                // eventEl.style.backgroundColor = lightenedColor(evento.extendedProps.servicio.borderColor, 70, 0.52);
                // eventEl.style.borderLeft = `4px solid ${evento.extendedProps.servicio.borderColor}`;
                // Comprobar si la vista activa es 'timeGridDay'
                if (calendar.view.type === 'resourceTimeGridDay') {
                    resetAllTdVisibility();
                    // Eliminar la clase 'heigEspecifico' en la vista 'timeGridDay'
                    document.getElementById('Citas_administrator').classList.remove('heigEspecifico');

                    // Obtener el tbody donde queremos agregar el <tr>
                    const tbody = document.querySelector('.fc-scrollgrid-section-body table tbody');

                    // Comprobar si el tbody existe y si el <tr> con la clase 'custom-tr' ya está presente
                    if (tbody && !tbody.querySelector('.custom-tr')) {  // Comprobamos que no exista el <tr> ya
                        const existingTrSemanaDia = tbody.querySelector('.custom-tr-week');
                        if (existingTrSemanaDia) {
                            existingTrSemanaDia.remove();  // Eliminar el <tr> existente con la clase 'custom-tr'
                            // console.log("El <tr> con la clase 'custom-tr' ha sido eliminado.");
                        }
                        const tr = document.createElement('tr');
                        tr.classList.add('custom-tr');  // Añadimos una clase al <tr> para identificarlo más tarde

                        // Crear celdas (td) dentro del <tr>
                        const td1 = document.createElement('td');
                        tr.appendChild(td1);

                        const td2 = document.createElement('td');
                        td2.classList.add('td_vacioImagen');
                        tr.appendChild(td2);

                        // Insertar el <tr> al principio del tbody
                        tbody.insertBefore(tr, tbody.firstChild);
                    } else {
                        // console.log("El <tr> ya ha sido añadido o no se encontró el tbody.");
                    }
                }
                // Comprobar si la vista activa es 'timeGridWeek' (vista de semana)
                else if (calendar.view.type === 'resourceTimeGridWeek') {
                    resetAllTdVisibility();
                    // Eliminar la clase 'heigEspecifico' en la vista 'timeGridWeek'
                    document.getElementById('Citas_administrator').classList.remove('heigEspecifico');

                    // Obtener el tbody donde queremos agregar el <tr>
                    const tbody = document.querySelector('.fc-scrollgrid-section-body table tbody');

                    // Comprobar si el tbody existe
                    if (tbody) {
                        // Comprobar si ya existe un <tr> con la clase 'custom-tr-week'
                        const existingTrSemana = tbody.querySelector('.custom-tr-week');
                        const existingTrDia = tbody.querySelector('.custom-tr');
                        if (existingTrDia) {
                            existingTrDia.remove();  // Eliminar el <tr> existente con la clase 'custom-tr'
                        }
                        if (!existingTrSemana) { // Si no existe el <tr> con la clase 'custom-tr-week'
                            const tr = document.createElement('tr');
                            tr.classList.add('custom-tr-week');  // Añadimos una clase distinta al <tr> para la vista de semana

                            // Crear celdas (td) dentro del <tr>
                            const td1 = document.createElement('td');
                            tr.appendChild(td1);

                            const td2 = document.createElement('td');
                            td2.classList.add('td_vacioImagen');
                            tr.appendChild(td2);

                            // Insertar el nuevo <tr> al principio del tbody
                            tbody.insertBefore(tr, tbody.firstChild);
                        }
                    }
                }

                // Si la vista no es ni 'timeGridDay' ni 'timeGridWeek', añadir la clase 'heigEspecifico'
                else {
                    document.getElementById('Citas_administrator').classList.add('heigEspecifico');
                }
            },
              //-------------
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
                                console.log(extendedProps2.fecha);
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
                        console.log('Error al actualizar la cita', xhr);
                        info.revert();  // Revertir los cambios si hubo un error
                        alert('Error en la comunicación con el servidor.');
                    }
                });
            },
            eventResize: function(info) {
                alert('Evento redimensionado a: ' + info.event.end.toISOString());
            },
            eventClick: function (info) {
                console.log(info, "INFO");

                montarOffcanvasLateralTodaInfo(info);
                infoArrayEnvio = [];
                infoArrayEnvio = info;
            }

        });
        calendar.render();
        setTimeout(() => {
            calendar.updateSize();
        }, 1500);
        window.dispatchEvent(new Event('resize'));
        isCalendarInitialized = true;
}

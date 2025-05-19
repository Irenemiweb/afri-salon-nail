var botonAbrirModalReserva = document.querySelectorAll('.divButonReservSmall');
if(document.querySelector('.contenedorNewReserva')){
var fechaActual2 = document.querySelector('.contenedorNewReserva').getAttribute('data-fechaactual');
var horaInicio = document.querySelector('.contenedorNewReserva').getAttribute('data-horaInicio');
// console.log(horaInicio, "hora");
}


//peticion ajax configuraciones reservas para meses antelacion
function getConfiguracionReservas(callback){
var csrfToken = $('meta[name="csrf-token"]').attr("content");
var url = "obtener-configuracion-reservas";
// Hacer una petición AJAX al servidor
$.ajax({
    url: url, // Ruta que definimos en web.php
    method: 'POST',
    data: {
        _token: csrfToken, // Token CSRF para seguridad
    },
    success: function(response) {
        const configuraciones = response.configuraciones;

        // console.log(configuraciones, "CONFIGURACIONES");

        // Ejecutar el callback con los datos
        callback(configuraciones);
    },
    error: function(xhr) {
        console.error("Error en la solicitud AJAX configuraciones");
    }
});
}

//FUNCIÓN QUE INICIA EL DATEPIKER SOLO MES Y ANIO
function initDatePikerSoloMes(index44) {
    getConfiguracionReservas(function(configuraciones){
        console.log(configuraciones, "configuraciones");

        // Accedemos al primer objeto dentro del array configuraciones
        const antelacionReserva = configuraciones[0].antelacion_reserva;
        console.log("Antelación de reserva:", antelacionReserva);

        // Lógica para convertir las opciones de antelación en fechas
        let maxDate = null;
        const fechaActual = new Date();
        fechaActual.setMonth(fechaActual.getMonth()); // Asegúrate de que el mes actual esté bien establecido
        fechaActual.setDate(1); // Primer día del mes actual
        switch (antelacionReserva) {
            case "máx. con 7 días de antelación":
                // Si la fecha actual ya pasó el límite de 7 días, solo se permitirá seleccionar el mes actual
                maxDate = new Date();
                if (fechaActual.getDate() > 7) {
                    // Si el día actual es mayor a 7, restringimos al mes actual
                    maxDate = new Date(fechaActual.getFullYear(), fechaActual.getMonth() + 1, 0); // Último día del mes actual
                } else {
                    // Si el día es menor o igual a 7, se permite seleccionar hasta 7 días adelante
                    maxDate.setDate(fechaActual.getDate() + 7); // Máximo 7 días
                }
                break;
            case "máx. con 14 días de antelación":
                // Si la fecha actual ya pasó el límite de 14 días, solo se permitirá seleccionar el mes actual
                maxDate = new Date();
                if (fechaActual.getDate() > 14) {
                    // Si el día actual es mayor a 14, restringimos al mes actual
                    maxDate = new Date(fechaActual.getFullYear(), fechaActual.getMonth() + 1, 0); // Último día del mes actual
                } else {
                    // Si el día es menor o igual a 14, se permite seleccionar hasta 14 días adelante
                    maxDate.setDate(fechaActual.getDate() + 14); // Máximo 14 días
                }
                break;
            case "máx. con un mes de antelación":
                maxDate = new Date();
                maxDate.setMonth(maxDate.getMonth() + 1); // Máximo 1 mes
                break;
            case "máx. con 2 meses de antelación":
                maxDate = new Date();
                maxDate.setMonth(maxDate.getMonth() + 2); // Máximo 2 meses
                break;
            case "máx. con 3 meses de antelación":
                maxDate = new Date();
                maxDate.setMonth(maxDate.getMonth() + 3); // Máximo 3 meses
                break;
            case "máx. con 6 meses de antelación":
                maxDate = new Date();
                maxDate.setMonth(maxDate.getMonth() + 6); // Máximo 6 meses
                break;
            case "máx. con 12 meses de antelación":
                maxDate = new Date();
                maxDate.setMonth(maxDate.getMonth() + 12); // Máximo 12 meses
                break;
            case "máx. con 24 meses de antelación":
                maxDate = new Date();
                maxDate.setMonth(maxDate.getMonth() + 24); // Máximo 24 meses
                break;
            default:
                maxDate = new Date(); // Si no hay opción de antelación, no hay límite
        }

        console.log("Fecha máxima permitida:", maxDate);

        // Inicializamos el calendario para la selección solo de meses
        let divMesAnioActual = document.querySelector('.mesAtual' + index44);
        console.log(divMesAnioActual.textContent);



        // Ahora configuramos flatpickr
        const datePijerSoloMes = document.getElementById('offcanvasBottomLabelReserva' + index44);

        flatpickr(datePijerSoloMes, {
            inline: false,
            minDate: fechaActual, // No permite seleccionar meses anteriores al mes actual
            maxDate: maxDate, // Limita el mes máximo según la configuración de antelación
            disableMobile: true,
            plugins: [
                new monthSelectPlugin({
                })
            ],
            locale: {
                months: {
                    shorthand: ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'],
                    longhand: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
                },
            },
            onChange: function (selectedDates, dateStr, instance) {
                console.log("Fecha seleccionada:", selectedDates[0]); // Verifica si dateStr tiene un valor esperado
                console.log("Fecha seleccionada2:", dateStr[0]);
                if (dateStr) {
                    console.log("Fecha seleccionada:", dateStr); // Verifica si dateStr tiene un valor esperado
                    let [mes, anio] = dateStr.split(" ");
                    console.log("Mes:", mes);  // El mes seleccionado
                    console.log("Año:", anio); // El año seleccionado
                } else {
                    console.log("No se ha seleccionado un mes correctamente. Asignando el mes actual.");
                    // Si no se ha seleccionado un mes, asignamos el mes y año actual
                    const fechaActual = new Date();
                    let mesActual = fechaActual.toLocaleString('default', { month: 'long' });
                    let anioActual = fechaActual.getFullYear();
                    console.log("Mes Actual:", mesActual);
                    console.log("Año Actual:", anioActual);

                    // Asignar el valor actual a dateStr para que pueda ser utilizado
                    dateStr = `${mesActual} ${anioActual}`;

                    // Imprimir el valor asignado a dateStr para verificar que se ha asignado correctamente
                    console.log("Valor asignado a dateStr:", dateStr);

                    // Divulgar la selección (para el div que muestra el mes y año)
                    divMesAnioActual.textContent = dateStr;
                }

                // Cambiar el texto del div con el mes y año
                divMesAnioActual.textContent = dateStr;

                let diasSegunMesSeleccionadoArray = [];
                obtenerDiasByMes(selectedDates[0], function(diasSegunMesSeleccionado, horaInicioSegunMes){
                    console.log(diasSegunMesSeleccionado); // Aquí tienes los días
                    diasSegunMesSeleccionadoArray = diasSegunMesSeleccionado;
                    console.log(diasSegunMesSeleccionadoArray, "dias en array");

                    asignarAtributos(index44, diasSegunMesSeleccionadoArray[0].fecha, horaInicioSegunMes, diasSegunMesSeleccionadoArray[0].mes_anio, diasSegunMesSeleccionadoArray[0].anio);
                    montarTarjetasDias(index44, diasSegunMesSeleccionadoArray, horaInicioSegunMes);

                    let divservicioDuracion = document.querySelector(`#offcanvasBottomReserva${index44}`);
                    let servicioDuracion = divservicioDuracion.getAttribute('data-duration');

                    manejarSeleccionFecha(diasSegunMesSeleccionadoArray[0].fecha, index44, servicioDuracion);
                });
            },
        });
    });
}




//monta y muestra las tarjetas dia al cambiar el mes
function montarTarjetasDias(index4444, diasSegunMesSeleccionadoArray2, horaInicioSegunMes2){
    let carouselInerDias= document.querySelector(`#carousel_dias${index4444} .carrusel-inner-dias`);
    // Limpiar el contenedor antes de agregar los nuevos días
    carouselInerDias.innerHTML = '';
    let divservicioDuracion = document.querySelector(`#offcanvasBottomReserva${index4444}`);
    let servicioDuracion2 = divservicioDuracion.getAttribute('data-duration');
    // Recorrer el array de días y generar el HTML para cada uno
    diasSegunMesSeleccionadoArray2.forEach((dia2, index) => {
        // Verificar si es el primer día (index 0)
        let diaClase = 'dia';
        if (index === 0) {
            diaClase += ' date_active'; // Añadir 'date-active' al primer día
        }
        // Verificar si el día es domingo y agregar la clase 'disabled'
        if (dia2.dia_semana === 'dom.') {
            diaClase = 'dia disabled'; // Añadir 'disabled' si es domingo
        }

        // Crear el HTML con template literals
        let diaHTML = `
            <div class="${diaClase}"
                data-index="${index4444}"
                data-diaSemana="${dia2.dia_semana}"
                data-mes="${dia2.mes}"
                data-ano="${dia2.anio}"
                data-date="${dia2.fecha}"
                data-horaInicio="${horaInicioSegunMes2}"
                onclick="${dia2.dia_semana === 'dom.' ? 'event.stopPropagation();' : `manejarSeleccionFecha('${dia2.fecha}', ${index4444}, ${servicioDuracion2});`}">
                <span class="nombre-dia">${dia2.dia_semana}</span>
                <span class="numero-dia">${dia2.numero_dia}</span>
            </div>
        `;

        // Insertar el HTML en el contenedor correspondiente
        carouselInerDias.insertAdjacentHTML('beforeend', diaHTML);
    });
}

//asigna valor a los atributos cuando cambiamos el mes
function asignarAtributos(index444, fecha, horaInicioSegunMes2, mes_anio, anio){
    console.log(fecha, "fecha", horaInicioSegunMes2,"hora", mes_anio, "mes_anio", anio, "anio---------");

    //cambiamos atributo fecha actual
    let contenedorNewReservaMesSeleccionado = document.querySelector(`.contenedorNewReserva[data-index="${index444}"]`);
    console.log(contenedorNewReservaMesSeleccionado, "contenedor");
    let fechaActual66 = actualizarFechaSeleccionada(fecha);
    contenedorNewReservaMesSeleccionado.setAttribute('data-fechaActual', fechaActual66);
    //cambiamos atributo data-horaIncio
    contenedorNewReservaMesSeleccionado.setAttribute('data-horaInicio', horaInicioSegunMes2);
    //cambiar atributo data-horainicio carusel dias
    let carouselDias = document.querySelector(`#carousel_dias${index444}`);
    carouselDias.setAttribute('data-horaInicio', horaInicioSegunMes2);
    let carouselInerDias= document.querySelector(`#carousel_dias${index444} .carrusel-inner-dias`);
    carouselInerDias.setAttribute('data-mesActual', mes_anio);
    carouselInerDias.setAttribute('data-anioActual', anio);
}

//FUNCIÓN QUE COMPRUEBA SI ES EL MES ACTUAL PARA PONER DIA ACTUAL
function actualizarFechaSeleccionada(mesSeleccionado) {
    // Obtener el mes actual
    let fechaActual = new Date();
    let mesActual = fechaActual.getMonth();  // Mes actual (0-11)
    let añoActual = fechaActual.getFullYear();  // Año actual

    // Convertir mesSeleccionado a un objeto Date para extraer el mes y el año
    let [añoSeleccionado, mesSeleccionadoNumero] = mesSeleccionado.split('-').map(Number);  // Convierte "2025-01" a [2025, 1]

    // Verificar si el mes seleccionado es el mes actual
    let fecha;
    if (añoSeleccionado === añoActual && mesSeleccionadoNumero - 1 === mesActual) {
        // Si es el mes actual, asignar el día actual
        let diaActual = fechaActual.getDate();  // Obtener el día actual
        fecha = `${añoSeleccionado}-${String(mesSeleccionadoNumero).padStart(2, '0')}-${String(diaActual).padStart(2, '0')}`;
    } else {
        // Si no es el mes actual, asignar el día 1 del mes seleccionado
        fecha = `${añoSeleccionado}-${String(mesSeleccionadoNumero).padStart(2, '0')}-01`;
    }
    return fecha;
    // Asignar la fecha al contenedor
    // contenedorNewReservaMesSeleccionado.setAttribute('data-fechaActual', fecha);
}


//FUNCIÓN QUE OBTIENE LOS DÍAS SEGÚN EL MES SELECCIONADO
function obtenerDiasByMes(nombreMes, callback){
    console.log(nombreMes, "nombre mes");

    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var url = "get-diasByMes";
    // Hacer una petición AJAX al servidor
    $.ajax({
        url: url, // Ruta que definimos en web.php
        method: 'POST',
        data: {
            _token: csrfToken, // Token CSRF para seguridad
            nombre_mes: nombreMes,
        },
        success: function(response) {
            const diasSegunMesSeleccionado = response.diasMesSeleccionado;
            const horaInicioSegunMes = response.horaInicioSegunMes;
            console.log(diasSegunMesSeleccionado, "dias segun");

            // Ejecutar el callback con los datos
            callback(diasSegunMesSeleccionado, horaInicioSegunMes);
        },
        error: function(xhr) {
            console.error("Error en la solicitud AJAX");
        }
    });
}

//FUNCIÓN QUE RECIBE LAS HORAS LAS MUESTRA Y PONE LA HORA ACTIVA
async function manejarSeleccionFecha(fechaSeleccionada, index, duracionServicio) {
    try {
        console.log(fechaSeleccionada, "fecha seleccionada");

        // Llamar a obtenerHoras con await para esperar su resultado
        const horasRecibidas = await obtenerHoras(fechaSeleccionada, index, duracionServicio);

        console.log(horasRecibidas, "horas recibidas desde manejar");

        // Después de obtener las horas, puedes seguir con tu lógica
        mostrarHoras(horasRecibidas, index);
        initActiveClassHora(index, duracionServicio);

    } catch (error) {
        console.log("Error al obtener las horas", error);
    }
}

//EVENTO ONCLIC CUANDO CLICAMOS EN CANCELAR RESERVA ONE
document.querySelectorAll("[id^='cancelReservOne']").forEach(function(button) {
    button.addEventListener("click", function(event) {
        let indexCancel = button.getAttribute('data-index');
        let divMesAnioActualCancel = document.querySelector('.mesAtual'+indexCancel);
        console.log(obtenerMesActual(), "obtenerMesActual----------------", indexCancel, "index calcel");
        divMesAnioActualCancel.textContent = obtenerMesActual();
        // setTimeout(() => {
        cerrarOffcanvas(button.getAttribute('data-closedOffcanvas'), button.getAttribute('data-date'), indexCancel);
        // }, 1000);
        obtenerTodosDias(function(allDays, horaInicioAllDays, fechaActualAllDays, mesActualAllDays, anioActualAllDays){
            console.log(allDays, "ALLDAYS DESDE CANCELAR RESERVA");
            montarTarjetasDias(indexCancel, allDays, horaInicioAllDays);
            asignarAtributos(indexCancel, fechaActualAllDays, horaInicioAllDays, mesActualAllDays, anioActualAllDays);
        });
        // Aquí va el código que quieres ejecutar cuando se haga clic en un botón
        // onclick="cerrarOffcanvas('offcanvasBottomReserva{{ $index }}', {{ $fechaActual2 }}, {{ $index }})"
        console.log("Botón cancelado: " + button.id);
        // Puedes poner cualquier lógica adicional que necesites
    });
});

//FUNCIÓN QUE OBTIENE LOS DÍAS SEGÚN EL MES SELECCIONADO
function obtenerTodosDias(callback){
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var url = "get-allDays";
    // Hacer una petición AJAX al servidor
    $.ajax({
        url: url, // Ruta que definimos en web.php
        method: 'POST',
        data: {
            _token: csrfToken, // Token CSRF para seguridad
        },
        success: function(response) {
            const allDays = response.allDays;
            const horaInicioAllDays = response.horaInicioAllDays;
            const fechaActualAllDays = response.fechaActual2AllDays;
            const mesActualAllDays = response.mesActualAllDays;
            const anioActualAllDays = response.anioActualAllDays;
            // const horaInicioSegunMes = response.horaInicioSegunMes;
            console.log(allDays, horaInicioAllDays, fechaActualAllDays, mesActualAllDays, anioActualAllDays, "dias segun");

            // Ejecutar el callback con los datos
            callback(allDays, horaInicioAllDays, fechaActualAllDays, mesActualAllDays, anioActualAllDays);
        },
        error: function(xhr) {
            console.error("Error en la solicitud AJAX");
        }
    });
}

//FUNCIÓN OBTENER MES ACTUAL
function obtenerMesActual(){
    const fechaActual = new Date();
    const opciones = { year: 'numeric', month: 'long' };
    const mesActual = fechaActual.toLocaleString('es-ES', opciones).replace(' de', '');
    console.log(mesActual, "funcion mesactual"); // "febrero 2025"
    return mesActual;

}


//EVENTO ONCLIC CUANDO EL SUSUARIO CLICA EN RESERVAR
botonAbrirModalReserva.forEach(function (boton) {
    boton.addEventListener('click', async function(event) {
        event.preventDefault();
        let index33 = boton.getAttribute('data-index');
        let duration = document.querySelector('#offcanvasBottomReserva'+index33).getAttribute('data-duration');

        //PONER PRIMER DÍA EN VERDE "ACTIVE"
        marcarPrimerDiaActivo(index33);
        changeMont(index33);
        obtenerDiasVisibles(index33);
        manejarSeleccionFecha(fechaActual2, index33, duration);
        // Usamos await para esperar a que la promesa de obtenerHoras se resuelva
        // let horasRecibidas = await obtenerHoras(fechaActual2, index33, duration);
        // console.log(horasRecibidas, "horas recibidas");

        // Llamamos a mostrarHoras con las horas recibidas
        // mostrarHoras(horasRecibidas, index33);

        // initActiveClassHora(index33, duration);
        deshabilitar(index33);
    });
});

//FUNCIÓN ABRIR MESES AÑO DESDE RESERVAR SERVICIO
// Función para abrir el modal y mostrar los meses
function showMeses(modal, containerMeses) {
    console.log(modal, containerMeses, "modal y container meses");

    // Crear un arreglo con los nombres de los meses
    // const meses = [
    //   'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
    //   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
    // ];

    // // Obtener el mes actual (0 = enero, 1 = febrero, ..., 11 = diciembre)
    // const mesActual = new Date().getMonth(); // Esto devuelve un valor entre 0 y 11

    // // Obtener el contenedor donde se mostrarán los meses
    // const containerMeses2 = document.getElementById(containerMeses);

    // // Limpiar el contenedor antes de agregar los meses
    // containerMeses2.innerHTML = '';

    // // Crear una lista no ordenada (<ul>) para los meses
    // const ul = document.createElement('ul');
    // ul.classList.add('list-group'); // Añadir clase para el estilo de lista de Bootstrap

    // // Mostrar los meses a partir del mes actual
    // for (let i = mesActual; i < meses.length; i++) {
    //   const li = document.createElement('li');
    //   li.textContent = meses[i];
    //   li.classList.add('list-group-item'); // Añadir estilo a cada elemento de lista
    //   ul.appendChild(li);
    // }

    // // Mostrar los meses anteriores al mes actual (si es necesario)
    // for (let i = 0; i < mesActual; i++) {
    //   const li = document.createElement('li');
    //   li.textContent = meses[i];
    //   li.classList.add('list-group-item');
    //   ul.appendChild(li);
    // }

    // // Agregar la lista al contenedor
    // container.appendChild(ul);

    // // Mostrar el modal usando Bootstrap
    var myModal = new bootstrap.Modal(document.getElementById(modal));
    myModal.show();
  }



// Función para encontrar el primer día que no sea domingo
function marcarPrimerDiaActivo(index) {
    let dias = document.querySelectorAll(`#carousel_dias${index} .carrusel-inner-dias .dia`);
    for (let i = 0; i < dias.length; i++) {
        let diaSemana = dias[i].getAttribute('data-diaSemana');

        // Si el día de la semana no es domingo ('dom.')
        if (diaSemana !== 'dom.') {
            dias[i].classList.add('date_active'); // Aplica la clase
            break; // Detiene el bucle una vez encontrado
        }
    }
}

function deshabilitar(index33){
    //DESHABILITAR SI ES SABADO O DOMINGO O LA FECHA QUE QUERAMOS
    let dias = document.querySelectorAll('#carousel_dias'+index33+' .carrusel-inner-dias .dia');
    // Array que contiene los días de la semana que deseas deshabilitar
    // let diasDeshabilitados = ['sáb.', 'dom.'];
    let diasDeshabilitados = ['dom.'];
    // Recorrer los elementos seleccionados
    dias.forEach(function(dia) {
        // Obtener el texto o contenido del div que representa el día de la semana
        let diaSemana = dia.getAttribute('data-diaSemana');  // Asegúrate de quitar los espacios en blanco

        // Verificar si el día pertenece al array de días deshabilitados
        if (diasDeshabilitados.includes(diaSemana)) {
            // Si es así, agregar la clase 'disabled'
            dia.classList.add('disabled');
        }
    });
}




//DEVUELVE EL TIEMPO TOTAL PARA REALIZAR EL SERVICIO, SUMA HORA INICIO MÁS HORA Y MINUTOS DEL SERVICIO
function tiempoTotal(horaInicio, horaTime, minuTime){
        // Paso 1: Convertir horaInicio a horas y minutos
    let [horaInicioHoras, horaInicioMinutos] = horaInicio.split(':').map(Number); // 9 y 0

    // Paso 2: Convertir horaTime y minuTime a números
    let sumaHoras = parseInt(horaTime, 10);
    let sumaMinutos = parseInt(minuTime, 10);

    // Paso 3: Sumar horas y minutos a la hora de inicio
    let nuevaHora = horaInicioHoras + sumaHoras;
    let nuevosMinutos = horaInicioMinutos + sumaMinutos;

    // Paso 4: Ajustar los minutos si es mayor o igual a 60
    if (nuevosMinutos >= 60) {
        nuevaHora += Math.floor(nuevosMinutos / 60);
        nuevosMinutos = nuevosMinutos % 60;
    }

    // Paso 5: Formatear la nueva hora y minutos a HH:mm
    let nuevaHoraFormateada = `${String(nuevaHora).padStart(2, '0')}:${String(nuevosMinutos).padStart(2, '0')}`;
    console.log(nuevaHoraFormateada);  // Resultado: "10:05"
    return nuevaHoraFormateada;

}

//DEBUELVE LOS DÍAS QUE ESTÁN EN EL CONTENEDOR VISIBLE EN LA PANTALLA
function obtenerDiasVisibles(index) {
    let carruselInner = document.querySelector('#carousel_dias' + index);
    console.log(index, "index dentro obtenerDiasVisibles");
     // El contenedor del carrusel
    console.log(carruselInner, "CAROUSELINER********************************************");

    const dias = document.querySelectorAll('#carousel_dias'+index+' .dia'); // Todas las tarjetas de días
    const carruselRect = carruselInner.getBoundingClientRect(); // Posición y tamaño del contenedor

    // Array para almacenar los días visibles
    const diasVisibles = [];

    // Contador para limitar a 6 días visibles
    let contador = 0;

    dias.forEach(dia => {
        const diaRect = dia.getBoundingClientRect(); // Obtener la posición de cada día

        // Verificamos si el día está completamente dentro de los límites visibles del carrusel
        if (
            diaRect.left >= carruselRect.left && // El lado izquierdo del día no está fuera del contenedor a la izquierda
            diaRect.right <= carruselRect.right // El lado derecho del día no está fuera del contenedor a la derecha
        ) {
            // Solo añadir si no hemos alcanzado los 6 días
            if (contador <= 6) {
                diasVisibles.push(dia); // Si está visible, lo agregamos al array
                contador++; // Incrementamos el contador
            }
        }
    });

    console.log('Días visibles en orden:', diasVisibles.length);
    return diasVisibles;
}
//CAMBIAR EL NOMBRE DEL MES SEGÚN LA VISUALIZACIÓN DE LOS DÍAS
function changeMont(indexChangeMont){
    // Selecciona los elementos visibles con la clase "tns-slide-active"
    console.log(indexChangeMont, "index en CHANGEMONT");
    var visibleSlides = obtenerDiasVisibles(indexChangeMont);
    console.log(visibleSlides, "change month");


    // Crear un Set para almacenar los meses visibles y otro para los años visibles
    var mesesVisibles = new Set();
    var anosVisibles = new Set();

    // Recorremos los slides visibles y obtenemos sus atributos "data-mes" y "data-ano"
    visibleSlides.forEach(function(slide) {
        var mesVisible = slide.getAttribute('data-mes'); // Obtener mes
        // console.log(mesVisible, "mes visible");

        var anoVisible = slide.getAttribute('data-ano'); // Obtener año (agrega el atributo data-ano en el HTML)

        if (mesVisible) {
            mesesVisibles.add(mesVisible);  // Guardar el mes
        }
        if (anoVisible) {
            anosVisibles.add(anoVisible);   // Guardar el año
        }
    });

    // Convertimos los Sets a arrays
    var mesesArray = Array.from(mesesVisibles);
    var anosArray = Array.from(anosVisibles);
    console.log(mesesArray, "messes array");
    console.log(anosVisibles, "anos visibles");

    var titulo = '';

    // Si hay más de un mes visible y todos los meses pertenecen al mismo año
    if (mesesArray.length > 1 && anosArray.length === 1) {
        // Mostrar ambos meses seguidos por el año
        titulo = mesesArray.join(' - ') + ' ' + anosArray[0];
        // console.log(titulo, "titulo");

    }
    // Si hay más de un mes visible y meses de diferentes años
    else if (mesesArray.length > 1 && anosArray.length > 1) {
        // Mostrar ambos meses con sus años respectivos
        var mesesConAnos = new Set(); // Usamos un Set para evitar duplicados

        visibleSlides.forEach(function(slide) {
            var mesVisible = slide.getAttribute('data-mes');
            var anoVisible = slide.getAttribute('data-ano');

            // Añadimos la combinación mes y año al Set
            mesesConAnos.add(mesVisible + ' ' + anoVisible);
        });

        // Convertimos el Set de vuelta a un Array y unimos los elementos con ' - '
        titulo = Array.from(mesesConAnos).join(' - ');
    }
    // Si solo hay un mes visible
    else if (mesesArray.length === 1 && anosArray.length === 1) {
        // Mostrar solo el mes y el año
        titulo = mesesArray[0] + ' ' + anosArray[0];
    }
    let DivMesAnio = document.getElementById('offcanvasBottomLabelReserva'+indexChangeMont);
    DivMesAnio.querySelector('.mesAtual'+indexChangeMont).textContent = titulo;
    // document.getElementById('offcanvasBottomLabelReserva'+indexChangeMont).textContent = titulo;
}


// OBTENER HORAS AL CLICAR EN UN DÍA Y LLAMA A "mostrarHoras()"
function obtenerHoras(fechaSeleccionada, index, duracionServicio) {
    let loader = document.querySelector('#loaderSpera'+index);
    loader.classList.remove('d-none');
    console.log(index, fechaSeleccionada, "dentro de obtenerHoras y fecha seleccionada");
    let elementosActivos = document.querySelectorAll('.dia.date_active');
    elementosActivos.forEach(function(item) {
        item.classList.remove('date_active');
    });
    let elemento = document.querySelector(`#offcanvasBottomReserva${index} .dia[data-date="${fechaSeleccionada}"]`);
    elemento.classList.add('date_active');
    let botonCambiarEmple = document.querySelector(`#offcanvasBottomReserva${index} .botonChangeEmple`);
    botonCambiarEmple.setAttribute('data-diaseleccionado', fechaSeleccionada);
    // Crear y retornar una promesa
    return new Promise((resolve, reject) => {
        let csrfToken = $('meta[name="csrf-token"]').attr("content");
        let time_obtener = "obtener-horas";

        // Hacer una petición AJAX al servidor
        $.ajax({
            url: time_obtener, // Ruta que definimos en web.php
            method: 'POST',
            data: {
                _token: csrfToken, // Token CSRF para seguridad
                fecha: fechaSeleccionada,
                duracion: duracionServicio
            },
            success: function(response) {
                const horasRecibidas = response.horasDisponibles;
                resolve(horasRecibidas);  // Resolvemos la promesa con las horas
            },
            error: function(xhr) {
                console.log('Error al obtener las horas', xhr);
                reject(xhr);  // Rechazamos la promesa si hay un error
            }
        });
        resetEmpleado(index);
    });
}


//AL CLICAR EN HORA PONE CLASE ACTIVE ENTRE OTROS, RESETEA EMPLEADO A CUALQUIERA
function addActiveHora(index, elemento){
    let divHoras = document.querySelectorAll('#carousel_horas'+index+' .carrusel-inner .hora');
    divHoras.forEach(function(div) {
       div.classList.remove('time_active');
    });
    elemento.classList.add('time_active');
    addTotalTime(index, elemento);
    //al cambiar de hora resetamos empleado
    resetEmpleado(index);

}

function resetEmpleado(index){
    let visualizadorImagenEmpleadoSeleccionado = document.querySelector(`[data-testid="participant-label-avatar${index}"]`);
    let visualizadorNombreEmpleadoSeleccionado = document.querySelector(`[data-empleado="participant-label-name${index}"]`);
    $(visualizadorImagenEmpleadoSeleccionado).empty();
    visualizadorNombreEmpleadoSeleccionado.innerHTML = 'Cualquiera';
}

// MUESTRA LAS HORAS AL CLICAR EN UN DÍA
function mostrarHoras(horas, index) {
    horasDisponibles = horas;
    console.log(index, "index dentro de mostrarHoras");
        console.log(horasDisponibles.length, "HORAS DISPONIBLES LENG");
        $('#carousel_horas' + index + ' .carrusel-inner').empty();

        // Añadir horas disponibles
        horasDisponibles.forEach(function(hora) {
            $('#carousel_horas' + index + ' .carrusel-inner').append(`
                <div class="hora" data-hora="${hora}" onclick="addActiveHora(${index}, this)">
                    <div class="nombre-hora">${hora}</div>
                </div>
            `);
        });

        // Verificar si hay menos de 7 horas disponibles para que no hayan huecos entre las flechas
        let horasFaltantes = 6 - horasDisponibles.length;
        if (horasFaltantes > 0) {
            for (let i = 0; i < horasFaltantes; i++) {
                $('#carousel_horas' + index + ' .carrusel-inner').append(`
                    <div class="hora disabled" data-hora="noDisponible" style="cursor: not-allowed;">
                       No disponible
                    </div>
                `);
            }
        }
    // }

}

//AL CLICAR EN LAS FLECHAS SLIDER DIAS SEMANA DESPLAZA DIAS DERECHA O IZQUIERDA
let desplazamientoDias = 0;
const numDiasVisiblesDias = 6;

function desplazarDias(direccion, index) {
    console.log(index, "index desplazar dias");

    let carruselInnerDias = document.querySelector('#carousel_dias'+index+' .carrusel-inner');
    const anchoTarjeta = carruselInnerDias.children[0].offsetWidth + 10; // 10px de margen
    const totalHoras = carruselInnerDias.children.length;
    const maxDesplazamiento = -(anchoTarjeta * (totalHoras - numDiasVisibles));

    desplazamiento += direccion * (anchoTarjeta * numDiasVisibles);

    // Asegurarse de no sobrepasar los límites
    if (desplazamiento > 0) {
        desplazamiento = 0; // No desplazarse más a la izquierda
    } else if (desplazamiento < maxDesplazamiento) {
        desplazamiento = maxDesplazamiento; // No desplazarse más allá del último bloque
    }
    //añadimos obtenerDiasvisibles para cambiar el nombre del mes EN EL TÍTULO
    setTimeout(() => {
        obtenerDiasVisibles(index);
        changeMont(index);
    }, 900);
    carruselInnerDias.style.transform = `translateX(${desplazamiento}px)`;

}


//AL CLICAR EN LAS FLECHAS DESPLAZA HORAS DERECHA O IZQUIERDA
let desplazamiento = 0;
const numDiasVisibles = 6;

function desplazar(direccion, index) {
    let carruselInner = document.querySelector('#carousel_horas'+index+' .carrusel-inner');
    const anchoTarjeta = carruselInner.children[0].offsetWidth + 10; // 10px de margen
    const totalHoras = carruselInner.children.length;
    const maxDesplazamiento = -(anchoTarjeta * (totalHoras - numDiasVisibles));
    console.log(maxDesplazamiento, "MAXIMO DESPLAZAMIENTO");

    desplazamiento += direccion * (anchoTarjeta * numDiasVisibles);

    // Asegurarse de no sobrepasar los límites
    if (desplazamiento > 0) {
        desplazamiento = 0; // No desplazarse más a la izquierda
    } else if (desplazamiento < maxDesplazamiento) {
        desplazamiento = maxDesplazamiento; // No desplazarse más allá del último bloque
    }
    carruselInner.style.transform = `translateX(${desplazamiento}px)`;
}


// MOVER LAS HORAS HACIA LA PRIMERA CASILLA , INICIALIZAR CAROUSEL HORAS
function irAlInicio(index) {
    let carruselInner = document.querySelector('#carousel_horas'+index+' .carrusel-inner');
    desplazamiento = 0; // Restablece el desplazamiento a 0 (el inicio)
    carruselInner.style.transform = `translateX(0px)`; // Mueve el carrusel al inicio
}

//AÑADE LA CLASE ACTIVE A LA PRIMERA HORA visualiza tiempo necesario tiempo total
function initActiveClassHora(index, duration){
    console.log(index);
    console.log('#carousel_horas'+index);
    setTimeout(() => {
        const primeraCasilla = document.querySelector('#carousel_horas'+index+' .carrusel-inner').children[0];
        console.log(primeraCasilla, "primera casilla");

        primeraCasilla.classList.add('time_active');
        addTotalTime(index, primeraCasilla);
        let loader = document.querySelector('#loaderSpera'+index);
        loader.classList.add('d-none');
        // console.log(primeraCasilla);
    }, 900);
}

//PONER TOTAL TIEMPO EN VISUALIZADOR TOTAL TIEMPO
function addTotalTime(index, casilla){
    let horaTime = document.querySelector('#offcanvasBottomReserva'+index).getAttribute('data-service_h');
    let minuTime = document.querySelector('#offcanvasBottomReserva'+index).getAttribute('data-service_m');
    let botonContinuarReserva = document.querySelector('#offcanvasBottomReserva'+index+' .confirm-button-reservaNewService');
    let horaInicio = casilla.getAttribute('data-hora');
    let totalTiempo = tiempoTotal(horaInicio, horaTime, minuTime);
    let visualizadorDesdeHasta = document.querySelector('#offcanvasBottomReserva'+index+' .tiempoNecesario');
    if (horaInicio === 'noDisponible') {
        botonContinuarReserva.classList.add('botonDisabled');
        $('.botonDisabled').prop('disabled', true);
        visualizadorDesdeHasta.textContent = ('No hay disponibilidad');
    }else{
        $('.botonDisabled').prop('disabled', false);
        botonContinuarReserva.classList.remove('botonDisabled');
        visualizadorDesdeHasta.textContent=(horaInicio +' - '+totalTiempo);
    }
    //asignamos hora inicio a todos los botones de "cambiar empleado"
    let botonesCambiarEmpleado = document.querySelectorAll('.customOpenModalSelectEmpleButton');
    botonesCambiarEmpleado.forEach(function(boton) {
        //asignar valor a atributo
        boton.setAttribute('data-inicioServicio', horaInicio);

    });
}

//AL CLICAR SOBRE UN DÍA DE LA SEMANA AÑADE LA CLASE ACTIVE ENTRE OTROS
function addDateActive(fecha, elemento, index){
    irAlInicio(index);
    initActiveClassHora(index);
    var elementosActivos = document.querySelectorAll('.dia.date_active');
    elementosActivos.forEach(function(item) {
        item.classList.remove('date_active');
    });
    // console.log(elemento);


    elemento.classList.add('date_active');
    //actualizo la fecha para el botón seleccionar empleado
    var botonesSelectEmpleadoActualizarFecha = document.querySelectorAll('.customOpenModalSelectEmpleButton');
    botonesSelectEmpleadoActualizarFecha.forEach(function (botonEmpleadofechAc) {
        botonEmpleadofechAc.setAttribute('data-diaSeleccionado', fecha);
    });
    //  console.log('Fecha seleccionada:', fecha);
}

//ABRE MODAL SELECCIONAR EMPLEADO, petición ajax disponibilidad empleado
var botonesSelectEmpleado = document.querySelectorAll('.customOpenModalSelectEmpleButton');
botonesSelectEmpleado.forEach(function (botonEmpleado) {
    botonEmpleado.addEventListener('click', function(event){
        // Hacer primera llamada AJAX para obtener la disponibilidad de las empleadas
        // console.log(fechaSeleccionada, "fecha seleccionada");
        let horaInicioReservaEmpleado = botonEmpleado.getAttribute('data-inicioServicio');
        console.log(horaInicioReservaEmpleado, "hora inicio empleado");
        if(horaInicioReservaEmpleado === 'noDisponible'){
            console.log("no hat disponibilidad");

        }
        else{
        let duracionReservaEmpleado = botonEmpleado.getAttribute('data-duration');


        let fechaReservaEmpleado = botonEmpleado.getAttribute('data-diaSeleccionado');
        console.log(duracionReservaEmpleado, "duración reserva", fechaReservaEmpleado, "fecha reservaEmpleadao");
        let indexCambiarEmpleado = botonEmpleado.getAttribute('data-index');
        let csrfToken = $('meta[name="csrf-token"]').attr("content");
        let empleadas_disponibles = "empleadas-disponibles";
        // Hacer una petición AJAX al servidor
        $.ajax({
            url: empleadas_disponibles, // Ruta que definimos en web.php
            method: 'POST',
            data: {
                _token: csrfToken, // Token CSRF para seguridad
                horaInicioReserva: horaInicioReservaEmpleado,
                duracionReserva: duracionReservaEmpleado,
                fechaReserva: fechaReservaEmpleado
            },
            success: function(response) {
                const disponibilidadEmpleados = response.disponibilidadEmpleados;
                // Recorrer el array usando forEach
                actualizarDisponibilidadEmpleados(disponibilidadEmpleados, `#selectEmpleModal${indexCambiarEmpleado}`);
                disponibilidadEmpleados.forEach(function(empleado) {

                    console.log('ID del Empleado:', empleado.idEmpleado);
                    console.log('Nombre del Empleado:', empleado.empleado);
                    console.log('Disponible:', empleado.disponible ? 'Sí' : 'No');
                });
            },
            error: function(xhr) {
                console.log('Error al obtener las horas', xhr);
            }
        });

        //abrimos el modal

        event.preventDefault();
        console.log("clic botón  seleccionarEmpleado", indexCambiarEmpleado);
        var modalElement = new bootstrap.Modal(document.getElementById('selectEmpleModal'+indexCambiarEmpleado));
        modalElement.show();
        }
    });
});


// PONE ROJO SI EMPLIADO NO DISPONIBLE Y VERDE SI SI
function actualizarDisponibilidadEmpleados(disponibilidadEmpleados, modal) {
    disponibilidadEmpleados.forEach(function(empleado) {
        // Seleccionar el elemento correspondiente al empleado en el DOM usando su ID
        const selectorBase = `${modal} [data-empId="${empleado.idEmpleado}"]`;

        const empleadoDiv = document.querySelector(selectorBase);
        const divAvatarEmpleado = document.querySelector(`${selectorBase} .avatarEmpleado`);
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
            }
        }
    });
}


//AL CLICAR EN EL EMPLEADO DENTRO DEL MODAL SELECCIONAR EMPLEADO
function selectEmpleado(elemento, empleado_id, empleado_nombre, empleado_imagen){
    if(elemento.classList.contains('empleadoDisabled')){

    }else{
        let index = elemento.getAttribute('data-index');
        let empleadosPonerCheck = document.querySelectorAll('.avatarEmpleado');
        empleadosPonerCheck.forEach(function (empleado) {
            empleado.classList.remove('avatar-selected');
        });
        elemento.querySelector('.avatarEmpleado').classList.add('avatar-selected');
        let visualizadorImagenEmpleadoSeleccionado = document.querySelector(`[data-testid="participant-label-avatar${index}"]`);
        let visualizadorNombreEmpleadoSeleccionado = document.querySelector(`[data-empleado="participant-label-name${index}"]`);
        if(empleado_id === 0){
            visualizadorNombreEmpleadoSeleccionado.innerHTML = 'Cualquiera';
            visualizadorNombreEmpleadoSeleccionado.setAttribute('data-empleId', 'cualquiera');
            $(visualizadorImagenEmpleadoSeleccionado).empty();
        }else{
            $(visualizadorImagenEmpleadoSeleccionado).empty();
            // Añadir horas disponibles
                $(visualizadorImagenEmpleadoSeleccionado).append(`
                    <div class="avatar avatar-rounded avatar-sm" style="background-image: url(./storage/${empleado_imagen});">
                    </div>
                `);
            let visualizadorNombreEmpleadoSeleccionado = document.querySelector(`[data-empleado="participant-label-name${index}"]`);
            visualizadorNombreEmpleadoSeleccionado.innerHTML = empleado_nombre;
            visualizadorNombreEmpleadoSeleccionado.setAttribute('data-empleId', empleado_id);
        }
    }
    // console.log(elemento);
}


//ABRE MODAL CANCELAR RESERVA SERVIVIO
var botonesAbrirModal = document.querySelectorAll('.customOpenModalCancelServiceButton');
botonesAbrirModal.forEach(function (boton) {
    boton.addEventListener('click', function(event){
        let index44 = boton.getAttribute('data-index');
        event.preventDefault();
        console.log("clic botón abrrir cancela servicvio", index44);
        var modalElement = new bootstrap.Modal(document.getElementById('cancelReservaModal'+index44));
        modalElement.show();

    });
});


//ABRE MODAL CANCELAR RESERVA SERVIVIO DESDE CONFIRMAR SERVICIO
var botonesAbrirModal = document.querySelectorAll('.customOpenModalCancelServiceButtonComfirmService');
botonesAbrirModal.forEach(function (boton) {
    boton.addEventListener('click', function(event){
        let index44 = boton.getAttribute('data-index');
        event.preventDefault();
        console.log("clic botón abrrir cancela servicvio", index44);
        var modalElement = new bootstrap.Modal(document.getElementById('cancelReservaModalConfirmarServicio'+index44));
        modalElement.show();

    });
});

//RESETEA NOMBRE EMPLEADO A "CUALQUIERA"
function resetNameEmpleado(index){
    //reseta nombre empleado a "cualquiera"
    let visualizadorNombreEmpleadoReset = document.querySelector(`[data-empleado="participant-label-name${index}"]`);
    //eliminamos imagen del empleado
    let visualizadorImagenEmpleadoSeleccionadoReset = document.querySelector(`[data-testid="participant-label-avatar${index}"]`);
    $(visualizadorImagenEmpleadoSeleccionadoReset).empty();
    //ponemos cualquiera
    visualizadorNombreEmpleadoReset.textContent = ('Cualquiera');
}


function cerrarOffcanvas(idOffcanva, fechaActual, index){
    console.log("has hecho click", idOffcanva);

    var offcanvasElement = document.getElementById(idOffcanva);

    // Crear una instancia del offcanvas de Bootstrap
    var offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasElement);

    // Si no existe instancia (si no ha sido inicializada), inicializarla
    if (!offcanvasInstance) {
        offcanvasInstance = new bootstrap.Offcanvas(offcanvasElement);
    }
    //ponemos la clase adctive a la primera casilla
    var elementosActivos = document.querySelectorAll('.dia.date_active');
    elementosActivos.forEach(function(item) {
        item.classList.remove('date_active');
    });

    const primeraCasilla = document.querySelector('#carousel_dias'+index+' .carrusel-inner').children[0];
    if(primeraCasilla){
        primeraCasilla.classList.add('date_active');
    }
    resetNameEmpleado(index);
    //mueve las horas al principio
    irAlInicio(index);
    // Cerrar el offcanvas
    offcanvasInstance.hide();
}
//metodo para cerrar cuando se abre más de un fondo negor de bac
// document.addEventListener('shown.bs.offcanvas', () => {
//     const backdrops88 = document.querySelectorAll('.offcanvas-backdrop.fade.show');

//     // Eliminar solo un "backdrop" si hay más de uno
//     if (backdrops88.length > 1) {
//         backdrops88[0].remove(); // Elimina el primero
//     }
// });


// document.getElementById('confirmCalcelService').addEventListener('click', function(event) {
//     event.preventDefault();
//     cerrarTodosLosOffcanvas();
// });

//VERIFICA SI USUARIO ESTÁ AUTENTICADO Y EMAIL VERIFICADO
function userIsAutenticated(botonDorado = null) {
    // Realizar la verificación de autenticación y validación de email
    console.log("clic verificar");

    fetch('verificar-auth-y-email')
        .then(response => response.json())
        .then(data => {
            if (data.authenticated && data.email_verified) {

            } else if (!data.authenticated) {
                // Si no está autenticado, redirige a la página de login
                window.location.href = 'login';
            } else if (!data.email_verified) {
                // Si el email no está verificado, redirige a la página de verificación de email
                window.location.href = 'email/verify';
            }
            if(botonDorado === 'botonDorado'){
                const servicesSection = document.getElementById('services'); // Obtener el elemento con id="services"

                if (servicesSection) {
                    servicesSection.scrollIntoView({
                        behavior: 'smooth', // Scroll suave
                        block: 'start'     // Alinear con la parte superior del viewport
                    });
                }
            }
        })
        .catch(error => console.error('Error verificando autenticación y verificación de email:', error));

}

//ASIGNAMOS VALORES A LOS DATOS DEL OFCANVAS "REVISAR Y CONFIRMAR RESERVA" Y A LOS INPUTS DEL FORMULARIO
var botonContinuarReserva = document.querySelectorAll('.confirm-button-reservaNewService');
botonContinuarReserva.forEach(function (botonContinuar) {
    botonContinuar.addEventListener('click', function(event){
        event.preventDefault();
       console.log("clic en botón continuar");
        let elemento = obtenerDiaActivo();
        let diaSemana = obtenerDiaSemanaActivo(elemento);
        let mesNombre =capitalizarPrimeraLetra(elemento.getAttribute('data-mes'));
        let anioNumeroDia = elemento.getAttribute('data-date');
        // Dividimos la fecha en partes (año, mes, día)
        let [anio, mes, diaMes] = anioNumeroDia.split('-');
        // Creamos la nueva cadena con el formato "DD YYYY"
        let formatoDiaAnio = `${diaMes} ${anio}`;
        let indexContinuar = botonContinuar.getAttribute('data-index');
        let tiempoNecesario = document.querySelector('#offcanvasBottomReserva'+indexContinuar+' .tiempoNecesario').textContent;
        let durationContinuar = document.querySelector('#offcanvasBottomReserva'+indexContinuar).getAttribute('data-duration');
        let empleado_id = document.querySelector('.empleadoNombreId'+indexContinuar).getAttribute('data-empleId');
        let empleado_nombre = document.querySelector('.empleadoNombreId'+indexContinuar).textContent.trim();
        let servicioId = document.querySelector('#offcanvasBottomComfirmReserva'+indexContinuar).getAttribute('data-service');

        let divContinuarReserva = document.querySelector('#offcanvasBottomComfirmReserva'+indexContinuar);
        //empleado
        divContinuarReserva.querySelector('.empleadoName').textContent = 'Empleado: ' + empleado_nombre;
        // divContinuarReserva.querySelector('#empleada_id').value = empleado_id;
        //fecha, hora y duración
        divContinuarReserva.querySelector('.bookingDate').textContent = mesNombre+', '+diaSemana+', '+formatoDiaAnio;
        divContinuarReserva.querySelector('.bookingHour').textContent = tiempoNecesario+' ('+formatDuration(durationContinuar)+')';
        divContinuarReserva.querySelector('.subTiempoNecesario').textContent = tiempoNecesario;
        let fechaHoraCompleta = obtenerFechaHoraCompleta(mesNombre, anioNumeroDia, tiempoNecesario);


        //insertamos los inputs, vaciamos
        $('#form_create_new_reserv').empty();
        // document.querySelector('#offcanvasBottomComfirmReserva' + indexContinuar + ' #form_create_new_reserv').textContent = '';
        // Añadir añadimos
        $('#form_create_new_reserv').append(`
            <input type="hidden" name="service_id" id="service_id" value="${servicioId}">
            <input type="hidden" name="date_time" id="date_time" value="${fechaHoraCompleta}">
            <input type="hidden" name="duration" id="duration" value="${durationContinuar}">
            <input type="hidden" name="empleada_id" id="empleada_id" value="${empleado_id}">
        `);
    });
});



//DEVUELVE FECHA COMPLETA PARA PONER EN INPUT
function obtenerFechaHoraCompleta(mesNombre, anioNumeroDia, tiempoNecesario) {
    let nuevaFecha = new Date(anioNumeroDia);
    const horaInicio = tiempoNecesario.split(" - ")[0];
    // console.log(horaInicio, " horaInicio");
    let horas = parseInt(horaInicio.split(":")[0]);
    let minutos =  parseInt(horaInicio.split(":")[1]);
    // Establecer la hora y los minutos en la fecha base
    nuevaFecha.setHours(horas, minutos, 0);
    // console.log(nuevaFecha, "NUEVA FECHA");
    let fechaHora = new Date(nuevaFecha);
    // Convertir a formato `YYYY-MM-DD HH:MM:SS`
    let anio = fechaHora.getFullYear();
    let mes = String(fechaHora.getMonth() + 1).padStart(2, '0'); // Los meses son indexados desde 0
    let dia = String(fechaHora.getDate()).padStart(2, '0');
    let horas2 = String(fechaHora.getHours()).padStart(2, '0');
    let minutos2 = String(fechaHora.getMinutes()).padStart(2, '0');
    let segundos = String(fechaHora.getSeconds()).padStart(2, '0');
    // Formatear la cadena
    let fechaHoraFormatoBD = `${anio}-${mes}-${dia} ${horas2}:${minutos2}:${segundos}`;
    // console.log(fechaHoraFormatoBD, "FORMATO BASE DATOS"); // "2024-10-29 15:15:00"
    return fechaHoraFormatoBD;
}



//DEVUELVE LOS MINUTOS EN HORAS
function formatDuration(minutes) {
    const hours = Math.floor(minutes / 60); // Calcula las horas
    const remainingMinutes = minutes % 60;  // Calcula los minutos restantes

    if (hours > 0 && remainingMinutes > 0) {
        return `${hours}h ${remainingMinutes}min`;
    } else if (hours > 0) {
        return `${hours}h`;
    } else {
        return `${remainingMinutes}min`;
    }
}

//LA PRIMERA EN MAYÚSCULAS
function capitalizarPrimeraLetra(cadena) {
    return cadena.charAt(0).toUpperCase() + cadena.slice(1);
}

//OBTENER DÍA CON LA CLASE ACTIVE
function obtenerDiaActivo() {
    const diaActivo = document.querySelector('.date_active');
    if (diaActivo) {
        return diaActivo;
    }
    // Si no encuentra ningún día activo, retorna null o un mensaje de que no existe
    return null;
}

function obtenerDiaSemanaActivo(diaActivo) {
    // Mapeo de días abreviados a sus equivalentes completos
    const diasSemanaCompleto = {
        "lun.": "Lunes",
        "mar.": "Martes",
        "mié.": "Miércoles",
        "jue.": "Jueves",
        "vie.": "Viernes",
        "sáb.": "Sábado",
        "dom.": "Domingo"
    };
    // Si encuentra el elemento, obtiene el valor de "data-diasemana" y lo convierte
    if (diaActivo) {
        const diaAbreviado = diaActivo.getAttribute('data-diaSemana');
        const diaCompleto = diasSemanaCompleto[diaAbreviado] || "Día no válido";

        return diaCompleto;
    }
    // Si no encuentra ningún día activo, retorna null o un mensaje de que no existe
    return null;
}

//oculta vista confirmacion reserva y muestra la que estaba
function hideConfirmReserv(index){
    let textarea = document.querySelector('.offcanvasOcultar'+index+' .reservNote');
    textarea.value='';
    let divOcultar = document.querySelector('.offcanvasMostrar'+index);
    let divMostrar = document.querySelector('.offcanvasOcultar'+index);
    divOcultar.classList.add('d-none');
    divMostrar.classList.remove('d-none');
    //cerrar el offcanvas offcanvasBottomComfirmReserva
    let idOffcanvas = 'offcanvasBottomComfirmReserva'+index;
    cerrarOffcanvas(idOffcanvas, 'noHay', index);
}

//enviar datos crear nueva reserva
var botonesCrearReserva = document.querySelectorAll('.boton-reservar-servicio');
    botonesCrearReserva.forEach(function (botonReservar) {
        botonReservar.addEventListener('click', function(event){
            event.preventDefault();
            //pedir configuracion reservas
            getConfiguracionReservas(function(configuraciones){
                let confirmacionAutomatica = configuraciones[0].confirmacion_automatica;
                confirmacionAutomatica = confirmacionAutomatica === 'si' ? 'confirmed' : 'pending';

                console.log("enviar reserva");
                let indexReservar = botonReservar.getAttribute('data-index');
                const nota = document.querySelector('#offcanvasBottomComfirmReserva'+indexReservar+' .reservNote').value;

                //si todo sale bien
                // $('#form_create_new_reserv').append(`
                //     <input type="hidden" name="nota" id="nota" value="${nota}">
                // `);
                    // Muestra el loader
                let loader = document.querySelector('#loaderSpera'+indexReservar);
                loader.classList.remove('d-none');

                // Obtener valores de los inputs ocultos
                const serviceId = document.getElementById("service_id").value;//"4"
                const dateTime = document.getElementById("date_time").value;//2025-03-10 09:00:00
                const duration = document.getElementById("duration").value;//60
                const empleadaId = document.getElementById("empleada_id").value;
                // let empleado_seleccionado = 1;
                let empleado_seleccionado = (empleadaId.trim() === 'cualquiera') ? 0 : 1;

                let csrfToken = $('meta[name="csrf-token"]').attr("content");
                const userId = document.querySelector("input[name='user_id']").value;//cliente
                const total_pagarReserva0202 = parseFloat(document.querySelector('.total_pagarReserva0202').textContent);
                // console.log(total_pagarReserva0202, "total a pagar");

                let crear_reserva = "reservas-store";
                $.ajax({
                    url: crear_reserva,
                    method: 'POST',
                    data: {
                        _token: csrfToken,
                        service_id: serviceId,
                        date_time: dateTime,
                        status: confirmacionAutomatica,
                        duration: duration,
                        empleada_id: empleadaId,
                        nota: nota,
                        user_id: userId,
                        total_payment: total_pagarReserva0202,
                        empleado_seleccionado:empleado_seleccionado

                    },
                    success: function(response) {
                        const reserva_creada = response.reservaCreada;
                        if(reserva_creada === true){

                            let offcanvasReservaConfirmar = document.querySelector('.offcanvasOcultar'+indexReservar);
                            offcanvasReservaConfirmar.classList.add("d-none");
                            let offcanvasReserva = document.querySelector('.offcanvasMostrar'+indexReservar)
                            offcanvasReserva.classList.remove('d-none');
                            // Ocultar el loader después de mostrar el div
                            loader.classList.add('d-none');
                            let hour = document.querySelector('.offcanvasOcultar'+indexReservar+' .bookingHour').textContent;
                            let horaInicio = hour.split(" - ")[0];
                            let fecha = document.querySelector('.offcanvasOcultar'+indexReservar+' .bookingDate').textContent;
                            let partesFecha = fecha.split(", ");
                            const diaYAnio = partesFecha[2].split(" ");
                            partesFecha = [partesFecha[0], partesFecha[1], ...diaYAnio];

                            document.querySelector('.offcanvasMostrar'+indexReservar+' .reservConfirmDateHour').textContent = partesFecha[1]+' '+partesFecha[2]+' de '+partesFecha[0]+' del '+ partesFecha[3]+' a las '+horaInicio;
                        }else{
                            let offcanvasReservaConfirmar = document.querySelector('.offcanvasOcultar'+indexReservar);
                            offcanvasReservaConfirmar.classList.add("d-none");
                            loader.classList.add('d-none');
                            hideConfirmReserv(indexReservar);
                            alert('Atención!! la hora seleccionada o el empleado no están disponibles, inténtelo de nuevo cambiando esos datos');
                        }
                    },
                    error: function(xhr) {
                        console.log('Error al obtener las horas', xhr);
                    }
                });
            });
        });
    });
//CLIC EN CATEGORIAS GENERALES

// document.querySelectorAll('[data-categoriaGeneral]').forEach(function(element) {

//     element.addEventListener('click', function(e) {
//         e.preventDefault();
//         let backgroundInit = document.getElementById('loaderInitPage');
//         backgroundInit.classList.toggle('d-none');
//         const subcategoriasDiv = document.getElementById('subcategoriasServicios');
//         subcategoriasDiv.classList.toggle('showSubcategory');
//         const rect = subcategoriasDiv.getBoundingClientRect(); // Obtiene la posición del div
//         // const offset = window.innerHeight / 2 - rect.height / 2;
//         const offset = (window.innerHeight / 2 - rect.height / 2) + 150;
//          // Desplazamos la ventana para que el div quede centrado
//         window.scrollTo({
//             top: rect.top + window.scrollY - offset,
//             behavior: 'smooth' // Añade suavidad al desplazamiento
//         });
//         let categoriaGeneral = element.getAttribute('data-categoriaGeneral');
//         console.log(categoriaGeneral);

//     });
// });



// var carouselContainers = document.querySelectorAll('.carousel_dias'); // Ajusta el selector

// // Aplica la función detectSwipe a cada contenedor con su índice correspondiente
// carouselContainers.forEach((container) => {
//     let index = container.getAttribute('data-index');
//     detectSwipe(container, index);  // Pasa el contenedor y el índice
// });
//VERIFICAR SI EL USUARIO ESTÁ AUTENTICADO
// Seleccionar todos los botones con la clase .boton-reservar-servicio
// document.querySelectorAll('.boton-reservar-servicio').forEach(boton => {
//     boton.addEventListener('click', function (e) {
//         e.preventDefault();
//         console.log("comprobar si autenticado");
//         const index = boton.getAttribute('data-index');
//         // Verificar si el usuario está autenticado
//         fetch('verificar-auth')
//             .then(response => response.json())
//             .then(data => {
//                 if (data.authenticated) {
//                     // Si está autenticado, abre el formulario en el offcanvas específico

//                     const offcanvas = new bootstrap.Offcanvas(document.getElementById(`offcanvasBottomComfirmReserva${index}`));
//                     offcanvas.show();
//                 } else {
//                     // Si no está autenticado, redirige a la página de login
//                     window.location.href = `login?redirect_offcanvas=${index}`;

//                     // window.location.href = 'login';
//                 }
//             })
//             .catch(error => console.error('Error verificando autenticación:', error));
//     });
// });
// function reservServiceVerification(index) {
//     fetch('/verificar-auth')
//         .then(response => response.json())
//         .then(data => {
//             if (data.autenticado) {
//                 // Abre el offcanvas específico usando el índice
//                 // const offcanvas = new bootstrap.Offcanvas(document.getElementById(`offcanvasBottomComfirmReserva${index}`));
//                 // offcanvas.show();
//             } else {
//                 // Si no está autenticado, redirigir al usuario a iniciar sesión
//                 window.location.href = `/login?redirect_to=offcanvas&index=${index}`;
//             }
//         })
//         .catch(error => console.error('Error:', error));
// }

// document.getElementById('btnReservar').addEventListener('click', function() {
//     fetch('/verificar-auth')
//         .then(response => response.json())
//         .then(data => {
//             if (data.authenticated) {
//                 // Si está autenticado, enviar la solicitud de reserva
//                 // realizarReserva();
//             } else {
//                 // Si no está autenticado, redirigir al login
//                 window.location.href = "/login?redirect=/reservas/store";
//             }
//         })
//         .catch(error => console.error('Error:', error));
// });

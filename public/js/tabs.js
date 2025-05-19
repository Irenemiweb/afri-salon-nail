

var tabLinks1 = document.querySelectorAll(".tablinks");
var tabLinks2 = document.querySelectorAll(".tablinks2");
var tabLinks  = [...tabLinks1, ...tabLinks2];

var tabContent = document.querySelectorAll(".tabcontent");


var tabLinksAdministrator1 = document.querySelectorAll(".tablinksAdministrator");
var tabLinksAdministrator = [...tabLinksAdministrator1, ...tabLinks2];
var tabContentAdministrator = document.querySelectorAll('.tabcontentAdministrator');
var initUrlImage= 'http://localhost/laravel/salon-manicura/';
var initUrlImage= 'http://salonnail.kesug.com/';
tabLinksAdministrator.forEach(function(el) {
    el.addEventListener("click", openTabsAdministrator);
 });

tabLinks.forEach(function(el) {
   el.addEventListener("click", openTabs);
});
function openTabsAdministrator(el) {
    // console.log(el, "clic en tab");
    initIsotope();
   let btnTarget = el.currentTarget;
//    console.log(btnTarget, "btn tarjet");

   let nameTab = btnTarget.dataset.pannel;
//    console.log(nameTab, "nameTab");

   tabContentAdministrator.forEach(function(el) {
      el.classList.remove("active");
   });
   tabLinksAdministrator.forEach(function(el) {
      el.classList.remove("active");
   });
   document.querySelector("#" + nameTab).classList.add("active");
   btnTarget.classList.add("active");
   cambiarURL('admin/dashboard/'+nameTab);
   let tabresponsive = document.getElementById('tabsResponsiveid');
   if(tabresponsive){
    // console.log('siiiii');
    tabresponsive.style.width = '0px';
   }else{
    // console.log('no existe');
   }
//    $('#calendar').fullCalendar('render');
   quitarInputsSeleccionados();
//    resetDropselecCategoria();
//    resetCategoriaGrupal();
    // console.log("tabssssss");
}
//CAMBIAR BOTÓN CITAS PROXIMAS O PASADAS
function cambiarBoton(idBoton) {
    // Selecciona los botones
    const botones = document.querySelectorAll('.citasTerProx');
    botones.forEach(function(boton) {
        boton.classList.remove('--selected');
     });
     let botonSelect = document.getElementById(idBoton);
     botonSelect.classList.add('--selected')
     if (idBoton === 'botonProximas') {
        showDivPagos('citasProcimasContainer');
     }else{
        showDivPagos('citasTerminadasContainer');
     }
  }


//ESCONDER TABUSER PARA QUE NO SE VEA MIENTRAS SE CARGA LA PÁGINA
document.addEventListener('DOMContentLoaded', function () {
    // Ocultar el div al inicio
    const userAdministrator = document.getElementById('User_administrator');
    if (userAdministrator) {
        userAdministrator.style.opacity = '0';

        // Mostrar el div cuando la página está completamente cargada
        window.addEventListener('load', function () {
          userAdministrator.style.opacity = '1';
        });
    }

  });

function openTabs(el) {
    // console.log("clic en tab");
    initIsotope();
   let btnTarget = el.currentTarget;
   let nameTab = btnTarget.dataset.pannel;
   tabContent.forEach(function(el) {
      el.classList.remove("active");
   });
   tabLinks.forEach(function(el) {
      el.classList.remove("active");
   });
   document.querySelector("#" + nameTab).classList.add("active");
   btnTarget.classList.add("active");
   cambiarURL('panel/'+nameTab);
   let tabresponsive = document.getElementById('tabsResponsiveid');
   if(tabresponsive){
    // console.log('siiiii');
    tabresponsive.style.width = '0px';
   }else{
    // console.log('no existe');
   }
   quitarInputsSeleccionados();
//    resetDropselecCategoria();
//    resetCategoriaGrupal();
    // console.log("tabssssss");
}


function UpProduct(content, tab_button, url){
    // console.log("ejecución UpProduct");
    // console.log( tab_button,"parametros");
    //quitamos active de boton
    tabLinks.forEach(function(el) {
        el.classList.remove("active");
     });
     //quitamos active de contenido
    tabContent.forEach(function(el) {
        el.classList.remove("active");
     });

     //ponemos active al contenido
     document.querySelector("#" + tab_button).classList.add("active");
    document.getElementById(content).classList.add("active");
    //ponemos active al boton(para colorines supeirores)
    // document.getElementById(tab_button).classList.add("active");
    let botonPrueba = document.getElementById(tab_button);
    setTimeout(() => {
    // console.log(botonPrueba, "botonPrueba");

    }, 8000);

    let tabresponsive = document.getElementById('tabsResponsiveid');
    if(tabresponsive){
    //  console.log('siiiii');
     tabresponsive.style.width = '0px';
    }else{
    //  console.log('no existe');
    }

    cambiarURL(url);
}

function UpProductAdministrator(content, tab_button, url){
    // console.log("ejecución administrator");
    // console.log(content, tabContent, url, "parametros");

    // if (tab_button === 'tab_administrator_citas') {
    //     initializeCalendar();
    // }
    tabContentAdministrator.forEach(function(el) {
        el.classList.remove("active");
        });

        tabLinksAdministrator.forEach(function(el) {
        el.classList.remove("active");
        });
        document.getElementById(content).classList.add("active");
    document.getElementById(tab_button).classList.add("active");
    if (url.includes('createService')) {
        showDiv('createNew_service');
    }
    else if(url.includes('showAllServices')){
        showDiv('show_all_service');
    }
    let tabresponsive = document.getElementById('tabsResponsiveid');
    if(tabresponsive){
        // console.log('siiiii');
        tabresponsive.style.width = '0px';
    }else{
        // console.log('no existe');
    }
    cambiarURL(url);
}






// //CONFIGURACIÓN NEGOCIO PRIMERA PANTALLA LLAMAMOS A CARGAR A LA SEGUNDA
let divConfiguration_bussines = document.getElementById('configuration_bussines');
let divConfiguration_service = document.getElementById('configuration_service');
let divShowAll_service = document.getElementById('show_all_service');
let divCreateNew_service = document.getElementById('createNew_service');

//PRIMERA PANTALLA ABRIMOS SEGUNDA
let abrirConfigServicios = document.querySelectorAll('.configuracionNegocio a');
if(abrirConfigServicios){
    abrirConfigServicios.forEach(function(enlaceAbriconfigServicios){
             $(enlaceAbriconfigServicios).off('click').on('click', function(event) {
            event.preventDefault();

           let dataUrl = enlaceAbriconfigServicios.getAttribute('data-url');
        //    console.log(dataUrl, "dataUrl");

            if(dataUrl === 'config.services'){
                showDiv('configuration_service');
            }else if(dataUrl=== 'advant.options'){
                showDiv('opciones_avanzadas1');
            }
        });
    });
}
function showPrincipalPageConfig(){
    showDiv('configuration_bussines');
}

//FUNCIÓN QUE RECARGA LA PÁGINA
function reloadPage(){
    window.location.reload();
}

//PRELOADER DE SOWALLSERVICES
const preloader2 = document.querySelector('#preloader2');
  if (preloader2) {
    window.addEventListener('load', () => {
      preloader2.remove();
    });
  }

//   $(document).ready(function() {
    // AOS.init({ disable: true }); // Desactiva AOS

    // Añadir el evento a todos los iconos

// });

//funcion que inicializa los isotope movimientos de entrada y salida visula
$(document).ready(function () {
    // al clicar en la tarjeta configuración de servicios
$('#configuracionServicios55').on('click', function() {
    initIsotope('.isotope-containerIndex', '.isotope-itemIndex', '.filter-manicura', '.isotope-filtersIndex [data-filterIndex]','data-filterIndex');//servicios para
    initIsotope('.isotope-containerIndex2', '.isotope-itemIndex2', '.filter-proximasIndex', '.isotope-filtersIndex [data-filterIndex]', 'data-filterIndex');
    initIsotope('.isotope-container', '.isotope-item', '*', '.isotope-filters [data-filter]', 'data-filter');//servicios y combos de servicios
});


});
var $grid='';
function initIsotope(container, item, filter, isotop_filter, data_filter){
    // Inicializar Isotope
    // console.log("initIsotope");
        $grid = $(container).isotope({
        itemSelector: item,  // Selector de los elementos filtrables
        layoutMode: 'masonry',
        fitRows: {
            columnWidth: item
        },         // Tipo de layout
        filter: filter
    });

    $grid.isotope('layout');
    // Manejar el clic en los filtros
    $(isotop_filter).on('click', function () {
        // console.log("clic isotopeIndex");

        var filterValue = $(this).attr(data_filter);
        // console.log(filterValue, "filtervalue");

        $grid.isotope({ filter: filterValue });
        $(isotop_filter).removeClass('filter-active');
        $(this).addClass('filter-active');
        if (data_filter === 'data-filter') {
            $(isotop_filter).removeClass('category_bgcolor--gray_PmXQU');
            $(this).addClass('category_bgcolor--gray_PmXQU');
        }
    });
}

//clic en la fleca modificar categoria
function ClicFlechaModificarCategoria(){
    $('.modifyCategory').on('click', function() {
        $grid.isotope('destroy');
        let nameCategori = $(this).data('name');
        let idCategori = $(this).data('index');

        // Asignar atributo con jquery asignar value con jquery
        $('#infoCategoriModify').attr('data-categori', idCategori);
        $('#infoCategoriModify').attr('data-categoriname', nameCategori);
        $('#nombreNuevaCategoriaModificada').val(nameCategori);

    });
}
ClicFlechaModificarCategoria();

//boton guardar modificar nombre categoria
let botonGurardarModificarCategoria = document.getElementById('submitModifyCategory');
if (botonGurardarModificarCategoria) {
    $(botonGurardarModificarCategoria).on('click', function() {
        let newNameCategory = document.getElementById('nombreNuevaCategoriaModificada').value;
        let id_categoriaModify = document.getElementById('infoCategoriModify').getAttribute('data-categori');
        //peticion ajax modificar categoria
        let changeCategory = 'change-category-name';
        let csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url: changeCategory,
            method: 'POST',
            data: {
                _token: csrfToken,
                category_id: id_categoriaModify,
                category_name: newNameCategory
            },
            success: function(response) {
                showAllServicesPlantilla("modificarCategoria");
            },
            error: function(xhr) {
                console.log('Error al actualizar el status', xhr);
            }
        });
    });
}
//boton guardar modificar nombre categoria
let botonEliminarCategoria = document.getElementById('submitDeleteCategory');
if (botonEliminarCategoria) {
    $(botonEliminarCategoria).on('click', function() {
        const confirmarEliminaCategoria = confirm('¿Deseas eliminar esta categoria?');
        if (confirmarEliminaCategoria) {
            let newNameCategory = document.getElementById('nombreNuevaCategoriaModificada').value;
            let id_categoriaEliminar = document.getElementById('infoCategoriModify').getAttribute('data-categori');
            //peticion ajax modificar categoria
            let deleteCategory = 'delete-category';
            let csrfToken = $('meta[name="csrf-token"]').attr("content");
            $.ajax({
                url: deleteCategory,
                method: 'POST',
                data: {
                    _token: csrfToken,
                    category_id: id_categoriaEliminar,
                    category_name: newNameCategory
                },
                success: function(response) {
                    if(response.eliminado === true){
                        $('#modifyCategoryModal').modal('hide');
                        showAllServicesPlantilla("eliminarCategoria");
                    }

                },
                error: function(xhr) {
                    console.log('Error al actualizar el status', xhr);
                }
            });
        }else{
            $('#modifyCategoryModal').modal('hide');
            alert('No se realizaron cambios.');
        }

    });
}
// //funcion que me devuelve el filter para las clases isotope
// function generarFilterClass(nombreCategoria) {
//     let filterClass = nombreCategoria.toLowerCase();

//     // Reemplazar los acentos por las vocales sin acento
//     filterClass = filterClass.replace(/[áàãâä]/g, 'a');
//     filterClass = filterClass.replace(/[éèêë]/g, 'e');
//     filterClass = filterClass.replace(/[íìîï]/g, 'i');
//     filterClass = filterClass.replace(/[óòôõö]/g, 'o');
//     filterClass = filterClass.replace(/[úùûü]/g, 'u');
//     filterClass = filterClass.replace(/[ñ]/g, 'n');

//     // Eliminar los espacios
//     filterClass = filterClass.replace(/ /g, '');

//     return filterClass;
// }

// //construye las tarjetas de las categorias en vista configuracion servicios
// function construirTarjetasCategorias(nombreCategoria, id_categoria) {
//     let htmlTarjetasCategorias = '';

//     // Convertir el nombre de la categoría a un formato adecuado para el filtro
//     let filterClass = generarFilterClass(nombreCategoria.toLowerCase());
//     htmlTarjetasCategorias = `
//     <div class="service-drag-mirror" data-filter=".filter-${filterClass}">
//         <div class="category_categoryName_iuwvt category_size--16-sb_ntrdG">
//             <div class="category_nameWrapper_wK6_H">
//                 <span class="d-flex justify-content-center b-icon icon-grab iconFont index_grabIcon_W4ymA" onclick="">
//                     <img id="" class="modifyNameCategory" src="${initUrlImage}public/storage/icon_config_lateral_menu/newCategory.svg" alt="nueva categoria" />
//                 </span>
//                 <div class="category_name_JjeDF">
//                     ${nombreCategoria}
//                 </div>
//             </div>
//             <span data-name="${nombreCategoria}" data-index="${id_categoria}" data-bs-toggle="modal" data-bs-target="#modifyCategoryModal" class="b-icon icon-arrow-right iconFont index_arrowIcon_aAlS4 modifyCategory" style="font-size: 26px;"></span>
//         </div>
//     </div>
//     `;

//     // Devolver el HTML generado para su posterior uso
//     return htmlTarjetasCategorias;
// }


//     // Devolver el HTML generado para su posterior uso
//     return htmllistaCategoriasDesplegable;
// }

// function construirTarjetasServicios(servicio) {
//     let htmlTarjetaServicio = '';
//     // Objeto con los datos del servicio
//     var serviceData = {
//         serviceId: servicio.id,
//         serviceName: servicio.nombre,
//         serviceCategoria: servicio.categoria,
//         serviceDescription: servicio.descripcion,
//         serviceHora: servicio.horaNewService,
//         serviceMinuto: servicio.minutosNewService,
//         serviceTipoPre: servicio.tipoPrecioNewService,
//         serviceDuration: servicio.duracion,
//         serviceColor: servicio.borderColor,
//         servicePrecio: servicio.precio
//     };

//     // Generar clase de filtro con la categoría
//     let filterClass2 = generarFilterClass(servicio.categoria.toLowerCase());

//     // Construir el HTML
//     htmlTarjetaServicio = `
// <div class="filter-${filterClass2} index_serviceListItem_frUaN isotope-item service-drag-mirror"  data-serviceModify="${JSON.stringify(serviceData)}">
//     <div class="service_serviceNameWrapper_PgZ_8">
//         <div style="border-color:${servicio.borderColor};" class="service_serviceBorder_FXobg">
//             <div class="service_serviceName_VOvl9 service_size--16_Twd1o">
//                  ${servicio.nombre}
//             </div>
//             <div class="service_serviceVariantDuration_HKxM3">
//                 <span class="duration">
//                 ${servicio.horaNewService > 0 ? `${servicio.horaNewService}h ${servicio.minutosNewService}min` : `${servicio.minutosNewService}min`}
//                 </span>
//             </div>
//         </div>
//         <div class="service_servicePrice_GTohf">
//              ${servicio.precio} €
//         </div>
//         <span class="b-icon icon-arrow-right iconFont index_arrowIcon_aAlS4" style="font-size: 26px;"></span>
//     </div>
// </div>
//     `;

//     // Retornar el HTML generado (puedes usarlo para insertarlo en el DOM)
//     return htmlTarjetaServicio;
// }



//funcion obtener todas categorias
function getAllCategories(){
    return new Promise(function(resolve, reject) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var url = "get-allCategories";
        // Hacer una petición AJAX al servidor
        $.ajax({
            url: url, // Ruta que definimos en web.php
            method: 'POST',
            data: {
                _token: csrfToken
            },
            success: function(response) {
                const categorias = response.categorias;
                // console.log(categorias, "categorias todas");
                // Ejecutar el callback con los datos
                resolve(response.categorias);
            },
            error: function(xhr) {
                console.error("Error en la solicitud AJAX");
            }
        });
    });
}
//funcion obtener todos servicios activos
function getAllServices(){
    return new Promise(function(resolve, reject) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var url = "get-allServices";
        // Hacer una petición AJAX al servidor
        $.ajax({
            url: url, // Ruta que definimos en web.php
            method: 'POST',
            data: {
                _token: csrfToken
            },
            success: function(response) {
                const servicios = response.services;
                // console.log(servicios, "categorias todas");
                // Ejecutar el callback con los datos
                resolve(response.services);
            },
            error: function(xhr) {
                console.error("Error en la solicitud AJAX");
            }
        });
    });
}

//función que cambia el estado del input checkbox verde y rojo
if(document.querySelector('switch')){
    document.querySelector('switch').addEventListener('click', function() {
        console.log("clic en toggle");

        this.checked = !this.checked; // Alterna el estado de "checked"
    });
}

//funcion para cargar las configuracines de base datos
function cargarConfiguraciones(){
    getConfiguracionReservas(function(configuraciones){
        showDiv('opciones_avanzadas2');
        console.log(configuraciones, "configuraciones desde clic tarjeta");
        if(configuraciones[0].confirmacion_automatica === 'si'){
            document.getElementById('toggle-3').checked = true;
        }
        else{
            document.getElementById('toggle-3').checked = false;
        }
       document.getElementById('uid-152-input_antelacionReserva').value = configuraciones[0].limite_tiempo_reserva;
       document.getElementById('uid-158-inputAntelacionReserva').value = configuraciones[0].antelacion_reserva;
       document.getElementById('uid-164-inputCambioFecha').value = configuraciones[0].cambio_fecha_reserva;

        //fondo y checket
        let divLimite_tiempo = document.querySelector('.liTiempoAntelacion div[data-antelacion="' + configuraciones[0].limite_tiempo_reserva + '"]');
        $(divLimite_tiempo).addClass('index_--selected_oUDGp index_--highlighted__3J43');

        let divAntelacion_reserva = document.querySelector('div[data-antelacion="' + configuraciones[0].antelacion_reserva + '"]');
        $(divAntelacion_reserva).addClass('index_--selected_oUDGp index_--highlighted__3J43');

        let divCambio_fecha= document.querySelector('div[data-antelacion="' + configuraciones[0].cambio_fecha_reserva + '"]');
        $(divCambio_fecha).addClass('index_--selected_oUDGp index_--highlighted__3J43');

    });
}
//función para cargar las configuracions reservas desde base datos a la vista
let configReservas = document.querySelector('.configuracionNegocioA');
if (configReservas) {
    $(configReservas).off('click').on('click', function(event) {
        event.preventDefault();
        console.log("config reservas");
        cargarConfiguraciones();

    });
}


//funcion para guardar las configuraciones de reservas
let botonGurardarconfiguracionReserva = document.querySelector('.savePreferenConfigReservas');
if (botonGurardarconfiguracionReserva) {
    $(botonGurardarconfiguracionReserva).off('click').on('click', function(event) {
        event.preventDefault();
        let tiempoReserva = document.getElementById('uid-152-input_antelacionReserva').value;
        let antelacionReserva = document.getElementById('uid-158-inputAntelacionReserva').value;
        let cambioFecha = document.getElementById('uid-164-inputCambioFecha').value;
        let confirmacionAutomatica = document.getElementById('toggle-3').checked;
        if(confirmacionAutomatica === true){
            confirmacionAutomatica = 'si';
        }else{
            confirmacionAutomatica = 'no';
        }
        console.log(confirmacionAutomatica, "confirmacionAutomatica");

        console.log("guardar configuraciones");
        let csrfToken = $('meta[name="csrf-token"]').attr("content");
                let url = "save-configuracionReservas";
                // Hacer una petición AJAX al servidor
                $.ajax({
                    url: url, // Ruta que definimos en web.php
                    method: 'POST',
                    data: {
                        _token: csrfToken, // Token CSRF para seguridad
                        confirmacion_automatica: confirmacionAutomatica,
                        limite_tiempo_reserva: tiempoReserva,
                        antelacion_reserva: antelacionReserva,
                        cambio_fecha_reserva: cambioFecha,

                    },
                    success: function(data) {
                        cargarConfiguraciones();
                        if(data.guardada === true){
                            let stylos = 'position: absolute;right: auto;top: 16px;z-index: 9;';
                            insertMessageResolAction('Configuracion guardada con éxito', '#Configuracion_administrator', stylos, 'ok');
                        }
                    },
                    error: function(xhr) {
                        // console.log('Error al obtener las horas', xhr);
                    }
                });
    });
}

// Función genérica para manejar los hover de los tooltips ayuda configurar reservas
function configurarTooltip(selector, divSelector, tooltipSelector) {
    if (document.querySelector(selector)) {
        $(selector).hover(
            function() {
                // Cuando se activa el hover (mouseenter)
                $(divSelector).addClass('b-hint_hintVisible__yt8c');
                $(tooltipSelector).addClass('b-tooltip_tooltipVisible_UHA7z');
            },
            function() {
                // Cuando se desactiva el hover (mouseleave)
                $(divSelector).removeClass('b-hint_hintVisible__yt8c');
                $(tooltipSelector).removeClass('b-tooltip_tooltipVisible_UHA7z');
            }
        );
    }
}

// Llamamos a la función para cada caso
configurarTooltip('.ayudaReservConfim', '.divAddFrist', '.tooltipAddFrist');
configurarTooltip('.ayudaAntelacion', '.divconqueAntelacion', '.toolTipConqueAntelacion');
configurarTooltip('.ayudaCuantaAntalacion', '.divCuantaAntelacion', '.tooltipCuantaAntelacion');
configurarTooltip('.ayudaModificarFecha', '.divModificarFecha', '.tooltipModificarFecha');


//SEGUNDA PANTALLA ABRIMOS TERCERA
let enlaces11 = document.querySelectorAll('.openConfigServicios_b a');
if (enlaces11) {
    enlaces11.forEach(function (enlace11) {
        // Clonamos el enlace para eliminar cualquier evento anterior
        let clonedEnlace = enlace11.cloneNode(true);
        enlace11.parentNode.replaceChild(clonedEnlace, enlace11);
        // Ahora trabajamos con el nuevo enlace sin eventos previos
        $(clonedEnlace).off('click').on('click', function(event) {
            event.preventDefault();
            let dataUrl = clonedEnlace.getAttribute('data-url2');
            if (dataUrl === 'servicios.combos') {

                let userAdminis = document.getElementById('User_administrator');
                // userAdminis.remove();
                cambiarURL('admin/dashboard/Configuracion_showAllServices');
                showDiv('show_all_service');
                // reloadPage();
                // cambiarURL('admin/dashboard/Configuracion_showAllServices');
                window.addEventListener('load', () => {

                    showDiv('show_all_service');
                  });
                // showDiv('show_all_service');

                //SI CLICA EN BOTÓN NEGRO
                showModalAddservice();
                //ASIGNAMOS EVENTOS AL MODAL CREAR NEW SERVICE, CATEGORY, COMBO
                asignarEventoModalNewService();
            }
        });
    });
}
showModalAddservice();
asignarEventoModalNewService();
//OBTENER HORAS AL CLICAR EN UN DÍA Y LLAMA A "mostrarHoras()"
function storageNewCategory() {
    let nombreNuevaCategoria = document.querySelector("input[name='nombreCategoria']").value;
    let imagenInput = document.querySelector("input[name='imagenCategoria']").files[0]; // Obtener el archivo de imagen
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var url = "storage-categoria";

    // Crear una nueva instancia de FormData
    let formData = new FormData();
    formData.append('_token', csrfToken);  // Añadir el token CSRF
    formData.append('nombreCategoria', nombreNuevaCategoria);  // Añadir el nombre de la categoría
    formData.append('imagen', imagenInput);  // Añadir la imagen seleccionada

    // Hacer la petición AJAX para enviar los datos
    $.ajax({
        url: url, // Ruta que definimos en web.php
        method: 'POST',
        data: formData,
        processData: false,  // No procesar los datos
        contentType: false,  // No establecer el tipo de contenido
        success: function(data) {
            if(data.categoriaCreada) {
                alert("Nueva categoria creada con éxito: " + data.nuevaCategoria);
                let contenedorCategorias = document.querySelector('.contentAllCategories');
                let urlImagenIconCategory = contenedorCategorias.getAttribute('data-urlImage');
                $(contenedorCategorias).append(`
                    <div class="service-drag-mirror">
                        <div class="category_bgcolor--white_PU_d0 category_categoryName_iuwvt category_size--16-sb_ntrdG">
                            <div class="category_nameWrapper_wK6_H">
                                <span class="d-flex justify-content-center b-icon icon-grab iconFont index_grabIcon_W4ymA">
                                    <img class="modifyNameCategory" src="${urlImagenIconCategory}" alt="nueva categoria" />
                                </span>
                                <div class="category_name_JjeDF">
                                    ${data.nuevaCategoria}
                                </div>
                            </div>
                            <span class="b-icon icon-arrow-right iconFont index_arrowIcon_aAlS4" style="font-size: 26px;"></span>
                        </div>
                    </div>
                `);
            }
        },
        error: function(xhr) {
            console.log('Error al guardar el nombre de la categoria', xhr);
        }
    });
}

    document.getElementById('imagenCategoria').addEventListener('change', function(event) {
        const file = event.target.files[0]; // Obtener el archivo seleccionado
        const previewImage = document.getElementById('preview-image'); // Elemento de la imagen para la vista previa
        const plusSign = document.getElementById('plus-sign'); // Elemento del signo "+"

        if (file) {
            const reader = new FileReader();  // Crear un objeto FileReader

            reader.onload = function(e) {
                // Cambiar la fuente de la imagen
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';  // Mostrar la imagen
                plusSign.style.display = 'none';  // Ocultar el signo "+"
            };

            reader.readAsDataURL(file);  // Leer el archivo como URL de datos
        } else {
            previewImage.style.display = 'none';  // Si no hay archivo, ocultar la vista previa
            plusSign.style.display = 'block';  // Volver a mostrar el signo "+"
        }
    });


var categoriaSeleccionadaNewServiceInput = document.getElementById('categoriaSeleccionadaNewServiceInput');
var colorSeleccionadoNewService;

//PONE CHECK CATEGORIA SELECCIONADA ASIGNA INPUT CATEGORIA
function categoriaSeleccionadaNewService(){
    let categoria;
    let visualizadorCategroria = document.querySelector('.styles_slotLeft_k29NgCategorias');
    //ponemos el chek
    $('.contenedorCategorias .list').off('click').on('click', '.index_defaultItem_pKlHs', function(event) {
        event.preventDefault();
        // console.log("holaaaaa");
        // Primero, quitamos la clase .index_--selected_oUDGp del elemento que la tiene index_--highlighted__3J43
        $('.index_--selected_oUDGp').removeClass('index_--selected_oUDGp');
        $('.index_--highlighted__3J43').removeClass('index_--highlighted__3J43');

        // Luego, añadimos la clase al div que fue clicado
        $(this).addClass('index_--selected_oUDGp index_--highlighted__3J43');
        categoria = $(this).attr('data-category');
        // console.log(categoria, "categroai");
    // ponemos el valor categoria que se vea
    visualizadorCategroria.textContent = categoria;
    console.log("categoria, ", categoria);

    //asignamos el valor al input hidden categoria
    categoriaSeleccionadaNewServiceInput.value = categoria;
    categoriaSeleccionadaNewServiceInput.dispatchEvent(new Event('input'));
    cerrarModalCategorias('.contenedorCategorias');
    });
}

function comprobarHoraFinMayorQueInicio(slotHoraInicio, contenedorMensa, valorSeleccionado, contenedorBordeWarning, slotHoraFin, mostrarAlert = true){
    let mensaje = `
        <p style="margin:0px" class="index_message_IeJl5" data-testid="error-input-message">La hora de fin debe ser mayor que hora inicio</p>
    `;

    let botonAniadir = document.getElementById('uid-319-inputAniadirServicio');
    let contenedorMensajeAlert = document.querySelector(contenedorMensa);
    const horaInicio = document.querySelector(slotHoraInicio).textContent;
    // Convertir las horas a objetos Date para compararlas fácilmente
    const [horasInicio, minutosInicio] = horaInicio.split(':').map(Number);
    const [horasFin, minutosFin] = valorSeleccionado.split(':').map(Number);
    const fechaInicio = new Date();
    fechaInicio.setHours(horasInicio, minutosInicio, 0);
    const fechaFin = new Date();
    fechaFin.setHours(horasFin, minutosFin, 0);

    if (fechaFin <= fechaInicio) {
        $(contenedorMensajeAlert).empty();
        $(contenedorMensajeAlert).append(mensaje);
        document.querySelector(contenedorBordeWarning).classList.add('border-warning2');
        // Añadir 5 minutos a la hora de inicio y actualizar slotHoraFin
        let nuevaFechaFin = new Date(fechaInicio.getTime() + 5 * 60000); // 5 minutos en milisegundos
        let horasFormateadas = nuevaFechaFin.getHours().toString().padStart(2, '0');
        let minutosFormateados = nuevaFechaFin.getMinutes().toString().padStart(2, '0');
        document.querySelector(slotHoraFin).textContent = `${horasFormateadas}:${minutosFormateados}`;
        // if(contenedorMensa === '.alert021'){
        //     document.getElementById('uid-377-inputEditReserv').disabled = true;
        //     document.getElementById('uid-377-input').disabled = true;
        // }else if(contenedorMensa === '.alert022'){
        //     botonAniadir.disabled = true;
        //     let miDiv = document.querySelector('.reservCobrarFooterInfo');
        //     let botones = miDiv.getElementsByTagName('button');
        //     for (let boton of botones) {
        //         boton.disabled = true;
        //     }
        // }
        if(mostrarAlert){
            alert("La hora fin debe superar a al hora inicio.");
        }
    }else{
        $(contenedorMensajeAlert).empty();
        document.querySelector(contenedorBordeWarning).classList.remove('border-warning2');
        // if(contenedorMensa === '.alert021'){
        //     document.getElementById('uid-377-inputEditReserv').disabled = false;
        //     document.getElementById('uid-377-input').disabled = false;
        // }else if(contenedorMensa === '.alert022'){
        //     botonAniadir.disabled = false;
        //     let miDiv = document.querySelector('.reservCobrarFooterInfo');
        //     let botones = miDiv.getElementsByTagName('button');
        //     for (let boton of botones) {
        //         boton.disabled = false;
        //     }
        // }
    }
}

function comprobarHoraInicioMenorQueFin(valorSeleccionado, contenedorMensa, slotHoraFin, contenedorBordeWarning, mostrarAlert = true) {
    let mensaje = `
        <p style="margin:0px" class="index_message_IeJl5" data-testid="error-input-message">La hora de inicio debe ser menor que hora fin</p>
    `;

    let botonAniadir = document.getElementById('uid-319-inputAniadirServicio');
    let contenedorMensajeAlert = document.querySelector(contenedorMensa);
    const horaFin = document.querySelector(slotHoraFin).textContent;

    // Convertir las horas a objetos Date para compararlas fácilmente
    const [horasInicio, minutosInicio] = valorSeleccionado.split(':').map(Number);
    const [horasFin, minutosFin] = horaFin.split(':').map(Number);
    const fechaInicio = new Date();
    fechaInicio.setHours(horasInicio, minutosInicio, 0);
    const fechaFin = new Date();
    fechaFin.setHours(horasFin, minutosFin, 0);

    if (fechaInicio >= fechaFin) {
        // Añadir 5 minutos a la hora de inicio y actualizar slotHoraFin
    let nuevaFechaFin = new Date(fechaInicio.getTime() + 5 * 60000); // 5 minutos en milisegundos
    let horasFormateadas = nuevaFechaFin.getHours().toString().padStart(2, '0');
    let minutosFormateados = nuevaFechaFin.getMinutes().toString().padStart(2, '0');
    document.querySelector(slotHoraFin).textContent = `${horasFormateadas}:${minutosFormateados}`;
        $(contenedorMensajeAlert).empty();
        $(contenedorMensajeAlert).append(mensaje);
        document.querySelector(contenedorBordeWarning).classList.add('border-warning2');

        // if(contenedorMensa === '.alert021'){
        //     document.getElementById('uid-377-inputEditReserv').disabled = true;
        //     document.getElementById('uid-377-input').disabled = true;
        // } else if(contenedorMensa === '.alert022'){
        //     botonAniadir.disabled = true;
        //     let miDiv = document.querySelector('.reservCobrarFooterInfo');
        //     let botones = miDiv.getElementsByTagName('button');
        //     for (let boton of botones) {
        //         boton.disabled = true;
        //     }
        // }
        if(mostrarAlert){
            alert("La hora fin debe superar a al hora inicio.");
        }
    } else {
        $(contenedorMensajeAlert).empty();
        document.querySelector(contenedorBordeWarning).classList.remove('border-warning2');

        // if(contenedorMensa === '.alert021'){
        //     document.getElementById('uid-377-inputEditReserv').disabled = false;
        //     document.getElementById('uid-377-input').disabled = false;
        // } else if(contenedorMensa === '.alert022'){
        //     botonAniadir.disabled = false;
        //     let miDiv = document.querySelector('.reservCobrarFooterInfo');
        //     let botones = miDiv.getElementsByTagName('button');
        //     for (let boton of botones) {
        //         boton.disabled = false;
        //     }
        // }
    }
}


// Función genérica para seleccionar un elemento, asignar valor y cerrar modal
function seleccionarElemento(contenedor, input_id, claseItem, divVisualicer = null) {
    // console.log("seleccionarElemento", contenedor, "contenefor");

    let input = document.getElementById(input_id);
    let divVisualizador = document.querySelector(divVisualicer);
    // console.log(divVisualicer, "visualicer");

    // console.log(divVisualizador, "visualizador");

    $(contenedor + ' .list').off('click').on('click', claseItem, function(event) {
        event.preventDefault();
        // console.log(this,"this");

        // Eliminar selección previa
        $(contenedor + ' .index_--selected_oUDGp').removeClass('index_--selected_oUDGp');
        $(contenedor + ' .index_--highlighted__3J43').removeClass('index_--highlighted__3J43');

        // Añadir la selección actual
        $(this).addClass('index_--selected_oUDGp index_--highlighted__3J43');

        // Obtener el valor del atributo data-time y asignarlo al input
        let valorSeleccionado = $(this).attr('data-time');
        // console.log(valorseleccionado, "valorseleccionado");

        //inhabilitar precio si procede
        let inputPrecio = document.getElementById('precioServicio');
        let divPrecio = document.querySelector('.divPrecio');
        if(contenedor === '.contenedorTipoPrecio'){
            if(valorSeleccionado === 'No mostrar' ||
                valorSeleccionado === 'Gratis' ||
                valorSeleccionado === 'Variable'){
                inputPrecio.disabled = true; // Deshabilitar el input
                inputPrecio.value = ''; // Opcional: limpiar el valor del input
                inputPrecio.style.backgroundColor = '#f4f4f4';
                divPrecio.classList.add('noHoverBlack');
            } else {
                inputPrecio.disabled = false; // Habilitar el input si no cumple las condiciones
                inputPrecio.style.backgroundColor = 'white';
                divPrecio.classList.remove('noHoverBlack');
            }
        }
        if (divVisualizador === null &&
            (contenedor === '.contenedorTiempoAntelacion' ||
             contenedor === '.contenedorAntelacionReserva' ||
             contenedor === '.contenedorCambioFechaReserva')) {

            document.getElementById(input_id).value = $(this).attr('data-antelacion');
        } else{
              // console.log(valorSeleccionado, "seleccionado");

        // Asignar el valor al input y disparar el evento 'input'
        input.value = valorSeleccionado;
        divVisualizador.textContent = valorSeleccionado;
        }

        input.dispatchEvent(new Event('input'));

        // Cerrar el modal correspondiente
        cerrarModalCategorias(contenedor);
        if (contenedor.trim() == '.contenedorHorasInicioCalendar' || contenedor.trim() == '.contenedorHorasFinCalendar') {
            if (contenedor.trim() == '.contenedorHorasInicioCalendar'){
                comprobarHoraInicioMenorQueFin(valorSeleccionado, '.alert023', '.slotHoraFinCorbrarServicioCalendar', '.contenedorHorasFinCalendarclass');
            }else{
                comprobarHoraFinMayorQueInicio('.slotHorasCobrarServicioCalendar', '.alert023', valorSeleccionado, '.contenedorHorasFinCalendarclass', '.slotHoraFinCorbrarServicioCalendar');
            }
            if(comprobarSiEmpleadoAsignadoNewReservCalendar('.slotEmpleadoAddInicioCalendar')){
                let fecha = document.getElementById('datePikerfechaCitaInfo22').getAttribute('data-datepiker');
                if (contenedor.trim() == '.contenedorHorasInicioCalendar'){
                    let horaInicio = document.querySelector('.slotHorasCobrarServicioCalendar').textContent;
                    let start = formatFechaConHora(fecha, horaInicio);
                    cambiarHoraInicioEvento(eventIdChangeCalendar, start);
                }else{
                    let horaFin = document.querySelector('.slotHoraFinCorbrarServicioCalendar').textContent;
                    let end = formatFechaConHora(fecha, horaFin);      // Fecha y hora de finalización
                    cambiarHoraFinEvento(eventIdChangeCalendar, end);
                }
            }
        }

        if (contenedor.trim() == '.contenedorHorasInicioAddCalendar' || contenedor.trim() == '.contenedorHorasFinAddCalendar') {
            if (contenedor.trim() == '.contenedorHorasInicioAddCalendar'){
                comprobarHoraInicioMenorQueFin(valorSeleccionado, '.alert024', '.slotHoraFinCorbrarServicioAddCalendar', '.contenedorHorasFinAddCalendarclass');
            }else{
                comprobarHoraFinMayorQueInicio('.slotHorasCobrarServicioAddCalendar', '.alert024', valorSeleccionado, '.contenedorHorasFinAddCalendarclass', '.slotHoraFinCorbrarServicioAddCalendar');
            }
            if(comprobarSiEmpleadoAsignadoNewReservCalendar('.slotEmpleadoAddInicioCalendarAdd')){
                let fecha2 = document.getElementById('datePikerfechaCitaInfo22').getAttribute('data-datepiker');
                if (contenedor.trim() == '.contenedorHorasInicioAddCalendar'){
                    let horaInicio2 = document.querySelector('.slotHorasCobrarServicioAddCalendar').textContent;
                    let start2 = formatFechaConHora(fecha2, horaInicio2);
                    cambiarHoraInicioEvento(eventIdChangeCalendar, start2);
                }else{
                    let horaFin2 = document.querySelector('.slotHoraFinCorbrarServicioAddCalendar').textContent;
                    let end2 = formatFechaConHora(fecha2, horaFin2);      // Fecha y hora de finalización
                    cambiarHoraFinEvento(eventIdChangeCalendar, end2);
                }
            }
        }

        if (contenedor.trim() == '.contenedorHorasInicio' || contenedor.trim() == '.contenedorHorasFin') {
            if (contenedor.trim() == '.contenedorHorasInicio'){
                comprobarHoraInicioMenorQueFin(valorSeleccionado, '.alert022', '.slotHoraFinCorbrarServicio', '.contenedorHorasFinClass', false);
            }else{
                comprobarHoraFinMayorQueInicio('.slotHorasCobrarServicio', '.alert022', valorSeleccionado, '.contenedorHorasFinClass', '.slotHoraFinCorbrarServicio', false);
            }
            if(comprobarSiEmpleadoAsignadoNewReservCalendar('.slotEmpleadoAddInicio')){
                let fecha2 = document.querySelector('.fechaCitaInfo').getAttribute('data-datepiker');
                if (contenedor.trim() == '.contenedorHorasInicio'){
                    let horaInicio2 = document.querySelector('.slotHorasCobrarServicio').textContent;
                    let start2 = formatFechaConHora(fecha2, horaInicio2);
                    cambiarHoraInicioEvento(eventIdChangeCalendar, start2);
                }else{
                    let horaFin2 = document.querySelector('.slotHoraFinCorbrarServicio').textContent;
                    let end2 = formatFechaConHora(fecha2, horaFin2);      // Fecha y hora de finalización
                    cambiarHoraFinEvento(eventIdChangeCalendar, end2);
                }
            }
        }
        if (contenedor.trim() == '.contenedorHorasInicioAdd' || contenedor.trim() == '.contenedorHorasFinAdd') {
            // if (contenedor.trim() == '.contenedorHorasInicioAdd'){
            //     comprobarHoraInicioMenorQueFin(valorSeleccionado, '.alert021', '.slotHoraFinCorbrarServicioAdd', '.contenedorHorasFinAddclass', false);
            // }else{
            //     comprobarHoraFinMayorQueInicio('.slotHorasCobrarServicioAdd', '.alert021', valorSeleccionado, '.contenedorHorasFinAddclass', '.slotHoraFinCorbrarServicioAdd', false);
            // }
            if(comprobarSiEmpleadoAsignadoNewReservCalendar('.slotEmpleadoAdd ')){
                console.log("EMPLEADO ASIGNADO");

                let fecha2 = document.querySelector('.fechaCitaInfo').getAttribute('data-datepiker');
                console.log(fecha2," fecha cli hora inicio");
                if(!fecha2){
                    fecha2 = document.querySelector('.fechaCitaInfo22').getAttribute('data-datepiker');
                    console.log("NO HAY FECHA 2");

                }
                if (contenedor.trim() == '.contenedorHorasInicioAdd'){
                    let horaInicio2 = document.querySelector('.slotHorasCobrarServicioAdd').textContent;
                    let start2 = formatFechaConHora(fecha2, horaInicio2);
                    cambiarHoraInicioEvento(eventIdChangeCalendar, start2);
                }else{
                    let horaFin2 = document.querySelector('.slotHoraFinCorbrarServicioAdd').textContent;
                    let end2 = formatFechaConHora(fecha2, horaFin2);      // Fecha y hora de finalización
                    cambiarHoraFinEvento(eventIdChangeCalendar, end2);
                }
            }
        }


    });
}

function getFechaDos(idDatePiker){
    let fecha2 =  document.getElementById(idDatePiker).getAttribute('data-datepiker');
    return fecha2;
}


//comprueba si hay empleado seleccionado
function comprobarSiEmpleadoAsignadoNewReservCalendar(slotNombre){
    let empleadoNombre='';
    if(document.querySelector(slotNombre)){
        empleadoNombre = document.querySelector(slotNombre).textContent;
        //si hay nombre de empleado
        if(empleadoNombre.trim() !== 'Selecciona Empleado'){
            let id_empleado = document.querySelector(slotNombre).getAttribute('data-empleid');
            return id_empleado;
        }else{
            return false;
        }
    }
}


// Inicializar las funciones específicas
seleccionarElemento('.contenedorHoras', 'horaNewServiceInput', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgHoras');
seleccionarElemento('.contenedorMinutos', 'minutosNewServiceInput', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgMinutos');
seleccionarElemento('.contenedorTipoPrecio', 'tipoPrecioNewServiceInput', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgTipoPrecio');

seleccionarElemento('.contenedorHorasInicio', 'horaNewServiceInputInicio', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgHorasInicio');
seleccionarElemento('.contenedorHorasFin', 'horaNewServiceInputFin', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgHorasFin');

seleccionarElemento('.contenedorHorasInicioAdd', 'horaNewServiceInputInicioAdd', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgHorasInicioAdd');
seleccionarElemento('.contenedorHorasFinAdd', 'horaNewServiceInputFinAdd', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgHorasFinAdd');
seleccionarElemento('.contenedorEmpleados', 'uid-1345-input', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgEmpleadoAdd');
seleccionarElemento('.contenedorEmpleadosInicio', 'uid-inicio-input', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgEmpleadoAddInicio');

seleccionarElemento('.contenedorEmpleadosInicioCalendar', 'uid-inicio-inputCalendar', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgEmpleadoAddInicioCalendar');
seleccionarElemento('.contenedorEmpleadosInicioCalendarAdd', 'uid-inicio-inputCalendarAdd', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgEmpleadoAddInicioCalendarAdd');


seleccionarElemento('.contenedorHorasInicioAddCalendar', 'horaNewServiceInputInicioAddCalendar', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgHorasInicioAddCalendar');
seleccionarElemento('.contenedorHorasFinAddCalendar', 'horaNewServiceInputFinAddCalendar', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgHorasFinAddCalendar');
seleccionarElemento('.contenedorHorasInicioCalendar', 'horaNewServiceInputInicioCalendar', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgHorasInicioCalendar');
seleccionarElemento('.contenedorHorasFinCalendar', 'horaNewServiceInputFinCalendar', '.index_defaultItem_pKlHs', '.styles_slotLeft_k29NgHorasFinCalendar');
seleccionarElemento('.contenedorTiempoAntelacion', 'uid-152-input_antelacionReserva', '.index_defaultItem_pKlHs');
seleccionarElemento('.contenedorAntelacionReserva', 'uid-158-inputAntelacionReserva', '.index_defaultItem_pKlHs');
seleccionarElemento('.contenedorCambioFechaReserva', 'uid-164-inputCambioFecha', '.index_defaultItem_pKlHs');


//ABRE MODAL PARA SELECCIONAR COLOR dentro PANTALLA 4
function openModalSelectColor() {
    let backgrounBlack  = document.querySelector('.contenedorColores');
        if (backgrounBlack.style.display === 'none' || backgrounBlack.style.display === '') {
            backgrounBlack.style.display = 'flex';  // Mostrar
        } else {
            backgrounBlack.style.display = 'none';  // Ocultar
        }
        colorSeleccionadoNewService();
}

function colorSeleccionadoNewService(){
    let visualizadorColorElegido = document.querySelector('.styles_slotLeft_k29NgColores');
    let randomColorUrl = document.querySelector('.styles_slotLeft_k29NgColores').getAttribute('data-random-color-url');
    let contenedorColores = document.querySelector('.contenedorColores');
    let inputColorSeleccionado = document.getElementById('colorSeleccionadaNewServiceInput');
    let color;
    // Seleccionamos los spans que contienen los colores
    let colorSpans = document.querySelectorAll('.color-picker-modal_serviceColorTile_mt88Y');
    colorSpans.forEach(function (span){
        span.addEventListener('click', function(){
            // console.log(span, 'span');
            color = span.getAttribute('data-color');
            // Eliminar cualquier ícono de check existente de todos los spans
            colorSpans.forEach(function (s) {
                let existingIcon = s.querySelector('.icon-tick');
                if (existingIcon) {
                    existingIcon.remove();  // Eliminamos el ícono si existe
                }
            });
                // Añadir el ícono de check solo al span clickeado (spanCheck)
            span.innerHTML += `
                <span class="color-picker-modal_tickIcon_Zazmf b-icon icon-tick iconFont" style="font-size: 40px;"></span>
            `;
            if (contenedorColores) {
                contenedorColores.style.display = 'none';  // Ocultar el contenedor
            }
            if(color === 'randomColor'){
                visualizadorColorElegido.innerHTML=`
                <img data-color="${color}" width="24px" style="height: 24px;" class="b-icon_img_I0kuC index_colorPicker_dCcsj" src="${randomColorUrl}" alt="colores">
                `;
            }else{
                visualizadorColorElegido.innerHTML= `
                    <div data-color="${color}" class="index_colorPicker_dCcsj" style="background-color: ${color};"></div>
                `;
            }
            inputColorSeleccionado.value = color;
            inputColorSeleccionado.dispatchEvent(new Event('input'));
        });
    });
}
//RESETEAR FORMULARIO CREAR NUEVO SERVICIO
function resertFormNewService(){
   let visualizadorColorElegido = document.querySelector('.styles_slotLeft_k29NgColores');
   let randomColorUrl = 'http://localhost/laravel/salon-manicura/public/storage/colors_option/random-color.svg';
   visualizadorColorElegido.setAttribute('data-random-color-url', randomColorUrl);
    visualizadorColorElegido.innerHTML=`
    <img data-color="randomColor" width="24px" style="height: 24px;" class="b-icon_img_I0kuC index_colorPicker_dCcsj" src="${randomColorUrl}" alt="colores">
    `;

    document.getElementById('nombreServicio').value='';

    document.querySelector('.styles_slotLeft_k29NgCategorias').textContent='No categorizado';
    document.getElementById('textAreaDescripcionService').value = '';
    document.getElementById('horaNewServiceInput').value='0h';
    document.querySelector('.styles_slotLeft_k29NgHoras').textContent='0h';
    document.querySelector('.styles_slotLeft_k29NgMinutos').textContent='30min';
    document.getElementById('minutosNewServiceInput').value='30min';
    document.querySelector('.styles_slotLeft_k29NgTipoPrecio ').textContent='Fijo';
    document.getElementById('tipoPrecioNewServiceInput').value='Fijo';
    document.getElementById('precioServicio').value='';
    deleteImageTemporaly();
    $('.filepond--list').empty();
    $('.index_--selected_oUDGp').removeClass('index_--selected_oUDGp');
    $('.index_--highlighted__3J43').removeClass('index_--highlighted__3J43');

}


//INICIALIZA LOS CONTADORES DE PALABRAS
function initCountLeathersTextArea(){
    contadorPalabras('#textAreaDescripcionService', '.chars-counterDescriptionService', 640);
    contadorPalabras('#nombreServicio', '.chars-counter-nameService', 50);
}

//TERCERA PANTALLA MANDAMOS CARGAR LA CUARTA (el formulario)
function asignarEventoModalNewService() {
    let enlacesCuarta = document.querySelectorAll('.add-button_button_U2OQn');
    if (enlacesCuarta) {
        enlacesCuarta.forEach(function (enlaceCuarta) {
            // Verifica si el enlace ya tiene un listener registrado
            $(enlaceCuarta).off('click').on('click', function(event) {
                event.preventDefault();
                let dataUrl = enlaceCuarta.getAttribute('data-url3');
                if (dataUrl === 'add.sevice') {
                    abrirCerrarModalAniadirServico();
                    showDiv('createNew_service');
                    changeBotonModifyCreateService('.botonModificarServicio', '.botonCrearServicio');
                    changeTitleModifyCreateService('.modificarServicioTitle', '.aniadirServicioTitle')
                    cambiarURL('admin/dashboard/Configuracion_createService');
                }
                else if(dataUrl === 'add.category'){
                    abrirCerrarModalAniadirServico();
                    abrirModal('newCategoryModal');
                }
            });
        });
    }
}

//FLECHA ATRA DE MODIFICAR SERVICIO
let modifyServiceBack = document.querySelector('.salirDeModificarServicio');
$(modifyServiceBack).off('click').on('click', function(event) {
    event.preventDefault();
    resertFormNewService();


    showDiv('show_all_service');
    cambiarURL('admin/dashboard/Configuracion_showAllServices');
    initIsotope('.isotope-container', '.isotope-item', '*', '.isotope-filters [data-filter]', 'data-filter');//servicios y combos de servicios

});
//quitar palomita colorSeleccionado
function quitarPalomitaColorSeleccionado(){
    let colorSpans = document.querySelectorAll('.color-picker-modal_serviceColorTile_mt88Y');
    colorSpans.forEach(function (s) {
        let existingIcon = s.querySelector('.icon-tick');
        if (existingIcon) {
            existingIcon.remove();  // Eliminamos el ícono si existe
        }
    });
}

//ELIMINA LAS IMAGENES SELECCIONADAS
function resetImagenUpload(){
    deleteImageTemporaly();
    $('.filepond--list').empty();
}

//CLICA BOTON CANCELAR MODIFICACIÓN SERVICIO VUELVE A SHOW ALL SERVICES
var botonCancelarModificarServicio = document.getElementById('cancelModifyService');
if (botonCancelarModificarServicio) {
    botonCancelarModificarServicio.onclick = function(event){
        event.preventDefault();
       quitarPalomitaColorSeleccionado();
       resetImagenUpload();
        showDiv('show_all_service');
     }
}

//MODIFICAR SERVICIO AL CLICAR EN FLECHA
function modificarServicioClicarFlecha(){
    let divServicios = document.querySelectorAll('.index_serviceListItem_frUaN');
    divServicios.forEach(function (divServicio){
        $(divServicio).off('click').on('click', function(event) {
            event.preventDefault();
            let serviceData = JSON.parse(divServicio.getAttribute('data-serviceModify'));
            // console.log(serviceData.serviceColor, "serviceColor");
            quitarPalomitaColorSeleccionado();
            resetImagenUpload();

            showDiv('createNew_service');
            changeBotonModifyCreateService('.botonCrearServicio', '.botonModificarServicio');
            changeTitleModifyCreateService('.aniadirServicioTitle', '.modificarServicioTitle')
            // cambiarURL('admin/dashboard/Configuracion_createService');
            addDataModifyService(serviceData);
        });
    });
}
modificarServicioClicarFlecha();

//AÑADE LOS DATOS AL FORMULARIO MODIFICAR SERVICIO
function addDataModifyService(serviceData){
    let divColor = document.querySelector('.styles_slotLeft_k29NgColores');
    let  inputColor = document.querySelector("input[name='colorServicio']");
    let  inputNombreServicio = document.querySelector("input[name='nombreServicio']");
    let categoriaSeleccionadaNewServiceInputModify = document.getElementById('categoriaSeleccionadaNewServiceInput');
    let visualizadorCategroria = document.querySelector('.styles_slotLeft_k29NgCategorias');
    const textAreaDescripcionService = document.getElementById('textAreaDescripcionService');
    let  inputHoraServicio = document.querySelector("input[name='horaNewService']");
    let visualizadorHora = document.querySelector('.styles_slotLeft_k29NgHoras');
    let  inputMinutoServicio = document.querySelector("input[name='minutosNewService']");
    let visualizadorMinutos = document.querySelector('.styles_slotLeft_k29NgMinutos');
    let inputTipoPrecio = document.querySelector("input[name='tipoPrecioNewService']");
    let visualizadortipoPrecio = document.querySelector('.styles_slotLeft_k29NgTipoPrecio');
    let inputPrecio = document.querySelector("input[name='precioServicio']");
    let inputIdServicio = document.querySelector("input[name='id_serviceModify']");
    if(divColor){
        $(divColor).empty();
        $(divColor).append(`
            <div data-color="${serviceData.serviceColor}" class="index_colorPicker_dCcsj" style="background-color: ${serviceData.serviceColor};"></div>
        `);
        inputColor.value = serviceData.serviceColor;
        inputNombreServicio.value = serviceData.serviceName;
        // inputNombreServicio.dispatchEvent(new Event('input'));
        // divColor.style.backgroundColor = serviceData.serviceColor; horaNewService

        visualizadorCategroria.textContent = serviceData.serviceCategoria;

        //asignamos el valor al input hidden categoria
        categoriaSeleccionadaNewServiceInputModify.value = serviceData.serviceCategoria;
        categoriaSeleccionadaNewServiceInputModify.dispatchEvent(new Event('input'));
        textAreaDescripcionService.value = serviceData.serviceDescription;
        inputHoraServicio.value = serviceData.serviceHora;
        visualizadorHora.textContent = serviceData.serviceHora;
        inputMinutoServicio.value = serviceData.serviceMinuto;
        visualizadorMinutos.textContent = serviceData.serviceMinuto;
        inputTipoPrecio.value = serviceData.serviceTipoPre;
        visualizadortipoPrecio.textContent = serviceData.serviceTipoPre;
        inputPrecio.value = serviceData.servicePrecio;
        inputIdServicio.value = serviceData.serviceId;
    }
}
//AÑADE AL INPUT ACCION QUE ES SI CREAR BORRAR O MODIFICAR
function setAction(action) {
    let loader = document.querySelector('#loaderSperaAdministratorAll');
    loader.classList.remove('d-none');
    // Establece el valor de la acción según el botón que se presionó
    document.getElementById('actionType').value = action;
}

//CLIC EN CREAR SERVICIO SIN RECARGAR PÁGINA
$('#formCreateNewService').on('submit', function(e) {
    e.preventDefault(); // Evita que el formulario se envíe de manera tradicional

    // Creamos un objeto FormData para enviar los datos, incluyendo archivos
    var formData = new FormData(this);
    let csrfToken = $('meta[name="csrf-token"]').attr("content");
    // Agregamos el CSRF token (aunque lo haya en el formulario, para asegurarnos de que se incluya)
    formData.append('_token', csrfToken);

    $.ajax({
    url: $(this).attr('action'), // Usamos la acción del formulario
    type: $(this).attr('method'), // Usamos el método del formulario

    data: formData, // Enviamos los datos del formulario
    processData: false, // Evita que jQuery procese los datos
    contentType: false, // Evita que jQuery establezca el Content-Type (important para multipart)
    success: function(response) {
        showAllServicesPlantilla();

    },
    error: function(xhr, status, error) {
        // Manejo de errores
        console.log('Error: ' + error);
    }
    });
});

function showAllServicesPlantilla(action = null){
    fetch('show-all-services')
    .then(response => response.text())
    .then(data => {
        let mensaje='';
        document.getElementById('show_all_service').innerHTML = data;
        modificarServicioClicarFlecha();
        showDiv('show_all_service');
        cambiarURL('admin/dashboard/Configuracion_showAllServices');
        let stylos = 'position: absolute;right: 5rem;top: 16px;z-index: 9;';
        if(action === null){
            if(document.getElementById('actionType').value === 'create'){
                mensaje= 'Nuevo servicio creado con éxito';
            }else if(document.getElementById('actionType').value === 'modify'){
                mensaje= 'Servicio modificado con éxito';
            }else if(document.getElementById('actionType').value === 'delete'){
                mensaje ='Servicio eliminado con éxito';
            }
        }else{
            if(action === 'modificarCategoria'){
                mensaje = 'Categoria modificada con éxito';
            }else if(action === 'eliminarCategoria'){
                mensaje = 'Categoria eliminada con éxito';
            }
        }

        insertMessageResolAction(mensaje, '#Configuracion_administrator', stylos, 'ok');
        initIsotope('.isotope-container', '.isotope-item', '*', '.isotope-filters [data-filter]', 'data-filter');//servicios y combos de servicios
        showModalAddservice();
        clicFlechaAtrasServiciosyCombos();
        let loader = document.querySelector('#loaderSperaAdministratorAll');
        loader.classList.add('d-none');
    })
    .catch(error => console.error('Error al cargar los servicios:', error));
}

//MODIFICA LOS BOTONES PARA CREAR SERVICIO O MODIFICAR SERVICIO
function changeBotonModifyCreateService(botonHide_class, botonShow_class){
    // console.log(botonHide_class, "d-none", botonShow_class, "mostrar");

    let botonOcultar = document.querySelector(botonHide_class);
    if(botonOcultar){
        botonOcultar.classList.add('d-none');
    }
    let botonMostrar = document.querySelector(botonShow_class);
    if (botonMostrar) {
        botonMostrar.classList.remove('d-none');
    }
}
//MODIFICA EL TÍTULO DE CREAR SERVICIO O MODIFICAR SERVICIO
function changeTitleModifyCreateService(titleHide_class, titleShow_class){
    let tituloOcultar = document.querySelector(titleHide_class);
    if(tituloOcultar){
        tituloOcultar.classList.add('d-none');
    }
    let tituloMostrar = document.querySelector(titleShow_class);
    if (tituloMostrar) {
        tituloMostrar.classList.remove('d-none');
    }
}
//funcion abre cierra modal boton negro añadir servicio
function abrirCerrarModalAniadirServico(){
    // console.log("abrirCerrarModal");
    let botonAddService;
    let botonnegro;
    let modalnewServiceCategCombo= document.querySelector('.add-button_dropdown_ZXg6G');
    botonAddService = document.querySelector('.add-button_overlay_nOmaV');
    botonnegro = document.querySelector('.addService');
    // Alternamos la clase para mostrar u ocultar el modal
    botonAddService.classList.toggle('add-button_open_oqadv');
    modalnewServiceCategCombo.classList.toggle('d-none');
    // Alternamos la clase del botón para cambiar su apariencia
    botonnegro.classList.toggle('add-button_addButtonClose_MWq6H');
}

//ABRIR MODAL MUESTRA Y OCULTA EL MODAL PARA CREAR NUEVO SERVICIO, COMBO DENTRO PANTALLA 3
function showModalAddservice(){
let enlaceModal = document.querySelector('.addService');
    if(enlaceModal){
        $(enlaceModal).off('click').on('click', function(event) {
             event.preventDefault();
             abrirCerrarModalAniadirServico()
            //  console.log("clic en boton negro");
        });
    }
}


//funcion modificar categoria
function modifyCategory(categoria_id){
    // console.log(categoria_id);


}
//PASAR DATOS DEL BOTÓN AL OFFCANBA PARA RESERVAR SERVICIO

    //PONE UN CHECK CUANDO EL USUARIO CLICA EN EL SPAN QUE HAY DENTRO DEL MODAL SELECCIONAR COLOR
    // function ponerCheckColor(spanCheck) {
    //     console.log(spanCheck);

    //     let contenedorColores = document.querySelector('.contenedorColores');
    //     // Seleccionamos los spans que contienen los colores
    //     let colorSpans = document.querySelectorAll('.color-picker-modal_serviceColorTile_mt88Y');

    //     // Eliminar cualquier ícono de check existente de todos los spans
    //     colorSpans.forEach(function (span) {
    //         let existingIcon = span.querySelector('.icon-tick');
    //         if (existingIcon) {
    //             existingIcon.remove();  // Eliminamos el ícono si existe
    //         }
    //     });

    //     // Añadir el ícono de check solo al span clickeado (spanCheck)
    //     spanCheck.innerHTML += `
    //         <span class="color-picker-modal_tickIcon_Zazmf b-icon icon-tick iconFont" style="font-size: 40px;"></span>
    //     `;

    //     // Ocultar el contenedor de colores
    //     if (contenedorColores) {
    //         contenedorColores.style.display = 'none';  // Ocultar el contenedor
    //     }
    // }


    //comprueba si el desplegable empleados esta abierto
    //recibe la clase del desplegable y devuelve true si está cerrado y flase si está abierto
    function comprobarDesplegableEmpleadoAbierto(className) {
        // Seleccionamos el primer elemento con la clase proporcionada
        const element = document.querySelector(`.${className}`);

        if (!element) {
            console.error("Elemento no encontrado");
            return false;
        }

        // Obtenemos los estilos computados del elemento
        const style = window.getComputedStyle(element);

        // Comprobamos si el valor de display es 'none'
        return style.display === 'none';
    }

function abrirModalCategorias(contenedor){
    //para cerrar el modal empleados al clicar en las horas
    if (contenedor.trim() == '.contenedorHorasInicioAddCalendar' || contenedor.trim() == '.contenedorHorasFinAddCalendar') {
        !comprobarDesplegableEmpleadoAbierto('contenedorEmpleadosInicioCalendarAdd') ?  $('.contenedorEmpleadosInicioCalendarAdd').slideToggle():null;
        // $('.contenedorEmpleadosInicioCalendarAdd').slideToggle();
    }
    if (contenedor.trim() == '.contenedorHorasInicioCalendar' || contenedor.trim() == '.contenedorHorasFinCalendar') {
        !comprobarDesplegableEmpleadoAbierto('contenedorEmpleadosInicioCalendar') ?  $('.contenedorEmpleadosInicioCalendar').slideToggle():null;
        // $('.contenedorEmpleadosInicioCalendar').slideToggle();
    }
    if (contenedor.trim() == '.contenedorHorasInicio' || contenedor.trim() == '.contenedorHorasFin') {
        !comprobarDesplegableEmpleadoAbierto('contenedorEmpleadosInicio') ?  $('.contenedorEmpleadosInicio').slideToggle():null;
        // $('.contenedorEmpleadosInicio').slideToggle();
    }
    if (contenedor.trim() == '.contenedorHorasInicioAdd' || contenedor.trim() == '.contenedorHorasFinAdd') {
        !comprobarDesplegableEmpleadoAbierto('contenedorEmpleados') ?  $('.contenedorEmpleados').slideToggle():null;

        // $('.contenedorEmpleados').slideToggle();
    }
    //--------------------
    $(contenedor).slideToggle();
    categoriaSeleccionadaNewService();
}


function cerrarModalCategorias(modal) {
    // console.log('Cerrar categorías');
    $(modal).slideUp(); // Cierra el modal si está abierto
}

function xcerrarModal(){
    let contenedorColores  = document.querySelector('.contenedorColores');
    contenedorColores.style.display = 'none';

}




document.addEventListener('DOMContentLoaded', function() {


// Get a reference to the file input element
const inputElement = document.querySelector('#imagesCreateNewService');

// Create a FilePond instance
const pond = FilePond.create(inputElement);
FilePond.setOptions({
    labelIdle: 'Arrastra y suelta tus imágenes o <span class="filepond--label-action">Explorar</span>',
    server: {
        process: 'upload',
        revert: 'delete',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value, // Token CSRF
        },
        // restore: './restore/',
        // load: './load/',
        // fetch: './fetch/',
    },
});
});
    // const inputElementUpImage = document.querySelector('#imageService');
    // if(inputElementUpImage){
    //     $(inputElementUpImage).off('click').on('click', function(event) {
    //         event.preventDefault();
    //         inputElementUpImage = inputElementUpImage.cloneNode(true);
    //     });
    // }


// //envio de imágenes
// document.addEventListener('DOMContentLoaded', function() {
//     // Registrar los plugins que quieras utilizar
//     FilePond.registerPlugin(
//         FilePondPluginImagePreview,
//         FilePondPluginFileValidateSize,
//         FilePondPluginFileValidateType
//     );
//     // Seleccionar el input de archivo y convertirlo en un FilePond instance
//     const inputElement = document.getElementById('imagesCreateNewService');
//     let rutaCrearNewService = "servicio/storeImage";
//     const pond = FilePond.create(inputElement, {
//         allowMultiple: true, // Permitir múltiples archivos
//         maxFiles: 10, // Máximo número de archivos
//         maxFileSize: '3MB', // Tamaño máximo por archivo
//         acceptedFileTypes: ['image/*'], // Solo aceptar imágenes
//         imagePreviewHeight: 150, // Altura de la previsualización
//         labelIdle: 'Arrastra y suelta tus imágenes o <span class="filepond--label-action">Explorar</span>',

//         server: {
//             process: {
//                 url: rutaCrearNewService,  // Ruta para subir las imágenes
//                 method: 'POST',
//                 withCredentials: false,
//                 headers: {
//                     'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value, // Token CSRF
//                 },
//                 onload: (response) => {
//                     const parsedResponse = JSON.parse(response);
//                     console.log('Archivo subido correctamente:', parsedResponse);
//                     return parsedResponse.filename; // Devolver el nombre del archivo subido como uniqueFileId
//                 },
//                 onerror: (response) => {
//                     console.error('Error al subir el archivo:', response);
//                 },
//                 ondata: (formData) => {
//                     return formData; // Devuelve el FormData para ser enviado al servidor
//                 }
//             },
//             revert: (uniqueFileId, load, error) => {
//                 console.log('Eliminando archivo con ID:', uniqueFileId);
//                 // Realizar solicitud para eliminar el archivo del servidor
//                 fetch(`delete-image/${uniqueFileId}`, {
//                     method: 'DELETE',
//                     headers: {
//                         'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value, // Token CSRF
//                     },
//                 })
//                 .then((response) => {
//                     if (response.ok) {
//                         load(); // Llamar a load() para informar que la imagen ha sido eliminada
//                     } else {
//                         error('No se pudo eliminar el archivo'); // Mostrar error si la eliminación falla
//                     }
//                 })
//                 .catch((err) => {
//                     console.error('Error al eliminar el archivo:', err);
//                     error('No se pudo eliminar el archivo'); // Manejo de error
//                 });
//             }
//         }
//     });

//     // Obtener los archivos seleccionados más tarde si es necesario
//     pond.on('processfile', (error, file) => {
//         if (error) {
//             console.error('Error al procesar el archivo:', error);
//             return;
//         }
//         console.log('Archivo procesado:', file);
//     });
// });








// document.addEventListener('livewire:load', function () {
//     attachClickEventToLinks();
// });

// Livewire.hook('message.processed', (message, component) => {
//     attachClickEventToLinks();

// });

















// // Seleccionamos todos los enlaces dentro de la clase configuracionNegocio
// var enlaces = document.querySelectorAll('.configuracionNegocio a');

// // Añadimos un evento click a cada enlace
// enlaces.forEach(function(enlace) {
//     enlace.addEventListener('click', function(event) {
//         console.log("clic en configuración negocio");
//         event.preventDefault(); // Evitamos la recarga de la página

//         // Obtenemos la URL que se encuentra en data-url
//         var url = enlace.getAttribute('data-url');
//         var seeUrl = enlace.getAttribute('data-changeurl');

//         // Realizamos la solicitud fetch
//         fetch(url)
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('Error al cargar la página');
//             }
//             return response.text(); // Obtenemos el HTML como texto
//         })
//         .then(html => {
//             // Reemplazamos el contenido dinámico en el contenedor
//             document.getElementById('Configuracion_administrator').innerHTML = html;

//             // Llamamos a la función para cambiar la URL si es necesario
//             cambiarURL(seeUrl);
//             asignarEventoOnClickAEnlaceOpenServices_b();
//             // Aquí asignamos el evento click al span cargado dinámicamente
//             asignarEventoSpan();
//         })
//         .catch(error => {
//             console.error('Hubo un problema con la petición:', error);
//         });
//     });
// });
function clicFlechaAtrasServiciosyCombos(){
    var spanGoBack3 = document.querySelector('.spanGotobackServicesCombos'); // Seleccionamos el span spanGotobackConfigureServices
    if (spanGoBack3) {
        spanGoBack3.onclick = function(){
            showDiv('configuration_service');
            cambiarURL('admin/dashboard/Configuracion_administrator');
        };
    }
}

clicFlechaAtrasServiciosyCombos();

var spanGoBack2 = document.querySelectorAll('.spanGotobackConfigureServices'); // Seleccionamos el span spanGotobackConfigureServices
if (spanGoBack2) {
    spanGoBack2.forEach(function (span) {
        span.addEventListener('click', function(event){
            event.preventDefault();
            showDiv('configuration_bussines');
        cambiarURL('admin/dashboard/Configuracion_administrator');

        });
    });
}

//flecha atras configuracion reserva
function clicFlechaAtrasConfiguracionReseva(){
    var spanGoBack = document.querySelector('.configuracionReservaAtras');
    if (spanGoBack) {
        spanGoBack.onclick = function(){
            showDiv('opciones_avanzadas1');
            // cambiarURL('admin/dashboard/Configuracion_administrator');
        };
    }
}
clicFlechaAtrasConfiguracionReseva();
// // Función para asignar el evento al span dinámico
// function asignarEventoSpan() {
//     var spanGoBack = document.querySelector('.spanGotoback'); // Seleccionamos el span
//     if (spanGoBack) {
//         spanGoBack.onclick = function() {
//             // Acción cuando se hace clic en el span
//             console.log("Click en el span de volver atrás!");

//             // Obtenemos la URL del atributo data-url
//             var backUrl = spanGoBack.getAttribute('data-url');
//             var backChangeUrl = spanGoBack.getAttribute('data-changeurl');

//             // Realizamos otra petición fetch para la navegación inversa (go back)
//             fetch(backUrl)
//             .then(response => {
//                 if (!response.ok) {
//                     throw new Error('Error al cargar la página');
//                 }
//                 return response.text();
//             })
//             .then(html => {
//                 // Reemplazamos el contenido dinámico
//                 document.getElementById('Configuracion_administrator').innerHTML = html;

//                 // Cambiamos nuevamente la URL si es necesario
//                 cambiarURL(backChangeUrl);
//                 asignarEventoOnClickAEnlaceOpenServices_b();
//                 asignarEventoOnClickAEnlaces();
//                 // Volvemos a asignar el evento al span que fue reemplazado
//                 asignarEventoSpan();
//             })
//             .catch(error => {
//                 console.error('Error al volver atrás:', error);
//             });
//         };
//     }
// }

// function asignarEventoOnClickAEnlaces() {
//     // Seleccionamos todos los enlaces dentro de la clase configuracionNegocio
//     var enlaces = document.querySelectorAll('.configuracionNegocio a');
//     if(enlaces){
//         // Recorremos cada enlace y le asignamos el evento click
//         enlaces.forEach(function(enlace) {
//             enlace.onclick = function(event) {
//                 event.preventDefault(); // Evitamos que el enlace realice la acción por defecto

//                 // Aquí puedes poner la acción que deseas realizar cuando se hace clic
//                 console.log("Has hecho clic en un enlace dentro de configuracionNegocio");

//                 var url = enlace.getAttribute('data-url');
//                 var changeUrl = enlace.getAttribute('data-changeurl');

//                 // Ejemplo de petición fetch si lo necesitas
//                 fetch(url)
//                 .then(response => {
//                     if (!response.ok) {
//                         throw new Error('Error al cargar la página');
//                     }
//                     return response.text();
//                 })
//                 .then(html => {
//                     // Aquí puedes manejar la respuesta del fetch (por ejemplo, actualizar contenido dinámico)
//                     document.getElementById('Configuracion_administrator').innerHTML = html;
//                     cambiarURL(changeUrl);
//                     asignarEventoOnClickAEnlaceOpenServices_b();
//                     asignarEventoOnClickAEnlaces();
//                     asignarEventoSpan();
//                 })
//                 .catch(error => {
//                     console.error('Error al realizar la solicitud:', error);
//                 });
//             };
//         });
//     }

// }

// function asignarEventoOnClickAEnlaceOpenServices_b() {
//     // Seleccionamos todos los enlaces dentro de la clase configuracionNegocio
//     var enlaces = document.querySelectorAll('.openConfigServicios_b a');
//     if(enlaces){
//         // Recorremos cada enlace y le asignamos el evento click
//         enlaces.forEach(function(enlace) {
//             enlace.onclick = function(event) {
//                 event.preventDefault(); // Evitamos que el enlace realice la acción por defecto

//                 // Aquí puedes poner la acción que deseas realizar cuando se hace clic
//                 console.log("--------------------------------------");
//                 // $('.configurar-negocio-empty').empty();
//                 var url = enlace.getAttribute('data-url');
//                 var changeUrl = enlace.getAttribute('data-changeurl');
//                 // document.querySelector('configurar_servicios-open').classList.remove('d-none');
//                 //Ejemplo de petición fetch si lo necesitas
//                 fetch(url)
//                 .then(response => {
//                     if (!response.ok) {
//                         throw new Error('Error al cargar la página');
//                     }
//                     return response.text();
//                 })
//                 .then(html => {
//                     // Aquí puedes manejar la respuesta del fetch (por ejemplo, actualizar contenido dinámico)
//                     document.getElementById('Configuracion_administrator').innerHTML = html;
//                     cambiarURL(changeUrl);
//                     // asignarEventoOnClickIconAddService();
//                     asignarEventoOnClickImgChangeCategoryName();
//                     asignarEventoOnClickAEnlaceOpenServices_b()
//                     asignarEventoOnClickAEnlaces();
//                     asignarEventoSpan();
//                 })
//                 .catch(error => {
//                     console.error('Error al realizar la solicitud:', error);
//                 });
//             };
//         });
//     }
// }

// function asignarEventoOnClickImgChangeCategoryName() {
//     //modal crear servicio, categoria, combo
//     var modalEnlcesCresar = document.querySelectorAll('.add-button_button_U2OQn');
//     if(modalEnlcesCresar){
//         modalEnlcesCresar.forEach(function(enlaceModal){
//             enlaceModal.onclick = function(event){
//                 console.log("crear servicio");

//                 event.preventDefault();
//                 var dataCreate = enlaceModal.getAttribute('data-create');
//                 console.log(dataCreate," datacreate");

//                 if(dataCreate === 'add-service-btn'){
//                     Livewire.emit('loadCreateNewService');
//                 }
//             // console.log("clic dentro del modal", dataUrl);
//             }
//         });
//     }
//     //--------------------------------------------


//     // Seleccionamos todos los enlaces dentro de la clase configuracionNegocio
//     var enlaces = document.querySelectorAll('img.modifyNameCategory');
//     if(enlaces){
//         // Recorremos cada enlace y le asignamos el evento click
//         enlaces.forEach(function(enlace) {
//             enlace.onclick = function(event) {
//                 event.preventDefault(); // Evitamos que el enlace realice la acción por defecto

//                 // Aquí puedes poner la acción que deseas realizar cuando se hace clic
//                 console.log("--------------------hola desde imagen categoria------------------");
//                 var modalElement = new bootstrap.Modal(document.getElementById('modificarCategoriaModal'));
//                 modalElement.show();

//             };
//         });
//     }
// }
// function asignarEventoOnClickIconAddService() {
//     // Seleccionamos todos los enlaces dentro de la clase configuracionNegocio
//     var enlace = document.querySelector('.addService');
//     if(enlace){
//         enlace.onclick = function() {
//             console.log("hola desde el botón");
//         }
//     }
// }

// function gotoback(span){
//     console.log(span, "this-------");
//     // event.preventDefault(); // Evitamos la recarga de la página

//     // Obtenemos la URL que se encuentra en data-url
//     var url = span.getAttribute('data-url');
//     console.log(url, "url dentro de back");

//     var seeUrl = span.getAttribute('data-changeurl')
//     fetch(url)
//     .then(response => {
//         if (!response.ok) {
//             throw new Error('Error al cargar la página');
//         }
//         console.log(response.text);

//         return response.text(); // Obtenemos el HTML como texto
//     })
//     .then(html => {
//         // Reemplazamos el contenido dinámico en el contenedor   goToBack
//         document.getElementById('Configuracion_administrator').innerHTML = html;
//         cambiarURL(seeUrl)
//     })
//     .catch(error => {
//         console.error('Hubo un problema con la petición:', error);
//     });
// }

// var goToBack = document.querySelectorAll('.spanGotoback');

//     // Añadimos un evento click a cada enlace
//     goToBack.forEach(function(enlace) {
//         enlace.addEventListener('click', function(event) {
//             console.log("estas dentro de gotobalck");

//             event.preventDefault(); // Evitamos la recarga de la página

//             // Obtenemos la URL que se encuentra en data-url
//             var url = enlace.getAttribute('data-url');
//             console.log(url, "url dentro de back");

//             var seeUrl = enlace.getAttribute('data-changeurl')
//             fetch(url)
//             .then(response => {
//                 if (!response.ok) {
//                     throw new Error('Error al cargar la página');
//                 }
//                 return response.text(); // Obtenemos el HTML como texto
//             })
//             .then(html => {
//                 // Reemplazamos el contenido dinámico en el contenedor   goToBack
//                 document.getElementById('Configuracion_administrator').innerHTML = html;
//                 cambiarURL(seeUrl)
//             })
//             .catch(error => {
//                 console.error('Hubo un problema con la petición:', error);
//             });
//         });
function prueba125(){
    console.log("prueba 125");
}
//     });

//AVISA SI CREAR UNA RESERVA
// Pusher.logToConsole = true;
var pusher2 = new Pusher('5c6372eb4b8fe681a214', {
cluster: 'eu'
});

var channel = pusher2.subscribe('reservas');
channel.bind('NewReserv', function(data) {
    // console.log(data.comfim_pendingCount, "DATA CONFIRM AND PENDING COUNT");
    var reserva = data.reserva;
    var idReserva = reserva.id;
    // Verificar si la URL contiene 'admin'
    if (window.location.href.includes('admin')) {
        initializeCalendar();  // Ejecutar solo si la URL contiene 'admin'
    }
    insertRedPoin(idReserva, data.comfim_pendingCount); // Llamar a la función de notificación visual
    // console.log(data.comfim_pendingCount, "DATA CONFIRM PENDING COUNT");
});

//METODO PARA QUE SE MANTENGA PUNTO ROJO SI RECARGA PÁGINA
document.addEventListener('DOMContentLoaded', function() {
     // Ejecutar solo si la URL contiene 'admin'

    setTimeout(() => {
        if (window.location.href.includes('admin')) {
            initializeCalendar();  // Ejecutar solo si la URL contiene 'admin'
        }
        checkPendingReservations();
        // initializeCalendar();
    }, 1500);
});

//METODO QUE DEVUELVE LAS RESERVAS PENDIENTES
function checkPendingReservations() {
    let csrfToken = $('meta[name="csrf-token"]').attr("content");
    let url = 'check-pending-reservations'; // Ruta que revisa si hay reservas pendientes

    // Hacer una petición AJAX al servidor usando jQuery
    $.ajax({
        url: url, // Ruta para verificar reservas pendientes
        method: 'GET', // Usamos GET ya que es para obtener datos
        data: {
            _token: csrfToken, // Token CSRF para seguridad
        },
        success: function(data) {
            if (data.pending) {
                // console.log(data.pending, "DATA PENDING");

                // Recorremos las reservas pendientes y realizamos acciones
                data.reservas.forEach(reserva => {
                    // Aquí puedes hacer cualquier acción adicional con el id de la reserva
                    insertRedPoin(reserva.id, data.pendingCount2);
                });
            }
        },
        error: function(xhr, status, error) {
            console.error("Error al verificar reservas pendientes:", error);
        }
    });
}


//METODO QUE INSERTA EL PUNTO ROJO EN NOTIFICACIONES
function insertRedPoin(idReserva, contador){
    // console.log(contador, "DATA CONFIRM PENDING COUNT");
    let notificationDiv = document.querySelectorAll('.notificationNewReserv');
    let notificationDivIndex = document.querySelector('.notificationNewReservIndex');
    if(contador>0){
        $(notificationDivIndex).append(`
            <b data-count="${contador}" class='redPoinNewReservindex' data-reservRedPoindId="${idReserva}">
            <span style="color:white;margin-left: 6px;font-size: small;">${contador}</span>
            </b>
        `);
        notificationDiv.forEach(function(div) {
            $(div).append(`
                <b data-count="${contador}" class='redPoinNewReserv' data-reservRedPoindId="${idReserva}">
                <span style="color:white">${contador}</span>
                </b>
            `);
        });
    }

}

//elimina todos puntos rojos
function removeAllRedPoin(){
    document.querySelectorAll('.redPoinNewReserv').forEach(function(point) {
        point.remove();  // Elimina el punto rojo en las notificaciones
    });
    document.querySelectorAll('.redPoinNewReservindex').forEach(function(point) {
        point.remove();  // Elimina el punto rojo en el índice
    });
}

//FUNCION QUE ACTIVA CONFIGURATION BUSSINES
function activeAdministratos(){
    console.log("hola");
    document.getElementById('configuration_bussines').classList.remove('d-none');
}

//error Blocked aria-hidden on an element because its descendant retained focus. The focus must not be hidden from
document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener('hide.bs.modal', function (event) {
        if (document.activeElement) {
            document.activeElement.blur();
        }
    });
});


//MOVIMIENTO DEL CARRUSEL
const root = document.documentElement;
const marqueeElementsDisplayed = getComputedStyle(root).getPropertyValue("--marquee-elements-displayed");
const marqueeContent = document.querySelector("ul.marquee-content");
if(marqueeContent){
    root.style.setProperty("--marquee-elements", marqueeContent.children.length);

    for(let i=0; i<marqueeElementsDisplayed; i++) {
      marqueeContent.appendChild(marqueeContent.children[i].cloneNode(true));
    }
}

//VOLVER AL INDEX
function return_viewIndex(){

    let div = document.getElementById('contentContainer_login_register');
    if (div) {
        $(div).empty();
        // div.remove();  // Elimina el div del DOM contentContainer_registerUserGuest
    }
    let loader = document.querySelector('#loaderSperaAdministrator');
    loader.classList.remove('d-none');
    if( document.querySelector('.index_page_inicioStart')){
        document.querySelector('.index_page_inicioStart').classList.remove('d-none');
        // window.location.href = 'index';
    }else{
        window.location.href = 'init'; // Redirige a la ruta login_noCharger
        cambiarURL2('init');
    }
    loader.classList.add('d-none');
}

//INTERCAMBIAR VISTAS LOGIN REGISTRO
function change_view_lr(route){
    console.log(route, "ruta", "boton");

    let loader = document.querySelector('#loaderSperaAdministrator');
    loader.classList.remove('d-none');
    console.log("clid en registrar");
    fetch(route)
        .then(response => response.text())  // Obtenemos el contenido HTML
        .then(html => {
            if(document.getElementById('contentContainer_login_register') === null){
                document.getElementById('contentContainer_registerUserGuest').innerHTML = html;
            }else{
            document.getElementById('contentContainer_login_register').innerHTML = html; // Cargamos el HTML en el contenedor
            }

            cambiarURL2(route);
            loader.classList.add('d-none');
        })
        .catch(error => {
            console.log('Error al cargar la vista de registro:', error);
        });

    }
// CAMBIAR A LA VISTA ENTRAR REGISTRASE
let botonesEntrarRegistrase = document.querySelectorAll('.entrar_registrase');

botonesEntrarRegistrase.forEach(boton => {
    boton.addEventListener('click', function(event) {
        event.preventDefault();

        let loader = document.querySelector('#loaderSperaAdministrator');
        loader.classList.remove('d-none');

        if (boton.getAttribute('data-auth') === '0') {
            fetch("login")
                .then(response => response.text()) // Obtenemos el contenido HTML
                .then(html => {
                    if (document.querySelector('.index_page_inicioStart')) {
                        document.querySelector('.index_page_inicioStart').classList.add('d-none');
                    }
                    document.getElementById('contentContainer_login_register').innerHTML = html; // Cargamos el HTML en el contenedor
                    cambiarURL2('login');
                    document.getElementById('ui-to-top').classList.remove('active');
                })
                .catch(error => {
                    console.log('Error al cargar la vista de registro:', error);
                });
        } else {
            document.getElementById('services').scrollIntoView({ behavior: 'smooth' });
            console.log("logueado");
        }
        setTimeout(() => {
            loader.classList.add('d-none');
        }, 2000);
    });
});


//CIERRA EL OFFCANVAS AL SELECCIONAR UN SERVICIO
document.querySelectorAll('.scroll-link').forEach(link => {
    link.addEventListener('click', function (event) {
        // Cierra el offcanvas usando Bootstrap
        event.preventDefault();
        let offcanvasElement = document.querySelector('#canvasCategory');
        let offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
        offcanvas.hide();
    });
});
///CAMBIA URL A LOGIN
function cambiarURL2(ruta) {
    // Obtener la URL actual como objeto URL
    var urlObjeto = new URL(window.location.href);

    // Construir la nueva URL con la ruta pasada como parámetro
    // var nuevaURL = urlObjeto.origin + '/laravel/salon-manicura/public/' + ruta + urlObjeto.search + urlObjeto.hash;
    var nuevaURL = urlObjeto.origin + '/' + ruta + urlObjeto.search + urlObjeto.hash;

    // Actualizar la URL en el historial del navegador sin recargar la página
    window.history.pushState({}, '', nuevaURL);
}
//ABRIR MODAL
function abrirModal(id_modal) {
    var miModal = new bootstrap.Modal(document.getElementById(id_modal));
    miModal.show();
}

//ELIMINA IMAGENES TEMPORALES NUEVO SERVICIO
document.addEventListener('DOMContentLoaded', function() {
let urlActualImageNewService = getCurrentURL();
// console.log(urlActualImageNewService, 'URL----------------');
// if (window.location.href.includes('admin')) {
//     initializeCalendar();  // Ejecutar solo si la URL contiene 'admin'
// }
if (urlActualImageNewService.includes('createService') && document.querySelector('input[name="_token"]')) {
    // console.log(urlActualImageNewService, 'URL--------------');
    // console.log(urlActualImageNewService, "actual url");

    // Hacer una solicitud AJAX a la ruta de eliminación de imágenes temporales
    let csrfToken = $('meta[name="csrf-token"]').attr("content"); // Obtener el token CSRF desde el meta tag
    let url = 'deleteAll'; // Ruta para eliminar imágenes temporales

    // Hacer una petición AJAX para eliminar las imágenes temporales
    $.ajax({
        url: url, // Ruta para la eliminación
        method: 'DELETE', // Usamos DELETE para eliminar
        data: {
            _token: csrfToken, // Token CSRF para seguridad
        },
        success: function(response) {
            // Si la petición fue exitosa, puedes agregar alguna acción aquí
            console.log('Imágenes temporales eliminadas correctamente.', response);
            console.log(urlActualImageNewService, 'URL--------------------');
        },
        error: function(xhr, status, error) {
            // Si ocurre un error, lo manejamos aquí
            console.error('Error al eliminar imágenes temporales:', error);
        }
    });
}
});

//FUNCION ELIMINAR IMAGENES TEMPORALES
function deleteImageTemporaly(){
   // Hacer una solicitud AJAX a la ruta de eliminación de imágenes temporales
   fetch('deleteAll', {
    method: 'DELETE',
    headers: {
       'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value, // Token CSRF
    //    'X-CSRF-TOKEN': document.querySelector('input[name="csrf-token"]').value, // Token CSRF
    }
}).then(response => {
    console.log('Imágenes temporales eliminadas correctamente.', response);
}).catch(error => {
    console.error('Error al eliminar imágenes temporales:', error);
});
}

//detectar si el scroll está arriba para sombra
$(document).ready(function() {
    $('.scroll-menu-category').on('scroll', function() {
        if ($(this).scrollTop() > 0) {
            // console.log("se mueva");

            $('.sombra_header').addClass('shadow-top');
        } else {
            $('.sombra_header').removeClass('shadow-top');
        }
    });
});

function showDivBotonGuardarInfo(selectedDivId){
    const divs = [
        document.querySelector('.reservCobrarFooterInfo'),
        document.querySelector('.saveChangesFooterInfo')
    ];
     // Recorrer todos los divs
     divs.forEach(div => {
        // Verificar si el div existe antes de intentar acceder a sus propiedades
        if (div) {
            // Si el div coincide con el ID seleccionado, mostrarlo
            if (div.id === selectedDivId) {
                div.style.display = 'flex';
            } else {
                // Ocultar todos los demás divs
                div.style.display = 'none';
            }
        } else {
            console.warn('Div no encontrado, verifica los IDs en el DOM.');
        }
    });
}

function showDivPagos(selectedDivId){
    const divs = [
        document.querySelector('.citasProcimasContainer'),
        document.querySelector('.citasTerminadasContainer'),
        document.getElementById('salesNavigator-indexBasketContent'),
        document.getElementById('index_checkoutView_pvF8_VistaPagos'),
    ];
     // Recorrer todos los divs
     divs.forEach(div => {
        // Verificar si el div existe antes de intentar acceder a sus propiedades
        if (div) {
            // Si el div coincide con el ID seleccionado, mostrarlo
            if (div.id === selectedDivId) {
                div.style.display = 'block';
            } else {
                // Ocultar todos los demás divs
                div.style.display = 'none';
            }
        } else {
            console.warn('Div no encontrado, verifica los IDs en el DOM.');
        }
    });
}

//MUESTRA EL DIV QUE ENVIAMOS Y CIERRA TODOS LOS DEMÁS
function showDiv(selectedDivId) {
    // console.log(selectedDivId);

    // Crear un array con los divs que deseas controlar
    const divs = [
        document.getElementById('configuration_bussines'),
        document.getElementById('configuration_service'),
        document.getElementById('show_all_service'),
        document.getElementById('createNew_service'),
        document.getElementById('opciones_avanzadas1'),
        document.getElementById('opciones_avanzadas2'),
        // document.querySelector('.citasProcimasContainer'),
        // document.querySelector('.citasTerminadasContainer'),
        // document.getElementById('salesNavigator-indexBasketContent'),
        // document.getElementById('index_checkoutView_pvF8_VistaPagos'),
    ];

    // Recorrer todos los divs
    divs.forEach(div => {
        // Verificar si el div existe antes de intentar acceder a sus propiedades
        if (div) {
            // Si el div coincide con el ID seleccionado, mostrarlo
            if (div.id === selectedDivId) {
                div.style.display = 'block';
            } else {
                // Ocultar todos los demás divs
                div.style.display = 'none';
            }
        } else {
            console.warn('Div no encontrado, verifica los IDs en el DOM.');
        }
    });
}

//MUESTRA EL DIV QUE ENVIAMOS Y CIERRA TODOS LOS DEMÁS
function showDivClient(selectedDiv) {
    // console.log(selectedDivId);

    // Crear un array con los divs que deseas controlar
    const divs = [
        document.querySelector('.citasPasadas_001_cliente'),
        document.querySelector('.citasProximas_001_cliente'),
    ];

    // Recorrer todos los divs
    divs.forEach(div => {
        // Verificar si el div existe antes de intentar acceder a sus propiedades
        if (div) {
            // Si el div coincide con el ID seleccionado, mostrarlo
            if (div.id === selectedDiv) {
                div.style.display = 'block';
            } else {
                // Ocultar todos los demás divs
                div.style.display = 'none';
            }
        } else {
            console.warn('Div no encontrado, verifica los IDs en el DOM.');
        }
    });
}

function showDivNotas(selectedDiv){
    const divs = [
        document.querySelector('.datos_reserva0106'),
        document.querySelector('.notas_info0106'),
        document.querySelector('.datos_reservaNewReserv0106'),
        document.querySelector('.notas_reservaNewReserv0106'),
    ];

    // Recorrer todos los divs
    divs.forEach(div => {
        // Verificar si el div existe antes de intentar acceder a sus propiedades
        if (div) {
            // Si el div coincide con el ID seleccionado, mostrarlo
            if (div.id === selectedDiv) {
                div.style.display = 'block';
            } else {
                // Ocultar todos los demás divs
                div.style.display = 'none';
            }
        } else {
            console.warn('Div no encontrado, verifica los IDs en el DOM.');
        }
    });
}

function showDivClienInfo(selectedDiv){
    const divs = [
        document.querySelector('.basket-customer-card0101Info'),
        document.querySelector('.clienteDetails'),
    ];
    divs.forEach(div => {
        // Verificar si el div existe antes de intentar acceder a sus propiedades
        if (div) {
            // Si el div coincide con el ID seleccionado, mostrarlo
            if (div.id === selectedDiv) {
                div.style.display = 'block';
            } else {
                // Ocultar todos los demás divs
                div.style.display = 'none';
            }
        } else {
            console.warn('Div no encontrado, verifica los IDs en el DOM.');
        }
    });
}


//cambia url sin recargar página
function cambiarURL(url) {

    // Obtener la URL actual como objeto URL
    var urlObjeto = new URL(window.location.href);
    // Obtener la ruta después de la última aparición de "public/"
    if (urlObjeto.toString().includes('8060')) {
        var rutaDespuesDePublic = urlObjeto.pathname.split('8060/')[1];
    } else {
        var rutaDespuesDePublic = urlObjeto.pathname.split('public/')[1];
    }

    // Nueva ruta que deseas establecer
    var nuevaRuta = url;
    // Construir la nueva URL reemplazando la parte después de "public/"
    var nuevaURL = urlObjeto.origin + urlObjeto.pathname.replace(rutaDespuesDePublic, nuevaRuta) + urlObjeto.search + urlObjeto.hash;
    window.history.pushState({}, '', nuevaURL); // Reemplaza 'nuevaURL' por la URL deseada
}

//retorna elemento según su name
function _name(name){
    return document.getElementsByName(name)[0];
}

//retorna elemento según id
function _id(id){
    return document.getElementById(id);
}

//retorna elemento queryselector
function _q(className){
    return document.querySelector(className);
}
//MOSTRAR DIV 2
function mostrarDiv2(element){

    element.classList.remove('d-none');
}

//muestra div
function mostrarDiv(div){

    let divAbrir = document.querySelector(div);
    // console.log(divAbrir, "divabrir");
    if(divAbrir){
         divAbrir.classList.remove('d-none');
    }
}

//clic en el buscador
const inputs = document.querySelectorAll('.searchbox-form-input'); // Cambia a la clase o ID que corresponda
const icons = document.querySelectorAll('.searchbox-form_SearchBox__icon--magnifier__yXxdh');
const divs = document.querySelectorAll('.searchbox-form_SearchBox__fakePlaceholder__VhWWB');

inputs.forEach((input, index) => {
    const icon = icons[index];
    const div = divs[index];

    input.addEventListener('focus', function() {
        // console.log('input en foco');
        if (icon && div) {
            icon.style.width = '0';
            icon.style.marginRight = '0';
            div.style.opacity = 0;
        }
    });

    input.addEventListener('blur', function() {
        // console.log('input fuera de foco');
        if (icon && div) {
            icon.style.width = '';
            icon.style.marginRight = '';
            div.style.opacity = 1;
        }
    });
});

//footer menu
$('.hamburger').on('click', function(){
    $(this).parent().toggleClass('active');
});


function hidenFooter()
{
    if(document.querySelector('.footer')){
        _q('.footer').style.height = '0%';
        _q('footer').style.padding = '0px';
    }

// _q('.footer').style.height =
}

function showFooter()
{
    if(document.querySelector('.footer')){
        _q('.footer').style.height = '8%';
        _q('footer').style.padding = '9px';
    }

}

//saber url página
// Función para obtener la URL actual
function getCurrentURL() {
    return window.location.href;
}

// Inicialmente imprime la URL
// console.log('URL actual:', getCurrentURL());

// Escucha cambios en la URL usando popstate
window.addEventListener('popstate', () => {
    // console.log('URL cambiada:', getCurrentURL());
});

// O usando History API
function monitorURLChanges() {
    let lastURL = window.location.href;
    new MutationObserver(() => {
        const currentURL = window.location.href;
        if (currentURL !== lastURL) {
            lastURL = currentURL;
            // console.log('URL actualizada:', currentURL);
        }
    }).observe(document, { subtree: true, childList: true });
}

monitorURLChanges();//${message}
//MOSTRAR MENSAJE DE ERROR
// Función para mostrar el mensaje de error en el HTML
function showErrorMessage(message) {
    const errorContainer = document.createElement('div');
    errorContainer.innerHTML = `
    <div class="gualazonF validationError_login_register slide-in d-flex justify-content-center position-absolute z-1" style="width:100%; bottom: 50%;top: 10px;height: fit-content;">
        <div style="">
            <div style="" class="alert alert-success-dark d-flex p-4 rounded-3" role="alert">
                <i style="font-size: 30px" class="fa fa-exclamation-triangle text-danger me-3 align-self-center" aria-hidden="true"></i>
                <div class="mb-0">
                    Whoops! Algo ha ido mal.
                    <ul>
                        <li>${message}.</li>
                    </ul>
                </div>
            <button type="button" class="btn-close btn-sm ms-3" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    `;

    // Añadir el contenedor al body o a un contenedor específico
    document.body.appendChild(errorContainer);
}

function showInfoMessage(message) {
    const existingInfoContainer = document.querySelector('.showInfo');
    if (!existingInfoContainer) {
        const infoContainer = document.createElement('div');
        infoContainer.innerHTML = `
        <div class="gualazonF showInfo slide-in d-flex justify-content-center position-absolute z-1" style="width:100%; bottom: 50%;top: 10px;">
            <div style="">
                <div style="" class="alert alert-info-white d-flex p-4 rounded-3" role="alert">
                    <i style="font-size: 30px" class="fa fa-info-circle text-primary me-3 align-self-center" aria-hidden="true"></i>
                    <div class="mb-0">
                        <ul>
                            <li>${message}</li>
                        </ul>
                    </div>
                <button type="button" class="btn-close btn-sm ms-3" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        `;

        // Añadir el contenedor al body o a un contenedor específico
        document.body.appendChild(infoContainer);
         // Agregar evento al botón de cierre para eliminar el contenedor
     const closeButton = infoContainer.querySelector('.btn-close');
     closeButton.addEventListener('click', function(event) {
        event.preventDefault();
         infoContainer.remove(); // Eliminar el contenedor del DOM
     });
    }

}

//OBTENER DATOS DE IMAGEN AL CLICAR EN BOTÓN
if(_id('submitImageProfile')){
    document.getElementById('submitImageProfile').addEventListener('click', function(event) {
        event.preventDefault();
        var imgElement = document.getElementById('current_photo_profile');

        if (imgElement && imgElement.src) {
            var img = new Image();
            img.src = imgElement.src;

            img.onload = function() {
                // Obtener las dimensiones de la imagen
                // var width = img.width;
                // var height = img.height;

                // Inferir el tipo de archivo a partir del prefijo base64
                var fileType = imgElement.src.split(';')[0].split(':')[1]; // e.g., "image/png"

                // Obtener el tamaño de la imagen en bytes (estimación)
                // La estimación se basa en la longitud de la cadena base64
                var base64String = imgElement.src.split(',')[1];
                var sizeInBytes = (base64String.length * 3 / 4) - (base64String.endsWith('=') ? (base64String.endsWith('==') ? 2 : 1) : 0);
                const validTypes = ['image/jpeg', 'image/jpg'];
                var maxFileSizeInBytes = 1024 * 1024;
                // Verificar tipo de archivo
                if (!validTypes.includes(fileType)) {
                    showErrorMessage("Sólo puedes subir imágenes en formato: JPG o JPEG.");
                } else {

                }

                // Verificar tamaño de archivo
                if (sizeInBytes > maxFileSizeInBytes) {
                    showErrorMessage("La imagen que que quieres subir es demasiado grande, sólo puede llegar a 1 MB.");
                } else {

                }
                // console.log('Width:', width);
                // console.log('Height:', height);
                // console.log('File Type:', fileType);
                // console.log('Estimated Size (bytes):', Math.round(sizeInBytes));
            };

            img.onerror = function() {
                showErrorMessage("Sólo puedes subir imágenes en formato: JPG o JPEG y con un tamaño máximo de 1 MB");
            };
        } else {
            showErrorMessage("No se encuentra la imagen");
            // console.error('Image element not found or no image source');
        }
    });
}






//cambiar imagenes sin recargar página guardar base datos usuario javascript
Livewire.on('refresh-pannel-left', () => {
    // console.log("cambiar imagen");
    let newImageElement = document.getElementById('current_photo_profile');
    let newImageUrl = newImageElement.src;
    if(newImageUrl === ''){
        // console.log("no hay imagen");
    }else{
        const images = document.querySelectorAll('.imgProfileInformation');
        images.forEach(img => {
            // console.log(img);
            img.src = newImageUrl;
        });

        // Crear un objeto FormData para enviar la imagen al backend
        const formData = new FormData();
        formData.append('image', newImageUrl);

        // Enviar la imagen al backend
        var routSaveImage = "save-image";
        fetch(routSaveImage, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // console.log('Imagen guardada:', data);
            if(_id('newProfilePhoto').style.display === 'block'){
                _id('newProfilePhoto').style.display = 'd-none';
            }
        })
        .catch(error => {
            console.error('Error al guardar la imagen:', error);
        });
    }
});

var botonSubirImagen = document.getElementById('submitImageProfile');
if(botonSubirImagen){
    botonSubirImagen.onclick = function(event){
        event.preventDefault();
        // console.log("hola boton subir");
        setTimeout(() => {
        // _id('newProfilePhoto').style.display = 'none';
        // _id('currentPhotoProfileId').style.display = 'block';
    }, 1000);
    }
}


function deleteImageNow(nameUser){
    let newImageUrl = `https://ui-avatars.com/api/?name=${nameUser}&color=7F9CF5&background=EBF4FF`;
    // var divImagenAnterior = document.querySelector('.deleteImageAc');
    const images = document.querySelectorAll('.imgProfileInformation');
    images.forEach(img => {
        img.src = newImageUrl;
    });

setTimeout(() => {
    // _id('current_photo_profile') .removeAttribute('src');
    _id('newProfilePhoto').style.display = 'none';
    // _id('current_photo_profile') .style.display = 'none';
    _id('currentPhotoProfileId').style.display = 'block';
}, 1000);

}

function obtenerAnchoPantalla() {
    // console.log(window.innerWidth);
    return window.innerWidth;
}
window.addEventListener('resize', obtenerAnchoPantalla);

//ABRIR OFFCANVAS
function abrirOffcanvas(offcanvasId) {
    let offcanvasElement = document.getElementById(offcanvasId);
    let offcanvasInstance = new bootstrap.Offcanvas(offcanvasElement);
    offcanvasInstance.show();
}

//CERRAR TODOS LOS OFFCANVAS
function cerrarTodosLosOffcanvas() {
    const openOffcanvasElements = document.querySelectorAll('.offcanvas.show');
    openOffcanvasElements.forEach(offcanvasElement => {
        const bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
        if (bsOffcanvas) {
            bsOffcanvas.hide();
            if(_q('.offcanvas-backdrop')){
                //  console.log("hay ofcanvas abiertos")
                var sombrasOffcanvas = document.querySelectorAll('.offcanvas-backdrop');
               sombrasOffcanvas.forEach(backdrop => {
                    backdrop.style.display = 'none';
                });
            }
        }
    });
}

function checkShadowOffcanvas(){
    // console.log('entra');
    if(_q('.offcanvas-backdrop')){
        // console.log('si hay');
       var sombrasOffcanvas = document.querySelectorAll('.offcanvas-backdrop');
               sombrasOffcanvas.forEach(backdrop => {
                    backdrop.style.display = 'block';
                });
    }
}


//COMPRUEBA QUE AL PULSAR "GUARDAR" NO HAYA NINGÚN ELEMENTO SELECCIONADO, EN CASO CONTRARIO MUESTRA AVISO
// const imageUrl = 'https://salonnail.kesug.com/storage/logo/Frame20.png';
const imageUrl = 'http://localhost/laravel/salon-manicura/public/storage/logo/Frame20.png';
var labels = document.querySelectorAll('.inputsCategoriasSecundarias label');
function comprobarCheck() {
    // var modales = document.querySelectorAll('.modal');
    var siAfter=0;
    var noAfter=0;
      labels.forEach(function(label) {
          var styles = window.getComputedStyle(label, '::after');
          if (styles.content !== 'none') {
            siAfter++;
          } else {
            noAfter++;
          }
      });
      if (siAfter===0) {
          var swal = Swal.mixin({
              customClass:{
                  confirmButton: "btn btn-secondary"
              },
              buttonsStyling:true
          });

          swal.fire({
              // icon: "info",
              // title: 'Seleccionar opción',
              text: "Debes seleccionar una opcion",
              imageUrl: imageUrl,
              imageWidth: 200,
              imageHeight: 200,
              imageAlt: 'Custom image',
              animation: false,
              showCancelButton: false,

              confirmButtonText: 'Ok'
              }).then((result) => {
                  if (result.isConfirmed) {
                  }
              });

      }
      return siAfter;
      siAfter=0;
      noAfter=0;
  }

//DESMARCA LOS INPUTS
function uncheckInputs() {
    // Desmarcar todos los checkboxes con el nombre "categoria_product"
    $('input[type="checkbox"][name="categoria_product"]').prop('checked', false);
}

//SOLO DEJA SELECCIONAR UN INPUT CHECK
function checkImput(){
    $('input[type="checkbox"][name="categoria_product"]').change(function() {
    if ($(this).is(':checked')) {
        $('input[type="checkbox"][name="categoria_product"]').not(this).prop('checked', false);
    }
});
}
checkImput();

//ocultaDiv
function ocultarDiv(div){
    let divCerrar = document.querySelector(div);
    if(divCerrar){
        divCerrar.classList.add('d-none');
    }
}
//NUMEROS DE TELÉFONO
// const inputTel = document.querySelector("#phone");
// const iti = window.intlTelInput(inputTel, {
//   // separateDialCode: true,
//   initialCountry: "us",
//   utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.4.0/build/js/utils.js",
// });

// // store the instance variable so we can access it in the console e.g. window.iti.getNumber()
// window.iti = iti;

//DESMARCAR DESELECCIONA LOS CHECKS MARCADOS
function quitarInputsSeleccionados() {
    // console.log("hola");
    var checkboxes = document.querySelectorAll('#offCanvasGroupId input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            checkbox.checked = false;
        }
    });
}

//comprueba si formularioUpProduct está abierto
function formularioInfoProductoOculto(){
    if (_q('.formularioInfoProducto').classList.contains('d-none')) {
        return true;
    }
    else{
        return false;
    }
}

//cierra formulario upProduct
function ocultarFormularioInfoProducto(){
    _q('.formularioInfoProducto').classList.add('d-none');
}

//abre formulario upProduct
function mostrarFormularioInfoProducto(){
    _q('.formularioInfoProducto').classList.remove('d-none');

}
function mostrarFormularioUpImage(){
    _id('divFotos').classList.remove('d-none');
}
function mostrarFooterAction(){
    _q('.footer_action').classList.remove('d-none');
}

// //ACEPTAR NOTIFICACIONES SONORAS
// window.addEventListener('DOMContentLoaded', () => {
//     const estado = localStorage.getItem('notificaciones-sonoras');

//     // Solo preguntamos si el usuario no ha aceptado o rechazado antes
//     if (!estado) {
//         const acepta = confirm("Hola con el fin de enviarte noticias, descuentos, novedades y escuchar cuando un usuario te envia un mensaje por nuestro chat, recuerda aceptar recibir notificaciones sonoras. ¿Aceptas recibir notificaciones sonoras?");

//         if (acepta) {
//             Notification.requestPermission().then(function (permission) {
//                 if (permission === 'granted') {
//                     localStorage.setItem('notificaciones-sonoras', 'aceptado');
//                     alert('Notificaciones sonoras activadas.');
//                     // Puedes reproducir un sonido de prueba si quieres
//                     new Audio('/sonidos/notificacion.mp3').play();
//                 } else {
//                     localStorage.setItem('notificaciones-sonoras', 'rechazado');
//                     alert('No se activaron las notificaciones.');
//                 }
//             });
//         } else {
//             localStorage.setItem('notificaciones-sonoras', 'rechazado');
//         }
//     }
// });
window.addEventListener('load', () => {
  const estado = localStorage.getItem('notificaciones-sonoras');

  // Solo mostrar el modal si el usuario no ha aceptado aún
  if (estado !== 'granted') {
    setTimeout(function () {
      const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
      modal.show();

      // Botón "Aceptar"
      document.getElementById('btnAceptarNotificaciones').addEventListener('click', () => {
        Notification.requestPermission().then(permission => {
          if (permission === 'granted') {
            localStorage.setItem('notificaciones-sonoras', 'granted');
             setCookie('notificaciones-sonoras', 'granted', 360); // Crear la cookie por 360 días
            alert('😊 Notificaciones sonoras activadas.');
          } else {
            localStorage.setItem('notificaciones-sonoras', 'rechazado');
            alert('😞 No se activaron las notificaciones.');
          }
          modal.hide();
        });
      });

      // Botón "Cancelar"
      document.getElementById('btnCancelarNotificaciones').addEventListener('click', () => {
        localStorage.setItem('notificaciones-sonoras', 'rechazado');
        modal.hide();
      });

    }, 2000); // 5 segundos
  }
});
// Función para establecer una cookie
function setCookie(name, value, days) {
  const expires = new Date(Date.now() + days * 864e5).toUTCString();
  document.cookie = `${name}=${encodeURIComponent(value)}; expires=${expires}; path=/; secure; SameSite=Strict`;
}

// Función para obtener una cookie
function getCookie(name) {
  const match = document.cookie.split('; ').find(row => row.startsWith(name + '='));
  return match ? decodeURIComponent(match.split('=')[1]) : null;
}

// Función para eliminar una cookie
function deleteCookie(name) {
  document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/;`;
}

if (Notification.permission === 'granted') {
    console.log('✅ El usuario ha aceptado las notificaciones.');
} else if (Notification.permission === 'denied') {
    console.log('❌ El usuario ha rechazado las notificaciones.');
} else {
    console.log('⚠️ El usuario aún no ha respondido.');
}

//MUESTRA BOTÓN "selecciona una categoria para tu anuncio"
function showDroponCategorie(){
    _q('.categoriaGrupal').classList.add('mainCategory_active');//añade fondo verde a categoría grupal (algo que ya no necesito)
    _q('.anun-all').classList.add('selectAlgoNonecesito');
    _id('adjacentDiv2').classList.add('d-none');
    mostrarDiv('.dropon-selec-categoria');
    // insertarCheck('#gif_tipoProducto', '.image_check_tipoProducto');
}



//resetea la página de formulario producto //reset imágenes dropzone se hace en el método que crea dropzone
function resetPageUpProduct() {
    if(!_id('idformularioInfoProducto').classList.contains('d-none')){
        // console.log(_id('idformularioInfoProducto'));
        // _id('formType_category').reset();//reset datos upproduct precio, estado..
        // ponerGifOriginal(_id('gif_infoProducto'));//id de la imagen
        // eliminarCheck('.image_check_infoProducto');//clase del div que contiene la imagen
        // // _id('imgPortada-input').value = '';//reseteo imagenPrincipal
        // _id('imagen1-preview').src = "{{ asset('storage/icon-from-up-product/main_image.svg') }}";
        // _id('seleccionarImagen').classList.remove('d-none');

        // _q('.imgFoto').classList.remove('p-0');
        // ponerGifOriginal(_id('gif_fotoPrincipal'));//id de la imagen
        // eliminarCheck('.image_fotoPrincipal');//clase del div que contiene la imagen
        // ponerGifOriginal(_id('gif_titulo'));//id de la imagen
        // eliminarCheck('.image_check_titulo');//clase del div que contiene la imagen
        // ponerGifOriginal(_id('gif_mapa'));//id de la imagen //reset mapa

        // eliminarCheck('.image_check_mapa');//clase del div que contiene la imagen
        // clear22();//reset mapa
        // selectDos();//reset desplegables

        // ponerGifOriginal(_id('gifMarcaModeloMovil'));//id de la imagen //reseteo check desplegables infoElectrónica
        // eliminarCheck('.image_checkMarcaModeloMovil');//clase del div que contiene la imagen
        // ocultarFormularioInfoProducto();//cerramos from infoProducto
        // scrollToElement('selecCategoryAll');//scroll arriba
    }
}

//MUESTRA LISTA CATEGORIAS PRINCIPALES
function showCategoryList(){
   _id('listaCategorias').classList.remove('d-none');
}

//OCULTA LISTA CATEGORIAS PRINCIPALES
function ocultarLista(){
    _id('listaCategorias').classList.add('d-none');
}

//OCULTA EL DIV DONDE ESTE EL SELECT PARA PONER EL INPUT
// function hideSelect() {
//     // Lista de IDs de los selects
// console.log("ocultar select");

//     var selects = [
//         '#dropdowMediumTecnologiaElectronica_brand1',
//         '#dropdowMediumTecnologiaElectronica_brand_big',
//         '#dropdowMediumTecnologiaElectronica_brand2',
//         'dropdowMediumTecnologiaElectronica_brand3',
//         '#dropdowMediumTecnologiaElectronica_brand4',
//     ];

//     // // Recorrer los selects y cerrar el que esté abierto
//     selects.forEach(function(class_select) {
//         console.log(class_select);

//         var element = document.querySelector(class_select);  // Seleccionar el elemento por su ID
//         if (element && !element.classList.contains('d-none')) {  // Verificar si el elemento existe y no tiene la clase 'd-none'
//             element.classList.add('d-none');  // Agregar la clase 'd-none' para ocultarlo
//         }
//     });
// }


//MOSTRAR INPUT NUEVA MARCA OCULTAR SELECT
function hideSelect() {
    console.log("ocultar select");

    var selects = [
        '#dropdowMediumTecnologiaElectronica_brand1',
        '#dropdowMediumTecnologiaElectronica_brand_big',
        '#dropdowMediumTecnologiaElectronica_brand2',
        '#dropdowMediumTecnologiaElectronica_brand3',
        '#dropdowMediumTecnologiaElectronica_brand4',
    ];
     // Recorrer los selects y cerrar el que esté abierto
    selects.forEach(function(class_select) {
        console.log(class_select);

        var element = document.querySelector(class_select);  // Seleccionar el elemento por su ID
        if (element && !element.classList.contains('d-none')) {  // Verificar si el elemento existe y no tiene la clase 'd-none'
            element.classList.add('d-none');  // Agregar la clase 'd-none' para ocultarlo
        }
    });

   // Mostrar todos los divs con clase 'newBrandDiv'
    const newBrandDivs = document.querySelectorAll('.newBrandDiv');
    if (newBrandDivs.length > 0) {
        newBrandDivs.forEach(function(div) {
            if(div){
                mostrarDiv2(div);  // Aquí llamas a la función mostrarDiv pasando cada div individualmente
            }
        });
    }
    console.log("Mostrar todos los inputs");


}

//AÑADIR NUEVA MARCA
function saveNewBrand() {
    // Obtener el valor del input dentro del modal
    const newBrandModalInput = document.getElementById('newBrandModal');
    const newBrandValue = newBrandModalInput.value.trim(); // Eliminar espacios en blanco

    // Comprobar si el input está vacío
    if (newBrandValue === '') {
        alert('Por favor, ingrese una marca.');
        return; // Detener la ejecución si el campo está vacío
    }

    // Asignar el valor al input id 'newBrand'

    const newBrandInput = document.querySelectorAll('input[id^="inputnewBrandId"]');

    // Itera sobre ellos y asigna el valor
    newBrandInput.forEach(function(input) {
        input.value = newBrandValue;
    });

   // Cerrar el modal de Bootstrap 5
   const modalElement = document.getElementById('addBrand');
   const modalInstance = bootstrap.Modal.getInstance(modalElement);
   if (modalInstance) {
       modalInstance.hide(); // Oculta el modal
   }
}


//GESTIONA LAS CATEGORIAS SELECCIONADAS
function gestionarCategoria(lastCategoryName) {
    const trimmedCategory = lastCategoryName.trim();
    const categories = {
        "Bicicletas": {
            mostrar: '#sizeProduct',
            ocultar: ['#divMarcaModelo', '#divCapacidadRamPulgadas'],
            offcanvas: 'offcanvasBottomBicicleta'
        },
        "Fotografía, cámaras y drones": {
            mostrar: ['#divMarcaModelo', '.medium-brand-color'],
            ocultar: ['#divCapacidadRamPulgadas','#sizeProduct'],
            offcanvas: 'offcanvasBottomFotoCamaraDrones'
        },
        "Informática y ordenadores": {
            mostrar: ['#divMarcaModelo','#divCapacidadRamPulgadas'],
            ocultar: ['#sizeProduct', '.tecnologiElectric_brand_big'],
            offcanvas: 'category_list_InformaticaElectronica'
        },
        "Móviles, Tablets, E-reader, Smartwatches y Telefonía": {
            mostrar:  ['#divMarcaModelo', '#divCapacidadRamPulgadas', '.tecnologiElectric_brand_model_color', '.small-ram-screen-capacity'],
            ocultar: ['#sizeProduct', '.medium-brand-color'],
            offcanvas: 'offcanvasBottomTelefonoSmartw',
            // texto:'Móviles, Tablets, E-reader, Smartwatches y Telefonía'
        },
        "Imagen, televisores y proyectores":{
            mostrar: ['#divMarcaModelo',],
            ocultar: ['#divCapacidadRamPulgadas'],
            offcanvas: 'offcanvasBottomImagenTvProyector',
        },
        "Hogar y Jardín": {
            mostrar:['#sizeProduct'],
            ocultar: ['#divCapacidadRamPulgadas','#divMarcaModelo'],
            offcanvas: 'offcanvasBottomHogarJardin',
        },
        "Motos": {
            ocultar: ['#divMarcaModelo', '#sizeProduct', '#divCapacidadRamPulgadas'],
            texto: 'Motos'
        },
        "Otros": {
            ocultar: ['#divMarcaModelo', '#sizeProduct', '#divCapacidadRamPulgadas'],
            texto: 'Otros'
        },
        "Gaming, consolas y videojuegos":{
            mostrar: ['#divMarcaModelo','#divCapacidadRamPulgadas'],
            ocultar: ['#sizeProduct'],
            offcanvas: 'offcanvasBottomGamingConsolaVideojuegos',
        },
        "Moda y accesorios":{
            offcanvas: 'offcanvasBottomfashionAccessory'
        }

    };

    if (categories[trimmedCategory]) {
        const { mostrar, ocultar, offcanvas, texto } = categories[trimmedCategory];
        // Mostrar uno o varios divs
        if (mostrar) {
            if (Array.isArray(mostrar)) {
                mostrar.forEach(selector => mostrarDiv(selector));
            } else {
                mostrarDiv(mostrar);
            }
        }
        // if (mostrar) mostrarDiv(Array.isArray(mostrar) ? mostrar.join(', ') : mostrar);
        // if (ocultar) ocultarDiv(ocultar instanceof Array ? ocultar.join(', ') : ocultar);
        if (ocultar) {
            if (Array.isArray(ocultar)) {
                ocultar.forEach(selector => ocultarDiv(selector));
            } else {
                ocultarDiv(ocultar);
            }
        }
        if (offcanvas) abrirOffcanvas(offcanvas);
        if (texto) {
            cerrarTodosLosOffcanvas();
            category_list_button.innerHTML = `
             <svg style="width: 24px" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                <g fill="none" stroke="#6c757d" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                    <path class="icon-arrow" d="m12.855 9.93 6.07 6.07-6.07 6.07" transform="rotate(-90 16 16)" />
                </g>
            </svg>${texto}
            `;
        }
    }
}
function resetCategoryButton(){
if(_q('.offcanvasBottomCategory')){
    _q('.btn-list-category').innerHTML =`
        <svg style="width: 24px" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
            <g fill="none" stroke="#6c757d" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                <path class="icon-arrow" d="m12.855 9.93 6.07 6.07-6.07 6.07" transform="rotate(-90 16 16)" />
            </g>
        </svg>CATEGORIAS
    `;
}
}

//GESTIONA LAS CATEGORIAS SELECCIONADAS
function gestionarLastCategory(lastCategoryName) {
    console.log(lastCategoryName, "last en gestionlast");

    const trimmedCategory = lastCategoryName.trim();
    const commonConfig = {
        ocultar: ['.tecnologiElectric_only_brand_model','.tecnologiElectric_brand_big', '.tecnologiElectric_brand_model_color', '.color-brand-inche'],
        mostrar: ['.medium-brand-color']
    };
    const comonConfig2 = {
        ocultar: ['.tecnologiElectric_only_brand_model','#divCapacidadRamPulgadas', '.tecnologiElectric_brand_model_color','.tecnologiElectric_brand_big', '.color-brand-model-inche', '.color-brand-inche'],
        mostrar: ['.medium-brand-color'],
    };
    const comonConfig3 = {
        mostrar: ['.color-brand-model-inche', '.small-ram-capacity-ssd'],
        ocultar: ['.tecnologiElectric_only_brand_model','.tecnologiElectric_brand_big','.tecnologiElectric_brand_model_color', '.small-ram-screen-capacity', '.medium-screen-capacity', '.medium-brand-color', '.color-brand-inche'],
    };
    const categories = {
        "brand-color": commonConfig,
        "Drones": commonConfig,
        "onlyBrand": {
            mostrar: ['.tecnologiElectric_brand_big'],
            ocultar: ['.tecnologiElectric_only_brand_model','.color-brand-model-inche','.medium-brand-color', '.tecnologiElectric_brand_model_color', '#divCapacidadRamPulgadas', '.color-brand-inche'],
        },
        "Monitores":{
            mostrar: ['.color-brand-inche'],
            ocultar: ['.tecnologiElectric_only_brand_model','.color-brand-model-inche','.medium-brand-color', '.tecnologiElectric_brand_model_color', '#divCapacidadRamPulgadas', '.tecnologiElectric_brand_big'],
        },
        "only_brand_color":comonConfig2,
        "Smartwatches y pulseras de actividad": {
            ocultar: ['.tecnologiElectric_only_brand_model','#divCapacidadRamPulgadas','.tecnologiElectric_brand_big','.color-brand-model-inche', '.color-brand-inche'],
            // mostrar: '#pulgadaPantallaGrande',
        },
        "E-reader": {
            ocultar: ['.tecnologiElectric_only_brand_model','.tecnologiElectric_brand_big','#memoriaSsdDiv','#pulgadaPantallaGrande', '#ramSmall','#pulgadaPantallaSmall', '.small-ram-screen-capacity', '.color-brand-model-inche', '.small-ram-capacity-ssd', '.color-brand-inche'],
            mostrar:  ['#divMarcaModelo', '#divCapacidadRamPulgadas', '.tecnologiElectric_brand_model_color', '.medium-screen-capacity'],
        },
        "Ordenadores de sobremesa": {
            mostrar: ['#divNewBrand','.small-ram-capacity-ssd','.tecnologiElectric_brand_model_color'],
            ocultar: ['.tecnologiElectric_only_brand_model','.color-brand-model-inche', '.small-ram-screen-capacity', '.medium-screen-capacity', '.medium-brand-color', '.color-brand-inche'],
        },
        "Teléfonos vintage": comonConfig2,
        "Teléfonos fijos": comonConfig2,
        "Otros teléfonos": comonConfig2,
        "Tablets": {
            mostrar:  ['#divMarcaModelo', '#divCapacidadRamPulgadas', '.tecnologiElectric_brand_model_color', '.small-ram-screen-capacity'],
            ocultar: ['.tecnologiElectric_only_brand_model','.medium-screen-capacity','.tecnologiElectric_brand_big', '.color-brand-model-inche', '.small-ram-capacity-ssd', '.color-brand-inche'],
        },
        "Smartphones": {
            // mostrar:  ['#divMarcaModelo', '#divCapacidadRamPulgadas', '.tecnologiElectric_brand_model_color', '.small-ram-screen-capacity'],
            ocultar: ['.tecnologiElectric_only_brand_model','.medium-screen-capacity','.tecnologiElectric_brand_big', '.color-brand-model-inche', '.small-ram-capacity-ssd', '.color-brand-inche'],
        },
        "Portátiles": comonConfig3,
        "TV" : {
            mostrar: ['.color-brand-inche'],
            ocultar: ['.tecnologiElectric_only_brand_model','.color-brand-model-inche','.medium-brand-color', '.tecnologiElectric_brand_model_color', '#divCapacidadRamPulgadas', '.tecnologiElectric_brand_big'],
        },
        "Consolas":comonConfig2,
        "Accesorios y recambios de consolas": {
            mostrar: ['.tecnologiElectric_brand_big'],
            ocultar: ['.tecnologiElectric_only_brand_model','.color-brand-model-inche','.medium-brand-color', '.tecnologiElectric_brand_model_color', '#divCapacidadRamPulgadas', '.color-brand-inche'],
        },
        "Portátiles gaming":comonConfig3,
        "Ordenadores sobremesa gaming":{
            mostrar: ['.small-ram-capacity-ssd','.tecnologiElectric_brand_model_color'],
            ocultar: ['.tecnologiElectric_only_brand_model','.color-brand-model-inche', '.small-ram-screen-capacity', '.medium-screen-capacity', '.medium-brand-color', '.color-brand-inche'],
        },
        "Monitores gaming":{
            mostrar: ['.color-brand-inche'],
            ocultar: ['.tecnologiElectric_only_brand_model','.color-brand-model-inche','.medium-brand-color', '.tecnologiElectric_brand_model_color', '#divCapacidadRamPulgadas', '.tecnologiElectric_brand_big'],
        },
        "Videojuegos":{
            mostrar: ['.tecnologiElectric_only_brand_model'],
            ocultar: ['#divNewBrand','.color-brand-model-inche','.medium-brand-color', '.tecnologiElectric_brand_model_color', '#divCapacidadRamPulgadas', '.color-brand-inche','.tecnologiElectric_brand_big'],
        }
        // "Motos": {
        //     ocultar: ['#divMarcaModelo', '#sizeProduct'],
        //     texto: 'Motos'
        // },
        // "Otros": {
        //     ocultar: ['#divMarcaModelo', '#sizeProduct'],
        //     texto: 'Otros'
        // },

    };

    if (categories[trimmedCategory]) {
        const { mostrar, ocultar} = categories[trimmedCategory];
        // Mostrar uno o varios divs
        if (mostrar) {
            if (Array.isArray(mostrar)) {
                mostrar.forEach(selector => mostrarDiv(selector));
            } else {
                mostrarDiv(mostrar);
            }
        }
        if (ocultar) {
            if (Array.isArray(ocultar)) {
                ocultar.forEach(selector => ocultarDiv(selector));
            } else {
                ocultarDiv(ocultar);
            }
        }
        if (mostrar) mostrarDiv(Array.isArray(mostrar) ? mostrar.join(', ') : mostrar);
        if (ocultar) ocultarDiv(ocultar instanceof Array ? ocultar.join(', ') : ocultar);

    }
}
var genero2='';
function manOrWoman(genero){
    console.log(genero, "HOMBRE MUJER");
    genero2 = genero;
}

//SELECCIONAR CATEGORIA PRINCIPAL de la lista abre canbas, botón grande de categorias
let lastCategoryName = null;
const categoryItems  = document.querySelectorAll('.category-list-option');
categoryItems.forEach(item => {
    item.addEventListener('click', function() {
        console.log("category-list-option");
        lastCategoryName = this.getAttribute('data-category-name');
        if (this.classList.contains('arrowLi')) {
            uncheckInputs();//DESELECCIONAR LOS INPUTS
        }
        // console.log(lastCategoryName, "television");

        if (formularioInfoProductoOculto()) {
            initializeMap();
            mostrarFormularioInfoProducto();
            mostrarFormularioUpImage();
            mostrarFooterAction();
        }

        gestionarCategoria(lastCategoryName);
   });
});

//MUESTRA LA OPCION SELECCIONADA EN EL BOTÓN PRINCIPAL
var category_list_button = document.getElementById('categoriaSeleccionada');
function guardarCambios(categoryName1, categoryName2 = null, categoryName3 = null) {
console.log(categoryName1,"name1");
console.log(categoryName2,"name2");
console.log(categoryName3,"name3");
console.log(lastCategoryName,"last");
// var genero = manOrWoman();
console.log(genero2, "genero");

    if(comprobarCheck() !== 0){//si hay algo marcado
        cerrarTodosLosOffcanvas();

        if(categoryName2 === null || categoryName2 === ''){
            category_list_button.innerHTML = `
            <svg style="width: 24px" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                <g fill="none" stroke="#6c757d" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                    <path class="icon-arrow" d="m12.855 9.93 6.07 6.07-6.07 6.07" transform="rotate(-90 16 16)" />
                </g>
            </svg>\n${categoryName1}\n, ${lastCategoryName}\n
            `;
        }else if(categoryName3 === null || categoryName3 === ''){
            if(genero2 === 'Hombre' || genero2 === 'Mujer'){
                category_list_button.innerHTML = `
            <svg style="width: 24px" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                <g fill="none" stroke="#6c757d" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                    <path class="icon-arrow" d="m12.855 9.93 6.07 6.07-6.07 6.07" transform="rotate(-90 16 16)" />
                </g>
            </svg>\n${categoryName1}\n, \n${genero2}\n, \n${categoryName2}\n, ${lastCategoryName}\n
            `;
            }else{
                category_list_button.innerHTML = `
                <svg style="width: 24px" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                    <g fill="none" stroke="#6c757d" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                        <path class="icon-arrow" d="m12.855 9.93 6.07 6.07-6.07 6.07" transform="rotate(-90 16 16)" />
                    </g>
                </svg>\n${categoryName1}\n, \n${categoryName2}\n, ${lastCategoryName}\n
                `;
            }
        }else{
            if(genero2 === 'Hombre' || genero2 === 'Mujer'){
                category_list_button.innerHTML = `
            <svg style="width: 24px" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                <g fill="none" stroke="#6c757d" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                    <path class="icon-arrow" d="m12.855 9.93 6.07 6.07-6.07 6.07" transform="rotate(-90 16 16)" />
                </g>
            </svg>\n${categoryName1}\n, \n${genero2}\n, \n${categoryName2}\n, \n${categoryName3}\n, \n${lastCategoryName}\n
            `;
            }else{
            category_list_button.innerHTML = `
            <svg style="width: 24px" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                <g fill="none" stroke="#6c757d" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                    <path class="icon-arrow" d="m12.855 9.93 6.07 6.07-6.07 6.07" transform="rotate(-90 16 16)" />
                </g>
            </svg>\n${categoryName1}\n, \n${categoryName2}\n, \n${categoryName3}\n, \n${lastCategoryName}\n
            `;
            }
        }

        const fotografiaCategorias = ['Objetivos', 'Otros artículos de fotografía', 'Cámaras de vigilancia'];
        const informaticaPerifericos = ['Realidad Virtual y aumentada', 'Componentes y piezas de ordenador', 'Accesorios de Informática'];
        const imagenCategorias = ['Otros artículos de imagen', 'Accesorios de TV y proyectores'];
        const pcGamingCategories = [
            'Mandos para PC',
            'Volantes para PC',
            'Altavoces gaming',
            'Micrófonos para PC gamer',
            'Auriculares gaming',
            'Juegos para PC',
            'Accesorios de PC gaming',
            'Manuales y guías de videojuegos',
            'Merchandaising de videojuegos',
            'Mesas gaming',
            'Alfombrillas gaming'
        ];
        const gamingCategories = [
            'Ratones gaming',
            'Teclados gaming',
            'Sillas gaming',
            'Mesas gaming',
            'Alfombrillas gaming'
        ];

        if (
            categoryName1 === 'Fotografía, cámaras y drones' &&
            (fotografiaCategorias.includes(lastCategoryName) || categoryName2 === 'Accesorios de fotografía')
        ) {
            gestionarLastCategory('onlyBrand');
        } else if (
            categoryName1 === 'Móviles, Tablets, E-reader, Smartwatches y Telefonía' &&
            categoryName2 === 'Accesorios de móviles y smartwatches'
        ) {
            gestionarLastCategory('onlyBrand');
        } else if (
            categoryName1 === 'Fotografía, cámaras y drones' &&
            categoryName2 === 'Cámaras'
        ) {
            gestionarLastCategory('brand-color');
        } else if (
            categoryName1 === 'Informática, ordenadores y tablets' &&
            categoryName2 === 'Periféricos'
        ) {
            if (lastCategoryName === 'Monitores') {
                gestionarLastCategory(lastCategoryName);
            } else {
                gestionarLastCategory('only_brand_color');
            }
        } else if (
            categoryName1 === 'Informática, ordenadores y tablets' &&
            informaticaPerifericos.includes(categoryName2)
        ) {
            gestionarLastCategory('onlyBrand');
        } else if (
            categoryName1 === 'Imagen: televisores y proyectores' &&
            lastCategoryName === 'Proyectores'
        ) {
            gestionarLastCategory('only_brand_color');
        } else if (
            categoryName1 === 'Imagen: televisores y proyectores' &&
            (lastCategoryName === 'Otros artículos de imagen' || imagenCategorias.includes(categoryName2))
        ) {
            gestionarLastCategory('onlyBrand');
        } else if (categoryName1 === 'Gaming, consolas y videojuegos' && pcGamingCategories.includes(lastCategoryName)) {

            gestionarLastCategory('onlyBrand');
        } else if (categoryName1 === 'Gaming, consolas y videojuegos' && gamingCategories.includes(lastCategoryName)) {
            gestionarLastCategory('only_brand_color');
        }
        else{
            gestionarLastCategory(lastCategoryName);
        }

    }
}


function hideElement(element)
{
    if (window.matchMedia("(max-width: 980px)").matches) {
        _q(element).style.opacity = '0';
    }

}


function showElement(element){
    _q(element).style.opacity = '1';
}

// SABER QUE UN CAMPO INPUT ESTA RELLENO
function verificarInput(input) {
    // Verificar si el campo de entrada no está vacío
    if(_id(input)){
        if (_id(input).value.trim() !== '') {
            return true;
         } else {
            return false;
         }
    }
}

//TEXTAREA CUENTA LAS LETRAS contador 0/640 truncar si hace copi paste
function contadorPalabras(input, contador, totalLeathers) {

    var  textArea = $(input);
    var charsCounter = $(contador);
    var maxChars = totalLeathers; // Configurar el límite máximo de caracteres
// console.log(textArea, "INPUT");

    textArea.on('input', function() {
        var content = $(this).val();// Obtener el contenido actual del textarea
        var currentChars = content.length;// Obtener la longitud del contenido actual

        // Si el número de caracteres excede el límite
        if (currentChars > maxChars) {
            content = content.substring(0, maxChars); // Truncar el contenido para que no exceda el límite
            $(this).val(content);// Establecer el contenido truncado en el textarea
            currentChars = maxChars;
        }
        charsCounter.text(currentChars + '/' + maxChars);  // Actualizar el contador de caracteres
        if (currentChars >= maxChars) { // Cambiar el color del contador si se ha alcanzado el límite
            charsCounter.css('color', 'red');

        } else {
            charsCounter.css('color', '');
        }
    });
    // Agregar evento keydown al textarea para evitar escribir más allá del límite
    textArea.on('keydown', function(event) {
        var currentChars = $(this).val().length;

        // console.log(currentChars, "letras");

        if (currentChars >= maxChars && event.key.length === 1) {
            event.preventDefault();// Cancelar el evento si ya se alcanzó el límite
        }

    });
}

function contadorDeCaracteresPorDiv(divId, inputClass, contadorClass, maxChars) {
    // console.log('#' + divId + ' ' + 'input'+ inputClass, "INPUT ELEMENT");

    var inputElement = $('#' + divId + ' ' + 'input'+ inputClass);
    var contadorElement = $(contadorClass);

    inputElement.on('input', function() {
        // console.log(inputElement, "INPUT ELEMENT ON");

        var content = $(this).val();
        var currentChars = content.length;

        if (currentChars > maxChars) {
            content = content.substring(0, maxChars);
            $(this).val(content);
            currentChars = maxChars;
        }

        contadorElement.text(currentChars + '/' + maxChars);

        if (currentChars >= maxChars) {
            contadorElement.css('color', 'red');
        } else {
            contadorElement.css('color', '');
        }

         if(divId.includes('pulgadas')){
            var input2 = document.querySelector('#' + divId);
            var agregar = input2.querySelector('div.vscomp-option.current-new span.vscomp-option-text');

            content = content.replace(/[^0-9.]/g, '');

            // Asegurarse de que solo haya un punto decimal
            var parts = content.split('.');
            if (parts.length > 2) {
                content = parts[0] + '.' + parts.slice(1).join('');
            }
            if(agregar !== null){
                agregar.innerHTML= content;//cambiamos tambien la zona de "agregar"
            }
            // Aplicar la nueva cadena de texto
            this.value = content;
        }
    });
}

 //INICIALIZAR CONTADORES
 contadorDeCaracteresPorDiv('selecTecnologiaElectronica_pulgadas1', '.vscomp-search-input', '.chars-counter-Pulgadas', 6);
 contadorDeCaracteresPorDiv('selecTecnologiaElectronica_pulgadas2', '.vscomp-search-input', '.chars-counter-Pulgadas', 6);
 contadorDeCaracteresPorDiv('selecTecnologiaElectronica_pulgadas3', '.vscomp-search-input', '.chars-counter-Pulgadas', 6);
 contadorDeCaracteresPorDiv('selecTecnologiaElectronica_pulgadas4', '.vscomp-search-input', '.chars-counter-Pulgadas', 6);
 contadorDeCaracteresPorDiv('selecTecnologiaElectronica_pulgadas5', '.vscomp-search-input', '.chars-counter-Pulgadas', 6);
 contadorDeCaracteresPorDiv('selecTecnologiaElectronica_pulgadas6', '.vscomp-search-input', '.chars-counter-Pulgadas', 6);


 contadorDeCaracteresPorDiv('selecModeloTecnologiaElectronica_medium1', '.vscomp-search-input', '.chars-counter-modeloTecElect', 50);
 contadorDeCaracteresPorDiv('selecModeloTecnologiaElectronica_medium2', '.vscomp-search-input', '.chars-counter-modeloTecElect', 50);

 contadorDeCaracteresPorDiv('selecTecnologiaElectronica_brand1', '.vscomp-search-input', '.chars-counter-marcaTecElect', 20);
 contadorDeCaracteresPorDiv('selecTecnologiaElectronica_brand2', '.vscomp-search-input', '.chars-counter-marcaTecElect', 20);
 contadorDeCaracteresPorDiv('selecTecnologiaElectronica_brand3', '.vscomp-search-input', '.chars-counter-marcaTecElect', 20);
 contadorDeCaracteresPorDiv('selecTecnologiaElectronica_brand4', '.vscomp-search-input', '.chars-counter-marcaTecElect', 20);
 contadorDeCaracteresPorDiv('selecTecnologiaElectronica_brand5', '.vscomp-search-input', '.chars-counter-marcaTecElect', 20);


 contadorPalabras('#textAreaDescripcion', '.chars-counter', 640);//selecTecnologiaElectronica_brand3
 contadorPalabras('#titulo', '.chars-counter-title', 50);
//  contadorPalabras('#nombreServicio', '.chars-counter-nameService', 50);

function showHelpInfo(infoAbout){
    var textInfo;
    if(infoAbout === 'pulgadas'){
        textInfo = 'El campo "Pulgadas" es obligatorio. Si no encuentras las pulgadas en la lista, puedes crear una nueva etiqueta. Para ello introduce sólo números y un punto si lo necesitas, por ejemplo "69.5"';
    }
    else if(infoAbout === 'marcaTecnologiaElectronica'){
        textInfo = 'El campo "Marca" es obligatorio. Si no encuentras tu marca en la lista, puedes crear una nueva etiqueta con el nombre de tu marca. Puedes usar hasta 20 caracteres para escribirla.';
    }
    else if(infoAbout === 'modeloTecnologiaElectronica'){
        textInfo = 'El campo "Modelo" es obligatorio. Si no encuentras tu modelo en la lista, puedes crear una nueva etiqueta con el nombre de tu modelo. Puedes usar hasta 50 caracteres para escribirlo.';
    }

    showInfoMessage(textInfo);
}


//TOOGLE ENVÍO si no, PARTICULAR empresa
$(document).ready(function() {
    const toggles = document.querySelectorAll(".toggle-btn");
    toggles.forEach(toggle => {
        toggle.addEventListener("click", () => {
            const innerCircle = toggle.querySelector('.inner-circle');
            const knobSi = toggle.querySelector('.knobSi');
            const knobs = toggle.querySelector('.knobs');
            const inputHidden = toggle.nextElementSibling; // Obtener el input hidden siguiente al toggle
            var hidenValue = inputHidden.value;
            const toggleValue = toggle.dataset.value; // Obtener el valor del atributo data-value

            toggle.classList.toggle("active");
            if (toggle.classList.contains('active')) {
                innerCircle.style.marginLeft = '20px';
                knobSi.classList.remove('d-none');
                knobs.classList.add('d-none');
                inputHidden.value = toggleValue; // Asignar el valor del toggle al input hidden
            } else{
                if(!toggle.classList.contains('active') && toggle.classList.contains('profesional')) {
                    inputHidden.value = "Particular";
                }else if(!toggle.classList.contains('active') && !toggle.classList.contains('profesional')){
                    inputHidden.value = "envioNo";
                }
                innerCircle.style.marginLeft = '0px';
                innerCircle.style.transition = "all 300ms ease-in-out";
                knobSi.classList.add('d-none');
                knobs.classList.remove('d-none');

            }
        });
    });

    // //PONER BORDE A HASH CUANDO FOCUS
    // $("#contenedorAcordeonHash .select2-search__field").focus(function() {
    //     $("#contenedorAcordeonHash .acordeonhash").attr("style", "border: 2px solid rgb(24, 0, 72) !important");
    // }).blur(function() {
    //     $("#contenedorAcordeonHash .acordeonhash").css("border", "");// Eliminar el estilo al perder el foco
    // });
});




var currentMarker = null; // Variable global para almacenar el marcador actual
var map;// Variable global para el mapa
var divSearchMap;
function initializeMap() {
     // Verificar si el mapa ya ha sido inicializado
     if (map) {
        console.log("El mapa ya está inicializado.");
        return;  // Si ya está inicializado, no hacer nada
    }

    // Inicializar el div donde se mostrará el mapa
    var divSearchMap = document.getElementById('searchMap');
    var setview = [40.4637, -3.7492]; // Coordenadas para España
    var zoomLevel = 3; // Ajusta el nivel de zoom según tus necesidades
    map = L.map("map").setView(setview, zoomLevel);

    // Agregar la capa de OpenStreetMap
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Añadir el control de búsqueda
    const searchControl = L.esri.Geocoding.geosearch({
        position: "topright",
        expanded: true,
        collapseAfterResult: false,
        placeholder: "Empieza a escribir . .",
        useMapBounds: false,
        providers: [
            L.esri.Geocoding.arcgisOnlineProvider({
                apikey: apiKey,
                nearby: {
                    lat: -33.8688,
                    lng: 151.2093
                }
            })
        ]
    }).addTo(map);

    var currentMarker;
    var selectedAddress = "";  // Variable para almacenar la dirección seleccionada

    // Añadir un evento para manejar los resultados de búsqueda
    searchControl.on("results", function(event) {
        if (event.results.length > 0) {
            var latlng = event.results[0].latlng;

            // Guardar la dirección seleccionada en la variable
            selectedAddress = event.results[0].text; // La dirección completa
            let inputVisualizaDireccion = document.querySelector('.geocoder-control-input');
            inputVisualizaDireccion.value = selectedAddress;
            // Mostrar la dirección seleccionada en la consola (o usarla donde desees)
            console.log("Dirección seleccionada:", selectedAddress);

            // Eliminar el marcador anterior si existe
            if (currentMarker) {
                map.removeLayer(currentMarker);
            }

            // Añadir un nuevo marcador en la ubicación seleccionada
            currentMarker = L.marker(latlng).addTo(map);

            // Centrar el mapa en la nueva ubicación
            map.setView(latlng, zoomLevel);
        }
    });

    // Llamar a invalidateSize después de un pequeño retraso
    setTimeout(function() {
        map.invalidateSize();
    }, 100);

    // Evento para manejar el redimensionamiento de la ventana del navegador
    window.addEventListener('resize', function() {
        setTimeout(function() {
            map.invalidateSize();
        }, 100);
    });
}


// // Llamar a la función initializeMap cuando el DOM esté completamente cargado
// document.addEventListener("DOMContentLoaded", initializeMap);



  //DROPZONE MULTI IMÁGENES ARRASTRAR Y SOLTAR




    // NOTIFICACION
    function notificationAlert() {
        console.log('notificación');

        const notificationData = [
            {
                title: "Formato de archivo inválido",
                body: "Sólo puedes subir imágenes JPG JPEG y PNG",
                // imgUrl: "https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/075007f6-42d1-410f-9cfd-105699dc8c31/devzjrq-861495c9-1341-4c60-87c4-8c0c78cacc75.png"  // Specific image URL for the first notification
                imgUrl: "../storage/logo/Frame.png"
            }
        ];

        notificationData.forEach((data, index) => {
            // setTimeout(() => {
                createNotification(data.title, data.body, data.imgUrl);
        //     }, 1000 + 3000 * index); // Increase delay for each notification
        });
    };

    function createNotification(title, body, imgUrl) {
        const container = document.querySelector('.notification-container');

        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'notification hidden'; // Start hidden to manage transition
        notification.innerHTML =`
        <div style="" class="alert alert-success-dark d-flex p-4 rounded-3" role="alert">
            <i style="font-size: 30px" class="fa fa-exclamation-triangle text-danger me-3 align-self-center" aria-hidden="true"></i>
           <div class="text-content">
                <div class="notification-header">
                    <span class="notification-title">${title}</span>
                    <button style="color:white;" class="close-btn">&times;</button>
                </div>
                <div class="notification-body">${body}</div>
            </div>
        </div>
        `;

        // Insert the new notification at the top of the container
        container.prepend(notification); // Ensures new notifications are added at the top

        // Show notification with a delay to allow CSS transition
        setTimeout(() => {
            notification.classList.remove('hidden');
        }, 100);

        // Set auto-hide with cleanup
        setTimeout(() => {
            notification.classList.add('hidden');

        }, 6000);

        // Close button functionality
        notification.querySelector('.close-btn').addEventListener('click', () => {
            notification.classList.add('hidden');
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 500); // Remove from DOM after transition
        });
    }

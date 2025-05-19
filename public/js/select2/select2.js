
function selectDos() {
    // $selectElement = $('#selecMarcaTecnologiaElectronica').select2({
    //     language: "es",
    //     placeholder: "Buscar . . .",
    //     allowClear: true,
    //     language:{
    //         removeAllItems: function () {
    //             return "Eliminar opción";
    //         }
    //     }
    // }).on('change', function(e) {
    //     quitarLupa('.fasmarcaMovil', $(this).val());
    //     // marcaMovil = $(this).val();
    //     if(selectedValue === 'Informática, ordenadores y tablets'){
    //         if( _name('marcaTecnologiaElectronica').value !== ''){
    //             // insertarCheck('#gifMarcaModeloMovil', '.image_checkMarcaModeloMovil');
    //         }else{
    //             // eliminarCheck('.image_checkMarcaModeloMovil');
    //         }
    //     }else if(selectedValue.trim() === 'Móviles, Telefonía y Smartwatches'){
    //         if( _name('marcaTecnologiaElectronica').value !== '' &&
    //             _name('modeloTecnologiaElectronica').value !== ''){
    //             // insertarCheck('#gifMarcaModeloMovil', '.image_checkMarcaModeloMovil');
    //         }else{
    //             // eliminarCheck('.image_checkMarcaModeloMovil');
    //         }
    //     }
    // }).on("select2:select", function(e) {;

    // });
    // Ruta al controlador para obtener los datos
    // var buscarModeloTecnoElectronica = "modelos-tecnologia-electronica";
    // $selectElement = $('#selecModeloTecnologiaElectronica').select2({
        // language: "es",
        // placeholder: "Buscar . . .",
        // allowClear: true,
        // ajax: {
        //     url: buscarModeloTecnoElectronica, // Ruta al controlador
        //     dataType: 'json',
        //     delay: 250,
        //     data: function (params) {
        //         return {
        //             search: params.term // Parámetro de búsqueda
        //         };
        //     },
        //     processResults: function (data) {
        //         return {
        //             results: data.items // Formatea los resultados
        //         };
        //     },
        //     cache: true
        // },
        // minimumInputLength: 1 // Requiere al menos 1 carácter para buscar
    // });

    $(".chosen-select").chosen({
    //    no_results_text: '<div class="d-grid gap-2"><button" type="button" class="btn btn-dark">Añadir nuev@</button></div><br/><p class="gualazonF" style="margin:0px 5px 10px 0px">No se encuentra la marca o modelo:</p>',
    //    no_results_text: '<div class="d-grid gap-2"><button" type="button" class="btn btn-dark">Añadir nuev@</button></div><br/><p class="gualazonF" style="margin:0px 5px 10px 0px">No se encuentra la marca o modelo:</p>',
       no_results_text:'<p class="gualazonF" style="margin:0px 5px 10px 0px">No se encuentran resultados para:</p>',
       max_selected_options:1,
        disable_search_threshold: 10,
        allow_single_deselect: true
    });



    //EJEMPLO SELECTIZE
    // $('#selecModeloTecnologiaElectronica').selectize({
    //     maxItems: 1,
    //     valueField: 'id',
    //     labelField: 'title',
    //     searchField: 'title',
    //     plugins: ["clear_button"],
    //     create: false
    //   });

    $selectElement = $('#selectDeporte').select2({
        // dropdownParent: $("#deportesModal"),
        language: "es",
        placeholder: "Buscar deporte . . .",
        allowClear: true
    }).on('change', function(e) {
        // console.log("change val=" + $(this).val());
        // quitarLupa('.fasDepor', $(this).val());
        // input_categoria_seleccionada.innerHTML = `<span class="despuesAbajo"></span>\nDeporte y Ocio\n`;
    })



    // $('#selecColorTecnologiaElectronica').select2({
    //     //ocultar input buscador
    //     minimumResultsForSearch: -1,
    //     templateResult: formatState,
    //     templateSelection: formatState,
    //     language: "es",
    //     placeholder: "Buscar color . . .",
    //     allowClear: true
    // }).on('change', function(e) {
    //     console.log("change val=" + $(this).val());
    // });

    // $('#selecColorMediumTecnologiaElectronica').select2({
    //     //ocultar input buscador
    //     minimumResultsForSearch: -1,
    //     templateResult: formatState,
    //     templateSelection: formatState,
    //     language: "es",
    //     placeholder: "Buscar color . . .",
    //     allowClear: true
    // }).on('change', function(e) {
    //     console.log("change val=" + $(this).val());
    // });

    // $selectElement = $('#selectPaisFiscal').select2({ selecColorMediumTecnologiaElectronica
    //     // dropdownParent: $("#deportesModal"),
    //     language: "es",
    //     placeholder: "País de nacimiento",
    //     allowClear: true
    // }).on('change', function(e) {
    //     // console.log("change val=" + $(this).val());
    //     quitarLupa('.fasPaisFiscal', $(this).val());
    //     // input_categoria_seleccionada.innerHTML = `<span class="despuesAbajo"></span>\nDeporte y Ocio\n`;
    // })
    function configurarSelect2(id, placeholderText) {
        return $(id).select2({
            // dropdownParent: $("#deportesModal"),
            language: "es",
            placeholder: placeholderText,
            allowClear: true
        }).on('change', function(e) {
            // console.log("change val=" + $(this).val());
            // quitarLupa('.fasPaisFiscal', $(this).val());
            // input_categoria_seleccionada.innerHTML = `<span class="despuesAbajo"></span>\nDeporte y Ocio\n`;
        });
    }
        $selectElement3 = configurarSelect2('#selectPaisFiscal', 'País de nacimiento');
        $selectElement1 = configurarSelect2('#selectPaisFiscal2', 'País');
        $selectElement2 = configurarSelect2('#selectPaisFiscal3', 'País de emisión del NIF');

    // $selectElement = $('#selectPaisFiscal2').select2({
    //     // dropdownParent: $("#deportesModal"),
    //     language: "es",
    //     placeholder: "País",
    //     allowClear: true
    // }).on('change', function(e) {
    //     // console.log("change val=" + $(this).val());
    //     quitarLupa('.fasPaisFiscal', $(this).val());
    //     // input_categoria_seleccionada.innerHTML = `<span class="despuesAbajo"></span>\nDeporte y Ocio\n`;
    // })
    // $selectElement = $('#selectPaisFiscal3').select2({
    //     // dropdownParent: $("#deportesModal"),
    //     language: "es",
    //     placeholder: "País de emisión del NIF",
    //     allowClear: true
    // }).on('change', function(e) {
    //     // console.log("change val=" + $(this).val());
    //     quitarLupa('.fasPaisFiscal', $(this).val());
    //     // input_categoria_seleccionada.innerHTML = `<span class="despuesAbajo"></span>\nDeporte y Ocio\n`;
    // })
    // $selectElement = $('#selecMarcaTecnologiaElectronica').select2({
    //     language: "es",
    //     placeholder: "Buscar . . .",
    //     allowClear: true
    // }).on('change', function(e) {
    //     // quitarLupa('.fas6', $(this).val());

    // });
        // $selectElement = $('#selecEstado').select2({
        //     minimumResultsForSearch: -1,
        //    language: "es",
        //    placeholder: "Selecciona el estado. . .",
        //    allowClear: true
        // }).on('change', function(e) {
        //     // ponerCheckInfoProducto();
        // });


        // Función que oculta el select2 si es necesario
        // Función que oculta el select2 si es necesario

            $('#selecEstado').select2({
                placeholder: '',
                templateResult: formatOption,  // Formatear las opciones en el menú desplegable
                templateSelection: formatSelection, // Formatear la opción seleccionada (solo texto)
                minimumResultsForSearch: Infinity,  // Ocultar input buscador
                allowClear: true,
                closeOnSelect: false,
            });




       $selectElement = $('#selecMoneda').select2({
        minimumResultsForSearch: -1,
           language: "es",
           placeholder: "€",
           allowClear: true
       }).on('change', function(e) {
            // ponerCheckInfoProducto();
        });

       $('#hash').select2({
           language: "es",
           minimumResultsForSearch: -1,
           // placeholder: "Escribe tres palabras que describan tu producto...",
           maximumSelectionLength: 3,
           tags: true,
           language: {

               noResults: function() {

               return "Escribe tres palabras que describan tu articulo";
               },
               searching: function() {

               return "Buscando .. .";
               },
               maximumSelected: function () {
               return 'Solo puedes crear tres etiquetas.';
                }
           },
           placeholder: function(){
               return 'Escribe tres etiquetas que definan tu producto.';
           },

           });
           $('#hash[multiple]').each(function() {
               $(this).next('.select2').find('textarea').attr('placeholder', $(this).data('placeholder'));
           });

            $('.select2-search__field').css('width', '100%');
            $(document).on('select2:open', function(e) {
            document.querySelector(`[aria-controls="select2-${e.target.id}-results"]`).focus();
       }).on('change', function(e) {
            // ponerCheckInfoProducto();
        });

}
 // Formatear las opciones en el menú desplegable
 function formatOption(option) {
    if (!option.id) {
        return option.text; // Devuelve el texto por defecto si no hay opción seleccionada
    }

    // Obtener la descripción desde el atributo data-description
    // var description = $(option.element).data('description');

    // Crear el HTML que formateará la opción con título y descripción
    var $option = $(
        '<div><strong>' + option.text + '</strong></div>'
    );

    return $option;
}

// Formatear solo el texto para la opción seleccionada
function formatSelectionOnlyText(option) {
    return option.text; // Solo muestra el texto de la opción seleccionada
}

//INICIALIZA DESPLEGABLES MARCA, MODELO, PULGADAS
function initializeVirtualSelectNoRoute(selector) {
    // Seleccionar el elemento
    const element = document.getElementById(selector);

    // Asegurarse de que el elemento y el atributo 'data-options' existen
    if (element && element.getAttribute('data-options')) {
        try {
            // Obtener los datos del atributo data-options y convertirlo en JSON
            const options = JSON.parse(element.getAttribute('data-options'));
            // console.log(options.length, " total opciones pulgadas");

            // Asegurarse de que es un array antes de mapear
            if (Array.isArray(options)) {
                // Formatear los datos para VirtualSelect (se necesita value y label)
                const formattedOptions = options.map(function(option) {
                    return { value: option, label: option };
                });

                // Inicializar VirtualSelect
                VirtualSelect.init({
                    ele: '#'+selector,
                    options: formattedOptions,
                    search: true,  // Habilitar la búsqueda si es necesario
                    placeholder: '',
                    multiple: false,  // Cambia esto si necesitas selección múltiple
                    allowNewOption: false,
                });

            } else {
                console.error('El atributo data-options no es un array válido.');
            }
        } catch (error) {
            console.error('Error al parsear JSON:', error);
        }
    } else {
        console.error('El elemento o el atributo data-options no existe.');
    }
}

function initializeVirtualSelectNoRouteConIdValue(selector) {
    // Seleccionar el elemento
    const element = document.getElementById(selector);

    // Asegurarse de que el elemento y el atributo 'data-options' existen
    if (element && element.getAttribute('data-options')) {
        try {
            // Obtener los datos del atributo data-options y convertirlo en JSON
            const options = JSON.parse(element.getAttribute('data-options'));

            // Asegurarse de que es un array antes de mapear
            if (Array.isArray(options)) {
                // Formatear los datos para VirtualSelect (se necesita value y label)
                const formattedOptions = options.map(function(option) {
                    return {
                        value: option.id,   // Usamos el id como valor
                        label: option.name+" "+option.primer_apellido  // Usamos el name como texto visible
                    };
                });

                // Inicializar VirtualSelect
                VirtualSelect.init({
                    ele: '#'+selector,
                    options: formattedOptions,
                    search: true,  // Habilitar la búsqueda si es necesario
                    placeholder: '',
                    multiple: false,  // Cambia esto si necesitas selección múltiple
                    allowNewOption: false,
                });

            } else {
                console.error('El atributo data-options no es un array válido.');
            }
        } catch (error) {
            console.error('Error al parsear JSON:', error);
        }
    } else {
        console.error('El elemento o el atributo data-options no existe.');
    }
}


//INICIALIZA DESPLEGABLES SSD, RAM, INTERNA
function initializeVirtualSelectNotFoun(selector) {
    // Seleccionar el elemento
    const element = document.getElementById(selector);

    // Asegurarse de que el elemento y el atributo 'data-options' existen
    if (element && element.getAttribute('data-options')) {
        try {
            // Obtener los datos del atributo data-options y convertirlo en JSON
            const options = JSON.parse(element.getAttribute('data-options'));
            // console.log(options.length, " total opciones pulgadas");

            // Asegurarse de que es un array antes de mapear
            if (Array.isArray(options)) {
                // Formatear los datos para VirtualSelect (se necesita value y label)
                const formattedOptions = options.map(function(option) {
                    return { value: option, label: option };
                });

                // Inicializar VirtualSelect
                VirtualSelect.init({
                    ele: '#'+selector,
                    options: formattedOptions,
                    search: false,  // Habilitar la búsqueda si es necesario
                    placeholder: '',
                    multiple: false,  // Cambia esto si necesitas selección múltiple
                    allowNewOption: false,
                });

            } else {
                console.error('El atributo data-options no es un array válido.');
            }
        } catch (error) {
            console.error('Error al parsear JSON:', error);
        }
    } else {
        console.error('El elemento o el atributo data-options no existe.');
    }
}
//INICIALIZA DESPLEGABLES MARCA, MODELO, PULGADAS, ALMACENAMIENTO, RAM, SSD
// function initializeVirtualSelectNoItems(selector) {
//     const options = [
//         {
//             label: 'Nuevo con etiquetas',
//             description: 'Artículo sin estrenar que todavía tiene las etiquetas o está en su embalaje original.',
//             value: 'nuevo_con_etiquetas',
//         },
//         {
//             label: 'Nuevo sin etiquetas',
//             description: 'Artículo sin estrenar que no tiene las etiquetas o el embalaje original.',
//             value: 'nuevo_sin_etiquetas',
//         },
//         {
//             label:' Muy bueno',
//             description: 'Artículo poco usado que puede tener algún defecto menor.',
//             value: 'muy_bueno',
//         },
//         {
//             label:'Bueno',
//             description: 'Artículo usado que puede tener defectos o estar desgastado.',
//             value: 'bueno',
//         },
//         {
//             label:'Satisfactorio',
//             description: 'Artículo bastante usado con defectos o desgaste.',
//             value: 'satisfactorio',
//         },
//       ];


//       // Initialize VirtualSelect
//         VirtualSelect.init({
//         ele: '#'+selector,
//         options: options,
//         // searchBy: 'value', // Búsqueda solo por el valor, para evitar que el texto completo sea usado
//         placeholder: 'Buscar . . .',
//         search: false, // Deshabilitar búsqueda si no es necesario
//         hasOptionDescription: true,
//       });
//       // Eliminar el tooltip de la "X" (botón de limpiar)
//     const clearButton = document.querySelector('#' + selector + ' .vscomp-clear-button');
//     if (clearButton) {
//         clearButton.removeAttribute('title'); // Elimina el atributo title que muestra "Clear"
//     }

// }

//PONE LAS IMÁGENES DE LOS COLORES EN SELECT2 COLOR
function formatState(state) {
    if (!state.id) {
        return state.text;
    }
    var baseUrl = state.element.dataset.image;
    var $state = $(
        '<span><img src="' + baseUrl + '" class="img-color-option" /> ' + state.text + '</span>'
    );
    return $state;
}

// FORMATO DE LAS IMÁGENES DE LOS COLORES EN SELECT2 (SELECCIÓN)
function formatSelection(state) {
    if (!state.id) {
        return state.text;
    }
    var baseUrl = state.element.dataset.image;
    var $state = $(
        '<span><img src="' + baseUrl + '" class="img-color-option" /></span>' // Solo la imagen, sin texto
    );
    return $state;
}

//INICIALIZA DESPLEGABLES COLOR
function initializeSameSelectColor(selector) {
    $(selector).select2({
        maximumSelectionLength: 2,
        minimumResultsForSearch: Infinity,  // Ocultar input buscador
        templateResult: formatState,
        templateSelection: formatSelection,
        closeOnSelect: false,  // Mantener el menú abierto después de seleccionar
        language: {
            noResults: function() {
                return "No se encontraron resultados";
            },
            inputTooShort: function(args) {
                return "Escribe más caracteres...";
            },
            maximumSelected: function () {
                return "Sólo puedes seleccionar 2 colores";  // Mensaje personalizado
            },
            searching: function() {
                return "Buscando...";
            },
            removeAllItems: function() {
                return "Eliminar todos los elementos";
            }
        },
        allowClear: true,
        placeholder: '',
    }).on('change', function(e) {
        // console.log("change val=" + $(this).val());
    }).on('select2:open', function() {
        // Desactiva el campo de búsqueda
        $('.select2-search__field').prop('disabled', true).attr('readonly', true);
    }).on('select2:close', function() {
        // Rehabilita el campo de búsqueda para que no se quede deshabilitado permanentemente
        $('.select2-search__field').prop('disabled', false).removeAttr('readonly');
    }).on('select2:select', function(e) {
        // Si se alcanza el máximo de selección, evitar el cierre
        var maxSelected = $(this).data('select2').options.maximumSelectionLength;
        if ($(this).val().length >= maxSelected) {
            $(this).select2('close'); // Cierra para reflejar el estado máximo alcanzado
            $(this).select2('open');  // Inmediatamente reabre el menú
            $(this).hide(); // Oculta el dropdown para evitar parpadeo
            setTimeout(function() {
                $(this).show(); // Muestra el dropdown de nuevo
            }, 1); // Rápidamente muestra el dropdown sin interrupciones visibles
        }
    });
}



//AL CLICAR EN AGREGAR NUEVA ETIQUETA COMPRUEBA QUE NO EXCEDA PARA TRUNCAR EL TEXTO
//CLICAR PARA DESTRUIR
document.addEventListener('DOMContentLoaded', function () {
    if(_q('.vscomp-option span')){
        var textArea = $('#selecModeloTecnologiaElectronica_medium2 .vscomp-toggle-button div.vscomp-value');
        textArea.on('keydown', function(event) {
            var currentChars = $(this).val().length;
            // console.log(currentChars, "letras");
        });
    }

    document.body.addEventListener('click', function (event) {
        // console.log("HAS HECHO CLICK");
        //DESTRUIR
        // var element = _q('.showInfo');
        // if (element) {
        //     element.remove();
        // }
        //---------------------------------------
        if (event.target && event.target.matches('.vscomp-option span')) {
            // console.log("HAS HECHO CLICK dentro");
            // console.log(document.querySelector('#selecModeloTecnologiaElectronica_medium2 .vscomp-option span.vscomp-option-text'), "CUERYSELECTOR");
            let element = document.querySelector('#selecModeloTecnologiaElectronica_medium2 .vscomp-option span.vscomp-option-text');
            // let element2;
            if(element){
                let element2 = document.querySelector('#selecModeloTecnologiaElectronica_medium2 .vscomp-toggle-button div.vscomp-value');
                let currentText  = element2.innerHTML;
                // console.log(currentText, "CURRENT LEND");

                if (currentText.length > 22) {
                    // Tomar los primeros 'maxLength' caracteres y añadir " . . ."
                    element2.innerHTML  = currentText.slice(0, 15) + ' . . .';
                }
            }
        }
    });
});

// initializeVirtualSelectNoItems('selecEstado');
// initializeEstado('selecEstado')

// initializeVirtualSelectNoRoute('selecTecnologiaElectronica_pulgadas1');
// initializeVirtualSelectNoRoute('selecTecnologiaElectronica_pulgadas2');
// initializeVirtualSelectNoRoute('selecTecnologiaElectronica_pulgadas3');
// initializeVirtualSelectNoRoute('selecTecnologiaElectronica_pulgadas4');
// initializeVirtualSelectNoRoute('selecTecnologiaElectronica_pulgadas5');
// initializeVirtualSelectNoRoute('selecTecnologiaElectronica_pulgadas6');

// initializeVirtualSelectNoRoute('selecModeloTecnologiaElectronica_medium1');
// initializeVirtualSelectNoRoute('selecModeloTecnologiaElectronica_medium2');

// initializeVirtualSelectNotFoun('selecalmacenamientoTecnologiaElectronica1');
// initializeVirtualSelectNotFoun('selecalmacenamientoTecnologiaElectronica2');
// initializeVirtualSelectNotFoun('selecalmacenamientoTecnologiaElectronica3');

// initializeVirtualSelectNotFoun('selecRamTecnologiaElectronica1');
// initializeVirtualSelectNotFoun('selecRamTecnologiaElectronica2');

// initializeVirtualSelectNotFoun('selecSsdTecnologiaElectronica1');
// initializeVirtualSelectNotFoun('selecSsdTecnologiaElectronica2');

// initializeVirtualSelectNoRoute('selecTecnologiaElectronica_brand1');
// initializeVirtualSelectNoRoute('selecTecnologiaElectronica_brand2');
// initializeVirtualSelectNoRoute('selecTecnologiaElectronica_brand3');
// initializeVirtualSelectNoRoute('selecTecnologiaElectronica_brand4');
initializeVirtualSelectNoRouteConIdValue('reseponsableCancelacion001Selected');

initializeSameSelectColor('#selecColorMedium_new_service');
// initializeSameSelectColor('#selecColorMedium');
// initializeSameSelectColor('#selecColorBig');
// initializeSameSelectColor('#selecColorTecnologiaElectronica_medium');
// initializeSameSelectColor('#selecColorTecnologiaElectronica_big');
// selectDos();

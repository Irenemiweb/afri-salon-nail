<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="_token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Gualazon') }}</title> --}}
        @include('metadatos.metadatos-cabecera')
    </head>
    <body class="bg-light  antialiased">
        {{ $slot }}
        {{-- <h1>HOLA DESDE GUEST</h1> --}}
        @stack('modals')

        @livewireScripts
        <script src="{{ asset('js/universal.js') }}"></script>

        <script src="{{ asset('js/login-register.js') }}"></script>
        {{-- <script src="{{ asset('js/tabs.js') }}"></script> --}}
        @stack('scripts')
        <script>
            // Obtener el token CSRF de la etiqueta meta
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

            const inputel = document.querySelector("#telefono");
            if(inputel){
                const iti = window.intlTelInput(inputel, {
                initialCountry: "es", // Cambia "sp" por "es" para España
                geoIpLookup: function(callback) {
                    fetch("https://ipinfo.io", {
                        headers: {
                            'Authorization': `Bearer ${csrfToken}`
                        }
                    })
                    .then(response => response.json())
                    .then(data => callback(data.country))
                    .catch(() => callback('us'));
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // Opcional, pero útil para formatear
            });
            }
function cambiarURL2(ruta) {
    // Obtener la URL actual como objeto URL
    var urlObjeto = new URL(window.location.href);

    // Construir la nueva URL con la ruta pasada como parámetro
    var nuevaURL = urlObjeto.origin + '/laravel/salon-manicura/public/' + ruta + urlObjeto.search + urlObjeto.hash;

    // Actualizar la URL en el historial del navegador sin recargar la página
    window.history.pushState({}, '', nuevaURL);
}
        </script>
    </body>
</html>

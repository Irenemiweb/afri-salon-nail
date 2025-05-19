<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       @auth
            @include('Chatify::layouts.headLinks')
        @endauth
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="_token" content="{{ csrf_token() }}">
        <title class="">Manicura pedicura Ourense uñas | {{ config('app.name') }} Nail art Studio</title>
        @include('metadatos.metadatos-cabecera')

    </head>
    <body class=" antialiased" style="background-color: white">
        {{-- <x-banner /> --}}

        <div class="min-h-screen bg-gray-100">
            {{-- @livewire('navigation-menu') --}}
            {{-- @include('navigation-menu-index') --}}
            <x-cabeceras.navigation-menu-index/>
            {{-- <x-navigation.navigation-category/> --}}
            <main>
                {{-- {{ $slot }} --}}
            </main>
            <x-footer.footer-index/>
        </div>

        @stack('modals')

        @livewireScripts
        {{-- SELECT2 --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        {{-- <script src="{{ asset('js/select2/select2.js') }}"></script> --}}
        <script src="{{ asset('js/owl.carousel.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/navigation-menu.js') }}"></script>
        <script src="{{ asset('js/offcanva-reserva-servicio/offcanvaReservaServicio.js') }}"></script>
        <script src="{{ asset('js/universal.js') }}"></script>
        @auth
        @include('Chatify::layouts.footerLinks')
    @endauth

    </body>
</html>

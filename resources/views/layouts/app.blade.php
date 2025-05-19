<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('Chatify::layouts.headLinks')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="_token" content="{{ csrf_token() }}">
        <title class="">Manicura pedicura Ourense uñas | {{ config('app.name') }} Nail art Studio</title>
        <meta property="og:locale" content="es_ES">
        <meta property="og:type" content="website">
        <link rel="canonical" href="http://salonnail.kesug.com/">
        <meta property="og:title" content="{{ config('app.name') }} Salón NAILS Ourense - {{ config('app.name') }} Salón Ourense">
        <meta property="og:description" content="Salón de Manicura y Pedicura en Ourense Bienvenid@s a {{ config('app.name') }} Nail art Studio. Somos un centro con una amplia variedad de tratamientos de manicura y pedicura junto con otros opciones destinadas a vuestra belleza. Te esperamos en Ourense. RESERVAR CITA PREVIA http://salonnail.kesug.com/ TRATAMIENTOS Uñas & Belleza Manicura rusa Cuidamos de tus uñas y hacemos que luzcan perfectas. […]">

        <meta property="og:url" content="http://salonnail.kesug.com/">
        <meta property="og:site_name" content="{{ config('app.name') }} Salón Ourense">
        {{-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet"> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.15/index.global.min.js"></script> --}}
        <script src="{{ asset('js/calendar/index.global.min.js') }}"></script>
        <script src="{{ asset('js/calendar/es.js') }}"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/locales/es.js"></script> --}}

        @include('metadatos.metadatos-cabecera')
        {{-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script> --}}
        {{-- <script src="https://js.pusher.com/7.2.0/pusher.min.js"></script> --}}
        <script src="{{ asset('js/pusher/pusherNew.js') }}"></script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<style>
 #map {
      width: 100%;
      height: 200px; /* Ajusta la altura según tus necesidades */
      border-radius: 10px;
      z-index: 9;
    }
</style>
    </head>
    <body class=" antialiased bg-light">

        <x-cabeceras.navigation-menu/>



        <!-- Page Content -->
        <main class="" style="height: calc(100vh - 4.3rem);">
            {{ $slot }}

        </main>

        @stack('modals')

        @livewireScripts
        <script>
        const apiKey = "AAPK5eb2850a48944a4aa03bc623ff6ce83d8EZPfBhRFfmpAKpHYqpDyuByIiTDR-kMlYyYgrHj5YVEuL3QnBLAtEmyvs29JPmc";

        </script>
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- FilePond JS -->
        <script src="{{ asset('js/filepon/filepond.js') }}"></script>
        <script src="{{ asset('js/filepon/filepond-plugin-image-preview.min.js') }}"></script>
        <script src="{{ asset('js/filepon/filepond-plugin-file-validate-type.js') }}"></script>
        <script src="{{ asset('js/filepon/filepond-plugin-image-edit.js') }}"></script>

        <script>
           FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginImageEdit);
        </script>
<script src="{{ asset('assets2/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
    $(document).ready(function () {

initIsotope('.isotope-container', '.isotope-item', '*', '.isotope-filters [data-filter]', 'data-filter');

});
function initIsotope(container, item, filter, isotop_filter, data_filter){
    // Inicializar Isotope
    // console.log("initIsotope");
    var $grid = $(container).isotope({
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
        console.log(filterValue, "filtervalue");

        $grid.isotope({ filter: filterValue });
        $(isotop_filter).removeClass('filter-active');
        $(this).addClass('filter-active');
        if (data_filter === 'data-filter') {
            $(isotop_filter).removeClass('category_bgcolor--gray_PmXQU');
            $(this).addClass('category_bgcolor--gray_PmXQU');
        }
    });
}

</script>
        <!-- Chosen JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
        {{-- virtualSelect --}}
        <script src="{{ asset('js/virtualSelect/virtual-select.min.js') }}"></script>
        <script src="{{ asset('js/virtualSelect/tooltip.min.js') }}"></script>
        {{-- SELECT2 --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
        <script src="{{ asset('js/select2/select2.js') }}"></script>
         {{-- banner --}}
         {{-- <script src="{{ asset('js/banner_manicura/banner_manicura.js') }}"></script> --}}
        {{-- --}}
        <script src="{{ asset('js/offcanva-reserva-servicio/offcanvaReservaServicio.js') }}"></script>
        <script src="{{ asset('js/universal.js') }}"></script>
        <script src="{{ asset('js/up-product.js') }}"></script>
        <script src="{{ asset('js/login-register.js') }}"></script>
        <script src="{{ asset('js/tabs.js') }}"></script>
        {{-- calendar --}}
        <script src="{{ asset('js/calendar/calendar.js') }}"></script>
        {{-- <script src="{{ asset('js/calendar/initCalendar.js') }}"></script> --}}
        {{-- dropzone --}}
        <link rel="stylesheet" href="{{ asset('css/dropzone/dropzone.css') }}" rel="stylesheet">
        @include('Chatify::layouts.footerLinks')
        @stack('scripts')
    </body>
</html>

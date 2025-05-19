<title class="">Manicura pedicura Ourense uñas | {{ config('app.name') }} Nail art Studio</title>

{{-- Meta tags --}}
<meta property="og:locale" content="es_ES">
<meta property="og:type" content="website">
<link rel="canonical" href="http://salonnail.kesug.com/">
<meta property="og:title" content="{{ config('app.name') }} Salón NAILS Ourense - {{ config('app.name') }} Salón Ourense">
<meta property="og:description" content="Salón de Manicura y Pedicura en Ourense Bienvenid@s a {{ config('app.name') }} Nail art Studio. Somos un centro con una amplia variedad de tratamientos de manicura y pedicura junto con otros opciones destinadas a vuestra belleza. Te esperamos en Ourense. RESERVAR CITA PREVIA http://salonnail.kesug.com/ TRATAMIENTOS Uñas & Belleza Manicura rusa Cuidamos de tus uñas y hacemos que luzcan perfectas. […]">

<meta property="og:url" content="http://salonnail.kesug.com/">
<meta property="og:site_name" content="{{ config('app.name') }} Salón Ourense">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="id" content="{{ $id ?? 0 }}">
<meta name="messenger-color" content="{{ $messengerColor ?? '#2180f3' }}">
<meta name="messenger-theme" content="{{ $dark_mode ?? 'light' }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="_token" content="{{ csrf_token() }}">

<meta name="url" content="{{ url('').'/'.config('chatify.routes.prefix') }}" data-user="{{ Auth::user()->id }}">

{{-- scripts --}}
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/chatify/font.awesome.min.js') }}"></script>
<script src="{{ asset('js/chatify/autosize.js') }}"></script>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

{{-- styles --}}
<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
<link href="{{ asset('css/chatify/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/chatify/' . ($dark_mode ?? 'light') . '.mode.css') }}" rel="stylesheet" />

{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" /> --}}

{{-- Setting messenger primary color to css --}}
<style>
    :root {
        --primary-color: {{ $messengerColor ?? '#2180f3' }};
    }
</style>

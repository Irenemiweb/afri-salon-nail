<!DOCTYPE html>
<html lang="es">
<head>
    @auth
        @include('Chatify::layouts.headLinks')
    @endauth
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="_token" content="{{ csrf_token() }}">
        <meta property="og:locale" content="es_ES">
        <meta property="og:type" content="website">
        <link rel="canonical" href="http://salonnail.kesug.com/">
        <meta property="og:title" content="{{ config('app.name') }} Salón NAILS Ourense - {{ config('app.name') }} Salón Ourense">
        <meta property="og:description" content="Salón de Manicura y Pedicura en Ourense Bienvenid@s a {{ config('app.name') }} Nail art Studio. Somos un centro con una amplia variedad de tratamientos de manicura y pedicura junto con otros opciones destinadas a vuestra belleza. Te esperamos en Ourense. RESERVAR CITA PREVIA http://salonnail.kesug.com/ TRATAMIENTOS Uñas & Belleza Manicura rusa Cuidamos de tus uñas y hacemos que luzcan perfectas. […]">

        <meta property="og:url" content="http://salonnail.kesug.com/">
        <meta property="og:site_name" content="{{ config('app.name') }} Salón Ourense">
        {{-- <title class="">Manicura pedicura Ourense uñas | {{ config('app.name') }}</title> --}}
        {{-- telefonos del mundo --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<!-- fuentes -->
<link rel="stylesheet" href="{{ asset('css/fonts.css') }}" rel="stylesheet">
{{-- calendario de javascript --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>



<!-- cabecera -->
<link rel="stylesheet" href="{{ asset('css/cabecera/cabecera.css') }}" rel="stylesheet">

{{-- offcanva reserva servicio --}}
<link rel="stylesheet" href="{{ asset('css/offcanva-reserva-servicio/offcanvaReservaServicio.css') }}" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{ asset('css/css-carousel/owl.theme.css') }}" rel="stylesheet"> --}}
<link rel="stylesheet" href="{{ asset('css/fonts.css') }}" rel="stylesheet">

<!-- style category-list -->
<link rel="stylesheet" href="{{ asset('css/up-product/category-list/category-list.css') }}" rel="stylesheet">
<!-- botones -->
<link rel="stylesheet" href="{{ asset('css/btn/btn.css') }}" rel="stylesheet">

{{--footer --}}
<link rel="stylesheet" href="{{ asset('css/footer/footer.css') }}" rel="stylesheet">
{{--responsive --}}
{{-- <link rel="stylesheet" href="{{ asset('css/responsive/panel-admin/responsive-panel-admin.css') }}" rel="stylesheet"> --}}
<title class="">Manicura pedicura Ourense uñas | {{ config('app.name') }}</title>
{{-- icono --}}
{{-- <link style="margin-left:3px;!important" rel="icon" type="image/svg" href="{{ asset('storage/cabecera/logo_Y.svg') }}"> --}}
{{-- <link style="margin-left:3px;!important" rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/logo-leather/letra3.png') }}"> --}}
{{-- mensajes --}}
<link rel="stylesheet" href="{{ asset('css/message/alert-message.css') }}" rel="stylesheet">
<!-- todo -->
{{-- <link rel="stylesheet" href="{{ asset('css/universal.css') }}" rel="stylesheet"> --}}
<!-- tabs -->
{{-- <link rel="stylesheet" href="{{ asset('css/tabs/tabs.css') }}" rel="stylesheet"> --}}
<!-- input color -->
{{-- <link rel="stylesheet" href="{{ asset('css/circulo-comun/circuloComun.css') }}" rel="stylesheet"> --}}
{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- ESRI MAP --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
<!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet@3.0.12/dist/esri-leaflet.js"></script>
<!-- Load Esri Leaflet Geocoder from CDN -->
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.css" crossorigin="" />
<script src="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.js" crossorigin=""></script>
<!--Tiny Slider -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
        {{-- @include('metadatos.metadatos-cabecera') --}}

        {{-- icono --}}
<link style="margin-left:3px;!important" sizes="32x32" rel="icon" type="image/svg" href="{{ asset('storage/cabecera/logo_C.svg') }}">
        <!-- Favicons -->
  {{-- <link href="{{ asset('storage/img/favicon.png') }}" rel="icon"> --}}
  <link href="{{ asset('storage/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
  <!-- Fonts -->
 <!-- <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->

  <!-- <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script> -->


  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets2/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  {{-- aos libreria --}}
 {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}
  <link href="{{ asset('assets2/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('css/aos/aosCss.css') }}" rel="stylesheet">
 {{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}
 <script src="{{ asset('js/aos/aosJs.js') }}"></script>

  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"> --}}
  {{-- <link href="{{ asset('assets2/vendor/aos/aos.css') }}" rel="stylesheet"> --}}

  <link href="{{ asset('assets2/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets2/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
<!-- todo -->
<!-- style log-in and register -->
<link rel="stylesheet" href="{{ asset('css/login-register.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets2/css/main.css') }}" rel="stylesheet">
  <script src="{{ asset('js/pusher/pusherNew.js') }}"></script>
        <style>

body{
    /* overflow-x: hidden; */
}
body.offcanvas.show{
    overflow: hidden;
}
.icon-serviciosP, .icon-serviciosM, .icon-serviciosDM, .icon-serviciosED {
    background-image: url("./storage/icon-index/pedicura.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    width: 150px;
    height: 150px;
    display: block;
}
.icon-serviciosM{
    background-image: url("./storage/icon-index/manicura_22.jpg");
    background-size: cover;
    background-repeat: no-repeat;
}
.icon-serviciosDM{
    background-image: url("./storage/icon-index/mirada3.png");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
.icon-serviciosED{
    background-image: url("./storage/icon-index/joyaDental2.png");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
            /*tarjetas reservas*/
 .reservDiv{
    align-items: stretch;
    background: #fff;
    /* border: 1px solid #ebebeb; */
    border-radius: 8px;
    display: flex;
    padding: 12px 16px;
    box-shadow: 0 6px 10px 0 rgba(0, 0, 0, .11);
 }
 .reservDiv1{
    flex-grow: 2;
    width: 50%;
 }
 .reservDiv1H3{
    color: #383734;
    line-height: 20px;
    margin-bottom: 5px;
    word-break: break-word;
 }
 .reservDiv1Text{
    align-items: flex-start;
    display: flex;
    flex-wrap: wrap;
 }
 .reservDiv1TextSpan{
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    display: -webkit-box;
    margin-bottom: 4px;
    max-height: 32px;
    overflow: hidden;
    padding-right: 20px;
    text-overflow: ellipsis;
    width: 100%;
    word-break: break-word;
    color: hsla(0, 0%, 9%, .7);
    line-height: 16px;
    font-size: 14px;
    letter-spacing: .09px;
    font-family: 'gualazonF';
 }
 .reservDiv2{
    display: flex;
    flex-direction: column;
 }
 .reservDiv21{
    margin-bottom: 0;
    border: none;
    margin-left: 12px;
    position: relative;
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
    padding: 1rem 1rem 1rem 0;
    width: 100%;
 }
 .price_buton{
    display: flex;
    /* flex-wrap: wrap; */
    justify-content: flex-end;
 }
 .service-price{
    color: #383734;
    display: block;
    text-align: right;
    white-space: nowrap;
    ont-size: 14px;
    letter-spacing: .09px;
    line-height: 18px;
    font-family: 'gualazonF';
 }
 .service-duration{
    /* white-space: pre; */
    color: #a9a9a9;
    display: block;
    text-align: right;
    font-size: 12px;
    letter-spacing: .08px;
    line-height: 16px;
    font-family: 'gualazonF';
 }
 .divButonReserv{
    margin-left: 12px;

 }
 .divButonReservSmall{
    /* background: rgb(61, 121, 90); */
    background: black;
    /* background: #00a3ad; */
    border: 1px solid black;
    /* border: 1px solid #00a3ad; */
    color: #fff;
    /* color: #b0d7c3; */
    padding: 6px 8px;
    -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
    box-sizing: border-box;
    cursor: pointer;
    display: inline-block;
    font-weight: 600;
    outline: 0;
    text-align: center;
    transition: opacity .2s ease-out;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    border-radius: 7px;
    overflow: hidden;
 }
  /*css para el scroll*/
main::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0);
	border-radius: 10px;
	background-color: white;
}
main::-webkit-scrollbar

{
	/* width: 12px; */
    width: 0px;
    width: 5px;
}

main::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0);
	background-color: #cbcecf;
    /* border: 1px solid black; */
}
.tipoLetra{
    font-family: var(--heading-font);
    font-size: 16px;
    margin-left: 10px;
}
/*precios*/
.contenedorPrecios{
    /* background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url("./storage/banner/nails_31.png"); */
    background-image: linear-gradient(0deg, #000000cc, #fff), url(./storage/banner/nails_2.jpg);
}
#services{
    background-image: linear-gradient(0deg, #00000000, #ffffff), url(./storage/banner/margarita_rosa.jpg);
    background-size: cover;
    /* background-position: bottom; */
    background-repeat: no-repeat;
}
.u-container-style {
    background: #f8f9fa;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.u-container-style:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

.u-text-palette-3-base {
    /* color: #007bff !important; */
    color: #3d795a;
}

.u-text-default {
    margin-bottom: 0;
}
/*inverso animate*/
/* Estilo inverso cuando el elemento deja de ser visible */
[data-aos].aos-inverse {
    opacity: 0;
    transform: translateY(20px); /* Animación inversa */
}
.message_initPage .listOfContactNotChat .redPoin{
    margin-left: 19px;
}

</style>
</head>
@auth
    @include('Chatify::layouts.footerLinks')
@endauth
<div class="" >
    <body class="index-page">
        <div id="loaderSperaAdministrator" class="loader d-none">
            <div class="spinner"></div>
        </div>
        <div class="login_register_now" id="contentContainer_login_register">
            {{-- @include('longin-frist') index_page_inicioStart--}}
        </div>
        <main class="main index_page_inicioStart">
            <div class="topbar d-flex align-items-center" style="height: 45px;">
                <div class="container d-flex justify-content-center justify-content-md-between">
                  <div class="contact-info d-flex align-items-center">
                    <small>{{ $initPage }}, INIT PAGE</small>
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@example.com</small>
                  </div>
                  <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#" class="twitter"><i style="font-size: 20px" class="bi bi-twitter-x"></i></a>
                    <a href="#" class="facebook"><i style="font-size: 20px" class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i style="font-size: 20px" class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i style="font-size: 20px" class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            <header id="header" class="header sticky-top">



                <nav class="branding d-flex align-items-cente">

                  <div class="position-relative d-flex justify-content-between w-100"  style="margin-left: 1rem;margin-right:1rem;align-items: anchor-center;">
                    <a href="{{ route('init_page') }}" class="logo debajoBrandig" style="">

                      <h1 class="sitename" style="font-family: HachiMaruPop">
                      {{-- <img style="width: 7rem;filter: drop-shadow(2px 4px 6px black);" class="servicios" src="{{ asset('storage/logo/logo_mya.png') }}" alt="subir anuncio" /> --}}
                         {{-- <span style="filter: drop-shadow(2px 4px 6px #39882c);">MYA</span> --}}
                         @include('logo_mya', ['width' => '16rem'])
                         <span style="margin-left: -25px;color:#f7c4bf;font-size: 32px;" class="spanInicioColetilla floritundia_coletilla">Nail Art Studio</span>
                      </h1>
                    </a>
                    {{-- <div style="opacity: 0; pointer-events: none" class="botonesNav d-flex align-items-center" id="botonesNav">
                        <div class="d-flex">
                            @guest
                            <div class="" data-aos="fade-right" style="margin-right: 25px;">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                <a href="{{ route('login') }}" class="btn-get-startedPink3">Entrar o Registrarse</a>
                            </div>
                            @endguest
                            <div data-aos="fade-down">
                                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span style="color: #b0d7c3;">Conócenos.</span></a>
                            </div>
                            <div class="" data-aos="fade-left">
                                <a onclick="userIsAutenticated('botonDorado');" href="#services" class="">
                                    <img style="width: 16rem;filter:drop-shadow(2px 0px 6px white);" class="mensajes" src="{{ asset('storage/cabecera/reservar_rosa_arriba.png') }}" alt="entrar o registrarse" />

                                </a>
                            </div>
                        </div>
                    </div> --}}

                    <nav id="navmenu" class="navmenu">
                      <ul style="">
                        <li class="dropdown"><a href="javascript:void(0);"><span>Menú</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#about">Nosotros</a></li>
                                <li><a href="#portfolio">Portfolio</a></li>
                                <li><a href="#team">Equipo</a></li>
                                <li><a href="#contact">Contact</a></li>
                                <li><a href="#prices">Precios</a></li>
                              </ul>
                        </li>


                        {{-- <div class="dropdown">
                            <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                             Menú
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="#about">Nosotros</a></li>
                              <li><a class="dropdown-item" href="#portfolio">Portfolio</a></li>
                              <li><a class="dropdown-item" href="#team">Equipo</a></li>
                              <li><a href="#contact">Contact</a></li>
                              <li><a href="#prices">Precios</a></li>
                            </ul>
                          </div> --}}
                          {{-- <li><a href="#about">Nosotros</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#team">Equipo</a></li> --}}
                        @if (Auth::check())
                            @if (Auth::check() && Auth::user()->is_admin)
                            <li class="dropdown"><a href="javascript:void(0);"><span>Panel</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                @else
                            <li class="dropdown"><a href="javascript:void(0);"><span>Panel</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            @endif
                            <ul>
                              <li>
                                  <a href="{{ route('panelAdmin_user') }}" wire:navigate>
                                      <img style="" class="rounded-circle imgCabecera" width="35" height="35" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                      <span class="">Tú</span>
                                  </a>
                              </li>
                              <li class="message_initPage">
                                  <a href="{{ route('panelAdmin_user_Message') }}" >
                                      <img style="width: 35px;filter: invert(1);" class="mensajes" src="{{ asset('storage/cabecera/mail_w.svg') }}" alt="mensajes" />
                                      <span class="">Mensajes</span>
                                      <div class="listOfContacts listOfContactNotChat" style="width: 100%;height:0px;">
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                      <img style="filter: invert(1);" class="salir" width="35" height="35" src="{{ asset('storage/cabecera/log-out_w.svg') }}" alt="Salir" />
                                      {{ __('Log Out') }}
                                  </a>
                                  <form style="margin-bottom: 0px" method="POST" id="logout-form" action="{{ route('logout') }}">
                                      @csrf
                                  </form>
                              </li>
                              @if (Auth::check() && Auth::user()->is_admin)
                                  <li><a href="{{ route('admin.dashboard') }}">
                                          <img style="margin-right: 5px;filter: invert(1);" width= "35px" height="35px" class="" src="{{ asset('storage/cabecera/panel_w.svg') }}" alt="Panel de administrador" />
                                          Panel
                                      </a>
                                  </li>
                                  <li><a href="{{ route('admin.citas') }}" class="notificationNewReservIndex">
                                          <img style="width: 35px;filter: invert(1);" class="mensajes" src="{{ asset('storage/cabecera/notificacion.svg') }}" alt="subir anuncio" />
                                          <span class="ms-1">Notificaciones</span>
                                      </a>
                                  </li>
                              @else
                              <li>
                                <a href="{{ route('panelAdmin_user') }}" onclick="getContacts(); getFavoritesList();">
                                      <img style="margin-right: 5px;filter: invert(1);" width= "35px" height="35px" class="" src="{{ asset('storage/cabecera/panel_w.svg') }}" alt="{{ __('Upload ad')  }}" />
                                      Panel User
                                  </a>
                              </li>
                              @endif
                              </ul>
                          </li>
                        @endif
                        <li><a href="#hero" class="active">Inicio</a></li>
                        <li><a href="#services">Servicios</a></li>
                      </ul>
                      <i class="mobile-nav-toggle bi bi-list" style="font-size: 2.5rem;"></i>
                    </nav>

                  </div>

                </nav>

              </header>
          <section id="hero" class="hero section light-background">
            <div class="container">
              <div class="row gy-4">
                <div class="col-lg-12 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="">
                  <div class="buttons-container" id="buttonsContainer">
                    <div class="marque marque-grande" style="padding-top: 3rem;width: auto;height: auto;top:inherit">
                        <ul class="marquee-content2" style="padding: 0px;">
                            <li data-aos="fade-right" data-aos-delay="1000">
                                <div class="circle99 circle991"></div>
                                <h3 class="title99">Gel</h3>
                            </li>
                            <li  data-aos="fade-right" data-aos-delay="2000">
                                <div class="circle99 circle992">
                                </div>
                                <h3 class="title99">Acrílico</h3>
                            </li>
                            <li  data-aos="fade-right" data-aos-delay="3000">
                                <div class="circle99 circle993"></div>
                                <h3 class="title99">Bodas</h3>
                            </li>
                          <li  data-aos="fade-right" data-aos-delay="1000">
                            <div class="circle99 circle994">
                            </div>
                            <h3 class="title99">Nail Art</h3>
                        </li>
                          <li data-aos="fade-right" data-aos-delay="2000">
                            <div class="circle99 circle995"> </div>
                            <h3 class="title99">Pedicura</h3>
                        </li>
                        </ul>
                    </div>

                    <h3 class="title99 marqueTitle">
                        <img style="position: absolute"  data-aos="zoom-in-up" data-aos-delay="3000" style="filter:drop-shadow(2px 0px 6px white);" class="mensajes imgReservNow muchoMas" src="{{ asset('storage/cabecera/mas__.png') }}" alt="mucho mas en mya salon Nail" />
                    </h3>
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-3 text-center reservarAhora" data-aos="fade-right" style="">
                            <a href="{{ Auth::check() ? '#services' : 'javascript:void(0);' }}" class="{{ Auth::check() ? '' : 'entrar_registrase' }}">
                                <img style="width: 16rem;filter:drop-shadow(2px 0px 6px white);" class="mensajes imgReservNow" src="{{ asset('storage/img/reservNow.png') }}" alt="entrar o registrarse" />
                            </a>

                        </div>
                        <div class="salon_mya col-12 col-md-6 col-lg-3 text-center" data-aos="fade-down" data-aos-delay="100">
                            <a href="javascript:void(0);" class="entrar_registrase2">
                                <img style="width: 16rem;filter:drop-shadow(2px 0px 6px white);" class="mensajes" src="{{ asset('storage/cabecera/africa_salon.png') }}" alt="entrar o registrarse" />

                            </a>
                        </div>
                        <div class="horario col-12 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                                    <img style="width: 16rem;filter:drop-shadow(2px 0px 6px white);" class="mensajes" src="{{ asset('storage/cabecera/horario_diario.png') }}" alt="entrar o registrarse" />

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-left" data-aos-delay="600">
                                    <img style="width: 16rem;filter:drop-shadow(2px 0px 6px white);" class="mensajes" src="{{ asset('storage/cabecera/horario_saba.png') }}" alt="entrar o registrarse" />

                                </div>

                            </div>
                        </div>
                        {{-- @guest
                        <div class="" data-aos="fade-right" style="margin-right: 25px;">
                            <a href="javascript:void(0);" class="entrar_registrase">
                                <img style="width: 16rem;filter:drop-shadow(2px 0px 6px white);" class="mensajes" src="{{ asset('storage/cabecera/entrar_rosa.png') }}" alt="entrar o registrarse" />

                            </a>

                        </div>
                        @endguest --}}
                        {{-- <div data-aos="fade-down">
                            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span style="color: #b0d7c3;">Conócenos.</span></a>
                        </div> --}}
                        {{-- <div class="" data-aos="fade-left">
                            <a onclick="userIsAutenticated('botonDorado');" href="#services" class="">
                                <img style="width: 20rem;filter: drop-shadow(2px 0px 6px white);" class="mensajes" src="{{ asset('storage/cabecera/reservar_verde.png') }}" alt="reservar cita online" />

                            </a>
                        </div> --}}
                    </div>

                    {{-- <div class="row">
                        <div class="col-12">
                            <a href="javascript:void(0);" class="entrar_registrase">
                                <img style="width: 16rem;filter:drop-shadow(2px 0px 6px white);" class="mensajes" src="{{ asset('storage/cabecera/Frame58.png') }}" alt="entrar o registrarse" />

                            </a>
                        </div>
                    </div> --}}
                  </div>
                </div>
              </div>
              <div class="marquee marqueContacto">
                <ul class="marquee-content">
                    <li>
                        <i class="">
                            <img style="width: 20rem;" class="mensajes" src="{{ asset('storage/img/contacto1.png') }}" alt="entrar o registrarse" />
                        </i>
                    </li>
                    <li><i class=""></i></li>
                    <li>
                        <i class="">
                            <img style="width: 20rem;" class="mensajes" src="{{ asset('storage/img/contacto2.png') }}" alt="entrar o registrarse" />
                        </i>
                    </li>
                  <li><i class=""></i></li>
                  <li>
                    <i class="">
                        <img style="width: 20rem;" class="mensajes" src="{{ asset('storage/img/reserv_now.png') }}" alt="entrar o registrarse" />
                    </i>
                </li>
                </ul>
              </div>
            </div>
          </section>

          <section id="featured-services" class="featured-services section">
            <div class="container">
              <div class="row gy-4">
                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                  <div class="service-item position-relative">
                    <div class="icon"><i class="icon-serviciosM rounded-circle imgCabecera"></i>
                    </div>
                    <h4><a href="" class="stretched-link">Manicura</a></h4>
                    <p>Cuidamos de tus uñas y hacemos que luzcan perfectas.</p>
                  </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                  <div class="service-item position-relative">
                    <div class="icon"><i class="icon-serviciosP rounded-circle imgCabecera"></i></div>
                    <h4><a href="" class="stretched-link">Pedicura</a></h4>
                    <p>Nuestros pies son la base de muchas de nuestras actividades cotidianas. Sin embargo, y a pesar de que se trata de una de las partes del cuerpo más delicadas, muchas veces nos olvidamos de ellos en nuestro cuidado diario.</p>
                  </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                  <div class="service-item position-relative">
                    <div class="icon"><i class="icon-serviciosDM rounded-circle imgCabecera"> </i></div>
                    <h4><a href="" class="stretched-link">Diseño de la mirada</a></h4>
                    <p>La mirada es una de las características más expresivas de nuestro rostro, y resaltarla adecuadamente puede marcar la diferencia.
                         {{-- en nuestra apariencia.
                        Las cejas juegan un papel fundamental en la estética facial, ya que enmarcan los ojos y definen la expresión de nuestro rostro.
                        Parece mentira que algo tan pequeño pueda tener tanto poder, pero unas pestañas largas, tupidas y curvadas son capaces de agrandar los ojos, darles un aspecto más atractivo e incluso rejuvenecerlos cuando pasan los años. --}}
                    </p>
                  </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                  <div class="service-item position-relative">
                    <div class="icon"><i class="icon-serviciosED rounded-circle imgCabecera"></i></div>
                    <h4><a href="" class="stretched-link">Estética dental</a></h4>
                    <p>Las joyas dentales, también conocidas como «tooth gems» o «dental bling» han emergido como una tendencia fascinante en el mundo de la moda dental.

                        Estos pequeños adornos, que van desde diamantes hasta cristales de colores, se adhieren a los dientes para añadir un toque de brillo y personalidad a tu sonrisa.</p>
                  </div>
                </div>

              </div>

            </div>

          </section>

          <!-- About Section -->
          <section id="about" class="about section light-background" style="padding-top: 0px">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up" style="padding-bottom: 24px;filter: drop-shadow(2px -2px 11px white);">
              <h2>Nosotros</h2>
              <p>
                <span style="display: block">Salón de uñas en Ourense</span>
                <img style="width: 16rem;filter:drop-shadow(2px 0px 6px white);" class="mensajes" src="{{ asset('storage/img/Frame63.png') }}" alt="entrar o registrarse" />

            </p>
              <span style="filter: drop-shadow(2px -2px 11px white);"><p style="font-size: 15px;filter: drop-shadow(2px -2px 11px white);">
                Somos un centro con una amplia variedad de tratamientos de manicura y pedicura junto con otras opciones destinadas a vuestra belleza.
                Te esperamos en Ourense.
            </p></span>
            </div><!-- End Section Title -->

            <div class="container">

              <div class="row gy-3">

                <div class="col-lg-6 d-flex justify-content-center relleno__" data-aos="fade-up" data-aos-delay="100">
                  {{-- <img src="{{ asset('storage/img/unias_transparente.png') }}" alt="" class="img-fluid"> --}}
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                  <div class="about-content ps-0 ps-lg-3" style="filter: drop-shadow(2px -2px 11px white);">
                    <h3 style="filter: drop-shadow(2px -2px 11px white);">Profesionalidad y calidad en el cuidado de tus uñas en Ourense</h3>
                    <p class="fst-italic" style="color: black;filter: drop-shadow(2px -2px 11px white);font-weight: 600;">
                        MYA Nail art studio es un salón de uñas en Ourense en el que te ofrecemos una gran variedad de diseños, esmaltados, decoraciones y tratamientos para tus manos y pies.
                    </p>
                    <h3 style="filter: drop-shadow(2px -2px 11px white);">¿Qué nos diferencia del resto de salones de uñas?</h3>
                    <ul class="nosotros_movil">
                      <li>
                        <i class="">@include('iconos.icon-megafono')</i>
                        <div>
                            <h4>Últimas novedades</h4>
                          <p>Nos encanta estar al tanto de las últimas tendencias en manicura y pedicura, así que, ¡ven a nuestro salón y te asesoraremos!</p>

                        </div>
                      </li>
                      <li>
                        <i class="">@include('iconos.icon-profesionales')</i>
                        <div>
                            <h4>Profesionalidad</h4>
                            <p>Para conseguir los mejores resultados, trabajamos con gran profesionalidad y, sobre todo, con productos de calidad, ya que nuestro principal objetivo es la satisfacción de nuestros clientes.</p>
                        </div>
                      </li>
                      <li>
                        <i class="">@include('iconos.icon-amable')</i>
                        <div>
                            <h4>Ámabilidad y cercanía</h4>
                          <p>En primer lugar, buscamos garantizar un buen resultado en nuestros trabajos y, para ello, es necesario un trato cercano, sincero y directo con nuestros clientes para conocer sus gustos y necesidades. Además, solo trabajamos con productos de calidad para lograr el mejor cuidado y los mejores resultados en tus manos y pies. No es necesario que traigas un diseño pensado; los primeros minutos de tu sesión los dedicaremos a asesorarte sobre el color, el diseño o las últimas tendencias que mejor se ajusten a lo que buscas.</p>

                        </div>
                      </li>
                    </ul>

                  </div>

                </div>
              </div>

            </div>

          </section><!-- /About Section -->

          <!-- Skills Section -->
          {{-- <section id="skills" class="skills section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

              <div class="row skills-content skills-animation">

                <div class="col-lg-6">

                  <div class="progress">
                    <span class="skill"><span>HTML</span> <i class="val">100%</i></span>
                    <div class="progress-bar-wrap">
                      <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>

                  <div class="progress">
                    <span class="skill"><span>CSS</span> <i class="val">90%</i></span>
                    <div class="progress-bar-wrap">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>

                  <div class="progress">
                    <span class="skill"><span>JavaScript</span> <i class="val">75%</i></span>
                    <div class="progress-bar-wrap">
                      <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>

                </div>

                <div class="col-lg-6">

                  <div class="progress">
                    <span class="skill"><span>PHP</span> <i class="val">80%</i></span>
                    <div class="progress-bar-wrap">
                      <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>

                  <div class="progress">
                    <span class="skill"><span>WordPress/CMS</span> <i class="val">90%</i></span>
                    <div class="progress-bar-wrap">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>

                  <div class="progress">
                    <span class="skill"><span>Photoshop</span> <i class="val">55%</i></span>
                    <div class="progress-bar-wrap">
                      <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>

                </div>

              </div>

            </div>

          </section> --}}

          <!-- Stats Section -->
          <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

              <div class="row gy-4">

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                  <i class="bi bi-emoji-smile"></i>
                  <div class="stats-item">
                    <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Client@s felices</p>
                  </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                  <i class="">@include('iconos.manicuraVerde')</i>
                  <div class="stats-item">
                    <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Manicuras</p>
                  </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                  <i class=""> @include('iconos.pedicuraVerde')</i>
                  <div class="stats-item">
                    <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Pedicuras</p>
                  </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="">@include('iconos.otrosTrabajosVerde')</i>
                  <div class="stats-item">
                    <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Otros</p>
                  </div>
                </div><!-- End Stats Item -->

              </div>

            </div>

          </section><!-- /Stats Section -->
          <div class="container section-title" data-aos="fade-up" style="padding-bottom: 21px">
            <p><span>Nuestros clientes</span> <span class="description-title"></br>Registrados</span></p>
          </div><!-- End Section Title -->
     <!-- Clients Section -->
<section id="clients" class="clients section light-background">
    <div class="container">
      <div class="swiper init-swiper">
        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": 4,
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 2,
                "spaceBetween": 40
              },
              "480": {
                "slidesPerView": 3,
                "spaceBetween": 60
              },
              "640": {
                "slidesPerView": 4,
                "spaceBetween": 80
              },
              "992": {
                "slidesPerView": 4,
                "spaceBetween": 120
              }
            }
          }
        </script>

        <div class="swiper-wrapper align-items-center">
          @foreach ($clientes as $cliente)
            <div class="swiper-slide" style="display: flex;align-content: center;">
                <img style="" class="rounded-circle imgCabecera imgProfileInformation" width="50" height="50" src="{{ $cliente->profile_photo_url }}" alt="{{ $cliente->name }}" />
                <div class=" align-content-center">
                    <span class="tipoLetra">{{ $cliente->name }}</span>
                </div>
              {{-- <img src="{{ $cliente->profile_photo_path) }}" class="img-fluid" alt="{{ $cliente->nombre ?? 'Cliente' }}"> --}}
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <!-- /Clients Section -->


          <!-- Services Section -->
          <section id="services" class="portfolio services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Servicios</h2>
              <p><span>Reserva tu cita en nuestro salon de uñas de Ourense</span></p>
              {{-- <p><span class="description-title" style=";
    padding: 1rem;"> Reserva Online es fácil y práctico</span></p> --}}
            </div><!-- End Section Title -->

            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="fitRows" data-sort="original-order">
                    <!-- Filtros de la galería -->
                    <ul class="portfolio-filters isotope-filtersIndex" data-aos="fade-up" data-aos-delay="100">
                        {{-- Filtro para mostrar todos --}}
                        <li data-filterIndex="*" class="filter-active">Todos</li>
                        {{-- Bucle para recorrer todas las categorías de la base de datos --}}
                        @foreach ($categoriasIndex as $index => $categoria)
                            <li data-filterIndex=".filter-{{ Str::slug($categoria->categoria, '') }}Index">
                                {{ $categoria->categoria }}
                            </li>
                        @endforeach
                    </ul>


                    <!-- Contenedor de servicios filtrables -->
                    <div class="row gy-4 isotope-container isotope-containerIndex" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($servicios as $index => $servicio)
                        @php
                            // Convertir la categoría a minúsculas, quitar acentos y caracteres especiales, y reemplazar espacios por guiones
                            $categoriaSlug = strtolower(str_replace(' ', '-', preg_replace('/[^A-Za-z0-9\-]/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $servicio->categoria))));
                        @endphp
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-itemIndex filter-{{ $categoriaSlug }}Index">
                            <div class="service-item position-relative">
                                @php
                                    // Asegurarse de que la fecha actual no sea sábado o domingo
                                    if ($fechaActual2->isSaturday() || $fechaActual2->isSunday()) {
                                        $fechaActual2 = $fechaActual2->next(Carbon\Carbon::MONDAY);
                                    }
                                @endphp
                                <div class="row" style="padding-bottom: 2rem">
                                    <div class="" style="position: relative;z-index: 9;">
                                        <button onclick="userIsAutenticated();initDatePikerSoloMes('{{ $index }}');" data-dateActual="{{ $fechaActual2 }}"  data-index="{{ $index }}" class="divButonReservSmall" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottomReserva{{ $index }}" aria-controls="offcanvasBottomReserva{{ $index }}">
                                            Reservar
                                        </button>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="col-9 stretched-link" style="text-align: left">
                                        <h3 style="margin:inherit">{{ $servicio->nombre }}</h3>
                                        <p>{{ $servicio->descripcion }}</p>
                                    </div>
                                    <div class="col-3" style="margin-top: 5px;">
                                        <div class="service-price">
                                           {{$servicio->precio}}€
                                        </div>
                                        <span class="service-duration">
                                            @if ($servicio->horaNewService > 0)
                                                {{ $servicio->horaNewService }}h {{ $servicio->minutosNewService }}min
                                            @else
                                                {{ $servicio->minutosNewService }}min
                                            @endif
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <x-reserva.servicio.offcanva-reserva-servicio :servicio="$servicio" :index="$index" />
                        @endforeach
                    </div><!-- End Portfolio Container -->
                </div>
            </div>


          </section><!-- /Services Section -->
          <div style="padding-top: 1rem" class="container section-title" data-aos="fade-up">
            <h2>Opiniones</h2>
            <p><span>Nuestros clientes</span> <span class="description-title">opinan sobre nosotros</span></p>
          </div><!-- End Section Title -->
          <!-- Testimonials Section -->
          <section id="testimonials" class="testimonials section dark-background">

            <img src="{{ asset('storage/img/testimonials-bg.jpg') }}" class="testimonials-bg" alt="">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

              <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                  {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                      "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                      "el": ".swiper-pagination",
                      "type": "bullets",
                      "clickable": true
                    }
                  }
                </script>
                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <img src="{{ asset('storage/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                      <h3>Saul Goodman</h3>
                      <h4>Ceo &amp; Founder</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <img src="{{ asset('storage/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
                      <h3>Sara Wilsson</h3>
                      <h4>Designer</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="{{ asset('storage/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
                        <h3>Jena Karlis</h3>
                        <h4>Store Owner</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="{{ asset('storage/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
                        <h3>Matt Brandon</h3>
                        <h4>Freelancer</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="{{ asset('storage/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
                        <h3>John Larson</h3>
                        <h4>Entrepreneur</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>


                </div>
                <div class="swiper-pagination"></div>
              </div>

            </div>

          </section>







          <section id="portfolio" class="portfolio section">

            <div class="container section-title" data-aos="fade-up">
              <h2>Portfolio</h2>
              <p><span>Check Our&nbsp;</span> <span class="description-title">Portfolio</span></p>
            </div>
            <div class="container">
              <div class="isotope-layout" data-default-filter="*" data-layout="fitRows" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                  <li data-filter="*" class="filter-active">All</li>
                  <li data-filter=".filter-app">App</li>
                  <li data-filter=".filter-product">Card</li>
                  <li data-filter=".filter-branding">Web</li>
                </ul>

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <img src="{{ asset('storage/img/masonry-portfolio/masonry-portfolio-1.jpg') }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>Lorem ipsum, dolor sit</p>
                            <a href="{{ asset('storage/img/masonry-portfolio/masonry-portfolio-1.jpg') }}" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <img src="{{ asset('storage/img/masonry-portfolio/masonry-portfolio-2.jpg') }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Product 1</h4>
                            <p>Lorem ipsum, dolor sit</p>
                            <a href="{{ asset('storage/img/masonry-portfolio/masonry-portfolio-2.jpg') }}" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <img src="{{ asset('storage/img/masonry-portfolio/masonry-portfolio-3.jpg') }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Branding 1</h4>
                            <p>Lorem ipsum, dolor sit</p>
                            <a href="{{ asset('storage/img/masonry-portfolio/masonry-portfolio-3.jpg') }}" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>

                </div>
              </div>
            </div>
          </section>
          <div id="prices" style="height: 5rem;">

          </div>
<!-- Prices Section -->
<section  class="prices section contenedorPrecios" data-aos="fade-up" style="min-height: 85vh;">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Lista de Precios</h2>
        <p><span>Conoce nuestros</span> <span class="description-title">Servicios y Precios</span></p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            @foreach ($servicios as $index => $servicio)
                <div class="col-lg-6 col-md-6 col-sm-12" data-aos="fade-down
                "
                data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="u-container-style u-list-item u-repeater-item u-video-cover u-white"
                         style="border-radius: 10px; padding: 20px; display: flex; justify-content: space-between; align-items: center; transition: transform 0.3s ease;">
                        <!-- Nombre del Servicio -->
                        <h4 class="u-text u-text-default"
                            style="color: #333; font-size: 1.5rem; margin: 0;">
                            {{ $servicio->nombre }}
                        </h4>
                        <!-- Precio -->
                        <h4 class="u-text u-text-default u-text-palette-3-base"
                            style="font-size: 1.5rem; margin: 0;">
                            €{{ $servicio->precio }}
                        </h4>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <div class="col-12 w-100 justify-content-center d-flex position-relative" data-aos="fade-down" style="bottom: -44px">
        <div class="d-flex" style="">
            <a onclick="userIsAutenticated('botonDorado');" href="#services" class="butonGreen text-capitalize">RESERVAR CITA AHORA</a>
        </div>
    </div>
</section><!-- /Prices Section -->


          <section id="team" class="team section light-background" style="min-height: 86vh;">


            <div class="container section-title" data-aos="fade-up">
              <h2>Equipo</h2>
              <p><span>NUESTRO GRAN</span> <span class="description-title">EQUIPO</span></p>
            </div>

            <div class="container">
                <div class="row gy-4 justify-content-evenly">
                    @foreach ($empleadas as $index => $empleada)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="{{ $index % 2 == 0 ? 'fade-up' : 'fade-down' }}"
                    data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="team-member">
                            <div class="member-img" data-img="{{ asset('storage/' . $empleada->img_empleada) }}">
                                {{-- <img src="{{ asset('storage/' . $empleada->img_empleada) }}" class="img-fluid" alt=""> --}}
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ $empleada->nombre }}</h4>
                                <span>Técnica manicurista</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-down" data-aos-delay="200">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('storage/img/team/team-2.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('storage/img/team/team-3.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-down" data-aos-delay="400">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('storage/img/team/team-4.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
          </section>


          <section id="pricing" class="pricing section">


            <div class="container section-title" data-aos="fade-up">
              <h2>Ofertas</h2>
              <p><span>Ofertas de la </span> <span class="description-title">semana</span></p>
            </div>

            <div class="container">

              <div class="row gy-3">

                <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                  <div class="pricing-item">
                    <h3>Free</h3>
                    <h4><sup>$</sup>0<span> / month</span></h4>
                    <ul>
                      <li>Aida dere</li>
                      <li>Nec feugiat nisl</li>
                      <li>Nulla at volutpat dola</li>
                      <li class="na">Pharetra massa</li>
                      <li class="na">Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                      <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                  <div class="pricing-item featured">
                    <h3>Business</h3>
                    <h4><sup>$</sup>19<span> / month</span></h4>
                    <ul>
                      <li>Aida dere</li>
                      <li>Nec feugiat nisl</li>
                      <li>Nulla at volutpat dola</li>
                      <li>Pharetra massa</li>
                      <li class="na">Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                      <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="400">
                  <div class="pricing-item">
                    <h3>Developer</h3>
                    <h4><sup>$</sup>29<span> / month</span></h4>
                    <ul>
                      <li>Aida dere</li>
                      <li>Nec feugiat nisl</li>
                      <li>Nulla at volutpat dola</li>
                      <li>Pharetra massa</li>
                      <li>Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                      <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="400">
                  <div class="pricing-item">
                    <span class="advanced">Advanced</span>
                    <h3>Ultimate</h3>
                    <h4><sup>$</sup>49<span> / month</span></h4>
                    <ul>
                      <li>Aida dere</li>
                      <li>Nec feugiat nisl</li>
                      <li>Nulla at volutpat dola</li>
                      <li>Pharetra massa</li>
                      <li>Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                      <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                  </div>
                </div>

              </div>

            </div>

          </section>


          <section id="faq" class="faq section light-background">


            <div class="container section-title" data-aos="fade-up">
              <h2>F.A.Q</h2>
              <p><span>Preguntas</span> <span class="description-title">Frecuentes</span></p>
            </div>

            <div class="container">

              <div class="row justify-content-center">

                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

                  <div class="faq-container">

                    <div class="faq-item faq-active">
                      <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                      <div class="faq-content">
                        <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                      </div>
                      <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>

                    <div class="faq-item">
                      <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                      <div class="faq-content">
                        <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                      </div>
                      <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                      <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                      <div class="faq-content">
                        <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                      </div>
                      <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                      <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                      <div class="faq-content">
                        <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                      </div>
                      <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                      <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                      <div class="faq-content">
                        <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                      </div>
                      <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                      <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                      <div class="faq-content">
                        <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi. Distinctio ipsam dolore et.</p>
                      </div>
                      <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                  </div>

                </div><!-- End Faq Column-->

              </div>

            </div>

          </section><!-- /Faq Section -->

          <!-- Contact Section -->
          <section id="contact" class="contact section" style="padding-top: 25px">
            <div class="container text-center">
                <p class="gualazonF" style="font-size: 22px;font-weight: 700;"><span class="good" style="color: #3d795a;font-size:3rem;">MYA</span><span class="floritundia_coletilla" style="color: #3d795a;font-size:3rem"> Nail Art Studio</span>, tu salón de uñas en Ourense.</br>

                    Si buscas la manicura o pedicura perfecta para tu día a día o para una ocasión especial, no dudes en visitar nuestro salón de uñas en Ourense. ¡Te esperamos!</p>
            </div>
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up" style="padding-bottom: 19px;">
              <h2>Contacto</h2>
              <p><span>Necesitas ayuda?</span> <span class="description-title">Contacta con nosotros</span></p>

            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

              <div class="row gy-4">

                <div class="col-lg-5">

                  <div class="info-wrap">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                      <i class="bi bi-geo-alt flex-shrink-0"></i>
                      <div>
                        <h3>Address</h3>
                        <p>A108 Adam Street, New York, NY 535022</p>
                      </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                      <i class="bi bi-telephone flex-shrink-0"></i>
                      <div>
                        <h3>Call Us</h3>
                        <p>+1 5589 55488 55</p>
                      </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                      <i class="bi bi-envelope flex-shrink-0"></i>
                      <div>
                        <h3>Email Us</h3>
                        <p>info@example.com</p>
                      </div>
                    </div><!-- End Info Item -->

                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
                </div>

                <div class="col-lg-7">
                  <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">

                      <div class="col-md-6">
                        <label for="name-field" class="pb-2">Your Name</label>
                        <input type="text" name="name" id="name-field" class="form-control" required="">
                      </div>

                      <div class="col-md-6">
                        <label for="email-field" class="pb-2">Your Email</label>
                        <input type="email" class="form-control" name="email" id="email-field" required="">
                      </div>

                      <div class="col-md-12">
                        <label for="subject-field" class="pb-2">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject-field" required="">
                      </div>

                      <div class="col-md-12">
                        <label for="message-field" class="pb-2">Message</label>
                        <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                      </div>

                      <div class="col-md-12 text-center">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>

                        <button type="submit">Send Message</button>
                      </div>

                    </div>
                  </form>
                </div><!-- End Contact Form -->

              </div>

            </div>

          </section><!-- /Contact Section -->

        </main>



        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>


<!-- Vendor JS Files -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script> --}}
{{-- <script src="{{ asset('assets2/vendor/aos/aos.js') }}"></script> --}}
@stack('modals')


<!-- Main JS File -->

@livewireScripts
<script src="{{ asset('js/login-register.js') }}"></script>

@stack('scripts')

{{-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script> --}}
  <script>
 // Obtener el token CSRF de la etiqueta meta telefonos banderas
 var csrfToken8901 = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

const inputel = document.querySelector("#telefono");
if(inputel){
    const iti = window.intlTelInput(inputel, {
    initialCountry: "es", // Cambia "sp" por "es" para España
    geoIpLookup: function(callback) {
        fetch("https://ipinfo.io", {
            headers: {
                'Authorization': `Bearer ${csrfToken8901}`
            }
        })
        .then(response => response.json())
        .then(data => callback(data.country))
        .catch(() => callback('us'));
    },
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // Opcional, pero útil para formatear
});
}

    //INVIERTE EL AOS PARA QUE CUANDO NO SE VEAN DESAPAREZCAN LOS DIVS
    document.addEventListener('DOMContentLoaded', () => {
    const elements = document.querySelectorAll('[data-aos]');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('aos-animate');
                entry.target.classList.remove('aos-inverse');
            } else {
                entry.target.classList.remove('aos-animate');
                entry.target.classList.add('aos-inverse'); // Aplicar animación inversa
            }
        });
    });

    elements.forEach(el => observer.observe(el));
});
    //--------------------
   AOS.init({
    offset: 120,
    duration: 3000,
});
// k´kkk
  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="{{ asset('assets2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets2/vendor/php-email-form/validate.js') }}"></script>
{{-- <script src="{{ asset('assets2/vendor/aos/aos.js') }}"></script> --}}
<script src="{{ asset('assets2/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets2/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('assets2/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets2/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets2/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets2/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
{{-- <script src="{{ asset('assets2/js/main.js') }}"></script> --}}
<script src="{{ asset('js/indexInicio/indexInicio.js') }}"></script>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
    $(document).ready(function () {
    // Inicializar Isotope
    var $grid = $('.isotope-containerIndex').isotope({
        itemSelector: '.isotope-itemIndex',  // Selector de los elementos filtrables
        layoutMode: 'fitRows'           // Tipo de layout
    });

    // Manejar el clic en los filtros
    $('.isotope-filtersIndex [data-filterIndex]').on('click', function () {
        console.log("clic isotopeIndex");

        var filterValue = $(this).attr('data-filterIndex');
        console.log(filterValue, "filtervalue");

        $grid.isotope({ filter: filterValue });
        $('.isotope-filtersIndex [data-filterIndex]').removeClass('filter-active');
        $(this).addClass('filter-active');
    });
});

//poner background-image a las imágenes de los empleados
document.querySelectorAll('.member-img').forEach(el => {
    el.style.backgroundImage = `url('${el.getAttribute('data-img')}')`;
    el.style.backgroundSize = 'cover';
    el.style.backgroundPosition = 'center';
});


//CARGAR LA VISTA REGISTER
</script>

      </body>
</div>

</html>
{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']); --}}
{{-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script> --}}
{{-- <script src="https://js.pusher.com/7.2.0/pusher.min.js"></script> --}}

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        getContacts();
        getFavoritesList();
    });
</script> --}}
{{-- SELECT2 --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
{{-- <script src="{{ asset('js/select2/select2.js') }}"></script> --}}
  {{-- banner --}}
{{-- <script src="{{ asset('js/banner_manicura/banner_manicura.js') }}"></script> --}}

<script src="{{ asset('js/navigation-menu.js') }}"></script>
<script src="{{ asset('js/offcanva-reserva-servicio/offcanvaReservaServicio.js') }}"></script>
{{-- <script src="{{ asset('js/universal.js') }}"></script> --}}

<script src="{{ asset('js/universal.js') }}"></script>

{{-- calendar --}}
{{-- <script src="{{ asset('js/calendar/calendar.js') }}"></script> --}}

@auth
    @if(isset($executeJavaScript2) && $executeJavaScript2)
    <p>se ejecuta execteJavaScript2</p>
    @else
    {{-- <p>No vengo</p> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            getContacts();
            getFavoritesList();
        });
    console.log("no se ejecuta execteJavaScript2");

    </script>
    @endif
    <script>

    // Pusher.logToConsole = true;

    // var pusher = new Pusher('5c6372eb4b8fe681a214', {
    // cluster: 'eu'
    // });

    // var channel = pusher.subscribe('reservas');
    // channel.bind('NewReserv', function(data) {
    // alert(JSON.stringify(data));
    // });
    </script>
    {{-- @include('Chatify::layouts.footerLinks') --}}
@endauth

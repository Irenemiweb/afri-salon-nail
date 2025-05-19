
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
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
    <meta property="og:title" content="{{ config('app.name') }} Salón NAILS Ourense - {{ config('app.name') }} Salón uñas Ourense">
    <meta property="og:description" content="Salón de Manicura y Pedicura en Ourense Bienvenid@s a {{ config('app.name') }} Nail art Studio. Somos un centro con una amplia variedad de tratamientos de manicura y pedicura junto con otros opciones destinadas a vuestra belleza. Te esperamos en Ourense. RESERVAR CITA PREVIA http://salonnail.kesug.com/ TRATAMIENTOS Uñas & Belleza Manicura rusa Cuidamos de tus uñas y hacemos que luzcan perfectas. […]">

    <meta property="og:url" content="http://salonnail.kesug.com/">
    <meta property="og:site_name" content="{{ config('app.name') }} Salón Ourense">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Stylesheets-->
    <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css2/bootstrap2.css') }}">
  <link rel="stylesheet" href="{{ asset('css2/fonts2.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
  <link rel="stylesheet" href="{{ asset('css2/style2.css') }}">
  <link href="{{ asset('assets2/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('css/aos/aosCss.css') }}" rel="stylesheet">
  <script src="{{ asset('js/aos/aosJs.js') }}"></script>
  <title class="">Manicura pedicura Ourense uñas | {{ config('app.name') }}</title>
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
  <link href="{{ asset('assets2/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('assets2/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet"> --}}
<!-- todo -->
<!-- style log-in and register -->
<link rel="stylesheet" href="{{ asset('css/login-register.css') }}" rel="stylesheet">
<script src="{{ asset('js/pusher/pusherNew.js') }}"></script>
          {{-- @include('metadatos.metadatos-cabecera') --}}

        {{-- icono --}}
<link style="" sizes="512x512" rel="icon" type="image/svg" href="{{ asset('storage/cabecera/logo_CC.svg') }}">
        <!-- Favicons -->
  <link href="{{ asset('storage/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('storage/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <meta name="theme-color" content="#cef1ea">
    <!-- Tu head existente -->
    <link rel="manifest" href="manifest.json">
{{-- mensajes --}}
<link rel="stylesheet" href="{{ asset('css/message/alert-message.css') }}" rel="stylesheet">
  {{-- calendario de javascript --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
<link rel="stylesheet" href="{{ asset('css/indexverdi.css') }}" rel="stylesheet">

  </head>
@auth
    @include('Chatify::layouts.footerLinks')
@endauth
  <body class="bodyIndex">
{{-- <h1>{{ $initPage }}</h1> --}}
    <div id="loaderInitPage" class="loader2 d-none">
        {{-- <div class="spinner"></div> --}}
    </div>
     <div id="loaderSperaAdministrator" class="loaderWhite d-none">
            <div class="spinnerGreen"></div>
        </div>
        <div class="login_register_now" id="contentContainer_login_register">
            {{-- @include('longin-frist') index_page_inicioStart--}}
        </div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-jumping"><span></span><span></span><span></span><span></span><span></span></div>
      </div>
    </div>

    <div class="page index_page_inicioStart">
      <!-- Modal  aceptar notificaciones sonoras-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 style="z-index: 999" class="modal-title fs-5 afri position-relative" id="exampleModalLabel">Afri Nail art Studio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                 <span class="next-element9" data-parallax-scroll='{"y": 30, "x": 0, "smoothness": 50}'></span>
                    <span class="next-element4" data-parallax-scroll='{"y": 30, "x": 0, "smoothness": 50}'></span>
                    <span class=" position-relative">
                Con el fin de enviarte noticias, descuentos, novedades y que puedas
                    escuchar cuando un usuario te envía un mensaje por nuestro chat, recuerda aceptar recibir
                    >notificaciones sonoras.
                    ¿Aceptas recibir notificaciones sonoras?
                    </span>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="btnCancelarNotificaciones">Cancelar</button>
                <button style="color: black" class="btn btn-primary aceptarNotificacions" id="btnAceptarNotificaciones">Aceptar</button>
            </div>
            </div>
        </div>
        </div>
      <!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-aside-outer rd-navbar-collapse">
              <div class="rd-navbar-aside">
                <div class="header-info">
                  <ul class="list-inline list-inline-md">
                    <li>
                    </li>
                    <li>
                      <div class="unit unit-spacing-xs align-items-center">
                            {{-- <div class="unit-left font-weight-bold">Tienes dudas ?</div>
                            <div class="unit-body">
                                <a href="https://wa.me/34682499506" target="_blank">
                                    <i class="fa-brands fa-whatsapp" style="color: #63E6BE;"></i>
                                </a>
                            </div> --}}
                        <div class="unit-left font-weight-bold">Free Call:</div>
                        <div class="unit-body"><a href="tel:#">(073) 123-12-12</a></div>
                      </div>
                    </li>
                    <li>
                      <div class="unit unit-spacing-xs align-items-center">
                        <div class="unit-left font-weight-bold">Opening Hours: </div>
                        <div class="unit-body"> Mn-Fr: 10 am-8 pm</div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="social-block">
                  <ul class="list-inline">
                    <li><a class="icon fa-facebook" href="#"></a></li>
                    <li><a class="icon fa-twitter" href="#"></a></li>
                    <li><a class="icon fa-google-plus" href="#"></a></li>
                    <li><a class="icon fa-vimeo" href="#"></a></li>
                    <li><a class="icon fa-youtube" href="#"></a></li>
                    <li><a class="icon fa-pinterest-p" href="#"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main" style="max-width: inherit;margin-left: inherit;margin-right: inherit;">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand">
                    <a class="brand" href="index.html">
                        <img src="{{ asset('storage/images/logo-dark-main-257x84.png') }}" alt="afri salon uñas ourense" width="" height=""/>
                    </a>
                </div>
                {{-- boton reservar --}}
                </div>
               <div class="rd-navbar-main-element">
                    <div class="rd-navbar-nav-wrap">
                        <!-- RD Navbar Nav-->
                        <ul class="rd-navbar-nav">
                            <li class="rd-nav-item active">
                                <a class="rd-nav-link" href="{{ url('/') }}">Inicio</a>
                            </li>
                            <li class="rd-nav-item">
                                <a class="rd-nav-link" href="#">Menú</a>
                                <!-- Submenú desplegable -->
                                <ul class="rd-menu rd-navbar-dropdown" style="background-color: #f5f4f4;">
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ url('about-us') }}">Nosotros</a></li>
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ url('pricing') }}">Precios</a></li>
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ url('contacts') }}">Contacto</a></li>
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ url('portfolio') }}">Portafolio</a></li>
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ url('team') }}">Equipo</a></li>
                                </ul>
                            </li>

                            <li class="rd-nav-item"><a class="rd-nav-link" href="{{ url('typography') }}">Servicios</a></li>
                            <li class="rd-nav-item"><a class="rd-nav-link" href="{{ url('contacts') }}">Para ti</a></li>
                            <li class="rd-nav-item"><a class="rd-nav-link" href="{{ url('contacts') }}">Nuestros tips</a></li>

                            @auth
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="{{ route('panelAdmin_user') }}">Panel</a>
                                {{-- </li> --}}
                                    <ul class="rd-menu rd-navbar-dropdown" style="background-color: #f5f4f4;">
                                        <li class="rd-dropdown-item">
                                            <a class="rd-dropdown-link" href="{{ route('panelAdmin_user') }}" wire:navigate>
                                                <img class="rounded-circle imgCabecera" width="35" height="35" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                                <span class="submenuUser">Tú</span>
                                            </a>
                                        </li>
                                        <li class="rd-dropdown-item message_initPage">
                                            <a class="rd-dropdown-link" href="{{ route('panelAdmin_user_Message') }}">
                                                <img style="" class="mensajes" src="{{ asset('storage/cabecera/mail_w.svg') }}" alt="mensajes" />
                                                <span class="submenuUser">Mensajes</span>
                                                <div class="listOfContacts listOfContactNotChat" style="width: 100%; height: 0px;"></div>
                                            </a>
                                        </li>
                                        <li class="rd-dropdown-item">
                                            <a class="rd-dropdown-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <img style="filter: invert(1);" class="salir" width="35" height="35" src="{{ asset('storage/cabecera/log-out_w.svg') }}" alt="Salir" />
                                                <span class="submenuUser">{{ __('Log Out') }}</span>
                                            </a>
                                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="margin-bottom: 0px;">
                                                @csrf
                                            </form>
                                        </li>

                                        @if (Auth::user()->is_admin)
                                            <li class="rd-dropdown-item">
                                                <a class="rd-dropdown-link" href="{{ route('admin.dashboard') }}">
                                                    <img style="margin-right: 5px; filter: invert(1);" width="35" height="35" src="{{ asset('storage/cabecera/panel_w.svg') }}" alt="Panel de administrador" />
                                                    <span class="submenuUser">Panel</span>
                                                </a>
                                            </li>
                                            <li class="rd-dropdown-item">
                                                <a class="rd-dropdown-link" href="{{ route('admin.citas') }}" class="notificationNewReservIndex">
                                                    <img style="width: 35px; filter: invert(1);" class="mensajes" src="{{ asset('storage/cabecera/notificacion.svg') }}" alt="subir anuncio" />
                                                    <span class="ms-1 submenuUser">Notificaciones</span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="rd-dropdown-item">
                                                <a class="rd-dropdown-link" href="{{ route('panelAdmin_user') }}" onclick="getContacts(); getFavoritesList();">
                                                    <img style="margin-right: 5px; filter: invert(1);" width="35" height="35" src="{{ asset('storage/cabecera/panel_w.svg') }}" alt="Panel User" />
                                                    <span class="submenuUser">Panel User</span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>

                <div class="elementor-widget-container botonReservarNavegacion">
                    <div class="elementor-button-wrapper">
                        <a class="elementor-button elementor-button-link elementor-size-sm entrar_registrase" href="{{ Auth::check() ? "#services" : 'javascript:void(0);' }}" class="{{ Auth::check() ? '' : 'entrar_registrase' }}" data-auth="{{ Auth::check() ? 1 : 0 }}">
                        {{-- <a class="elementor-button elementor-button-link elementor-size-sm entrar_registrase" href="#services"> --}}
                            <span class="elementor-button-content-wrapper" style="color: white">
                                <span class="elementor-button-text">Reservar</span>
                            </span>
                        </a>
                    </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

      <!-- Swiper-->
      <section class="seccionCarouselPrincipal section swiper-container swiper-slider swiper-slider-1 slider-scale-effect" data-loop="false" data-autoplay="5500" data-simulate-touch="false" data-slide-effect="fade">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide-bg-1">
            <div class="slide-bg swiper-white-filter" style="background-image: url('{{ asset('storage/images/slide-1-1920x720.png') }}')"></div>

            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-sm-10 col-lg-8 col-xl-7">
                    <h1 class="afri" data-caption-animate="fadeInUp" data-caption-delay="100">Afri Nail art Studio<br><span class="divider"></span><span>Est<span class="acento2">e</span>tica dental.</span>
                    </h1>
                    <p class="lead" data-caption-animate="fadeInUp" data-caption-delay="250">Las joyas dentales, también conocidas como «tooth gems» o «dental bling» han emergido como una tendencia fascinante en el mundo de la moda dental.

                        Estos pequeños adornos, que van desde diamantes hasta cristales de colores, se adhieren a los dientes para añadir un toque de brillo y personalidad a tu sonrisa.</p><a class="button button-primary" href="#" data-caption-animate="fadeInUp" data-caption-delay="450">Leer más</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide slide-bg-2">
            <div class="slide-bg swiper-white-filter" style="background-image: url('{{ asset('storage/images/slide-2-1920x720.png') }}')"></div>

            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10 col-lg-8 col-xl-7">
                    <h1 class="afri" data-caption-animate="fadeInUp" data-caption-delay="100">Experimente los mejores <br><span class="divider"></span>Servicios
                    </h1>
                    <p class="lead" data-caption-animate="fadeInUp" data-caption-delay="250">We offer a full range of hairdressing services for men and women, eyebrow and eyelash care, the services of make-up artists and stylists. Entrust your beauty to professionals who really care about your style and look!</p><a class="button button-primary" href="#" data-caption-animate="fadeInUp" data-caption-delay="450">Read more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide slide-bg-3">
            <div class="slide-bg swiper-white-filter" style="background-image: url('{{ asset('storage/images/slide-3-1920x720.png') }}')"></div>

            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-md-10 col-lg-8 col-xl-7">
                    <h1 class="afri" data-caption-animate="fadeInUp" data-caption-delay="100">Belleza profesional <br><span class="divider"></span>Cuidados para todos
                    </h1>
                    <p class="lead" data-caption-animate="fadeInUp" data-caption-delay="250">Our beauty salon treatments will help you relax after a long and stressful day. At Glory, you can pamper yourself and enjoy the benefits of professional and affordable beauty care. Enjoy your life with our high-quality beauty services.</p><a class="button button-primary" href="#" data-caption-animate="fadeInUp" data-caption-delay="450">Read more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination"></div>
        <div class="swiper-counter"></div>
        <!-- Swiper Navigation-->
        <div class="swiper-button-prev">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17px" height="30px" viewbox="0 0 17 30" enable-background="new 0 0 17 30" xml:space="preserve">
            <g>
              <defs>
                <rect id="SVGID_111_" width="17" height="30"></rect>
              </defs>
              <clippath id="SVGID_2222_">
                <use xlink:href="#SVGID_111_" overflow="visible"></use>
              </clippath>
              <line clip-path="url(#SVGID_2222_)" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" y1="0.833" x2="8.5" y2="29.167"></line>
              <polyline clip-path="url(#SVGID_2222_)" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="									    16.15,20.833 8.5,29.167 0.85,20.833 	"></polyline>
            </g>
          </svg>
        </div>
        <div class="swiper-button-next">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17px" height="30px" viewbox="0 0 17 30" enable-background="new 0 0 17 30" xml:space="preserve">
            <g>
              <defs>
                <rect id="SVGID_1_" width="17" height="30"></rect>
              </defs>
              <clippath id="SVGID_2_">
                <use xlink:href="#SVGID_1_" overflow="visible"></use>
              </clippath>
              <line clip-path="url(#SVGID_2_)" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8.5" y1="29.167" x2="8.5" y2="0.833"></line>
              <polyline clip-path="url(#SVGID_2_)" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="									    0.85,9.167 8.5,0.833 16.15,9.167 	"></polyline>
            </g>
          </svg>
        </div>
      </section>
      <section style="background-image: url('{{ asset('storage/images/fondo_relajate2.jpg') }}');" class="bg-gray-100 elementor-section elementor-top-section elementor-element elementor-element-27ee012 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="27ee012" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
        <h2 style="margin-top: 2rem;" class="afri text-center">Afri sals<span class="acento position-relative">o</span>n de u<span class="tilde position-relative">n</span>as en Ourense</h2>
        <div class="elementor-container elementor-column-gap-default">

            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-486f619" data-id="486f619" data-element_type="column">
        <div class="elementor-widget-wrap">
                    </div>
        </div>
        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-dcaaf2c" data-id="dcaaf2c" data-element_type="column">
        <div class="elementor-widget-wrap">
                    </div>
        </div>

        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-e571d3f animated fadeIn" data-id="e571d3f" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;fadeIn&quot;}">
        <div class="elementor-widget-wrap elementor-element-populated text-center" style="box-shadow: 0 2px 8px rgb(0 0 0 / 15%);">

            <div class="elementor-element elementor-element-fdad8d1 elementor-hidden-mobile elementor-widget elementor-widget-image" data-id="fdad8d1" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
					<img style="filter: drop-shadow(0 2px 8px rgb(0 0 0 / 15%));" decoding="async" width="800" height="694" src="https://laesmalteria.es/wp-content/uploads/2023/08/52-e1695125017809.png" class="attachment-large size-large wp-image-16031" alt="">															</div>
				</div>
        <div class="elementor-element elementor-element-166edf1 elementor-widget elementor-widget-heading" data-id="166edf1" data-element_type="widget" data-widget_type="heading.default">
        <div class="elementor-widget-container">
            <h2 class="elementor-heading-title ven elementor-size-default">¡Ven a relajarte!</h2>				</div>
        </div>
        <div class="elementor-element elementor-element-481cbf1 elementor-widget elementor-widget-heading" data-id="481cbf1" data-element_type="widget" data-widget_type="heading.default">
        <div class="elementor-widget-container">
            <h3 class="elementor-heading-title teloMereces elementor-size-default">Porque te mereces un momento de desconexión<span style="color: #DC9D5F;">.</span></h3>				</div>
        </div>
        <div class="elementor-element elementor-element-6de8501 elementor-align-center elementor-widget elementor-widget-button" data-id="6de8501" data-element_type="widget" data-widget_type="button.default">
        <div class="elementor-widget-container">
                            <div class="elementor-button-wrapper">
            <a class="elementor-button elementor-button-link elementor-size-sm" href="https://laesmalteria.es/para-ti/">
                <span class="elementor-button-content-wrapper">
                            <span class="elementor-button-text">¡Quiero desconectar!</span>
            </span>
            </a>
        </div>
                        </div>
        </div>
        <div class="elementor-element elementor-element-3222e04 elementor-widget elementor-widget-text-editor" data-id="3222e04" data-element_type="widget" data-widget_type="text-editor.default">
        <div class="elementor-widget-container">
                            <p>Una experiencia de lujo incomparable en el cuidado de uñas y tratamientos de belleza.</p>								</div>
        </div>
            </div>
        </div>
            </div>
    </section>
      <section class="section section-lg bg-gray-100">
        <div class="container">
            <h2 class="afri" style="display: block">Sal<span class="acento position-relative">o</span>n de u<span class="tilde position-relative">n</span>as en Ourense</h2>
            <h3 style="filter: drop-shadow(2px -2px 11px white);">Profesionalidad y calidad en el cuidado de tus uñas en Ourense</h3>
            <p class="mt-0 big text-gray-800 padingMovil">
                Somos un centro con una amplia variedad de tratamientos de manicura y pedicura junto con otras opciones destinadas a vuestra belleza.
                Te esperamos en Ourense.
            </p>
            </h2>
          <div class="row row-50 align-items-lg-center justify-content-xl-between" style="margin-top: 0px;">
            <div class="col-lg-6 text-center" style="padding-left: 0px">
              <div class="block-parallax-element">
                <span class="prev-element" data-parallax-scroll="{&quot;y&quot;: -30, &quot;x&quot;: 0,  &quot;smoothness&quot;: 50 }"></span>
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="carousel-img" style="background-image: url('{{ asset('storage/images/manicura_verde.jfif') }}');"></div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-img" style="background-image: url('{{ asset('storage/images/pedicura_verde.jpg') }}');"></div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-img" style="background-image: url('{{ asset('storage/images/salon_nailBar.jpg') }}');"></div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-img" style="background-image: url('{{ asset('storage/images/flores_verde.jpg') }}');"></div>
                        </div>

                    </div>
                  </div>
                  <p class="fst-italic" style="position: absolute;">
                    Afri Nail art studio es un salón de uñas en Ourense en el que te ofrecemos una gran variedad de diseños, esmaltados, decoraciones y tratamientos para tus manos y pies.
                </p>
                <!-- <img src="images/home-1-378x463.jpg" alt="" width="378" height="463"/> -->
                <span class="next-element" data-parallax-scroll='{"y": 30, "x": 0, "smoothness": 50}'></span>
                <span class="next-element2" data-parallax-scroll='{"y": 30, "x": 0, "smoothness": 50}'></span>
              </div>
            </div>
            <div class="col-lg-6 col-xl-5 diferencia">
            <h3 class="afri">¿Qué nos diferencia del resto de salones de uñas?</h3>

              <ul class="nosotros_movil" style="padding-top: 1rem;">
                <li>

                  <div>
                      <p class="big text-gray-800">
                        <span class="divider"></span>
                        Últimas novedades
                    </p>
                    <p style="margin-bottom: 17px;">Nos encanta estar al tanto de las últimas tendencias en manicura y pedicura, así que, ¡ven a nuestro salón y te asesoraremos!</p>

                  </div>
                </li>
                <li>
                  <div>
                    <p class="big text-gray-800">
                        <span class="divider"></span>
                        Profesionalidad
                    </p>
                      <p style="margin-bottom: 17px;">Para conseguir los mejores resultados, trabajamos con gran profesionalidad y, sobre todo, con productos de calidad, ya que nuestro principal objetivo es la satisfacción de nuestros clientes.</p>
                  </div>
                </li>
                <li>
                  <div>
                    <p class="big text-gray-800">
                        <span class="divider"></span>
                        Ámabilidad y cercanía
                    </p>
                    <p style="margin-bottom: 17px;">En primer lugar, buscamos garantizar un buen resultado en nuestros trabajos y, para ello, es necesario un trato cercano, sincero y directo con nuestros clientes para conocer sus gustos y necesidades. Además, solo trabajamos con productos de calidad para lograr el mejor cuidado y los mejores resultados en tus manos y pies. No es necesario que traigas un diseño pensado; los primeros minutos de tu sesión los dedicaremos a asesorarte sobre el color, el diseño o las últimas tendencias que mejor se ajusten a lo que buscas.</p>

                  </div>
                </li>
              </ul>
            <a class="button button-primary" href="#">Leer más</a>
            </div>
          </div>
        </div>
      </section>
      <section id="stats" class="stats section" style="padding: 60px 0;scroll-margin-top: 78px;overflow: clip;">

        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4">

            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
              <i style="color: #cccccc;" class="bi bi-emoji-smile"></i>
              <div class="stats-item">
                <h3 data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="2" class="heading-decorate purecounter">232</h3>
                <p class="heading-decorate">Client@s felices</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class=""><svg  style="color: #cccccc;" version="1.1" viewBox="0 0 2048 2048" width="70" height="70" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" transform="translate(1178,522)" d="m0 0h7l13 4 41 18 29 13 39 17 41 18 25 11 166 73 134 59 19 8 15 7 20 9 15 8 14 10 10 9 6 5 9 11 9 13 11 21 6 18 4 20 1 20v677l-1 17-4 12-6 10-8 8-10 6-13 4h-27l-19-3 4 16 18 65 22 79 7 25 2 17-2 12-4 10-8 11-9 7-10 5-21 5-14 2h-26l-18-3-16-5-16-8-11-8-10-9v-2h-2l-10-14-5-9-15-6-17-9-17-12-11-9-8-7v-2l-2 1 20 72 6 24v11l-4 14-7 12-10 9-12 6-15 4-20 3h-26l-19-3-18-6-15-8-9-7-10-9-9-11-8-13-8-4-19-9-11-7-11-8-13-11-10-9-8-8-9-11-8-9-14-19-15-23-14-24-17-33-13-29-12-30-11-30-12-36-14-49-23-83-17-61-22-79-4-10-33-42-28-36-12-15-13-17-13-16-12-16-22-28-9-11v-2l-2 1 10 35 24 87 27 97 90 324 27 97 25 90 7 25 1 5v15l-4 12-6 11-9 9-14 7-15 4-20 3h-25l-20-3-15-5-16-8-11-8-15-15-10-15-2-4-19-8-16-9-15-11-13-11-15-15-13-14-13-17-13-18-14-23-9-16-12-23-13-27-15-36-13-36-11-33-12-41-17-61-4-18 2-12 6-10 9-7 10-3h7l11 3 8 6 6 9 6 19 14 51 17 57 13 38 11 28 11 26 16 33 10 19 15 24 12 17 9 11 9 10 7 8 1-1-5-22-2-22 1-20 4-20 6-17 8-17 10-15 12-14 9-9 16-12 12-7-2-10-17-62-17-61-27-97-23-83-19-68-40-144-5-19-1-12 3-14 6-12 8-9 10-7 11-4 4-1h17l10 3 12 7 10 10 10 13 28 36 22 28 10 13 13 16 9 12 14 18 22 28 10 13 12 15 10 13 11 14 14 18 6 11 18 65 22 79 20 72 15 53 12 38 10 29 14 35 13 29 15 30 8 14 15 24 11 15 13 16 12 13-5-23-2-16v-18l3-21 6-21 10-21 7-11 10-13 16-16 15-11 10-6 1-2-13-47-40-144-12-43-50-180-7-11-13-16-13-17-22-28-14-18-22-28-28-36-11-14-42-54-12-15-10-13-11-14-10-13-12-15-10-13-7-11-3-9 1-11 4-9 7-8 10-5 4-1h10l9 3 10 8 11 14 10 13 28 36 22 28 14 18 22 28 10 13 14 18 22 28 28 36 12 15 12 16 13 16 26 34 6 12 18 65 60 216 13 45 12 38 15 41 12 28 12 26 10 19 6 11 8 14 18 27 8 10 11 13 8 9-1-9-4-19-1-9v-20l3-20 6-21 11-23 8-12 5-7h2l2-4 16-16 14-10 11-6-4-17-13-47-24-86-23-83-24-86-25-90-16-58-4-8-20-26-12-15-11-14-10-13-14-18-11-14-14-18-33-42-10-13-22-28-10-13-11-14-14-18-10-13-12-17-9-14-10-17-13-25-11-27-10-31-6-24-5-30-3-30-21-10-30-13-11-6-8-9-3-7-1-9 2-10 5-9 8-7 7-3zm112 112 1 10 7 30 10 30 9 21 8 16 9 16 11 17 9 12 10 13 14 18 12 15 20 26 22 28 14 18 22 28 10 13 12 15 20 26 14 18 22 28 14 18 6 12 35 126 27 97 20 72 3 10h3l7-12 11-14 13-13 13-10 15-9 16-7 16-5 6-3-1-413-3-15-7-16-9-13-12-12-13-8-14-7-68-30-39-17-127-56-84-37-43-19-30-13-9-4zm459 724-15 8-11 9-7 7-6 8-6 10-5 13-3 14v103l4 11 7 9 11 8 11 5 16 4h5l1-96v-113zm-93 258-12 11-8 10-8 16-4 12-1 6v26l6 25 10 36 9 31 7 14 8 7 10 5 15 3h18l6-1-1-9-25-90-21-76-7-26zm-627 53v2l-4 2-9 9-10 15-6 14-3 14-1 16 3 18 11 40 12 42 4 10 7 9 10 6 12 4 5 1h23l4-2-8-31-18-64-24-87-5-16-1-2zm400 0-13 13-10 15-6 14-3 14-1 7v11l5 25 17 61 7 21 6 8 9 7 10 4 10 2h22l4-1-1-8-12-44-25-90-8-28-7-25-2-6z"></path>
                    <path fill="currentColor" transform="translate(26,562)" d="m0 0h8l10 3 8 6 6 9 2 7 3 40 4 27 6 25 9 27 9 21 8 16 9 16 12 18 10 13 11 13 9 10 15 15 11 9 15 12 20 13 17 10 29 14 48 21 34 15 30 13 86 38 30 13 29 13 82 36 66 29 17 8 10 9 4 8 7 24 14 51 22 79 20 72 5 21-1 11-4 8-6 7-9 5-4 1h-15l-10-5-7-7-5-12-12-42-18-65-27-97-5-18v-2l-9-3-157-69-36-16-30-13-152-67-36-16-24-12-20-12-16-11-13-10-11-9-10-9-8-7-19-19-9-11-11-13-14-20-12-19-12-22-8-17-11-28-6-19-7-28-7-40v-47l7-11 9-7z"></path>
                    <path fill="currentColor" transform="translate(34,117)" d="m0 0h135l36 2 34 4 28 5 36 9 36 12 34 14 98 43 68 30 84 37 107 47 75 33 45 20 30 13 159 70 34 15 9 6 7 8 3 7 1 5v7l-3 9-6 9-9 6-9 3h-8l-14-5-40-18-21-9-127-56-30-13-127-56-27-12-30-13-84-37-36-16-30-13-129-57-28-12-26-10-32-10-26-6-31-5-31-3-43-1h-114l-12-2-8-4-7-7-5-8v-20l6-9 5-5 8-5 3-1z"></path>
                    <path fill="currentColor" transform="translate(105,1172)" d="m0 0h10l11 4 8 7 5 9 1 4v96h55l9 3 9 7 6 10 1 3v15l-5 10-5 6-8 5-12 2h-49v26l-1 70-4 10-6 7-9 5-10 2-10-1-10-5-7-8-4-9-1-8v-89h-53l-10-3-9-7-7-11v-20l7-10 7-6 10-4h55v-91l3-12 6-8 8-6z"></path>
                    <path fill="currentColor" transform="translate(1935,115)" d="m0 0 10 1 10 4 8 8 4 8 1 3v96h50l11 2 9 6 6 7 4 6v22l-4 4-7 8-10 5-4 1h-54v23l-1 74-6 12-8 7-11 4h-11l-9-3-8-7-6-9-2-11v-90h-55l-9-3-10-9-5-10-1-9 2-10 4-7 4-5 10-6 8-2h52v-91l2-9 6-10 8-6 7-3z"></path>
                    <path fill="currentColor" transform="translate(483,631)" d="m0 0h12l11 4 6 5 6 9 2 7v95h55l11 4 6 5 6 9 2 7v11l-4 10-9 10-11 4-13 1h-43v94l-4 11-9 10-9 4-9 1-11-2-9-6-6-7-4-11v-94h-50l-11-2-9-6-6-7-4-11v-9l3-10 7-9 10-6 3-1 56-1 1-94 3-9 7-9 10-6z"></path>
                    <path fill="currentColor" transform="translate(415,1353)" d="m0 0h29l16 4 16 8 11 8 10 9 9 12 8 15 4 13 2 10v21l-3 15-6 15-7 12-11 13-11 9-14 8-13 5-15 3h-22l-15-3-16-7-10-6-13-11v-2h-2l-10-14-8-16-4-15-1-6v-19l3-15 4-12 8-15 7-9h2l2-4 10-9 13-8 14-6zm7 61-7 3-8 6-6 12-1 11 3 10 4 6 8 7 9 3h11l10-4 8-7 4-7 2-6v-10l-4-10-4-6-8-6-6-2z"></path>
                    <path fill="currentColor" -="" transform="translate(1473,257)" d="m0 0h28l16 4 17 8 13 10 10 10 7 10 8 16 4 13 2 15-1 16-3 15-7 16-7 11-9 10-7 7-14 9-14 6-18 4-13 1-17-2-16-5-15-8-11-9-9-9-10-15-5-11-5-17-1-9v-12l3-17 5-14 6-11 8-11 12-12 14-9 13-6zm6 61-10 5-7 8-3 6-1 4v13l6 12 8 7 9 3h12l10-4 7-6 4-7 2-5v-14l-4-9-7-8-7-4-4-1z"></path>
                    <path fill="currentColor" transform="translate(941,1112)" d="m0 0"></path>
                    </svg>
                </i>
              <div class="stats-item">
                <h3 data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="2" class="heading-decorate purecounter">521</h3>
                <p class="heading-decorate">Manicuras</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
              <i class=""> <svg  style="color: #cccccc;" version="1.1" viewBox="0 0 2048 2048" width="70" height="70" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" transform="translate(1504,1240)" d="m0 0h14l8 3 10 9 13 18 10 14 12 16 13 17 13 16 11 14 13 15 9 11 4 4v2h2l7 8 18 20 7 7 7 8 42 42 8 7 7 7 8 7 13 12 8 7 13 11 14 12 14 11 16 13 16 12 19 14 18 13 19 13 21 14 19 12 28 17 24 14 18 11 11 9 9 9 8 11 8 14 8 20 3 10 1 4v46l-2 2-5 16-5 12-10 16-11 14-3 4h-2l-2 4-4 4h-2v2l-14 11-15 10-15 8-18 7-24 6-14 2-21 1-22-2-18-4-18-6-16-7-11-6-3 9-7 19-8 13-8 11h-2l-2 4-10 9-18 11-15 6-15 4-5 1h-27l-18-4-15-6-14-8-13-11-8-8-6-8-11 6-16 7-15 4-8 1h-26l-18-4-13-5-16-9-13-11-7-7-6-8-5 1-17 9-20 6-14 2h-15l-18-3-15-5-14-7-11-8-12-11-9-11-4 1-16 8-13 5-20 4h-20l-20-4-16-6-12-7-13-10-10-10-8-11-8-14-6-16-3-14-1-10-5-4-26-15-72-42-26-15-65-38-26-15-22-13-26-15-27-16-28-16-22-13-26-15-19-12-8-9-3-8v-14l4-10 5-6 10-6 8-2 10 1 10 4 96 56 26 15 72 42 26 15 22 13 26 15 22 13 26 15 22 13 26 15 17 10 22 13 7 6 4 7 3 8v26l3 10 5 9 6 7 11 7 8 3 16 1 12-3 11-6 3-3h2l2-4 4-5 5-14 2-13v-26l-3-18-5-17-10-21-8-14-3-8v-10l5-12 8-8 8-4 4-1h10l10 3 10 9 7 10 11 20 6 14 7 23 4 21 1 9v34l-2 17v18l4 12 7 10 7 6 12 6 17 2 10-2 9-4 9-6 6-7 5-10 3-12 2-18v-30l-2-17-4-19-6-20-8-19-5-12-1-9 3-12 6-8 6-5 10-4h10l10 3 8 6 7 11 8 17 9 25 6 24 4 25 1 9v42l-3 23v21l5 13 7 9 11 8 12 4h17l10-3 10-6 5-4 6-8 4-10 4-26 1-15v-25l-3-29-5-24-6-20-7-19-5-13-1-11 3-10 7-9 9-6 7-2h9l10 3 8 6 6 9 9 21 8 24 7 28 4 25 2 22v36l-3 30-2 14v9l3 13 6 10 6 7 10 6 7 3 5 1h15l10-3 11-6 7-7 6-10 4-17 3-25 1-19v-17l-2-29-4-27-6-25-7-22-7-20-1-3v-13l4-10 6-7 8-5 7-2h10l11 4 8 7 8 16 9 25 6 22 6 27 4 28 3 45 23 13 19 10 16 5 11 2h29l18-4 15-6 16-9 11-9 9-9 6-8 8-14 3-13v-17l-4-16-7-13-7-8-13-8-29-17-20-12-33-21-31-21-17-12-19-14-17-13-13-10-16-13-22-18-15-13-11-9-10-10-8-7-10-9-15-14-49-49-7-8-12-13-11-12-24-28-14-17-12-15-13-17-10-13-14-19-12-17-7-11-4-10v-7l4-12 6-8 10-6z"></path>
                <path fill="currentColor" transform="translate(30,72)" d="m0 0 11 2 8 5 8 9 15 26 11 19 14 24 13 23 10 17 16 28 14 24 12 21 14 24 16 28 14 24 120 208 14 24 16 28 11 19 14 24 14 25 2 6v12l-4 10-11 15-8 11-9 12-14 19-12 16-28 38-16 21-16 22-6 8-28 38-12 20-8 16-8 19-8 28-4 21-2 26v13l2 26 5 26 6 21 9 22 8 16 10 17 14 19 11 12 7 8 11 10 14 11 16 11 22 13 24 14 26 15 27 16 28 16 77 45 26 15 27 16 19 11 24 14 26 15 24 14 13 8 9 7 5 9 2 6v10l-4 10-6 8-8 5-7 2h-13l-9-4-25-14-22-13-24-14-26-15-22-13-26-15-161-94-26-15-22-13-19-12-14-10-11-9-20-18v-2l-3-1-7-8-10-11-15-20-14-22-10-19-10-23-9-27-6-26-4-28-1-12v-31l3-29 4-22 7-26 10-27 14-29 11-18 12-17 12-16 13-18 10-13 28-38 15-20 14-19 12-16 8-11 13-18 2-4-13-23-14-24-16-28-30-52-14-24-16-28-14-24-30-52-16-28-14-24-60-104-14-24-16-28-30-52-14-24-16-28-2-4v-19l7-11 9-7 5-2z"></path>
                <path fill="currentColor" transform="translate(829,72)" d="m0 0 11 1 9 4 5 4 9 13 14 25 9 15 15 26 12 21 14 24 13 23 10 17 15 26 12 21 15 26 14 24 30 52 11 19 14 24 13 23 10 17 16 28 11 19 14 24 15 26 16 28 10 17 16 28 14 24 16 28 14 24 16 28 14 24 16 28 14 24 15 26 14 24 14 25 8 13 13 23 14 24 16 28 11 19 14 24 16 28 14 24 8 14 14 24 24 42 3 10-1 11-5 10-5 5-5 4-9 3h-13l-8-3-10-9-17-29-12-21-15-26-14-24-16-28-14-24-60-104-14-24-16-28-14-24-16-28-14-24-16-28-14-24-30-52-12-21-15-26-16-27-14-25-16-27-14-25-10-17-165-286-10-17-16-28-30-52-14-24-10-18-2-6v-13l4-9 7-8 8-5z"></path>
                <path fill="currentColor" transform="translate(1222,1123)" d="m0 0 11 1 8 3 9 8 5 10 1 5v93h52l9 2 9 6 6 7 4 11v10l-4 10-5 7-5 4-8 3-7 1h-51v93l-3 10-4 6-7 7-13 4h-8l-10-3-8-6-5-7-3-8-1-57v-37l1-2h-54l-10-3-10-9-4-7-2-5v-12l4-10 7-8 8-5 7-2h53v-32l1-63 4-10 7-8 8-5z"></path>
                <path fill="currentColor" transform="translate(1932,842)" d="m0 0h11l10 4 8 6 5 8 2 6v96h55l11 4 6 5 8 12v21l-3 3-6 8-7 5-11 3h-52v24l-1 72-4 9-6 8-6 4-10 3h-9l-11-4-8-7-6-12-1-7v-90h-54l-11-4-8-7-6-12v-15l4-10 8-8 8-4 4-1h55v-90l2-10 6-10 7-6z"></path>
                <path fill="currentColor" transform="translate(107,1494)" d="m0 0 11 1 10 5 5 5 5 7 2 7v95h52l9 2 8 5 8 9 3 8v14l-6 12-8 7-11 4h-54v24l-1 73-6 12-8 7-11 4h-12l-9-4-8-7-4-7-2-5-1-8v-89h-55l-10-4-9-8-5-9v-19l7-11 11-8 8-2h53v-90l2-10 6-10 9-7 5-2z"></path>
                <path fill="currentColor" transform="translate(1307,437)" d="m0 0h21l15 3 13 5 11 6 9 7 8 7 8 10 8 14 5 13 3 13v25l-4 17-8 17-12 16-10 9-13 8-13 6-16 4-6 1h-18l-18-4-16-7-11-7-13-12-10-14-7-14-4-13-2-14v-11l2-14 5-16 9-16 8-10 8-8 14-10 16-7zm5 61-10 4-7 6-5 9-1 4v13l4 10 8 8 9 4 11 1 10-3 8-6 5-6 3-8v-13l-4-9-4-6-9-6-7-2z"></path>
                <path fill="currentColor" transform="translate(470,1499)" d="m0 0h27l16 4 17 8 12 9 12 12 10 15 6 15 4 20v13l-3 18-5 13-7 13-8 10-2 3h-2l-2 4-15 11-15 7-19 5h-27l-15-4-12-5-13-8-12-11-7-8-9-15-6-16-2-9-1-10v-9l3-17 5-15 8-14 8-10 9-9 13-9 15-7zm5 61-10 5-7 8-4 10v12l4 10 6 7 7 4 6 2h13l9-4 8-7 4-7 1-4v-14l-3-8-8-9-8-4-3-1z"></path>
                <path fill="currentColor" transform="translate(533,667)" d="m0 0 10 1 12 6 7 8 4 11v9l-4 11-9 14-8 16-7 19-4 22-1 11v9l2 18 4 17 7 19 8 15 12 16 11 12 15 12 11 7 5 4 6 8 3 10v7l-3 10-6 8-6 5-6 3-5 1h-10l-11-4-14-9-16-13-10-9-12-13-12-16-8-13-10-19-8-21-6-25-2-14-1-13v-15l2-21 4-21 9-27 10-21 10-16 7-9 7-6 7-3z"></path>
                </svg>
                </i>
              <div class="stats-item">
                <h3 data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="2" class="heading-decorate purecounter">1463</h3>
                <p class="heading-decorate">Pedicuras</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class=""><svg  style="color: #cccccc;" version="1.1" viewBox="0 0 2048 2048" width="512" height="512" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" transform="translate(1768,750)" d="m0 0h13l27 2 24 4 27 7 26 10 24 12 19 12 16 12 11 9 16 15 13 14 13 17 12 18 10 18 9 19 8 22 7 27 3 16h2v77l-2 2-5 25-7 25-8 20-11 23-15 24-10 13-8 10-6 7h-2l-2 4-8 8h-2v2l-8 7-15 12-13 9-20 12-16 8-16 7-24 8-21 5-26 4-11 1h-34l-27-3-20-4-21-6-22-8-23-11-20-12-15-11-10-8-10-9-12-11-7-8-9-10-12-16-12-19-12-23-8-19-7-21-5-22-4-25-1-16v-21l2-25 5-27 6-22 7-19 11-24 10-17 8-12 8-11 9-11 14-15 11-11 8-7 13-10 13-9 15-9 23-12 24-9 21-6 25-5 16-2zm-13 70-25 4-21 6-15 6-23 12-11 7-14 11-14 12-11 12-8 10-9 12-12 22-7 14-8 24-5 25-1 10v34l3 22 5 20 6 17 8 16 12 22 14 17 11 13 11 10 10 8 12 9 28 15 19 8 23 6 18 3 14 1h20l20-2 20-4 17-5 16-7 23-12 11-7 17-14 9-7 7-8 1-3h2l11-14 6-8 11-19 10-21 6-19 4-17 2-14 1-13v-20l-2-21-4-20-9-27-14-27-9-14-11-13-9-11-12-11-11-9-13-9-22-12-12-6-20-7-16-4-21-3z"></path>
                <path fill="currentColor" transform="translate(1017,750)" d="m0 0h12l28 2 24 4 27 7 26 10 24 12 22 14 16 12 12 11 8 7 10 10 7 8 11 14 9 13 9 15 12 23 10 26 7 25 5 30 1 12v37l-2 21-5 26-7 24-9 23-8 16-15 25-9 12-10 13-16 17-14 13-10 8-17 12-20 12-16 8-16 7-24 8-21 5-26 4-11 1h-35l-27-3-27-6-16-5-21-8-21-10-20-12-15-11-10-8-10-9-8-7-15-16-11-14-10-14-13-22-9-19-5-12-6-17-6-23-4-24-2-24v-18l2-25 5-28 7-25 10-25 8-16 6-11 12-19 8-10 7-9 3-4h2l2-4 20-20 11-9 17-13 20-12 21-11 23-9 20-6 17-4 28-4zm-13 70-25 4-21 6-17 7-26 14-11 8-11 9-14 12-12 14-9 11-7 11-10 18-9 19-7 23-4 23-1 8v35l5 30 7 23 12 25 11 19 18 22 9 10h2v2l25 20 27 15 15 7 18 6 24 5 21 2h20l20-2 20-4 17-5 17-7 23-13 10-6 17-14 10-8v-2h2l9-11 11-13 8-13 13-24 8-20 6-25 3-24v-25l-2-18-5-25-6-18-10-21-10-18-10-13-14-17-7-7-11-9-15-12-28-15-15-7-15-5-23-5-14-2z"></path>
                <path fill="currentColor" transform="translate(266,750)" d="m0 0h12l28 2 24 4 27 7 24 9 16 8 15 8 17 11 17 13 11 10 8 7 11 11 9 11 11 14 11 17 9 16 10 21 9 25 6 23 4 26 2 27-1 26-3 24-6 27-9 27-8 18-10 19-10 16-15 20-18 20-7 7-8 7-16 13-15 10-17 10-16 8-16 7-24 8-21 5-26 4-11 1h-35l-26-3-24-5-17-5-24-9-21-10-20-12-19-14-15-13-13-12-7-8-9-10-14-19-15-25-11-23-9-25-7-28-4-20v-65l3-13 5-23 8-26 10-23 11-21 9-14 12-16 7-9 12-13 14-14 14-11 13-10 16-10 16-9 17-8 25-9 28-7 28-4zm-12 70-26 4-21 6-17 7-26 14-10 7-13 11-11 9-10 11-8 10-10 13-14 26-8 18-7 25-3 19-1 10v29l3 23 6 24 8 20 12 23 9 14 22 26 15 13 17 13 28 15 19 8 23 6 18 3 14 1h21l19-2 20-4 17-5 19-8 23-13 11-7 15-13 10-8 12-14 4-5v-2h2l9-13 14-26 5-11 6-18 5-23 2-20v-25l-3-24-5-21-6-18-12-24-9-15-11-14-12-14-7-7-11-9-16-12-22-12-14-7-20-7-16-4-21-3z"></path>
                </svg>
                </i>
              <div class="stats-item">
                <h3 data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="2" class="heading-decorate purecounter">15</h3>
                <p class="heading-decorate">Otros</p>
              </div>
            </div><!-- End Stats Item -->

          </div>

        </div>

      </section>




      <section class="section section-lg bg-default" id="services">
        <div class="container">
          <div class="row-50 align-items-lg-center justify-content-xl-between">
            <div class="col-lg-12">
                <div class="">
                    <h2 class="afri nuestrosServicios">Nuestros <br/><span class="divider"></span>Servicios
                    </h2>
                    <h3 class="heading-decorate text-center">Reserva tu cita en nuestro salón de uñas de Ourense</h3>
                    <p class="big text-gray-800" style="position: relative;z-index: 2;">Ofrecemos una gama completa de servicios proporcionados por un equipo de estilistas profesionales, todo en un entorno limpio he esterilizado.</p>
                    <p style="position: relative;z-index: 2;">Nuestro equipo de profesionales pueden hacer luzcas justo como lo deseas. Ya sea con manicura, pedicura o cualquiera de nuestros servicios, descubre todo lo que tenemos para cuidarte.</p>
                    <span class="next-element3" data-parallax-scroll='{"y": 30, "x": 0, "smoothness": 50}'></span>
                    <span class="next-element4" data-parallax-scroll='{"y": 30, "x": 0, "smoothness": 50}'></span>
                </div>
            </div>
            <div class="col-lg-12 categoriasGenerales">
              <div class="box-images-classic">
                <div class="row row-30 enlaceCategoriaGeneral">
                    @foreach ($categoriasGenerales as $categoriaGeneral)
                        <div class="col-lg-4 col-md-12 d-flex flex-column align-items-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" >
                            <h3 class="afri">{{ $categoriaGeneral->nombre }}</h3>
                            <div class="box-image-item"
                            data-parallax-scroll='{"y": 0, "x": -20, "smoothness": 30}'
                            style="
                            width: 270px;
                            height: 458px;
                            background-image: url('{{ asset('storage/' . $categoriaGeneral->imagen) }}');
                            background-size: cover;
                            background-position: center;
                            background-repeat: no-repeat;
                            ">
                        </div>
                        <a
                            data-categoriaGeneral="{{ $categoriaGeneral->nombre }}"
                            class="button button-primary {{ Auth::check() ? '' : 'entrar_registrase' }}"
                            href="{{ Auth::check() ? route('manicura.pedicura.book') : 'javascript:void(0);' }}"
                            data-auth="{{ Auth::check() ? 1 : 0 }}">
                            Reservar ahora
                        </a>
                        </div>
                    @endforeach
                </div>
              </div>
            </div>
            {{-- <div class="col-lg-12 subcategoriasServicios" id="subcategoriasServicios">
                 <button data-categoriaGeneral="cerrarSubcategoria" type="button" class="close cerrarReservaSubcategorias" style="position: absolute;right: 35px;top: 7px;position: absolute;z-index: 99;">

                        <span style="font-size: 14px" class="" aria-hidden="true">cerrar</span>
                      </button>
                <h2 style="position: relative;z-index: 9;" class="elementor-heading-title elementor-size-default">Manicura y Pedicura</h2>
                <div style="position: relative;z-index: 9;color:black" class="">¡Atrévete a pintar tu vida de colores!</div>

                <span class="divider"></span>
                <h3 style="position: relative;z-index: 9;" class="heading-decorate">Reservar cita ahora</h3>
                <span class="divider"></span>
                <div class="booked-appt-list shown" >

                       <span class="next-element7" data-parallax-scroll='{"y": 30, "x": 0, "smoothness": 50}'></span>
                    <span class="next-element8" data-parallax-scroll='{"y": 30, "x": 0, "smoothness": 50}'></span>
                      <span class="next-element3" data-parallax-scroll='{"y": 30, "x": 0, "smoothness": 50}'></span>
                </div>
            </div> --}}
          </div>
        </div>
      </section>

      <section id="portfolio" class="portfolio section">
            <div class="container section-title" data-aos="fade-up">

              <h2 class="heading-decorate"><span class="divider"></span>Portfolio</h2>

              <p>Inspiración real, belleza auténtica.
                Descubre lo que podemos hacer por ti con resultados 100% reales y comprobables.</p>
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
      <section class="registerClient section section-md bg-default text-center">
        <div class="container">
             <span class="next-element5" data-parallax-scroll='{"y": 30, "x": 0, "smoothness": 50}'></span>
       <span class="next-element6" data-parallax-scroll='{"y": 30, "x": 0, "smoothness": 50}'></span>
          <h2 style="position: relative">Nuestros clientes registrados</h2>
          <div class="divider-lg"></div>
          <p class="block-lg" style="position: relative;">
            Nos sentimos orgullosos de contar con una comunidad de clientes que confían en nosotros día tras día.
            Su fidelidad nos inspira a seguir ofreciendo servicios de calidad, con pasión y dedicación.
            Cada rostro en este carrusel representa una historia compartida y una experiencia vivida.
            ¡Gracias por ser parte de nuestra familia de belleza y bienestar!
        </p>
        </div>
        <div class="container">
          <div class="row row-20">
            <div class="col-12">
              <!-- Owl Carousel-->
              <div class="owl-carousel owl-carousel-center" data-items="3" data-md-items="3" data-xl-items="5" data-dots="false" data-nav="false" data-stage-padding="0" data-loop="true" data-margin="10" data-mouse-drag="false" data-center="true" data-autoplay="true">
                @foreach ($clientes as $cliente)
                    <div class="team-minimal">
                        <figure>
                            <div class="cliente-foto" style="background-image: url('{{ $cliente->profile_photo_url }}'); width: 200px; height: 200px; background-size: cover; background-position: center; border-radius: 50%; margin: 0 auto;"></div>
                        </figure>
                    </div>
                @endforeach
              </div>
            </div>
            {{-- <div class="col-12"><a class="button button-primary" href="#">View all team</a></div> --}}
          </div>
        </div>
      </section>
      <section class="section section-lg bg-gray-100">
        <div class="container">
          <div class="row row-xl-50">
            <div class="col-lg-6">
              <div class="row row-xl-50">
                <div class="col-md-6 col-lg-12">
                  <h2 class="heading-decorate"><span class="divider"></span>Our Beauty Salon</h2>
                  <p class="big text-gray-800">Glory offers beauty services of an utmost level to all LA residents and guests who are looking for high-quality beauty care.</p>
                  <p>Our Beauty Salon is based on the belief that our customers' needs are of the utmost importance. Our entire team is committed to meeting those needs. As a result, a high percentage of our business is from regular customers.</p>
                </div>
                <div class="col-md-6 col-lg-12">
                  <div class="quote-with-image">
                    <figure class="quote-img"><img src="{{ asset('storage/images/home-1-7-534x406.jpg') }}" alt="" width="534" height="406"/></figure>
                    <div class="quote-caption">
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="88.34px" height="65.34px" viewBox="0 0 88.34 65.34" enable-background="new 0 0 88.34 65.34" overflow="scroll" xml:space="preserve" preserveAspectRatio="none">
                        <path d="M49.394,65.34v-4.131c12.318-7.088,19.924-16.074,22.811-26.965c-3.125,2.032-5.968,3.051-8.526,3.051																	c-4.265,0-7.864-1.721-10.803-5.168c-2.937-3.444-4.407-7.654-4.407-12.64c0-5.511,1.932-10.142,5.791-13.878																	C58.123,1.873,62.873,0,68.51,0c5.639,0,10.354,2.379,14.143,7.137c3.793,4.757,5.688,10.678,5.688,17.758																	c0,9.977-3.814,18.912-11.443,26.818C69.268,59.613,60.101,64.156,49.394,65.34z M0.923,65.34v-4.131																	c12.321-7.088,19.926-16.074,22.813-26.965c-3.126,2.032-5.993,3.051-8.598,3.051c-4.219,0-7.794-1.721-10.734-5.168																	C1.467,28.683,0,24.473,0,19.487C0,13.976,1.919,9.346,5.757,5.609C9.595,1.873,14.334,0,19.971,0																	c5.685,0,10.41,2.379,14.178,7.137c3.767,4.757,5.652,10.678,5.652,17.758c0,9.977-3.805,18.912-11.409,26.818																	C20.787,59.613,11.632,64.156,0.923,65.34z"></path>
                      </svg>
                      <h3 class="quote-text text-right">We are responsible for the quality of the services you receive!</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row row-xl-50">
                <div class="col-md-6 col-lg-12">
                    <figure class="block-image"><img src="{{ asset('storage/images/home-1-9-541x369.jpg') }}" alt="" width="541" height="369"/></figure>

                  <p>All our salons in LA are uniquely designed to offer our clients the best beauty, hairstyling, and skin care experience, which we hope you and your body will appreciate. Let yourself relax and be pampered at the best salon in California!</p>
                </div>
                <div class="col-md-6 col-lg-12">
                  <div class="box-video" data-lightgallery="group"><a class="button-play" data-lightgallery="item" href="https://www.youtube.com/watch?v=m10Vl9TXpec"></a><img src="{{ asset('storage/images/home-1-8-541x369.jpg') }}" alt="" width="541" height="369"/>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      {{-- <!-- Page Footer--><a class="banner" href="https://www.templatemonster.com/website-templates/monstroid2.html" target="_blank"><img src="{{ asset('storage/images/monstroid-big.jpg') }}" alt="" height="0"></a> --}}
      <section class="section"></section>
      <!--Please, add the data attribute data-key="YOUR_API_KEY" in order to insert your own API key for the Google map.-->
      <!--Please note that YOUR_API_KEY should replaced with your key.-->
      <!--Example: <div class="google-map-container" data-key="YOUR_API_KEY">-->
      {{-- <div class="google-map-container" data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-zoom="5" data-icon="images/gmap_marker.png" data-icon-active="images/gmap_marker_active.png" data-styles="[{&quot;featureType&quot;:&quot;landscape&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:60}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:40},{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;administrative.province&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;lightness&quot;:30}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ef8c25&quot;},{&quot;lightness&quot;:40}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#b6c54c&quot;},{&quot;lightness&quot;:40},{&quot;saturation&quot;:-40}]},{}]">
        <div class="google-map"></div>
        <ul class="google-map-markers">
          <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-description="9870 St Vincent Place, Glasgow"></li>
        </ul>
      </div> --}}
      <footer class="section bg-default section-xs-type-1 footer-minimal">
        <div class="container">
          <div class="row row-30 align-items-lg-center justify-content-lg-between">
            <div class="col-lg-2">
                <div class="footer-brand">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('storage/images/logo-dark-main-257x84.png') }}" alt="" width="257" height="84"/>
                    </a>
                </div>

            </div>
            <div class="col-lg-10">
              <div class="footer-nav">
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="index.html">Home</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="about-us.html">About</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="typography.html">Typography</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="contacts.html">Contacts</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </footer>

      {{-- <section class="bg-gray-100 section-xs text-center">
        <div class="container">
          <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span>. All Rights Reserved. Design by <a href="https://www.templatemonster.com">TemplateMonster</a></p>
        </div>
      </section> --}}
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/nuevoIndex/core.min.js') }}"></script>
    <script src="{{ asset('js/nuevoIndex/script.js') }}"></script>

    <script src="{{ asset('assets2/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script>
        // Initialize PureCounter by Default. It also can be stored on variable
        new PureCounter();
        // Initialize PureCounter using custom selector and custom default configuration.
        // It also can be stored on variable
        new PureCounter({
            filesizing: true,
            selector: ".filesizecount",
            pulse: 2,
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init(); // Inicializa la librería
</script>
@stack('modals')


<!-- Main JS File -->

@livewireScripts
<script src="{{ asset('js/login-register.js') }}"></script>

@stack('scripts')
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

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
{{-- <script src="{{ asset('js/indexInicio/indexInicio.js') }}"></script> --}}

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
     /**
   * Init isotope layout and filters
   */
  document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
    let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
    let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
    let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

    let initIsotope;
    imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
      initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });
    });

    isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
      filters.addEventListener('click', function() {
        isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
        this.classList.add('filter-active');
        initIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        if (typeof aosInit === 'function') {
          aosInit();
        }
      }, false);
    });

  });
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
{{-- <a href="#" id="ui-to-top" class="ui-to-top fa fa-angle-up"></a> --}}
<svg href="#" id="ui-to-top" class="svg-inline--fa fa-angle-up fa-w-10 ui-to-top active" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="angle-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M177 159.7l136 136c9.4 9.4 9.4 24.6 0 33.9l-22.6 22.6c-9.4 9.4-24.6 9.4-33.9 0L160 255.9l-96.4 96.4c-9.4 9.4-24.6 9.4-33.9 0L7 329.7c-9.4-9.4-9.4-24.6 0-33.9l136-136c9.4-9.5 24.6-9.5 34-.1z"></path></svg>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
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
<script>
    document.getElementById('ui-to-top').addEventListener('click', function (e) {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
</script>
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
@endauth

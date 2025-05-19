<!DOCTYPE html>
<html lang="en">
<head>
     @auth
        @include('Chatify::layouts.headLinks')
    @endauth
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta property="og:locale" content="es_ES">
    <meta property="og:type" content="website">
    <link rel="canonical" href="http://salonnail.kesug.com/">
    <meta property="og:title" content="{{ config('app.name') }} Salón NAILS Ourense - {{ config('app.name') }} Salón Ourense">
    <meta property="og:description" content="Salón de Manicura y Pedicura en Ourense Bienvenid@s a {{ config('app.name') }} Nail art Studio. Somos un centro con una amplia variedad de tratamientos de manicura y pedicura junto con otros opciones destinadas a vuestra belleza. Te esperamos en Ourense. RESERVAR CITA PREVIA http://salonnail.kesug.com/ TRATAMIENTOS Uñas & Belleza Manicura rusa Cuidamos de tus uñas y hacemos que luzcan perfectas. […]">

    <meta property="og:url" content="http://salonnail.kesug.com/">
    <meta property="og:site_name" content="{{ config('app.name') }} Salón Ourense">
        <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <script src="{{ asset('js/pusher/pusherNew.js') }}"></script>
    {{-- icono --}}
    <link style="margin-left:3px;!important" sizes="32x32" rel="icon" type="image/svg" href="{{ asset('storage/cabecera/logo_CC.svg') }}">
    <link href="{{ asset('storage/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    {{-- mensajes --}}
    <link rel="stylesheet" href="{{ asset('css/message/alert-message.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/indexverdi.css') }}" rel="stylesheet">
    {{-- calendario de javascript --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
    <style>
.collapsible-link {
  width: 100%;
  position: relative;
  text-align: left;
}

.collapsible-link::before {
  content: "\f107";
  position: absolute;
  top: 50%;
  right: 0.8rem;
  transform: translateY(-50%);
  display: block;
  font-family: "FontAwesome";
  font-size: 1.1rem;
}

.collapsible-link[aria-expanded="true"]::before {
  content: "\f106";
}
.font-24{
    font-size: 24px;
}
.dividerModificado{
top: -13px;
    position: relative;
    margin-right: 10px;

}
.card5620{
    border: none!important;
    margin-bottom: 7px;
    background-color: #F8F8F8!important;
}
</style>
</head>
<body>
     <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-jumping"><span></span><span></span><span></span><span></span><span></span></div>
      </div>
    </div>
    <div class="page">
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
                                                <img style="width: 58px!important; filter: invert(1);" class="mensajes" src="{{ asset('storage/cabecera/mail_w.svg') }}" alt="mensajes" />
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
      <section class="section-page-title" style=" background-image: url('{{ asset('storage/images/page-title-3-1920x305.jpg') }}');background-size: cover;background-position: center;">
        <div class="container">
          {{-- <h1 class="page-title">Reserva Online Manicura y Pedicura</h1> --}}
        </div>
      </section>
      <section class="breadcrumbs-custom">
        <div class="container">
          <ul class="breadcrumbs-custom-path">
            <li><a href="index.html">Inicio</a></li>
            <li class="active">Reserva online Manicura y Pedicura</li>
          </ul>
        </div>
      </section>
      <section class="section section-lg bg-default">
        <div class="container">
            {{-- <span class="next-element7" data-parallax-scroll='{"y": 30, "x": 0, "smoothness": 50}'></span>
                <span class="next-element8" data-parallax-scroll='{"y": 30, "x": 0, "smoothness": 50}'></span> --}}
                {{-- <span class="next-element3" data-parallax-scroll='{"y": 30, "x": 0, "smoothness": 50}'></span> --}}
          <div class="row row-50 align-items-lg-center justify-content-xl-between">
            <div class="col-12">
              <div class="">
                <h2 class="afri d-flex"><div class="divider-lg dividerModificado"></div>Manicura Pedicura</h2>

                <p class="big text-gray-800">¡Atrévete a pintar tu vida de colores!</p>
              </div>
              <div class="row row-30">
                <div class="col-md-6">
                  <div class="box-contact-info-with-icon"><span class="icon mdi mdi-clock icon-primary"></span>
                    <h5>Nuestro horario</h5>
                    <ul class="list-xs">
                      <li> <span class="text-gray-800">Lunes-Viernes: </span> 9:00 – 20:00
                      </li>
                      <li><span class="text-gray-800">Sábado:</span> 9:00 - 14:00
                      </li>
                      <li><span class="text-gray-800">Domingo: </span> Cerrado
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-contact-info-with-icon"><span class="icon mdi mdi-clock icon-primary"></span>
                    <h5>Nuestra ubicación</h5>
                    <ul class="list-xs">
                      <li><span class="text-gray-800">Address: </span> Washington, USA 6036 Richmond hwy.,  VA, 2230
                      </li>
                      <li><span class="text-gray-800">Offices: </span> 284-290
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">

              <!-- Accordion -->
      <div id="accordionExample" class="accordion">

        <!-- Accordion item 1 -->
        <div class="card card5620">
          <div id="headingOne" class="card-header border-0">
            <h2 class="mb-0">
              <button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
                aria-controls="collapseOne"
                class="font-24 afri btn btn-link text-dark font-weight-bold collapsible-link text-decoration-none">
                Manicura
            </button>
            </h2>
          </div>
          <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
            <div class="card-body p-5 bg-white">
              <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                single-origin coffee nulla assumenda shoreditch et.</p>
            </div>
          </div>
        </div><!-- End -->

        <!-- Accordion item 2 -->
        <div class="card card5620">
          <div id="headingTwo" class="card-header border-0">
            <h2 class="mb-0">
              <button type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                aria-controls="collapseTwo"
                class="font-24 afri btn btn-link collapsed text-dark font-weight-bold collapsible-link text-decoration-none">
                Pedicura
            </button>
            </h2>
          </div>
          <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
            <div class="card-body p-5 bg-white">
              <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                single-origin coffee nulla assumenda shoreditch et.</p>
            </div>
          </div>
        </div><!-- End -->

        <!-- Accordion item 3 -->
        <div class="card card5620">
          <div id="headingThree" class="card-header border-0">
            <h2 class="mb-0">
              <button type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                aria-controls="collapseThree"
                class="font-24 afri btn btn-link collapsed text-dark font-weight-bold collapsible-link text-decoration-none">
                Uñas de gel/acrílico
            </button>
            </h2>
          </div>
          <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
            <div class="card-body p-5 bg-white">
              <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                single-origin coffee nulla assumenda shoreditch et.</p>
            </div>
          </div>
        </div><!-- End -->
         <div class="card card5620">
          <div id="headingfor" class="card-header border-0">
            <h2 class="mb-0">
              <button type="button" data-toggle="collapse" data-target="#collapsefor" aria-expanded="false"
                aria-controls="collapsefor"
                class="font-24 afri btn btn-link collapsed text-dark font-weight-bold collapsible-link text-decoration-none">
                Nail Art
            </button>
            </h2>
          </div>
          <div id="collapsefor" aria-labelledby="headingfor" data-parent="#accordionExample" class="collapse">
            <div class="card-body p-5 bg-white">
              <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                single-origin coffee nulla assumenda shoreditch et.</p>
            </div>
          </div>
        </div><!-- End -->

      </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section parallax-container" data-parallax-img="images/parallax-04-1920x1320.jpg">
        <div class="parallax-content section-lg context-dark text-center section-filter-dark">
          <div class="container">
            <h2>Video Presentation </h2>
            <div class="divider-lg"></div>
            <p class="block-lg">In this video, our staff members tell about their work at Glory, how they achieve the best results for their clients every day and more. Click the Play button below to watch this presentation.</p>
          </div>
          <div class="container">
            <div class="box-video-button" data-lightgallery="group"><a class="button-play" data-lightgallery="item" href="https://www.youtube.com/watch?v=m10Vl9TXpec"><span class="icon fa-play"></span></a></div>
          </div>
        </div>
      </section>
      <section class="section section-md bg-default text-center">
        <div class="container">
          <h2>Our Professional Team</h2>
          <div class="divider-lg"></div>
          <p class="block-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Vestibulum bibendum elit cursus dapibus maximus. Maecenas sapien urna, cursus ut turpis non, gravida vehicula nisl. </p>
          <div class="row row-30">
            <div class="col-12">
              <!-- Owl Carousel-->
              <div class="owl-carousel carousel-creative" data-items="1" data-lg-items="3" data-dots="true" data-nav="false" data-stage-padding="15" data-loop="true" data-autoplay="true" data-margin="30" data-mouse-drag="false">
                <div class="team-minimal team-minimal-with-shadow">
                  <figure><img src="images/team-4-370x370.jpg" alt="" width="370" height="370"></figure>
                  <div class="team-minimal-caption">
                    <h4 class="team-title"><a href="#">Candice Marshall</a></h4>
                    <p>Cosmetologist</p>
                  </div>
                </div>
                <div class="team-minimal team-minimal-with-shadow">
                  <figure><img src="images/team-5-370x370.jpg" alt="" width="370" height="370"></figure>
                  <div class="team-minimal-caption">
                    <h4 class="team-title"><a href="#">Ann Smith</a></h4>
                    <p>Visagiste</p>
                  </div>
                </div>
                <div class="team-minimal team-minimal-with-shadow">
                  <figure><img src="images/team-1-370x370.jpg" alt="" width="370" height="370"></figure>
                  <div class="team-minimal-caption">
                    <h4 class="team-title"><a href="#">Mary Lucas</a></h4>
                    <p>Founder, Senior Hair Stylist</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12"><a class="button button-primary" href="#">View all team</a></div>
          </div>
        </div>
      </section>
      <section class="section section-lg bg-default">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-6">
              <div class="block-xs">
                <h2 class="heading-decorate">Testimonials<br class="d-inline"><span class="divider"></span>of Our Clients</h2>
                <p class="big text-gray-800">Thanks to our clients’ regular reviews, testimonials, and comments we are able to improve our salon.</p>
                <p>Unlike other salons, we prefer to maintain a constant connection with our customers and receive feedback on every service, whether it’s a simple haircut or complex wedding makeup. If you’ve already visited Glory, feel free to contact us and send your testimonial.</p>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- Owl Carousel-->
              <div class="owl-carousel carousel-corporate" data-items="1" data-dots="true" data-nav="false" data-stage-padding="10px" data-loop="true" data-autoplay="true" data-margin="25px" data-mouse-drag="false">
                <div class="quote-corporate">
                  <div class="quote-header">
                    <h4>Jennifer Moreno</h4>
                    <p class="big">Client</p>
                  </div>
                  <div class="quote-body">
                    <div class="quote-text">
                      <p>I love my eyebrow design. I'm usually very picky about my eyebrows and not everyone can give me what I want. You are amazing. Thank you for the amazing job you’ve done, I’ll be recommending you to my friends from now on!</p>
                    </div>
                    <svg class="quote-body-mark" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="66px" height="49px" viewbox="0 0 66 49" enable-background="new 0 0 66 49" xml:space="preserve">
                      <g></g>
                      <path d="M36.903,49v-3.098c9.203-5.315,14.885-12.055,17.042-20.222c-2.335,1.524-4.459,2.288-6.37,2.288						c-3.186,0-5.875-1.29-8.071-3.876c-2.194-2.583-3.293-5.74-3.293-9.479c0-4.133,1.443-7.605,4.327-10.407						C43.425,1.405,46.973,0,51.185,0c4.213,0,7.735,1.784,10.566,5.352C64.585,8.919,66,13.359,66,18.669						c0,7.482-2.85,14.183-8.549,20.112C51.751,44.706,44.902,48.112,36.903,49z M0.69,49v-3.098						c9.205-5.315,14.887-12.055,17.044-20.222c-2.335,1.524-4.478,2.288-6.423,2.288c-3.152,0-5.823-1.29-8.02-3.876						C1.096,21.51,0,18.353,0,14.614c0-4.133,1.434-7.605,4.301-10.407C7.168,1.405,10.709,0,14.92,0c4.247,0,7.778,1.784,10.592,5.352						c2.814,3.567,4.223,8.007,4.223,13.317c0,7.482-2.843,14.183-8.524,20.112C15.53,44.706,8.69,48.112,0.69,49z"></path>
                    </svg>
                  </div>
                  <div class="quote-image"><img src="images/home-1-10-90x90.jpg" alt="" width="90" height="90"/>
                  </div>
                </div>
                <div class="quote-corporate">
                  <div class="quote-header">
                    <h4>Mary Matthews</h4>
                    <p class="big">Client</p>
                  </div>
                  <div class="quote-body">
                    <div class="quote-text">
                      <p>Janette cut my hair and did partial highlights and my experience was excellent! She took her time doing my hair and I am very pleased with the results. If you are still looking where to have your hair cut the best way, head for Glory!</p>
                    </div>
                    <svg class="quote-body-mark" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="66px" height="49px" viewbox="0 0 66 49" enable-background="new 0 0 66 49" xml:space="preserve">
                      <g></g>
                      <path d="M36.903,49v-3.098c9.203-5.315,14.885-12.055,17.042-20.222c-2.335,1.524-4.459,2.288-6.37,2.288						c-3.186,0-5.875-1.29-8.071-3.876c-2.194-2.583-3.293-5.74-3.293-9.479c0-4.133,1.443-7.605,4.327-10.407						C43.425,1.405,46.973,0,51.185,0c4.213,0,7.735,1.784,10.566,5.352C64.585,8.919,66,13.359,66,18.669						c0,7.482-2.85,14.183-8.549,20.112C51.751,44.706,44.902,48.112,36.903,49z M0.69,49v-3.098						c9.205-5.315,14.887-12.055,17.044-20.222c-2.335,1.524-4.478,2.288-6.423,2.288c-3.152,0-5.823-1.29-8.02-3.876						C1.096,21.51,0,18.353,0,14.614c0-4.133,1.434-7.605,4.301-10.407C7.168,1.405,10.709,0,14.92,0c4.247,0,7.778,1.784,10.592,5.352						c2.814,3.567,4.223,8.007,4.223,13.317c0,7.482-2.843,14.183-8.524,20.112C15.53,44.706,8.69,48.112,0.69,49z"></path>
                    </svg>
                  </div>
                  <div class="quote-image"><img src="images/home-1-11-90x90.jpg" alt="" width="90" height="90"/>
                  </div>
                </div>
                <div class="quote-corporate">
                  <div class="quote-header">
                    <h4>Amanda Smith</h4>
                    <p class="big">Client</p>
                  </div>
                  <div class="quote-body">
                    <div class="quote-text">
                      <p>Thank you for the first-rate beauty service! I am very happy with the outcome. I feel fortunate to have met someone with years of training in makeup who is also bright and knowledgeable enough to determine my perfect style.</p>
                    </div>
                    <svg class="quote-body-mark" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="66px" height="49px" viewbox="0 0 66 49" enable-background="new 0 0 66 49" xml:space="preserve">
                      <g></g>
                      <path d="M36.903,49v-3.098c9.203-5.315,14.885-12.055,17.042-20.222c-2.335,1.524-4.459,2.288-6.37,2.288						c-3.186,0-5.875-1.29-8.071-3.876c-2.194-2.583-3.293-5.74-3.293-9.479c0-4.133,1.443-7.605,4.327-10.407						C43.425,1.405,46.973,0,51.185,0c4.213,0,7.735,1.784,10.566,5.352C64.585,8.919,66,13.359,66,18.669						c0,7.482-2.85,14.183-8.549,20.112C51.751,44.706,44.902,48.112,36.903,49z M0.69,49v-3.098						c9.205-5.315,14.887-12.055,17.044-20.222c-2.335,1.524-4.478,2.288-6.423,2.288c-3.152,0-5.823-1.29-8.02-3.876						C1.096,21.51,0,18.353,0,14.614c0-4.133,1.434-7.605,4.301-10.407C7.168,1.405,10.709,0,14.92,0c4.247,0,7.778,1.784,10.592,5.352						c2.814,3.567,4.223,8.007,4.223,13.317c0,7.482-2.843,14.183-8.524,20.112C15.53,44.706,8.69,48.112,0.69,49z"></path>
                    </svg>
                  </div>
                  <div class="quote-image"><img src="images/home-1-12-90x90.jpg" alt="" width="90" height="90"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Footer--><a class="banner" href="https://www.templatemonster.com/website-templates/monstroid2.html" target="_blank"><img src="images/monstroid-big.jpg" alt="" height="0"></a>
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
              <div class="footer-brand"><a href="index.html"><img src="images/logo-dark-main-257x84.png" alt="" width="257" height="84"/></a></div>
            </div>
            <div class="col-lg-10">
              <div class="footer-nav">
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item"><a class="rd-nav-link" href="index.html">Home</a></li>
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="about-us.html">About</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="typography.html">Typography</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="contacts.html">Contacts</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
     <script src="{{ asset('js/nuevoIndex/core.min.js') }}"></script>
    <script src="{{ asset('js/nuevoIndex/script.js') }}"></script>
</body>
</html>

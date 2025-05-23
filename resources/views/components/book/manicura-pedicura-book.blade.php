<div>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Reserva manicura pedicura</title>
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
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    {{-- icono app --}}
    {{-- <link rel="icon" href="{{ asset('storage/images/favicon.ico') }}" type="image/x-icon"> --}}

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
  <link style="margin-left:3px;!important" sizes="32x32" rel="icon" type="image/svg" href="{{ asset('storage/cabecera/logo_CC.svg') }}">
          <!-- Favicons -->
    {{-- <link href="{{ asset('storage/img/favicon.png') }}" rel="icon"> --}}
    <link href="{{ asset('storage/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
{{-- mensajes --}}
<link rel="stylesheet" href="{{ asset('css/message/alert-message.css') }}" rel="stylesheet">
  {{-- calendario de javascript --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-jumping"><span></span><span></span><span></span><span></span><span></span></div>
      </div>
    <!-- </div><a class="banner banner-top" href="https://www.templatemonster.com/website-templates/monstroid2.html" target="_blank"><img src="images/monstroid.jpg" alt="" height="0"></a> -->
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
                      <div class="unit unit-spacing-xs align-items-center">
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
              <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand" href="index.html"><img src="images/logo-dark-main-257x84.png" alt="" width="257" height="84"/></a></div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item"><a class="rd-nav-link" href="index.html">Home</a>
                      </li>
                      <li class="rd-nav-item active"><a class="rd-nav-link" href="about-us.html">About</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="typography.html">Typography</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="contacts.html">Contacts</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <section class="section-page-title" style="background-image: url(images/page-title-3-1920x305.jpg); background-size: cover;">
        <div class="container">
          <h1 class="page-title">Reserva Online Manicura y Pedicura</h1>
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

          <div class="row row-50 align-items-lg-center justify-content-xl-between">
            <div class="col-lg-6">
              <div class="block-xs">
                <h2>Who We Are</h2>
                <div class="divider-lg"></div>
                <p class="big text-gray-800">Cras ut vestibulum tortor. In in nisi sit amet metus varius pulvinar in vitae ipsum nec mi sollicitudin Fusce turpis massa,</p>
                <p>In ante sapien, dapibus luctus aliquet a, accumsan sit amet dolor. Mauris id facilisis dolor. Donec malesuada, est eu dignissim eleifend, est nulla dignissim nisl. Fusce turpis massa, mattis sit.</p>
              </div>
              <div class="row row-30">
                <div class="col-md-6">
                  <div class="box-contact-info-with-icon"><span class="icon mdi mdi-clock icon-primary"></span>
                    <h5>Opening Hours</h5>
                    <ul class="list-xs">
                      <li> <span class="text-gray-800">Monday-Friday: </span> 8:00am–8:00pm
                      </li>
                      <li><span class="text-gray-800">Saturday:</span> 8:00am–6:00pm
                      </li>
                      <li><span class="text-gray-800">Sunday: </span> Closed
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-contact-info-with-icon"><span class="icon mdi mdi-clock icon-primary"></span>
                    <h5>Our Location</h5>
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
            <div class="col-lg-6">
              <div class="box-images box-images-variant-3">
                <div class="box-images-item" data-parallax-scroll="{&quot;y&quot;: -20,   &quot;smoothness&quot;: 30 }"><img src="images/overview-1-470x282.jpg" alt="" width="470" height="282"/>
                </div>
                <div class="box-images-item box-images-without-border" data-parallax-scroll="{&quot;y&quot;: 40,  &quot;smoothness&quot;: 30 }"><img src="images/overview-2-470x282.jpg" alt="" width="470" height="282"/>
                </div>
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
      <div class="google-map-container" data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-zoom="5" data-icon="images/gmap_marker.png" data-icon-active="images/gmap_marker_active.png" data-styles="[{&quot;featureType&quot;:&quot;landscape&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:60}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:40},{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;administrative.province&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;lightness&quot;:30}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ef8c25&quot;},{&quot;lightness&quot;:40}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#b6c54c&quot;},{&quot;lightness&quot;:40},{&quot;saturation&quot;:-40}]},{}]">
        <div class="google-map"></div>
        <ul class="google-map-markers">
          <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-description="9870 St Vincent Place, Glasgow"></li>
        </ul>
      </div>
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
      <section class="bg-gray-100 section-xs text-center">
        <div class="container">
          <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span>. All Rights Reserved. Design by <a href="https://www.templatemonster.com">TemplateMonster</a></p>
        </div>
      </section>
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

</div>

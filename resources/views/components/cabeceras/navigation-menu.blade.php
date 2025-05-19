<nav class="navbarAdminPanel padding_nav  navbar navbar-expand-md navbar-dark bg-dark sticky-top" style="align-content: center;height: 4.3rem;justify-content: space-between;padding: 0.5rem 2rem 0.5rem 2rem;background-color: black!important">
    <ul class="navbar-nav list-group list-group-horizontal menuMobilVersion">
        <li class="nav-item align-items-center d-flex">
            <div class="side-menu_toggle_VbZoX"><span></span><span></span><span></span></div>
        </li>
    </ul>
    <ul class="navbar-nav list-group list-group-horizontal">
        <li class="nav-item mascota align-items-center d-flex">
            <a href="{{ route('init_page') }}" class=" align-items-center text-decoration-none logo d-flex align-items-center">

                <h1 class="sitename good nombreMarca22">
                    @include('logo_mya', ['width' => '16rem'])

                    <span style="margin-left: 10px;color:#fff5eb" class="spanInicioColetilla floritundia_coletilla">Nail Art Studio</span>
                </h1>
              </a>
            {{-- <a class="" href="{{ route('init_page') }}">
                <x-jet-application-mark style="width: 13rem" />
                <img style="width: 13rem;filter: drop-shadow(2px 4px 6px black);" class="servicios" src="{{ asset('storage/logo/logo_mya.png') }}" alt="subir anuncio" />
            </a> --}}
        </li>
    </ul>
    <div class="navbar" id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav align-items-baseline text-gualazon list-group-horizontal">
            @if (Auth::check())
                <li class="nav-item" style="cursor: pointer">
                    <a onclick="UpProduct('User', 'tab_user_button', 'panel/User')" class="text-decoration-none nav-link text-center">
                            <img style="" class="rounded-circle imgCabecera imgProfileInformation" width="35" height="35" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        <span class="spanOcultarMovil ms-1">Tú</span>
                    </a>
                </li>
                @if (Auth::check() && Auth::user()->is_admin)
                    <li class="nav-item" style="cursor: pointer">
                        <a class=" text-center text-decoration-none nav-link" onclick=" UpProductAdministrator('Mensajes_administrator', 'tab_administrator_message', 'admin/dashboard/Mensajes')">
                            <img style="width: 35px" class="mensajes" src="{{ asset('storage/cabecera/mail_w.svg') }}" alt="subir anuncio" />
                            <span class="spanOcultarMovil ms-1">Mensajes</span>
                            {{-- mensajes sin leer sobre--}}
                            <div class="listOfContacts listOfContactNotChat" style="width: 100%;height: calc(100% - 272px);position: relative;">
                            </div>
                        </a>
                    </li>
                    @else
                    <li class="nav-item" style="cursor: pointer">
                        <a class=" text-center text-decoration-none nav-link" onclick=" UpProduct('Mensajes_user', 'tab_user_message', 'panel/Mensajes')">
                            <img style="width: 35px" class="mensajes" src="{{ asset('storage/cabecera/mail_w.svg') }}" alt="subir anuncio" />
                            <span class="spanOcultarMovil ms-1">Mensajes</span>
                            {{-- mensajes sin leer sobre--}}
                            <div class="listOfContacts listOfContactNotChat" style="width: 100%;height: calc(100% - 272px);position: relative;">
                            </div>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="text-decoration-none nav-link text-center" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <img style="" class="salir" width="35" height="35" src="{{ asset('storage/cabecera/log-out_w.svg') }}" alt="Salir" />
                        <span class="spanOcultarMovil ms-1">{{ __('Log Out') }}</span>
                    </a>
                        {{-- <form method="POST" id="logout-form" action="{{ route('logout') }}">
                            @csrf
                        </form> --}}
                </li>
                @if (Auth::check() && Auth::user()->is_admin)
                <li class="nav-item notify_reserv" style="cursor: pointer">
                    <a class= "notificationNewReserv text-center text-decoration-none nav-link"
                    onclick=" UpProductAdministrator('Citas_administrator', 'tab_administrator_citas', 'admin/dashboard/Citas_administrator');showReservPending();"
                    data-bs-toggle="offcanvas" href="#canvasNotificationNewReserv" role="button" aria-controls="canvasNotificationNewReserv">
                        <img style="width: 35px" class="mensajes" src="{{ asset('storage/cabecera/notificacion.svg') }}" alt="subir anuncio" />
                        <span class="spanOcultarMovil ms-1">Notificaciones</span>
                    </a>
                </li>
               @else
               <li class="nav-item">
                <div class="d-flex" style="margin: 5px 0 30px 0;">
                    <a onclick="userIsAutenticated('botonDorado');" href="#services" class="butonGreen text-capitalize" style="text-decoration: none">PEDIR CITA</a>
                    </div>
                </li>
                @endif
            @else
            <li class="nav-item" style="margin-right: 10px;">
                <a class="text-decoration-none nav-link text-center" href="{{ route('login') }}">
                    {{-- <span class="front_btn"> --}}
                        <img  style="" class="salir" width="35" height="35" src="{{ asset('storage/cabecera/log-in.svg') }}" alt="{{ __('Register or login')  }}" />
                        Entrar o Registrarse
                    {{-- </span> --}}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('panelAdmin_user_up') }}" class="enlaceVender text-decoration-none text-dark text-center">
                    <span class="front_btn  btn-gualazon btn-gualazon-hover">
                    <img style="margin-right: 5px;" width= "30px" height="30px" class="" src="{{ asset('storage/cabecera/add-anun-white.svg') }}" alt="{{ __('Upload ad')  }}" />
                    Vender
                    </span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>

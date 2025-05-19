{{-- background-color: transparent!important;background: linear-gradient(to bottom, rgb(0 0 0), rgb(0 0 0 / 0%)); --}}
<nav class="navbarIndex navbar navbar-expand-md navbar-dark bg-dark sticky-top" style=" justify-content: space-between;padding: 0.5rem 2rem;height: 7rem;background-color: #3d795a!important">
    <ul class="navbar-nav list-group list-group-horizontal">
        <li class="nav-item mascota align-items-center d-flex">
            <a class="" href="{{ route('init_page') }}">
                {{-- <x-jet-application-mark style="width: 13rem" /> --}}
                <img style="width: 13rem;filter: drop-shadow(2px 4px 6px black);" class="servicios" src="{{ asset('storage/logo/logo_mya.png') }}" alt="subir anuncio" />
                {{-- <img style="width: 13rem;filter: drop-shadow(2px 4px 6px black);" class="servicios" src="{{ asset('storage/logo/mya__logo.png') }}" alt="subir anuncio" /> --}}
            </a>
        </li>
        {{-- <li class="nav-item" style="height: 1rem">
            <span class="floritundia" style="">Mya</span>
        </li>
        <x-jet-nav-link class="nav-item nombreMarca" href="{{ route('init_page') }}" :active="request()->routeIs('init_page')">
            <span style="" class="floritundia_coletilla">NAIL ART STUDIO</span>
            <span class="amaquina">{{ config('app.name') }}</span>
        </x-jet-nav-link> --}}
    </ul>
    {{-- <div class="buscador_nav justify-content-center d-flex">
        <x-buscador.buscador/>
    </div> --}}
    <div class="hamburguerResponsive">
        <a id="canvasCategoryId" style="color: #29363d" onclick="" class="text-decoration-none" data-bs-toggle="offcanvas" href="#canvasCategory" role="button" aria-controls="canvasCategory">
            <label class="d-flex align-items-center border-0 m-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#29363d" viewBox="0 0 24 24" part="inner-svg"><path fill-rule="evenodd" d="M3 6a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6Zm0 6a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 6a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 18Z" clip-rule="evenodd"></path></svg>
                {{-- <span class="ms-2 spanHover">Todas las categorías</span> --}}
            </label>
        </a>
    </div>
    <div class="navbar" id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav align-items-baseline text-gualazon">
            @if (Auth::check())
                <li class="nav-item">
                    <a href="{{ route('panelAdmin_user') }}" class="text-decoration-none nav-link text-center ">
                        <img style="" class="rounded-circle imgCabecera" width="35" height="35" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        <span class="">Tú</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="text-decoration-none nav-link text-center" href="{{ route('panelAdmin_user_Message') }}">
                        <img style="width: 35px" class="mensajes" src="{{ asset('storage/cabecera/mail_w.svg') }}" alt="mensajes" />
                        {{-- <i style="font-size: 2rem" class="bi bi-chat-square-dots"></i> --}}
                        <span class="">Mensajes</span>
                        <div class="listOfContacts listOfContactNotChat" style="width: 100%;height: calc(100% - 272px);position: relative;">
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="text-decoration-none nav-link text-center" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <img style="" class="salir" width="35" height="35" src="{{ asset('storage/cabecera/log-out_w.svg') }}" alt="Salir" />
                        {{-- <i style="font-size: 2rem" class="bi bi-box-arrow-right"></i> --}}
                        {{ __('Log Out') }}
                    </a>
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </li>
                @if (Auth::check() && Auth::user()->is_admin)
                <li class="nav-link">
                    <a href="{{ route('admin.dashboard') }}" class="text-decoration-none nav-link text-center">
                        <img style="margin-right: 5px;" width= "35px" height="35px" class="" src="{{ asset('storage/cabecera/panel_w.svg') }}" alt="Panel de administrador" />
                        Panel
                    </a>
                </li>
                <li class="nav-item notify_reserv" style="cursor: pointer">
                    <a href="{{ route('admin.citas') }}" class="notificationNewReserv text-center text-decoration-none nav-link">
                        {{-- <b class='redPoinNewReserv'></b> --}}
                        <img style="width: 35px" class="mensajes" src="{{ asset('storage/cabecera/notificacion.svg') }}" alt="subir anuncio" />
                        <span class="ms-1">Notificaciones</span>
                    </a>
                </li>
               @else
               <li class="nav-link">
                <a href="{{ route('panelAdmin_user') }}" class="text-decoration-none nav-link text-center">
                    <img style="margin-right: 5px;" width= "35px" height="35px" class="" src="{{ asset('storage/cabecera/panel_w.svg') }}" alt="{{ __('Upload ad')  }}" />
                    Panel User
                </a>
            </li>
                @endif

            @else
            <li class="nav-item" style="margin-right: 10px;">
                <a class="text-decoration-none nav-link text-center" href="{{ route('login') }}">
                    {{-- <span class="front_btn">
                        <img style="" class="salir" width="35" height="35" src="{{ asset('storage/cabecera/log-in.svg') }}" alt="{{ __('Register or login')  }}" />
                    </span> --}}
                    <span>Entrar o Registrarse</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('panelAdmin_user_up') }}" class="text-decoration-none text-center">
                    <span class="butonGreen btn-gualazon-hover text-capitalize" style="font-size: 18px;letter-spacing: 1px;font-family: 'Montserrat-Medium' !important;filter: drop-shadow(2px 4px 6px black);">
                        RESERVAR CITA
                        {{-- <img class="ms-3" style="width: 25px;" id="" src="{{ asset('storage/cabecera/check_white.svg') }}" alt=""> --}}
                    </span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>
{{-- <div class="buscador_div_nav_menu mt-2 justify-content-center d-flex">
    <x-buscador.buscador/>
</div> --}}

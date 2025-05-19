<div class="tabs tabsResponsive " style="" id="tabsResponsiveid">
    <div class="row">
        <div class=" col-12" style="height: 90%">
        <button id="tab_user_button" class="tablinks active" data-pannel="User" style="height: 128px;">
        <p data-title="{{ Auth::user()->name}}">
            {{-- <a href="{{ route('panelAdmin_product') }}" class="pushable text-decoration-none"> --}}
                <span class=" front_btn  px-3" style="border-radius: 35%!important;padding:0px!important">
                    {{-- <img id="profilePhoto" class="rounded-circle img-user-lateralMenu" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /> --}}
                        <img style="margin-right: 1rem" id="" class="rounded-circle img-user-lateralMenu imgProfileInformation" src="{{ asset(Auth::user()->profile_photo_url) }}" alt="{{ Auth::user()->name }}" />
                        <div class=" responsive_tabUser_info text-black">
                            <h3>{{ Auth::user()->name }}</h3>
                        </div>
                        <div class="arrow_panel" style="margin-left: auto">
                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg" display="flex"><path fill-rule="evenodd" clip-rule="evenodd" d="M.781 8.352a1.056 1.056 0 00.106 1.41.88.88 0 001.305-.114l3.148-4a1.062 1.062 0 000-1.296l-3.148-4A.88.88 0 00.887.238C.497.596.45 1.227.78 1.648L3.419 5 .781 8.352z" fill="#253238"></path></svg>
                        </div>
                    </span>
            {{-- </a> --}}
        </p>
        </button>
        <div class="separator w-100 align-content-end" style="background-color:#f4f5f7;">
            <h1 class="" style=""> </h1>
            <h4 class="text-saparator mb-2 px-2">Transacciones</h4>
        </div>

        <button id="tab_user_reservas" class="tablinks" data-pannel="Reservas">
            <p data-title="Reservas">
                <span class=" mx-3" style="" size="large" >
                    <img style="width: 35px" class=" " src="{{ asset('storage/icons-left-menu/ventas.svg') }}" alt="{{ __('Sales')  }}" />

                </span>
                <span>Reservas</span>
                <div class="arrow_panel" style="margin-left: auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#29363d" viewBox="0 0 24 24" part="inner-svg"><path fill-rule="evenodd" d="M9.97 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06L13.19 12 9.97 8.78a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path></svg>
                </div>
            </p>
        </button>
        <button id="tab_user_compras" class="tablinks" data-pannel="Compras">
            <p data-title="Compras">
                <span class="  mx-3" style="">
                    <img style="width: 35px" class=" " src="{{ asset('storage/icons-left-menu/compras.svg') }}" alt="{{ __('Shopping')  }}" />
                </span>
                <span>Compras</span>
                <div class="arrow_panel" style="margin-left: auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#29363d" viewBox="0 0 24 24" part="inner-svg"><path fill-rule="evenodd" d="M9.97 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06L13.19 12 9.97 8.78a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path></svg>
                </div>
            </p>
        </button>
        <button id="tab_user_monedero" class="tablinks" data-pannel="Monedero">
            <p data-title="Monedero">
                <span class="  mx-3" style="">
                    <img style="width: 35px" class=" " src="{{ asset('storage/icons-left-menu/billetera.svg') }}" alt="{{ __('Briefcase')  }}" />
                </span>
                <span>Monedero</span>
                <div class="arrow_panel" style="margin-left: auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#29363d" viewBox="0 0 24 24" part="inner-svg"><path fill-rule="evenodd" d="M9.97 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06L13.19 12 9.97 8.78a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path></svg>
                </div>
            </p>
        </button>
        <div class="separator w-100 align-content-end" style="background-color:#f4f5f7;">
            <h1 class="" style=""> </h1>
            <h4 class="text-saparator mb-2 px-2">Catálogo</h4>
        </div>
        <button id="tab_user_product" class="tablinks" data-pannel="Productos" onclick="cerrarConversacion()">
            <p data-title="Productos">
                <span class="  mx-3" style="">
                    <img style="width: 35px" class=" " src="{{ asset('storage/icons-left-menu/productos.svg') }}" alt="{{ __('Products')  }}" />
                </span>
                <span>Productos</span>
                <div class="arrow_panel" style="margin-left: auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#29363d" viewBox="0 0 24 24" part="inner-svg"><path fill-rule="evenodd" d="M9.97 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06L13.19 12 9.97 8.78a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path></svg>
                </div>
            </p>
        </button>


        <div class="separator w-100 align-content-end" style="background-color:#f4f5f7;">
            <h1 class="" style=""> </h1>
            <h4 class="text-saparator mb-2 px-2">Cuenta</h4>
        </div>
        <button  id="tab_user_configuracion" class="tablinks" data-pannel="Configuracion">
            <p data-title="Configuracion">
                <span class="  mx-3" style="">
                    <img style="width: 35px" class=" " src="{{ asset('storage/icons-left-menu/configuracion.svg') }}" alt="{{ __('Setting')  }}" />
                </span>
                <span>Configuración</span>
                <div class="arrow_panel" style="margin-left: auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#29363d" viewBox="0 0 24 24" part="inner-svg"><path fill-rule="evenodd" d="M9.97 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06L13.19 12 9.97 8.78a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path></svg>
                </div>
            </p>
        </button>
        <button id="tab_user_gualazonpro" class="tablinks" data-pannel="GualazonPro">
            <p data-title="Buala Pro">
                <span class="  mx-3" style="">
                    <img style="width: 35px" class=" " src="{{ asset('storage/icons-left-menu/pro.svg') }}" alt="{{ __('Buala Pro')  }}" />
                </span>
                <span>{{ config('app.name') }} Pro</span>
                <div class="arrow_panel" style="margin-left: auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#29363d" viewBox="0 0 24 24" part="inner-svg"><path fill-rule="evenodd" d="M9.97 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06L13.19 12 9.97 8.78a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path></svg>
                </div>
            </p>
        </button>
        <div class="separator w-100 align-content-end" style="background-color:#f4f5f7;">
            <h1 class="" style=""> </h1>
            <h4 class="text-saparator mb-2 px-2">{{ config('app.name') }} responde</h4>
        </div>
        <button  id="tab_user_ayuda" class="tablinks" data-pannel="Ayuda">
            <p data-title="Ayuda">
                <span class="" style="">
                    <img class="img-sidebar" src="{{ asset('storage/icons-left-menu/ayuda.svg') }}" alt="{{ __('Help')  }}" />
                </span>
                <span>¿Necesitas ayuda?</span>
                <div class="arrow_panel" style="margin-left: auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#29363d" viewBox="0 0 24 24" part="inner-svg"><path fill-rule="evenodd" d="M9.97 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06L13.19 12 9.97 8.78a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path></svg>
                </div>
            </p>
        </button>
        </div>
        <div class=" col-lg-12" style="height: 90%">
        <x-footer.footer/>
        </div>
    </div>
 </div>

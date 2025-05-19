<x-app-layout>
    {{-- <x-movile.pannel-admin/> --}}
    <section id="wrapper" style="">
       <div class="content" style="">
          <!-- Tab links -->
          <div class="tabs">
             <button id="tab_user_button" class="tablinks active" data-pannel="User">
               <p data-title="{{ Auth::user()->name}}">
                   {{-- <a href="{{ route('panelAdmin_product') }}" class="pushable text-decoration-none"> --}}
                       <span class=" front_btn " style="border-radius: 50%!important;padding:0px!important">
                           <img id="profilePhoto" class="rounded-circle img-user-lateralMenu imgProfileInformation" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                       </span>
                   {{-- </a> --}}
               </p>
             </button>
             <button id="tab_user_reservas2" class="tablinks btnResetAll" data-pannel="Reservas">
               <p data-title="Reservas">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/citas_user.svg') }}" alt="Reservas" />
                   </span>
               </p>
           </button>
           <button id="tab_user_compras" class="tablinks" data-pannel="Compras">
               <p data-title="Compras">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/compras.svg') }}" alt="{{ __('Shopping')  }}" />
                   </span>
               </p>
           </button>
           <button id="tab_user_message" class="tablinks" data-pannel="Mensajes_user" onclick="">
               <p data-title="Mensajes">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/mensajes.svg') }}" alt="{{ __('Messages')  }}" />
                   </span>
                   {{-- mensajes sin leer --}}
                    <div class="listOfContacts listOfContactNotChatTab" style="width: 100%;height: calc(100% - 272px);position: relative;">
                    </div>
               </p>
           </button>
           </button>
           <button id="tab_user_estatistic" class="tablinks" data-pannel="Estatistic">
               <p data-title="Estatistic">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/estadistica.svg') }}" alt="{{ __('Statistics')  }}" />
                   </span>
               </p>
           </button>
           <button id="tab_user_product" class="tablinks" data-pannel="Productos" onclick="cerrarConversacion()">
               <p data-title="Productos">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/productos.svg') }}" alt="{{ __('Products')  }}" />
                   </span>
               </p>
           </button>
           <button id="tab_user_favoritos" class="tablinks" data-pannel="Favoritos">
               <p data-title="Favoritos">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/favoritos.svg') }}" alt="{{ __('Favoritos')  }}" />
                   </span>
               </p>
           </button>
           <button id="tab_user_monedero" class="tablinks" data-pannel="Monedero">
               <p data-title="Monedero">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/billetera.svg') }}" alt="{{ __('Briefcase')  }}" />
                   </span>
               </p>
           </button>
           <button id="tab_user_gualazonpro" class="tablinks" data-pannel="GualazonPro">
               <p data-title="Gualazon Pro">
                   <span class="" style="">
                       <img class="img-sidebar" src="{{ asset('storage/icons-left-menu/pro.svg') }}" alt="{{ __('Buala Pro')  }}" />
                   </span>
               </p>
           </button>
           <button  id="tab_user_ayuda" class="tablinks" data-pannel="Ayuda">
               <p data-title="Ayuda">
                   <span class="" style="">
                       <img class="img-sidebar" src="{{ asset('storage/icons-left-menu/ayuda.svg') }}" alt="{{ __('Help')  }}" />
                   </span>
               </p>
           </button>
           <button  id="tab_user_configuracion" class="tablinks" data-pannel="Configuracion">
               <p data-title="Configuracion">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/configuracion.svg') }}" alt="{{ __('Setting')  }}" />
                   </span>
               </p>
           </button>
          </div>

          <!-- Tab content -->
          <div class="wrapper_tabcontent noVisible" id="contentTabs">
                <div id="User" class="tabcontent active p-3">
                    {{-- <h3 class="h3tabContent" style="width: 217px!important;">{{ Auth::user()->name}}</h3> --}}
                    <div>
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                            @livewire('profile.update-profile-information-form')

                            <x-jet-section-border />
                        @endif

                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                            @livewire('profile.update-password-form')

                            <x-jet-section-border />
                        @endif

                        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                            @livewire('profile.two-factor-authentication-form')

                            <x-jet-section-border />
                        @endif

                        @livewire('profile.logout-other-browser-sessions-form')

                        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                            <x-jet-section-border />

                            @livewire('profile.delete-user-form')
                        @endif
                    </div>
                </div>

                <div id="Reservas" class="tabcontent h-100">

                <x-panel-admin.citas/>

                </div>
                <div id="Compras" class="tabcontent">
                    <h3 class="h3tabContent">Compras</h3>
                    <p>Compras </p>
                </div>

                <div id="Mensajes_user" class="tabcontent overflow-x-hidden overflow-y-hidden" style="height:100%">
                    {{-- <h3 class="h3tabContent">Mensajes</h3> --}}
                    @include('vendor.Chatify.pages.app')
                    {{-- @include('components.chat-gualazon.chat-gualazon') --}}
                </div>
                <div id="Estatistic" class="tabcontent">
                <h3 class="h3tabContent">Estadísticas</h3>
                <p>Estadisticas
                </p>
                </div>
                <div id="Productos" class="tabcontent">
                <h3 class="h3tabContent">Productos</h3>
                <p>Productos
                </p>
                </div>
                <div id="ProductUp" class="tabcontent container upload-page  pt-0">
                {{-- <h3 class="h3tabContent">Subir productos</h3> --}}
                {{-- <x-up-product.main-up-product/> --}}
                {{-- <x-up-product.bicicleta.off-canva-bicicleta/> --}}
                </div>
                <div id="Favoritos" class="tabcontent">
                <h3 class="h3tabContent">Favoritos</h3>
                <p>Favoritos
                </p>
                </div>
                <div id="Monedero" class="tabcontent">
                <h3 class="h3tabContent">Monedero</h3>
                <p>Monedero
                </p>
                </div>
                <div id="GualazonPro" class="tabcontent">
                <h3 class="h3tabContent">{{ config('app.name') }} Pro</h3>
                <p>{{ config('app.name') }} Pro
                </p>
                </div>
                <div id="Ayuda" class="tabcontent">
                <h3 class="h3tabContent">Ayuda</h3>
                <p>Ayuda
                </p>
                </div>
                <div id="Configuracion" class="tabcontent">
                <h3 class="h3tabContent">Configuración</h3>
                <p>Configuración
                </p>
                </div>
          </div>
       </div>
    </section>

    {{-- <x-footer.footer/> --}}
   </x-app-layout>
  @if(isset($executeJavaScript) && $executeJavaScript)
    @php
        if (isset($valuesMap[$value])) {
            [$param1, $param2, $param3] = $valuesMap[$value];
        }
    @endphp

    @if (isset($param1, $param2, $param3))
        <script>
            UpProduct('{{ $param1 }}', '{{ $param2 }}', '{{ $param3 }}');
        </script>
    @endif
@endif

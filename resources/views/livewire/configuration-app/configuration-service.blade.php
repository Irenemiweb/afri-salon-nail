<div>
    {{-- @if($isVisible) --}}
    <div style="box-sizing: inherit;" class="configurationServicesApp">
    <div class="index_settingsContent_M9Od2">
     <div>
         <header class= "paddingEnlace b-custom-header b-custom-header_header_oZL1I b-custom-header_headerPadding_gg5dx" style="padding: 0 0 1.5rem;">
             <div class="goToBack b-custom-header_left b-custom-header_hasIcon_uCjMI b-custom-header_hasIconEllipsis_gYB6P b-custom-header_left_bWmRf">
                <span style="font-size: 20px" class="spanGotobackConfigureServices b-icon iconFont icon-nav-arrow-left b-custom-header_icon_XtAgm">
                </span>
                <div class="">
                    <div class="b-custom-header_headerTitle_ogW55 txt--ellipsis">
                        <span class="b-custom-header_title_GTxIs b-custom-header_wordBreakAll_U_pxk">
                            Configuración de servicios
                        </span>
                    </div>
                </div>
             </div>
         </header>
     </div>
     <div class="openConfigServicios_b tile-grid_grid_ktCqg">
         {{--  servicios y combos --}}
         {{-- <a href="{{ route('admin.showAllServices') }}" class="text-decoration-none d-block" data-url2="servicios.combos"> --}}
            <a href="javascript:void(0);" class="paddingEnlace text-decoration-none d-block" data-url2="servicios.combos" id="configuracionServicios55">
             <div class="tile_container_TUxEJ tile_containerWithIcon_olyJI link-tile_tile_o6arK">
                 <div class="tile_wrapper_A8Ld5" style="margin-left: 17px;">
                     <div class="tile_titleWrapper_Mm5GN">
                         <img style="vertical-align: middle" class=" margin-right-8 b-icon_img_I0kuC" src="{{ asset('storage/icon_config_bussines/customer-payments.svg') }}" alt="{{ __('Pgaos y Ventas')  }}" alt="">
                         <h2 class="tile_title_ZZYC6 tile_size--16-sb_jCVno">
                             Servicios y Combos de servicios
                         </h2>
                     </div>
                     <span class="tile_subtitle_B5Dcu tile_size--12_qPhMJ">
                        Configura tus servicios, precio y ajustes avanzados.
                     </span>
                 </div>
                 <span style="font-size: 24px" class="b-icon iconFont icon-arrow-right tile_icon_kpm8l">

                 </span>
             </div>
         </a>
         {{--  Extras --}}
         <a href="#" class="paddingEnlace text-decoration-none d-block" data-url2="servicios.extras">
             <div class="tile_container_TUxEJ tile_containerWithIcon_olyJI link-tile_tile_o6arK">
                 <div class="tile_wrapper_A8Ld5" style="margin-left: 17px;">
                     <div class="tile_titleWrapper_Mm5GN">
                         <img style="vertical-align: middle" class=" margin-right-8 b-icon_img_I0kuC" src="{{ asset('storage/icon_config_bussines/negocio.svg') }}" alt="{{ __('Pgaos y Ventas')  }}" alt="">
                         <h2 class="tile_title_ZZYC6 tile_size--16-sb_jCVno">
                             Extras.
                         </h2>
                     </div>
                     <span class="tile_subtitle_B5Dcu tile_size--12_qPhMJ">
                        Permite a tus clientes personalizar su experiencia asignando extras a los servicios.
                     </span>
                 </div>
                 <span style="font-size: 24px" class="b-icon iconFont icon-arrow-right tile_icon_kpm8l">
                 </span>
             </div>
         </a>
     </div>
    </div>
    </div>
    {{-- @endif --}}
</div>


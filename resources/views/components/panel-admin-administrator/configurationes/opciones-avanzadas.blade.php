<div>
    {{-- @if($isVisible) --}}

    <div style="box-sizing: inherit;" class="configuracionNegocio">
        <div class="index_settingsContent_M9Od2">
            <div>
                <header class= "paddingEnlace b-custom-header b-custom-header_header_oZL1I b-custom-header_headerPadding_gg5dx" style="padding: 0 0 1.5rem;">
                    <div class="goToBack b-custom-header_left b-custom-header_hasIcon_uCjMI b-custom-header_hasIconEllipsis_gYB6P b-custom-header_left_bWmRf">
                       <span style="font-size: 20px" class="spanGotobackConfigureServices b-icon iconFont icon-nav-arrow-left b-custom-header_icon_XtAgm">
                       </span>
                       <div class="">
                           <div class="b-custom-header_headerTitle_ogW55 txt--ellipsis">
                               <span class="b-custom-header_title_GTxIs b-custom-header_wordBreakAll_U_pxk">
                                   Opciones avanzadas
                               </span>
                           </div>
                       </div>
                    </div>
                </header>
            </div>
            <div class="tile-grid_grid_ktCqg">
                {{--  settings payments --}}
                <a href="#" class="paddingEnlace configuracionNegocioA text-decoration-none d-block" data-url="configuration.reserve" data-changeurl="admin/dashboard/Configuracion">
                    <div class="tile_container_TUxEJ tile_containerWithIcon_olyJI link-tile_tile_o6arK">
                        <div class="tile_wrapper_A8Ld5" style="margin-left: 17px;">
                            <div class="tile_titleWrapper_Mm5GN">
                                <img style="vertical-align: middle" class=" margin-right-8 b-icon_img_I0kuC" src="{{ asset('storage/icon_config_bussines/customer-payments.svg') }}" alt="{{ __('Pgaos y Ventas')  }}" alt="">
                                <h2 class="tile_title_ZZYC6 tile_size--16-sb_jCVno">
                                    Configuración de reservas
                                </h2>
                            </div>
                            <span class="tile_subtitle_B5Dcu tile_size--12_qPhMJ">
                                Configura las confirmaciones automáticas para evitar sorpresas relacionadas con la reserva y cambios de fechas.
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

<div>
    {{-- @if($isVisible) --}}

    <div style="box-sizing: inherit;" class="configuracionNegocio">
        <div class="index_settingsContent_M9Od2">
            <div>
                <header class="b-custom-header" style="padding: 0 0 1.5rem;">
                    <div class="b-custom-header_left align-items-center">
                        <div class="b-custom-header_headerTitle_ogW55 txt--ellipsis">
                            <span class="b-custom-header_title_GTxIs">
                                Configuración de negocio
                            </span>
                        </div>
                    </div>
                    <div class="b-custom-header_right">

                        <?php
                            $id_inputSearchClient = 'customBussiness';
                            $onkeyup="" ;
                        ?>
                        <x-buscador.buscador :id_inputSearchClient="$id_inputSearchClient" :onkeyup="$onkeyup"/>
                    </div>
                </header>
            </div>
            <div class="tile-grid_grid_ktCqg">
                {{--  settings payments --}}
                <a href="#" class="paddingEnlace text-decoration-none d-block" data-url="pagos.ventas" data-changeurl="admin/dashboard/Configuracion">
                    <div class="tile_container_TUxEJ tile_containerWithIcon_olyJI link-tile_tile_o6arK">
                        <div class="tile_wrapper_A8Ld5" style="margin-left: 17px;">
                            <div class="tile_titleWrapper_Mm5GN">
                                <img style="vertical-align: middle" class=" margin-right-8 b-icon_img_I0kuC" src="{{ asset('storage/icon_config_bussines/customer-payments.svg') }}" alt="{{ __('Pgaos y Ventas')  }}" alt="">
                                <h2 class="tile_title_ZZYC6 tile_size--16-sb_jCVno">
                                    Pagos y Ventas
                                </h2>
                            </div>
                            <span class="tile_subtitle_B5Dcu tile_size--12_qPhMJ">
                                Selecciona los modos de pago aceptados, verifica tu cuenta bancaria y configura los pagos móviles
                            </span>
                        </div>
                        <span style="font-size: 24px" class="b-icon iconFont icon-arrow-right tile_icon_kpm8l">

                        </span>
                    </div>
                </a>
                {{--  info bussines --}}
                <a href="#" class="paddingEnlace text-decoration-none d-block" data-url="info.bussines" data-changeurl="admin/dashboard/Configuracion">
                    <div class="tile_container_TUxEJ tile_containerWithIcon_olyJI link-tile_tile_o6arK">
                        <div class="tile_wrapper_A8Ld5" style="margin-left: 17px;">
                            <div class="tile_titleWrapper_Mm5GN">
                                <img style="vertical-align: middle" class=" margin-right-8 b-icon_img_I0kuC" src="{{ asset('storage/icon_config_bussines/negocio.svg') }}" alt="{{ __('Pgaos y Ventas')  }}" alt="">
                                <h2 class="tile_title_ZZYC6 tile_size--16-sb_jCVno">
                                    Información del negocio.
                                </h2>
                            </div>
                            <span class="tile_subtitle_B5Dcu tile_size--12_qPhMJ">
                                Añade información acerca de tu marca, configura la ubicación y crea formularios para clientes.
                            </span>
                        </div>
                        <span style="font-size: 24px" class="b-icon iconFont icon-arrow-right tile_icon_kpm8l">
                        </span>
                    </div>
                </a>
                {{--  info bussines --}}
                <a href="#" class="paddingEnlace text-decoration-none d-block" data-url="config.services">
                    <div class="tile_container_TUxEJ tile_containerWithIcon_olyJI link-tile_tile_o6arK">
                        <div class="tile_wrapper_A8Ld5" style="margin-left: 17px;">
                            <div class="tile_titleWrapper_Mm5GN">
                                <img style="vertical-align: middle" class=" margin-right-8 b-icon_img_I0kuC" src="{{ asset('storage/icon_config_bussines/configurar_servicios.svg') }}" alt="{{ __('Pgaos y Ventas')  }}" alt="">
                                <h2 class="tile_title_ZZYC6 tile_size--16-sb_jCVno">
                                    Configuración de servicios.
                                </h2>
                            </div>
                            <span class="tile_subtitle_B5Dcu tile_size--12_qPhMJ">
                                Añade información acerca de los servicios, modifícalos, crea nuevos y añadeles categorías para facilitar su búsqueda.
                            </span>
                        </div>
                        <span style="font-size: 24px" class="b-icon iconFont icon-arrow-right tile_icon_kpm8l">
                        </span>
                    </div>
                </a>
                {{--  avanzados --}}
                <a href="#" class="paddingEnlace text-decoration-none d-block" data-url="advant.options">
                    <div class="tile_container_TUxEJ tile_containerWithIcon_olyJI link-tile_tile_o6arK">
                        <div class="tile_wrapper_A8Ld5" style="margin-left: 17px;">
                            <div class="tile_titleWrapper_Mm5GN">
                                <img style="vertical-align: middle" class=" margin-right-8 b-icon_img_I0kuC" src="{{ asset('storage/icon_config_bussines/configurar_servicios.svg') }}" alt="{{ __('Pgaos y Ventas')  }}" alt="">
                                <h2 class="tile_title_ZZYC6 tile_size--16-sb_jCVno">
                                    Opciones avanzadas.
                                </h2>
                            </div>
                            <span class="tile_subtitle_B5Dcu tile_size--12_qPhMJ">
                                Ve a la configuración de reservas, ajusta los detalles de ventas a tus necesidades y comprueba el número de mensajes enviados
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

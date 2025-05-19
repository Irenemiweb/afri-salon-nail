<div style="height: 100%">
    <x-modals.modal-modificar-categoria/>

    {{-- @if($isVisible) --}}
    <div class="configurar_servicios-open" style="height: 100%">
        <div></div>
        <div class="index_settingsContainer_MIteR">
            <div class="index_settingsContent_M9Od2">
                <div class=" w-100 h-100">
                    <div class=" w-100 h-100 list_container_er2hV">
                        <div class="list_header_BOVM0">
                            <header class="paddingEnlace b-custom-header b-custom-header_header_oZL1I b-custom-header_headerPadding_gg5dx">
                                <div class="b-custom-header_left b-custom-header_hasIcon_uCjMI b-custom-header_hasIconEllipsis_gYB6P b-custom-header_left_bWmRf">
                                    <span style="font-size: 20px"
                                          class=" spanGotobackServicesCombos b-icon iconFont icon-nav-arrow-left b-custom-header_icon_XtAgm">
                                    </span>
                                    <div>
                                        <div class="b-custom-header_headerTitle_ogW55 txt--ellipsis">
                                            <span class="b-custom-header_title_GTxIs b-custom-header_wordBreakAll_U_pxk">
                                                Servicios y Combos de servicios.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="" style="position: absolute;right: 5rem;">
                                    {{-- <x-buscador.buscador/> --}}
                                    @if (session('success'))
                                        <div style="" class="slideLeft alert alert-success-green d-flex rounded-3" role="alert">
                                            <i style="font-size: 30px" class="fa fa-check-circle text-success me-3 align-self-center" aria-hidden="true"></i>
                                            <div class="text-content">
                                                <div class="notification-header">
                                                    <button style="right: 12px" type="button" class=" position-absolute btn-close btn-sm ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                <div style="top: 10px" class="notification-body position-relative"> {{ session('success') }}</div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </header>
                        </div>
                        <div class="index_servicesList_t2nI0">
                            <div class="b-inifinite-scroll b-infinite-scroll_scrollable_X8X5F scrollable index_servicesContainer_ItqpS">
                                <div class="b-infinite-scroll_content_uwl9t">
                                    {{-- grupo para filtrar --}}
                                    <div class="index_layout_EJrGJ padding-20 isotope-layout" data-default-filter="*" data-layout="fitRows" data-sort="original-order">
                                        <div class="index_categoriesSection_VsirW isotope-filters">
                                            {{-- lista de las categorías fijas--}}
                                            <div>
                                                <div >
                                                    <div data-filter="*" class="divTodasCategorias category_categoryName_iuwvt category_size--16-sb_ntrdG category_bgcolor--gray_PmXQU">
                                                        <div class="category_nameWrapper_wK6_H">
                                                            <div class="category_name_JjeDF">
                                                                Todas las categorías
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="service-drag-mirror">
                                                    {{-- <div data-filter=".sinCategoria" class="category_categoryName_iuwvt category_size--16-sb_ntrdG category_bgcolor--white_PU_d0"> --}}
                                                    <div data-filter=".filter-{{ Str::slug('No categorizado', '') }}" class="category_categoryName_iuwvt category_size--16-sb_ntrdG">
                                                        <div class="category_nameWrapper_wK6_H">
                                                            <div class="category_name_JjeDF">
                                                                Sin categoria
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- lista de categorías añadidas --}}
                                            <div class="contentAllCategories" data-urlImage="{{ asset('storage/icon_config_lateral_menu/newCategory.svg') }}">
                                                {{-- empieza el bucle --}}
                                                @foreach ($categorias as $categoria)
                                                <div class="service-drag-mirror" data-filter=".filter-{{ Str::slug($categoria->categoria, '') }}">
                                                    <div class="category_categoryName_iuwvt category_size--16-sb_ntrdG">
                                                        <div class="category_nameWrapper_wK6_H">
                                                            <span class=" justify-content-center d-flex b-icon iconFont icon-grab index_grabIcon_W4ymA" onclick="">
                                                                <img id="" class="modifyNameCategory"  src="{{ asset('storage/icon_config_lateral_menu/newCategory.svg') }}" alt="nueva categoria" />
                                                            </span>
                                                            <div class="category_name_JjeDF">
                                                                {{ $categoria->categoria }}
                                                            </div>
                                                        </div>
                                                        <span data-name="{{ $categoria->categoria }}" data-index="{{ $categoria->id }}" data-bs-toggle="modal" data-bs-target="#modifyCategoryModal" class="modifyCategory b-icon iconFont icon-arrow-right index_arrowIcon_aAlS4" style="font-size: 26px;"></span>
                                                    </div>
                                                </div>
                                                @endforeach
                                                {{-- fin del bucle --}}
                                                <div id="infoCategoriModify" data-index="" data-categoriname></div>
                                            </div>
                                        </div>
                                        <div class="serviciosContainerConfiguracion">

                                        </div>
                                        <div class="index_servicesSection_De6EC">
                                            <div class="index_categoryServices_p6iLI isotope-container" style="height: 100%!important;">
                                                
                                                @foreach ($servicios as $index => $servicio)
                                                    @php
                                                        $serviceData = [
                                                            'serviceId' => $servicio->id,
                                                            'serviceName' => $servicio->nombre,
                                                            'serviceCategoria' => $servicio->categoria,
                                                            'serviceDescription' => $servicio->descripcion,
                                                            'serviceHora' => $servicio->horaNewService,
                                                            'serviceMinuto' => $servicio->minutosNewService,
                                                            'serviceTipoPre' => $servicio->tipoPrecioNewService,
                                                            'serviceDuration' =>$servicio->duracion,
                                                            'serviceColor' =>$servicio->borderColor,
                                                            'servicePrecio' =>$servicio->precio
                                                        ];
                                                    @endphp
                                                    @php
                                                    // Convertir la categoría a minúsculas, quitar acentos y caracteres especiales, y reemplazar espacios por guiones
                                                    $categoriaSlug2 = strtolower(str_replace(' ', '-', preg_replace('/[^A-Za-z0-9\-]/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $servicio->categoria))));
                                                    @endphp
                                                    <div class="index_serviceListItem_frUaN service-drag-mirror isotope-item filter-{{ $categoriaSlug2 }}"  data-serviceModify="{{ json_encode($serviceData) }}">
                                                        <div class="service_serviceNameWrapper_PgZ_8">
                                                            {{-- el color viene de la base de datos --}}
                                                            <div style="border-color: {{ $servicio->borderColor }};" class="service_serviceBorder_FXobg">
                                                                <div class="service_serviceName_VOvl9 service_size--16_Twd1o">
                                                                    {{ $servicio->nombre }}
                                                                </div>
                                                                <div class="service_serviceVariantDuration_HKxM3">
                                                                    <span class="duration">
                                                                        @if ($servicio->horaNewService > 0)
                                                                            {{ $servicio->horaNewService }}h {{ $servicio->minutosNewService }}min
                                                                        @else
                                                                            {{ $servicio->minutosNewService }}min
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="service_servicePrice_GTohf">
                                                                {{ $servicio->precio }} €
                                                            </div>
                                                            <span class="b-icon iconFont icon-arrow-right index_arrowIcon_aAlS4" style="font-size: 26px;"></span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="index_addButtonContainer_T06ep">
                                <div class="add-button_container_XYs5x index_addButton___xb6">
                                    {{-- background cuando clicas en añadir servicio --}}
                                    <div class="add-button_overlay_nOmaV"></div>
                                    {{-- ----- --}}
                                    <button type="button" class="addService b-button_button_QiVJW b-button_theme--icon_mi9ao add-button_addButton_QC_sT">
                                        <span class="b-icon iconFont icon-plus" type="font" style="font-size: 22px;"></span>
                                    </button>
                                    {{-- ------modal elegir servicio, categoria o combo----- --}}
                                    <div class="add-button_dropdown_ZXg6G d-none">
                                        <div class="add-button_dropdownContent_MTAOC">
                                            <div data-url3="add.sevice" class="add-button_button_U2OQn">
                                                 Nuevo servicio
                                            </div>
                                            <hr class="add-button_hr_B5qAz">
                                            <div data-url3="add.combo" class="add-button_button_U2OQn">
                                                Nuevo combo de servicios
                                            </div>
                                            <hr class="add-button_hr_B5qAz">
                                            <div data-url3="add.category" class="add-button_button_U2OQn">
                                                    Nueva categoría
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ------ --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal modificar categoria--}}
        <div class="modal fade" id="modificarCategoriaModal" tabindex="-1" aria-labelledby="modificarCategoriaModalLabel" data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title gualazonF" id="modificarCategoriaModalLabel">Modifiar categoria</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body gualazonF">
                    ¿Seguro que quieres cancelar la reserva? Los cambios no guardados se perderán
                </div>
                <div class="modal-footer">
                  <button data-bs-dismiss="modal" id="confirmCalcelService" type="button" class="button button-white-salon button-lg button-block mt-md">Si, cancelar reserva</button>
                  <button type="button" class="button button-lg button-primary-salon button-block" data-bs-dismiss="modal">Continuar reservando</button>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>


{{-- offcanvas tarjetas verdes para añadir nuevo servicio --}}
<div style="border-radius: 12px 0px 0px;" class="offcanvas offcanvas-end" id="offcanvasShowAllServicesChangeAdd" tabindex="-1" aria-labelledby="offcanvasShowAllServicesChangeAddLabel" data-bs-backdrop="static">

    <div class="service-select_container_SSVpA drawer_body_mcPYG">
        <header class="margin-bottom-16 b-custom-header_header_oZL1I">
            <div class="b-custom-header_left b-custom-header_hasIcon_uCjMI b-custom-header_hasIconEllipsis_gYB6P b-custom-header_left_bWmRf">
                <span class="exitShowAllServicesChange b-icon iconFont icon-nav-arrow-left b-custom-header_icon_XtAgm" style="font-size: 20px;"></span>
                <div class="">
                    <div class="b-custom-header_headerTitle_ogW55 txt--ellipsis">
                        <span class="b-custom-header_title_GTxIs b-custom-header_wordBreakAll_U_pxk">
                            Seleccionar servicio
                        </span>
                    </div>
                </div>
            </div>
        </header>
        <div class="b-custom-header_right_uT_uU pe-3">
            <div class="scrollable-x b-tabs_container_mpBHN service-select_tabs_z09_R">
                <div class="b-tabs_content_lxbV0">
                    <ul class="b-tabs_tabs_nYRc_ b-tabs_tabsBordered_yoE3l b-tabs_size--14_SADcU">
                        <li tabindex="0" class="b-tabs_tab_Gc2Ei b-tabs_tabBordered_CjuJV">
                            Todos los servicios
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class=" mb-4 pe-3">
            <?php
                $id_inputSearchClient = 'allsevices_add';
                $onkeyup="" ;
            ?>
        <x-buscador.buscador :id_inputSearchClient="$id_inputSearchClient" :onkeyup="$onkeyup"/>
        </div>
        <div class="scrollable service-select_servicesList_wiG0Q">
            <div>
                @foreach ($categorias as $index => $categoria)
                <div>
                    <div class="services-list_header_zR0q6Add {{ preg_replace('/[^A-Za-z0-9]/', '', str_replace(' ', '', iconv('UTF-8', 'ASCII//TRANSLIT', $categoria->categoria))) }}"
                         data-target="content-{{ $categoria->categoria }}-{{ $index }}Add">
                        <p class="txt--ellipsis mb-0">{{ $categoria->categoria }}</p>
                        <span class="b-icon iconFont icon-arrow-down" style="font-size: 16px;"></span>
                    </div>
                    <div id="content-{{ $categoria->categoria }}-{{ $index }}Add" class="serviceListContent {{ preg_replace('/[^A-Za-z0-9]/', '', str_replace(' ', '', iconv('UTF-8', 'ASCII//TRANSLIT', $categoria->categoria))) }}">
                        @foreach ($servicios->where('categoria', $categoria->categoria) as $servicio)
                        @php
                            $backgroundColor = lightenColor($servicio->borderColor, 70); // Aclara el color un 20%
                        @endphp
                        <div data-servicioChange="{{ $servicio->id }}" class="services-list_serviceVariant_i9qZrAdd" style="background-color: {{ $backgroundColor }};">
                            <div class="services-list_serviceName_wMt6X" style="border-color: {{ $servicio->borderColor }};">
                                {{ $servicio->nombre }}
                            </div>
                            <p class="services-list_serviceDescription_utpTW d-none">
                                {{ $servicio->descripcion }}
                            </p>
                            <span class="duration services-list_duration_TS_rJ"> {{ $servicio->duracion }} </span>
                            <div class="services-list_serviceVariantPrice_lEk6L"> {{ $servicio->precio }}&nbsp;€ </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

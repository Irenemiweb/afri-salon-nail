{{-- tarjetas verdes modificar servicio inicial --}}
<div style="border-radius: 12px 0px 0px;" class="offcanvas offcanvas-end" id="offcanvasShowAllServicesChange" tabindex="-1" aria-labelledby="offcanvasShowAllServicesChangeLabel" data-bs-backdrop="static">
    @php
        function lightenColor($rgb, $percentage) {
            // Extrae los valores RGB del formato "rgb(x, y, z)"
            preg_match('/rgb\((\d+), (\d+), (\d+)\)/', $rgb, $matches);
            if (!$matches) {
                return $rgb; // Si no es un color válido, lo devuelve sin cambios
            }

            // Incrementa cada componente R, G y B en el porcentaje dado
            $r = min(255, intval($matches[1]) + (255 - intval($matches[1])) * $percentage / 100);
            $g = min(255, intval($matches[2]) + (255 - intval($matches[2])) * $percentage / 100);
            $b = min(255, intval($matches[3]) + (255 - intval($matches[3])) * $percentage / 100);

            return "rgb(" . round($r) . ", " . round($g) . ", " . round($b) . ")";
        }
    @endphp
    <div class="service-select_container_SSVpA drawer_body_mcPYG">
        <header class="margin-bottom-16 b-custom-header_header_oZL1I">
            <div class="b-custom-header_left b-custom-header_hasIcon_uCjMI b-custom-header_hasIconEllipsis_gYB6P b-custom-header_left_bWmRf">
                <span class="exitShowAllServicesChange b-icon iconFont icon-nav-arrow-left b-custom-header_icon_XtAgm" data-testid="b-custom-header-icon-back" style="font-size: 20px;"></span>
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
                $id_inputSearchClient = 'allsevices';
                $onkeyup="" ;
            ?>
        <x-buscador.buscador :id_inputSearchClient="$id_inputSearchClient" :onkeyup="$onkeyup"/>
        </div>
        <div class="scrollable service-select_servicesList_wiG0Q">
            <div>
                @foreach ($categorias as $index => $categoria)
                <div>
                    <div class="services-list_header_zR0q6 {{ preg_replace('/[^A-Za-z0-9]/', '', str_replace(' ', '', iconv('UTF-8', 'ASCII//TRANSLIT', $categoria->categoria))) }}"
                         data-target="content-{{ $categoria->categoria }}-{{ $index }}">
                        <p class="txt--ellipsis mb-0">{{ $categoria->categoria }}</p>
                        <span class="b-icon iconFont icon-arrow-down" style="font-size: 16px;"></span>
                    </div>
                    <div id="content-{{ $categoria->categoria }}-{{ $index }}" class="serviceListContent {{ preg_replace('/[^A-Za-z0-9]/', '', str_replace(' ', '', iconv('UTF-8', 'ASCII//TRANSLIT', $categoria->categoria))) }}">
                        @foreach ($servicios->where('categoria', $categoria->categoria) as $servicio)
                        @php
                            $backgroundColor = lightenColor($servicio->borderColor, 70); // Aclara el color un 20%
                        @endphp
                        <div data-servicioChange="{{ $servicio->id }}" class="services-list_serviceVariant_i9qZr" style="background-color: {{ $backgroundColor }};">
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


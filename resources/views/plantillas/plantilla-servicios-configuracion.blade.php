<div class="index_servicesSection_De6EC">
    <div class="index_categoryServices_p6iLI isotope-container" style="height: 100%!important;">
        @foreach (\App\Models\Servicio::where('activo', 'si')->get() as $index => $servicio)
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

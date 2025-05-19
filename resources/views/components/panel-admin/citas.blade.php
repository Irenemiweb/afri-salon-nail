<div>
    <div id="botonesTaxdata" class="container hero justify-content-center d-flex" style="">
        <div class=" UploadStepTemplate position-relative" style="background-color:transparent!important;border:none!important;transform: scale(0.9);">
            <div>
                <div class=" row ">
                  {{-- <span id="barraDesplazadora" class="gualazon-tabs__indicator" style="width: 137px; left:14px"></span> --}}
                    <div class="col types" style="justify-content: normal;gap:19px; z-index:99">
                        <button onclick="cambiarBoton('botonProximas');" style="min-width:140px" class="losdos citasTerProx rounded-pill --selected" id="botonProximas">Citas Próximas</button>
                        <button onclick="cambiarBoton('botonTerminadas');" style="min-width:140px" class="losdos citasTerProx rounded-pill" id="botonTerminadas">Citas Terminadas</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- citas proximas --}}
    <div class="citasProcimasContainer" id="citasProcimasContainer">
        @foreach ($citasProximas as $index => $citaProxima )
        <div class="purify_k0v4ZT-8fQhKC1hT7Aq0iQ== purify_yuDAM9gFmI4nZWPibEYwiA== purify_rVQl9be0GWxMBAq-kDQNHQ==">
            <div class="">
                <a href="#" class="" style="text-decoration: none">
                    <div class="purify_+Zj7hZGL16EFdy+wDf0BwQ== purify_Rptxv+WbCltBTrvcW8QtrQ== purify_HFhzTPIOh83XROVz6Wt4AA==">
                        <div class="purify_ifFp4rtZeiPB1hvBeJD6Tw==">
                            <div class="
                                @if ($citaProxima->status === 'pending' || $citaProxima->status === 'Finalizada') purify_Ks8Q8dHEaaaFeDYdNtADtw== purify_YDeoXrcjLlEdNmPC-e55Hw== purify_my7kvaO77EFZtdkGbwjvyA== purify_kq4BZr36QXoLgkAnN95TWw==
                                @elseif ($citaProxima->status === 'cancelled') purify_Ks8Q8dHEaaaFeDYdNtADtw== purify_Mq+0nEBBXOo2GlJ3m+Dovg== purify_my7kvaO77EFZtdkGbwjvyA== purify_kq4BZr36QXoLgkAnN95TWw==
                                @elseif ($citaProxima->status === 'no_asistida') bg-warning text-black purify_Ks8Q8dHEaaaFeDYdNtADtw== purify_D1nq2s-huXm2lObUUwFyqA== purify_my7kvaO77EFZtdkGbwjvyA== purify_kq4BZr36QXoLgkAnN95TWw==
                                @elseif ($citaProxima->status === 'confirmed') purify_Ks8Q8dHEaaaFeDYdNtADtw== purify_D1nq2s-huXm2lObUUwFyqA== purify_my7kvaO77EFZtdkGbwjvyA== purify_kq4BZr36QXoLgkAnN95TWw==
                                @endif
                                purify_Ks8Q8dHEaaaFeDYdNtADtw==
                            ">
                            {{-- <div class="{{ $citaProxima->status === 'pending' ? 'bg-warning text-black purify_Ks8Q8dHEaaaFeDYdNtADtw== purify_D1nq2s-huXm2lObUUwFyqA== purify_my7kvaO77EFZtdkGbwjvyA== purify_kq4BZr36QXoLgkAnN95TWw==' : 'purify_Ks8Q8dHEaaaFeDYdNtADtw== purify_D1nq2s-huXm2lObUUwFyqA== purify_my7kvaO77EFZtdkGbwjvyA== purify_kq4BZr36QXoLgkAnN95TWw==' }} "> --}}
                                <div class="good purify_BvwlhtQUrrEk5Sq16VFwnQ== purify_QbXCjCEw-iVf0ii07PXHcA==">
                                    {{ $citaProxima->status }}
                                </div>
                            </div>
                            <div class="purify_Hcg+wuoQ5pNJqZZO2m8O7w==">
                                <div class="">
                                    <div class="purify_NNhEf2PzlSRJmXRVgyW6sw==">
                                        <div class="purify_KbwpHGxX92tcKePw27ZpHQ==">
                                            <div class="purify_m0iNFIlsGaFmqMFgHvuv6w== purify_kq4BZr36QXoLgkAnN95TWw== purify_AMwT3GfjPQNo3cAiuYd-hQ==">
                                                {{ $citaProxima->servicio->nombre }}
                                            </div>
                                            {{-- <div class="purify_uEe8eX9C6ZHaEZ3YWKPaAA== purify_bGpd2qde6bN8-doCZN4Uvw== purify_EArZoL4QVSiTmRib1mvsPg== purify_m9mNOPjpHD0tNTW6GC+hEw==">
                                                Pago: Pendiente.
                                            </div> --}}
                                        </div>
                                        <div>
                                            @if ($citaProxima->status !== 'pagado')
                                                <div class="purify_5DKVeLWnv-4fPlLWMtmBaQ==">
                                                    <div>
                                                        Pago pendiente.
                                                    </div>
                                                    <div data-testid="service-price">{{ $citaProxima->servicio->precio }}€</div>
                                                </div>
                                            @else
                                                <div class="purify_5DKVeLWnv-4fPlLWMtmBaQ==">
                                                    <div>
                                                        Pago Realizado.
                                                    </div>
                                                    <div data-testid="service-price">{{ $citaProxima->servicio->precio }}€</div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $fecha = \Carbon\Carbon::parse($citaProxima->date_time);
                        @endphp
                        <div class="purify_hsCP+NQTCqJkf+lbwAN4FA== purify_Sardy6hfiet162IZ2pYFPA== purify_m9mNOPjpHD0tNTW6GC+hEw== purify_9hcoDI6SWlEpcfAmG1bmSw==">
                            <div class="">
                                {{-- {{ $fecha->translatedFormat('M') }}  --}}
                                {{ $fecha->translatedFormat('M Y') }}
                            </div>
                            <div class="purify_FuEGVRcYA+olaP+n5-JrWA== purify_Sardy6hfiet162IZ2pYFPA== purify_r7cfvxYj81mnUA2sO2edaA==">
                                {{ $fecha->format('d') }} {{-- Día del mes --}}
                            </div>
                            <div></div>
                            <div class="">
                                {{ $fecha->format('H:i') }} {{-- Hora en formato 24 horas --}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    {{-- citas terminadas --}}
    <div class="citasTerminadasContainer" style="display: none" id="citasTerminadasContainer">
        @foreach ($citasTerminadas as $index => $citaTerminada )
        <div class="purify_k0v4ZT-8fQhKC1hT7Aq0iQ== purify_yuDAM9gFmI4nZWPibEYwiA== purify_rVQl9be0GWxMBAq-kDQNHQ==">
            <div class="">
                <a href="#" class="" style="text-decoration: none">
                    <div class="purify_+Zj7hZGL16EFdy+wDf0BwQ== purify_Rptxv+WbCltBTrvcW8QtrQ== purify_HFhzTPIOh83XROVz6Wt4AA==">
                        <div class="purify_ifFp4rtZeiPB1hvBeJD6Tw==">
                            <div class="
                                @if ($citaTerminada->status === 'pending') purify_Ks8Q8dHEaaaFeDYdNtADtw== purify_YDeoXrcjLlEdNmPC-e55Hw== purify_my7kvaO77EFZtdkGbwjvyA== purify_kq4BZr36QXoLgkAnN95TWw==
                                @elseif ($citaTerminada->status === 'cancelled') purify_Ks8Q8dHEaaaFeDYdNtADtw== purify_Mq+0nEBBXOo2GlJ3m+Dovg== purify_my7kvaO77EFZtdkGbwjvyA== purify_kq4BZr36QXoLgkAnN95TWw==
                                @elseif ($citaTerminada->status === 'no_asistida') bg-warning text-black purify_Ks8Q8dHEaaaFeDYdNtADtw== purify_D1nq2s-huXm2lObUUwFyqA== purify_my7kvaO77EFZtdkGbwjvyA== purify_kq4BZr36QXoLgkAnN95TWw==
                                @elseif ($citaTerminada->status === 'confirmed') purify_Ks8Q8dHEaaaFeDYdNtADtw== purify_D1nq2s-huXm2lObUUwFyqA== purify_my7kvaO77EFZtdkGbwjvyA== purify_kq4BZr36QXoLgkAnN95TWw==
                                @elseif ($citaTerminada->status === 'Finalizada') reservaPendiente restoConpading
                                @endif
                                purify_Ks8Q8dHEaaaFeDYdNtADtw==
                            ">
                            {{-- <div class="{{ $citaProxima->status === 'pending' ? 'bg-warning text-black purify_Ks8Q8dHEaaaFeDYdNtADtw== purify_D1nq2s-huXm2lObUUwFyqA== purify_my7kvaO77EFZtdkGbwjvyA== purify_kq4BZr36QXoLgkAnN95TWw==' : 'purify_Ks8Q8dHEaaaFeDYdNtADtw== purify_D1nq2s-huXm2lObUUwFyqA== purify_my7kvaO77EFZtdkGbwjvyA== purify_kq4BZr36QXoLgkAnN95TWw==' }} "> --}}
                                <div class="good purify_BvwlhtQUrrEk5Sq16VFwnQ== purify_QbXCjCEw-iVf0ii07PXHcA==">
                                    {{ $citaTerminada->status }}
                                </div>
                            </div>
                            <div class="purify_Hcg+wuoQ5pNJqZZO2m8O7w==">
                                <div class="">
                                    <div class="purify_NNhEf2PzlSRJmXRVgyW6sw==">
                                        <div class="purify_KbwpHGxX92tcKePw27ZpHQ==">
                                            <div class="purify_m0iNFIlsGaFmqMFgHvuv6w== purify_kq4BZr36QXoLgkAnN95TWw== purify_AMwT3GfjPQNo3cAiuYd-hQ==">
                                                {{ $citaTerminada->servicio->nombre }}
                                            </div>
                                            {{-- <div class="purify_uEe8eX9C6ZHaEZ3YWKPaAA== purify_bGpd2qde6bN8-doCZN4Uvw== purify_EArZoL4QVSiTmRib1mvsPg== purify_m9mNOPjpHD0tNTW6GC+hEw==">
                                                Pago: Pendiente.
                                            </div> --}}
                                        </div>
                                        <div>
                                            @if ($citaTerminada->status !== 'pagado')
                                                <div class="purify_5DKVeLWnv-4fPlLWMtmBaQ==">
                                                    <div>
                                                        Pago pendiente.
                                                    </div>
                                                    <div data-testid="service-price">{{ $citaTerminada->servicio->precio }}€</div>
                                                </div>
                                            @else
                                                <div class="purify_5DKVeLWnv-4fPlLWMtmBaQ==">
                                                    <div>
                                                        Pago Realizado.
                                                    </div>
                                                    <div data-testid="service-price">{{ $citaTerminada->servicio->precio }}€</div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $fecha = \Carbon\Carbon::parse($citaTerminada->date_time);
                        @endphp
                        <div class="purify_hsCP+NQTCqJkf+lbwAN4FA== purify_Sardy6hfiet162IZ2pYFPA== purify_m9mNOPjpHD0tNTW6GC+hEw== purify_9hcoDI6SWlEpcfAmG1bmSw==">
                            <div class="">
                                {{-- {{ $fecha->translatedFormat('M') }}  --}}
                                {{ $fecha->translatedFormat('M Y') }}
                            </div>
                            <div class="purify_FuEGVRcYA+olaP+n5-JrWA== purify_Sardy6hfiet162IZ2pYFPA== purify_r7cfvxYj81mnUA2sO2edaA==">
                                {{ $fecha->format('d') }} {{-- Día del mes --}}
                            </div>
                            <div></div>
                            <div class="">
                                {{ $fecha->format('H:i') }} {{-- Hora en formato 24 horas --}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

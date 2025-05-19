{{-- <div> --}}
    {{-- <div class="col col-6" style="padding-bottom: calc(1.5rem* 1);"> --}}
    <div class="col col-6" style="padding-bottom:0.5rem;padding-right:0.5rem">
        <div class="index_dropdown_yxIjB index_has--shadow_s6YH1 index_is--overlay_JG_3k b-select-duration_select_f9p18">
            <div class="index_toggle_sBt35">
                <div data-testid="select-dropdown-">
                    <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_size--md_sPOha styles_theme--default_x92vh styles_slotTheme--blank_iI8Uf styles_slotTheme--default_vYr1T" data-testid="select-input-">
                        <div onclick="abrirModalCategorias('.contenedorHorasInicio')" class="styles_outerWrapper_NumuG" style="min-width: 0px;">
                            <div class="styles_labelWrapper_isbmo">
                                <label class="styles_label_hleTI">inicio </label>
                            </div>
                            <div class="styles_wrapper_hb1CA justify-content-between">
                                <div data-hourReserv="{{ $dataHourReserv }}" class="slotHorasCobrarServicio styles_slotLeft_k29NgHorasInicio inputsNewService">
                                    {{-- 19:30 --}}
                                </div>
                                <div class="styles_slotRight_TkOzM">
                                    <i class="index_toggleIcon_EqQez"></i>
                                </div>
                            </div>
                            <input  name="horaInicio" value="0h" placeholder="" id="horaNewServiceInputInicio" type="hidden" autocomplete="off" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none;">
                        </div>
                    </div>
                </div>
            </div>
            {{-- desplegable hora inicio --}}
            <div class="contenedorHorasInicio index_content_Z_JCn index_position_FV9jY index_position--bottom-left_prIxb" style="display:none">
                <div class="scrollable index_scrollable_qm3Zl index_scrollable_BtJqS" style="max-height: 150px;">
                    <ul class="list" style="padding-left: 0px!important">
                        @foreach ($tiempoServicio as $hora)
                        <li>
                            @if ($hora == $dataHourReserv)
                            <div data-time="{{ $hora }}" class="index_defaultItem_pKlHs index_defaultItemLast_G_jYj index_--selected_oUDGp index_--highlighted__3J43">
                                <div class="index_defaultItemInner_HCCY6">
                                    {{ $hora }}
                                </div>
                            </div>
                            @else
                             <div data-time="{{ $hora }}" class="index_defaultItem_pKlHs index_defaultItemLast_G_jYj">
                                <div class="index_defaultItemInner_HCCY6">
                                    {{ $hora }}
                                </div>
                            </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}

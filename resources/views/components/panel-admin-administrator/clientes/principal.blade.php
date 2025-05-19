<div class="index_customers_H5TNm">
    <div class="list_customersBase_UGu3X">
        {{-- columna izquierda --}}
        <div class="list_customersListing_DPLnr" style="">
            <div class="list_header_RgsIk">
                <div class="list_headerWrapper_gOeMw">
                    <div data-testid="list-header" class="list_headerTitle_fVzv5 list_size--28-b_LXc47"> Clientes </div>
                    <div class="index_dropdown_yxIjB index_has--shadow_s6YH1 index_is--overlay_JG_3k">
                        <div class="index_toggle_sBt35">
                            <button id="uid-119-input" class="index_button_TfmOz index_size--sm_z95WM index_theme--default_AtMGF index_slotTheme--default_pktIt list_moreBtn_RvXet" data-testid="list-more-btn">
                                <div class="index_caption_W6r_J"> Más </div>
                            </button>
                        </div>
                    </div>
                </div>
                {{-- pestañas superiores --}}
                <div class="list_tabsWrapper_izoGc" style="margin-bottom: 15px">
                    <div class="scrollable-x b-tabs_container_mpBHN">
                        <div class="b-tabs_content_lxbV0">
                            <ul style="margin: 0px" class="b-tabs_tabs_nYRc_ b-tabs_tabsBordered_yoE3l b-tabs_size--14_SADcU">
                                <li tabindex="-1" data-testid="list" class="b-tabs_tab_Gc2Ei b-tabs_tabBordered_CjuJV b-tabs_tabBorderedActive_ff9lg">
                                    <div> lista ({{ $totalClientes }}) </div>
                                </li>
                                <li tabindex="0" data-testid="groups" class="b-tabs_tab_Gc2Ei b-tabs_tabBordered_CjuJV">
                                    <div> grupos (12) </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="customers_customers_s2MPL">
                <div class="customers_search_qPU6u" style="margin: 0px;box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                    <div style="padding: 0 10px;" class="styles_container_pjyTj styles_size--sm_dOZPQ styles_theme--filled_LnEz6 styles_theme--default_x92vh b-input-search_field_enuVF customers_searchInput_x0x6f">
                        <?php
                            $id_inputSearchClient = 'inputSearchClient';
                            // $onkeyup="buscar('#inputSearchClient')" ;
                        ?>
                        <x-buscador.buscador :id_inputSearchClient="$id_inputSearchClient"/>
                    </div>
                </div>
                <div class="customers_searchResultsWrapper_H0kWh">
                    <div class="customers_searchResults_Gy02W">
                        <div class="b-inifinite-scroll b-infinite-scroll_scrollable_X8X5F customers_searchResultsVirtual_BdNqf scrollable">
                            {{-- lista de clientes --}}
                            <div class="b-infinite-scroll_content_uwl9t" id="suggestions-wrapper">
                                @foreach ($clientes as $index => $cliente)
                                <div>
                                    <div data-clie="{{ $cliente->id }}" data-index="{{ $index }}" class="item_client0202 pointer @if ($loop->first) customer-el-list_active_ffoQG @endif" onclick="funcionClicTrajeta(this)">
                                        <div class="customer-el-list_searchItem_mnR8f">
                                            <div title="{{ $cliente->nombre }}" class="b-avatar_avatar_pJzSu" style="width: 40px; height: 40px; flex: 0 0 40px;">
                                                <!-- Mostrar las iniciales -->
                                                <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px;">
                                                    {{ $iniciales[$index] }}
                                                </div>
                                            </div>
                                            <div class="customer-el-list_searchItemName_LLoTq customer-el-list_size--16_uLvgO">
                                                <div class="txt--ellipsis">{{ $cliente->name }} {{ $cliente->primer_apellido }}</div>
                                            </div>
                                            <div class="d-flex">
                                                <!-- Aquí puedes agregar más información si lo necesitas -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- boton añadir cliente --}}
            <button type="button" class="b-button_button_QiVJW b-button_theme--icon_mi9ao no-customers_createCustomer_PBCPa">
                <span class="b-icon iconFont icon-plus" type="font" style="font-size: 20px;"></span>
            </button>
        </div>
        {{-- columna derecha --}}
        <div class="index_customerWrapper_r1idQ list_customerCard_Eu4Kj list_customerCardMobileView_CfTzS cutomers-list-with-banner">
            <div class="index_customer_uAmR4">
                <div class="index_header_bHbtD">
                    <span class="cerrarVistaInfoCliente b-icon iconFont icon-nav-arrow-left index_backButton_jBaQ8 index_backButtonMobile_UVtSE" style="font-size: 26px;"></span>
                    <button type="button" class="b-button_button_QiVJW b-button_theme--iconSecondary_yYxhu index_editButton_V8pmh" data-testid="edit-customer">
                        <span class="b-icon iconFont icon-edit" style="font-size: 32px;"></span>
                    </button>
                    <button type="button" class="b-button_button_QiVJW b-button_theme--icon_mi9ao index_calendarButton_UxQOm" data-testid="create-appointment">
                        <span class="b-icon iconFont icon-add-appointment index_calendarButtonIcon_UlI5c" style="font-size: 26px;"></span>
                    </button>
                    <div title="{{ $firstClient->name }}" class="inicilalesCliente0050 b-avatar_avatar_pJzSu" style="width: 80px; height: 80px; flex: 0 0 80px;">
                        <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 32px;">{{$iniciales[0]}}</div>
                    </div>
                    <div class="index_fullName_i2BLH index_size--28-b_VYXiI index_fullNameNoMargin_HvhMo"> {{ $firstClient->name }} </div>
                    <div class="index_headerPhone_Qcakf index_size--14_jjp7o">
                        <span class="flex inline items-center">
                            <span>{{ $firstClient->telefono }} </span>
                        </span>
                    </div>
                </div>
                <div>
                    <div class="index_tagWrapper__h1_p"></div>
                    {{-- botones de contacto cliente --}}
                    <div class="index_contactInfo_oazmE">
                        <div class="flex margin-bottom-32 items-start">
                            <button class="contact-button_button_CZz5m col contact-button_secondary_dkvLw">
                                <span class="contact-button_circle_l0Wdn">
                                    <span class="b-icon iconFont icon-invite-client" style="font-size: 28px;"></span>
                                </span>
                                <div class="contact-button_label_Sb6C8"> Invitar </div>
                            </button>
                            <a style="text-decoration: none;" class="contact-button_button_CZz5m col" tabindex="-1" href="mailto:julia@gmail.com">
                                <span class="contact-button_circle_l0Wdn">
                                    <span class="b-icon iconFont icon-mail" style="font-size: 20px;"></span>
                                </span>
                                <div class="contact-button_label_Sb6C8"> Email </div>
                            </a>
                            <a style="text-decoration: none;" class="contact-button_button_CZz5m col" tabindex="-1" href="tel:652-41-15-69">
                                <span class="contact-button_circle_l0Wdn">
                                    <span class="b-icon iconFont icon-telephone" style="font-size: 18px;"></span>
                                </span>
                                <div class="contact-button_label_Sb6C8"> Llamar </div>
                            </a>
                        </div>
                    </div>
                    {{-- info sobre transaccions cliente --}}
                    <div class="index_visitsInfo_Uuncf">
                        <div class="index_visitsInfoItem_zUjfI">
                            <div class="index_title_AGBmy index_size--10_EjPcG">Citas</div>
                            <div class="index_value_kD_oD index_size--14-sb_kg1ff">{{ $totalReservas }}</div>
                        </div>
                        <div class="index_visitsInfoItem_zUjfI">
                            <div class="index_title_AGBmy index_size--10_EjPcG">Inasistencias</div>
                            <div class="index_value_kD_oD index_size--14-sb_kg1ff">{{ $totalInasistencias }}</div>
                        </div>
                        <div class="index_visitsInfoItem_zUjfI">
                            <div class="index_title_AGBmy index_size--10_EjPcG">Cancelaciones</div>
                            <div class="index_value_kD_oD index_size--14-sb_kg1ff">{{ $totalCancelaciones }}</div>
                        </div>
                        <div class="index_visitsInfoItem_zUjfI">
                            <div class="index_title_AGBmy index_size--10_EjPcG">Última visita</div>
                            <div class="index_value_kD_oD index_size--14-sb_kg1ff">
                                    {{ $fechaUltimaReserva }}
                            </div>
                        </div>
                        <div class="index_visitsInfoItem_zUjfI">
                            <div class="index_title_AGBmy index_size--10_EjPcG">Ingresos totales</div>
                            <div class="index_value_kD_oD index_size--14-sb_kg1ff">{{ $totalGastado }} €</div>
                            {{-- <div class="index_value_kD_oD index_size--14-sb_kg1ff">0,00 €</div> --}}
                        </div>
                        <div class="index_visitsInfoItem_zUjfI">
                            <div class="index_title_AGBmy index_size--10_EjPcG">Descuento</div>
                            <div class="index_value_kD_oD index_size--14-sb_kg1ff">{{ $porcentaje}}</div>
                        </div>
                        <div class="index_visitsInfoItem_zUjfI">
                            <div class="index_title_AGBmy index_size--10_EjPcG">Cliente de confianza</div>
                            <div class="index_value_kD_oD index_size--14-sb_kg1ff index_valueTrusted_sPXxO">{{ $firstClient->cliente_confianza }}</div>
                        </div>
                    </div>
                </div>
                <div class="index_detailsTable_siKqu">
                    <div class="index_tabsWrapper_nuG9P">
                        <div class="scrollable-x b-tabs_container_mpBHN b-tabs_containerDefault_qtxhU">
                            <span class="b-icon iconFont icon-arrow-left b-tabs_button_dVPR_ b-tabs_buttonInactive_ty0ER" style="font-size: 24px;" onclick="scrollCarousel(-300)"></span>
                            <div class="b-tabs_content_lxbV0 b-tabs_content_lxbV0OpcionesInfoCliente" style="overflow-x:hidden;scroll-behavior: smooth;">
                                <ul class="b-tabs_tabs_nYRc_" style="padding: 0px">
                                    <li tabindex="-1" data-testid="appointments-tab" class="b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0 b-tabs_tabDefaultActive_CYkQd"> Citas </li>
                                    <li tabindex="0" data-testid="media-tab" class="b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0"> Fotos </li>
                                    <li tabindex="0" data-testid="details-tab" class="b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0"> Sobre el cliente </li>
                                    <li tabindex="0" data-testid="products-tab" class="b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0"> Productos </li>
                                    <li tabindex="0" data-testid="payments-tab" class="b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0"> Pagos </li>
                                    <li tabindex="0" data-testid="vouchers-tab-memberships" class="b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0"> Suscripciones </li>
                                    <li tabindex="0" data-testid="vouchers-tab-packages" class="b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0"> Bonos de sesiones </li>
                                    <li tabindex="0" data-testid="vouchers-tab-giftcards" class="b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0"> Tarjetas regalo </li>
                                    <li tabindex="0" data-testid="documents-tab" class="b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0"> Documentos </li>
                                </ul>
                            </div>
                            <span class="b-icon iconFont icon-arrow-right b-tabs_button_dVPR_" style="font-size: 24px;" onclick="scrollCarousel(300)"></span>
                        </div>
                    </div>
                    <div class="index_customerTabsWrapper_VhGe0">
                        <div>
                            <div class="scrollable-x b-tabs_container_mpBHN index_tabs_ua3un">
                                <div class="b-tabs_content_lxbV0">
                                    <ul class="b-tabs_tabs_nYRc_ b-tabs_tabsBordered_yoE3l b-tabs_size--14_SADcU">
                                        <li tabindex="0" data-testid="active" class="li_proxima_cliente li_proxima_pasada b-tabs_tab_Gc2Ei b-tabs_tabBordered_CjuJV b-tabs_tabBorderedActive_ff9lg_proximaPasada" data-total="{{ $totalProximas }}"> Próximas ({{ $totalProximas }}) </li>
                                        <li tabindex="-1" data-testid="inactive" class="li_pasada_cliente li_proxima_pasada b-tabs_tab_Gc2Ei b-tabs_tabBordered_CjuJV" data-total="{{ $totalProximas }}"> Pasadas ({{ $totalFinalizadas }}) </li>
                                    </ul>
                                </div>
                            </div>

                            {{-- citas pasadas --}}
                            <div id="citasPasadas_001_cliente" class="citasPasadas_001_cliente" style="display:none;">
                                {{-- citas vacio no hay citas --}}
                                <div>
                                    <div class="b-emptyPassadas b-empty-placeholder_container_jSbur d-none" style="">
                                        <div class="b-image_image_QfpQF b-empty-placeholder_image_qDGRU" style="background-image: url(&quot;https://d10n9ka7jp2kfo.cloudfront.net/pro/98277a10/img/empty-appointments.c27c9262.svg&quot;); background-size: contain; width: 128px; height: 52px; padding-top: 0px;"></div>
                                        <p class="b-empty-placeholder_title_BNhv7 b-empty-placeholder_size--16_rr609"> No hay citas finalizadas </p>
                                    </div>
                                </div>
                                <div class="listaUl_ClienteTerminadas003">
                                    <ul class="listaCitasClienteTerminadas003" style="padding: 0px">
                                        @foreach ($terminadasFclient as $index => $citaT)
                                        @php
                                            $fechaClientet = \Carbon\Carbon::parse($citaT->date_time);
                                        @endphp
                                        <li>
                                            <div class="list_appointment_aww7c">
                                                <div class="appointment_appointment_LmBLD">
                                                    <div class="appointment-date_date_UsCxi">
                                                        <div class="appointment-date_month_nFAjw appointment-date_size--12_Z4is5">{{ $fechaClientet->translatedFormat('M') }}</div>
                                                        <div class="appointment-date_day_zpfF4 appointment-date_size--20_BC_a_"> {{ $fechaClientet->format('d') }}</div>
                                                        <div class="appointment-date_hour_isz2C appointment-date_size--12_Z4is5"> {{ $fechaClientet->format('H:i') }}</div>
                                                    </div>
                                                    <div class="appointment_info_QK4CC">
                                                        <div class="margin-bottom-4 style_status_xxjlV style_statusDefault_HPmTE style_status--xs_vvmA5 style_statusUpperCase_bkX7Z
                                                            @if ($citaT->status === 'confirmed' || $citaT->status === 'Finalizada') style_statusGreen_lW62O
                                                            @elseif ($citaT->status === 'cancelled') style_statusGray_K1guG
                                                            @elseif ($citaT->status === 'no_asistida') style_statusRed_gfbPD
                                                            @elseif ($citaT->status === 'pending') style_statusWarning_lW62O
                                                            @endif"> {{ $citaT->status }}
                                                        </div>
                                                        <div class="citaPagadaCliente flex inline">
                                                            @if ($citaT->status_payment === 'Pagado')
                                                            <div data-testid="receipt-status-badge-label" class="flex inline margin-bottom-4 receipt-status-badge_status_vwj1d receipt-status-badge_statusGreen_Aw6NK receipt-status-badge_size--xs_EtgLy receipt-status-badge_size--9-sb_zgSEq"> Pagado </div>
                                                        @else
                                                        @endif
                                                        </div>

                                                        <div class="appointment-service_service_KFga9">
                                                            <div class="appointment-service_serviceBar_d_tAg" style="border-left-width: 0px; border-color: {{ $citaT->servicio->borderColor }};"></div>
                                                            <div class="appointment-service_serviceHeader_qO6qz appointment-service_size--14__gGWE margin-left-12"> {{ $citaT->servicio->nombre }}   </div>
                                                            <div class="appointment-service_serviceSubHeader_OGHVA appointment-service_size--12_Hog21 margin-left-12">
                                                                <span class="duration">
                                                                    @if ($citaT->servicio->horaNewService > 0)
                                                                        {{ $citaT->servicio->horaNewService }}h {{ $citaT->servicio->minutosNewService }}min
                                                                    @else
                                                                        {{ $citaT->servicio->minutosNewService }}min
                                                                    @endif
                                                                </span>  • {{ $citaT->empleada->nombre }} {{ $citaT->empleada->primerApellido }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="appointment_additionals_Eg8kg appointment_additionalsLonger_J5WmT">
                                                        <div class="appointment_redo_m4i8Z">
                                                            <button type="button" class="b-button_button_QiVJW b-button_theme--iconSecondary_yYxhu appointment_redoButton_PBpSa" data-testid="appointment-redo-btn"> rehacer </button>
                                                        </div>
                                                    </div>
                                                    <div class="appointment_total_tXjTE appointment_size--16-sb_hG9l7"> {{ number_format($citaT->total_payment, 2, ',', '') }} € </div>
                                                </div>
                                                <hr class="list_hr_Am6We">
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="list_moreWrapper_BIBER"></div>
                                </div>
                            </div>
                            {{-- citas proximas --}}
                            <div id="citasProximas_001_cliente" class="citasProximas_001_cliente"  style="">
                                {{-- citas vacio no hay citas --}}
                                <div>
                                    <div class="b-emptyProximas b-empty-placeholder_container_jSbur d-none" style="">
                                        <div class="b-image_image_QfpQF b-empty-placeholder_image_qDGRU" style="background-image: url(&quot;https://d10n9ka7jp2kfo.cloudfront.net/pro/98277a10/img/empty-appointments.c27c9262.svg&quot;); background-size: contain; width: 128px; height: 52px; padding-top: 0px;"></div>
                                        <p class="b-empty-placeholder_title_BNhv7 b-empty-placeholder_size--16_rr609"> No hay próximas citas </p>
                                    </div>
                                </div>
                                <div class="listaUl_ClienteProximas003">
                                    <ul style="padding: 0px" class="listaCitasClienteProximas003">
                                        @foreach ($proximasFclient as $index => $citaP)
                                            @php
                                                $fechaCliente = \Carbon\Carbon::parse($citaP->date_time);
                                            @endphp
                                            <li>
                                                <div class="list_appointment_aww7c">
                                                    <div class="appointment_appointment_LmBLD">
                                                        <div class="appointment-date_date_UsCxi">
                                                            <div class="appointment-date_month_nFAjw appointment-date_size--12_Z4is5">{{ $fechaCliente->translatedFormat('M') }}</div>
                                                            <div class="appointment-date_day_zpfF4 appointment-date_size--20_BC_a_"> {{ $fechaCliente->format('d') }}</div>
                                                            <div class="appointment-date_hour_isz2C appointment-date_size--12_Z4is5"> {{ $fechaCliente->format('H:i') }}</div>
                                                        </div>
                                                        <div class="appointment_info_QK4CC">
                                                            <div class="margin-bottom-4 style_status_xxjlV style_statusDefault_HPmTE style_status--xs_vvmA5 style_statusUpperCase_bkX7Z
                                                                @if ($citaP->status === 'confirmed' || $citaP->status === 'Finalizada') style_statusGreen_lW62O
                                                                @elseif ($citaP->status === 'cancelled') style_statusGray_K1guG
                                                                @elseif ($citaP->status === 'no_asistida') style_statusRed_gfbPD
                                                                @elseif ($citaP->status === 'pending') style_statusWarning_lW62O
                                                                @endif"> {{ $citaP->status }}
                                                            </div>
                                                            @if ($citaP->status_payment === 'Pagado')
                                                            <div data-testid="receipt-status-badge-label" class="flex inline margin-bottom-4 receipt-status-badge_status_vwj1d receipt-status-badge_statusGreen_Aw6NK receipt-status-badge_size--xs_EtgLy receipt-status-badge_size--9-sb_zgSEq"> Pagado </div>
                                                            @else
                                                            @endif
                                                            <div class="appointment-service_service_KFga9">
                                                                <div class="appointment-service_serviceBar_d_tAg" style=" border-color: {{ $citaP->servicio->borderColor }};"></div>
                                                                <div class="appointment-service_serviceHeader_qO6qz appointment-service_size--14__gGWE margin-left-12"> {{ $citaP->servicio->nombre }}   </div>
                                                                <div class="appointment-service_serviceSubHeader_OGHVA appointment-service_size--12_Hog21 margin-left-12">
                                                                    <span class="duration">
                                                                        @if ($citaP->servicio->horaNewService > 0)
                                                                            {{ $citaP->servicio->horaNewService }}h {{ $citaP->servicio->minutosNewService }}min
                                                                        @else
                                                                            {{ $citaP->servicio->minutosNewService }}min
                                                                        @endif
                                                                        {{-- 1h 30min --}}
                                                                    </span>  •  {{ $citaP->empleada->nombre }} {{ $citaP->empleada->primerApellido }} {{-- kenia Perez --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="appointment_additionals_Eg8kg appointment_additionalsLonger_J5WmT">
                                                            <div class="appointment_redo_m4i8Z">
                                                                <button type="button" class="b-button_button_QiVJW b-button_theme--iconSecondary_yYxhu appointment_redoButton_PBpSa" data-testid="appointment-redo-btn"> rehacer </button>
                                                            </div>
                                                        </div>
                                                        <div class="appointment_total_tXjTE appointment_size--16-sb_hG9l7">{{ number_format($citaP->servicio->precio, 2, ',', '') }} €  </div> {{-- 30,00&nbsp;€ --}}
                                                    </div>
                                                    <hr class="list_hr_Am6We">
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- AÑADIR CLIENTE --}}
            <x-panel-admin-administrator.clientes.add-cliente/>
            {{-- NO HAY CLIENTES --}}
            <x-panel-admin-administrator.clientes.vacio/>
        </div>
    </div>
</div>

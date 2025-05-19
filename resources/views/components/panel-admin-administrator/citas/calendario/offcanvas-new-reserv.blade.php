<div class="contenedorOfcanvasNewReservCalendar">
    <div style="border-radius: 12px 0px 0px;" class="offcanvas offcanvas-end" id="newReservCalendar" tabindex="-1" aria-labelledby="newReservCalendarLabel" data-bs-scroll="true" data-bs-backdrop="false">
        <div class="allServicesAddCalendar00" style="display: none; height: 100%;">
            <x-panel-admin-administrator.citas.calendario.all-services-add-calendar/>
        </div>
        <div class="allServicesAddCalendar00Add" style="display: none; height: 100%;">
            <x-panel-admin-administrator.citas.calendario.add-service-calendar/>
        </div>
        <div class="newReservCalendar00">
            <div style="border-radius: 12px 0px 0px;padding-bottom:0px" class=" headerInfoService offcanvas-header align-items-center d-flex position-relative header_header_T53u2">
                <div class="closedOffcanvasNewReservCalendar header_sideCol_ZsrXs header_icon_DWZ6K">
                    <span onclick="clicCruzNewReserCalendar();" class="b-icon iconFont icon-x" style="font-size: 36px;"></span>
                </div>
                <div class="header_centerCol_LHGCB"><p style="margin-bottom: 0px;" class="heading--1"> Nueva cita </p></div>
            </div>
            {{-- cita --}}
            <div class="offcanvas-body temabordeScroll" style="padding-bottom:0px!important; padding-left: 0rem;padding-right: 0rem;">
                <div class="appointment-form_content_k5Rar" style="height: 100%;height: calc(100vh - 16rem);">
                    <div id="scrollable-drawer" class="scrollable appointment-form_drawerBody_LtiKT2" style="overflow: auto;">
                        <div class="margin-bottom-12" style="padding: 0rem 0.5rem">
                            <div data-testid="basket-customer-card" class="basket-customer-card0101Calendar">
                                <div class="b-shadow-card customer-card_emptyCustomer_XKrcQ card_empty_calendar customer-card_isWalkIn__KcSW pointer" onclick="clicTarjetasBlancasSelectCliente(this)">
                                    <div data-v-3d594be1="" class="">
                                        <div data-v-3d594be1="" title="" class="b-avatar_avatar_pJzSu" style="width: 48px; height: 48px; flex: 0 0 48px;"></div>
                                    </div>
                                    <div data-v-3d594be1="" class="customer-card_customerContent_Pq14e color-07 size--16">
                                        <span data-v-3d594be1="">Selecciona un cliente o déjalo en blanco</span>
                                    </div>
                                    <div data-v-3d594be1="" class="customer-card_customerClose_kMCQ7">
                                        <span data-v-3d594be1="" class="b-icon iconFont icon-plus" style="font-size: 20px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="scrollable-x b-tabs_container_mpBHN b-tabs_containerDefault_qtxhU appointment-form_tabs_l2JbD">
                            <div class="b-tabs_content_lxbV0" style="display: flex">
                                <div class="cita_tabNewReserv b-tabs_tabDefaultActive_CYkQd h-100 justify-center b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0">
                                    cita
                                </div>
                                <div class="nota_tabNewReserv h-100 justify-center b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0">
                                    Notas
                                    <span class="indicatorNotasNewReserv"></span>
                                </div>
                            </div>
                        </div>
                        <div id="datos_reservaNewReserv0106" class="datos_reservaNewReserv0106 appointment-form_tabWrapper_hG2Xn2" style="height: 100%;">
                            <div>
                                <div class="d-flex align-items-center mb-3 justify-between appointment-tab_dateRow_EN0Vg">
                                    <div class="col col-auto">
                                        <div class="index_dropdown_yxIjB i ndex_has--shadow_s6YH1 index_is--overlay_JG_3k">
                                            <div class="index_toggle_sBt35 fechaCitaInfo22" id="datePikerfechaCitaInfo22">
                                                <div class="date_input_yAhI0">
                                                    <p class="mb-0 size--20-sb fechaCitaInfoNewReservCalendar">
                                                        {{-- mié., 4 dic. --}}
                                                    </p>
                                                    <span class="b-icon iconFont icon-arrow-down date_icon_bIzRy" style="font-size: 24px;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="row" style="justify-content: space-between;padding-bottom:1rem">
                                        <div class="tarjetasIncialesMostrarOcultarCalendar">
                                            <div class="col col-12">
                                                <div class="services-wrapper_service_EEfjR addServiceCalendar" data-testid="subbooking-select-service">
                                                    <div class="services-wrapper_serviceEmpty_pbusk"> Seleccionar servicio </div>
                                                    <span class="b-icon iconFont icon-arrow-right services-wrapper_serviceArrow_h8V47"></span>
                                                </div>
                                            </div>
                                            <x-panel-admin-administrator.desplegables.desplega-hora-fin-add-service
                                            :contenedorHorasInicio="'contenedorHorasInicioCalendar'"
                                            :classDataHour="'slotHorasCobrarServicioCalendar styles_slotLeft_k29NgHorasInicioCalendar'"
                                            :idImputInicio="'horaNewServiceInputInicioCalendar'"
                                            :contenedorHorasFin="'contenedorHorasFinCalendar'"
                                            :classDataHourFin="'slotHoraFinCorbrarServicioCalendar styles_slotLeft_k29NgHorasFinCalendar'"
                                            :idInputFin="'horaNewServiceInputFinCalendar'"
                                            />
                                            @php
                                            $data = [
                                                    'contenedor' => 'contenedorEmpleadosInicioCalendar',
                                                    'botonClic' =>'styles_outerWrapper_AddEmpleInicioCalendar',
                                                    'input' => 'uid-inicio-inputCalendar',
                                                    'slotLeft_k29' => 'styles_slotLeft_k29NgEmpleadoAddInicioCalendar',
                                                    'id_desplegableEmpleado' => 'selectEmpleModalAddInicioCalendar',
                                                    'visualizadorNombreEmple' =>'slotEmpleadoAddInicioCalendar'
                                                ];
                                            @endphp
                                             <div style="position: relative;top: -25px;" class="index_container_jtGZY index_theme--warning_VkST8 paddingMensajeAlert alert023" style="">
                                                {{-- <p style="margin:0px" class="index_message_IeJl5" data-testid="error-input-message">La hora de fin debe ser mayor que hora inicio</p> --}}
                                            </div>
                                            <x-panel-admin-administrator.citas.modal-select-emple :data="$data" />
                                            <div class="resources_requested_lDeAo resources_size--14-sb_vfOvM margin-top-12NewReserv" data-testid="staffer-requested-by-client">
                                                <button onclick="changeheart('.solicitadoCliente')" id="uid-1236-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--icon_yiHCJ margin-right-8" data-testid="staffer-requested-by-client-button">
                                                    <div class="index_slotRight_Uzff_">
                                                        <img class="solicitadoCliente b-icon_img_I0kuC" src="{{ asset('storage/calendar/heart-empty.svg') }}" alt="corazon vacio">
                                                    </div>
                                                </button>
                                                Solicitado por el cliente
                                                {{-- <div class="b-hint_hint_jwWHe margin-left-4" data-testid="staffer-requested-by-client-hint">
                                                    <div class="b-hint_hintContent_LTa9e">
                                                        <div data-testid="hint-icon" style="height: 24px;">
                                                            <span class="b-icon iconFont icon-help b-hint_hintIcon_Iyo8c" style="font-size: 24px;"></span>
                                                        </div>
                                                        <div class="b-tooltip_tooltip_BgIoW b-tooltip_size--14_KNYp4 b-tooltip_tooltip--top-center_r1xfy b-tooltip_theme--default_Fqypb" data-testid="hint" style="width: 300px;">
                                                            <div class="b-tooltip_tooltipHeader_XWJAr"></div>
                                                            <div class="b-pt-2">
                                                                Comprueba si el empleado ha sido asignado de acuerdo a las preferencias
                                                                del cliente para saber si puedes asignar la cita a otra persona.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="nuevasTarjetasMostrarOcultarCalendar" id="ordenableCalendar"></div>
                                        <div class="col col-6">
                                            <button onclick="clicBotonAniaridServicioCalendar();" id="uid-3978-input" disabled="disabled" class="margin-top-24 margin-bottom-24 index_button_TfmOz index_is--disabled_w97Nq index_size--md_G1gdK index_theme--default_AtMGF index_slotTheme--icon_yiHCJ" data-testid="appointment-tab-add-another-service">
                                                <div class="index_caption_W6r_J"> Añadir otro servicio </div>
                                                <div class="index_slotRight_Uzff_">
                                                    <span class="b-icon iconFont icon-plus appointment-tab_buttonIcon_Kc6Uu" style="font-size: 16px;"></span>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="notas_reservaNewReserv0106" class="notas_reservaNewReserv0106 notes-and-info-tab_container_QaKJE appointment-form_tabWrapper_hG2Xn" style="display:none;">
                            <div class="row items-start">
                                <div class="col col-grow">
                                    <div class="b-input_input_DWB9v b-input">
                                        <div class="b-input_inputFieldWrapper_Dm82F b-input_size--16_kWC04 b-input_textarea_CHo1T">
                                            <textarea name="business_secret_noteNewReserv" id="business_secret_noteNewReserv" rows="1" class="scrollable b-input_inputField_NsXbZ b-input_size--16-sb_jW2fX b-input_inputFieldWithLabel_IL5CK b-input_inputFieldWithClear_OxM_v" data-testid="business_secret_noteNewReserv" style="overflow: hidden; overflow-wrap: break-word; height: 48px;"></textarea>
                                            <label for="business_secret_noteNewReserv" class="business_secret_noteNewReserv input-label b-input_inputLabel_koPPi">Nota interna (visible solo empleados)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-auto notes-and-info-tab_highlight_BIrUy">
                                    <button class="butonNewReserv b-button_button_QiVJW b-button_theme--iconSecondary_yYxhu notes-and-info-tab_highlightButton_jwovs" type="button">
                                        <img class="b-icon_img_I0kuC" src="https://d10n9ka7jp2kfo.cloudfront.net/pro/3abca9a6/img/highlight.b2df1336.svg" style="height: 30px;">
                                    </button>
                                    <span class="notes-and-info-tab_starBadge_YNLkr">Favoritos</span>
                                </div>
                            </div>
                            <div class="b-input_input_DWB9v b-input padding-bottom-16">
                                <div class="b-input_inputFieldWrapper_Dm82F b-input_size--16_kWC04 b-input_textarea_CHo1T">
                                    <textarea name="business_noteNewReserv" id="business_noteNewReservInfo" rows="1" class="scrollable b-input_inputField_NsXbZ b-input_size--16-sb_jW2fX b-input_inputFieldWithLabel_IL5CK b-input_inputFieldWithClear_OxM_v" data-testid="business_noteNewReserv" value="" style="overflow: hidden; overflow-wrap: break-word; height: 48px;"></textarea>
                                    <label for="business_noteNewReserv" class="business_noteNewReservInfo input-label b-input_inputLabel_koPPi">Mensaje para el cliente</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-footer">
                    <div class="appointment-form_totalFooter_edqmd">
                        <div class="b-row">
                            <div class="b-col b-border-r b-text-left" style="margin-top: 0.5rem">
                                <p style="margin: 0px" class="b-paragraph-m b-text-secondary">Total </p>
                                <p class="b-heading-xl" style="font-weight: 700" data-testid="appointment-price2"> 0,00 €</p>
                            </div>
                            <div style="margin-top: 0.5rem" class="b-col b-text-right" data-testid="appointment-to-be-paid2">
                                <p style="margin: 0px" class="b-paragraph-m b-text-secondary"> A pagar </p>
                                <p class="totalPagarNewReservCalendar b-heading-xl" style="font-weight: 700"> 0,00 €</p>
                            </div>
                        </div>
                    </div>
                    <footer class="appointment-form_drawerFooter_DGcVH">
                        <div>
                            <button id="uid-797-input" class="height-100 index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--default_pktIt" data-testid="appointment-button-discard" style="width: 100%;" onclick="clicCruzNewReserCalendar();">
                                <div class="index_caption_W6r_J"> Descartar </div>
                            </button>
                        </div>
                        <div>
                            <button id="uid-798-input" class="height-100 index_button_TfmOz index_is--disabled_w97Nq index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt" data-testid="appointment-button-save" style="width: 100%;">
                                <div class="index_caption_W6r_J"> Guardar </div>
                            </button>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>

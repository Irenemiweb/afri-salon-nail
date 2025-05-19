<div>
    <div class="colum drawer_body_mcPYG">
        <div class="index_content_kfRgi">
            <header class="margin-bottom-16 b-custom-header_header_oZL1I">
                <div class="b-custom-header_left b-custom-header_hasIcon_uCjMI b-custom-header_hasIconEllipsis_gYB6P b-custom-header_left_bWmRf">
                    <span onclick="resetPantalla2NewReservCalendar();" class="exitShowAllServicesChangeCalendar b-icon iconFont icon-nav-arrow-left b-custom-header_icon_XtAgm" data-testid="b-custom-header-icon-back" style="font-size: 20px;"></span>
                    <div class="">
                        <div class="b-custom-header_headerTitle_ogW55 txt--ellipsis">
                            <span class="b-custom-header_title_GTxIs b-custom-header_wordBreakAll_U_pxk totalServiciosAñadidosCalendar">
                                {{-- Servicio #2 --}}
                            </span>
                        </div>
                    </div>
                </div>
            </header>
            <div class="b-custom-header_right_uT_uU">
            </div>
            <div class="index_subbookingContainer_z5AFp">
                <div class="row">
                    <div class="col col-12">
                        <div class="services-wrapper_service_EEfjR selectServiceAddCalendar">
                            <div class="services-wrapper_serviceEmpty_pbusk">
                                Seleccionar servicio
                                <span class="b-icon iconFont icon-arrow-right services-wrapper_serviceArrow_h8V47"></span>
                            </div>
                        </div>
                    </div>
                    <x-panel-admin-administrator.desplegables.desplega-hora-fin-add-service
                    :contenedorHorasInicio="'contenedorHorasInicioAddCalendar'"
                    :classDataHour="'slotHorasCobrarServicioAddCalendar styles_slotLeft_k29NgHorasInicioAddCalendar'"
                    :idImputInicio="'horaNewServiceInputInicioAddCalendar'"
                    :contenedorHorasFin="'contenedorHorasFinAddCalendar'"
                    :classDataHourFin="'slotHoraFinCorbrarServicioAddCalendar styles_slotLeft_k29NgHorasFinAddCalendar'"
                    :idInputFin="'horaNewServiceInputFinAddCalendar'"
                    />
                    @php
                        $data = [
                                'contenedor' => 'contenedorEmpleadosInicioCalendarAdd',
                                'botonClic' =>'styles_outerWrapper_AddEmpleInicioCalendarAdd',
                                'input' => 'uid-inicio-inputCalendarAdd',
                                'slotLeft_k29' => 'styles_slotLeft_k29NgEmpleadoAddInicioCalendarAdd',
                                'id_desplegableEmpleado' => 'selectEmpleModalAddInicioCalendarAdd',
                                'visualizadorNombreEmple' =>'slotEmpleadoAddInicioCalendarAdd'
                            ];
                    @endphp
                    <div style="position: relative;top: -25px;" class="index_container_jtGZY index_theme--warning_VkST8 paddingMensajeAlert alert024" style="">
                        {{-- <p style="margin:0px" class="index_message_IeJl5" data-testid="error-input-message">La hora de fin debe ser mayor que hora inicio</p> --}}
                    </div>
                    <x-panel-admin-administrator.citas.modal-select-emple :data="$data" />
                    <div class="resources_requested_lDeAo resources_size--14-sb_vfOvM margin-top-12NewReserv" data-testid="staffer-requested-by-client">
                        <button onclick="changeheart('.solicitadoClientePantalla2')" id="uid-1236-inputPantalla2" class="index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--icon_yiHCJ margin-right-8" data-testid="staffer-requested-by-client-button">
                            <div class="index_slotRight_Uzff_">
                                <img class="solicitadoClientePantalla2 b-icon_img_I0kuC"src="{{ asset('storage/calendar/heart-empty.svg') }}" alt="corazon vacio">
                            </div>
                        </button>
                        Solicitado por el cliente
                    </div>
                </div>
            </div>
        </div>
        <div class="buttonSavetrackModifyNewReserv index_buttonsRow_AA5EI justify-content-around" style="display: flex;">
            {{-- <div class="col col-auto"></div> --}}
            <div class="col col-5">
                <button onclick="" id="uid-376-input_newReservCalendar" class=" w-100 btn btn-light index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--default_pktIt">
                    <div class="index_caption_W6r_J"> Cancelar </div>
                </button>
            </div>
            <div class="col col-5">
                <button onclick="" id="uid-377-inputCalendar" class="index_is--disabled_w97Nq w-100 btn btn-dark index_button_TfmOz index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt" data-testid="multibooking-save">
                    <div class="index_caption_W6r_J"> Guardar </div>
                </button>
            </div>
        </div>
         {{-- botones guardar modificación despues pulsar botón edit --}}
         <div class="buttonEditStrackModifyNewReserv index_buttonsRow_AA5EI justify-content-around" style="display: none;">
            {{-- <div class="col col-auto"></div> --}}
            <div class="col col-4">
                <button id="uid-376-inputEditNewReserv" class=" w-100 btn btn-light index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--default_pktIt">
                    <div class="index_caption_W6r_J"> Cancelar </div>
                </button>
            </div>
            <div class="col col-4">
                <button id="uid-377-inputEditNewReserv" class=" w-100 btn btn-dark index_button_TfmOz index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt" data-testid="multibooking-save">
                    <div class="index_caption_W6r_J"> Guardar </div>
                </button>
            </div>
            <div class="col col-auto botonBasura">
                <button id="uid-738-inputEditNewReserv" class="btn index_button_TfmOz index_size--lg_I9GTR index_theme--alert_unNNB index_theme--default_AtMGF index_slotTheme--icon_yiHCJ">
                    <div class="index_slotLeft_p6NJx">
                        <span class="b-icon iconFont icon-trash" type="font" style="color:#eb0043;font-size: 32px;"></span>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>

<div>
<div style="border-radius: 12px 0px 0px;" class="offcanvas offcanvas-end" id="offcanvasAddServicesChange" tabindex="-1" aria-labelledby="offcanvasAddAllServicesChangeLabel" data-bs-backdrop="false">
    <div class="colum drawer_body_mcPYG">
        <div class="index_content_kfRgi">
            <header class="margin-bottom-16 b-custom-header_header_oZL1I">
                <div class="b-custom-header_left b-custom-header_hasIcon_uCjMI b-custom-header_hasIconEllipsis_gYB6P b-custom-header_left_bWmRf">
                    <span class="exitShowAllServicesChange b-icon iconFont icon-nav-arrow-left b-custom-header_icon_XtAgm" data-testid="b-custom-header-icon-back" style="font-size: 20px;"></span>
                    <div class="">
                        <div class="b-custom-header_headerTitle_ogW55 txt--ellipsis">
                            <span class="b-custom-header_title_GTxIs b-custom-header_wordBreakAll_U_pxk totalServiciosAñadidos">
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
                        <div class="services-wrapper_service_EEfjR selectServiceAdd">
                            <div class="services-wrapper_serviceEmpty_pbusk">
                                Seleccionar servicio
                                <span class="b-icon iconFont icon-arrow-right services-wrapper_serviceArrow_h8V47"></span>
                            </div>
                        </div>
                    </div>

                    <x-panel-admin-administrator.desplegables.desplega-hora-fin-add-service
                    :contenedorHorasInicio="'contenedorHorasInicioAdd'"
                    :classDataHour="'slotHorasCobrarServicioAdd styles_slotLeft_k29NgHorasInicioAdd'"
                    :idImputInicio="'horaNewServiceInputInicioAdd'"
                    :contenedorHorasFin="'contenedorHorasFinAdd'"
                    :classDataHourFin="'slotHoraFinCorbrarServicioAdd styles_slotLeft_k29NgHorasFinAdd'"
                    :idInputFin="'horaNewServiceInputFinAdd'"
                    />
                    @php
                        $data = [
                                'contenedor' => 'contenedorEmpleados',
                                'input' => 'uid-1345-input',
                                'slotLeft_k29' => 'styles_slotLeft_k29NgEmpleadoAdd',
                                'id_desplegableEmpleado' => 'selectEmpleModalAdd',
                                'botonClic' =>'styles_outerWrapper_AddEmple',
                                'visualizadorNombreEmple' =>'slotEmpleadoAdd'
                            ];
                    @endphp
                     <div style="position: relative;top: -25px;" class="index_container_jtGZY index_theme--warning_VkST8 paddingMensajeAlert alert021" style="">
                        {{-- <p class="index_message_IeJl5" data-testid="error-input-message"></p> --}}
                    </div>
                    <x-panel-admin-administrator.citas.modal-select-emple :data="$data" />
                    <div class="resources_requested_lDeAo resources_size--14-sb_vfOvM margin-top-12NewReserv" data-testid="staffer-requested-by-client">
                        <button onclick="changeheart('.solicitadoClientePantallaInfoClientePantallaDos')" id="uid-1236-inputPantallaInfoReserv" class="index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--icon_yiHCJ margin-right-8" data-testid="staffer-requested-by-client-button">
                            <div class="index_slotRight_Uzff_">
                                <img class="solicitadoClientePantallaInfoClientePantallaDos b-icon_img_I0kuC"src="{{ asset('storage/calendar/heart-empty.svg') }}" alt="corazon vacio">
                            </div>
                        </button>
                        Solicitado por el cliente
                    </div>
                    {{-- <x-panel-admin-administrator.citas.modal-select-emple/> --}}
                    {{-- <div class="col col-12">
                        <div>
                            <div class="index_container_jtGZY">
                                <div class="index_dropdown_yxIjB index_has--shadow_s6YH1 index_is--overlay_JG_3k">
                                    <div class="index_toggle_sBt35">
                                        <div class="select-dropdown-S_id">
                                            <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_size--md_sPOha styles_theme--default_x92vh styles_slotTheme--blank_iI8Uf styles_slotTheme--default_vYr1T">
                                                <div class="styles_outerWrapper_NumuG styles_outerWrapper_AddEmple" style="min-width: 0px;">
                                                    <div class="styles_labelWrapper_isbmo">
                                                        <label class="styles_label_hleTI"> Empleado </label>
                                                    </div>
                                                    <div class="styles_wrapper_hb1CA">
                                                        <div id="uid-1345" data-empleId="cualquiera" data-empleado="participant-label-name" class="styles_field_Bhxvq">
                                                            Cualquier empleado
                                                        </div>
                                                        <input value="Cualquier Empleado" placeholder="" data-testid="S_id" id="uid-1345-input" name="S_id" type="text" autocomplete="off" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none;">
                                                        <div class="styles_slotRight_TkOzM"><i data-testid="select-input-toggle-S_id" class="index_toggleIcon_EqQez"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
        <div class="buttonAddStrack index_buttonsRow_AA5EI justify-content-around" style="display: flex;">
            {{-- <div class="col col-auto"></div> --}}
            <div class="col col-4">
                <button id="uid-376-input" class=" w-100 btn btn-light index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--default_pktIt">
                    <div class="index_caption_W6r_J"> Cancelar </div>
                </button>
            </div>
            <div class="col col-4">
                <button id="uid-377-input" class=" w-100 btn btn-dark index_button_TfmOz index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt" data-testid="multibooking-save">
                    <div class="index_caption_W6r_J"> Guardar </div>
                </button>
            </div>
        </div>
        {{-- botones guardar modificación despues pulsar botón edit --}}
        <div class="buttonEditStrack index_buttonsRow_AA5EI justify-content-around" style="display: none;">
            {{-- <div class="col col-auto"></div> --}}
            <div class="col col-4">
                <button id="uid-376-inputEditReserv" class=" w-100 btn btn-light index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--default_pktIt">
                    <div class="index_caption_W6r_J"> Cancelar </div>
                </button>
            </div>
            <div class="col col-4 inputEditReserv">
                <button id="uid-377-inputEditReserv" class=" w-100 btn btn-dark index_button_TfmOz index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt" data-testid="multibooking-save">
                    <div class="index_caption_W6r_J"> Guardar </div>
                </button>
            </div>
            <div class="col col-auto botonBasura">
                <button id="uid-738-input" class="btn index_button_TfmOz index_size--lg_I9GTR index_theme--alert_unNNB index_theme--default_AtMGF index_slotTheme--icon_yiHCJ">
                    <div class="index_slotLeft_p6NJx">
                        <span class="b-icon iconFont icon-trash" type="font" style="color:#eb0043;font-size: 32px;"></span>
                    </div>
                </button>
            </div>
        </div>
    </div>

</div>
{{-- <x-panel-admin-administrator.citas.modal-select-emple/> --}}
</div>

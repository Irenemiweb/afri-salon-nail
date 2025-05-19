<x-app-layout>
    {{-- <x-movile.pannel-admin/> --}}

    <section id="wrapper" style="">
       <div class="content" style="">
          <!-- Tab links -->
          <div class="tabs tabsAdministrator">
             <button id="tab_administrator_button" class="tablinksAdministrator" data-pannel="User_administrator">
               <p data-title="{{ Auth::user()->name}}">
                   {{-- <a href="{{ route('panelAdmin_product') }}" class="pushable text-decoration-none"> --}}
                       <span class=" front_btn " style="border-radius: 50%!important;padding:0px!important">
                           <img id="profilePhotoAdmin" class="imgAdminUser rounded-circle img-user-lateralMenu imgProfileInformation" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                       </span>
                   {{-- </a> --}}
               </p>
             </button>
             <button id="tab_administrator_ventas" class="tablinksAdministrator btnResetAll" data-pannel="Ventas_administrator" onclick="reseteoVistaVentaPago()">
               <p data-title="Ventas">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/ventas.svg') }}" alt="{{ __('Sales')  }}" />
                    </span>
               </p>
           </button>
           <button onclick="initializeCalendar();loaderWiteSmall();reseteoVistaVentaPago();" id="tab_administrator_citas" class="tablinksAdministrator" data-pannel="Citas_administrator">
               <p data-title="Citas">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/calendario.svg') }}" alt="{{ __('Citas')  }}" />
                   </span>
               </p>
           </button>
           <button onclick="" id="tab_administrator_message" class="tablinksAdministrator" data-pannel="Mensajes_administrator">
               <p data-title="Mensajes" style="margin-left: 6px;">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/mensajes.svg') }}" alt="{{ __('Messages')  }}" />
                   </span>
                   {{-- mensajes sin leer --}}
                    <div class="listOfContacts listOfContactNotChatTab" style="width: 100%;height: calc(100% - 272px);position: relative;">
                    </div>
               </p>
           </button>
           <button id="tab_administrator_estatistic" class="tablinksAdministrator" data-pannel="Estatistic_administrator">
               <p data-title="Estatistic">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/estadistica.svg') }}" alt="{{ __('Statistics')  }}" />
                   </span>
               </p>
           </button>
           <button id="tab_administrator_inventario" class="tablinksAdministrator" data-pannel="Inventario_administrator" onclick="cerrarConversacion()">
               <p data-title="Inventario">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/productos.svg') }}" alt="{{ __('Inventario')  }}" />
                   </span>
               </p>
           </button>
           <button id="tab_administrator_empleados" class="tablinksAdministrator" data-pannel="Empleados_administrator">
               <p data-title="Empleados">
                   <span class="" style="">
                       <img style="width: 38px"  class="img-sidebar" src="{{ asset('storage/icons-left-menu/empleados.svg') }}" alt="{{ __('Empleados')  }}" />
                   </span>
               </p>
           </button>
           <button id="tab_administrator_tarjetaBono" class="tablinksAdministrator" data-pannel="Tarjeta-bono_administrator">
               <p data-title="Tarjeta-bono">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/tarjetas_bonos.svg') }}" alt="{{ __('Briefcase')  }}" />
                   </span>
               </p>

           </button>
           <button id="tab_administrator_perfilNegocio" class="tablinksAdministrator" data-pannel="Perfil-negocio_administrator">
               <p data-title="Perfil-negocio">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/perfil.svg') }}" alt="{{ __('Perfil negocio')  }}" />
                   </span>
               </p>
           </button>
           <button onclick="initializeMap();getFristClient('primero');get_all_init();"  id="tab_administrator_clientes" class="tablinksAdministrator" data-pannel="Clientes_administrator">
               <p data-title="Clientes">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/clientes.svg') }}" alt="{{ __('Clientes')  }}" />
                   </span>
               </p>
           </button>
           <button  id="tab_administrator_configuracion" class="tablinksAdministrator" data-pannel="Configuracion_administrator" style="margin-bottom: 1rem;" onclick="activeAdministratos();showPrincipalPageConfig()">
               <p data-title="Configuracion">
                   <span class="" style="">
                       <img style="width: 38px" class="img-sidebar" src="{{ asset('storage/icons-left-menu/configuracion.svg') }}" alt="{{ __('Setting')  }}" />
                   </span>
               </p>
           </button>
          </div>

          <!-- Tab content -->
          <div class="wrapper_tabcontent noVisible" id="contentTabs">
            <div id="loaderSperaAdministratorAll" class="loader d-none">
                <div class="spinner"></div>
            </div>
            <x-panel-admin-administrator.ventas.offcanvas.elegir-cliente/>
             <div id="User_administrator" class="tabcontentAdministrator active p-3" style="opacity: 0;">
                {{-- <h3 class="h3tabContent" style="width: 217px!important;">{{ Auth::user()->name}}</h3> --}}
                <div>
                   @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                       @livewire('profile.update-profile-information-form')

                       <x-jet-section-border />
                   @endif

                   @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                       @livewire('profile.update-password-form')

                       <x-jet-section-border />
                   @endif

                   @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                       @livewire('profile.two-factor-authentication-form')

                       <x-jet-section-border />
                   @endif

                   @livewire('profile.logout-other-browser-sessions-form')

                   @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                   <div style="margin-bottom: 3rem">
                    <x-jet-section-border />

                    @livewire('profile.delete-user-form')
                   </div>
                   @endif
               </div>
             </div>

             <div id="Ventas_administrator" class="tabcontentAdministrator">
                @include('components.panel-admin-administrator.ventas.modales.modal-cancelar-venta')
                <x-panel-admin-administrator.ventas.ventas/>
             </div>

             <div id="Citas_administrator" class="tabcontentAdministrator" style="">

                <div class="cal-wrapper" style="">
                <input id="solicictaCliente" type="hidden" name="solicitaCliente" value = 0>

                {{-- <button onclick="scrollToHour('18:30:00')" class=" btn btn-warning ">scrollTomeTi</button> --}}
                <div id="loaderSperaAdministrator2" class="loader d-none">
                    <div class="spinner"></div>
                </div>
                    <div style="height: 100vh!important" id='calendar'>

                    </div>
                    <div id="loaderSperaAdministrator" class="loader d-none">
                        <div class="spinner"></div>
                    </div>
                    <div class="droponNuevaCitaCalendar">
                        <div class="add-event_overlay_A4Nrx"></div>
                        <div class="add-button_addButtonWrapper_kEgc1 add-event_addButton_sVkCJ" data-testid="add-event" is-close="true">
                            <button id="uid-3777-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--icon_yiHCJ add-button_addButton_bmqYW" data-testid="add-button">
                                <div class="index_slotLeft_p6NJx">
                                    <span class="b-icon iconFont icon-plus" type="font" style="font-size: 22px;"></span>
                                </div>
                            </button>
                        </div>
                        <div class="droponNuevaReservaCalendar b-frame add-event_frame_d44qn add-event_default_doXcz d-none">
                            <div>
                                <div data-url3="add.reserve" class="add-event_button_DtVNQ">Nueva cita</div>
                                <div data-url3="add.faltaDisponibilidad" class="add-event_button_DtVNQ">Añadir falta de disponibilidad</div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-panel-admin-administrator.citas.modal-cancelar-reserva/>
                <!-- Modal de Bootstrap -->
                <div class="modal fade" id="clientInfoModal" tabindex="-1" aria-labelledby="clientInfoModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="clientInfoModalLabel">Información del Cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Aquí se mostrará la información del cliente -->
                                <p><strong>Nombre:</strong> <span id="clientName"></span></p>
                                <p><strong>Email:</strong> <span id="clientEmail"></span></p>
                                <p><strong>Teléfono:</strong> <span id="clientPhone"></span></p>
                                <!-- Agrega más campos según lo que necesites mostrar -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <x-panel-admin-administrator.citas.all-services/>
                <x-panel-admin-administrator.citas.add-service/>
                <x-panel-admin-administrator.citas.all-services-add/>
                <div class="contenedorReservsCalendear0145">
                <div style="border-radius: 12px 0px 0px;" class="offcanvas offcanvas-end" id="eventDetailsModal" tabindex="-1" aria-labelledby="eventDetailsLabel" data-bs-backdrop="false">
                    <div style="border-radius: 12px 0px 0px;" class=" headerInfoService offcanvas-header align-items-center d-flex position-relative header_header_T53u1">
                        <div class="closedOffcanvasInfoReserv header_sideCol_ZsrXs header_icon_DWZ6K" data-bs-dismiss="offcanvas" onclick="closedOffcanvasInfoReserv();">
                            <span class="b-icon iconFont icon-x" style="font-size: 36px;"></span>
                        </div>
                        <div class="header_centerCol_LHGCB">
                            <div class="heading--2 txt--uppercase reservStatus"></div>
                        </div>
                        <div class="divComboStatusReserv index_dropdown_yxIjB index_has--shadow_s6YH1 index_is--overlay_JG_3k header_dropdownWrap_eQjOJ">
                            <div class="index_toggle_sBt35 botonAbrirComboStatus">
                                <div class="header_actionsButton_GVPLy header_size--14-b_XJC3t">
                                    cambiar
                                    <span class="b-icon iconFont icon-arrow-down" style="font-size: 24px;"></span>
                                </div>
                            </div>
                            {{-- desplegable status --}}
                            <div class="comboStatusReserv index_content_Z_JCn index_position_FV9jY index_position--bottom-right_Dx0W0" style="display: none">
                                <div class="scrollable index_scrollable_qm3Zl index_scrollable_BtJqS">
                                    <div class="header_actions_oRFfx">
                                        <div onclick="actionPresButon('cancelarCitaOption')" class="header_buttonCancel_kUEPy cancelarCitaOption header_size--14-b_XJC3t">
                                            <span class="b-icon iconFont icon-cancel-thin" style="font-size: 28px;"></span>
                                            Cancelar cita
                                        </div>
                                        <div onclick="actionPresButon('faltaCliente')" class="header_buttonCancel_kUEPy faltaCliente header_size--14-b_XJC3t">
                                            <span class="b-icon iconFont icon-noshow" type="font" style="font-size: 22px;"></span>
                                            Falta del cliente
                                        </div>
                                        <div onclick="actionPresButon('confirmarCita')" class="header_buttonCancel_kUEPy confirmarCita header_size--14-b_XJC3t">
                                            <span class="b-icon iconFont" type="font" style="font-size: 22px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#3BC172" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            </span>
                                            Confirmar
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- no hay cliente --}}
                    <div id="basket-customer-card0101Info" data-testid="basket-customer-card" class="basket-customer-card0101Info" style="top: -1rem;position: relative;margin:0 auto;display: none;width:90%">
                        <div class="b-shadow-card customer-card_emptyCustomer_XKrcQ card_empty_info customer-card_isWalkIn__KcSW pointer" onclick="clicTarjetasBlancasSelectCliente(this)">
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
                    {{-- cliente --}}
                    <div class="clienteDetails p-3 modalDetailsReserv" id="clienteDetails">
                        <div style="display:flex">
                            <div class=" col-2 imageCient align-items-center d-flex"></div>
                            <div class="col-3 clientDetails"> </div>
                            <div class="col-3 align-items-center d-flex">
                                <span class="ms-3 b-icon iconFont icon-arrow-right align-items-center d-flex"></span>
                            </div>
                        </div>
                    </div>
                    {{-- cita --}}
                    <div class="offcanvas-body temabordeScroll" style="position: relative;">
                        <div style="top: -20px;" class="scrollable-x b-tabs_container_mpBHN b-tabs_containerDefault_qtxhU appointment-form_tabs_l2JbD">
                            <div class="b-tabs_content_lxbV0" style="display: flex">
                                <div class="cita_tab b-tabs_tabDefaultActive_CYkQd h-100 justify-center b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0">
                                    cita
                                </div>
                                <div class="nota_tab h-100 justify-center b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0">
                                    Notas
                                    <span class="indicatorNotasNewReservInfo"></span>
                                </div>
                            </div>
                        </div>
                        <div id="datos_reserva0106" class="datos_reserva0106 appointment-form_tabWrapper_hG2Xn" style="height: 100%;padding-top:0px">
                            <div>
                                <div class="d-flex align-items-center mb-3 justify-between appointment-tab_dateRow_EN0Vg">
                                    <div class="col col-auto">
                                        <div class="index_dropdown_yxIjB i ndex_has--shadow_s6YH1 index_is--overlay_JG_3k">
                                            <div class="index_toggle_sBt35 fechaCitaInfo2" id="datePikerfechaCitaInfo2">
                                                <div class="date_input_yAhI0">
                                                    <p class="mb-0 size--20-sb fechaCitaInfo">
                                                        {{-- mié., 4 dic. --}}
                                                    </p>
                                                    <span class="b-icon iconFont icon-arrow-down date_icon_bIzRy" style="font-size: 24px;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row margin-bottom-24 subbookings-list_container_nMAxs" >
                                        <div class="tarjetasIncialesMostrarOcultar">
                                            {{-- lo que tengo que añadir --}}
                                            <div class="col col-12" style="padding-bottom: calc(1.5rem* 1);">
                                                <div class="services-wrapper_service_EEfjR">
                                                    <div class="services_serviceWrapper_gug5x getOldService">
                                                        <div class="services_serviceDecorator_ldMxA" style=""></div>
                                                        <div class="services_serviceInfo_iDMQw">
                                                            <div class="services_serviceName_YhbTW services_size--16-sb_M5xdn txt--ellipsis"></div>
                                                            <div class="services_servicePrice_wErzf services_size--16-sb_M5xdn"></div>
                                                        </div>
                                                    </div>
                                                    <span class="b-icon iconFont icon-arrow-right services-wrapper_serviceArrow_h8V47"></span>
                                                </div>
                                            </div>
                                            <div class="index_container_jtGZY index_theme--warning_VkST8 row" style="padding-bottom: calc(1.5rem * .5)">
                                                <x-panel-admin-administrator.desplegables.desplega-hora-ini/>
                                                <x-panel-admin-administrator.desplegables.desplega-hora-fin/>
                                                <div style="position: relative;top: -9px;" class="paddingMensajeAlert alert022" style="">
                                                    {{-- <p style="margin:0px" class="index_message_IeJl5" data-testid="error-input-message">La hora de fin debe ser mayor que hora inicio</p> --}}
                                                </div>
                                            </div>
                                            @php
                                                $data = [
                                                        'contenedor' => 'contenedorEmpleadosInicio',
                                                        'botonClic' =>'styles_outerWrapper_AddEmpleInicio',
                                                        'input' => 'uid-inicio-input',
                                                        'slotLeft_k29' => 'styles_slotLeft_k29NgEmpleadoAddInicio',
                                                        'id_desplegableEmpleado' => 'selectEmpleModalAddInicio',
                                                        'visualizadorNombreEmple' =>'slotEmpleadoAddInicio'
                                                    ];
                                            @endphp
                                            <x-panel-admin-administrator.citas.modal-select-emple :data="$data" />
                                            <div class="resources_requested_lDeAo resources_size--14-sb_vfOvM margin-top-12NewReserv" data-testid="staffer-requested-by-client">
                                                <button onclick="changeheart('.solicitadoClientePantallaInfoCliente')" id="uid-1236-inputPantallaInfoReserv" class="index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--icon_yiHCJ margin-right-8" data-testid="staffer-requested-by-client-button">
                                                    <div class="index_slotRight_Uzff_">
                                                        <img class="solicitadoClientePantallaInfoCliente b-icon_img_I0kuC"src="{{ asset('storage/calendar/heart-empty.svg') }}" alt="corazon vacio">
                                                    </div>
                                                </button>
                                                Solicitado por el cliente
                                            </div>
                                        </div>
                                        <div class="nuevasTarjetasMostrarOcultar" id="ordenable"></div>
                                    </div>
                                    <button id="uid-319-inputAniadirServicio" class="margin-top-24 margin-bottom-24 index_button_TfmOz index_size--md_G1gdK index_theme--default_AtMGF index_slotTheme--icon_yiHCJ">
                                        <div class="index_caption_W6r_J"> Añadir otro servicio </div>
                                        <div class="index_slotRight_Uzff_">
                                            <span class="b-icon iconFont icon-plus appointment-tab_buttonIcon_Kc6Uu" style="font-size: 16px;"></span>
                                        </div>
                                    </button>
                                    {{-- cuando la reserva está pagada --}}
                                    <div data-testid="payment-badge" class="payment-badge_badge_SnspL payment-badge_size--14_XOK3z pointer">
                                        <div class="payment-badge_icon_vl1Rs">
                                            <img class="b-icon-legacy_img_oO6VC" src="https://d10n9ka7jp2kfo.cloudfront.net/pro/6415e116/img/cash.e7b5eb4a.svg" height="40" width="40" data-testid="payment-badge-icon">
                                        </div>
                                        <div>
                                            <div class="margin-bottom-4">
                                                <div data-testid="receipt-status-badge-label" class="receipt-status-badge_status_vwj1d receipt-status-badge_statusGreen_Aw6NK receipt-status-badge_size--xs_EtgLy receipt-status-badge_size--9-sb_zgSEq margin-bottom-4">Pagado</div>
                                            </div>
                                            <div class="payment-badge_details_BO_gx">19:29  • abr. 21, 2025
                                                <br>
                                                <span class="payment-badge_detailsLine2_xW5pQ payment-badge_size--12_gmxU0">Cita</span>
                                            </div>
                                        </div>
                                        <div class="payment-badge_amount_QoXEP">0,00&nbsp;€</div>
                                    </div>
                                    {{-- --------------- --}}
                                </div>
                            </div>
                        </div>
                        <div id="notas_info0106" class="notas_info0106 notes-and-info-tab_container_QaKJE appointment-form_tabWrapper_hG2Xn" style="display:none">
                            <div class="row items-start">
                                <div class="col col-grow">
                                    <div class="b-input_input_DWB9v b-input">
                                        <div class="b-input_inputFieldWrapper_Dm82F b-input_size--16_kWC04 b-input_textarea_CHo1T">
                                            <textarea name="business_secret_note" id="business_noteNewReserv" rows="1" class="scrollable b-input_inputField_NsXbZ b-input_size--16-sb_jW2fX b-input_inputFieldWithLabel_IL5CK b-input_inputFieldWithClear_OxM_v" data-testid="business_secret_noteNewReserv" style="overflow: hidden; overflow-wrap: break-word; height: 48px;"></textarea>
                                            <label for="business_secret_note" class="business_noteNewReserv input-label b-input_inputLabel_koPPi">Nota interna (visible solo empleados)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-auto notes-and-info-tab_highlight_BIrUy">
                                    <button class="b-button_button_QiVJW b-button_theme--iconSecondary_yYxhu notes-and-info-tab_highlightButton_jwovs" type="button">
                                        <img class="b-icon_img_I0kuC" src="https://d10n9ka7jp2kfo.cloudfront.net/pro/3abca9a6/img/highlight.b2df1336.svg" style="height: 30px;">
                                    </button>
                                    <span class="notes-and-info-tab_starBadge_YNLkr">Favoritos</span>
                                </div>
                            </div>
                            {{-- <hr class="notes-and-info-tab_bar_nLFY5"> --}}
                            <div class="notasInfoCliente"></div>
                            <div class="b-input_input_DWB9v b-input padding-bottom-16">
                                <div class="b-input_inputFieldWrapper_Dm82F b-input_size--16_kWC04 b-input_textarea_CHo1T">
                                    <textarea name="business_noteNewInfo" id="business_noteInfo" rows="1" class="scrollable b-input_inputField_NsXbZ b-input_size--16-sb_jW2fX b-input_inputFieldWithLabel_IL5CK b-input_inputFieldWithClear_OxM_v" data-testid="business_noteNewReserv" value="" style="overflow: hidden; overflow-wrap: break-word; height: 48px;"></textarea>
                                    <label for="business_noteNewInfo" class="business_noteInfo input-label b-input_inputLabel_koPPi">Mensaje para el cliente</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-footer">
                        <div class="appointment-form_totalFooter_edqmd">
                            <div class="b-row">
                                <div class="b-col b-border-r b-text-left">
                                    <p style="margin: 0px" class="b-paragraph-m b-text-secondary">
                                        Total
                                    </p>
                                    <p class="b-heading-xl" style="font-weight: 700;margin: 0px" data-testid="appointment-price">
                                        {{-- 15,00&nbsp;€ --}}
                                    </p>
                                </div>
                                <div class="b-col b-text-right" data-testid="appointment-to-be-paid">
                                    <p style="margin: 0px" class="b-paragraph-m b-text-secondary"> A pagar </p>
                                    <p class="b-heading-xl" style="font-weight: 700;margin: 0px">
                                         {{-- 15,00&nbsp;€ --}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <footer class="appointment-form_drawerFooter_DGcVH reservCobrarFooterInfo" id="reservCobrarFooterInfo">
                            <div>
                                <button id="uid-771-input" class="btn index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--default_pktIt height-100" data-testid="appointment-button-book-again" style="width: 100%;padding:0px">
                                    <div class="index_caption_W6r_J">Reservar de nuevo</div>
                                </button>
                            </div>
                            <div>
                                <button id="uid-772-input-pay" class="btn index_button_TfmOz index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt height-100" data-testid="appointment-button-checkout" style="width: 100%;padding:0px" onclick="showViewCobrarServicioCalendar();">
                                    <div class="index_caption_W6r_J">Cobrar</div>
                                </button>
                            </div>
                        </footer>
                        {{-- footer guardar cambios --}}
                        <footer class="appointment-form_drawerFooter_DGcVH saveChangesFooterInfo" style="display: none" id="saveChangesFooterInfo">
                            <div><button id="uid-771-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--default_pktIt height-100" data-testid="appointment-button-discard" style="width: 100%;">
                                <div class="index_caption_W6r_J">Descartar</div>
                            </button>
                        </div>
                        <div>
                            <button id="uid-772-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt height-100" data-testid="appointment-button-save" style="width: 100%;">
                                <div class="index_caption_W6r_J">Guardar cambios</div>
                            </button>
                        </div>
                    </footer>
                    </div>
                </div>
            </div>
                <x-panel-admin-administrator.citas.calendario.offcanvas-new-reserv/>
             </div>

                {{-- OFFCANVAS RESERVA PAGAR --}}
                <div style="border-radius: 12px 0px 0px;" class="offcanvas offcanvas-end" data-service="" data-duration="" data-bs-backdrop="static" tabindex="-1" id="offcanvasInfoUser" aria-labelledby="offcanvasInfoUserLabel">
                    <div class=" card pos-relative">
                        <div class="offcanvas-header mb-3 text-center align-items-center d-flex">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>

                        </div>
                        <div class="offcanvas-body card-body card-body-lg text-center">
                            <div class="mt-2xl">
                                <span class="icon icon-appointment-confirmed">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="118" width="118"><defs><filter id="a" color-interpolation-filters="auto"><feColorMatrix values="0 0 0 0 0.000000 0 0 0 0 0.745098 0 0 0 0 0.439216 0 0 0 1.000000 0" in="SourceGraphic"></feColorMatrix></filter></defs><g fill-rule="evenodd" fill="none"><path fill="#00BE70" d="M20.87 10.544a3.295 3.295 0 01.447 6.56l-.448.03h-6.965a7.46 7.46 0 00-5.232 2.287 7.465 7.465 0 00-2.058 4.624l-.022.76v66a7.46 7.46 0 002.08 5.318 7.463 7.463 0 004.453 2.236l.715.051h56.944A22.392 22.392 0 0073.79 105H13.777a14.052 14.052 0 01-9.855-4.31 14.036 14.036 0 01-3.907-9.037l-.013-.914V24.87a14.05 14.05 0 013.92-10.015 14.059 14.059 0 018.976-4.261l.942-.05h7.03zM52.5 79.079a5.052 5.052 0 110 10.105 5.052 5.052 0 010-10.105zm-24.602 0a5.052 5.052 0 110 10.105 5.052 5.052 0 010-10.105zm63.325-68.535a14.052 14.052 0 019.855 4.31 14.036 14.036 0 013.907 9.037l.013.914v48.983a22.392 22.392 0 00-6.59-3.004V24.739a7.46 7.46 0 00-2.08-5.318 7.463 7.463 0 00-4.453-2.236l-.715-.051h-7.03a3.295 3.295 0 01-.447-6.56l.448-.03h7.092zM77.102 57.992a5.052 5.052 0 110 10.104 5.052 5.052 0 010-10.104zm-24.602 0a5.052 5.052 0 110 10.104 5.052 5.052 0 010-10.104zm-24.602 0a5.052 5.052 0 110 10.104 5.052 5.052 0 010-10.104zm49.204-21.088a5.052 5.052 0 110 10.104 5.052 5.052 0 010-10.104zm-24.602 0a5.052 5.052 0 110 10.104 5.052 5.052 0 010-10.104zM31.413 0a3.296 3.296 0 013.265 2.848l.03.447v17.573a3.295 3.295 0 01-6.56.447l-.03-.447V3.295A3.295 3.295 0 0131.413 0zm42.174 0a3.296 3.296 0 013.265 2.848l.03.447v17.573a3.295 3.295 0 01-6.56.447l-.03-.447V3.295A3.295 3.295 0 0173.587 0zM63.044 10.544a3.295 3.295 0 01.447 6.56l-.447.03H41.956a3.295 3.295 0 01-.447-6.56l.447-.03h21.088z"></path><g filter="url(#a)"><path fill="#00BE70" d="M91.943 66.25c14.19 0 25.693 11.503 25.693 25.693 0 14.19-11.503 25.693-25.693 25.693-14.19 0-25.693-11.503-25.693-25.693 0-14.19 11.503-25.693 25.693-25.693zm0 7.5c-10.048 0-18.193 8.145-18.193 18.193 0 10.047 8.145 18.193 18.193 18.193 10.047 0 18.193-8.146 18.193-18.193 0-10.048-8.146-18.193-18.193-18.193zm11.91 10.138a3.75 3.75 0 01.585 4.896l-.316.4-11.193 12.386a3.75 3.75 0 01-5.02.494l-.4-.343-6.407-6.339a3.75 3.75 0 014.852-5.693l.422.361 3.618 3.578 8.563-9.472a3.75 3.75 0 015.297-.268z"></path></g></g></svg>
                                </span>
                            </div>
                            <h2 class="mt-lg mb-0">Cita confirmada</h2>
                            <h2 class="m-0 reservConfirmDateHour"></h2>
                            <p class="mt-xs pb-3xl">¡Listo! Te enviaremos un recordatorio por mensaje de texto antes de tu cita.</p>
                            <button data-index="{" class="boton-reservar-servicio mt-3 gualazonF button-primary-salon button button-shadow button-block button-primary button-lg mt-md" data-testid="showReserv">
                                <span data-testid="continue-button-book">Mostrar cita</span>
                            </button>
                        </div>
                    </div>
                </div>

             <div id="Mensajes_administrator" class="tabcontentAdministrator overflow-x-hidden overflow-y-hidden" style="height:100%">
                @include('vendor.Chatify.pages.app')
             </div>
             <div id="Estatistic_administrator" class="tabcontentAdministrator">
               <h3 class="h3tabContent">Estadísticas</h3>
               <p>Estadisticas</p>
            </div>
            <div id="Inventario_administrator" class="tabcontentAdministrator">
               <h3 class="h3tabContent">Inventario</h3>
               <p>Inventario</p>
            </div>
            <div id="ProductUp" class="tabcontentAdministrator container upload-page  pt-0">
            </div>
            <div id="Empleados_administrator" class="tabcontentAdministrator">
               <h3 class="h3tabContent">Empleados</h3>
               <p>Empleados</p>
            </div>
            <div id="Tarjeta-bono_administrator" class="tabcontentAdministrator">
               <h3 class="h3tabContent">Tarjetas regalo y Bonos</h3>
               <p>Tarjetas regalo y Bonos</p>
            </div>
            <div id="Perfil-negocio_administrator" class="tabcontentAdministrator">
               <h3 class="h3tabContent">Perfil negocio</h3>
               <p>Perfil negocio</p>
            </div>
            <div id="Clientes_administrator" class="tabcontentAdministrator" style="height: calc(100vh - 4.3rem);">
                <x-panel-admin-administrator.clientes.principal/>
            </div>
            <div id="Configuracion_administrator" class="tabcontentAdministrator " style="background-color: #f4f4f4; height: 100%; padding:1rem;">
                <div id="configuration_bussines" style="display: block">
                    <livewire:configuration-app.configuration-bussines />
                </div>
                <div id="configuration_service" style="display: none">
                    <livewire:configuration-app.configuration-service />
                </div>
                <div id="show_all_service" style="display: none; height: 100%">
                    <livewire:configuration-app.show-all-services />
                </div>
                <div  id="createNew_service" style="display: none">
                    <x-form-new-service.form-new-service/>
                </div>
                <div  id="opciones_avanzadas1" style="display: none">
                    <x-panel-admin-administrator.configurationes.opciones-avanzadas/>
                </div>
                <div  id="opciones_avanzadas2" style="display: none">
                    <x-panel-admin-administrator.configurationes.configuracion-reserva/>
                </div>
                <x-modals.modal-new-category/>
            </div>
          </div>
       </div>
    </section>
    <x-reserva.servicio.offcanva-notify-new-reserv/>
    {{-- <x-footer.footer/> --}}
   </x-app-layout>

  @if(isset($executeJavaScript) && $executeJavaScript)
    @php
        if (isset($valuesMap[$value])) {
            [$param1, $param2, $param3] = $valuesMap[$value];
        }
    @endphp

    @if (isset($param1, $param2, $param3))
        <script>
            UpProductAdministrator('{{ $param1 }}', '{{ $param2 }}', '{{ $param3 }}');
        </script>
    @endif
@elseif (isset($executeJavaScriptUser) && $executeJavaScriptUser)
    @php
        if (isset($valuesMap[$value])) {
            [$param1, $param2, $param3] = $valuesMap[$value];
        }
    @endphp

    @if (isset($param1, $param2, $param3))
        <script>
            UpProduct('{{ $param1 }}', '{{ $param2 }}', '{{ $param3 }}');
        </script>
    @endif
@endif
<script>

   //mover ordenar imágenes divs
// Inicializa Sortable
new Sortable(document.getElementById('ordenable'), {
    animation: 150,
    onEnd: function(evt) {
        console.log('Orden cambiado:', evt);
        console.log(_id('formImage'));
        // Aquí puedes manejar el cambio de orden y actualizar tu servidor si es necesario
    }
});
new Sortable(document.getElementById('ordenableCalendar'), {
    animation: 150,
    onEnd: function(evt) {
        console.log('Orden cambiado:', evt);
        console.log(_id('formImage'));
        // Aquí puedes manejar el cambio de orden y actualizar tu servidor si es necesario
    }
});
</script>


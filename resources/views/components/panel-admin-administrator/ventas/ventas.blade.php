<div class="content1">
    @include('components.panel-admin-administrator.ventas.modales.modal-modificar-articulo')
    @include('components.panel-admin-administrator.ventas.modales.modal-descuento-total')
    @include('components.panel-admin-administrator.ventas.desplegables.desplegable-empleado')
    <x-panel-admin-administrator.ventas.modales.modal-introducir-importe/>
    <x-panel-admin-administrator.ventas.modales.modal-introducir-importe-tarjetas/>
    <x-panel-admin-administrator.ventas.modales.modal-cambiar-metodo-pago/>
    <div>

    </div>
    <div class="index_sales_X5DVI">
        <div class="index_checkoutView_pvF8_">
            <div class="index_checkoutView_oS9m6 index_checkoutView_oS9m6Principal" style="">
            {{-- <x-panel-admin-administrator.ventas.pago-finalizado/> --}}
            {{-- <x-panel-admin-administrator.ventas.mail-recibo/> --}}
                {{-- aqui el contenido de paidWrapper --}}
                <div class="basket-layout_basketWrapper_HlQSH" style="">

                    <div class="salesNavigator-indexBasketContent" id="salesNavigator-indexBasketContent">
                        {{-- pestañas superiores data-bs-toggle="modal" data-bs-target="#modalCancelarVenta33"--}}
                        <div class="sales-navigation_salesNavigation__5XXN">
                            <div class="scrollable-x b-tabs_container_mpBHN b-tabs_containerDefault_qtxhU sales-navigation_tabs_wpot8">
                                <div class="b-tabs_content_lxbV0">
                                    <ul class="b-tabs_tabs_nYRc_">
                                        <li tabindex="-1" data-testid="checkout" class="b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0 b-tabs_tabDefaultActive_CYkQd">
                                            Nueva venta</li>
                                        <li tabindex="0" data-testid="sales.transactions" class="b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0">
                                            Transacciones</li>
                                        <li tabindex="0" data-testid="sales.invoices.list" class="b-tabs_tab_Gc2Ei b-tabs_tabDefault_Yt0P5 b-tabs_size--12_vzhd0">
                                            Facturas</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="index_basketContent_rYpG1 scrollable-desktop">
                            {{-- aquí es lo que cambia de las pestañas superiores --}}
                            <div class="row">
                                {{-- pestañas laterales --}}
                                <div class="col col-12 col-sm-3 index_basketContentCol_NtMrz">
                                    <ul>
                                        <li>
                                            <div data-testid="basket-menu-quick-sale" class="b-list-item_item_e5SMN index_menuItem_o_C42 index_menuItemActive_bAiPX">
                                                <p class="b-list-item_text_K1ZUI">Venta rápida</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div data-testid="basket-menu-appointments" class="b-list-item_item_e5SMN index_menuItem_o_C42">
                                                <p class="b-list-item_text_K1ZUI">Por cobrar</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div data-testid="basket-menu-services" class="b-list-item_item_e5SMN index_menuItem_o_C42">
                                                <p class="b-list-item_text_K1ZUI">Servicios</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div data-testid="basket-menu-products" class="b-list-item_item_e5SMN index_menuItem_o_C42">
                                                <p class="b-list-item_text_K1ZUI">Productos</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div data-testid="basket-menu-custom-amount" class="b-list-item_item_e5SMN index_menuItem_o_C42">
                                                <p class="b-list-item_text_K1ZUI">Cantidad personalizada</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col col-12 col-sm-9 index_basketContentCol_NtMrz">
                                    {{-- aqui dentro es lo que cambia de las pestañas laterales --}}
                                    {{-- VENTA RÁPIDA --}}
                                    {{-- <x-panel-admin-administrator.ventas.pestania-lateral.venta-rapida/> --}}
                                    @livewire('ventas.venta-rapida')
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- vista pagar tipos de pagod --}}
                    <div id="index_checkoutView_pvF8_VistaPagos" class="h-100 index_scrollable_WEBRx index_checkoutView_pvF8_" style="display: none">
                        <div class="padding-h-24 h-100 index_basketWrap_Iw20N index_basketWrap_UiqyrMetodosPago">
                            <header class="b-custom-header_header_oZL1I header_header_kgQXj">
                                <div class="b-custom-header_left b-custom-header_hasIcon_uCjMI b-custom-header_hasIconEllipsis_gYB6P b-custom-header_left_bWmRf">
                                    <span class="b-icon iconFont icon-nav-arrow-left b-custom-header_icon_XtAgm" data-testid="b-custom-header-icon-back" style="font-size: 24px;"></span>
                                    <div>
                                        <div data-testid="header" class="b-custom-header_headerTitle_ogW55 txt--ellipsis">
                                            <span class="b-custom-header_title_GTxIs b-custom-header_wordBreakAll_U_pxk"> Método de pago y propina </span>
                                        </div>
                                    </div>
                                </div>
                                <div class=" align-items-center d-flex">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalCancelarVenta33" class="b-button_button_QiVJW b-button_theme--danger_EEM01 b-button_size--extra-small_Z9rd5 header_button_zmS9m">Cancelar venta</button>
                                </div>
                            </header>
                            <p class="col size--18-b margin-bottom-16">Método de pago</p>
                            <div class="row row--gutter-8 margin-bottom-32 margin-bottom32MetodoPago payment-types_theme--inline_V_YxB">
                                <div class="col col--gutter-8 payment-types_col_ius7E" data-type="efectivo">
                                    <div class="size--14 payment-types_paymentMethod_gcJrJ payment-types_paymentMethodActive_vBa20">
                                        <div class="payment-types_paymentMethodIconWrap_C3La3">
                                            <span class="b-icon iconFont icon-cash" style="font-size: 20px;"></span>
                                        </div>
                                        <div class="payment-types_paymentMethodLabel_syffh">Efectivo</div>
                                    </div>
                                </div>
                                <div class="col col--gutter-8 payment-types_col_ius7E" data-type="Terminal de tarjeta física"><div class="size--14 payment-types_paymentMethod_gcJrJ"><div class="payment-types_paymentMethodIconWrap_C3La3"><span class="b-icon iconFont icon-credit-card" style="font-size: 24px;"></span></div><div class="payment-types_paymentMethodLabel_syffh">Terminal de tarjeta física</div></div></div>
                                <div class="col col--gutter-8 payment-types_col_ius7E" data-type="Bizum"><div class="size--14 payment-types_paymentMethod_gcJrJ"><div class="payment-types_paymentMethodIconWrap_C3La3"><span class="b-icon iconFont icon-check" style="font-size: 20px;"></span></div><div class="payment-types_paymentMethodLabel_syffh">Bizum</div></div></div>
                                <div class="col col--gutter-8 payment-types_col_ius7E" data-type="American Express"><div class="size--14 payment-types_paymentMethod_gcJrJ"><div class="payment-types_paymentMethodIconWrap_C3La3"><span class="b-icon iconFont icon-american-express" style="font-size: 16px;"></span></div><div class="payment-types_paymentMethodLabel_syffh">American Express</div></div></div>
                                <div class="col col--gutter-8 payment-types_col_ius7E" data-type="PayPal"><div class="size--14 payment-types_paymentMethod_gcJrJ"><div class="payment-types_paymentMethodIconWrap_C3La3"><span class="b-icon iconFont icon-paypal" style="font-size: 20px;"></span></div><div class="payment-types_paymentMethodLabel_syffh">PayPal</div></div></div>
                                <div style="pointer-events: none;" class="col col--gutter-8 payment-types_col_ius7E" data-type="Pago fraccionado"><div class="size--14 payment-types_paymentMethod_gcJrJ"><div class="payment-types_paymentMethodIconWrap_C3La3"><span class="b-icon iconFont icon-split-payment" style="font-size: 24px;"></span></div><div class="payment-types_paymentMethodLabel_syffh">Pago fraccionado</div></div></div>
                                <div class="col col--gutter-8 payment-types_col_ius7E" data-type="Suscripción"><div class="size--14 payment-types_paymentMethod_gcJrJ"><div class="payment-types_paymentMethodIconWrap_C3La3"><span class="b-icon iconFont icon-membership" style="font-size: 20px;"></span></div><div class="payment-types_paymentMethodLabel_syffh">Suscripción</div></div></div>
                                <div class="col col--gutter-8 payment-types_col_ius7E" data-type="Tarjeta regalo"><div class="size--14 payment-types_paymentMethod_gcJrJ"><div class="payment-types_paymentMethodIconWrap_C3La3"><span class="b-icon iconFont icon-giftcard" style="font-size: 20px;"></span></div><div class="payment-types_paymentMethodLabel_syffh">Tarjeta regalo</div></div></div>
                                <div class="col col--gutter-8 payment-types_col_ius7E" data-type="Bono de sesiones"><div class="size--14 payment-types_paymentMethod_gcJrJ"><div class="payment-types_paymentMethodIconWrap_C3La3"><span class="b-icon iconFont icon-package" style="font-size: 20px;"></span></div><div class="payment-types_paymentMethodLabel_syffh">Bono de sesiones</div></div></div>

                            </div>
                            <p data-tipoPago2="efectivo" class="tipoPago2 col size--18-b margin-bottom-16">Pago</p>
                            <div class="row margin-bottom-16 cambioMostrarOcultar">
                                <div class="col col-auto">
                                    <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_size--lg_RQ276 styles_theme--default_x92vh styles_slotTheme--default_vYr1T">
                                        <div class="styles_outerWrapper_NumuG" style="min-width: 0px;">
                                            <div class="styles_labelWrapper_isbmo">
                                                <label class="styles_label_hleTI">Cantidad</label>
                                            </div>
                                            <div class="styles_wrapper_hb1CA">
                                                <div class="styles_slotLeft_k29NgPrecioModificarCesta"> € </div>
                                                <input data-type="efectivo" value=""  id="uid-317-inputMetodoPago" name="item_priceMetodoPago" type="text" autocomplete="on" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col txt--right"><p style="margin-bottom: 0px" class="color-08 txt--uppercase">Cambio</p><p class="color-08 cambio_800">0,00 €</p></div>
                            </div>
                            {{-- EN CASO DE PAGO COMBINADO UN TANTO CON BIZUN OTRO EFECTIVO(EJEMPLO) --}}
                            <div class="pagoCombinado66">

                            </div>


                        </div>
                    </div>
                    {{-- div de momento vacío --}}
                    <div class="v-tour"> </div>
                    <div class="basket-layout_sidebar_X6qEm">
                        <div class="index_basket_mditR">
                            <div class="scrollable index_basketHeader_oeM3c" style="overflow: auto">
                                {{-- seleccionar cliente o deja en blanco --}}
                                <div class="margin-bottom-12">
                                    <div data-testid="basket-customer-card" class="basket-customer-card0101">
                                        <div class="b-shadow-card customer-card_emptyCustomer_XKrcQ card_empty_ventas customer-card_isWalkIn__KcSW pointer" onclick="clicTarjetasBlancasSelectCliente(this)">
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

                                {{-- div vista tarjetas servicio cobrar calendar --}}
                                <div class="margin-bottom-12">
                                    <div class="b-shadow-card appointment-card_appointment_F_IwZ margin-top-8" style="display: none">
                                        <div class="appointment-card_appointmentContent_pQhcr">
                                            <div class="appointment-date_date_UsCxi appointment-card_appointmentDate_MDDuS">
                                                {{-- <div class="appointment-date_month_nFAjw appointment-date_size--12_Z4is5">abr.</div>
                                                <div class="appointment-date_day_zpfF4 appointment-date_size--20_BC_a_">21</div>
                                                <div class="appointment-date_hour_isz2C appointment-date_size--12_Z4is5">10:00</div> --}}
                                            </div>
                                            <div>
                                                <div class="statusReservaCalendarCobrar style_status_xxjlV style_statusDefault_HPmTE style_status--xs_vvmA5 style_statusUpperCase_bkX7Z style_statusGreen_lW62O b-ml-0 b-mb-1"></div>
                                                <div class="tarjetasServiciosCobrarCalendar056">
                                                    {{-- <div class="appointment-card_appointmentService_gsMNj">
                                                        <div class="appointment-card_appointmentServiceBar_BvsJO"></div>
                                                        <p style="margin-bottom: 0px" class="size--14 txt--ellipsis margin-left-12">Manicura clásica</p>
                                                    </div>
                                                    <div class="appointment-card_appointmentService_gsMNj">
                                                        <div class="appointment-card_appointmentServiceBar_BvsJO"></div>
                                                        <p style="margin-bottom: 0px" class="size--14 txt--ellipsis margin-left-12">Manicura clásica</p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="appointment-card_appointmentClose_W4B_o">
                                            <button data-testid="delete-appointment" class="botonCerrarTarjeta028">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 40 40" role="img" class="b-svg b-svg-name-x">
                                                    <path fill="currentColor" fill-rule="evenodd" d="M10.596 8.646 20 18.05l9.404-9.404a1.379 1.379 0 0 1 1.95 1.95L21.949 20l9.405 9.404a1.379 1.379 0 0 1-1.95 1.95L20 21.949l-9.404 9.405a1.379 1.379 0 1 1-1.95-1.95L18.05 20l-9.404-9.404a1.379 1.379 0 1 1 1.95-1.95"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <div class="index_basketContent_WUvZW" style="">
                                    <div class="basketFull d-none">
                                        <div class="row index_basketHeaderRow_RJa3U">
                                            <div class="col col-6">
                                                <div class="size--10 color-07">Artículo</div>
                                            </div>
                                            <div class="col col-6 txt--right">
                                                <div class="size--10 color-07">Cantidad</div>
                                            </div>
                                            <div class="col col-12"><hr class="index_hr_bNIZC"></div>
                                        </div>

                                        <ul class="basket-transactions-list" data-testid="basket-transactions-list" style="padding-left: 0px;margin-bottom: 0rem;">
                                            {{-- div descuento si lo hay
                                            <div class="row margin-bottom-0">
                                                <div class="col padding-bottom-0">
                                                    <div class="size--12 color-07"></div>
                                                </div>
                                                <div class="col col-4 padding-bottom-0">
                                                    <div class="size--12 color-07 txt--right"> Descuento 8% </div>
                                                </div>
                                            </div> --}}
                                            {{-- <li>

                                            </li> --}}
                                        </ul>

                                        <div class="index_basketRowsHint_S5CyP">
                                            <span class="color-12 margin-right-4 b-icon iconFont icon-tap" style="font-size: 12px;"></span>
                                            <span class="size--10-sb color-08 txt--uppercase"> Seleccionar artículo para modificar </span>
                                        </div>
                                        <div class="row margin-top-4">
                                            <div class="col col-8">
                                                <div class="size--12 color-07 txt--right">Subtotal</div>
                                            </div>
                                            <div data-testid="basket-subtotal" class="col col-4">
                                                <div class="divSubtotal size--12 txt--right">0€</div>
                                            </div>
                                        </div>
                                        <hr class="index_hr_bNIZC">
                                        <div class="row items-center margin-top-4 pointer descuentoTotal" data-bs-toggle="modal" data-bs-target="#descuentoTotal" onclick="actualizarPorcentajeTotal();">
                                            <div class="col col-auto">
                                                <button type="button" class="b-button_button_QiVJW b-button_theme--icon_mi9ao index_shadowButton_SVBaz" data-testid="basket-add-discount">
                                                    <span class="b-icon iconFont icon-plus" type="font" style="font-size: 11px;"></span>
                                                </button>
                                            </div>
                                            <div data-v-step="5" data-testid="basket-discount-porcentaje" class="col col-4">
                                                <div class="size--12 color-07 txt--right basket-discountPorcentajeShow">0%</div>
                                            </div>
                                            <div class="col">
                                                <div class="size--12 color-07 txt--right">Descuento</div>
                                            </div>
                                            <div data-v-step="5" data-testid="basket-discount" class="col col-4">
                                                <div class="size--14-sb txt--right basket-discountShow">0,00 €</div>
                                            </div>
                                            <div class="col col-12"><hr class="index_hr_bNIZC"></div>
                                        </div>
                                        <div data-testid="basket-consumption" class="row items-center pointer margin-top-12">
                                            {{-- <div class="col col-auto">
                                                <button type="button" class="b-button_button_QiVJW b-button_theme--icon_mi9ao index_shadowButton_SVBaz">
                                                    <span class="b-icon iconFont icon-inventory" type="font" style="font-size: 16px;"></span>
                                                </button>
                                            </div>
                                            <div class="col col-auto">
                                                <div class="size--12 color-07 txt--right">Gasto</div>
                                            </div> --}}
                                            <div data-testid="assigned-staffer" class=" text-center" style="display: grid">
                                                <div class="d-flex justify-content-between">
                                                <p style="font-size: .875rem;font-weight: 700;">Responsable:</p>
                                                <div class="margin-left-8 margin-right-8 size--14 txt--ellipsis size--14-sb responsableCobro"> No hay asignación de personal </div>
                                                </div>
                                                <button data-responsable="assined-staffer-responsable" style="width: 100%" id="" data-index="0" class="pointert index_button_TfmOz index_size--sm_z95WM index_theme--default_AtMGF index_slotTheme--icon_yiHCJ assigned-staffer_assignedStafferButton_XHCi1 margin-left-auto" data-testid="assigned-staffer-edit-commission" data-bs-toggle="modal" data-bs-target="#droponAbrirEmpleBotonCambiar" onclick="showEmpleDesple(this)">
                                                    <div class="index_slotLeft_p6NJx">
                                                        <img src="https://d10n9ka7jp2kfo.cloudfront.net/pro/dc6927ba/img/comission-edit.b159197c.svg" class="padding-left-8 b-icon_img_I0kuC" style="height: 14px;"></div>
                                                    <div class="index_caption_W6r_J"> Seleccionar responsable </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- div vacío --}}
                                    <div data-testid="empty-basket" class="index_basketEmpty_VF3Lr">
                                        <div>
                                            <p class="size--16 margin-bottom-12">La cesta está vacía</p>
                                            <p class="size--14 color-07">Selecciona artículos que quieres añadir a la cesta.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- totales --}}
                            <div class="index_basketFooter_xZHxG">
                                <p class="txt--right margin-top-20 color-07 txt--uppercase txt--s">Total</p>
                                <p data-testid="basket-total" class="txt--right margin-bottom-8 heading--1">
                                    <span class="basketTotalPrecio">0,00 €</span>
                                </p>
                                {{-- botones disabled venta rápida --}}
                                <div class="row botonesDisabledVentaRapida">
                                    <div class="col col-auto col--narrower">
                                        <button id="uid-82-input" disabled="disabled" class="index_button_TfmOz index_is--disabled_w97Nq index_size--lg_I9GTR index_theme--alert_unNNB index_theme--default_AtMGF index_slotTheme--icon_yiHCJ" data-testid="basket-delete">
                                            <div class="index_slotLeft_p6NJx">
                                                <span class="b-icon iconFont icon-trash" style="font-size: 32px;"></span>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col col--narrower b-pl-0">
                                        <button id="uid-84-input" disabled="disabled" class="index_button_TfmOz index_is--disabled_w97Nq index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt index_resolveBtn_PxyxB" data-testid="continue-btn" style="width: 100%;">
                                            <div class="index_caption_W6r_J">Continuar</div>
                                        </button>
                                    </div>
                                </div>
                                {{-- botones enabled venta rápida abrir modal desde boton--}}
                                <div class="botonesEnabledVentaRapida row d-none">
                                    <div class="col col-auto col--narrower">
                                        <button data-bs-toggle="modal" data-bs-target="#modalCancelarVenta33" id="uid-137-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--alert_unNNB index_theme--default_AtMGF index_slotTheme--icon_yiHCJ" data-testid="basket-delete">
                                            <div class="index_slotLeft_p6NJx">
                                                <span class="b-icon iconFont icon-trash" style="font-size: 32px;"></span>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col col--narrower b-pl-0 insertPayButton">
                                        <button onclick="continueButtonPayment()" id="uid-139-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt index_resolveBtn_PxyxB" data-testid="continue-btn" style="width: 100%;">
                                            <div class="index_caption_W6r_J botonCambiarTitulo"> Continuar </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="index_checkoutView_oS9m6 index_checkoutView_oS9m6Secundario">

            </div>
        </div>
    </div>
</div>

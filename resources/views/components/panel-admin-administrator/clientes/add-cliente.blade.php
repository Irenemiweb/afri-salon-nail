<div class="edit_customerForm_XJmIP" style="display:block">
    <div class="">
        <header style="background-color: transparent" class="b-custom-header b-custom-header_header_oZL1I b-custom-header_headerPadding_gg5dx">
            <div class="b-custom-header_left b-custom-header_hasIcon_uCjMI b-custom-header_hasIconEllipsis_gYB6P b-custom-header_left_bWmRf">
                <span class="b-icon iconFont icon-nav-arrow-left b-custom-header_icon_XtAgm" data-testid="b-custom-header-icon-back" style="font-size: 20px;"></span>
                <div>
                    <div data-testid="add-new-client-header" class="b-custom-header_headerTitle_ogW55 txt--ellipsis">
                        <span class="b-custom-header_title_GTxIs b-custom-header_wordBreakAll_U_pxk"> Añadir nuevo cliente </span>
                    </div>
                </div>
            </div>
            <div class="b-custom-header_right b-custom-header_right_uT_uU">
                <label for="89checkbox_blacklisted" class="b-input-choice_container_aoM6F b-input-choice_containertoggler--revert_I2Vvu">
                    <div class="position-relative">
                       <x-panel-admin-administrator.clientes.botones.toggel/>
                    </div>
                    <div class="b-input-choice_label_dgjUA b-input-choice_size--14_eTI26" style="margin-right: 8px;">
                        <div class="index_inputChoiceTitle_vWBIW"> ¿Activar las reservas online? </div>
                        <div class="index_inputChoiceDescription_RM6Yg"> sí </div>
                    </div>
                </label>
                <div class="d-flex flex-column flex-sm-row gap-2">
                    <button style="padding: 1rem 36px;" type="button" class="b-mr-4 b-button_button_QiVJW b-button_theme--secondary_Nu5MN" data-testid="add-customer">Añadir</button>
                    <button style="padding: 1rem 36px;" type="button" class="b-button_button_QiVJW" data-testid="add-and-invite-customer">Añadir e invitar</button>
                </div>
            </div>
        </header>
        <div class="layout-with-side-menu_wrapper_u82LO">
            {{-- menu lateral --}}
            <ul style="padding: 0px" class="index_menu_oOSnb layout-with-side-menu_menu_sGBG5">
                <li data-testid="general">
                    <div style="" data-testid="Información general" class="b-list-item_item_e5SMN index_menuItem_ZFuFK index_menuItemActive_m3kE7">
                        <p class="b-list-item_text_K1ZUI">Información general</p>
                    </div>
                </li>
                <li data-testid="additional-info">
                    <div data-testid="Información adicional" class="b-list-item_item_e5SMN index_menuItem_ZFuFK">
                        <p class="b-list-item_text_K1ZUI">Información adicional</p>
                    </div>
                </li>
                <li data-testid="privacy">
                    <div data-testid="privacidad" class="b-list-item_item_e5SMN index_menuItem_ZFuFK">
                        <p class="b-list-item_text_K1ZUI">privacidad</p>
                    </div>
                </li>
            </ul>
            <div class="scrollable layout-with-side-menu_content_Q5C9O">
                <div class="index_tabContent_tnobM scrollable">
                {{-- contenido de pestañas --}}
                    {{-- info general --}}
                    <div class="index_wrapper_X2m39 index_tabContainer_Ji5zT">
                        {{-- imagen cliente --}}
                        <div class=" justify-content-center d-flex b-mb-4">
                            <div class="b-p-relative b-cursor-pointer">
                                <input type="file" accept="image/*" style="display: none;">
                                <div title=" " class="b-avatar_avatar_pJzSu" style="width: 76px; height: 76px; flex: 0 0 76px;">
                                    <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 28px;">  </div>
                                </div>
                                <div class="index_avatarEdit_IgKa1 b-flex b-justify-center b-items-center b-p-absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" role="img" class="b-icon"><path fill="currentColor" fill-rule="evenodd" d="M12 2a.9.9 0 0 1 .9.9v8.2h8.2a.9.9 0 0 1 0 1.8h-8.2v8.2a.9.9 0 1 1-1.8 0v-8.2H2.9a.9.9 0 1 1 0-1.8h8.2V2.9A.9.9 0 0 1 12 2Z" clip-rule="evenodd"></path></svg>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-groupInput mb-3">
                                <input onfocus="initCountLeathersTextArea()" onclick="initCountLeathersTextArea()" type="text" placeholder=" "
                                    class="gualazonF inputsNewService" id="nombreCliente001"
                                    value="{{ old('nombreServicio') }}" required
                                    name="nombreCliente001"
                                    onblur="verificarInput('titulo')"/>
                                <label for="nombreCliente001" class="styles_label_hleTI">Nombre</label>
                            </div>
                            <div class="form-groupInput mb-3">
                                <input onfocus="initCountLeathersTextArea()" onclick="initCountLeathersTextArea()" type="text" placeholder=" "
                                    class="gualazonF inputsNewService" id="apellidoCliente001"
                                    value="{{ old('nombreServicio') }}" required
                                    name="apellidoCliente001"
                                    onblur="verificarInput('titulo')"/>
                                <label for="apellidoCliente001" class="styles_label_hleTI">Apellido</label>
                            </div>
                            <div class="form-groupInput mb-3">
                                <input onfocus="initCountLeathersTextArea()" onclick="initCountLeathersTextArea()" type="text" placeholder=" "
                                    class="gualazonF inputsNewService" id="carnetNumeroCliente001"
                                    value="{{ old('nombreServicio') }}" required
                                    name="carnetNumeroCliente001"
                                    onblur="verificarInput('titulo')"/>
                                <label for="carnetNumeroCliente001" class="styles_label_hleTI">Número de identificación fiscal</label>
                            </div>
                            <div class="b-row">
                                <div class="b-col b-col-6">
                                    <div class="form-groupInput mb-3">
                                        <input onfocus="initCountLeathersTextArea()" onclick="initCountLeathersTextArea()" type="text" placeholder=" "
                                            class="gualazonF inputsNewService" id="descuentoCliente001"
                                            value="0%" required
                                            name="descuentoCliente001"
                                            onblur="verificarInput('titulo')"/>
                                        <label for="descuentoCliente001" class="styles_label_hleTI">Descuento cliente</label>
                                    </div>
                                </div>
                                <div class="b-col b-col-6 index_dropdown_yxIjB index_has--shadow_s6YH1 index_is--overlay_JG_3k index_trustedClient_psrIx b-mb-4">
                                    <div class="index_dropdown_yxIjB index_has--shadow_s6YH1 index_is--overlay_JG_3k index_trustedClient_psrIx b-mb-4" data-testid="trusted-client-select"><div class="index_toggle_sBt35"><div data-testid="select-dropdown-"><div class="styles_focusedOrFilled_dNjQS styles_size--md_sPOha styles_theme--default_x92vh styles_slotTheme--blank_iI8Uf styles_slotTheme--default_vYr1T" data-testid="select-input-"><div class="styles_outerWrapper_NumuG" style="min-width: 0px;"><div class="styles_labelWrapper_isbmo"><label class="styles_label_hleTI"> Cliente de confianza </label></div><div class="styles_wrapper_hb1CA"><input readonly value="No" placeholder="" id="uid-152-input" type="text" autocomplete="off" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none;"><div class="styles_slotRight_TkOzM"><i data-testid="select-input-toggle-" class="index_toggleIcon_EqQez"></i></div></div></div></div></div></div></div>
                                    <div class="index_content_Z_JCn index_position_FV9jY index_position--bottom-left_prIxb index_position--bottom-left_prIxb33">
                                        <div class="scrollable index_scrollable_qm3Zl index_scrollable_BtJqS">
                                            <ul class="list" style="padding: 0px;margin: 0px;">
                                                <li data-testid="dropdown-option-false">
                                                    <div class="index_defaultItem_pKlHs index_--selected_oUDGp index_--highlighted__3J43">
                                                        <div class="index_defaultItemInner_HCCY6"> No </div>
                                                    </div>
                                                </li>
                                                <li data-testid="dropdown-option-true">
                                                    <div style="border: none" class="index_defaultItem_pKlHs index_defaultItemLast_G_jYj">
                                                        <div class="index_defaultItemInner_HCCY6"> Sí </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div style="font-weight: 800;" class="b-heading-xs b-my-4"> Contacto </div>
                                <div>
                                    <div class="form-groupInput mb-3">
                                        <input onfocus="initCountLeathersTextArea()" onclick="initCountLeathersTextArea()" type="text" placeholder=" "
                                            class="gualazonF inputsNewService" id="telefonoCliente001"
                                            value="" required
                                            name="telefonoCliente001"
                                            onblur="verificarInput('titulo')"/>
                                        <label for="telefonoCliente001" class="styles_label_hleTI">Número de telefono</label>
                                    </div>
                                    <div class="form-groupInput mb-3">
                                        <input onfocus="initCountLeathersTextArea()" onclick="initCountLeathersTextArea()" type="text" placeholder=" "
                                            class="gualazonF inputsNewService" id="emailCliente001"
                                            value="" required
                                            name="emailCliente001"
                                            onblur="verificarInput('titulo')"/>
                                        <label for="emailCliente001" class="styles_label_hleTI">Email</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- info adicional --}}
                    <div class="index_tabContainer_Ji5zT">
                        <div style="font-weight: 800;" class="b-heading-xs b-my-4"> Cumpleaños </div>
                        <div class="b-row b-mb-6">
                            <div class="b-col b-col-6">
                                <div class="form-groupInput mb-3">
                                    <input onfocus="initCountLeathersTextArea()" onclick="initCountLeathersTextArea()" type="text" placeholder=" "
                                        class="gualazonF inputsNewService" id="cumpleCliente001"
                                        value="{{ old('nombreServicio') }}" required
                                        name="cumpleCliente001"
                                        onblur="verificarInput('titulo')"/>
                                    <label for="cumpleCliente001" class="styles_label_hleTI">Fecha</label>
                                </div>
                            </div>
                            <div class="main-box ubicacion-producto">
                                <div style="font-weight: 800;" class="b-heading-xs b-my-4"> Dirección </div>
                                <div class=" row tituloConMovimiento" >
                                    <div class=" col">
                                        <p class="title_flojo mt-2 mb-2">
                                            Añadir dirección
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" role="img" class="b-text-secondary b-ml-3"><path fill="currentColor" fill-rule="evenodd" d="M12 2a.9.9 0 0 1 .9.9v8.2h8.2a.9.9 0 0 1 0 1.8h-8.2v8.2a.9.9 0 1 1-1.8 0v-8.2H2.9a.9.9 0 1 1 0-1.8h8.2V2.9A.9.9 0 0 1 12 2Z" clip-rule="evenodd"></path></svg>
                                        </p>
                                    </div>
                                </div>
                                <div id="searchMap"></div>
                                <div id="map" style="">
                                </div>
                            </div>
                            <div class="b-col b-col-2">  </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

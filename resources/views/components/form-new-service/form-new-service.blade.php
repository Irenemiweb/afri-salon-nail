<div>
    <div class="upload-page" style="max-width: 870px;">
        <div class="list_header_BOVM0">
            <header class="paddingEnlace b-custom-header b-custom-header_header_oZL1I b-custom-header_headerPadding_gg5dx">
                <div class="b-custom-header_left b-custom-header_hasIcon_uCjMI b-custom-header_hasIconEllipsis_gYB6P b-custom-header_left_bWmRf">
                    <span style="font-size: 20px"
                          class="spanGotoback b-icon iconFont icon-nav-arrow-left b-custom-header_icon_XtAgm salirDeModificarServicio">
                    </span>
                    <div>
                        <div class="b-custom-header_headerTitle_ogW55 txt--ellipsis aniadirServicioTitle">
                            <span class="b-custom-header_title_GTxIs b-custom-header_wordBreakAll_U_pxk">
                                Añadir nuevo servicio.
                            </span>
                        </div>
                        <div class="d-none b-custom-header_headerTitle_ogW55 txt--ellipsis modificarServicioTitle">
                            <span class="b-custom-header_title_GTxIs b-custom-header_wordBreakAll_U_pxk">
                                Modificar servicio.hola
                            </span>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div class="step-vertical UploadStepVertical d-block">
            <form action="{{ route('servicio.create') }}" method="POST" id="formCreateNewService" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box image-product my-3">
                    <div class="row">
                    {{-- <div class="form-group mb-3"> --}}
                        <input type="hidden" id="categoriaSeleccionadaNewServiceInput" name="categoryService"  value="No categorizado">
                    {{-- </div> --}}
                    {{-- <div class="form-group mb-3"> --}}
                        <input type="hidden" id="colorSeleccionadaNewServiceInput" name="colorServicio" value="randomColor">
                        <input type="hidden" name="action" id="actionType" value="">
                        <input type="hidden" name="id_serviceModify" value="">
                    {{-- </div> --}}
                        <div class="col-12 col-md-12">
                            <div class="position-relative justify-content-between d-flex">
                                <label class="__title mt-2 mb-2" for="titulo">Información del servicio</label>
                            </div>
                            <div style="padding-right: 0px !important;" class=" justify-content-end d-flex">
                                <span class="chars-counter-nameService">0/50</span>
                            </div>
                            <div class="form-groupInput mb-3">
                                <input onfocus="initCountLeathersTextArea()" onclick="initCountLeathersTextArea()" type="text" placeholder=" " name="nombreServicio"
                                    class="gualazonF inputsNewService" id="nombreServicio"
                                    value="{{ old('nombreServicio') }}" required
                                    name="nombreServicio"
                                    onblur="verificarInput('titulo')"/>
                                <label for="nombreServicio" class="styles_label_hleTI">Nombre del servicio</label>
                            </div>
                        </div>
                    </div>
                    <div class=" row justify-content-between">
                        <div class="col-12 col-md-5 b-mb-5 index_colorPickerRow_nSucG">
                            <div class="index_dropdown_yxIjB index_has--shadow_s6YH1 index_is--overlay_JG_3k">
                                <div class="index_toggle_sBt35">
                                    <div class="select-dropdowColorService">
                                        <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_theme--default_x92vh styles_slotTheme--blank_iI8Uf styles_slotTheme--default_vYr1T">
                                            <div  onclick="openModalSelectColor()" style="min-width: 0px" class="styles_outerWrapper_NumuG">
                                                <div class="styles_labelWrapper_isbmo">
                                                    <label for="colorService" class="styles_label_hleTI">Color</label>
                                                </div>
                                                <div class="styles_wrapper_hb1CA justify-content-between">
                                                    <div class="styles_slotLeft_k29NgColores"  data-random-color-url="{{ asset('storage/colors_option/random-color.svg') }}">
                                                        <img data-color="randomColor" width="24px" style="height: 24px;" class="b-icon_img_I0kuC index_colorPicker_dCcsj" src="{{ asset('storage/colors_option/random-color.svg') }}" alt="colores">
                                                    </div>
                                                    <div class="styles_slotRight_TkOzM">
                                                        <i class="index_toggleIcon_EqQez"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- CATEGORIAS --}}
                        <div class="col-12 col-md-6 b-mb-5 index_colorPickerRow_nSucG">
                            <div class="index_dropdown_yxIjB index_has--shadow_s6YH1 index_is--overlay_JG_3k">
                                <div class="index_toggle_sBt35">
                                    <div>
                                        <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_theme--default_x92vh styles_slotTheme--blank_iI8Uf styles_slotTheme--default_vYr1T">
                                            <div onclick="abrirModalCategorias('.contenedorCategorias')" style="min-width: 0px" class="abrirContenedorCategorias styles_outerWrapper_NumuG">
                                                <div class="styles_labelWrapper_isbmo">
                                                    <label for="categoryservice" class="styles_label_hleTI">Categoria</label>
                                                </div>
                                                <div class="styles_wrapper_hb1CA justify-content-between">
                                                    <div class="styles_slotLeft_k29NgCategorias inputsNewService">
                                                        No categorizado
                                                    </div>
                                                    <div class="styles_slotRight_TkOzM">
                                                        <i class="index_toggleIcon_EqQez"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- desplegable categoia --}}
                                <div class="contenedorCategorias index_content_Z_JCn index_position_FV9jY index_position--bottom-left_prIxb" style="display: none">
                                    <div class="scrollable index_scrollable_qm3Zl index_scrollable_BtJqS" style="max-height: 150px;">
                                        <ul class="list listaCategoriasDesplegableConfig" style="padding-left: 0px!important">
                                            @foreach ($categoryService as $index => $categoria)
                                                {{-- elementos añadidos --}}
                                                <li>
                                                    <div data-index="{{ $categoria->id }}" data-category="{{ $categoria->categoria }}" class="index_defaultItem_pKlHs index_defaultItemLast_G_jYj">
                                                        <div class="index_defaultItemInner_HCCY6">
                                                            {{ $categoria->categoria }}
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-right: 0px !important;">
                        <div style="padding-right: 0px !important;">
                            <div class="label-flotante">
                                <label for="categoryservice" class="styles_label_hleTI">descripción</label>
                            </div>
                            <span class="chars-counterDescriptionService">0/640</span>
                        </div>
                        <div class="col-12" style="padding-right: 0px !important;">
                            <div class="form-group position-relative">
                                <textarea onclick="initCountLeathersTextArea()" required
                                          style="padding: 20px;"
                                          name="descripcionServicio"
                                          id="textAreaDescripcionService"
                                          cols="30" rows="10"
                                          onblur="verificarInput('textAreaDescripcion')"
                                          class="w-100">{{ old('descripcion') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="b-mt-4 mb-3">
                            <div class="b-mt-4">
                                <div>
                                    <input id="imagesCreateNewService" type="file" class="filepond imageService" credits="false" multiple name="image"
                                    data-allow-reorder="true" data-max-files="10" data-style-item-panel-aspect-ratio="0.8625">
                                </div>
                            </div>
                        </div>
                        {{-- @if ($images)
                            <div class="image-preview">
                                @foreach ($images as $image)
                                    <img src="{{ $image->temporaryUrl() }}" alt="Previsualización de imagen" style="width: 100px; height: 100px;"/>
                                @endforeach
                            </div>
                        @endif --}}
                    </div>
                    {{-- PRECIO Y DURACIÓN --}}
                    <div class="b-pb-5">
                        <h2 class="size--16-sb margin-bottom-12">
                             Precio / duración
                        </h2>
                        <div class="margin-bottom-16 variant-form_formContainer_qWlhd variant-form_formRow_UGP5l">
                            {{-- <div class="row items-start margin-left-4"> --}}
                                {{-- <div class="col col-md-5 col-xs-12 col-sm-12"> --}}
                                    <div class=" justify-content-between b-select-duration_wrapper_r8WEh row variant-form_formRow_UGP5l mb-3">
                                        <div class="col-12 col-md-5">
                                            <div class="index_dropdown_yxIjB index_has--shadow_s6YH1 index_is--overlay_JG_3k b-select-duration_select_f9p18">
                                                <div class="index_toggle_sBt35">
                                                    <div data-testid="select-dropdown-">
                                                        <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_size--md_sPOha styles_theme--default_x92vh styles_slotTheme--blank_iI8Uf styles_slotTheme--default_vYr1T" data-testid="select-input-">
                                                            <div onclick="abrirModalCategorias('.contenedorHoras')" class="styles_outerWrapper_NumuG" style="min-width: 0px;">
                                                                <div class="styles_labelWrapper_isbmo">
                                                                    <label class="styles_label_hleTI"> hora(s) </label>
                                                                </div>
                                                                <div class="styles_wrapper_hb1CA justify-content-between">
                                                                    <div class="styles_slotLeft_k29NgHoras inputsNewService">
                                                                        0h
                                                                    </div>
                                                                    <div class="styles_slotRight_TkOzM">
                                                                        <i class="index_toggleIcon_EqQez"></i>
                                                                    </div>
                                                                </div>
                                                                <input  name="horaNewService" value="0h" placeholder="" id="horaNewServiceInput" type="hidden" autocomplete="off" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none;">
                                                                {{-- <div class="styles_wrapper_hb1CA">
                                                                    <input name="horaNewService" value="0h" placeholder="" id="horaNewServiceInput" type="text" autocomplete="off" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none;">
                                                                    <div class="styles_slotRight_TkOzM">
                                                                        <i data-testid="select-input-toggle-" class="index_toggleIcon_EqQez"></i>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- desplegable horas --}}
                                                <div class="contenedorHoras index_content_Z_JCn index_position_FV9jY index_position--bottom-left_prIxb" style="display:none">
                                                    <div class="scrollable index_scrollable_qm3Zl index_scrollable_BtJqS" style="max-height: 150px;">
                                                        <ul class="list" style="padding-left: 0px!important">
                                                            @foreach ($tiempoServicio as $index => $tiempo)
                                                            {{-- elementos añadidos --}}
                                                            <li>
                                                                @if ($tiempo === '0h')
                                                                    <div data-time="{{ $tiempo }}" class="index_defaultItem_pKlHs index_defaultItemLast_G_jYj index_--selected_oUDGp index_--highlighted__3J43">
                                                                        <div class="index_defaultItemInner_HCCY6">
                                                                            {{ $tiempo }}
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div data-time="{{ $tiempo }}" class="index_defaultItem_pKlHs index_defaultItemLast_G_jYj">
                                                                        <div class="index_defaultItemInner_HCCY6">
                                                                            {{ $tiempo }}
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
                                        <div class="col-12 col-md-5">
                                            <div class="index_dropdown_yxIjB index_has--shadow_s6YH1 index_is--overlay_JG_3k b-select-duration_select_f9p18">
                                                <div class="index_toggle_sBt35">
                                                    <div data-testid="select-dropdown-">
                                                        <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_size--md_sPOha styles_theme--default_x92vh styles_slotTheme--blank_iI8Uf styles_slotTheme--default_vYr1T" data-testid="select-input-">
                                                            <div onclick="abrirModalCategorias('.contenedorMinutos')" class="styles_outerWrapper_NumuG" style="min-width: 0px;">
                                                                <div class="styles_labelWrapper_isbmo">
                                                                    <label class="styles_label_hleTI">
                                                                    Minutos
                                                                    </label>
                                                                </div>
                                                                <div class="styles_wrapper_hb1CA justify-content-between">
                                                                    <div class="styles_slotLeft_k29NgMinutos inputsNewService">
                                                                        30min
                                                                    </div>
                                                                    <div class="styles_slotRight_TkOzM">
                                                                        <i class="index_toggleIcon_EqQez"></i>
                                                                    </div>
                                                                </div>
                                                                <input name="minutosNewService" value="30min" placeholder="" id="minutosNewServiceInput" type="hidden" autocomplete="off" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 {{-- desplegable minutos --}}
                                                 <div class="contenedorMinutos index_content_Z_JCn index_position_FV9jY index_position--bottom-left_prIxb" style="display:none">
                                                    <div class="scrollable index_scrollable_qm3Zl index_scrollable_BtJqS" style="max-height: 150px;">
                                                        <ul class="list" style="padding-left: 0px!important">
                                                            @foreach ($minutoService as $index => $minuto)
                                                            {{-- elementos añadidos --}}
                                                            <li>
                                                                <div data-time="{{ $minuto }}" class="index_defaultItem_pKlHs index_defaultItemLast_G_jYj">
                                                                    <div class="index_defaultItemInner_HCCY6">
                                                                        {{ $minuto }}
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- </div> --}}
                                <div class="row justify-content-between">
                                    <div class="col-12 col-md-5" style="">
                                        <div class="index_dropdown_yxIjB index_has--shadow_s6YH1 index_is--overlay_JG_3k">
                                            <div class="index_toggle_sBt35">
                                                <div data-testid="select-dropdown-">
                                                    <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_size--md_sPOha styles_theme--default_x92vh styles_slotTheme--blank_iI8Uf styles_slotTheme--default_vYr1T" data-testid="select-input-">
                                                        <div onclick="abrirModalCategorias('.contenedorTipoPrecio')" class="styles_outerWrapper_NumuG" style="min-width: 0px;">
                                                            <div class="styles_labelWrapper_isbmo">
                                                                <label class="styles_label_hleTI"> Tipo de precio </label>
                                                            </div>
                                                            <div class="styles_wrapper_hb1CA justify-content-between">
                                                                <div class="styles_slotLeft_k29NgTipoPrecio inputsNewService">
                                                                    Fijo
                                                                </div>
                                                                <div class="styles_slotRight_TkOzM">
                                                                    <i class="index_toggleIcon_EqQez"></i>
                                                                </div>
                                                            </div>
                                                            <input name="tipoPrecioNewService" value="Fijo" placeholder="" id="tipoPrecioNewServiceInput" type="hidden" autocomplete="off" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             {{-- desplegable tipoPrecio --}}
                                             <div class="contenedorTipoPrecio index_content_Z_JCn index_position_FV9jY index_position--bottom-left_prIxb" style="display:none">
                                                <div class="scrollable index_scrollable_qm3Zl index_scrollable_BtJqS" style="max-height: 150px;">
                                                    <ul class="list" style="padding-left: 0px!important">
                                                        @foreach ($tipoPrecio as $index => $tipo)
                                                        {{-- elementos añadidos --}}
                                                        <li>
                                                            <div data-time="{{ $tipo }}" class="index_defaultItem_pKlHs index_defaultItemLast_G_jYj">
                                                                <div class="index_defaultItemInner_HCCY6">
                                                                    {{ $tipo }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5" style="padding-top: calc(.7rem* .5);">
                                        <div class="form-groupInput divPrecio">
                                            <input type="text" placeholder=" "
                                                class="gualazonF inputsNewService" id="precioServicio"
                                                value="{{ old('nombreServicio') }}" required
                                                name="precioServicio"
                                                maxlength="9"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
                                                if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                onblur="verificarInput('titulo')"/>
                                            <label for="precioServicio" class="styles_label_hleTI">Precio</label>
                                        </div>
                                        {{-- <div class="styles_slotLeft_k29Ng">
                                            <div> € </div>
                                        </div> --}}
                                    </div>
                                </div>

                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
                {{-- boton grande --}}
                <div class="d-grid gap-2 botonCrearServicio">
                    <button onclick="setAction('create')" type="submit" class="btn btn-lg btn-dark" id="submitCreateNewService">Crear servicio</button>
                </div>
                <div class="paddingEnlace row d-none botonModificarServicio justify-content-between">
                    <div class="col-lg-4 col-md-12 mb-2 d-grid gap-2">
                        <button onclick="setAction('modify')" type="submit" class="btn btn-lg btn-dark w-100" id="submitModifyService">Modificar servicio</button>
                    </div>
                    <div class="col-lg-3 col-md-12 mb-2 d-grid gap-2">
                        <button onclick="setAction('delete')" style="border: 1px solid #c7cbd4;" type="submit" class="btn btn-lg btn-light w-100" id="submitDeleteService">
                            @include('iconos.icon-papeleraRoja')
                        </button>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-2 d-grid gap-2">
                        <button style="border: 1px solid #c7cbd4;" type="button" class="btn btn-lg btn-light w-100" id="cancelModifyService">Cancelar</button>
                    </div>
                </div>
                {{-- @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif --}}
                {{-- @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif --}}
            </form>
            <!-- Al final del layout Blade, justo antes de cerrar el body -->


        </div>
        {{-- modal colores --}}
        <div class="contenedorColores flex b-modal_modal_oXOJl align-items-center justify-content-center" style="z-index: 10001;display:none">

            <div class="modal__body color-picker-modal_modalContainer_vZhAJ">

                <header style="background-color: white" class="b-custom-header b-custom-header_header_oZL1I">
                    <div class="b-custom-header_left b-custom-header_hasIcon_uCjMI b-custom-header_hasIconEllipsis_gYB6P b-custom-header_left_bWmRf">
                        <span onclick="xcerrarModal()" style="font-size: 32px" class="xcerrarModal b-icon iconFont icon-x b-custom-header_icon_XtAgm">

                        </span>
                        <div>
                            <div class="b-custom-header_headerTitle_ogW55 txt--ellipsis">
                                <span class="b-custom-header_title_GTxIs b-custom-header_wordBreakAll_U_pxk"> Color del servicio </span>
                            </div>
                        </div>
                    </div>
                    <div class="b-custom-header_right b-custom-header_right_uT_uU">
                        {{-- vacio --}}
                    </div>
                </header>
                <div class="modal__content color-picker-modal_modalContent_XH_tY color-picker-modal_size--14_bh5Mo">
                    {{-- colorRamdom --}}
                    <div class="color-picker-modal_formContainer_Br2Mf">
                        {{-- clic en imagen color ramdom --}}
                        <img onclick="colorSeleccionadoNewService('randomColor')" data-color="randomColor" src="{{ asset('storage/colors_option/random-color.svg') }}" class="b-icon_img_I0kuC color-picker-modal_serviceColorTile_mt88Y" width="80px" style="height: 80px;">
                        <div class="color-picker-modal_formTextContainer_mBMSo">
                            <p class="color-picker-modal_formText_ltikK color-picker-modal_size--14_bh5Mo">
                                Color del servicio predeterminado
                            </p>
                            <p class="color-picker-modal_formHint_XLmiu color-picker-modal_size--14_bh5Mo">
                                Si no seleccionas ningún color se configurará un color para el servicio de forma automática.
                            </p>
                        </div>
                    </div>
                    {{-- resto de colores --}}
                    <div class="color-picker-modal_colorsGrid_xBCsP">
                        @foreach ($colorServicio as $index => $color)
                            <span onclick="colorSeleccionadoNewService('{{ $color->color }}', this);"  data-color="{{ $color->color }}"
                                class="color-picker-modal_serviceColorTile_mt88Y"
                                style="background-color: {{ $color->color }};">
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


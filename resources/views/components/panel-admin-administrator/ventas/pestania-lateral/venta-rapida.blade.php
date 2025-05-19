<div class="index_basketWrap_Uiqyr">
    {{-- <x-panel-admin-administrator.ventas.modales.modal-modificar-articulo> --}}
    {{-- <x-panel-admin-administrator.ventas.modales.modal-descuento-total> --}}
        {{-- @component('components.panel-admin-administrator.ventas.modales.modal-modificar-articulo')
    @endcomponent --}}
    {{-- modal modificar articulo --}}


    <div class="column h-100">
        <div data-v-step="3">
            <div class="txt--uppercase size--12 color-08 margin-bottom-16">Artículos más populares</div>

            <div class="padding-bottom-16">
                <div class="row popular-list_popularList_zAgDk">
                    @foreach ($allServices as $index => $servicio )
                        <div data-date="popular-list-item-{{ $index }}" class="col col-4">
                            <div class="">
                                <div onclick="workAsig002('{{ $servicio->id }}', '{{ $index }}', '{{ $servicio->precio }}')" class="service-variant_item_Cye7B checkout_basket-box_OtCE_" data-bs-toggle="modal" data-bs-target="#asignarVenta{{ $index }}">
                                    <div class="service-variant_serviceBorder_QPWGf" style="border-color: {{ $servicio->borderColor }}"></div>
                                    <div class="service-variant_contentWrap_hb8Rv">
                                        <div class="service-variant_itemName_SAYjs service-variant_size--14_gDNQP checkout_basket-box-name_UM3aK">
                                            {{ $servicio->descripcion }}
                                        </div>
                                        <div class="service-variant_itemDetails_c0igA service-variant_size--12_dc9MV">
                                            <span class="duration">
                                                @if ($servicio->horaNewService > 0)
                                                    @if ($servicio->minutosNewService == 0)
                                                        {{ $servicio->horaNewService }}h
                                                    @else
                                                        {{ $servicio->horaNewService }}h {{ $servicio->minutosNewService }}min
                                                    @endif
                                                @else
                                                    {{ $servicio->minutosNewService }}min
                                                @endif
                                            </span>
                                        </div>
                                        <div class="size--16-sb items-end">{{$servicio->precio}}€</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          {{-- modal asignar venta --}}
                        <div class="modal fade" id="asignarVenta{{ $index }}" tabindex="-1" aria-labelledby="asignarVentaModalLabel" aria-hidden="true" data-idService="{{ $servicio->id }}">
                            <div class="modal-dialog">
                                <div class=" modal-content">
                                    <div class="modal-body modal__body common_modal_brpwf"  style="width: 600px;">
                                        <div class="modal__header">
                                            <header>
                                                <span data-bs-dismiss="modal" aria-label="Close" class="b-cursor-pointer b-icon iconFont icon-x" data-date="header-icon" style="font-size: 32px;"></span>
                                                <h1 data-date="header-title"> Asignar venta </h1>
                                            </header>
                                        </div>
                                        <div class="modal__content">
                                            <div>
                                                <div>
                                                    <div class=" w-100 padding-top-48">
                                                        <div class="row" style="margin-left: -2px;">
                                                            <div class="col txt--left">
                                                                <span class="size--10 color-08 txt--uppercase">Artículo</span>
                                                            </div>
                                                        </div>
                                                        <hr class="margin-top-4 margin-bottom-12">
                                                        <ul style="padding-left: 0px;">
                                                            <li>
                                                                <div class="row items-center txt--left" style="margin-left: -4px;">
                                                                    <div class="col">
                                                                        <div class="staff-commission-modal_serviceBorder_abb67" style="border-color:{{ $servicio->borderColor }};">
                                                                            <div class="size--14">
                                                                                    {{ $servicio->descripcion }}
                                                                                @if ($servicio->horaNewService > 0)
                                                                                    ({{ $servicio->horaNewService }}h {{ $servicio->minutosNewService }}min)
                                                                                @else
                                                                                    ({{ $servicio->minutosNewService }}min)
                                                                                @endif
                                                                            </div>
                                                                            <div class="size--12 color-08"> {{ $servicio->precio }}€ </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col col-5">
                                                                        <div class="b-dropdown_dropdown_SqLbd">
                                                                            <div>
                                                                                <label class="size--12 color-08 select-staffer_label_tsQBi"> Empleado </label>
                                                                                <div data-date="staffer-select-opendropdown" class="select-staffer_stafferInputSelect_Diw1V" onclick="openModalEmpleA('{{ $index }}')">
                                                                                    <div title="No hay asignación de personal" class="titleEmpleadoA{{ $index }} padding-0 b-avatar_avatar_pJzSu b-avatar_avatarHasImage_i8yay" style="width: 40px; height: 40px; flex: 0 0 40px;">
                                                                                        <div class="b-avatar_avatarImage_u3RVD" style="background-image: url(https://d10n9ka7jp2kfo.cloudfront.net/pro/dc6927ba/img/no-staffer.79c3c577.svg);"></div>
                                                                                    </div>
                                                                                    <div data-index="cualquiera" class="nombreEmpleadoA{{ $index }} margin-left-8 size--16 txt--ellipsis size--16-sb"> No hay asignación de personal </div>
                                                                                    <span class="margin-left-auto b-icon iconFont icon-arrow-down"></span>
                                                                                </div>
                                                                            </div>
                                                                            {{-- desplegable empleados 2--}}
                                                                            <div style="top: 70px;" class="d-none b-dropdown_body_ZYrNH b-dropdown_position-bottom-right_TGiDy droponAbrirEmpleA{{ $index }} " data-index="{{ $index }}">
                                                                                <div class="b-dropdown_content_ewBMO">
                                                                                    <div class="select-staffer_staffersDropdown_CC3_Z">
                                                                                        @foreach ($empleados as $index2 =>$empleado )
                                                                                            <div class="select-staffer_highlight_tt5tB" data-date="select-staffer-id-187824">
                                                                                                <div data-index="{{ $empleado->id }}" class="padding-12 select-staffer_staffer_qp27E" onclick="selectEmpleAMark('{{ $index }}', '{{ $empleado->nombre }} {{ $empleado->primerApellido }}', this, '{{ $empleado->id }}')">
                                                                                                    <div title="{{ $empleado->nombre}} {{ $empleado->primerApellido }}" class="padding-0 b-avatar_avatar_pJzSu" style="width: 40px; height: 40px; flex: 0 0 40px;">
                                                                                                        @if ($empleado->nombre === 'África')
                                                                                                            <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px;"> ÁP </div>
                                                                                                        @else
                                                                                                            <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px;"> MÁ </div>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                    <div class="margin-left-8 size--16-sb txt--ellipsis"> {{ $empleado->nombre }} {{ $empleado->primerApellido }}</div>
                                                                                                    {{-- al clicar insertamos el span que es el tick --}}
                                                                                                </div>
                                                                                            </div>
                                                                                        @endforeach
                                                                                        <div class="select-staffer_highlight_tt5tB">
                                                                                            <div data-index="cualquiera" class="padding-12 select-staffer_staffer_qp27E" onclick="selectEmpleAMark('{{ $index }}', 'No hay asignación de personal', this, 'cualquiera')">
                                                                                                <div title="No hay asignación de personal" class="padding-0 b-avatar_avatar_pJzSu b-avatar_avatarHasImage_i8yay" style="width: 40px; height: 40px; flex: 0 0 40px;">
                                                                                                    <div class="b-avatar_avatarImage_u3RVD" style="background-image: url(https://d10n9ka7jp2kfo.cloudfront.net/pro/dc6927ba/img/no-staffer.79c3c577.svg);"></div>
                                                                                                </div>
                                                                                                <div class="margin-left-8 size--16 color-07 txt--ellipsis"> No hay asignación de personal </div>
                                                                                                <span class="margin-left-auto b-icon iconFont icon-tick" style="font-size: 24px;"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr class="margin-top-12 margin-bottom-12">
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="margin-top-68">
                                                        <div class="flex padding-top-12">
                                                            <div class="b-confirm_container_EQ68J b-confirm_reverse_o9BL7 w-100 staff-commission-modal_confirmContainer_S6zBk">
                                                                <button data-bs-dismiss="modal" onclick="insertDateService('{{ $servicio->id }}', '{{ $index }}', '{{ $servicio->precio }}')" id="uid-164-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt b-confirm_button_IBwA3 b-confirm_confirmButton_pGIAs" data-date="confirm-btn">
                                                                    <div class="index_caption_W6r_J">Guardar</div>
                                                                </button>
                                                                <button data-bs-dismiss="modal" id="" class="index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--default_pktIt b-confirm_button_IBwA3 b-confirm_cancelButton_qqGj3" data-date="cancel-btn">
                                                                    <div class="index_caption_W6r_J">Cancelar</div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="staff-commission-modal_inputCheckbox_o1PHa" style="font-size: small;">
                <label for="uid-288-dont-ask-again" class="input-checkbox_container_mDORR">
                    <div class="input-checkbox_wrapper_NqLQ_">
                        <input id="uid-288-dont-ask-again" type="checkbox" name="dont-ask-again" class="input-checkbox_realCheck_gWLaj" value="false">


                        <div class="input-checkbox_replacement_dMLsR">
                            <span class="b-icon iconFont icon-tick input-checkbox_tick_tp1sR" style="font-size: 20px;"></span>
                        </div>
                        <span class="input-checkbox_label_JiaJg"></span>
                    </div>
                </label>
                No volver a mostrar la ventana asignación empleado (puedes editar las asignaciones de venta haciendo clic en cada uno de los artículos del carrito)
            </div>
        </div>
    </div>
</div>

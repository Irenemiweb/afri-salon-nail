<div class="col col-12" style="padding-bottom: calc(1.5rem* 1);">
    <div class="index_dropdown_yxIjB index_has--shadow_s6YH1 index_is--overlay_JG_3k b-select-duration_select_f9p18">
        <div class="index_toggle_sBt35">
            <div data-testid="select-dropdown-">
                <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_size--md_sPOha styles_theme--default_x92vh styles_slotTheme--blank_iI8Uf styles_slotTheme--default_vYr1T" data-testid="select-input-">
                    <div onclick="abrirModalCategorias('.{{ $data['contenedor'] }}')" class="{{ $data['botonClic'] }} styles_outerWrapper_NumuG" style="min-width: 0px;">
                        <div class="styles_labelWrapper_isbmo">
                            <label class="styles_label_hleTI">Empleado </label>
                        </div>
                        <div class="styles_wrapper_hb1CA justify-content-between">
                            <div class="{{ $data['visualizadorNombreEmple'] }} {{ $data['slotLeft_k29'] }} inputsNewService visualizadorNombreEmpleado" data-empleid="cualquiera">Selecciona Empleado</div>
                            <div class="styles_slotRight_TkOzM">
                                <i class="index_toggleIcon_EqQez"></i>
                            </div>
                        </div>
                        <input  name="horaFin" value="" placeholder="" id="{{ $data['input'] }}" type="hidden" autocomplete="off" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none;">
                    </div>
                </div>
            </div>
        </div>
        {{-- desplegable Empleados --}}
        <div id="{{ $data['id_desplegableEmpleado'] }}" class="{{ $data['contenedor'] }} index_content_Z_JCn index_position_FV9jY index_position--bottom-left_prIxb" style="display:none">
            <div class="scrollable index_scrollable_qm3Zl index_scrollable_BtJqS" style="">
                @foreach ($empleadas as $empleada)
                    <div data-staffer="{{ $empleada->id }}" data-empId="{{ $empleada->id }}" style="padding-top: 0.5rem;padding-bottom: 1rem;cursor:pointer">
                        <div class="empleadoCambiarCursor" onclick="selectEmpleadoAdd(this, {{ $empleada->id }}, '{{ $empleada->nombre }}' , '.{{ $data['visualizadorNombreEmple'] }}', {{ $data['id_desplegableEmpleado'] }})">
                            <div class="row items-center">
                            <div class="col-auto">
                                <div data-empleadaNombre="{{ $empleada->nombre }}" class="avatarEmpleadoAdd avatar-md avatar-rounded"style="background-image: url('{{ asset('storage/' . $empleada->img_empleada) }}');">
                                </div>
                            </div>
                            <div class="col-10">
                                <span style="margin-left: 10px;" class="text-h4 mb-xs empleadoNombre">{{ $empleada->nombre }}</span>
                                <div class="subtext">
                                    {{-- <span>Esteticista</span>
                                    <span>
                                        <span>
                                            <span> • </span>
                                        </span> Disponible
                                    </span> --}}
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

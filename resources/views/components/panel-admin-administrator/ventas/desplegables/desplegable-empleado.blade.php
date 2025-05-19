{{-- modal desplegable empleados boton cambiar --}}
<div class="modal fade" id="droponAbrirEmpleBotonCambiar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="droponAbrirEmpleBotonCambiarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          {{-- desplegable empleados 1--}}
            <div style="top: 15rem;" class=" b-dropdown_body_ZYrNH b-dropdown_position-bottom-right_TGiDy">
                <div class="b-dropdown_content_ewBMO">
                    <div class="select-staffer_staffersDropdown_CC3_Z">
                        @foreach ($empleados as $index2 =>$empleado )
                            <div class="select-staffer_highlight_tt5tB" data-date="select-staffer-id-187824">
                                <div class="padding-12 select-staffer_staffer_qp27E" data-bs-dismiss="modal" onclick="selectEmpleBotonCambiar('{{ $empleado->nombre}} {{ $empleado->primerApellido}}', '{{ $empleado->id }}')">
                                    <div title="{{ $empleado->nombre}} {{ $empleado->primerApellido }}" class="padding-0 b-avatar_avatar_pJzSu" style="width: 40px; height: 40px; flex: 0 0 40px;">
                                        @if ($empleado->nombre === 'África')
                                            <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px;"> ÁP </div>
                                        @else
                                            <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px;"> MÁ </div>
                                        @endif
                                    </div>
                                    <div class="margin-left-8 size--16-sb txt--ellipsis"> {{ $empleado->nombre }} {{ $empleado->primerApellido }}</div>
                                </div>
                            </div>
                        @endforeach
                        <div class="select-staffer_highlight_tt5tB sinAsignacionEmpleado">
                            <div class="padding-12 select-staffer_staffer_qp27E"  data-bs-dismiss="modal" onclick="selectEmpleBotonCambiar('No hay asignación de personal', 'cualquiera')">
                                <div title="No hay asignación de personal" class="padding-0 b-avatar_avatar_pJzSu b-avatar_avatarHasImage_i8yay" style="width: 40px; height: 40px; flex: 0 0 40px;">
                                    <div class="b-avatar_avatarImage_u3RVD" style="background-image: url(https://d10n9ka7jp2kfo.cloudfront.net/pro/dc6927ba/img/no-staffer.79c3c577.svg);"></div>
                                </div>
                                <div class="margin-left-8 size--16 color-07 txt--ellipsis">No hay asignación de personal</div>
                                <span class="margin-left-auto b-icon iconFont icon-tick" style="font-size: 24px;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>

<div>
    <div class="container offcanvas offcanvas-bottom p-0" data-bs-backdrop="static" tabindex="-1" id="offcanvasBottomSelectEmpleado" aria-labelledby="offcanvasBottomLabelSelectEmpleado">
        <div class="offcanvas-header mb-3">
            <button type="button" class="offcanvasBottomCategory btn-close" data-bs-dismiss="offcanvas" aria-label="Close" onclick="showElement('.navbarAdminPanel');showElement('.footer')"></button>
            <h5 style="font-weight: bold; float: right;" class="offcanvas-title" id="offcanvasBottomLabelSelectEmpleado">{{ $principal }}</h5>
        </div>
        <div id="scroll-menu-categoryBottonEmpleado" class="offcanvas-body small scroll-menu-category inputsCategoriasSecundarias" style="padding: 0px!important">
            <ul class="list-group list-group-flush" style="padding-left: 1rem; padding-right: 1rem;">
                @foreach ($empleados as $index => $empleado)
                    @php
                        $Hombre_mujer = ($item === 'Mujer') ? 'Mujer' : 'Hombre';
                    @endphp
                    @component('components.off-canvas.li-arrow', [
                        'name' => $item,
                        'open_offCanvas' => "{$openOffCanvas}{$index}"
                    ])
                    @endcomponent
                @endforeach
            </ul>
        </div>
    </div>
</div>

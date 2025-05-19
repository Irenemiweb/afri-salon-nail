<div class="container offcanvas offcanvas-bottom p-0" data-bs-backdrop="static" tabindex="-1" id="offcanvasBottom{{ $id }}" aria-labelledby="offcanvasBottomLabel{{ $id }}">
    <div class="offcanvas-header mb-3">
        <button type="button" class="offcanvasBottomCategory btn-close" data-bs-dismiss="offcanvas" aria-label="Close" onclick="showElement('.navbarAdminPanel');showElement('.footer')"></button>
        <h5 style="font-weight: bold; float: right;" class="offcanvas-title" id="offcanvasBottomLabel{{ $id }}">{{ $principal }}</h5>
    </div>
    <div id="scroll-menu-categoryBotton" class="offcanvas-body small scroll-menu-category inputsCategoriasSecundarias" style="padding: 0px!important">
        <ul class="list-group list-group-flush" style="padding-left: 1rem; padding-right: 1rem;">
            @foreach ($items as $index => $item)
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

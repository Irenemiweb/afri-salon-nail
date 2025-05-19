<div class="container offcanvas offcanvas-bottom p-0" data-bs-backdrop="static" tabindex="-1" id="category_list_{{ $id }}" aria-labelledby="offcanvasBottomLabel{{ $id }}">
    <div class="offcanvas-header mb-3">
        <button type="button" class="offcanvasBottomCategory btn-close" data-bs-dismiss="offcanvas" aria-label="Close" onclick="showElement('.navbarAdminPanel');showElement('.footer')"></button>
        <h5 style="font-weight: bold; float: right;" class="offcanvas-title" id="offcanvasBottomLabel{{ $id }}">{{ $title }}</h5>
    </div>
    <div id="scroll-menu-categoryBotton" class="offcanvas-body small scroll-menu-category inputsCategoriasSecundarias" style="padding: 0px!important">
        <ul class="list-group list-group-flush" style="padding-left: 1rem; padding-right: 1rem;">
            @foreach ($items as $index => $item)
                @component('components.off-canvas.li-input', ['name' => $item]) @endcomponent
            @endforeach
        </ul>
    </div>
    <button onclick="guardarCambios('{{ $principal }}', '{{ $category }}', '{{ $subcategory }}')" type="button" class="btn btn-dark btn-lg btn-block m-3">{{ __('Save') }}</button>
</div>


<li class="list-group-item p-2 category-list-option align-items-center arrowLi"
    style="cursor: pointer;"
    data-category-name="{{ $name }}"
    onclick="abrirOffcanvas('{{ $open_offCanvas }}')">
    <div style="white-space: 30px"></div>
    <span class="ms-3">{{ $name }}</span>
    @include('elementos.arrow-left-offcanvas')
</li>

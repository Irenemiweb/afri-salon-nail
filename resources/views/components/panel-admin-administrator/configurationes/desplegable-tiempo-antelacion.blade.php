<div style="display:none" class="contenedorTiempoAntelacion index_content_Z_JCn index_position_FV9jY index_position--bottom-left_prIxb">
    <div class="scrollable index_scrollable_qm3Zl index_scrollable_BtJqS" style="max-height: 150px;">
        <ul style="padding:0px" class="list">
            @foreach ($tiemposAntelacion as $index => $tiempo)
                <li class="liTiempoAntelacion">
                    <div  data-antelacion="{{ $tiempo->tiempo }}" data-testid="{{ $tiempo->id }}" class="index_defaultItem_pKlHs">
                        <div class="index_defaultItemInner_HCCY6">
                            {{ $tiempo->tiempo }} hola
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>
</div>

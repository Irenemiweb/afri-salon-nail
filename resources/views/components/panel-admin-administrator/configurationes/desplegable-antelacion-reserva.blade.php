<div style="display:none" class="contenedorAntelacionReserva index_content_Z_JCn index_position_FV9jY index_position--bottom-left_prIxb">
    <div class="scrollable index_scrollable_qm3Zl index_scrollable_BtJqS" style="max-height: 150px;">
        <ul style="padding:0px" class="list">
            @foreach ($antelacionReserva as $index => $antelacion)
                <li class="liAntelacionReserva">
                    <div data-antelacion="{{ $antelacion }}" data-index="{{ $index }}" class="index_defaultItem_pKlHs">
                        <div class="index_defaultItemInner_HCCY6">
                            {{ $antelacion }}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

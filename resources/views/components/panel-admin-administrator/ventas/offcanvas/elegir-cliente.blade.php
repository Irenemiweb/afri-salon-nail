<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasSelectClient" aria-labelledby="offcanvasSelectClientLabel" data-bs-backdrop="false">
    <div class="offcanvas-header d-flex">
        <div><div data-testid="header" class="b-custom-header_headerTitle_ogW55 txt--ellipsis"><span class="b-custom-header_title_GTxIs b-custom-header_wordBreakAll_U_pxk"> Seleccionar un cliente </span></div></div>
      <button onclick="actionButoncloseOffcanvasSelectClient('inputSearchClient2')" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" style="padding: 0px;">
        <div class="customers_customers_s2MPL basket-layout_customerSearchBar_Xs88N" iscustomersrequired="true">
            <div class="customers_search_qPU6u" style="margin: 0px;box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                <div style="padding: 0 10px;" class="styles_container_pjyTj styles_size--sm_dOZPQ styles_theme--filled_LnEz6 styles_theme--default_x92vh b-input-search_field_enuVF customers_searchInput_x0x6f">
                    <?php
                        $id_inputSearchClient = 'inputSearchClient2';
                        // $onkeyup='buscar("#inputSearchClient2")';
                    ?>
                    <x-buscador.buscador :id_inputSearchClient="$id_inputSearchClient"/>
                </div>
            </div>
            <div class="customers_searchResultsWrapper_H0kWh">
                <div class="customers_searchResults_Gy02W">
                    <div class="b-inifinite-scroll b-infinite-scroll_scrollable_X8X5F customers_searchResultsVirtual_BdNqf scrollable">
                        <div class="b-infinite-scroll_content_uwl9t">
                            {{-- <div data-testid="customers-add-new-client" class="customers_new_OxCLC" style="padding: 1rem">
                                <span class="b-icon iconFont icon-plus customers_newIcon_tltjy" style="font-size: 20px;"></span> Añadir nuevo cliente
                            </div> --}}
                            @foreach ($clientes as $index =>$cliente )
                            <div>
                                <div data-index="{{ $cliente->id }}" data-testid="customer-el-list-item5569" class="item_client0202 pointer customer-el-list-item5569" onclick="funcionClicTrajeta2(this)">
                                    <div class="customer-el-list_searchItem_mnR8f">
                                        <div title="{{ $cliente->name }} {{ $cliente->primer_apellido }}" class="b-avatar_avatar_pJzSu" style="width: 40px; height: 40px; flex: 0 0 40px;">
                                            <div class="b-avatar_avatarInitials_W2DQ5" style="font-size: 16px;">{{$iniciales[$index]}}</div>
                                        </div>
                                        <div class="customer-el-list_searchItemName_LLoTq customer-el-list_size--16_uLvgO" style="font-size: 1rem;font-weight: 500;line-height: 1.5em;">
                                            <div class="txt--ellipsis">{{ $cliente->name }} {{ $cliente->primer_apellido }}</div>
                                        </div>
                                        <div class="flex">
                                            <div data-testid="" class="customer-badges_badge_rfhlR">
                                                <span class="b-icon iconFont customer-badges_badgeIcon_oMcz7" data-testid="" style="font-size: 11px;"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="b-infinite-scroll_detectorWrapper_fUQYx">
                                <div class="b-infinite-scroll_detector_bvPUz" style="height: 10px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

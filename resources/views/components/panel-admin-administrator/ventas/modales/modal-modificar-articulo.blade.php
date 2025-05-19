   {{-- modal modificar articulo --}}
   <div class="modal fade" id="modificarArticulo" tabindex="-1" aria-labelledby="modificarArticuloModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class=" modal-content" style="min-height: 24rem;">
            <div class="modal-body modal__body common_modal_brpwf"  style="">
                <div class="modal__header" style="margin-bottom: auto">
                    <header>
                        <span data-bs-dismiss="modal" aria-label="Close" class="b-cursor-pointer b-icon iconFont icon-x" data-testid="header-icon" style="font-size: 32px;"></span>
                        <h1 data-testid="header-title"> Editar artículo </h1>
                    </header>
                </div>
                <div class="modal__content">
                    <div>
                        <div>
                            <div class="size--16-b txt--left margin-bottom-32 editBasketNameService">

                            </div>
                            <div class="row margin-bottom-16">
                                <div class=" col">
                                    <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_size--lg_RQ276 styles_theme--default_x92vh styles_slotTheme--default_vYr1T">
                                        <div class="styles_outerWrapper_NumuG" style="min-width: 0px;">
                                            <div class="styles_labelWrapper_isbmo">
                                                <label class="styles_label_hleTI"> Precio </label>
                                            </div>
                                            <div class="styles_wrapper_hb1CA">
                                                <div class="styles_slotLeft_k29NgPrecioModificarCesta"> € </div>
                                                <input value="" placeholder="" data-testid="item_price" id="uid-317-input" name="item_price" type="text" autocomplete="on" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none;" onblur="formatCurrencyOnBlur(this)" oninput="updateDiscount(this)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="index_incrementer_U03fN index_size--lg_Mk4Jp index_incrementer_U03fN">
                                        <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_size--lg_RQ276 styles_theme--default_x92vh styles_slotTheme--blank_iI8Uf styles_slotTheme--default_vYr1T">
                                            <div class="styles_outerWrapper_NumuG" style="min-height: 0px">
                                                <div class="styles_labelWrapper_isbmo">
                                                    <label class="styles_label_hleTI"> Descuento de artículo (%) </label>
                                                </div>
                                                <div class="styles_slotLeft_k29NgDescuentomasOmenos">
                                                    <input onfocus="removePercentage(this)"  value="0%" placeholder="" data-testid="discount_rate" id="uid-319-input" name="discount_rate" type="text" autocomplete="on" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px; text-transform: none; text-align: start;" onblur="formatDiscountRate(this)" oninput="updateDiscount(this)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="styles_container_pjyTj styles_focusedOrFilled_dNjQS styles_is--disabled_Defhj styles_size--lg_RQ276 styles_theme--default_x92vh styles_slotTheme--default_vYr1T">
                                        <div class="styles_outerWrapper_NumuGnoHOver" style="min-height: 0px">
                                            <div class="styles_labelWrapper_isbmo">
                                                <label class="styles_label_hleTI"> Cantidad del descuento </label>
                                            </div>
                                            <div class="styles_wrapper_hb1CA">
                                                <div class="styles_slotLeft_k29Ng"> € </div>
                                                <input placeholder="" data-testid="discount_price" id="uid-335-input" name="discount_price" disabled type="text" autocomplete="on" inputmode="text" class="styles_field_Bhxvq styles_field_BhxvqNoHover" style="min-width: 0px; pointer-events: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row margin-bottom-40">
                                <div class="row margin-top-40">
                                    <div class=" col text--left">
                                        <button data-bs-dismiss="modal" type="button" class="buttonRemoveItem b-button_button_QiVJW b-button_theme--danger_EEM01 b-button_size--medium_Q3BJJ" data-testid="basket-row-modal-remove">
                                            <span class="hidden-mobile margin-right-8"> Eliminar </span>
                                            <span class="c-error b-icon iconFont icon-trash" style="font-size: 24px;"></span>
                                        </button>
                                    </div>
                                    <div class="col col-auto">
                                        <div class="b-confirm_container_EQ68J b-confirm_reverse_o9BL7">
                                            <button data-bs-dismiss="modal" id="uid-339-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt b-confirm_button_IBwA3 b-confirm_confirmButton_pGIAs" data-testid="confirm-btn">
                                                <div class="index_caption_W6r_J">Guardar</div>
                                            </button>
                                            <button data-bs-dismiss="modal" id="uid-340-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--default_pktIt b-confirm_button_IBwA3 b-confirm_cancelButton_qqGj3" data-testid="cancel-btn">
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
</div>

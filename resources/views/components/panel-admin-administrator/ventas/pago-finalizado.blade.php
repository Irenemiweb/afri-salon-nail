<div class="index_paidWrapper_QWkLS" id="pago_finalizado_100" style="">
    <div class="row width-100 height-100 padding-left-32 padding-right-32">
        <div class="col col-auto txt--center self-center padding-left-60 padding-right-60">
            <div class="paid_paidWrapper_PMblG text-center">
                <img src="https://d10n9ka7jp2kfo.cloudfront.net/pro/2b253d2d/img/success.a5dea691.svg" class="margin-bottom-16 b-icon_img_I0kuC">
                <div data-testid="checkout-paid-info" class="size--28-b margin-bottom-16"> ¡Pago finalizado! </div>
                <div data-testid="checkout-paid-change" class="paid_paidDescription_cDRUA paid_size--18_wZkDn">
                    <span class="size--18-sb">11,50 € </span>
                    <span class="size--18-sb">cambio</span>
                     de 30,00 €
                </div>
                <button id="uid-351-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt"  style="width: 100%;">
                    <div class="index_caption_W6r_J"> Ir al calendario </div>
                </button>
            </div>
        </div>
        <div class="col h-100">
            <div class="scrollable h-100 column justify-center position-relative">
                <div class="receipt_receiptWrapper_ZpUQq paid_receiptWrap_KsRkP">
                    <div class="receipt_receiptContent_W16zO">
                        <header class="receipt_receiptHeader_or90S">
                            <div class="botonesCabeceraTiquet d-none" style="">
                                <div class="flex justify-end w-100">
                                    <button id="uid-353-input-enviarMail" class="index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--icon_yiHCJ" >
                                        <div class="index_slotLeft_p6NJx">
                                            <span class="padding-right-4 b-icon iconFont icon-ico_send" style="font-size: 30px;"></span>
                                        </div>
                                    </button>
                                    <div class="margin-left-12 index_dropdown_yxIjB index_has--shadow_s6YH1 index_is--overlay_JG_3k">
                                        <div class="index_toggle_sBt35">
                                            <button id="uid-356-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--icon_yiHCJ">
                                                <div class="index_slotLeft_p6NJx">
                                                    <span class="b-icon iconFont icon-more" style="font-size: 30px;"></span>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="enviarReciboCorreo">
                                <div class="row items-center">
                                    <div class="col col-auto">
                                        <span class="pointer b-icon iconFont icon-nav-arrow-left" style="font-size: 18px;padding-bottom: 1rem;"></span>
                                    </div>
                                    <div class="col">
                                        <div data-testid="error-input" class="index_container_jtGZY index_theme--error_q2ehf">
                                            <div class="form-groupInput" style="margin-bottom: 0px">
                                                <input onfocus="initCountLeathersTextArea()" onclick="initCountLeathersTextArea()" type="text" placeholder=" "
                                                    class="gualazonF inputsNewService" id="emailClienteRecivoSend"
                                                    value="{{ old('nombreServicio') }}" required
                                                    name="emailClienteRecivoSend"
                                                    onblur="verificarInput('titulo')"/>
                                                <label for="emailClienteRecivoSend" class="styles_label_hleTI">Enviar recibo al cliente por email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-auto">
                                        <button id="uid-340-input" class="index_button_TfmOz index_size--md_G1gdK index_theme--primary_Thscb index_theme--default_AtMGF index_slotTheme--default_pktIt receipt_receiptHeaderSend_XpRqZ">
                                            <div style="padding: 16px 16px;" class="index_caption_W6r_J"> Enviar </div>
                                        </button>
                                    </div>
                                    <div class="col col-12">
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="receipt_receiptReceipt_KzM2Z">
                            <div class="payment-receipt_receipt_KbChH payment-receipt_size--14_pkege">
                                <div class="receipt-status-badge_status_vwj1d receipt-status-badge_statusGreen_Aw6NK receipt-status-badge_size--md_INMcW receipt-status-badge_size--18-sb_Z0C9x"> Pagado </div>
                                <div class="payment-receipt_receiptInfo_RrRnL margin-top-16">
                                    <div class="size--16-sb">Recibo 3 | ID 26503784</div>
                                    <div>11 ene. 2025</div>
                                </div>
                                <div class="payment-receipt_receiptCustomer__F5o0">
                                    {{-- SI HAY NOMBRE DE CLIENTE --}}
                                    <div class="size--14-sb margin-right-4"> pedro Martinez, </div>
                                    <span class="flex inline items-center">
                                        <span> 659 78 41 23 </span>
                                    </span>
                                    {{-- FIN HAY NOMBRE CLIENTE --}}
                                </div>
                                <div class="margin-top-16">
                                    <div class="margin-top-16"> kenia55Nails <div class="payment-receipt_receiptAltText_VrnDU payment-receipt_size--12_zJMLU">ourense 25, 32003, Ourense</div></div>
                                </div>
                                <div class="payment-receipt_receiptLabels_dbSin payment-receipt_size--10_bf2DQ">
                                    <div>Artículo</div>
                                    <div>Cantidad</div>
                                </div>
                                <div>
                                    {{-- AQUI EL FOREACH CON TODOS LOS SERVICIOS --}}
                                    <div class="margin-bottom-12">
                                        <div class="payment-receipt_receiptItem_QWl3W">
                                            <div class="payment-receipt_receiptItemName_BOOqL"> Manicura clásica (35M) </div>
                                            <div class="payment-receipt_receiptItemQuantity_XWqsy"> x1 </div>
                                            <div class="payment-receipt_receiptItemTotal_U6yh4 payment-receipt_size--14-sb_r8Zux"> 20,00&nbsp;€ </div>
                                        </div>
                                           {{-- DESCUENTO SI LO HAY --}}
                                        <div class="payment-receipt_receiptAltText_VrnDU payment-receipt_size--12_zJMLU">
                                            <div class="row">
                                                <div class="col"></div>
                                                <div class="col col-auto">
                                                    <div class="txt--gray"> -20% </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="margin-bottom-12"><div class="payment-receipt_receiptItem_QWl3W"><div class="payment-receipt_receiptItemName_BOOqL"> Uñas acrílicas (1H 30M) </div><div class="payment-receipt_receiptItemQuantity_XWqsy"> x1 </div><div class="payment-receipt_receiptItemTotal_U6yh4 payment-receipt_size--14-sb_r8Zux"> 30,00&nbsp;€ </div></div><div class="payment-receipt_receiptAltText_VrnDU payment-receipt_size--12_zJMLU"><div class="row"><div class="col"></div><div class="col col-auto"><div class="txt--gray"> -30% </div></div></div></div></div>
                                </div>
                                <hr class="payment-receipt_hr_6WSqP">
                                {{-- DESGLOSE DE CANTIDADES --}}
                                <table class="payment-receipt_taxSummary_tF1kf">
                                    <thead class="color-08 size--10">
                                        <tr><th></th><th>Tipo de Impuesto</th><th>Valor neto</th><th>Importe de impuesto</th><th>Valor bruto</th></tr>
                                    </thead>
                                    <tbody><tr data-testid="payment-receipt-tax-item-0"><td></td><td class="size--12">21%</td><td class="size--12">15,29 €</td><td class="size--12">3,21 €</td><td class="size--12"><strong>18,50 €</strong></td></tr></tbody>
                                </table>
                                <div data-testid="payment-receipt-summaries-subtotal" class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU">
                                    <div class="payment-receipt_receiptRowName_Me4zF"> Subtotal </div>
                                    <div class="payment-receipt_receiptRowTotal_bf2SM"> 37,00&nbsp;€ </div>
                                </div>
                                <div data-testid="payment-receipt-summaries-discount" class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU">
                                    <div class="payment-receipt_receiptRowName_Me4zF"> Descuento </div>
                                    <div class="payment-receipt_receiptRowTotal_bf2SM"> -18,50&nbsp;€ </div>
                                </div>
                                <hr class="payment-receipt_hr_6WSqP">
                                <div class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU payment-receipt_receiptRowAlt_CtByz">
                                    <div class="payment-receipt_receiptRowName_Me4zF"> Total </div>
                                    <div class="payment-receipt_receiptRowTotal_bf2SM payment-receipt_receiptRowTotalAlt_L_Ovf payment-receipt_size--16-sb_LEIqn"> 18,50&nbsp;€ </div>
                                </div>
                                <div class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU payment-receipt_receiptRowPayments_JAX11">
                                    <div data-testid="payment-receipt-status" class="payment-receipt_receiptRowName_Me4zF"> Pagado • Efectivo • 11/01/2025, 19:17 </div>
                                    <div data-testid="payment-receipt-amount-text" class="payment-receipt_receiptRowTotal_bf2SM">
                                        <span>18,50&nbsp;€</span>
                                    </div>
                                </div>
                                <div class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU payment-receipt_receiptRowTotalPaid_th16p">
                                    <div class="payment-receipt_receiptRowName_Me4zF"> Total pagado </div>
                                    <div data-testid="payment-receipt-paid" class="payment-receipt_receiptRowTotal_bf2SM size--12-b"> 18,50&nbsp;€ </div>
                                </div>
                            </div>
                        </div>
                        <div class="receipt_break_EL1Lq">
                            <div></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

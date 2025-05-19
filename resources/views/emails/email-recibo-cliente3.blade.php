<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Recibo de Reserva</title>
    <style>
	*, ::after, ::before {
    box-sizing: border-box;
}
	body{
	font-size: 0.75rem;
	height: 100vh;
	font-family: sans-serif;
	}
	.index_paidWrapper_QWkLS {
    max-width: 60.5rem;
    height: 100%;
    align-items: center;
    display: flex;
    justify-content: center;
}
table {
    caption-side: bottom;
    border-collapse: collapse;
}
.justificadobetguin{
justify-content: space-between

}
.displayFlex{
display: flex;
}
.padingTop_ceroCinco{
padding-top:0.5rem;
}
.padding-right-32 {
    padding-right: 2rem !important;
}
.padding-left-32 {
    padding-left: 2rem !important;
}
.height-100 {
    height: 100% !important;
}
.width-100 {
    width: 100% !important;
}
.self-center {
    align-self: center;
}
.padding-right-60 {
    padding-right: 3.75rem !important;
}
.padding-left-60 {
    padding-left: 3.75rem !important;
}
.paid_paidWrapper_PMblG {
    width: 18.75rem;
}
.size--28-b, .size--32-b {
    font-size: 1.75rem;
    font-weight: 700;
    line-height: 1.5em;
}
.paid_paidDescription_cDRUA {
    margin: .5rem 0 1.5rem;
}
.size--18-sb {
    font-weight: 600;
}
.paid_size--18-sb_eeTaG, .paid_size--18_wZkDn {
    font-size: 1.125rem;
    line-height: 1.5555555556em;
}
.paid_size--18_wZkDn {
    font-weight: 500;
}
@media (hover: hover) and (pointer: fine) {
    .scrollable {
        outline-offset: -2px;
    }
}
.paid_receiptWrap_KsRkP {
    max-height: 100%;
}
.receipt_receiptWrapper_ZpUQq {
    max-width: 465px;
}
.receipt_receiptContent_W16zO {
    box-shadow: 0 15px 25px -6px rgba(0, 0, 0, .1);
    overflow: initial !important;
    position: relative;
    background-color: #fff;
}
.receipt_receiptHeader_or90S, .receipt_receiptReceipt_KzM2Z {
    padding: 1rem 1.5rem;
}
.justify-end {
    justify-content: flex-end;
}
.icon-ico_send:before {
    content: "\f158";
}
.flex-center, .justify-center {
    justify-content: center;
}
.position-relative {
    position: relative !important;
}
.margin-left-12 {
    margin-left: .75rem !important;
}
.icon-more:before {
    content: "\f16a";
}
.payment-receipt_size--14_pkege {
    font-size: .875rem;
    font-weight: 500;
    line-height: 1.5714285714em;
}
/*pagado verde*/
.receipt-status-badge_statusGreen_Aw6NK {
    background-color: rgba(0, 190, 112, .1);
    color: #00be70;
}
.receipt-status-badge_status_vwj1d {
    border-radius: .75rem;
    text-transform: uppercase;
    width: -moz-fit-content;
    width: fit-content;
}
.receipt-status-badge_size--md_INMcW {
    padding: 0 16px;
}
.receipt-status-badge_size--18-sb_Z0C9x {
    font-size: 1.125rem;
    font-weight: 600;
    line-height: 1.5555555556em;
}
.payment-receipt_receiptInfo_RrRnL {
    display: flex;
    justify-content: space-between;
}
.payment-receipt_receiptCustomer__F5o0 {
    display: flex;
    justify-content: flex-start;
}
.payment-receipt_receiptAltText_VrnDU {
    color: #8c8b88;
}
.payment-receipt_size--12_zJMLU {
    font-size: .75rem;
    line-height: 1.5em;
}
.payment-receipt_receiptLabels_dbSin {
    color: #8c8b88;
    display: flex;
    justify-content: space-between;
    padding: 22px 0 6px 0;
    margin-bottom: 6px;
    border-bottom: 1px solid #ebebeb;
}
.payment-receipt_size--10_bf2DQ {
    font-size: .625rem;
    font-weight: 500;
    line-height: 1.8em;
}
.payment-receipt_receiptItem_QWl3W {
    display: flex;
    align-items: center;
    padding: 6px 0;
}
.payment-receipt_receiptItemName_BOOqL {
    flex: 1!important;
    padding-right: 12px;
}
.payment-receipt_receiptItemQuantity_XWqsy {
    color: #8c8b88;
}
.payment-receipt_receiptItemTotal_U6yh4 {
    flex: 0 0 70px;
    text-align: right;
    padding-left: 12px;
}
.payment-receipt_size--14-sb_r8Zux {
    font-size: .875rem;
    font-weight: 600;
    line-height: 1.5714285714em;
}
.payment-receipt_hr_6WSqP {
    margin: 12px 0;
}
.txt--gray {
    color: #8c8b88;
}
/*tabla desglose cantidades*/
.payment-receipt_receiptRow_n1eic {
    display: flex;
    align-items: center;
    padding: 6px 0;
}
.payment-receipt_taxSummary_tF1kf {
    table-layout: auto;
    text-align: right;
    white-space: nowrap;
    margin: 12px 0;
}
.payment-receipt_taxSummary_tF1kf td:first-child, .payment-receipt_taxSummary_tF1kf th:first-child {
    width: 100%;
}
.payment-receipt_taxSummary_tF1kf td, .payment-receipt_taxSummary_tF1kf th {
    padding-top: 8px;
    padding-bottom: 8px;
    padding-left: 15px;
    border-bottom: 1px solid #ebebeb;
    min-width: 4rem;
}
.payment-receipt_receiptRowName_Me4zF {
    flex: 1;
    text-align: right;
    color: #8c8b88;
}
.payment-receipt_receiptRowTotal_bf2SM {
    flex: 0 0 70px;
    text-align: right;
    padding-left: 12px;
}
.payment-receipt_receiptRowAlt_CtByz {
    padding: 6px 0 22px 0;
    border-bottom: 1px solid #ebebeb;
}
.payment-receipt_size--16-sb_LEIqn {
    font-size: 1rem;
    font-weight: 700;
    line-height: 1.5em;
}
.boton_deshabilitado{
    opacity: 0.5;
    pointer-events: none;
}
.payment-receipt_receiptRowPayments_JAX11 {
    padding: 10px 0;
    border-bottom: 1px solid #ebebeb;
}
.payment-receipt_receiptRowTotalPaid_th16p {
    padding-top: 10px;
}
.size--12-b, .size--13 {
    font-size: .75rem;
    line-height: 1.5em;
}
.size--12-b {
    font-weight: 700;
}
.receipt_break_EL1Lq {
    overflow: hidden;
}
.receipt_break_EL1Lq>div:after {
    content: "";
    height: 9px;
    position: absolute;
    bottom: -0.4rem;
    /* top: 0; */
    left: 0;
    width: 100%;
    background-image: url(https://d10n9ka7jp2kfo.cloudfront.net/pro/2b253d2d/img/receipt-decorator.b8e0e674.svg);
    background-size: auto 100%;
}
.styles_slotTheme--default_vYr1T .styles_slotRight_TkOzM {
    display: flex;
    justify-content: center;
    align-items: center;
    padding-left: 12px;
    margin-left: 12px;
    border-left: 1px solid #ebebeb;
    padding-right: 16px;
    margin-right: -16px;
}
.amount-keyboard-modal_rightInputSlot__label_vKvE_ {
    color: #8c8b88;
    line-height: 1;
    text-transform: uppercase;
}
.amount-keyboard-modal_size--10_sd6pm {
    font-size: .625rem;
    font-weight: 500;
    line-height: 1.8em;
}
.amount-keyboard-modal_rightInputSlot__value_Aey7l {
    line-height: 1.35;
}
.amount-keyboard-modal_size--20_Y2DHM {
    font-size: 1.25rem;
    font-weight: 500;
    line-height: 1.5em;
}
.amount-keyboard-modal_leftInputSlot_Yf86A {
    color: #4c4f54;
    font-size: 1.5rem;
}
.amount-keyboard-modal_size--24-sb_wmqyG {
    font-size: 1.5rem;
    font-weight: 600;
    line-height: 1.5em;
}
.amount-keyboard-modal_rightInputSlot_CbFbF {
    display: flex;
    flex-direction: column;
    justify-content: center;
    white-space: nowrap;
}
.size--10 {
    font-size: .625rem;
    font-weight: 500;
    line-height: 1.8em;
}
.color-08 {
    color: #8c8b88;
}
.payment-receipt_receiptRowName_Me4zFEmail {
    flex: 1;
    text-align: inherit;
    color: #8c8b88;
}
    </style>
</head>
<body>
   <div class="" id="pago_finalizado_100" style="margin: 0 auto;">
    <div class="">
        <div class="">
            <div class="scrollable displayFlex justify-center position-relative" style="height:100vh;align-content:center;flex-wrap:wrap">
                <div class="receipt_receiptWrapper_ZpUQq paid_receiptWrap_KsRkP">
                    <div class="receipt_receiptContent_W16zO">
                        <div class="receipt_receiptReceipt_KzM2Z">
                            <div class="payment-receipt_receipt_KbChH">

                                <div class="infoEmpresa margin-top-16" style="border-bottom: 1px solid #ebebeb;padding-bottom: 0.5rem;">
                                    <div class="margin-top-16" style="font-size: .75rem;"> MYA Nail art studio
                                        <div class="payment-receipt_receiptAltText_VrnDU payment-receipt_size--12_zJMLU">ourense 25, 32003, Ourense</div>
                                    </div>
                                </div>
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <!-- Columna izquierda (datos del cliente) -->
                                        <td style="padding-bottom: 1rem; text-align: left; font-size: .75rem;">
                                            @if ($datosRequest['datos_cliente'] !== null)
                                                <div class="margin-right-4">
                                                    {{ $datosRequest['datos_cliente']['name'] }} {{ $datosRequest['datos_cliente']['primer_apellido'] }}
                                                </div>
                                                <span class="inline items-center">
                                                    <span> {{ $datosRequest['datos_cliente']['telefono'] }} </span>
                                                </span>
                                                <div class="margin-right-4 emailClienteEmail">{{ $datosRequest['emailCliente'] }}</div>
                                            @endif
                                        </td>

                                        <!-- Columna derecha (fecha y estado de pago) -->
                                        <td style="padding-bottom: 1rem; text-align: right; font-size: .75rem;">
                                            <div class="margin-top-16">
                                                <div>{{ $datosRequest['fecha_email'] }}</div>
                                                <div style="color: #00be70;text-transform: uppercase;font-size: .75rem;text-align: right;" class="text-right receipt-status-badge_status_vwj1dreceipt-status-badge_size--md_INMcW receipt-status-badge_size--18-sb_Z0C9x">
                                                    Pagado
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <!-- Columna izquierda (Artículo) -->
                                        <td style="text-align: left; font-size: 0.75rem; padding-bottom: 0.5rem;">
                                            Artículo
                                        </td>
                                        <td style="width: 5px"></td>
                                        <!-- Columna derecha (Cantidad) -->
                                        <td style="text-align: right; font-size: 0.75rem; padding-bottom: 0.5rem;">
                                            Cantidad
                                        </td>
                                    </tr>
                                </table>

                                <div>
                                    @foreach ($serviciosVendidos as $servicioVendido)
                                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 12px;">
                                        <tr>
                                            <!-- Columna izquierda (Descripción) -->
                                            <td style="padding-bottom: 0px; font-size: 0.75rem; text-align: right;">
                                                {{ $servicioVendido->servicio->descripcion }}
                                                @php
                                                    // Calcular las horas y minutos
                                                    $hours = intdiv($servicioVendido->servicio->duration, 60); // Calcula las horas
                                                    $minutes = $servicioVendido->servicio->duration % 60; // Calcula los minutos restantes
                                                @endphp
                                                @if ($hours > 0)
                                                    {{ $hours }}h @if($minutes > 0) {{ $minutes }}min @endif
                                                @else
                                                    {{ $minutes }}min
                                                @endif
                                            </td>

                                            <!-- Columna derecha (Cantidad) -->
                                            <td style="padding-bottom: 0px; text-align: right;">
                                                x1
                                            </td>

                                            <!-- Columna derecha (Precio) -->
                                            <td style="padding-bottom: 0px; text-align: right;">
                                                {{ $servicioVendido->servicio->precio }}€
                                            </td>
                                        </tr>
                                    </table>

                                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="padding-bottom: 1rem;">
                                        <tr>
                                            <td style="font-size: 0.75rem; text-align: right; color: #777;">
                                                {{ $servicioVendido->descuento_porcentaje }}%
                                            </td>
                                        </tr>
                                    </table>
                                @endforeach


									{{-- <div class="margin-bottom-12">
                                        <div class="payment-receipt_receiptItem_QWl3W" style="padding-bottom:0px">
                                            <div class="payment-receipt_receiptItemName_BOOqL"> Uñas acrílicas (1H 30M) </div>
                                            <div class="payment-receipt_receiptItemQuantity_XWqsy"> x1 </div>
                                            <div class="payment-receipt_receiptItemTotal_U6yh4 payment-receipt_size--14-sb_r8Zux"> 30,00&nbsp;€ </div>
                                        </div>
                                        <div class="" style="padding-bottom:1rem">
                                            <div class="payment-receipt_receiptItemName_BOOqL"></div>
                                            <div class="payment-receipt_receiptItemQuantity_XWqsy"></div>
                                            <div style="font-size: 0.75rem; text-align: right" class=" txt--gray"> 30% </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <hr class="payment-receipt_hr_6WSqP">

                                <table class="payment-receipt_taxSummary_tF1kf">
                                    <thead class="color-08 size--10">
                                        <tr><th></th><th>Tipo de Impuesto</th><th>Valor neto</th><th>Importe de impuesto</th><th>Valor bruto</th></tr>
                                    </thead>
                                    <tbody><tr data-testid="payment-receipt-tax-item-0"><td></td><td class="size--12">21%</td><td class="size--12">{{  $datosRequest['valor_neto'] }} €</td><td class="size--12">{{ $datosRequest['importe_iva'] }} €</td><td class="size--12"><strong>{{ $datosRequest['valor_bruto'] }} €</strong></td></tr></tbody>
                                </table>
                                <div data-testid="payment-receipt-summaries-subtotal" class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU">
                                    <div class="payment-receipt_receiptRowName_Me4zFEmail"> Subtotal </div>
                                    <div class="payment-receipt_receiptRowTotal_bf2SM"> {{ $datosRequest['subtotal'] }}€ </div>
                                </div>
                                <div data-testid="payment-receipt-summaries-discount" class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU">
                                    <div class="payment-receipt_receiptRowName_Me4zFEmail"> Descuento </div>
                                    <div class="payment-receipt_receiptRowTotal_bf2SM"> -{{ $datosRequest['descuentoTotalImporte'] }}€ </div>
                                </div>
                                <hr class="payment-receipt_hr_6WSqP">
                                <div class="payment-receipt_receiptRow_n1eic payment-receipt_size--12_zJMLU payment-receipt_receiptRowAlt_CtByz" style="border-bottom: 1px solid transparent">
                                    <div class="payment-receipt_receiptRowName_Me4zFEmail"> Total </div>
                                    <div class="payment-receipt_receiptRowTotal_bf2SM payment-receipt_receiptRowTotalAlt_L_Ovf payment-receipt_size--16-sb_LEIqn"> {{ $datosRequest['valor_bruto'] }} € </div>
                                </div>
                                <div class="payment-receipt_size--12_zJMLU justificadobetguin displayFlex" style="padding: 6px 0px;border-bottom: 1px solid #ebebeb;">
                                    <div data-testid="payment-receipt-status" class="payment-receipt_receiptRowName_Me4zFEmailEmail"> Recibo {{ $recibo->numero_recibo }}, ID {{ $recibo->id }} • 11 ene. 2025 a las 19:17  </div>

                                </div>
                                @if (trim($datosRequest['metodoActivo']) === 'Pago fraccionado')
                                    <div class="payment-receipt_size--12_zJMLU justificadobetguin displayFlex" style="padding: 6px 0px">
                                        <div data-testid="payment-receipt-status" class="payment-receipt_receiptRowName_Me4zFEmailEmail"> Pagado • {{ $datosRequest['metodopago1_'] }} •  {{ $datosRequest['fecha_email_hora'] }} </div>
                                        <div data-testid="payment-receipt-amount-text" class="payment-receipt_receiptRowTotal_bf2SM">
                                            <span>{{ $datosRequest['importe1_'] }}€</span>
                                        </div>
                                    </div>
                                    <div class="payment-receipt_size--12_zJMLU justificadobetguin displayFlex" style="padding: 6px 0px">
                                        <div data-testid="payment-receipt-status" class="payment-receipt_receiptRowName_Me4zFEmailEmail"> Pagado • {{ $datosRequest['metodopago2_'] }} •  {{ $datosRequest['fecha_email_hora'] }} </div>
                                        <div data-testid="payment-receipt-amount-text" class="payment-receipt_receiptRowTotal_bf2SM">
                                            <span>{{ $datosRequest['importe2_'] }}€</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="payment-receipt_size--12_zJMLU justificadobetguin displayFlex" style="padding: 6px 0px">
                                        <div data-testid="payment-receipt-status" class="payment-receipt_receiptRowName_Me4zFEmailEmail"> Pagado • Efectivo •  {{ $datosRequest['fecha_email_hora'] }} </div>
                                        <div data-testid="payment-receipt-amount-text" class="payment-receipt_receiptRowTotal_bf2SM">
                                            <span>{{ $datosRequest['valor_bruto'] }}€</span>
                                        </div>
                                    </div>
                                @endif
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

</body>
</html>

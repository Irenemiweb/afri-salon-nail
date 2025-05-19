<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Recibo de Reserva</title>
    <style>

    </style>
</head>
<body>
	<div bgcolor="#f9f9f9" marginheight="20" marginwidth="20">
		<center>
			<table bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" style="max-width:500px;width:100%">
				<tbody>
					<tr>
						<td>
							<a href="" target="_blank">
                                <img src="cid:cavecera_email.png" alt="MYA Nail art studio">
							</a>
						</td>
					</tr>
					<tr>
						<td valign="top">
							<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #f9f9f9;border-right:1px solid #f9f9f9">
								<tbody>
									<tr>
										<td style="background: #fff" valign="top">
											<div style="padding:40px 0 0">
												<div style="background-color:#f9f9f9;width:100%;color:#383734;font-family:'Proxima Nova',Arial;font-size:11px;line-height:18px;font-weight:400">
													<center>
														<div style="padding:15px 15px 0px 15px;border-top:2px solid #eee;border-left:2px solid #eee;border-right:2px solid #eee;background:#fff">
															<table cellpadding="0" cellspacing="0" style="width:100%;margin-bottom:10px;color:#605f5d">
																<tbody>
																	<tr>
																	   <td>
																		<div>
                                                                        MYA Nail art studio
																		</div>
																		<div>
                                                                        Ourense 25, 32003, Ourense
																		</div>
																	   </td>
																	  </tr>
																</tbody>
															</table>
															<table cellpadding="0" cellspacing="0" style="width:100%;padding-bottom:10px">
															  <tbody><tr>
															   <td style="background:#e1e1e1;height:1px">
															   </td>
															  </tr>
															 </tbody></table>
															<table cellpadding="0" cellspacing="0" style="width:100%;color:#605f5d">
															  <tbody><tr>
															   <td style="padding-bottom:15px;font-size:11px">
                                                                @if ($datosRequest['datos_cliente'] === null)

                                                                @else
                                                                <div>
                                                                    {{ $datosRequest['datos_cliente']['name'] }} {{ $datosRequest['datos_cliente']['primer_apellido'] }}
                                                                <br>
                                                                {{ $datosRequest['datos_cliente']['telefono'] }}
                                                                <br>
                                                                    <a href="mailto:{{ $datosRequest['emailCliente'] }}" target="_blank">{{ $datosRequest['emailCliente'] }}</a>
                                                                   </div>

                                                                @endif

															   </td>
															   <td style="vertical-align:top;text-align:right">
																<span>
                                                                    {{ $datosRequest['fecha_email'] }}
																</span>
																<div>
																 <span style="line-height:12px;display:inline-block;text-align:right;font-size:1.1em;font-weight:600;text-transform:uppercase;color:#44b560;border-radius:2px;padding:6px 0px 2px 0px;min-width:100px">
																  Pagado
																 </span>
																</div>
																<div>
																 <span style="font-size:0.9em;color:#ffab00">
																 </span>
																</div>
															   </td>
															  </tr>
															 </tbody></table>
															<table cellpadding="0" cellspacing="0" style="width:100%">
															  <thead>
															   <tr>
																<th style="width:70%;text-align:left;font-weight:400;font-size:10px;border-bottom:1px solid #e1e1e1;color:#c3c1bc;text-transform:uppercase">
																 Artículo
																</th>
																<th style="width:10%;border-bottom:1px solid #e1e1e1">
																</th>
																<th style="text-align:right;width:20%;font-weight:400;font-size:10px;border-bottom:1px solid #e1e1e1;color:#c3c1bc;text-transform:uppercase">
																 Cantidad
																</th>
															   </tr>
															  </thead>
															  <tbody>
                                                                @foreach ($serviciosVendidos as $servicioVendido)
															   <tr>
																<td style="text-align:left;border-bottom:1px solid #e1e1e1;padding:10px 0;vertical-align:top">
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
																<td style="text-align:right;padding:10px 0;border-bottom:1px solid #e1e1e1;vertical-align:top">
																 <span style="margin-right: 3px">1x</span>{{ $servicioVendido->servicio->precio }}€
																</td>
																<td style="text-align:right;padding:10px 0;border-bottom:1px solid #e1e1e1;vertical-align:top">
                                                                    {{ $servicioVendido->servicio->precio - $servicioVendido->descuento_importe }}€
																</td>
															   </tr>
                                                               @endforeach
															  </tbody>
															 </table>
															<table cellpadding="0" cellspacing="0" style="width:100%;border-top:1px solid #e1e1e1;margin-bottom:15px;padding-top:15px;text-align:right;text-transform:uppercase">
															  <tbody><tr>
															   <td style="color:#8c8b88">
															   </td>
															   <td style="color:#8c8b88;width:19%">
																Tipo de Impuesto
															   </td>
															   <td style="color:#8c8b88;width:19%">
																Valor neto
															   </td>
															   <td style="color:#8c8b88;width:19%">
																Cantidad de impuesto
															   </td>
															   <td style="color:#8c8b88;width:19%">
																Valor bruto
															   </td>
															  </tr>
															  <tr>
															   <td>
															   </td>
															   <td>
																21.00%
															   </td>
															   <td>
																{{  $datosRequest['valor_neto'] }} €
															   </td>
															   <td>
																{{ $datosRequest['importe_iva'] }} €
															   </td>
															   <td>
																<strong>
                                                                {{ $datosRequest['valor_bruto'] }}
																</strong>
															   </td>
															  </tr>
															 </tbody>
															</table>
															<table cellpadding="0" cellspacing="0" style="width:100%;border-top:1px solid #e1e1e1;padding:15px 0 0 0">
															  <tbody><tr>
															   <td style="color:#8c8b88;text-align:right;padding:0 10px 10px 10px;width:80%;text-transform:uppercase">
																Subtotal
															   </td>
															   <td style="text-align:right;padding:0 0 10px 0;width:20%">
																{{ $datosRequest['subtotal'] }}
															   </td>
															  </tr>
                                                              @if ($datosRequest['descuentoTotalImporte'] === "0€")
                                                              @else
                                                              <tr>
                                                                <td style="color:#8c8b88;text-align:right;padding:0 10px 10px 10px;width:80%;text-transform:uppercase">
                                                                 Descuento
                                                                </td>
                                                                <td style="text-align:right;padding:0 0 10px 0;width:20%">
                                                                 -{{ $datosRequest['descuentoTotalImporte'] }}
                                                                </td>
                                                               </tr>
                                                              @endif

															 </tbody>
															</table>
															<table cellpadding="0" cellspacing="0" style="width:100%;border-top:1px solid #e1e1e1;margin-bottom:15px;padding-top:15px">
															  <tbody><tr>
															   <td style="color:#8c8b88;text-align:right;padding:0 10px 10px 10px;width:80%;text-transform:uppercase">
																Total
															   </td>
															   <td style="text-align:right;padding:0 0 10px 0;width:20%;font-size:20px">
																{{ $datosRequest['valor_bruto'] }}
															   </td>
															  </tr>
															 </tbody>
															</table>
															<table cellpadding="0" cellspacing="0" style="width:100%;padding:15px 0;color:#8c8b88">
															  <tbody><tr>
															   <td>
																Recibo {{ $recibo->numero_recibo }}, ID {{ $recibo->id }} • {{ $datosRequest['fecha_email_hora'] }}
															   </td>
															  </tr>
															 </tbody>
															</table>
															<table cellpadding="0" cellspacing="0" style="width:100%;padding:15px 0;color:#8c8b88">
															  <tbody>
                                                                @if (trim($datosRequest['metodoActivo']) === 'Pago fraccionado')
                                                                    <tr style="margin-bottom:5px">
                                                                <td style="text-align:left;width:60%;border-top:1px solid #e1e1e1">
                                                                    Pagado • {{ $datosRequest['metodopago1_'] }} •  {{ $datosRequest['fecha_email_hora'] }}
                                                                </td>
                                                                <td style="text-align:right;width:20%;border-top:1px solid #e1e1e1">
                                                                    {{ $datosRequest['importe1_'] }}
                                                                </td>
                                                                </tr>
                                                                <tr style="margin-bottom:5px">
                                                                    <td style="text-align:left;width:60%;border-top:1px solid #e1e1e1">
                                                                    Pagado • {{ $datosRequest['metodopago2_'] }} •  {{ $datosRequest['fecha_email_hora'] }}
                                                                    </td>
                                                                    <td style="text-align:right;width:20%;border-top:1px solid #e1e1e1">
                                                                        {{ $datosRequest['importe2_'] }}
                                                                    </td>
                                                                </tr>
                                                              @else
                                                                <tr style="margin-bottom:5px">
                                                                    <td style="text-align:left;width:60%;border-top:1px solid #e1e1e1">
                                                                    Pagado • Efectivo •  {{ $datosRequest['fecha_email_hora'] }}
                                                                    </td>
                                                                    <td style="text-align:right;width:20%;border-top:1px solid #e1e1e1">
                                                                    {{ $datosRequest['valor_bruto'] }}
                                                                    </td>
                                                                </tr>
                                                              @endif
															 </tbody>
															</table>
															<div></div>
														</div>
														<img alt="" src="https://ci3.googleusercontent.com/meips/ADKq_NalGDY2M-HGR8yxmHD2lKJdG5yU59SkTPBzdrAJQHfFJ4aiX1tLi1hSYuyexrN-i_Hp_oGR1qSud7Rw16I1onIIi_ygu9q9pBIzg5FfIdZXP54=s0-d-e1-ft#https://static.booksy.com/static/live/es/scenarios/claws.png" style="width:100%;vertical-align:top" class="CToWUd" data-bit="iit">
													</center>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</center>
	</div>
</body>
</html>

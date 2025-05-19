<div class="modal fade common_modal_brpwf" id="modalCancelarReservaAdmin" tabindex="-1" aria-labelledby="modalCancelarReservaAdminLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal__body" style="width: 448px;">
        <div class="modal-content text-center" style="min-height: 24rem; border:none;background-color:transparent">

            <div class="modal__content" style="flex: none">
                <div class=""><img src="https://d10n9ka7jp2kfo.cloudfront.net/pro/2b253d2d/img/warning.c1595170.svg" class="b-icon_img_I0kuC" style="height: 72px;vertical-align: middle;"></div>
                <div class="section44"><h1 class="h1cancelarVenta">¿Cancelar esta cita?</h1><p class="pCancelarVenta">Indica la causa de la cancelación y el responsable.</p></div>
                <div class="row">
                    {{-- <div class="col-12"> --}}
                        <div class="col-12 col-md-12 mb-3 big-tecnology-brand" id="reseponsableCancelacion001">
                            <div class="form-groupInput" style="display: contents">
                                <label class="styles_label_hleTI" style="top: 165px; z-index: 9; background-color: white; padding-left: 3px; padding-right: 3px;" for="marca">Responsable</label>
                                <div class="divEstadoWithMax estado form-control p-0 align-items-center d-grid">
                                    <div class="estadoMesure">
                                        <div id="reseponsableCancelacion001Selected"
                                            @isset($users)
                                                data-options="{{ json_encode(collect($users)->map(function($user) {

                                                    return [
                                                        'name' => $user->name,
                                                        'primer_apellido' => $user->primer_apellido,
                                                        'id' => $user->id
                                                    ];
                                                })) }}"
                                            @endisset
                                        >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-groupInput mb-3 responsable">
                            <input type="text" placeholder=" "
                                class="gualazonF inputsNewService" id="reseponsableCancelacion001"
                                required/>
                            <label for="reseponsableCancelacion001" class="styles_label_hleTI">Nombre</label>
                        </div> --}}
                    {{-- </div> --}}
                    <div class="col-12">
                        <div class="form-groupInput mb-3 motivo">
                            <textarea style="background-color: white;border-radius:4px;" id="motivoCancelacion001" class="form-control" rows="4" placeholder=" "></textarea>
                            <label for="motivoCancelacion001" class="styles_label_hleTI" style="padding-left: 4px;padding-right: 4px;left: 7px;">Motivo cancelación (opcional)</label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal__footer">
                <div>
                   <div class="row justify-content-between">
                    <div class=" col-6">
                        <button data-bs-dismiss="modal" id="uid-223-input" class="index_button_TfmOz index_size--lg_I9GTR index_theme--alert_unNNB index_theme--default_AtMGF index_slotTheme--default_pktIt" style="width: 100%;">
                            <div class="index_caption_W6r_J cancelledReservButton2030">Cancelar cita</div>
                        </button>
                    </div>
                    <div class=" col-5" style="">
                        <button data-bs-dismiss="modal" id="" class="index_button_TfmOz index_size--lg_I9GTR index_theme--default_AtMGF index_slotTheme--default_pktIt" style="width: 100%;">
                            <div class="index_caption_W6r_J">Atrás</div>
                        </button>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

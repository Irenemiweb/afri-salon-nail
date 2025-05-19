<style>
.card.cardAll {
  max-width: 30em!important;
  flex-direction: row!important;
  background-color: #fff;
  border: 0!important;
  box-shadow: 0 7px 7px rgba(0, 0, 0, 0.18)!important;
  margin: 10px auto!important;
}
.card.dark {
  color: #fff;
}
.card.card.bg-light-subtle .card-title {
  color: dimgrey;
}

.card img {
  max-width: 25%;
  margin: auto;
  /* padding: 0.5em; */
  border-radius: 0.7em;
  position: relative;
    left: 6px;
}
.card-body {
  display: flex;
  justify-content: space-between;
}
.text-section {
  max-width: 60%;
}
.cta-section {
  max-width: 40%;
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  justify-content: space-between;
}
.cta-section .btn {
  padding: 0.3em 0.5em;
  /* color: #696969; */
}
.card.cardAll.bg-light-subtle .cta-section .btn {
  background-color: #898989!important;
  border-color: #898989!important;
}
@media screen and (max-width: 475px) {
  .card {
    font-size: 0.9em;
  }
}
</style>
@php
     use Carbon\Carbon;
@endphp
<div>
    {{-- canvas --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="canvasNotificationNewReserv" aria-labelledby="canvasNotificationNewReservLabel" style="background-color: #F5F7FA !important;">
    <div class="offcanvas-header d-flex" style="padding-bottom: 1rem !important;">
        <h5 style="color: black;
        font-size: x-large;
        font-weight: 700;" class="offcanvas-title" id="canvasNotificationNewReservLabel">RESERVAS</h5>
        <button style=" border:none;background-color:#F5F7FA" type="button" class=" small" data-bs-dismiss="offcanvas" aria-label="Close" onclick="changeView023();">cerrar</button>
    </div>
    {{-- <div id="sombraNavCategory" class="sombra" style="height: 1px;width: 100%;margin-left: -6px;"></div> --}}
    @if($reservasPendientes && $reservasPendientes->count() > 0)
        <div class="botonesEnabledVentaRapida row justify-center">
            <div class="col col-auto col--narrower">
                <button id="remove_notification_reserv" class="index_button_TfmOz index_size--lg_I9GTR index_theme--alert_unNNB index_theme--default_AtMGF index_slotTheme--icon_yiHCJ" data-testid="basket-delete">
                    <div class="index_slotLeft_p6NJx">
                        <span class="b-icon iconFont icon-trash" style="font-size: 32px;"></span>
                        <div class="index_caption_W6r_J"> Eliminar todas </div>
                    </div>
                </button>
            </div>
        </div>
    @endif

    <div id="showReservPendingDiv" class="offcanvas-body scroll-menu-category" style="">

        @foreach ($reservasPendientes as $reservaPendiente)
            @php
                $inicio = Carbon::parse($reservaPendiente->date_time);
                $fin = $inicio->copy()->addMinutes($reservaPendiente->duration);
                $fechaFormateada = $inicio->isoFormat('dddd D [de] MMMM');
                $horaInicio = $inicio->format('H:i');
                $horaFin = $fin->format('H:i');
            @endphp
            <div class="card cardAll" data-idReserva="{{ $reservaPendiente->id }}">
                <img style="" class="rounded-circle imgCabecera" width="35" height="35" src="{{ $reservaPendiente->user->profile_photo_url }}" alt="{{ $reservaPendiente->user->name }}" />
                <div class="card-body">
                    <div class="text-section">
                    <h5 class="card-title">{{ $reservaPendiente->user->name }}</h5>
                    <p class="card-text">{{ $fechaFormateada }} de {{ $horaInicio }} a {{ $horaFin }}</p>
                    </div>
                    <div class="cta-section">
                    <button type="button" class="btn btn-light bg-white b-button_theme--danger_EEM01" onclick="deleteNotification('{{ $reservaPendiente->id }}')" style="min-width: 80px;border: 1px solid #c7cbd4 !important;">
                        <span class="b-icon iconFont icon-trash" style="font-size: 23px;"></span>
                    </button>
                    <button style="border: 1px solid #c7cbd4 !important;" data-bs-dismiss="offcanvas" class="confirmar-cita btn btn-light bg-white" data-idReserv="{{ $reservaPendiente->id }}" data-fecha="{{ $inicio->format('Y-m-d') }}">Confirmar</button>
                    <a href="#" class="btn btn-light bg-white b-button_theme--danger_EEM01" style="min-width: 80px;border: 1px solid #c7cbd4 !important;">Cancelar</a>
                    </div>
                </div>

            </div>
            {{-- <div class="card cardAll bg-light-subtle mt-4">
            <img src="https://codingyaar.com/wp-content/uploads/chair-image.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="text-section">
                <h5 class="card-title fw-bold">Card title</h5>
                <p class="card-text">Some quick example text to build on the card's content.</p>
                </div>
                <div class="cta-section">
                <a href="#" class="btn btn-dark">Confirmar</a>
                <a href="#" class="btn btn-dark">Cancelar</a>
                </div>
            </div>
            </div> --}}
        @endforeach
    </div>
  </div>
</div>

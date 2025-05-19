<div class="segirReserva" id="segirReserva">
    <div class="container offcanvas offcanvas-bottom p-0" data-service="{{ $id_servicio }}" data-duration="{{ $duration }}" data-bs-backdrop="static" tabindex="-1" id="offcanvasBottomComfirmReserva{{ $index }}" data-service_h ="" data-service_m="" aria-labelledby="offcanvasBottomLabelComfirmReserva{{ $index }}">
        {{-- VISTA DE QUE LA CITA SE HA GENERADO CORRECTAMENTE --}}
        <div class="d-none card pos-relative offcanvasMostrar{{ $index }}">
            <div class="offcanvas-header mb-3 text-center align-items-center d-flex">
                <button onclick="hideConfirmReserv('{{ $index }}')" data-index="{{ $index }}" type="button" class="btn-close text-reset" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body card-body card-body-lg text-center">
                <div class="mt-2xl">
                    <span class="icon icon-appointment-confirmed">
                        <svg xmlns="http://www.w3.org/2000/svg" height="118" width="118"><defs><filter id="a" color-interpolation-filters="auto"><feColorMatrix values="0 0 0 0 0.000000 0 0 0 0 0.745098 0 0 0 0 0.439216 0 0 0 1.000000 0" in="SourceGraphic"></feColorMatrix></filter></defs><g fill-rule="evenodd" fill="none"><path fill="#00BE70" d="M20.87 10.544a3.295 3.295 0 01.447 6.56l-.448.03h-6.965a7.46 7.46 0 00-5.232 2.287 7.465 7.465 0 00-2.058 4.624l-.022.76v66a7.46 7.46 0 002.08 5.318 7.463 7.463 0 004.453 2.236l.715.051h56.944A22.392 22.392 0 0073.79 105H13.777a14.052 14.052 0 01-9.855-4.31 14.036 14.036 0 01-3.907-9.037l-.013-.914V24.87a14.05 14.05 0 013.92-10.015 14.059 14.059 0 018.976-4.261l.942-.05h7.03zM52.5 79.079a5.052 5.052 0 110 10.105 5.052 5.052 0 010-10.105zm-24.602 0a5.052 5.052 0 110 10.105 5.052 5.052 0 010-10.105zm63.325-68.535a14.052 14.052 0 019.855 4.31 14.036 14.036 0 013.907 9.037l.013.914v48.983a22.392 22.392 0 00-6.59-3.004V24.739a7.46 7.46 0 00-2.08-5.318 7.463 7.463 0 00-4.453-2.236l-.715-.051h-7.03a3.295 3.295 0 01-.447-6.56l.448-.03h7.092zM77.102 57.992a5.052 5.052 0 110 10.104 5.052 5.052 0 010-10.104zm-24.602 0a5.052 5.052 0 110 10.104 5.052 5.052 0 010-10.104zm-24.602 0a5.052 5.052 0 110 10.104 5.052 5.052 0 010-10.104zm49.204-21.088a5.052 5.052 0 110 10.104 5.052 5.052 0 010-10.104zm-24.602 0a5.052 5.052 0 110 10.104 5.052 5.052 0 010-10.104zM31.413 0a3.296 3.296 0 013.265 2.848l.03.447v17.573a3.295 3.295 0 01-6.56.447l-.03-.447V3.295A3.295 3.295 0 0131.413 0zm42.174 0a3.296 3.296 0 013.265 2.848l.03.447v17.573a3.295 3.295 0 01-6.56.447l-.03-.447V3.295A3.295 3.295 0 0173.587 0zM63.044 10.544a3.295 3.295 0 01.447 6.56l-.447.03H41.956a3.295 3.295 0 01-.447-6.56l.447-.03h21.088z"></path><g filter="url(#a)"><path fill="#00BE70" d="M91.943 66.25c14.19 0 25.693 11.503 25.693 25.693 0 14.19-11.503 25.693-25.693 25.693-14.19 0-25.693-11.503-25.693-25.693 0-14.19 11.503-25.693 25.693-25.693zm0 7.5c-10.048 0-18.193 8.145-18.193 18.193 0 10.047 8.145 18.193 18.193 18.193 10.047 0 18.193-8.146 18.193-18.193 0-10.048-8.146-18.193-18.193-18.193zm11.91 10.138a3.75 3.75 0 01.585 4.896l-.316.4-11.193 12.386a3.75 3.75 0 01-5.02.494l-.4-.343-6.407-6.339a3.75 3.75 0 014.852-5.693l.422.361 3.618 3.578 8.563-9.472a3.75 3.75 0 015.297-.268z"></path></g></g></svg>
                    </span>
                </div>
                <h2 class="mt-lg mb-0">Cita confirmada</h2>
                <h2 class="m-0 reservConfirmDateHour"></h2>
                <p class="mt-xs pb-3xl">¡Listo! Te enviaremos un recordatorio por mensaje de texto antes de tu cita.</p>
                <button data-index="{{ $index }}" class="boton-reservar-servicio mt-3 gualazonF button-primary-salon button button-shadow button-block button-primary button-lg mt-md" data-testid="showReserv">
                    <span data-testid="continue-button-book">Mostrar cita</span>
                </button>
            </div>
        </div>
        {{-- ------------------- --}}
        <div class="offcanvasOcultar{{ $index }}">
            <div class="offcanvas-header mb-3 text-center align-items-center d-flex">
                <div class="card-header-title offcanvas-title" id="offcanvasBottomLabelComfirmReserva{{ $index }}" style="margin-left: 30.4px;">
                    Revisar y confirmar reserva
                </div>
                <button data-index="{{ $index }}" type="button" class="btn-close customOpenModalCancelServiceButtonComfirmService" aria-label="Close" id=""></button>
                <div></div>
                {{-- <button type="button" class="offcanvasBottomCategory btn-close" data-bs-dismiss="offcanvas" aria-label="Close" onclick="showElement('.navbarAdminPanel');showElement('.footer')"></button> --}}
            </div>
            <div style="padding: 0px 3rem 0px 3rem;" id="scroll-menu-categoryBotton" class="container offcanvas-body scroll-menu-category inputsCategoriasSecundarias carrusel-contenedor" style="">
                <div data-v-5fc33602="" class="card-body b-pb-0">
                    <div data-v-5fc33602="" class="mb-lg text-center">
                        <div data-v-5fc33602="" class="font-h2 font-normal">
                            <strong data-mes-dia="" class="bookingDate font-h1"></strong>
                            <div data-v-5fc33602="" class="bookingHour text-h2"></div>
                        </div>
                        <div data-v-5fc33602="" class="text-muted text-h5">Afri Nail art stydio</div>
                    </div>
                    <div data-v-5fc33602="" class="boxBox">
                        <div data-v-5fc33602="" class="divided">
                            <div data-v-5fc33602="" class="">
                                <div data-v-5fc33602="" data-testid="view-confirm-main-subbooking" data-index="0">
                                    <div class="row">
                                        <div class="col">
                                            <div class="text-muted text-h5 line-break-anywhere">{{ $nombreServicio }}</div>
                                            <h6 class="text-gray">{{ $descripcionServicio }}</h6>
                                            <div data-testid="subbooking-item-summary-staffer-label" class="subtext">
                                                <span class="text-lightgray empleadoName">

                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-auto text-right">
                                            <div class="text-muted text-h5">{{ $precioServicio }}€</div>
                                            <div class="subtext subTiempoNecesario"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-v-5fc33602="">
                                <div data-v-5fc33602="" class="row">
                                    <div data-v-5fc33602="" class="col text-right">
                                        <div data-v-5fc33602="" data-testid="view-confirm-main.total">
                                            <span data-v-5fc33602="" class="text-muted b-mr-2">Total: </span>
                                            <span data-v-5fc33602="" class="font-h4" data-testid="view-confirm-main.amount">{{ $precioServicio }}€</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-v-5fc33602="" class="form-group">
                        <div data-v-5fc33602="" class="form-icon leave-note-icon">
                            <span data-v-5fc33602="" class="icon icon-leave-note">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path fill-rule="evenodd" fill="silver" d="M6.408 1.784a8.785 8.785 0 1 1 .777 16.018l-.337-.138-1.205-.548-3.975 1.987c-.448.225-.921-.186-.821-.633l.02-.07.03-.068 1.987-3.976-.553-1.215a9.16 9.16 0 0 1-.366-1.01l-.096-.344-.082-.35A8.785 8.785 0 0 1 5.99 2.01l.203-.114.215-.112ZM15.78 4.22a7.634 7.634 0 0 0-12.513 8.17l.115.285.663 1.454c.06.132.068.28.024.416l-.033.08-1.34 2.678 2.68-1.34a.575.575 0 0 1 .33-.055l.084.017.081.03 1.443.658c.48.206.978.365 1.487.474A7.634 7.634 0 0 0 15.78 4.22Zm-5.395 4.782a.767.767 0 1 1 0 1.534.767.767 0 0 1 0-1.534Zm3.681 0a.767.767 0 1 1 0 1.534.767.767 0 0 1 0-1.534Zm-7.363 0a.767.767 0 1 1 0 1.534.767.767 0 0 1 0-1.534Z"></path></svg>
                            </span>
                        </div>
                        <textarea class="reservNote form-controlText form-control-borderless form-control-with-icon" maxlength="1500" placeholder="Dejar una nota (opcional)" rows="5"></textarea>
                    </div>
                </div>
                <div data-v-5fc33602="" class="card-body mt-xl py-md">
                    <div class="items-center">
                        <div class="col">
                            <div class="text-right">
                                <div class="text-muted font-h5">Total a pagar</div>
                                <div class="total_pagarReserva0202 h0">{{ $precioServicio }}€</div>
                            </div>
                        </div>
                    </div>
                    <!-- Contenedor del loader (inicialmente oculto) -->
                    <div id="loaderSpera{{ $index }}" class="loader d-none">
                        <div class="spinner"></div>
                    </div>
                    <div>
                        <button id="bottsubmitCreateNewReserv" type="submit" data-index="{{ $index }}" class="boton-reservar-servicio mt-3 gualazonF button-primary-salon button button-shadow button-block button-primary button-lg mt-md" data-testid="continue-button">
                            <span data-testid="continue-button-book">Confirmar y reservar</span>
                        </button>
                    </div>
                    <div class="footer-text mt-lg" data-testid="confirm-view-agreements-footer">
                        <p data-testid="agreements-footer-data-processing-agreement-text">
                            Tus datos personales serán procesados por el negocio con el que reserves la cita. Encontrarás más información
                            <a data-testid="show-disclosure-obligation-agreement-link" class="cursor-pointer">aquí</a>.
                        </p>
                        <p data-testid="agreements-footer-cancellation-policy-agreement-text">Al reservar una cita, aceptas los
                            <a class="widget-link cursor-pointer" data-testid="deposit-terms-link">Política de cancelación de reservas</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @if (Auth::check())
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        @endif
        <div id="form_create_new_reserv"> </div>
</div>

<x-guest-layout>
 <div class="body_login" id="contentContainer_registerUserGuest">
    <div id="loaderSperaAdministrator" class="loader d-none">
        <div class="spinner"></div>
    </div>
        <div class="validationError_login_register slide-in d-flex justify-content-center position-absolute z-1" style="bottom: 50%; top: 2px; width: 100%;height: fit-content;">
            <x-jet-validation-errors class="mb-3 rounded-0" />
            @if (session('status'))
                <div class="alert alert-success mb-0 rounded-0" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="logo_name_login">
            <h1 class="afri" onclick="return_viewIndex()">{{ config('app.name') }}</h1>
        </div>
        <h1 class="naruto-sign1 afri" onclick="return_viewIndex()">{{ config('app.name') }}</h1>
        {{-- <x-jet-application-mark class="naruto-sign2"/> --}}
        {{-- <img style="" class="naruto-sign2" src="{{ asset('storage/logo/narutoNails.svg') }}" alt="Manicura pedicura Ourense uñas | {{ config('app.name') }}" /> --}}
        <h1 class="naruto-sign2 afri">Nail Art Studio</h1>
        <div class="darksoul-container">
            <div class="square" style="display: none">
                <h1 class="mt-4 afri" style="font-size: 1.5rem;color:black">REGiSTRO</h1>

            </div>
            <div class=" w-100" style="font-weight: 700">
                <form class="f-col form-container pb-0" action="{{ route('register') }}" method="post" style="font-family: 'gualazonF';font-weight: 500;">
                    @csrf
                    <div class="" style="border-bottom: 1px solid rgba(0, 0, 0, 0.259);">
                        <label class="">{{ __('Name') }}</label>
                        <input class="darksoul-input small{{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="name" value="" required>
                        <x-jet-input-error for="name"></x-jet-input-error>
                    </div>
                    <div class=" pb-2" style="border-bottom: 1px solid rgba(0, 0, 0, 0.259);">
                        <label class="">Teléfono</label>
                        <input style="width: 11rem;" placeholder="" id="telefono" class="darksoul-input small{{ $errors->has('tel') ? 'is-invalid' : '' }}" type="tel" name="telefono" value="" required>
                        <x-jet-input-error for="telefono"></x-jet-input-error>
                    </div>
                    <div class="" style="border-bottom: 1px solid rgba(0, 0, 0, 0.259);">
                        <label class="">Email</label>
                        <input class="darksoul-input small{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" value="" required>
                        <x-jet-input-error for="email"></x-jet-input-error>
                    </div>

                    <div class="darksoul-password" style="border-bottom: 1px solid rgba(0, 0, 0, 0.259);">
                        <label class="">{{ __('Password') }}</label>
                        <input class="darksoul-input small {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password"
                         required autocomplete="current-password">
                         <x-jet-input-error for="password"></x-jet-input-error>
                        {{-- <img class="m-auto eye-icon" width="18" height="18" src="https://img.icons8.com/fluency-systems-filled/48/FD7E14/visible.png" alt="visible" onclick="toggle()"/> --}}
                    </div>

                    <div class="darksoul-password"  style="border-bottom: 1px solid rgba(0, 0, 0, 0.259);">
                        <label class="">{{ __('Confirm Password') }}</label>
                        <input class="darksoul-input small {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password_confirmation"
                         required autocomplete="new-password">
                        {{-- <img class="m-auto eye-icon" width="18" height="18" src="https://img.icons8.com/fluency-systems-filled/48/FD7E14/visible.png" alt="visible" onclick="toggle()"/> --}}
                    </div>
                    <div class="row">
                        <div class=" col-lg-6 col-md-12">
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mb-3">
                                <div class="custom-control custom-checkbox d-flex">
                                    <x-jet-checkbox style="margin-right: 7px;" id="terms" name="terms" />
                                    <label class="custom-control-label label-terms" for="terms">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                    </label>
                                </div>
                            </div>
                        @endif
                        </div>
                        <div class=" col-lg-6 col-md-12 botonRegistrarse">
                            <div class=" justify-content-center d-flex">
                                <button class="darksoul-hover-fill-button" type="submit"><div class="color-fill"></div><p>Registrarse</p></button>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- <span class="loginwith text-center w-100 d-block">O conectarse con</span>
                <div class=" justify-content-center d-flex p-2">

                    <a class="aLogin" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                        </svg></a>

                    <a class="aLogin" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                        </svg></a>
                    <a class="aLogin" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                            <rect x="2" y="9" width="4" height="12"></rect>
                            <circle cx="4" cy="4" r="2"></circle>
                        </svg></a>
                    <a class="aLogin" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M44.5 20H24v8.4h11.8C34.4 33.9 30 38 24 38c-6.6 0-12-5.4-12-12s5.4-12 12-12c2.9 0 5.6 1 7.7 2.6l5.9-5.9C33.5 7.2 28.1 5 24 5 12.4 5 3 14.4 3 26s9.4 21 21 21c10.4 0 19.4-7.5 21-17.4V20h-0.5z"></path>
                        </svg>
                    </a>
                    <a class="aLogin" href="#"><svg stroke="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" class="bi bi-twitter-x" viewBox="0 0 16 16">
                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                    </svg>
                    </a>
                </div> --}}
                <hr class=" mt-2 ms-3" style="margin-right: 1rem!important">
                <div class="noRegistrado">
                    <p style=" margin-bottom:5px;text-align:center">¿Ya estas registrado?</p>
                    <div class=" justify-content-center d-flex">
                        {{-- <form action="{{ route('login') }}" method="GET"> --}}
                            <button id="insert_login" type="submit"  class="darksoul-hover-fill-button" type="button" onclick="change_view_lr('login')"><div class="color-fill"></div><p>Login</p>
                            </button>
                        {{-- </form> --}}
                    </div>
                </div>
                {{-- <span class="copy">&copy Gualazon
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </span> --}}
            </div>
        </div>

    </div>

</x-guest-layout>

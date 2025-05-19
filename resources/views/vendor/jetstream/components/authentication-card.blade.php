<div class="">
    <div class="row justify-content-center my-5">
        <div class="col-12 col-md-6 my-4">
            <div class=" text-center">
                {{-- <img style="width: 200px" class="mensajes" src="{{ asset('storage/logo/Frame.png') }}" alt="subir anuncio" /> --}}
                {{-- {{ $logo }} --}}
            {{-- <span class="claudia_script" style="position: relative;top: -50px;font-size: 6rem;">mÿa</span> --}}
        <img style="filter:drop-shadow(2px 0px 6px white);width:100%;" class="mensajes" src="{{ asset('storage/cabecera/logo_coletilla.svg') }}" alt="MYA salon de uñas Ourense manicura" />

            </div>

            <div class="card shadow-sm px-1 mx-4">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

<div class="categorias-div borde-dorado fondo_selva">
    <ul class="categorias-list m-0 d-flex no-scrollbar justify-content-center">
        <li class="align-items-center d-flex categoria-list-li hoverable-li">
            <a id="canvasCategoryId" onclick="" class="text-decoration-none" data-bs-toggle="offcanvas" href="#canvasCategory" role="button" aria-controls="canvasCategory">
                <label class="d-flex align-items-center border-0 m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                    <span class="ms-2 spanHover">Servicios</span>
                </label>
            </a>
        </li>
        <li class="align-items-center d-flex categoria-list-li">
            <a href="http://" class="text-decoration-none">
            <label class="d-flex align-items-center border-0 m-0">{{-- <img class="plus-anun" src="{{ asset('storage/barra-categorias/todas.png') }}" alt="Todas las categorias" /> --}}
                <span class="spanHover">Inicio</span>
            </label>
            </a>
        </li>
        <li class="align-items-center d-flex categoria-list-li">
            <a href="http://" class="text-decoration-none">
            <label class="d-flex align-items-center border-0 m-0">{{-- <img class="plus-anun" src="{{ asset('storage/barra-categorias/todas.png') }}" alt="Todas las categorias" /> --}}
                <span class="spanHover">Conócenos</span>
            </label>
            </a>
        </li>
        <li class="align-items-center d-flex categoria-list-li">
            <a href="http://" class="text-decoration-none">
            <label class="d-flex align-items-center border-0 m-0">{{-- <img class="plus-anun" src="{{ asset('storage/barra-categorias/todas.png') }}" alt="Todas las categorias" /> --}}
                <span class="spanHover">Productos</span>
            </label>
            </a>
        </li>
        <li class="align-items-center d-flex categoria-list-li">
            <a href="http://" class="text-decoration-none">
            <label class="d-flex align-items-center border-0 m-0">{{-- <img class="plus-anun" src="{{ asset('storage/barra-categorias/todas.png') }}" alt="Todas las categorias" /> --}}
                <span class="spanHover">Nuestro equipo</span>
            </label>
            </a>
        </li>
        <li class="align-items-center d-flex categoria-list-li">
            <a href="http://" class="text-decoration-none">
            <label class="d-flex align-items-center border-0 m-0">{{-- <img class="plus-anun" src="{{ asset('storage/barra-categorias/todas.png') }}" alt="Todas las categorias" /> --}}
                <span class="spanHover">Contacto</span>
            </label>
            </a>
        </li>
        <li class="align-items-center d-flex categoria-list-li">
            <a href="http://" class="text-decoration-none">
            <label class="d-flex align-items-center border-0 m-0">{{-- <img class="plus-anun" src="{{ asset('storage/barra-categorias/todas.png') }}" alt="Todas las categorias" /> --}}
                <span class="spanHover">Ubicación</span>
            </label>
            </a>
        </li>
    </ul>
</div>
{{-- canvas --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="canvasCategory" aria-labelledby="canvasCategoryLabel" style="background-color: #b0d7c3 !important;">
    <div class="offcanvas-header d-flex" style="padding-bottom: 1rem !important;">
        <h5 style="color: #3d795a;
        font-size: x-large;
        font-weight: 700;" class="offcanvas-title" id="offcanvasExampleLabel">SERVICIOS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    {{-- <div id="sombraNavCategory" class="sombra" style="height: 1px;width: 100%;margin-left: -6px;"></div> --}}
    <div id="scroll-menu-category" class="offcanvas-body scroll-menu-category" style="">
        <ul class="list-group list-group-flush">
            {{-- @foreach ($categorias as $categoria)  <span class=" ms-3">{{ $categoria->nombre }}</span> --}}
                <li class="list-group-item p-2 scroll-link" style="cursor: pointer;" onclick="">
                    <a href="#manicura" style="text-decoration: none; color: #3d795a;">
                        <div>
                            <span class=" ms-3">
                                MANICURA
                                <svg style="margin-top: 4.4px;" class=" float-md-end float-end" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#29363d" viewBox="0 0 24 24" part="inner-svg"><path fill-rule="evenodd" d="M9.97 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06L13.19 12 9.97 8.78a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path></svg>
                            </span>
                        </div>
                    </a>
                </li>
                <li class="list-group-item p-2 scroll-link" style="cursor: pointer;" onclick="">
                    <a href="#pedicura" style="text-decoration: none; color: #3d795a;">
                    <div>
                        <span class=" ms-3">
                            PEDICURA
                            <svg style="margin-top: 4.4px;" class=" float-md-end float-end" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#29363d" viewBox="0 0 24 24" part="inner-svg"><path fill-rule="evenodd" d="M9.97 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06L13.19 12 9.97 8.78a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path></svg>
                        </span>
                    </div>
                    </a>
                </li>
                <li class="list-group-item p-2 scroll-link" style="cursor: pointer;" onclick="">
                    <a href="#disenioMirada" style="text-decoration: none; color: #3d795a;">
                    <div>
                        <span class=" ms-3">
                            DISEÑO DE LA MIRADA
                            <svg style="margin-top: 4.4px;" class=" float-md-end float-end" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#29363d" viewBox="0 0 24 24" part="inner-svg"><path fill-rule="evenodd" d="M9.97 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06L13.19 12 9.97 8.78a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path></svg>
                        </span>
                    </div>
                    </a>
                </li>
                <li class="list-group-item p-2 scroll-link" style="cursor: pointer;" onclick="">
                    <a href="#pack" style="text-decoration: none; color: #3d795a;">
                    <div>
                        <span class=" ms-3">
                            PACK
                            <svg style="margin-top: 4.4px;" class=" float-md-end float-end" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#29363d" viewBox="0 0 24 24" part="inner-svg"><path fill-rule="evenodd" d="M9.97 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06L13.19 12 9.97 8.78a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path></svg>
                        </span>
                    </div>
                    </a>
                </li>
                <li class="list-group-item p-2 scroll-link" style="cursor: pointer;" onclick="">
                    <a href="#presoterapia" style="text-decoration: none; color: #3d795a;">
                    <div>
                        <span class=" ms-3">
                            PRESOTERAPIA
                            <svg style="margin-top: 4.4px;" class=" float-md-end float-end" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#29363d" viewBox="0 0 24 24" part="inner-svg"><path fill-rule="evenodd" d="M9.97 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06L13.19 12 9.97 8.78a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path></svg>
                        </span>
                    </div>
                    </a>
                </li>
            {{-- @endforeach --}}
        </ul>
    </div>
  </div>

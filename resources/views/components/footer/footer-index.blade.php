<footer class="footer" style="display: none;opacity:1;">
    <a  class="link-with-span"href="{{ route('logout') }}"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <img style="" class="mensajes" src="{{ asset('storage/footer/exit.svg') }}" alt="inicio" />
        <span>Salir</span>
    </a>
    <form method="POST" id="logout-form" action="{{ route('logout') }}" class="" style="display: contents">
        @csrf
    </form>
    <a class="link-with-span" href="{{ route('init_page') }}">
        <img style="" class="mensajes" src="{{ asset('storage/footer/home.svg') }}" alt="inicio" />
        <span>Inicio</span>
    </a>
    <a class="link-with-span" href="#">
        <img style="" class="mensajes" src="{{ asset('storage/footer/heart.svg') }}" alt="favoritos" />
        <span>Favoritos</span>
    </a>
    <a class="link-with-span" href="{{ route('panelAdmin_user_up') }}">
        <img style="" class="mensajes" src="{{ asset('storage/footer/plus.svg') }}" alt="vender artículo" />
        <span>Vender</span>
    </a>
    <a class="link-with-span" href="{{ route('panelAdmin_user_Message') }}" data-pannel="Mensajes">
        <img style="" class="mensajes" src="{{ asset('storage/footer/mail.svg') }}" alt="mensajes" />
        {{-- mensajes sin leer sobre--}}
        <div class="listOfContacts listOfContactNotChat messageNotReadFooter" style="width: 100%;height: calc(100% - 272px);position: relative;">
        </div>
        <span>Mensajes</span>
    </a>
    <a class="link-with-span"href="{{ route('panelAdmin_user') }}">
        <img style="" class="mensajes" src="{{ asset('storage/footer/panel.svg') }}" alt="mensajes" />
        <span>Tú</span>
    </a>
</footer>

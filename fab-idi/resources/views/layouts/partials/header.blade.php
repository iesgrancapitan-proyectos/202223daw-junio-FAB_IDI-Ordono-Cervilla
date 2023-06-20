<header
    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

    <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img src="{{ asset('img/logo.png') }}">
        </a>
    </div>

    <h1>FAB-IDI</h1>

    <div id='header-right'>
        @guest
            <div id='iconos-rrss'>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <a href="https://www.youtube.com/@RedFabIDI" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            </div>

            <a href="{{ route('login') }}" class="btn btn-principal">Login</a>
        @endguest

        @auth
        @if (Auth::user()->perfil_id == 1)
        <div>
            <a href="{{ route('gestion-videos') }}" class="btn btn-principal">Volver</a>
        </div>
    @else
        <div class="user-info">
            <span class="greeting">Bienvenid@,</span>
            <span class="username">{{ Auth::user()->nombre }}</span>
            <a href="{{ route('logout') }}" class="btn btn-danger me-2">Salir</a>
        </div>
    @endif
        @endauth


    </div>

</header>

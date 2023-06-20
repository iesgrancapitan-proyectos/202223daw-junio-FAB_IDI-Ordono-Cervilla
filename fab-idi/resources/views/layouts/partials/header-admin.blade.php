@auth
    @if (session('perfil') == 'admin')
        <header id='header-admin'>
            <div id='logout'>
                <a href="{{ route('logout') }}"><i class="fa-solid fa-power-off"></i></a>
            </div>
        </header>
    @endif
@endauth





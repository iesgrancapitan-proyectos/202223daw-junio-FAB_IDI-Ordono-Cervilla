<nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Twelfth navbar example">

    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10"
            aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample10">
            <ul class="navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ URL::to('/') }}">Inicio</a>
                </li>

                <li class="{{ Route::is('quienes-somos') ? 'active' : '' }}">
                    <a href="{{ route('quienes-somos') }}">Quiénes somos</a>
                </li>

                <li class="{{ Route::is('https://jovenesconinvestigadores.wordpress.com/') ? 'active' : '' }}">
                    <a href="https://jovenesconinvestigadores.wordpress.com/" target='_blank'>Jóvenes
                        con Investigadores</a>
                </li>

                <li class="{{ Route::is('mentorizacion') ? 'active' : '' }}">
                    <a href="{{ route('mentorizacion') }}">Mentorización</a>
                </li>

                <li class="{{ Route::is('proyectos-intercentros') ? 'active' : '' }}">
                    <a href="{{ route('proyectos-intercentros') }}">Proyectos Intercentros</a>
                </li>

                <li class="{{ Route::is('panel-colaboradores') ? 'active' : '' }}">
                    <a href="{{ route('panel-colaboradores') }}">Panel de colaboradores</a>
                </li>

                <li class="{{ Route::is('revistas') ? 'active' : '' }}">
                    <a href="#">Revistas</a>
                </li>

                <li class="{{ Request::url() === 'https://profundizaiesmartinrivero.blogspot.com/' ? 'active' : '' }}">
                    <a href="https://profundizaiesmartinrivero.blogspot.com/" target='_blank'>Blog</a>
                </li>


            </ul>
        </div>
    </div>
</nav>

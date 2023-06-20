@extends('layouts.plantilla')

@section('title', 'Mentorización')

@vite(['resources/js/altaUsuario.js'])

@section('content')


    <main id="main-mentorizacion">

        <section class="container">
            <div class="flex-item">
                <!-- alinear a la izquierda -->
                <h5 class="subtitulo">¿QUÉ ES LA MENTORIZACIÓN?</h5>
                <p>
                    La <b>investigación avanzada</b> es una parte integral del programa de materias de segundo año de
                    bachillerato,
                    que es requerido en los centros <b>educativos pertenecientes</b> a la <b>RED FAB-IDI</b>. En esta etapa,
                    los estudiantes
                    tienen la oportunidad de proponer su propio Proyecto de Investigación Propio (PIP), al finalizar el
                    primer año de bachillerato.
                </p>
                <p> Para llevar a cabo este proyecto, contarán con el <b>apoyo de investigadores, estudiantes universitarios
                        y
                        expertos de empresas externas</b>, quienes brindarán asesoramiento y consejos en los Institutos de
                    Educación
                    Secundaria (IES).
                </p>
                <p> Además, cada estudiante contará con un <b>tutor</b>, su profesor/a de la materia de investigación
                    avanzada, y
                    también podrá recibir asesoramiento de un <b>mentor</b> de investigación.
                </p>
                <p>
                    De esta manera, se promueve un <b>ambiente de aprendizaje</b> enriquecedor y se fomenta el desarrollo de
                    <b>habilidades investigativas</b> en los estudiantes.
                </p>
            </div>
            @if (Auth::guest() ||
                    (Auth::user()->join('perfiles', 'users.perfil_id', '=', 'perfiles.id')->where('perfiles.perfil', 'mentor')->count() == 0 &&
                        Auth::user()->join('colaboradores', 'users.id_colaborador', '=', 'colaboradores.id')->where('colaboradores.colaborador', 'mentor')->count() == 0))
                <!-- formulario de contacto -->
                <!-- Si no está logueado -->
                <section class="formulario mt-5 flex-item">
                    <div class="form-header">
                        <h4>INSCRIPCIÓN PARA SER MENTOR</h4>
                    </div>
                    <form class="form-body" action="{{ route('mentorizacion') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col">
                                <label class="form-label" for="tipoUsuario">TIPO DE USUARIO</label>
                                <select class="form-select" name="tipoUsuario" id="form-select-tipo-usuario" required>
                                    <option value="" selected>Selecciona el tipo de usuario</option>
                                    <option value="usuario">Usuario</option>
                                    <option value="entidad">Entidad (Instituto, Universidad, Empresa...)</option>
                                </select>
                            </div>
                            <!-- USUARIO -->
                            <div id="usuario-campos" style="display: none;">
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="nombre">NOMBRE*</label>
                                        <input type="text" class="form-control required-usuario" name="nombre-usuario">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="apellidos">APELLIDOS*</label>
                                        <input type="text" class="form-control" name="apellidos-usuario">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="email">EMAIL*</label>
                                        <input type="email" class="form-control" name="email-usuario">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="telefono">TELÉFONO</label>
                                        <input type="phone" class="form-control" name="telefono-usuario">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="twitter">TWITTER</label>
                                        <input type="text" class="form-control" name="twitter-usuario">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="instagram">INSTAGRAM</label>
                                        <input type="text" class="form-control" name="instagram-usuario">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="linkedin">LINKEDIN</label>
                                        <input type="text" class="form-control" name="linkedin-usuario">
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="mensaje">MENSAJE</label>
                                    <textarea class="form-control" name="mensaje-usuario" id="mensaje-usuario" cols="20" rows="5"></textarea>
                                </div>
                            </div>
                            <!-- ENTIDAD -->
                            <div id="entidad-campos" style="display: none;">
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="nombre">NOMBRE*</label>
                                        <input type="text" class="form-control required-entidad" name="nombre-entidad">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="apellidos">REPRESENTANTE</label>
                                        <input type="text" class="form-control" name="representante-entidad">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="email">EMAIL*</label>
                                        <input type="email" class="form-control" name="email-entidad">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="telefono">TELÉFONO</label>
                                        <input type="phone" class="form-control" name="telefono-entidad">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="web">WEB</label>
                                        <input type="text" class="form-control" name="web-entidad">
                                    </div>
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label" for="mensaje">MENSAJE</label>
                                    <textarea class="form-control" name="mensaje-entidad" id="mensaje-entidad" cols="20" rows="5"></textarea>
                                </div>
                            </div>
                            <div id="btn-mentores" class="btn-submit mb-3">
                                <input class="btn btn-principal" type="submit" value="Enviar">
                            </div>
                            <!-- si existe la variable error -->
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <!-- si existe la variable success -->
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                    </form>
                </section>
            @else
                <!-- Si está logueado -->
                <!-- si el usuario es mentor se muestra el otro formulario -->
                <!-- si el usuario en el campo perfil_id el perfil al que apunta es mentor -->
                <section class="formulario mt-5 flex-item">
                    <div class="form-header">
                        <h4>INSCRIPCIÓN PARA MENTORIZAR UN PROYECTO</h4>
                    </div>
                    <form class="form-body" action="{{ route('mentorizacion') }}" method="POST">
                        <!-- nombre -->
                        @csrf
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="nombre">NOMBRE COMPLETO*</label>
                                <input readonly type="text" class="form-control" name="nombre-completo"
                                    value="{{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}">
                            </div>
                        </div>
                        <!-- correo -->
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="email">EMAIL*</label>
                                <input readonly type="email" class="form-control" name="email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <!-- select con proyectos disponibles -->
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="proyecto">PROYECTO*</label>
                                <select class="form-select" name="proyecto">
                                    <option value="0" require selected>Selecciona un proyecto</option>
                                    @foreach ($proyectosDisponibles as $proyecto)
                                        <option value="{{ $proyecto->nombre }}">{{ $proyecto->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- enviar -->
                        <div id="" class="btn-submit mb-3">
                            <input class="btn btn-principal" type="submit" value="Enviar">
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <!-- si existe la variable success -->
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
                    <!-- si hay $mensaje -->
                    <!-- si existe la variable error -->

                </section>

            @endif

        </section>

        <!-- PROYECTOS -->
        <section id="proyectos">
            @if (Auth::guest() ||
                    (Auth::user()->join('perfiles', 'users.perfil_id', '=', 'perfiles.id')->where('perfiles.perfil', 'mentor')->count() == 0 &&
                        Auth::user()->join('colaboradores', 'users.id_colaborador', '=', 'colaboradores.id')->where('colaboradores.colaborador', 'mentor')->count() == 0))
                <div class="fondo-titulo">
                    <h4 class="titulo">PROYECTOS</h4>
                </div>
                <div class="container">
                    <p>Estos son algunos de los proyectos que se han realizado hasta ahora. Si quieres consultar
                        los proyectos actuales, debes estar registrado como mentor. Para ello, rellena el formulario de la 
                        parte superior de la página.
                    </p>
                </div>
                <section class="proyectos-mentores container">
                    @foreach ($proyectosDestacados as $proyecto)
                        <!-- poner proyecto imagen como background con url cover center center y con degradado lineal -->
                        <div class="tarjeta"
                            style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('img/proyectos/' . $proyecto->imagen) }}); background-size: cover; background-position: center center;">
                            <div class="content">
                                <h2 class="title">{{ $proyecto->nombre }}</h2>
                                <div class="none">
                                    @if ($proyecto->autor != null)
                                        <p class="text-uppercase">{{ $proyecto->autor }}</p>
                                    @endif
                                    @if ($proyecto->centro != null)
                                        <p class="text-uppercase">{{ $proyecto->centro }}</p>
                                    @endif
                                    @if ($proyecto->descripcion != null)
                                        <p class="descripcion text-justify">{{ $proyecto->descripcion }}</p>
                                    @endif
                                    @if ($proyecto->url != null)
                                        <button class="btn btn-principal"><a href="{{ $proyecto->url }}"
                                                target="_blank">Ver
                                                proyecto</a></button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
            @else
                @auth
                    <div class="fondo-titulo">
                        <h4 class="subtitulo">PROYECTOS DISPONIBLES</h4>
                    </div>
                    <div class="container">
                        <p>Estos son los proyectos que actualmente se encuentran displonibles. 
                            Si estás interesado en mentorizar alguno de ellos, rellena el formulario de la 
                            parte superior de la página indicando el proyecto que sea de tu interés. 
                            En breve nos pondremos en contacto contigo para confirmar tu mentorización.
                        </p>
                    </div>
                    <section class="proyectos-mentores container">
                        @foreach ($proyectosDisponibles as $proyecto)
                            <!-- poner proyecto imagen como background con url cover center center y con degradado lineal -->
                            <div class="tarjeta"
                                style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('img/proyectos/' . $proyecto->imagen) }}); background-size: cover; background-position: center center;">
                                <div class="content">
                                    <h2 class="title">{{ $proyecto->nombre }}</h2>
                                    <div class="none">
                                        @if ($proyecto->autor != null)
                                            <p class="text-uppercase">{{ $proyecto->autor }}</p>
                                        @endif
                                        @if ($proyecto->centro != null)
                                            <p class="text-uppercase">{{ $proyecto->centro }}</p>
                                        @endif
                                        @if ($proyecto->descripcion != null)
                                            <p class="descripcion text-justify">{{ $proyecto->descripcion }}</p>
                                        @endif
                                        @if ($proyecto->url != null)
                                            <button class="btn btn-principal"><a href="{{ $proyecto->url }}"
                                                    target="_blank">Ver
                                                    proyecto</a></button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </section>
                @endauth
            @endif

        </section>

    </main>


@endsection

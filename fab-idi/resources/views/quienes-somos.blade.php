@extends('layouts.plantilla')

@vite(['resources/js/altaUsuario.js'])

@section('title', 'Quienes Somos')

@section('content')

<main id='main-quienes-somos'>
    <section id="historia-red">
        <div id="historia">
            <h2 class="titulo">HISTORIA DEL FAB-IDI</h2>
            <p>
                En el año 2014, el <b>IES Martín Rivero de Ronda</b> inició un proyecto educativo que involucraba la creación
                de un departamento de <b>Investigación, Desarrollo e Innovación (I+D+i)</b>, en el cual profesores y
                estudiantes colaboraban utilizando la investigación científica como <b>metodología educativa</b>. Este enfoque
                fomentaba la propuesta de investigaciones, el desarrollo de inventos y la constante innovación, ya sea
                por los estudiantes actuales o por las generaciones posteriores que retomaban y mejoraban continuamente
                los trabajos previos.

            </p>
            <p>
                El volumen de investigaciones y los premios obtenidos generaron una forma de trabajo basada no solo en
                la mera realización de un proyecto, sino en la observación del <b>cambio de mentalidad</b> de los estudiantes a
                medida que avanzaban en los diferentes niveles de investigación dentro del centro educativo. Esto
                permitía que nuestro IES produjera <b>trabajos innovadores</b> y, sobre todo, estudiantes con las capacidades
                investigativas necesarias para nuestra sociedad.
            </p>
            <p>
                Si bien <b>otros centros</b> también realizan investigaciones, se busca convertir este enfoque en una
                <b>metodología estandarizada</b> para que otros institutos puedan incorporarse, y para que la universidad
                juegue un papel mucho más activo en esta formación. Además, se pretende contar con estudiantes que han
                surgido de esta <b>metodología</b> y que actúen como base y guías para los <b>nuevos estudiantes</b> que deseen
                adentrarse en el mundo de la investigación.
            </p>
        </div>
        <div id="img-red">
            <img src="{{ asset('img/colmena.png') }}" alt="colmena-fab-idi">
        </div>
    </section>

    <section class="formulario mt-5">
        <div class="form-header">
            <h4>INSCRIPCIÓN A LA RED FAB-IDI</h4>
        </div>

        <form class="form-body" action="{{ route('quienes-somos') }}" method="POST" enctype="multipart/form-data">
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
                        <textarea class="form-control" name="mensaje-usuario" id="mensaje-usuario" cols="20"
                            rows="5"></textarea>
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
                        <textarea class="form-control" name="mensaje-entidad" id="mensaje-entidad" cols="20"
                            rows="5"></textarea>
                    </div>
                </div>
                <div id="btn-crear-usuario" class="btn-submit mb-3">
                    <input class="btn btn-principal" type="submit" value="Enviar">
                </div>
        </form>
    </section>

    <div>
    @if (isset($enviado))
        @if ($enviado)
            <div class="alert alert-success mt-5" role="alert">
                <h4 class="alert-heading">¡Enhorabuena!</h4>
                <p>El formulario se ha enviado correctamente.</p>
                <hr>
                <p class="mb-0">Nos pondremos en contacto con usted cuando su solicitud sea aceptada. Gracias.</p>
            </div>
        @else
            <div class="alert alert-danger mt-5" role="alert">
                <h4 class="alert-heading">¡Error!</h4>
                <p>El formulario no se ha enviado correctamente.</p>
                <hr>
                <p class="mb-0">Por favor, inténtelo de nuevo más tarde.</p>
            </div>
        @endif
    @endif
    </div>


</main>


@endsection
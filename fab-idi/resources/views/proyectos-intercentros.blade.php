@extends('layouts.plantilla')

@section('title', 'Proyectos Intercentros')

@section('content')


<main id="main-proyectos-intercentros">
    <section class="container">
        <!-- alinear a la izquierda -->
        <h5 class="subtitulo">¿QUÉ SON LOS PROYECTOS INTERCENTROS?</h5>
        <p>
            Queremos contar con una batería de proyectos de investigación creados por los Institutos de Educación
            Secundaria (IES) de la RED, que puedan ser utilizados por los nuevos centros que se incorporen a la RED.
        </p>
        <p> Además, buscamos que los estudiantes de los diferentes centros puedan establecer contacto entre sí para
            brindarse apoyo mutuo. Los resultados de estos proyectos podrán ser compartidos y presentados conjuntamente
            en eventos como ferias o congresos.
        </p>
        <h6 class="subtitulo">¿QUIÉN PUEDE PARTICIPAR?</h6>
        <p> Todos los nuevos centros que formen parte de la RED, así como aquellos centros que no estén actualmente en
            la RED pero deseen unirse y probar.
        </p>
        <h6 class="subtitulo">¿CÓMO PARTICIPAR?</h6>
        <p>
            Para participar, es necesario redactar una solicitud dirigida al centro que ha propuesto la iniciativa.
        </p>

    </section>

    <section id="proyectos">

        <div class="fondo-titulo">
            <h4 class="titulo">PROYECTOS INTERCENTROS</h4>
        </div>

            <div class="container">
                <p>A continuación puedes ver los proyectos intercentros que se están llevando a cabo actualmente.
                </p>
            </div>
            <section class="proyectos-intercentros container">
                @foreach ($proyectosIntercentros as $proyecto)
                <!-- poner proyecto imagen como background con url cover center center y con degradado lineal -->
                <div class="tarjeta"
                    style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('img/proyectos/'.$proyecto->imagen) }}); background-size: cover; background-position: center center;">
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
                            <button class="btn btn-principal"><a href="{{ $proyecto->url }}" target="_blank">Ver
                                    proyecto</a></button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </section>

    </section>

</main>

@endsection
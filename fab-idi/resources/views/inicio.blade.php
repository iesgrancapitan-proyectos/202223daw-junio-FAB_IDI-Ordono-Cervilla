@extends('layouts.plantilla')

@section('title', 'Inicio')

@section('content')
    <main id="main-inicio">

        <section id='inicio-up'>

            <section id="inicio-videos">

                <div id="video-line-1">
                    <iframe width="560" height="315" src="{{ $videos[0]->url }}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;
                    web-share"
                        allowfullscreen></iframe>
                </div>

                <div id="video-line-2">
                    <iframe width="280" height="158" src="{{ $videos[1]->url }}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;
                    web-share"
                        allowfullscreen></iframe>
                    <iframe width="280" height="158" src="{{ $videos[2]->url }}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;
                    web-share"
                        allowfullscreen></iframe>
                </div>
                <a href="https://www.youtube.com/@RedFabIDI" target="_blank"
                    class="btn btn-principal mt-4">Ver videos</a>
            </section>

            <div id="inicio-text">
                <h3 class="titulo">¿QUÉ ES FAB-IDI?</h3>
                <p>FAB-IDI (Red de Centros Educativos con un Itinerario de Investigación) es una <b>red de de innovación
                        educativa interprovincial</b>
                    que cuenta con un itinerario de investigación desde va desde 1º de <b>ESO</b>, pasando por
                    2º de <b>bachillerato</b> y llegando incluso a <b>ciclos formativos</b>.
                    Esta red acredita a los estudiantes con capacidades demostradas
                    para <b>realizar investigaciones</b> científicas en cualquier área.
                    Tanto estudiantes como profesorado forman equipos intercentros de investigación en distintas fases o
                    niveles educativos.</p>

                <p> Nuestra metodología de enseñanza está basada en el <b>ABI+D+i (Aprendizaje Basado en la investigación,
                        desarrollo e innovación),</b>
                    la cual que permite tener excelentes resultados no solo académicos sino también convirtiendo
                    las ideas de los estudiantes en auténticas propuestas investigables.</p>

                <p>Nuestro objetivo es que el futuro se vayan incorporando más centros a nuestra RED, de forma que podamos
                    conjuntamente
                    colaborar en el <b>diseño de un protocolo de implantación de itinerarios de investigación</b>.
            </div>
        </section>

        <section id="section-premios">
            <div class="fondo-titulo">
                <h2 class="titulo">PREMIOS</h2>
            </div>
            <section id='inicio-cards'>
                @foreach ($premios as $premio)
                <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('img/premios/' . $premio->imagen) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $premio->titulo }}</h5>
                            <hr>
                            <p class="card-text text-justify">{{ $premio->descripcion }}</p>
                        </div>
                    </div>
                @endforeach
            </section>
            <a href="{{ route('mostrar-premios') }}" class="btn btn-principal mt-4">Ver más premios</a>

        </section>


    </main>

@endsection

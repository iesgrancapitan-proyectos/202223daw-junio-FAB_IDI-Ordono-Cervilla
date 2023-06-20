@extends('layouts.plantilla')

@section('title', 'Premios')

@section('content')


    <main id='main-premios'>
        <div class="gallery">

            @foreach ($premios as $premio)
                <div class="card">
                    <a href="{{ $premio->url }}" target="">
                        <figure class="gallery__thumb">
                            <img src="{{ asset('img/premios/' . $premio->imagen) }}" alt="" class="gallery__image">
                        </figure>
                        <h4 class="">{{ $premio->titulo }}</h4>
                    </a>
                </div>
            @endforeach

        </div>

    </main>


@endsection

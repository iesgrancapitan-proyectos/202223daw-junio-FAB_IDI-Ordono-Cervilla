@extends('layouts.plantilla-admin')

@section('title', 'Gestión de Vídeos')

@section('content')
    <main id='main-gestion-videos' class='main-admin'>

        <section id="section-table-videos">
            <div class="alertas">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class='btn-container-vista'>
                <a href="{{ url('/') }}" class="btn"><i class="fa-solid fa-eye"><span> Vista</span></i></a>
            </div>
            <table class="table styled-table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">URL</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                        <tr>
                            <td>{{ $video['nombre'] }}</td>
                            <td>{{ $video['url'] }}</td>
                            <td><a href="{{ url('gestion-videos/editar/' . $video['id']) }}" class="btn btn-admin-edit"><i
                                        class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

    </main>

@endsection

@extends('layouts.plantilla-admin')

@section('title', 'Editar vídeos')

@section('content')
    <main id='main-editar-videos' class='main-admin'>
        <section id="section-editar-videos">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


            <div class="card">
                <div class='page-subtitle'>
                    <h2>EDITAR VÍDEO</h2>
                </div>
                <form method="POST" action="{{ route('actualizar-video', ['id' => $video['id']]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $video['nombre'] }}">
                    </div>

                    <div class="form-group">
                        <label for="url" class="form-label">URL</label>
                        <input type="text" class="form-control" id="url" name="url"
                            value="{{ $video['url'] }}">
                    </div>

                    <input type="hidden" name="id" value="{{ $video['id'] }}">

                    <div class="form-group">
                        <button type="submit" class="btn btn-admin-save">Guardar cambios</button>
                    </div>
                </form>
            </div>




        </section>
    </main>

@endsection

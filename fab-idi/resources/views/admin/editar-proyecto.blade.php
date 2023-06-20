@extends('layouts.plantilla-admin')

@section('title', 'Editar Proyecto')

@vite(['resources/js/actualizarContador.js'])

@section('content')

    <main id='main-editar-proyecto' class='main-admin'>
        <div class='page-subtitle'>
            <h2>EDITAR PROYECTO</h2>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <form method="POST" action="{{ route('guardar-cambios-proyecto') }}" enctype="multipart/form-data"
            id='form-editar-proyecto' class='styled-form'>
            @csrf
            <div class="form-group">
                <select class="form-control" id="form-select-tipo-proyecto" name="select-tipo-proyecto">
                    <option value="1" {{ $proyecto->tipo_proyecto_id == 1 ? 'selected' : '' }}>PIP</option>
                    <option value="2" {{ $proyecto->tipo_proyecto_id == 2 ? 'selected' : '' }}>Intercentros</option>
                </select>
            </div>
            <hr>

            <div id="pip-campos">
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="nombre">Nombre*</label>
                        <input type="text" class="form-control" name="nombre-proyecto" value="{{ $proyecto->nombre }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor*</label>
                        <input type="text" class="form-control" name="autor-proyecto" value="{{ $proyecto->autor }}"
                            required>
                    </div>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="centro">Centro*</label>
                        <input type="text" class="form-control" name="centro-proyecto" value="{{ $proyecto->centro }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="curso academico">Curso Académico*</label>
                        <select class="form-control" name="select-curso-academico" required>
                            @foreach ($cursosAcademicos as $curso)
                                <option value="{{ $curso->id }}"
                                    {{ $proyecto->curso_academico_id == $curso->id ? 'selected' : '' }}>
                                    {{ $curso->curso_academico }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="form-row-3">
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" name="url-proyecto" value="{{ $proyecto->url }}">
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control" name="imagen-proyecto">
                        <span for="foto">*La imagen no debe pesar más de 2mb. Formatos admitidos: jpg, png, webp.</span> 
                    </div>
                    <div class="form-group">
                        <label for="disponible">Puede visualizarse en la web</label>
                        <div>
                            <label>
                                <input type="radio" name="disponible" value="1" required
                                    {{ $proyecto->disponible == 1 ? 'checked' : '' }}>
                                Sí
                            </label>
                            <label>
                                <input type="radio" name="disponible" value="0" required
                                    {{ $proyecto->disponible == 0 ? 'checked' : '' }}>
                                No
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-row-1">
                    <div class="form-group">
                        <label for="centro">Descripción*</label>
                        <textarea type="text" class="form-control" name="descripcion-proyecto" required>{{ $proyecto->descripcion }}</textarea>
                    </div>
                </div>

                <div class='container-contador-boton'>
                    <div class='contador-caracteres-container'>
                        <p>Caracteres restantes: <span class='contador-caracteres'>240</span></p>
                    </div>
                </div>
    
                <input type="hidden" name="id-proyecto" value="{{ $proyecto->id }}">
                <div class='btn-container'>
                    <button type="submit" class="btn btn-admin-save">Guardar cambios</button>
                </div>

            </div>
        </form>

    </main>


@endsection

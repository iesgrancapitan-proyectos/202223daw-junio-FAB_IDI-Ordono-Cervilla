@extends('layouts.plantilla-admin')

@section('title', 'Crear Proyecto')

@vite(['resources/js/actualizarContador.js'])

@section('content')

    <main id='main-crear-proyecto' class='main-admin'>
        <div class='page-subtitle'>
            <h2>ALTA PROYECTO</h2>
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
        <form method="POST" action="{{ route('guardar-proyecto') }}" enctype="multipart/form-data"
            id='form-crear-proyecto'class='styled-form'>
            @csrf
            <div class="form-group">
                <select class="form-control" id="form-select-tipo-proyecto" name="select-tipo-proyecto">
                    <option value="" selected>Selecciona el tipo de proyecto</option>
                    <option value="1">PIP</option>
                    <option value="2">Intercentros</option>
                </select>
            </div>
            <hr>

            <div id="pip-campos">
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="nombre">Nombre*</label>
                        <input type="text" class="form-control" name="nombre-proyecto" required>
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor*</label>
                        <input type="text" class="form-control" name="autor-proyecto" required>
                    </div>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="centro">Centro*</label>
                        <input type="text" class="form-control" name="centro-proyecto" required>
                    </div>
                    <div class="form-group">
                        <label for="curso academico">Curso Académico*</label>
                        <select class="form-control" name="select-curso-academico" required>
                            @foreach ($cursosAcademicos as $curso)
                                <option value="{{ $curso->id }}">{{ $curso->curso_academico }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row-3">
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" name="url-proyecto">
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control" name="imagen-proyecto">
                        <span for="foto">*La imagen no debe pesar más de 2mb. Formatos admitidos: jpg, png, webp.</span> 
                    </div>
                    <div class="form-group">
                        <label for="disponible">Puede visualizarse en la web</label>
                        <div>
                            <label><input type="radio" name="disponible" value="1" required> Sí</label>
                            <label><input type="radio" name="disponible" value="0" required> No</label>
                        </div>
                    </div>
                </div>

                <div class="form-row-1">
                    <div class="form-group">
                        <label for="centro">Descripción*</label>
                        <textarea type="text" class="form-control" name="descripcion-proyecto" maxlength="240" required></textarea>
                        </textarea>
                    </div>
                </div>

                <div class='container-contador-boton'>
                    <div class='contador-caracteres-container'>
                        <p>Caracteres restantes: <span class='contador-caracteres'>240</span></p>
                    </div>
                    <div class='boton-crear'>
                    <button type="submit" class="btn btn-admin-save">Crear</button>
                    </div>
                </div>

            </div>
        </form>

    </main>


@endsection

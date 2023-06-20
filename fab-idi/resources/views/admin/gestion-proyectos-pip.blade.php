@extends('layouts.plantilla-admin')

@section('title', 'Gestión de Proyectos PIP')

@vite(['resources/js/gestionProyectosPip.js'])

@section('content')
    <script>
        //Para cargar la imagen de perfil en el archivo js
        let rutaImagen = "{{ asset('img/proyectos/') }}";
    </script>

    <main id='main-gestion-proyectos-pip' class='main-admin'>

        {{-- Modal para confirmar la eliminación de un proyecto --}}
        <div id='modal-eliminacion' class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Eliminar elemento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p></p>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-admin-delete">Confirmar Eliminación</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sección para gestionar proyectos pip destacados --}}
        <section id="section-table-proyectos-destacados-pip">

            {{-- Mensajes de aviso --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Botón que enruta a la vista --}}
            <div class='btn-container-vista'>
                <a href="{{ url('/mentorizacion') }}" class="btn"><i class="fa-solid fa-eye"><span>
                            Vista</span></i></a>
            </div>

            <div class='page-subtitle'>
                <h2>PROYECTOS DESTACADOS</h2>
            </div>

            <table class="table styled-table">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-tabla-proyectos-pip-destacados">
                </tbody>
            </table>
        </section>

{{-- Sección que los últimos 5 proyectos --}}
        <section id="section-table-proyectos-pip-listado">
            <div class='page-subtitle'>
                <h2>LISTADO DE PROYECTOS</h2>
            </div>

            <div class="input-group styled-input-group">
                <span class="input-group-text" id="">Buscar proyecto por nombre</span>
                <input type="text" class="input-group-text" name="buscar" id="buscar-proyecto-pip">
                <a href="{{ url('gestion-proyectos/crear') }}" class="btn btn-admin-add"><i
                        class="fa fa-circle-plus"></i></a>
            </div>

            <table class="table styled-table">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-tabla-proyectos-pip">
                </tbody>
            </table>
        </section>

    </main>

@endsection

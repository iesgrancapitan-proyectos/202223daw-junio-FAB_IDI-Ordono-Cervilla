@extends('layouts.plantilla-admin')

@section('title', 'Gestión de Premios')

@vite(['resources/js/gestionPremios.js'])

@section('content')
    <script>
        //Para cargar la imagen de perfil en el archivo js
        let rutaImagen = "{{ asset('img/premios/') }}";
    </script>

    <main id="main-gestion-premios" class='main-admin'>

        {{-- Modal para confirmar la eliminación de un premio --}}
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


        {{-- Sección para gestionar premios destacados --}}
        <section id="section-table-premios-destacados">

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
                <a href="{{ url('/') }}" class="btn"><i class="fa-solid fa-eye"><span> Vista</span></i></a>
            </div>

            <div class='page-subtitle'>
                <h2>PREMIOS DESTACADOS</h2>
            </div>

            <table class="table styled-table">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Web</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-tabla-premios-destacados">
                </tbody>
            </table>
        </section>

        {{-- Sección que los últimos 5 premios --}}
        <section id="section-table-premios-listado">
            <div class='page-subtitle'>
                <h2>LISTADO DE PREMIOS</h2>
            </div>

            <div class="input-group styled-input-group">
                <span class="input-group-text" id="">Buscar premio por nombre</span>
                <input type="text" class="input-group-text" name="buscar" id="buscar-premio">
                <a href="{{ url('gestion-premios/crear-premio') }}" class="btn btn-admin-add"><i
                        class="fa fa-circle-plus"></i></a>
            </div>

            <table class="table styled-table">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Web</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-tabla-premios">
                </tbody>
            </table>
        </section>

    </main>

@endsection

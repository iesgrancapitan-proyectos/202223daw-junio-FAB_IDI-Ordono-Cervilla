@extends('layouts.plantilla-admin')

@vite('resources/js/gestionContrasenas.js')

@section('title', 'Gestión contrasenas')

@section('content')

    <main id='main-gestion-contrasenas' class='main-admin'>
        <div class="input-group styled-input-group">
            <span class="input-group-text my-4">Buscar usuario</span>
            <input type="text" class="input-group-text" name="buscar" id="buscar-gestion-contrasenas">
        </div>
        <section id="section-table-videos">
            <div class="alertas">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
            <table class="table styled-table">

                <thead class='table-header'>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Renovar contraseña</th>
                    </tr>
                </thead>
                <tbody id="tbody-tabla-gestion-contrasenas">
                </tbody>
            </table>

    </main>
@endsection

@extends('layouts.plantilla-admin')

@vite(['resources/js/altaUsuario.js'])

@section('title', 'Crear Usuario')

@section('content')

    <main id='main-crear-usuario' class='main-admin'>
        <div class='page-subtitle'>
            <h2>ALTA USUARIO</h2>    
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
        <form method="POST" action="{{ route('guardar-usuario') }}" enctype="multipart/form-data" id='form-crear-usuario'class='styled-form'>
            @csrf
            <div class="form-group">
                <select class="form-control" id="form-select-tipo-usuario" name="select-tipo-usuario">
                    <option value="" selected>Selecciona el tipo de usuario</option>
                    <option value="usuario">Usuario</option>
                    <option value="entidad">Entidad</option>
                </select>
            </div>
            <hr>
                <div id="usuario-campos" style="display: none;">
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="nombre">Nombre*</label>
                        <input type="text" class="form-control required-usuario" name="nombre-usuario" >
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos*</label>
                        <input type="text" class="form-control" name="apellidos-usuario" >
                    </div>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="profile">Perfil*</label>
                        <select class="form-control" name="select-perfil-usuario">
                            <option value="1">Admin</option>
                            <option value="2" selected>Usuario</option>
                            <option value="3">Mentor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="colaborador">Tipo de Colaborador*</label>
                        <select class="form-control" name="select-tipo-colaborador" >
                            <option value="1" selected>Ninguno</option>
                            <option value="2">Embajador</option>
                            <option value="3">Mentor</option>
                            <option value="4">Instituto</option>
                        </select>
                    </div>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" name="email-usuario" >
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="phone" class="form-control" name="telefono-usuario">
                    </div>
                </div>

                <div class="form-row-3">
                    <div class="form-group">
                        <label for="twitter">Cuenta twitter</label>
                        <input type="text" class="form-control" name="twitter-usuario">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Cuenta instagram</label>
                        <input type="text" class="form-control" name="instagram-usuario">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">Cuenta linkedin</label>
                        <input type="text" class="form-control" name="linkedin-usuario">
                    </div>
                </div>

                
                <div class="form-row-1">
                    <div class="form-group">
                        <label for="phot">Foto</label>
                        <input type="file" class="form-control" name="foto-usuario">
                        <span for="foto">*La imagen no debe pesar más de 2mb. Formatos admitidos: jpg, png, webp.</span> 
                    </div>
                </div>
            </div>

            <div id="entidad-campos" style="display: none;">
                <div class="form-row-3">
                    <div class="form-group">
                        <label for="nombre">Nombre*</label>
                        <input type="text" class="form-control required-entidad" name="nombre-entidad">
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Representante</label>
                        <input type="text" class="form-control" name="representante-entidad">
                    </div>
                    <div class="form-group">
                        <label for="colaborador">Tipo de Colaborador*</label>
                        <select class="form-control" name="select-tipo-colaborador-entidad" >
                            <option value="1" selected>Ninguno</option>
                            <option value="2">Embajador</option>
                            <option value="3">Mentor</option>
                            <option value="4">Instituto</option>
                        </select>
                    </div>
                </div>
                <div class="form-row-3">
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" name="email-entidad" >
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="phone" class="form-control" name="telefono-entidad">
                    </div>
                    <div class="form-group">
                        <label for="web">Web</label>
                        <input type="text" class="form-control" name="web-entidad" >
                    </div>
                </div>
                <div class="form-row-1">
                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <input type="file" class="form-control" name="imagen-entidad">
                    </div>
                </div>
            </div>
            <div class='btn-container'>
                <button type="submit" class="btn btn-admin-save">Crear</button>
            </div>

        </div>
        </form>

    </main>


@endsection

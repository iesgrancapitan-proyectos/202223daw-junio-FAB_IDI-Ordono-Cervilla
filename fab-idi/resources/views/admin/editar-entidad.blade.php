@extends('layouts.plantilla-admin')


@section('title', 'Editar Entidad')

@php 
$options = [
    ['value' => 1, 'label' => 'Ninguno'],
    ['value' => 2, 'label' => 'Embajador'],
    ['value' => 3, 'label' => 'Mentor'],
    ['value' => 4, 'label' => 'Instituto']
];
@endphp

@section('content')

<main id='main-crear-usuario' class='main-admin'>
    <div class='page-subtitle'>
        <h2>EDITAR ENTIDAD</h2>
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
    <form method="POST" action="{{ route('guardar-cambios-entidad') }}" enctype="multipart/form-data"
        id='form-crear-usuario' class='styled-form'>
        @csrf
        <div id="entidad-campos">
            <div class="form-row-3">
                <div class="form-group">
                    <label for="nombre">Nombre*</label>
                    <input type="text" class="form-control" name="nombre-entidad" require value="{{$entidad->nombre}}">
                </div>
                <div class="form-group">
                    <label for="apellidos">Representante</label>
                    <input type="text" class="form-control" name="representante-entidad"
                        value="{{$entidad->representante}}">
                </div>
                <div class="form-group">
                    <label for="colaborador">Tipo de Colaborador*</label>
                    <select class="form-control" name="select-tipo-colaborador-entidad">
                            @foreach ($options as $option)
                            @php
                            $selected = ($option['value'] == $entidad->colaborador_id) ? 'selected' : '';
                            @endphp
                            <option value="{{ $option['value'] }}" {{ $selected }}>{{ $option['label'] }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row-2">
            
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="phone" class="form-control" name="telefono-entidad">
                </div>
                <div class="form-group">
                    <label for="web">Web</label>
                    <input type="text" class="form-control" name="web-entidad">
                </div>
            </div>
            <div class="form-row-1">
                <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="file" class="form-control" name="imagen-entidad">
                    <span for="foto">*La imagen no debe pesar más de 2mb. Formatos admitidos: jpg, png, webp.</span> 
                </div>
            </div>
        </div>
        <input type="hidden" name="id-entidad" value="{{ $entidad->id }}">
        <div class='btn-container'>
            <button type="submit" class="btn btn-admin-save">Guardar Cambios</button>
        </div>

        </div>
    </form>

</main>


@endsection
@extends('layouts.plantilla')

@section('title', 'Regenerar contraseña')

@section('content')

<main>

<div class="row justify-content-center mt-5 ">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Obtener nueva contraseña</h3>
            </div>
            <div class="card-body">
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <form action="{{ route('regenerar-contrasena') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Introduce tu email de usuario</label>
                        <input type="email" name="email" id="email" class="form-control">
                        @error('email')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Regenerar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</main>
@endsection
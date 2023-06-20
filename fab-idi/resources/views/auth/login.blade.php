@extends('layouts.plantilla')

@section('title', 'Login')

@section('content')

<main id='main-login-form'>

<div class="row justify-content-center mt-5 ">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Login</h3>
            </div>
            <div class="card-body">
                
                {{-- Mensajes informativos de logueo --}}
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control">
                        @error('email')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        
                        <label for="password" class="form-label">Password</label>
                        <div style="display:flex">
                        <input type="password" name="password" id="password" class="form-control">
                        <button type="button" id="togglePassword" class="btn btn-outline-success m-2" onclick="togglePasswordVisibility()">
                            <i class="fas fa-eye"></i>
                        </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('olvidar-contrasena') }}">He olvidado mi contraseña</a>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

</main>
@endsection

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var toggleButton = document.getElementById("togglePassword");
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            passwordInput.type = "password";
            toggleButton.innerHTML = '<i class="fas fa-eye"></i>';
        }
    }
</script>
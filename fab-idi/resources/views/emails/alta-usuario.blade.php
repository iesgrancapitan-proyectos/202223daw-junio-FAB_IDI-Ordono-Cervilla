@php
    use Illuminate\Contracts\Mail\Mailable;
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta usuario Red FAB-IDI</title>
</head>
<body>
    <h1>Alta usuario Red FAB-IDI</h1>
    <p>Hola, {{ $usuario->nombre }}</p>
    <p>Ya formas parte de la Red FAB-IDI. A continuación, encontrarás los detalles para acceder a tu perfil:</p>
    <p>Tu cuenta de acceso es: {{ $usuario->email }}</p>
    <p>Tu nueva contraseña es: {{ $randomPassword }}</p>
    <p>Haz click en el siguiente enlace: <a href="http://127.0.0.1:8000/login">FAB-IDI</a></p>
    <p>Un saludo y bienvenido/a.</p>
</body>
</html>

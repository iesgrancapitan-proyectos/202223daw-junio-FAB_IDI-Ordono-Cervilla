<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Inscripción para mentorizar un Proyecto</h1>
<h2> PROYECTO: {{ $data['proyecto'] }}</h2>
  <p> Datos del solicitante:</p>
  <ul>
    <li>Nombre Completo: {{ $data['nombreCompleto'] }}</li>
    <li>Correo Electrónico: {{ $data['email'] }}</li>
    <li> Proyecto: {{ $data['proyecto'] }}</li>
  </ul>
</body>
</html>
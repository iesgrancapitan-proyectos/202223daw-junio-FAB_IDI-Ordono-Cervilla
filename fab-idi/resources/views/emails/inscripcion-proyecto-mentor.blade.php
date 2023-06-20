<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Inscripción para formar parte de la Red FAB-IDI</h1>
  <h2> Inscripción como ENTIDAD</h2>
  <p> Datos del solicitante:</p>
  <ul>
    <li>Nombre: {{ $data['nombre'] }}</li>
    <li>representante: {{ $data['representante'] }}</li>
    <li>Email: {{ $data['email'] }}</li>
    <li>Teléfono: {{ $data['telefono'] }}</li>
    <li>Web: {{ $data['web']}}</li>
    <li>Mensaje: {{ $data['mensaje'] }}</li>
  </ul>
</body>
</html>
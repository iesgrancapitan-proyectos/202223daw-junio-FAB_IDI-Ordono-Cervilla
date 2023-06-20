<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Inscripción para Mentorizar un proyecto</h1>
  <p>Un mentor ha solicitado mentorizar un proyecto:</p>
    <p>Estos son los datos del mentor:</p>
  <ul>
    <li>Nombre: {{ $data['nombreCompleto'] }}</li>
    <li>Email: {{ $data['email'] }}</li>
    <li>Proyecto: {{ $data['proyecto'] }}</li>
  </ul>
</body>
</html>
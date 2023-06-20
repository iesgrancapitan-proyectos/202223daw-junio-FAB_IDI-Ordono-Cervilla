<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Inscripción como mentor</h1>
  <p>Has recibido un nuevo mensaje para dar de alta un mentor:</p>
    <p>Estos son los datos del solicitante:</p>
    @if ($data['tipoUsuario'] == 'usuario')
    <h2> Inscripción como USUARIO</h2>
    @else
    <h2> Inscripción como ENTIDAD</h2>
    @endif
    <p> Datos del solicitante:</p>
    <ul>
      <li>Nombre: {{ $data['nombre']}}</li>
    @if ($data['tipoUsuario'] == 'usuario')
      <li>Apellidos: {{ $data['apellidos'] }}</li>
      <li>Email: {{ $data['email'] }}</li>
      <li>Teléfono: {{ $data['telefono'] }}</li>
      <li>Redes sociales: 
          <ul>
              <li>Twitter: {{ $data['twitter'] }}</li>
              <li>Instagram: {{ $data['instagram'] }}</li>
              <li>Linkedin: {{ $data['linkedin'] }}</li>
          </ul>
      </li>
    @else
      <li>representante: {{ $data['representante'] }}</li>
      <li>Email: {{ $data['email'] }}</li>
      <li>Teléfono: {{ $data['telefono'] }}</li>
      <li>Web: {{ $data['web'] }}</li>
    @endif
      <li>Mensaje: {{ $data['mensaje'] }}</li>
    </ul>
</body>
</html>
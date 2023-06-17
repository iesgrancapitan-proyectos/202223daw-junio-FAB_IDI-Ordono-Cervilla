# Conclusiones

## Grado de consecución de objetivos

### Objetivos generales
Objetivo                                                                       | Grado de consecución |
| ------------------------------------------------------------------------------ | -------------------- |
| Gestionar los diferentes proyectos que se llevan a cabo | Realizado |
| Facilitar la comunicación entre los diferentes miembros del equipo de cada proyecto |  Realizado |
| El usuario puede visualizar los videos enlazados al canal de Youtube                                                              | Realizado |
| La aplicación debe ser fácil de usar                                                | Realizado |
| Debe contar con una interfaz intuitiva y atractiva                                                              | Realizado |
| Debe permitir la personalización de la interfaz para adaptarse a las necesidades de cada usuario                                                             | Realizado |


### Objetivos enfocados al Usuario
| Objetivo                                                                       | Grado de consecución |
| ------------------------------------------------------------------------------ | -------------------- |
| El usuario puede loguearse  | Realizado |
| El usuario puede recuperar la contraseña |  Realizado |
| El usuario puede visualizar los videos enlazados al canal de Youtube                                                              | Realizado |
| El usuario puede visualizar los premios de la red                                                       | Realizado |
| El usuario puede solicitar formar parte de la red a través de un formulario                                                                | Realizado |
| El usuario puede solicitar ser mentor a través de un formulario                                                                 | Realizado |
| El usuario puede solicitar mentorizar uno de los proyectos disponibles de la red a través de un formulario mínimo                                                         | Realizado |
| El usuario puede visualizar los diferentes proyectos                                                    | Realizado |
| El usuario puede visualizar aquellos usuarios o entidades que colaboran en la red                                                    | Realizado |
| El usuario puede visualizar el blog de noticias relacionadas con FAB-IDI                                             | Realizado |


### Objetivos enfocados al Administrador

| Objetivo                                                                       | Grado de consecución |
| ------------------------------------------------------------------------------ | -------------------- |
|  | Realizado |
| El administrador puede gestionar los usuarios. Crear, editar y eliminar. |  Realizado |
| El administrador puede gestionar los premios. Crear, editar y eliminar.                                                         | Realizado |
| El administrador puede gestionar los videos. Editar.                                                      | Realizado |
| El administrador puede gestionar los proyectos. Crear, editar y eliminar.                                                               | Realizado |
| El administrador puede gestionar las contraseñas. Generar nuevas contraseñas.                                            


## Problemas encontrados

Durante el desarrollo de la aplicación hemos encontrado algunos problemas que han dificultado el desarrollo de la misma. A continuación se detallan los problemas encontrados y las soluciones que se han aplicado.

* Uno de los problemas que hemos tenido ha sido la poca disponibilidad horaria que hemos tenido durante la semana ya que nuestro horario de prácticas se extendía desde las 9:00 hasta las 14:00 y desde las 16:00 hasta las 18:30. Esto nos ha obligado a trabajar en el proyecto después de largas jornadas y los fines de semana. 

* Otro de los problemas que hemos encontrado ha sido que los propios clientes no tenían claro lo que querían en un principio. Esto nos ha obligado a realizar varios cambios en el diseño de la aplicación y en la base de datos. De hecho, hay partes del proyecto que se han ido implementando durante este tiempo (canal de youtube, etc.) y otras que aun no están implementadas y por lo tanto no se han podido incluir en la aplicación (revistas,etc).

* El siguiente problema ha sido el desconocimiento de Laravel por parte de los integrantes del equipo. A pesar de que la elección del framework fue motu propio con el objetivo de aprender una nueva tecnología, hemos tenido que aprender a utilizar el framework a medida que íbamos desarrollando la aplicación mediante distintos tutoriales y documentación. Esto ha supuesto un retraso en el desarrollo de la aplicación.

* Otro problema que hemos tenido que afrontar ha sido con el servidor. Inicialmente la aplicación iba a estar alojada en el servidor del instituto pero debido a frecuentes problemas de desconexión, decidimos desarrollar la aplicación en una máquina local ayudándonos con el software XAMPP y usando GitHub para alojar nuestro proyecto. Esto nos ha permitido trabajar de forma más cómoda y rápida.

* El último de los problemas que tuvimos fue con el envío de correos electrónicos. Para poder hacer el envío era necesario configurar el fichero .env con las credenciales de un correo electrónico, pero no veíamos que fuese seguro que estas estuviesen visibles o que los clientes nos tuviesen que compartir dichas credenciales. Por este motivo tuvimos que investigar una forma de hacer el envío de correos de forma segura. Encontramos que en la configuración de la cuenta de correo electrónico se podía habilitar el acceso a aplicaciones menos seguras que nos generaba una clave alternativa para tener acceso. Esto nos permitió hacer el envío de correos de forma segura sin tener que compartir las credenciales de la cuenta de correo electrónico.

## Futuras mejoras

A continuación se detallan las futuras mejoras que se podrían aplicar a la aplicación:

* El panel de administración cuenta con la opción de eliminar cualquier registro de las tablas usuarios, premios y proyectos. Sin embargo en la base de datos los registros no se eliminan sino que se marcan como activo = false. De esta forma se  evita la pérdida del registro. En un futuro se podría implementar un sistema de recuperación de activación de registros eliminados.

* Tanto en la vista del usuario como en el panel de administración puede observarse una página llamada Revistas que no está implementada debido a que a fecha de exposición del proyecto no contábamos con los recursos necesarios para ello. En un futuro se podría implementar esta página para que el usuario pueda visualizar las revistas de la red.

* Las contraseñas de los usuarios se generan de forma aleatoria y se envían al correo electrónico del usuario. En un futuro se podría implementar un sistema donde el usuario pueda poner su propia contraseña.
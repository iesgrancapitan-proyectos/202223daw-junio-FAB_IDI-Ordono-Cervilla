## Descripción del proyecto
Aplicación web para centralizar los diferentes proyectos y actividades llevados a cabo por la red de innovación educativa interprovincial FAB-IDI (Red de Centros Educativos con un Itinerario de Investigación).
Permite conocer el proyecto Fábrica de Ideas, obtener información de proyectos de investigación vigentes y disponibles en el curso actual  así como permitir la inscripción/participación en los mismos.

## Instalación

1. Clonación del repositorio

Crea una nueva carpeta en tu sistema local donde clonar los archivos del proyecto fab-idi.

Repsitorios https://github.com/iesgrancapitan-proyectos/202223daw-junio-FAB_IDI-Ordonez-Cervilla.git

root@fabidi:/var/www/fab-idi# ls
README.md  bootstrap      config        package-lock.json  public     sh.html  users.txt
app        composer.json  database      package.json       resources  storage  vendor
artisan    composer.lock  node_modules  phpunit.xml        routes     tests    vite.config.js

   Nota: debe existir un directorio vendor bajo el directorio principal del proyecto (supongamos /var/www/fab-idi)

2.  Descarga e instalación de Composer en tu dispositivo:

    - Visita la página oficial de Composer en su página oficial y descarga el archivo composer.exe correspondiente.   Ejecuta el archivo descargado para iniciar el proceso  de instalación.
  -   Durante la instalación, se te solicitará establecer la ruta de PHP. Asegúrate de tener XAMPP u otro entorno de desarrollo con PHP instalado previamente.
  -   Verificar la instalación de Composer: en la terminal ejecutar  el comando
           composer -v 
      Nota: Si Composer está correctamente instalado, verás información sobre la versión instalada y otros detalles.

   -    Una vez que hayas instalado Composer y clonado el proyecto en la carpeta correspondiente, ir al directorio raíz del proyecto clonado y ejecutar:
           composer update

3. Configurar la base de datos, sigue estos pasos:

    - Abre/crea el archivo .env que se debe encontrar en el directorio raíz del proyecto.
    - En el archivo .env, busca las siguientes líneas de código y completa los campos correspondientes con los datos de tu base de datos local.
    DB_CONNECTION=mysql
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=

    Correo:
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=
    MAIL_PASSWORD=
    MAIL_ENCRYPTION=tls

    -     Ejecuta el siguiente comando para crear las tablas de la base de datos:
         php artisan migrate


4. Ejecuta los siguientes comando para iniciar el servidor de desarrollo:

        php artisan serve

        npm run dev --host 
        (h  y después r para reinicar el servicio)

5. Crea un site con DocumentRoot apuntando a la carpeta bajo /var/www en el que hayas desplegado el proyecto (ej: /var/www/fab-idi).
Abre una terminal o línea de comandos en el directorio raíz del proyecto.

6. Activa el site, reinicia el servicio web  y abre un navegador web con la direccion del site  

## Información sobre cómo usarlo
 [Manual de usuario](https:://github.com/iesgrancapitan-proyectos/202021daw_junio_Brilla-DavidCastilla-MariaMoreno/wiki/Manual_Usuario)
 Manual del administrador : 


## Autores
Alumnas: María Cervilla y Virginia Ordoño
Tutora: Carmen Tripiana

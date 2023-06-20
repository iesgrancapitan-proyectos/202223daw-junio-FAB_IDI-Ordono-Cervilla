## Descripción del proyecto
Aplicación web para centralizar los diferentes proyectos y actividades llevados a cabo por la red de innovación educativa interprovincial FAB-IDI (Red de Centros Educativos con un Itinerario de Investigación).
Permite conocer el proyecto Fábrica de Ideas, obtener información de proyectos de investigación vigentes y disponibles en el curso actual  así como permitir la inscripción/participación en los mismos.


## Despliegue en Producción.

1. Clonación del repositorio.

Crea una nueva carpeta en tu sistema local donde clonar los archivos del proyecto fab-idi.

Repsitorios https://github.com/iesgrancapitan-proyectos/202223daw-junio-FAB_IDI-Ordonez-Cervilla.git

root@fabidi:/var/www/fab-idi# ls
README.md  bootstrap      config        package-lock.json  public     sh.html  users.txt
app        composer.json  database      package.json       resources  storage  vendor
artisan    composer.lock  node_modules  phpunit.xml        routes     tests    vite.config.js

   Nota1: debe existir un directorio vendor bajo el directorio principal del proyecto (supongamos /var/www/fab-idi)
   Nota2: asegurate que el directorio "storage" tiene permisos de escritura para el user  www-data

2.  Descarga e instalación de Composer en tu dispositivo:

    - Visita la página oficial de Composer en su página oficial y descarga el archivo composer.exe correspondiente.   Ejecuta el archivo descargado para iniciar el proceso  de instalación.
  -   Durante la instalación, se te solicitará establecer la ruta de PHP. Asegúrate de tener XAMPP u otro entorno de desarrollo con PHP instalado previamente.
  -   Verificar la instalación de Composer: en la terminal ejecutar  el comando
        ##   composer -v 
      Nota: Si Composer está correctamente instalado, verás información sobre la versión instalada y otros detalles.

   -    Una vez que hayas instalado Composer y clonado el proyecto en la carpeta correspondiente, ir al directorio raíz del proyecto clonado (ej: /var/www/fab-idi)  y ejecutar:
         ##   composer update
         ## composer dump-autoload -o
      Nota: el composer dump-autoload suele ser la solución  si ocurre el error   "PHP Fatal error: Uncaught ReflectionException: Class "view" does not exist in /var/www/proyecto/vendor/laravel/framework/src/Illuminate/Container/Container.php"

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

    -     Ejecuta el siguiente comando publica todo tu esquema en la base de datos. También genera una tabla en la base de datos.
       ##   php artisan migrate


4.   Ir al directorio raiz del proyecto (ej. /var/www/fab-idi) y ejecutar:
     - Para ViteJS (estilos) :      ## npm run build

   Revisar la configuración de los archivos :  vite.config.js ,  package-lock.json y  package.json

5. Crea un site con DocumentRoot apuntando a la carpeta bajo /var/www en el que hayas desplegado el proyecto (ej: /var/www/fab-idi).
Abre una terminal o línea de comandos en el directorio raíz del proyecto.

6. Activa el site, reinicia el servicio web  y abre un navegador web con la direccion del site  


## Entorno de desarrollo.
    Se ha usado viteJS (con NodeJS),  PHP artisan , Sass y Composer
    En caso de que se desee modificar/ampliar la funcionalidad de este proyecto se deben repetir lo casos 1 al 3 indicados en el apartado de despligue. Además,
    ejecuta los siguientes comando para iniciar el servidor de desarrollo:
   
       ## php artisan serve

      ## node -v
      ## npm create vite@latest  (para crear un proyecto)
      Indicar nombre
      Algunos de los templates para el scaffolding de proyectos que podremos encontrar disponibles incluyen Javascript Vanilla, React, Preact, Vue, Lit, Svelte...
      Elegir "Vanilla" 
      
       ## npm install
       ## npm run dev --host 
        (h  y después r para reiniciar el servicio)


## Información sobre cómo usarlo
 [Manual de usuario](https://github.com/iesgrancapitan-proyectos/202223daw-junio-FAB_IDI-Ordonez-Cervilla/wiki/10_1Doc_Manual_Usuario)
 
 [Manual del administrador](https://github.com/iesgrancapitan-proyectos/202223daw-junio-FAB_IDI-Ordonez-Cervilla/wiki/10_2Doc_Manual_Admin)
 

## Autores

Alumnas: María Cervilla y Virginia Ordoño

Tutora: Carmen Tripiana

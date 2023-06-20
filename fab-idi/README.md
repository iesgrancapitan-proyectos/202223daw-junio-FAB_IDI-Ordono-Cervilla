# FAB-IDI

## Creación registro de usuario

- resources/views/auth/register.blade.php. Creación de formulario.
- routes/web.php. Creación de ruta.
- controllers/AuthController.php. Se crean dos métodos, uno para mostrar el formulario (register) y otro para registrar el usuario (registerPost).

## Creación login

- resources/views/auth/login.blade.php. Creación de formulario.
- routes/web.php. Creación de ruta.
- controllers/AuthController.php. Se crean dos métodos, uno para mostrar el formulario (login) y otro para loguear el usuario (loginPost).

## Creación página inicio para el admin

- resources/views/admin/inicio-admin.blade.php.
- routes/web.php. Creación de ruta.
- controllers/AdminController.php. Se crea un método para mostrar la página de inicio del admin (inicioAdmin).

## Creación sección gestionar videos del admin

- Migración. ```php artisan make:migration create_videos_table --create=videos```
- En el archivo de migración, definir los campos de la tabla utilizando el método up:
- Ejecutar migración. ```php artisan migrate```
- Creación del modelo Video. ```php artisan make:model Video```
- Vistas 
    -- views/admin/gestion-videos.blade.php. Pagina que lista los videos.
    -- views/admin/editar-video.blade.php. Formulario para editar un video.
- Web.php
   -- Route::get("/gestion-videos", [AdminController::class, "gestionVideos"])->name("gestion-videos");-- Route::get("/gestion-videos/editar/{id}", [AdminController::class, "editarVideos"])->name("editar-videos");
   -- Route::post("/gestion-videos/editar/{id}", [AdminController::class, "actualizarVideo"])->name("actualizar-video");
- AdminController.php
   -- public function gestionVideos()
   -- public function editarVideos($id)
   -- public function actualizarVideo(Request $request, $id)
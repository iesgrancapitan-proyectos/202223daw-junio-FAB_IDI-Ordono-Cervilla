<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PremioController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EntidadController;

Route::get("/", [InicioController::class, "index"])->name("index");

// Auth
Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name("login");
Route::get("/logout", [AuthController::class, "logout"])->name("logout");
Route::match(['GET', 'POST'], "/olvidar-contrasena", [AuthController::class, "olvidarContrasena"])->name("olvidar-contrasena");
Route::match(['GET', 'POST'], "/regenerar-contrasena", [AuthController::class, "regenerarContrasena"])->name("regenerar-contrasena");

//Usuarios
Route::get("/quienes-somos", [UsuarioController::class, "quienesSomos"])->name("quienes-somos");
Route::post("/quienes-somos", [UsuarioController::class, "quienesSomosPost"])->name("quienes-somos-post");
Route::get("/mentorizacion", [UsuarioController::class, "mentorizacion"])->name("mentorizacion");
Route::post("/mentorizacion", [UsuarioController::class, "mentorizacionPost"])->name("mentorizacion-post");
Route::get("/proyectos-intercentros", [UsuarioController::class, "proyectosIntercentros"])->name("proyectos-intercentros");
Route::get("/eventos", [UsuarioController::class, "eventos"])->name("eventos");
Route::get("/revistas", [UsuarioController::class, "revistas"])->name("revistas");
Route::get("/panel-colaboradores", [ColaboradorController::class, "index"])->name("panel-colaboradores");
Route::get("/mostrar-premios", [PremioController::class, "mostrarPremios"])->name("mostrar-premios");

//Middleware. En el archivo kernel.php se definen los middleware
Route::group(['middleware' => 'admin'], function () {
    Route::get("/inicio-admin", [AuthController::class, "inicioAdmin"])->name("inicio-admin");
    Route::get("/gestion-contrasenas", [UsuarioController::class, "gestionContrasenas"])->name("gestion-contrasenas");
    Route::get("/gestion-contrasenas/renovar-contrasena/{id}", [UsuarioController::class, "renovarContrasena"])->name("renovar-contrasena");
    Route::get("/gestion-usuarios", [UsuarioController::class, "gestionUsuarios"])->name("gestion-usuarios");
    Route::get("/gestion-usuarios/crear-usuario", [UsuarioController::class, "crearUsuario"])->name("crear-usuario");
    Route::get("/gestion-usuarios/eliminar-usuario/{id}", [UsuarioController::class, "eliminarUsuario"])->name("eliminar-usuario");
    Route::get("/gestion-usuarios/editar-usuario/{id}", [UsuarioController::class, "editarUsuario"])->name("editar-usuario");
    Route::match(['GET', 'POST'], "/gestion-usuarios/guardar-usuario", [UsuarioController::class, "guardarUsuario"])->name("guardar-usuario");
    Route::match(['GET', 'POST'], "/guardar-cambios-usuario", [UsuarioController::class, "guardarCambiosUsuario"])->name("guardar-cambios-usuario");
    
    //Admin Entidades
    Route::get("/gestion-entidades", [EntidadController::class, "gestionEntidades"])->name("gestion-entidades");
    Route::get("/gestion-entidades/eliminar-entidad/{id}", [EntidadController::class, "eliminarEntidad"])->name("eliminar-entidad");
    Route::get("/gestion-entidades/editar-entidad/{id}", [EntidadController::class, "editarEntidad"])->name("editar-entidad");
    Route::match(['GET', 'POST'], "/guardar-cambios-entidad", [EntidadController::class, "guardarCambiosEntidad"])->name("guardar-cambios-entidad");
    Route::get("/gestion-entidades/crear-entidad", [UsuarioController::class, "crearUsuario"])->name("crear-entidad");

    // Colaborador
    Route::get("/gestion-colaboradores", [UsuarioController::class, "buscarUsuarioPost"])->name("buscar-usuario");
    Route::get("/gestion-colaboradores", [ColaboradorController::class, "gestionColaboradores"])->name("gestion-colaboradores");
    Route::match(['GET', 'POST'], '/crear-colaborador/{id}/{tipoColaborador}', [ColaboradorController::class, 'crearColaborador'])->name('crear-colaborador');
    Route::match(['GET', 'POST'], '/eliminar-colaborador/{id}', [ColaboradorController::class, 'eliminarColaboradorPost'])->name('eliminar-colaborador-post');

    //Admin proyectos 
    Route::get("/gestion-proyectos/crear", [ProyectoController::class, "crearProyecto"])->name("crear-proyecto");
    Route::post("/gestion-proyectos/guardar", [ProyectoController::class, "guardarProyecto"])->name("guardar-proyecto");
    Route::get("/gestion-proyectos/editar/{id}", [ProyectoController::class, "editarProyecto"])->name("editar-proyecto");
    Route::post("/gestion-proyectos/guardar-cambios-proyecto", [ProyectoController::class, "guardarCambiosProyecto"])->name("guardar-cambios-proyecto");
    Route::get("/gestion-proyectos/destacar/{id}", [ProyectoController::class, "destacarProyecto"])->name("destacar-proyecto");
    Route::get("/gestion-proyectos/quitar-destacado/{id}", [ProyectoController::class, "quitarProyectoDestacado"])->name("quitar-proyecto-destacado");
    Route::match(['GET', 'POST'], "/gestion-proyectos/eliminar/{id}", [ProyectoController::class, "eliminarProyecto"])->name("eliminar-proyecto");
    Route::get("/gestion-proyectos-pip", [ProyectoController::class, "gestionProyectosPip"])->name("gestion-proyectos-pip");
    Route::post("/gestion-proyectos-pip/destacar/{id}", [ProyectoController::class, "destacarProyectoPip"])->name("destacar-proyecto-pip");
    Route::post("/gestion-proyectos-pip/quitar-destacado/{id}", [ProyectoController::class, "quitarProyectoPipDestacado"])->name("quitar-proyecto-pip-destacado");
    Route::get("/gestion-proyectos-intercentros", [ProyectoController::class, "gestionProyectosIntercentros"])->name("gestion-proyectos-intercentros");
    
    //Admin premios
    Route::get("/gestion-premios", [PremioController::class, "gestionPremios"])->name("gestion-premios");
    Route::get("/gestion-premios/crear-premio", [PremioController::class, "crearPremio"])->name("crear-premio");
    Route::match(['GET', 'POST'], "/gestion-premios/guardar-premio", [PremioController::class, "guardarPremio"])->name("guardar-premio");
    Route::get("/gestion-premios/destacar/{id}", [PremioController::class, "destacarPremio"])->name("destacar-premio");
    Route::get("/gestion-premios/quitar-destacado/{id}", [PremioController::class, "quitarPremioDestacado"])->name("quitar-premio-destacado");
    Route::get("/gestion-premios/editar/{id}", [PremioController::class, "editarPremio"])->name("editar-premio");
    Route::post("/gestion-premios/guardar-cambios-premio", [PremioController::class, "guardarCambiosPremio"])->name("guardar-cambios-premio");
    Route::match(['GET', 'POST'], '/gestion-premios/eliminar/{id}', [PremioController::class, "eliminarPremio"])->name("eliminar-premio");
    
    //Admin vídeos
    Route::get("/gestion-videos", [VideoController::class, "gestionVideos"])->name("gestion-videos");
    Route::get("/gestion-videos/editar/{id}", [VideoController::class, "editarVideos"])->name("editar-videos");
    Route::post("/gestion-videos/editar/{id}", [VideoController::class, "actualizarVideo"])->name("actualizar-video");
    //Route::get("/gestion-premios", [VideoController::class, "gestionVideos"])->name("gestion-premios");

    //Llamadas ajax
    Route::get("/obtener-usuarios-ajax", [UsuarioController::class, "obtenerUsuariosAjax"])->name("obtener-usuarios-ajax");
    Route::post("/obtener-usuarios-ajax", [UsuarioController::class, "obtenerUsuariosAjax"])->name("obtener-usuarios-ajax");
    Route::get("/obtener-perfiles-ajax", [UsuarioController::class, "obtenerPerfilesAjax"])->name("obtener-perfiles-ajax");
    Route::get("/obtener-colaboradores-ajax", [UsuarioController::class, "obtenerColaboradoresAjax"])->name("obtener-colaboradores-ajax");
    Route::post("/obtener-eventos-ajax", [EventoController::class, "obtenerEventosAjax"])->name("obtener-eventos-ajax");
    Route::match(['GET', 'POST'], "/obtener-premios-ajax", [PremioController::class, "obtenerPremiosAjax"])->name("obtener-premios-ajax");
    Route::match(['GET', 'POST'], "/obtener-entidades-ajax", [EntidadController::class, "obtenerEntidadesAjax"])->name("obtener-entidades-ajax");
    Route::match(['GET', 'POST'], "/obtener-proyectos-ajax", [ProyectoController::class, "obtenerProyectosAjax"])->name("obtener-proyectos-ajax");
    Route::get("/obtener-curso-academico-ajax", [ProyectoController::class, "obtenerCursoAcademicoAjax"])->name("obtener-curso-academico-ajax");
});


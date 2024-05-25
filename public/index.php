<?php 

require_once __DIR__ . '/../includes/app.php';
use MVC\Router;
use Controllers\APIController;
use Controllers\CitaController;
use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\EducadorController;
use Controllers\EstudianteController;
use Controllers\ServicioController;
use Controllers\InicioController;
use Controllers\IdentidadController;
use Controllers\UsuarioController;

$router = new Router();

// Iniciar Sesión
//$router->get('/', [LoginController::class, 'login']);
//$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Recuperar Password
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

// Crear Cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);

// Confirmar cuenta
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

// AREA PRIVADA
/** @var bool $access_estd */
/*
$access_estd = $router->tiene_acceso_estd();
if ($access_estd){
    $router->get('/estudiante', [EstudianteController::class, 'index']);
    $router->get('/estudiante/home', [EstudianteController::class, 'home']);
    $router->post('/estudiante/home', [EstudianteController::class, 'home']);
    
}
*/

/** @var bool $access_edu */
/*
$access_edu = $router->tiene_acceso_edu();
if ($access_edu){
    $router->get('/educador', [EducadorController::class, 'index']);
    $router->get('/educador/home', [EducadorController::class, 'home']);
    $router->post('/educador/home', [EducadorController::class, 'home']);
}
*/


// API de Citas
$router->get('/api/servicios', [APIController::class, 'index']);
$router->post('/api/citas', [APIController::class, 'guardar']);
$router->post('/api/eliminar', [APIController::class, 'eliminar']);



// CRUD de Compartir
$router->post('/servicios', [ServicioController::class, 'index']);
$router->get('/servicios', [ServicioController::class, 'invoke']);
$router->post('/servicios/crear', [ServicioController::class, 'crear']);
$router->get('/servicios/actualizar', [ServicioController::class, 'actualizar']);
$router->post('/servicios/actualizar', [ServicioController::class, 'actualizar']);
$router->post('/servicios/eliminar', [ServicioController::class, 'eliminar']);
// CRUD de Inicio

$router->get('/inicio', [InicioController::class, 'invoke']);

//CRUD de Identidad

$router->get('/identidad', [IdentidadController::class, 'invoke']);
$router->post('/identidad', [IdentidadController::class, 'invoke']);

//CRUD de Usuarios

$router->get('/usuarios', [UsuarioController::class, 'invoke']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
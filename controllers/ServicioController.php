<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Model\Servicio;

class ServicioController {
    public static function index(Router $router) {
        session_start();

        isAdmin();

        $servicios = Servicio::all();

        $router->render('servicios/index', [
            'nombre' => $_SESSION['nombre'],
            'servicios' => $servicios
        ]);
    }

    public static function crear(Router $router) {
        session_start();
        isAdmin();
        $servicio = new Servicio;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio->sincronizar($_POST);
            
            $alertas = $servicio->validar();

            if(empty($alertas)) {
                $servicio->guardar();
                header('Location: /servicios');
            }
        }

        $router->render('servicios/crear', [
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router) {
        session_start();
        isAdmin();

        if(!is_numeric($_GET['id'])) return;

        $servicio = Servicio::find($_GET['id']);
        $alertas = [];

        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio->sincronizar($_POST);

            $alertas = $servicio->validar();

            if(empty($alertas)) {
                $servicio->guardar();
                header('Location: /servicios');
            }
        }

        $router->render('servicios/actualizar', [
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar() {
        session_start();
        isAdmin();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $servicio = Servicio::find($id);
            $servicio->eliminar();
            header('Location: /servicios');
        }
    }

    public static function is_estudiante(): bool
     {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $user = new Usuario();
        /** @var int $usuario_id */
        $usuario_id = $_SESSION ? intval($_SESSION['id']) : 0;
        /** @var int $usuario_rol */
        $usuario_rol = $_SESSION ? intval($_SESSION['rol']) : 0;

        /** @var bool $usuario */
        $usuario = $user::is_estudiante($usuario_id);
        
        return $usuario;
    }

    public static function is_educador(): bool
     {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $user = new Usuario();
        /** @var int $usuario_id */
        $usuario_id = $_SESSION ? intval($_SESSION['id']) : 0;
        /** @var int $usuario_rol */
        $usuario_rol = $_SESSION ? intval($_SESSION['rol']) : 0;

        /** @var bool $usuario */
        $usuario = $user::is_educador($usuario_id);
        
        return $usuario;
    }
}
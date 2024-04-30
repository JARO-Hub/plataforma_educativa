<?php

namespace Controllers;

use Model\Servicio;
use Model\Usuario;
use MVC\Router;
use Model\ActiveRecord as SambaShare;


class ServicioController {
    public static function index(Router $router) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = $_POST['search']['value'] ?? ''; // DataTables envía 'search' como parte de un array
            $draw = $_POST['draw'] ?? 1;

            $shares = SambaShare::all();
            $filteredShares = array_filter($shares, function ($share) use ($search) {
                // Podrías añadir más condiciones de filtrado aquí basadas en otros campos
                return stripos($share->name, $search) !== false;
            });

            // Asignar más datos basados en la captura de pantalla proporcionada
            $data = array_map(function ($share) {
                return [
                    'estado' => $share->writable === 'Sí' ? 'Habilitado' : 'Deshabilitado',
                    'solo_lectura' => $share->writable === 'Sí' ? 'No' : 'Sí',
                    'nombre' => $share->name,
                    'ruta' => $share->path,
                    'acceso_invitado' => $share->guestOk,
                    'comentario' => $share->comment
                ];
            }, $filteredShares);

            $response = [
                'draw' => intval($draw),
                'recordsTotal' => count($shares),
                'recordsFiltered' => count($filteredShares),
                'data' => $data
            ];

            return json_encode($response);
        } else {
            // Manejar otros tipos de métodos HTTP según sea necesario
            http_response_code(405); // Método no permitido
            return json_encode(['error' => 'Method Not Allowed']);

        }


    }

    public static function crear(Router $router) {
        session_start();
        //isAdmin();
       // $servicio = new Servicio;
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
            'servicio' => 'hola',
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
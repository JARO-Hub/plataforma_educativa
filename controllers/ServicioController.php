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
        ini_set('max_execution_time', 300); // 5 minutos
        ini_set('memory_limit', '512M');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $search = $_POST['search']['value'] ?? ''; // DataTables envía 'search' como parte de un array
                $draw = $_POST['draw'] ?? 1;

                $shares = SambaShare::all();
                if (!empty($search)) {
                    $filteredShares = array_filter($shares, function ($share) use ($search) {
                        return stripos($share->name, $search) !== false;
                    });
                } else {
                    $filteredShares = $shares;  // No aplicar filtro, usar todos los datos
                }

                // Asignar más datos basados en la captura de pantalla proporcionada
                $data = array_map(function ($share) {
                    return [

                        'id' =>  uniqid(),
                        'estado' => $share->writable === 'Sí' ? 'Habilitado' : 'Deshabilitado',
                        'solo_lectura' => $share->writable === 'Si' ? 'No' : 'Si',
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
                $json = json_encode($response);
                header('Content-Type: application/json');
                echo json_encode($response);
            }catch (\Exception $e) {
                http_response_code(500); // Error interno del servidor
                return json_encode(['error' => $e->getMessage()]);
            }
        } else {
            // Manejar otros tipos de métodos HTTP según sea necesario
            http_response_code(405); // Método no permitido
            return json_encode(['error' => 'Method Not Allowed']);

        }


    }
    public static function invoke(Router $router) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $router->render('servicios/index', [
                'nombre' => $_SESSION['nombre'],
                'servicio' => 'hola',
                'alertas' => $alertas
            ]);
        }

        return;


    }

    public static function delete (Router $router, $id){
        $alertas = [];
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        ini_set('max_execution_time', 300); // 5 minutos
        ini_set('memory_limit', '512M');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = json_decode(file_get_contents('php://input'), true);
                if ($data === null || !array_key_exists('password', $data)) {
                    throw new \Exception('Ingrese la contraseña por favor');
                }
                $usuario = new SambaShare('root', $data['password'], $id, '', '', '', '');

                if(empty($alertas)) {
                    /** @var SambaShare $usersamba */
                    $user = array_filter($usuario->all(), function ($usersamba) use ($id) {
                        return $usersamba->name === $id;
                    });
                    if (empty($user)) {
                        $alertas['error'][] = 'Recurso no encontrado';
                    }

                    $result = $usuario->deleteSharedDirectory($id);
                    if($result){
                        $alertas['success'][] = 'Usuario eliminado correctamente';
                    }else{
                        $alertas['error2'][] = 'Error al eliminar el usuario';
                    }
                }
            } catch (\Exception $e) {
                $alertas['error'][] = $e->getMessage();
            }

            // Establecer el código de respuesta HTTP
            http_response_code(empty($alertas['error']) ? 200 : 400);

            // Devolver la respuesta como JSON
            header('Content-Type: application/json');
            echo json_encode(['alertas' => $alertas]);
            return;
        } else {
            $alertas['error'][] = 'Método no permitido';
            http_response_code(405); // Método no permitido
        }

        header('Content-Type: application/json');
        echo json_encode(['alertas' => $alertas]);
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
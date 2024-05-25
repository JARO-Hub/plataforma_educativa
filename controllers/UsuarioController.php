<?php
namespace Controllers;

use Model\UserSamba;
use Model\Usuario;
use MVC\Router;
use Model\ActiveRecord as SambaShare;

class UsuarioController{
    public static function invoke(Router $router) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $router->render('usuarios/index', [
                'servicio' => 'hola',
                'alertas' => $alertas,
                'action_form' => '/usuarios'
            ]);
        }
        return;
    }

    public static function postCreateUserSamba(Router $router) {

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        ini_set('max_execution_time', 300); // 5 minutos
        ini_set('memory_limit', '512M');

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //validamos data "user_name" y "password"
            $alertas = [];
            if (empty($_POST['user_name']) || empty($_POST['password']) || empty($_POST['smbpassword'])){
                $alertas[] = 'El nombre de usuario y la contraseña no pueden estar vacíos.';
            }
            $usuario = new UserSamba('root', $_POST['password'], $_POST['user_name'], $_POST['smbpassword']);
             try {
                if(empty($alertas)) {
                    $result = $usuario->createUser();
                    if($result){
                        $alertas['succes'][] = 'Usuario creado correctamente';
                    }else{
                        $alertas['error'][] = 'Error al crear el usuario';

                    }
                }
             } catch (\Exception $e) {
                $alertas['error'][] = $e->getMessage();
             }

            $router->render('usuarios/index', [
                'servicio' => 'hola',
                'alertas' => $alertas,
                'action_form' => '/usuarios'
            ]);

        }
    }

    public static function searchAll (Router $router){

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        ini_set('max_execution_time', 300); // 5 minutos
        ini_set('memory_limit', '512M');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $search = $_POST['search']['value'] ?? ''; // DataTables envía 'search' como parte de un array
                $draw = $_POST['draw'] ?? 1;

                $shares = UserSamba::searchAllUsers();
                if (!empty($search)) {
                    $filteredShares = array_filter($shares, function ($share) use ($search) {
                        return stripos($share->getSambauser(), $search) !== false;
                    });
                } else {
                    $filteredShares = $shares;  // No aplicar filtro, usar todos los datos
                }

                // Asignar más datos basados en la captura de pantalla proporcionada
                $data = array_map(function ($share) {
                    return [

                        'id' =>  uniqid(),
                        'user_name' => $share->getSambauser(),
                        'password' => '*****',
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

}


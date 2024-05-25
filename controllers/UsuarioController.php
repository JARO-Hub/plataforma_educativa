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
}


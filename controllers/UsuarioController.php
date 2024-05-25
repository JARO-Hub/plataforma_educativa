<?php
namespace Controllers;

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
            if (empty($_POST['user_name']) || empty($_POST['password'])) {
                $alertas[] = 'El nombre de usuario y la contraseña no pueden estar vacíos.';
            }
            $usuario = new Usuario('root', $_POST['password'], $_POST['sambauser'], $_POST['sambapassword']);

            if(empty($alertas)) {
                $usuario->guardar();
                header('Location: /usuarios');
            }
        }

        $router->render('usuarios/crear', [
            'nombre' => $_SESSION['nombre'],
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}


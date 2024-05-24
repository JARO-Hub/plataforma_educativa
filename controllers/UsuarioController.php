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
                'alertas' => $alertas
            ]);
        }
        return;
    }
}


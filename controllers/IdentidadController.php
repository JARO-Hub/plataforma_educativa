<?php
namespace Controllers;

use Model\Identidad;
use MVC\Router;
use Model\ActiveRecord as SambaShare;

class IdentidadController{

    public static function invoke(Router $router) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $workgroup = Identidad::getWorkgroupName();
            $router->render('identidad/index', [
                'identidad' => $workgroup,
                'alertas' => $alertas
            ]);
        }
        return;
    } 

}

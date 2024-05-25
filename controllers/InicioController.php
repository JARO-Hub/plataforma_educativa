<?php

namespace Controllers;
use Model\IdentidadModelo;
use Model\InicioModelo;
use MVC\Router;


class InicioController {
    public static function invoke(Router $router) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $alertas = [];
       
        
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $estadoSamba = InicioModelo::getStatus();
            $router->render('inicio/index', [
                'estadoSamba' => $estadoSamba,
                'alertas' => $alertas
            ]);
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }
    }

    
}
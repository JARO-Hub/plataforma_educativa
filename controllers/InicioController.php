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
        $estadoSamba = InicioModelo::getStatus();
        
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $router->render('inicio/index', [
                
                'inicio' => $estadoSamba,
                'alertas' => $alertas
            ]);
        }
    }

    
}
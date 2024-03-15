<?php

namespace Controllers;

use MVC\Router;

class ClaseController {
    public static function index( Router $router ) {

        session_start();

        isAuth();

        $router->render('clase/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);
    }
}
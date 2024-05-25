<?php
namespace Controllers;

use Model\IdentidadModelo;
use MVC\Router;

class IdentidadController{

    public static function invoke(Router $router) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $workgroup = IdentidadModelo::getWorkgroupName();
            $router->render('identidad/index', [
                'identidad' => $workgroup,
                'alertas' => $alertas
            ]);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nuevoWorkgroup = $_POST['workgroup'] ?? '';
            if (!empty($nuevoWorkgroup)) {
                IdentidadModelo::setWorkgroupName($nuevoWorkgroup); // Establecer el nuevo nombre del grupo de trabajo
                $workgroup = IdentidadModelo::getWorkgroupName(); // Obtener el nuevo nombre del grupo de trabajo para actualizar la vista
                $alertas[] = 'Nombre del grupo de trabajo actualizado correctamente.';
            } else {
                $alertas[] = 'El nombre del grupo de trabajo no puede estar vacío.';
            }
            $router->render('identidad/index', [
                'identidad' => $workgroup, // Pasar la variable a la vista
                'alertas' => $alertas
            ]);
        }
        return;
    } 

}

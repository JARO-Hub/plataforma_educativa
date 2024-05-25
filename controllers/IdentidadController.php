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
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nuevoWorkgroup = $_POST['workgroup'] ?? '';
            if (!empty($nuevoWorkgroup)) {
                $resultado=IdentidadModelo::setWorkgroupName($nuevoWorkgroup); // Establecer el nuevo nombre del grupo de trabajo
                if ($resultado) {
                    $alertas['exito'] = "El nombre del grupo de trabajo se ha actualizado correctamente.";
                } else {
                    $alertas['error'] = "Hubo un error al actualizar el nombre del grupo de trabajo.";
                }
            } else {
                $alertas['error'] = "El nombre del grupo de trabajo no puede estar vacío.";
            }

            $workgroup = IdentidadModelo::getWorkgroupName();
            $router->render('identidad/index', [
                'identidad' => $workgroup, // Pasar la variable a la vista
                'alertas' => $alertas
            ]);
        }
        return;
    } 

}

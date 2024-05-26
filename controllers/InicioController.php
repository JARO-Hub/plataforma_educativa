<?php
namespace Controllers;
use Model\InicioModelo;
use MVC\Router;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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
            return;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (isset($_POST['accion'])) {
                
            // Verificar si se recibió una acción
            if (isset($_POST['accion'])) {
                $accion = $_POST['accion'];
                
                switch ($accion) {
                    case 'parar':
                        // Llamar a la función para parar el servicio
                        InicioModelo::StopService();
                        break;
                    case 'reiniciar':
                        // Llamar a la función para reiniciar el servicio
                        InicioModelo::RestartService();
                        break;
                    case 'recargar':
                        // Llamar a la función para recargar el servicio
                        InicioModelo::RestartService();
                        break;
                    case 'mantener':
                        // No se realiza ninguna acción adicional
                        break;
                    default:
                        // Manejar caso no esperado
                        break;
                    }
                // Redirigir después de procesar el formulario para evitar reenvío del formulario
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
                }
            }
        }
    }
}
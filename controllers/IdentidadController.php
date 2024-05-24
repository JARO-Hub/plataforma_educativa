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
            $router->render('identidad/index', [
                'servicio' => 'hola',
                'alertas' => $alertas
            ]);
        }
        return;
    } 
    public static function getWorkgroup(Router $router) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        try {
            // Ruta al archivo smb.conf
            $smbConfPath = '/etc/samba/smb.conf';

            // Verificar si el archivo existe y es legible
            if (!file_exists($smbConfPath) || !is_readable($smbConfPath)) {
                throw new \Exception('No se puede leer el archivo de configuración de Samba.');
            }

            // Leer el contenido del archivo
            $configContent = file_get_contents($smbConfPath);

            // Buscar el Workgroup en la configuración
            $workgroup = self::parseWorkgroup($configContent);

            // Enviar la respuesta en formato JSON
            $response = [
                'workgroup' => $workgroup
            ];

            header('Content-Type: application/json');
            echo json_encode($response);
        } catch (\Exception $e) {
            http_response_code(500); // Error interno del servidor
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    private static function parseWorkgroup($configContent) {
        // Buscar la línea que contiene 'workgroup'
        if (preg_match('/^\s*workgroup\s*=\s*(\S+)\s*$/mi', $configContent, $matches)) {
            return $matches[1];
        } else {
            throw new \Exception('No se pudo encontrar el grupo de trabajo en la configuración de Samba.');
        }
    }
}

<?php

namespace Controllers;

use MVC\Router;

class FTPController {
    public static function configurar(Router $router) {
        $message = null;
        $success = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recuperar el nombre de usuario del formulario
            $username = trim($_POST['username']);

            if (!empty($username)) {
                // Validar caracteres permitidos en el nombre de usuario
                if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
                    $message = "Error: El nombre de usuario contiene caracteres no válidos.";
                    $success = false;
                } else {
                    // Ruta al script Bash
                    $scriptPath = __DIR__ . '/../scripts/configurar_usuario_ftp.sh';

                    // Verificar si el script existe
                    if (!file_exists($scriptPath)) {
                        $message = "Error: El script no existe en la ruta especificada.";
                        $success = false;
                    } else {
                        // Comando para ejecutar el script
                        $command = "sudo $scriptPath " . escapeshellarg($username) . " 2>&1";

                        // Ejecutar el comando y capturar la salida
                        $output = shell_exec($command);

                        // Verificar la salida
                        if (!$output) {
                            $message = "Error: No se pudo ejecutar el script. Verifica los permisos.";
                            $success = false;
                        } elseif (strpos($output, "Configuración FTP para el usuario") !== false) {
                            $message = "Usuario configurado exitosamente.\n" . $output;
                            $success = true;
                        } else {
                            $message = "Error al configurar el usuario.\n" . $output;
                            $success = false;
                        }
                    }
                }
            } else {
                $message = "El nombre de usuario no puede estar vacío.";
                $success = false;
            }
        }

        // Renderizar la vista y pasar las variables necesarias
        $router->render('templates/wrapper', [
            'message' => $message,
            'success' => $success
        ]);
    }
}

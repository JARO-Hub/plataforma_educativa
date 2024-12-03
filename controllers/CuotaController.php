<?php

namespace Controllers;

use MVC\Router;
use MVC\models\User;
use MVC\models\Cuota;

class CuotaController {

    public static function asignar(Router $router) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Verificar que el usuario está autenticado y tiene permisos
        if (!isset($_SESSION['id_user'])) {
            header('Location: /login');
            exit;
        }

        $id_user = $_SESSION['id_user'];

        // Obtener el usuario desde la base de datos
        $usuario = User::find($id_user);

        if (!$usuario) {
            // Manejar el caso en que el usuario no existe
            $mensaje = "El usuario no existe en la base de datos.";
            $router->render('templates/mensaje', ['mensaje' => $mensaje]);
            return;
        }

        $username = $usuario->user_name;

        // Ejecutar el script para asignar la cuota
        $scriptPath = __DIR__ . '/../scripts/asignar_cuota_usuario.sh';

        // Asegurarse de que el script existe
        if (!file_exists($scriptPath)) {
            $mensaje = "El script no se encontró en la ruta especificada.";
            $router->render('templates/mensaje', ['mensaje' => $mensaje]);
            return;
        }

        // Comando para ejecutar el script
        $command = "sudo $scriptPath " . escapeshellarg($username) . " 2>&1";

        // Ejecutar el comando y capturar la salida
        $output = shell_exec($command);

        // Verificar si hubo un error
        if (strpos($output, "Error:") !== false) {
            $mensaje = "Hubo un error al asignar la cuota:\n" . $output;
            $router->render('templates/mensaje', ['mensaje' => $mensaje]);
            return;
        }

        // Actualizar la tabla 'cuotas' en la base de datos
        $cuota = new Cuota();
        $cuota->id_user = $id_user;
        $cuota->tamano_mb = 2048; // 2GB en MB
        $cuota->directorio = "/honeycomb/$username";

        // Guardar o actualizar la cuota en la base de datos
        $cuotaExistente = Cuota::where('id_user', $id_user);

        if ($cuotaExistente) {
            // Actualizar la cuota existente
            $cuotaExistente->tamano_mb = $cuota->tamano_mb;
            $cuotaExistente->directorio = $cuota->directorio;
            $cuotaExistente->guardar();
        } else {
            // Crear una nueva cuota
            $cuota->guardar();
        }

        // Renderizar una vista con el resultado
        $mensaje = "La cuota de 2GB ha sido asignada exitosamente al usuario $username.";
        $router->render('templates/mensaje', ['mensaje' => $mensaje]);
    }
}

<?php

namespace Model;

class InicioModelo
{
    private static $getStatusCommand = __DIR__ . '/../scripts/inicio/estado_samba.sh';
    private static $getRestartCommand = __DIR__ . '/../scripts/inicio/reiniciar_samba.sh';
    private static $getStopCommand = __DIR__ . '/../scripts/inicio/parar_samba.sh';
    private static $configPath = '/etc/samba/smb.conf';

    /**
     * Obtiene el estado actual del servicio Samba.
     *
     * @return string El estado del servicio (activo/inactivo) o mensaje de error.
     */
    public static function getStatus(){
        // Verificar el estado del servicio Samba
        // Ejecutar el comando para verificar el estado del servicio
        $command = self::$getStatusCommand;
        $output = [];
        $returnCode = 0;

        exec("bash $command", $output, $returnCode);

            // Añadir mensajes de depuración
        // Verificar si se obtuvo una salida válida
        if (empty($output) || $returnCode !== 0) {
            return 'Error al obtener el estado';
        }

        // Convertir array de salida a string
        $estado = implode("\n", $output);

        // Retornar la salida del script directamente
        return $estado;
    }

    public static function StopService(){
        $command = self::$getStopCommand;
        exec("bash $command");
    }
    public static function RestartService(){
        $command = self::$getRestartCommand;
        exec("bash $command");
    }
}
?>

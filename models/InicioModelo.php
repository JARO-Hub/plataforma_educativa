<?php

namespace Model;

class InicioModelo
{
    private static $getStatusCommand = __DIR__ . '/../scripts/inicio/estado_samba.sh';
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

        // Verificar si se obtuvo una salida válida
        if (empty($output) || $returnCode !== 0) {
            return 'Error al obtener el estado';
        }

        // Convertir array de salida a string
        $status = implode("\n", $output);

        // Verificar el resultado del comando
        if (stripos($status, 'active') !== false) {
            return 'Activo';
        } elseif (stripos($status, 'inactive') !== false) {
            return 'Inactivo';
        } else {
            return 'Estado desconocido'; // Opcional: manejar otros casos
        }
    }
}

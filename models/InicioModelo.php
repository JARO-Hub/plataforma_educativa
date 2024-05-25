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

            // Añadir mensajes de depuración
        error_log("Comando ejecutado: bash $command");
        error_log("Código de retorno: $returnCode");
        error_log("Salida: " . implode("\n", $output));
        // Verificar si se obtuvo una salida válida
        if (empty($output) || $returnCode !== 0) {
            return 'Error al obtener el estado';
        }

        // Convertir array de salida a string
        $estadoSamba = implode("\n", $output);

        // Retornar la salida del script directamente
        return $estadoSamba;
    }
}

?>

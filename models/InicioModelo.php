<?php
namespace Model;

class InicioModelo extends Servicio{
    private static $getStatusCommand = __DIR__ . '/../scripts/inicio/estado_samba.sh';
    private static $configPath = '/etc/samba/smb.conf';
        /**
     * Obtiene el estado actual del servicio Samba.
     *
     * @return string El estado del servicio (activo/inactivo) o mensaje de error.
     */
    public static function getStatus(){
    //Verificar el estado del servicio Samba
             // Ejecutar el comando para verificar el estado del servicio
             $command = self::$getStatusCommand;
             exec($command,$output,$returnCode);
             // Verificar si se obtuvo una salida válida
    if ($output === null || $output === "" || $returnCode !== 0) {
        return 'Error al obtener el estado';
    }
            // Verificar la salida del comando para determinar el estado
            $status = implode("\n", $output); // Convertir array de salida a string
             // Verificar el resultado del comando
             if (strpos(strtolower($status), 'active') !== false) {
                 return 'Activo';
             } elseif (strpos(strtolower($status), 'inactive') !== false) {
                 return 'Inactivo';
             } else {
                 return 'Estado desconocido'; // Opcional: manejar otros casos
             }
    }
}
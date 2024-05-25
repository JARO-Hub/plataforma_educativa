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
             $command = $this->buildCommand(self::$getStatusCommand,[]);
             exec($command,[],$ouput);
             // Verificar si se obtuvo una salida válida
    if ($output === null || $output === "") {
        return 'Error al obtener el estado';
    }
             // Verificar el resultado del comando
             if (strpos(strtolower($output), 'active') !== false) {
                 return 'Activo';
             } elseif (strpos(strtolower($output), 'inactive') !== false) {
                 return 'Inactivo';
             } else {
                 return 'Estado desconocido'; // Opcional: manejar otros casos
             }
    }
}
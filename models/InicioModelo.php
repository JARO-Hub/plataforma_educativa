<?php
namespace Model;

class InicioModelo{
    private static $configPath = '/etc/samba/smb.conf';
        /**
     * Obtiene el estado actual del servicio Samba.
     *
     * @return string El estado del servicio (activo/inactivo) o mensaje de error.
     */
    public static function getStatus(){
    //Verificar el estado del servicio Samba
             // Ejecutar el comando para verificar el estado del servicio
             $command = "sudo /bin/systemctl is-active smbd";
             $output = shell_exec($command);
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
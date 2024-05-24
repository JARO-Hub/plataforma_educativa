<?php
namespace Model;

class IdentidadModelo {

    private static $configPath = '/etc/samba/smb.conf'; // Añadimos esta propiedad

    /**
     * Obtiene el nombre del grupo de trabajo desde el archivo de configuración de Samba.
     *
     * @return string|null El nombre del grupo de trabajo o null si no se encuentra.
     */
    public static function getWorkgroupName() {
        // Verificar si el archivo existe
        if (!file_exists(self::$configPath)) {
            error_log("El archivo smb.conf no existe en la ruta: " . self::$configPath);
            return null;
        }

        // Leer el contenido del archivo
        $contents = file(self::$configPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($contents === false) {
            error_log("No se pudo leer el archivo smb.conf.");
            return null;
        }

        // Buscar la línea que contiene 'workgroup'
        foreach ($contents as $line) {
            if (stripos($line, 'workgroup') !== false) {
                list(, $workgroup) = explode('=', $line);
                $workgroup = trim($workgroup);
                error_log("Grupo de trabajo encontrado: " . $workgroup);
                return $workgroup;
            }
        }

        // Si no se encontró la línea 'workgroup'
        error_log("No se encontró ninguna línea con 'workgroup' en smb.conf.");
        return null;
    }
}

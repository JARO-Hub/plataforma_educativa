<?php

namespace Model;

class IdentidadModelo{
    private static $configPath = '/etc/samba/smb.conf';
    public static function getWorkgroupName(){
        $contents = file(self::$configPathm, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($contents as $line) {
            if (strpos($line, 'workgroup') !== false) {
                list(, $workgroup) = explode('=', $line);
                return trim($workgroup);
            }
        }

        return null; // En caso de que no se encuentre el grupo de trabajo
    }
}

?>
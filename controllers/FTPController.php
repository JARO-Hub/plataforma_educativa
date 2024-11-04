<?php
class FTPController {
    public static function createFTPUser($username, $password) {
        // Verifica que el nombre de usuario no exista
        $userExists = shell_exec("id -u $username 2>/dev/null");
        if ($userExists) {
            return "El usuario ya existe.";
        }

        // Crear el usuario y establecer el directorio específico
        $ftpDir = "/home/$username/ftp";
        shell_exec("sudo useradd -m -d $ftpDir -s /sbin/nologin $username");
        shell_exec("echo \"$username:$password\" | sudo chpasswd");

        // Crear el directorio FTP y establecer permisos
        shell_exec("sudo mkdir -p $ftpDir");
        shell_exec("sudo chown $username:$username $ftpDir");
        shell_exec("sudo chmod 750 $ftpDir");

        // Configurar un subdirectorio para subir archivos
        $uploadDir = "$ftpDir/upload";
        shell_exec("sudo mkdir -p $uploadDir");
        shell_exec("sudo chown $username:$username $uploadDir");
        shell_exec("sudo chmod 750 $uploadDir");

        return "Usuario FTP '$username' creado con acceso a su directorio específico.";
    }
}
?>

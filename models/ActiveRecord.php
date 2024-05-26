<?php

declare(strict_types=1);
namespace Model;
use Model\Servicio;


class ActiveRecord extends Servicio {

    public  $name;
    public  $path;
    public  $guestOk;
    public  $comment;
    public  $writable;
    public $readOnly;
    public $browseable;
    public $createMask;
    public $directoryMask;



    private static $configPath = '/etc/samba/smb.conf';

    public function __construct(string $username, string $password,$name, $path, $guestOk, $comment, $writable)
    {
        parent::__construct($username, $password);
        $this->name = $name;
        $this->path = $path;
        $this->guestOk = $guestOk;
        $this->comment = $comment;
        $this->writable = $writable;
    }

    /**
     * Parse the smb.conf file and return an array of SambaShare objects.
     *
     * @return SambaShare[]
     */
    public static function all()
    {
        $shares = [];
        $contents = file(self::$configPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $currentShare = null;

        foreach ($contents as $line) {
            if (preg_match('/^\[(.+)\]$/', trim($line), $matches)) {
                if ($currentShare) {
                    $shares[] = new self('root','',$currentShare['name'], $currentShare['path'], $currentShare['guestOk'], $currentShare['comment'], $currentShare['writable']);
                }
                $currentShare = [
                    'name' => $matches[1],
                    'path' => '',
                    'guestOk' => 'No',
                    'comment' => '',
                    'writable' => 'No'
                ];
            } elseif (strpos($line, '=') !== false && $currentShare) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);

                switch ($key) {
                    case 'path':
                        $currentShare['path'] = $value;
                        break;
                    case 'guest ok':
                        $currentShare['guestOk'] = ($value === 'yes') ? 'Sí' : 'No';
                        break;
                    case 'comment':
                        $currentShare['comment'] = $value;
                        break;
                    case 'writable':
                        $currentShare['writable'] = ($value === 'yes') ? 'Sí' : 'No';
                        break;
                }
            }
        }
        if ($currentShare) {
            $shares[] = new self('root','',$currentShare['name'], $currentShare['path'], $currentShare['guestOk'], $currentShare['comment'], $currentShare['writable']);
        }

        return $shares;
    }

    /**
     * Crea un nuevo recurso compartido de directorio en Samba.
     *
     * @param String $contrasena
     * @param string $shareName Nombre del recurso compartido.
     * @param String $shareComment Comentario del recurso compartido.
     * @param string $sharePath Ruta del directorio a compartir.
     * @param string $writable Indica si el recurso compartido es escribible.
     * @param string $browseable Indica si el recurso compartido es visible para los usuarios.
     * @param string $guestOk Permite el acceso de invitados al recurso compartido.
     * @param string $createMask Define los permisos de los archivos creados dentro del recurso compartido.
     * @param string $directoryMask Define los permisos de los directorios creados dentro del recurso compartido.
     * @param bool $readOnly Indica si el recurso compartido es de solo lectura.
     * @return bool Devuelve true si se creó el recurso compartido correctamente, false en caso contrario.
     */

    public  function createSharedDirectory($shareName, $shareComment, $sharePath, $writable, $browseable, $guestOk, $createMask, $directoryMask, $readOnly) {
        try {
            // Validar la existencia y ejecutabilidad del script para crear el recurso compartido
            if (!file_exists(__DIR__ . '/../scripts/create_share.sh') || !is_executable(__DIR__ . '/../scripts/create_share.sh')) {
                throw new \Exception('El script para crear el recurso compartido no existe o no es ejecutable.');
            }

            // Validar que el nombre de usuario y la contraseña no estén vacíos
            if (empty($shareName) || empty($shareComment) || empty($sharePath) || empty($this->password)) {
                throw new \Exception('Todos los campos son obligatorios.');
            }

            // Llama al script shell con los parámetros adecuados, incluyendo la contraseña
            $result = shell_exec(__DIR__ . '/../scripts/create_share.sh '
                . escapeshellarg($shareName) . ' '
                . escapeshellarg($shareComment) . ' '
                . escapeshellarg($sharePath) . ' '
                . escapeshellarg($writable) . ' '
                . escapeshellarg($browseable) . ' '
                . escapeshellarg($guestOk) . ' '
                . escapeshellarg($createMask) . ' '
                . escapeshellarg($directoryMask) . ' '
                . escapeshellarg($readOnly ? 'yes' : 'No') . ' '
                . escapeshellarg($this->password));

            // Verificar si la función se ejecutó correctamente
            if (trim($result) === "true") {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            // Capturar y relanzar cualquier excepción como una nueva excepción
            throw new \Exception('No se pudo crear el recurso compartido: ' . $e->getMessage());
        }
    }

    public  function modifySharedDirectory($shareName, $shareComment, $sharePath, $writable, $browseable, $guestOk, $createMask, $directoryMask, $readOnly) {
        try {
            // Validar la existencia y ejecutabilidad del script para modificar el recurso compartido
            if (!file_exists(__DIR__ . '/../scripts/modify_share.sh') || !is_executable(__DIR__ . '/../scripts/modify_share.sh')) {
                throw new \Exception('El script para modificar el recurso compartido no existe o no es ejecutable.');
            }

            // Validar que el nombre de usuario y la contraseña no estén vacíos
            if (empty($shareName) || empty($shareComment) || empty($sharePath) || empty($this->password)) {
                throw new \Exception('Todos los campos son obligatorios.');
            }

            // Llama al script shell con los parámetros adecuados, incluyendo la contraseña
            $result = shell_exec(__DIR__ . '/../scripts/modify_share.sh '
                . escapeshellarg($shareName) . ' '
                . escapeshellarg($shareComment) . ' '
                . escapeshellarg($sharePath) . ' '
                . escapeshellarg($writable) . ' '
                . escapeshellarg($browseable) . ' '
                . escapeshellarg($guestOk) . ' '
                . escapeshellarg($createMask) . ' '
                . escapeshellarg($directoryMask) . ' '
                . escapeshellarg($readOnly ? 'yes' : 'No') . ' '
                . escapeshellarg($this->password));

            // Verificar si la función se ejecutó correctamente
            if (trim($result) === "true") {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            // Capturar y relanzar cualquier excepción como una nueva excepción
            throw new \Exception('No se pudo modificar el recurso compartido: ' . $e->getMessage());
        }
    }


    public  function deleteSharedDirectory($shareName) {
        try {
            // Validar la existencia y ejecutabilidad del script para eliminar el recurso compartido
            if (!file_exists(__DIR__ . '/../scripts/delete_share.sh') || !is_executable(__DIR__ . '/../scripts/delete_share.sh')) {
                throw new \Exception('El script para eliminar el recurso compartido no existe o no es ejecutable.');
            }

            // Validar que el nombre de usuario y la contraseña no estén vacíos
            if (empty($shareName) || empty($this->password)) {
                throw new \Exception('El nombre de usuario y la contraseña son obligatorios.');
            }

            // Llama al script shell con los parámetros adecuados, incluyendo la contraseña
            $result = shell_exec(__DIR__ . '/../scripts/delete_share.sh '
                . escapeshellarg($shareName) . ' '
                . escapeshellarg($this->password));

            // Verificar si la función se ejecutó correctamente
            return trim($result) === "true";
        } catch (\Exception $e) {
            // Capturar y relanzar cualquier excepción como una nueva excepción
            throw new \Exception('No se pudo eliminar el recurso compartido: ' . $e->getMessage());
        }
    }






}
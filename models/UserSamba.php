<?php

declare(strict_types=1);

namespace Model;

use Model\Servicio;

class UserSamba extends Servicio
{
    public $sambauser;
    public $sambapassword;
    private static $createUserCommand = __DIR__ . '/../scripts/usersamba/create_user.sh';
    private static $configPath = '/etc/samba/smb.conf';

    public function __construct(string $username, string $password, string $sambauser, string $sambapassword)
    {
        parent::__construct($username, $password);

        $this->sambauser = $sambauser;
        $this->sambapassword = $sambapassword;
    }


    /**
     * Create a new user in Samba.
     *
     * @param string $sambauser
     * @param string $sambapassword
     * @return bool
     * @throws \Exception
     */
    public function createUser(): bool
    {
        try {
            $output = [];
            $exitCode = 0;

            if (!file_exists(self::$createUserCommand) || !is_executable(self::$createUserCommand)) {
                throw new \Exception('El script para crear usuarios de Samba no existe o no es ejecutable.');
            }

            if (empty($this->sambauser) || empty($this->sambapassword)) {
                throw new \Exception('El nombre de usuario y la contraseña no pueden estar vacíos.');
            }

            $params = [$this->sambauser, $this->sambapassword, $this->getPassword()];

            $command = $this->buildCommand(self::$createUserCommand, $params);

            exec($command, $output, $exitCode);
            if ($exitCode !== 0) {
                throw new \Exception('Error al ejecutar el comando para crear el usuario de Samba: ' . implode("\n", $output));
            }

            return true;

        }
        catch (\Exception $e) {
            throw new \Exception('No se pudo crear el usuario en Samba.');

        }
    }

}
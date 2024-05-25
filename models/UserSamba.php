<?php

declare(strict_types=1);

namespace Model;

use Model\Servicio;

class UserSamba extends Servicio
{
    public $sambauser;
    public $sambapassword;
    private static $createUserCommand = __DIR__ . '/../scripts/usersamba/create_user.sh';
    private static $updateUserCommand = __DIR__ . '/../scripts/usersamba/update_user.sh';
    private static $deleteUserCommand = __DIR__ . '/../scripts/usersamba/delete_user.sh';
    private static $listUsersCommand = __DIR__ . '/../scripts/usersamba/list.sh';
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

    /**
     * SearchAll the users in Samba.
     * @return UserSamba[]
     * @throws \Exception
     */
    public function searchAllUsers(): array
    {
        try {
            $output = [];
            $exitCode = 0;

            if (!file_exists(self::$listUsersCommand) || !is_executable(self::$listUsersCommand)) {
                throw new \Exception('El script para buscar usuarios de Samba no existe o no es ejecutable.');
            }

            $password = $this->getPassword();

            $params = [$password];

            $command = $this->buildCommand(self::$listUsersCommand, $params);

            // Ejecutar el comando
            exec($command, $output, $exitCode);


            if ($exitCode !== 0) {
                throw new \Exception('Error al ejecutar el comando para buscar los usuarios de Samba: ' . implode("\n", $output));
            }

            $users = [];
            $user = null;

            foreach ($output as $line) {
                if (preg_match('/^\s*Unix username:\s*(\S+)\s*$/i', $line, $matches)) {
                    $user = new UserSamba('', '', $matches[1], '');
                    $users[] = $user;
                } elseif (preg_match('/^\s*Account Flags:\s*(\S+)\s*$/i', $line, $matches)) {
                    $user->setPassword($matches[1]);
                }
            }

            return $users;

        } catch (\Exception $e) {
            throw new \Exception('No se pudo buscar los usuarios en Samba: ' . $e->getMessage());
        }
    }

    /**
     * Update user in Samba.
     *
     * @param string $sambauser
     * @return bool
     * @throws \Exception
     */
    public function updateUser(): bool
    {
        try {
            $output = [];
            $exitCode = 0;

            if (!file_exists(self::$updateUserCommand) || !is_executable(self::$updateUserCommand)) {
                throw new \Exception('El script para actualizar usuarios de Samba no existe o no es ejecutable.');
            }

            if (empty($this->sambauser) || empty($this->sambapassword)) {
                throw new \Exception('El nombre de usuario y la contraseña no pueden estar vacíos.');
            }
            // password, sambapassword_new, sambauser_new, sambauser_old
            $params = [$this->getPassword(), $this->sambapassword, $this->sambauser, $this->getSambauser()];

            $command = $this->buildCommand(self::$updateUserCommand, $params);

            exec($command, $output, $exitCode);

            if ($exitCode !== 0) {
                throw new \Exception('Error al ejecutar el comando para actualizar el usuario de Samba: ' . implode("\n", $output));
            }

            return true;

        }
        catch (\Exception $e) {
            throw new \Exception('No se pudo crear el usuario en Samba.');

        }
    }


    /**
     * Delete user in Samba.
     *
     * @param string $sambauser
     *
     * @return bool
     * @throws \Exception
     */

    public function deleteUser(): bool
    {
        try {
            $output = [];
            $exitCode = 0;

            if (!file_exists(self::$deleteUserCommand) || !is_executable(self::$deleteUserCommand)) {
                throw new \Exception('El script para eliminar usuarios de Samba no existe o no es ejecutable.');
            }

            if (empty($this->sambauser)) {
                throw new \Exception('El nombre de usuario no puede estar vacío.');
            }

            $params = [$this->getPassword(), $this->getSambauser() ];
            $command = $this->buildCommand(self::$deleteUserCommand, $params);

            exec($command, $output, $exitCode);

            if ($exitCode !== 0) {
                throw new \Exception('Error al ejecutar el comando para eliminar el usuario de Samba: ' . implode("\n", $output));
            }

            return true;

        } catch (\Exception $e) {
            throw new \Exception('No se pudo eliminar el usuario en Samba.');
        }
    }




    public function setSambauser(string $sambauser)
    {
        $this->sambauser = $sambauser;
    }

    public function setSambapassword(string $sambapassword)
    {
        $this->sambapassword = $sambapassword;
    }

    public function getSambauser(): string
    {
        return $this->sambauser;
    }

    public function getSambapassword(): string
    {
        return $this->sambapassword;
    }

}
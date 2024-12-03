<?php

declare(strict_types=1);

namespace Model;

class FTPUsers extends ActiveRecord
{
    protected static $tabla = 'ftp_users';
    protected static $columnasDB = ['id_ftp', 'user_cuenta', 'password_cuenta', 'estado', 'directorio', 'permisos', 'id_user'];

    public $id_ftp;
    public $user_cuenta;
    public $password_cuenta;
    public $estado;
    public $directorio;
    public $permisos;
    public $id_user;

    public function __construct($args = [])
    {
        $this->id_ftp = $args['id_ftp'] ?? null;
        $this->user_cuenta = $args['user_cuenta'] ?? '';
        $this->password_cuenta = $args['password_cuenta'] ?? '';
        $this->estado = $args['estado'] ?? true;
        $this->directorio = $args['directorio'] ?? '';
        $this->permisos = $args['permisos'] ?? 'rw';
        $this->id_user = $args['id_user'] ?? null;
    }

    public function validar()
    {
        if (!$this->user_cuenta) {
            self::$alertas['error'][] = 'El nombre de la cuenta FTP es obligatorio.';
        }

        if (!$this->password_cuenta) {
            self::$alertas['error'][] = 'La contraseña de la cuenta FTP es obligatoria.';
        }

        if (!$this->directorio) {
            self::$alertas['error'][] = 'El directorio es obligatorio.';
        }

        if (!in_array($this->permisos, ['r', 'w', 'rw'])) {
            self::$alertas['error'][] = 'Los permisos deben ser "r", "w" o "rw".';
        }

        if (!$this->id_user) {
            self::$alertas['error'][] = 'El ID del usuario es obligatorio.';
        }

        return self::$alertas;
    }
}


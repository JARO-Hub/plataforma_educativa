<?php

declare(strict_types=1);

namespace Model;

class DBAdminsPgSQL extends ActiveRecord
{
    protected static $tabla = 'db_admins_pgsql';
    protected static $columnasDB = ['id_postgres', 'nombre_bd', 'password_bd', 'id_user'];

    public $id_postgres;
    public $nombre_bd;
    public $password_bd;
    public $id_user;

    public function __construct($args = [])
    {
        $this->id_postgres = $args['id_postgres'] ?? null;
        $this->nombre_bd = $args['nombre_bd'] ?? '';
        $this->password_bd = $args['password_bd'] ?? '';
        $this->id_user = $args['id_user'] ?? null;
    }

    public function validar()
    {
        if (!$this->nombre_bd) {
            self::$alertas['error'][] = 'El nombre de la base de datos es obligatorio.';
        }

        if (!$this->password_bd) {
            self::$alertas['error'][] = 'La contraseña de la base de datos es obligatoria.';
        }

        if (!$this->id_user) {
            self::$alertas['error'][] = 'El ID del usuario es obligatorio.';
        }

        return self::$alertas;
    }
}

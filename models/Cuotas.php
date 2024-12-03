<?php

declare(strict_types=1);

namespace Model;

class Cuotas extends ActiveRecord
{
    protected static $tabla = 'cuotas';
    protected static $columnasDB = ['id_cuotas', 'id_user', 'tamano_mb', 'directorio'];

    public $id_cuotas;
    public $id_user;
    public $tamano_mb;
    public $directorio;

    public function __construct($args = [])
    {
        $this->id_cuotas = $args['id_cuotas'] ?? null;
        $this->id_user = $args['id_user'] ?? null;
        $this->tamano_mb = $args['tamano_mb'] ?? '';
        $this->directorio = $args['directorio'] ?? '';
    }

    public function validar()
    {
        if (!$this->id_user) {
            self::$alertas['error'][] = 'El ID del usuario es obligatorio.';
        }

        if (!$this->tamano_mb || !is_numeric($this->tamano_mb)) {
            self::$alertas['error'][] = 'El tamaño debe ser un número.';
        }

        if (!$this->directorio) {
            self::$alertas['error'][] = 'El directorio es obligatorio.';
        }

        return self::$alertas;
    }
}

<?php

namespace Model;

use PHPMailer\PHPMailer\PHPMailer;

class Rol extends ActiveRecord {

    // Base de datos
    protected static $tabla = 'roles';
    protected static $columnasDB = ['roles_id', 'nombre', 'descripcion'];

    /** @var ?int $id */
    private $roles_id;
    /** @var string $id */
    private $nombre;
    /** @var string $descripcion */
    private $descripcion;
    
    
    public function __construct($args = [])
    {
        $this->roles_id = $args['roles_id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
    }

    public function getId() : ?int {
        return $this->roles_id;
    }

    public function getNombre() : string {
        return $this->nombre;
    }

    public function setId(?int $roles_id) {
        $this->roles_id = $roles_id;
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() : string {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    
}
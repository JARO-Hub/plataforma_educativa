<?php

namespace Model;

class Clase extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'grupos';
    protected static $columnasDB = ['grupo_id', 'educador_id', 'materia_id', 'gestion_id', 'tipo_grupo_id', 'nombre', 'descripcion', 'capacidad_maxima'];

    public $grupo_id;
    public $educador_id;
    public $materia_id;
    public $gestion_id;
    public $tipo_grupo_id;
    public $nombre;
    public $descripcion;
    public $capacidad_maxima;

    public function __construct($args = [])
    {

        $this->grupo_id = $args['grupo_id'] ?? '0';
        $this->educador_id = $args['educador_id'] ?? '0';
        $this->materia_id = $args['materia_id'] ?? '0';
        $this->gestion_id = $args['gestion_id'] ?? '0';
        $this->tipo_grupo_id = $args['tipo_grupo_id'] ?? '0';
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->capacidad_maxima = $args['capacidad_maxima'] ?? '0';
    }
}
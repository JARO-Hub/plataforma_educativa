<?php

namespace Model;

class Cuota extends ActiveRecord {
    protected static $tabla = 'cuotas';
    protected static $columnasDB = ['id_cuotas', 'id_user', 'tamano_mb', 'directorio'];

    public $id_cuotas;
    public $id_user;
    public $tamano_mb;
    public $directorio;

}

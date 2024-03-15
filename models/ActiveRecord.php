<?php
namespace Model;
class ActiveRecord {

    // Base DE DATOS
    protected static $db;
    protected static $pid;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Alertas y Mensajes
    protected static $alertas = [];
    
    // Definir la conexión a la BD - includes/database.php
    public static function setDB($database) {
        self::$db = $database;
        
    }

    public static function setPID(int $pid) {
        self::$pid = $pid;
    }

    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }

    // Validación
    public static function getAlertas() {
        return static::$alertas;
    }

    public function validar() {
        static::$alertas = [];
        return static::$alertas;
    }

    // Consulta SQL para crear un objeto en Memoria
    public static function consultarSQL($query) {
        $resultado = pg_query(self::$db, $query);
        if (!$resultado) {
            die("Error en la consulta: " . pg_last_error(self::$db));
        }
        
        $array = [];
        while ($registro = pg_fetch_assoc($resultado)) {
            $array[] = static::crearObjeto($registro);
        }
        
        pg_free_result($resultado);  // Libera el resultado para liberar memoria
        
        return $array;
    }
    

    // Crea el objeto en memoria que es igual al de la BD
    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach($registro as $key => $value ) {
            // Verificar si la propiedad existe en el objeto
            if(property_exists( $objeto, $key  )) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Sanitizar los datos antes de guardarlos en la BD
    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Sincroniza BD con Objetos en memoria
    public function sincronizar($args=[]) { 
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
          }
        }
    }

    // Registros - CRUD
    public function guardar() {
        $resultado = '';
        if(!is_null($this->id)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

    // Todos los registros
    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Busca un registro por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE id = ${id}";

        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    // Obtener Registros con cierta cantidad
    public static function get($limite) {
        $query = "SELECT * FROM tbd_application." . static::$tabla . " LIMIT ${limite}";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    // Busca un registro por su id
    public static function where($columna, $valor) {
        /** @var string $entity */
        $entity = static::$tabla;
        $query = "SELECT * FROM tbd_application." . $entity  ." WHERE {$columna} = '{$valor}'";

        self::registrarLog($query, $entity, "SELECT", "Consulta de {$entity} por {$columna}");

        $resultado = self::consultarSQL($query);

             
        return array_shift( $resultado ) ;
    }

    private static function registrarLog(string $consulta ,string $nombre_funcion ,string $operacion, string $descripcion): void
     {
        // Usar 0 o NULL para id_usuario si no está autenticado
        $idUsuario = $_SESSION['usuario_id'] ?? 0;
        
        $logQuery = "CALL tbd_application.log_registro_generico($1, $2, $3, $4, $5)";
        $params = [$idUsuario, $nombre_funcion, $operacion, $consulta, $descripcion];
        $resultado = pg_query_params(self::$db, $logQuery, $params);

        if (!$resultado) {
            die("Error en la consulta: " . pg_last_error(self::$db));
        }
        pg_free_result($resultado);  // Libera el resultado para liberar memoria

        
    }

    // Consulta Plana de SQL (Utilizar cuando los métodos del modelo no son suficientes)
    public static function SQL($query) {
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // crea un nuevo registro
    public function crear() {
        $atributos = $this->sanitizarAtributos();
        
        $query = "INSERT INTO tbd_application." . static::$tabla . " (";
        $query .= join(', ', array_keys($atributos));
        $query .= ") VALUES ('"; 
        $query .= join("', '", array_values($atributos));
        $query .= "') RETURNING id"; 
            
        $resultado = pg_query(self::$db, $query);
    
        // Comprobamos si hubo un error en la consulta
        if (!$resultado) {
            die("Error en la consulta: " . pg_last_error(self::$db));
        }
    
        $row = pg_fetch_assoc($resultado);
        $id = $row['id'];
        return [
            'resultado' =>  $resultado,
            'id' => $id
        ];
    }
    

    // Actualizar el registro
    public function actualizar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        // Consulta SQL
        $query = "UPDATE tbd_application." . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        // Actualizar BD
        $resultado = self::$db->query($query);
        return $resultado;
    }

    // Eliminar un Registro por su ID
    public function eliminar() {
        $query = "DELETE FROM tbd_application."  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    // Obtener todas la funciones de la tabla funciones, en base a un rol
    public static function getAcciones(): array
     {
        $query = "SELECT * FROM tbd_application.get_accionesbyrol($1)";
        
        $resultado = pg_query_params(self::$db, $query, [$_SESSION['id']]);
        if (!$resultado) {
            die("Error en la consulta: " . pg_last_error(self::$db));
        }

        $array = [];
        while ($registro = pg_fetch_assoc($resultado)) {
            $array[] = $registro['nombre_funcion'];
        }

        
        pg_free_result($resultado);  
   
        return $array;
    }



}
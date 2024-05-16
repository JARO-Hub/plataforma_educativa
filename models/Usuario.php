<?php

namespace Model;

use Model\Rol;
use Model\ActiveRecord;

class Usuario extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['usuario_id', 'nombre', 'apellido', 'email', 'password', 'fecha_nacimiento', 'foto_perfil', 'confirmado', 'token'];

    public $usuario_id;
    public $nombre;
    public $apellido;
    public $email;
    public $contrasena;
    public $fecha_nacimiento;
    public $foto_perfil;
    public $confirmado;
    public $token;

    public function __construct($args = []) {
        $this->usuario_id = $args['usuario_id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->contrasena = $args['contrasena'] ?? '';
        $this->fecha_nacimiento = $args['fecha_nacimiento'] ?? '';
        $this->foto_perfil = $args['foto_perfil'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
    }

    // Mensajes de validación para la creación de una cuenta
    public function validarNuevaCuenta() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->apellido) {
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }
        if(!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!$this->contrasena) {
            self::$alertas['error'][] = 'La contrasena es Obligatorio';
        }
        if(strlen($this->contrasena) < 6) {
            self::$alertas['error'][] = 'La contrasena debe contener al menos 6 caracteres';
        }



        return self::$alertas;
    }

    public function getAlertas(){
        return self::$alertas;
    }

    public function validarLogin() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es Obligatorio';
        }
        if(!$this->contrasena) {
            self::$alertas['error'][] = 'La contrasena  es Obligatorio';
        }

        return self::$alertas;
    }
    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es Obligatorio';
        }
        return self::$alertas;
    }

    public function validarContrasena() {
        if(!$this->contrasena) {
            self::$alertas['error'][] = 'El Password es obligatorio';
        }
        if(strlen($this->contrasena) < 6) {
            self::$alertas['error'][] = 'El Password debe tener al menos 6 caracteres';
        }

        return self::$alertas;
    }

    // Revisa si el usuario ya existe
    public function existeUsuario() {
        $query = " SELECT * FROM tbd_application." . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$alertas['error'][] = 'El Usuario ya esta registrado';
        }

        return $resultado;
    }

    public function hashContrasena() {
        $this->contrasena = password_hash($this->contrasena, PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this->token = uniqid();
    }

    /**
     * Verifica si el contrasena es correcto
     * @param string $contrasena
     * @return bool
     */
    public function comprobarPasswordAndVerificado($contrasena) {
        $resultado = password_verify($contrasena, $this->contrasena);
        
        if(!$resultado) {
            self::$alertas['error'][] = 'Password Incorrecto o tu cuenta no ha sido confirmada';
        } else {
            return true;
        }
    }

    /**
     * Asignamos un pid y un token a un usuario
     */
      public function createSesion(): string {
        try {


            if($this->usuario_id){
                /** @var string|false $hashedPid */
                $hashedPid = pg_query_params(self::$db, 'SELECT tbd_application.register_session($1, $2)', [$this->usuario_id, self::$pid]);
            }


            if($hashedPid) {
                $hashedPid = pg_fetch_result($hashedPid, 0, 0);
                return $hashedPid;
            } else {
                self::$alertas['error'][] = 'Error al crear la sesion';
            }
        } catch (\Exception $e) {
            self::$alertas['error'][] = 'Error al crear la sesion ' . $e->getMessage();
        }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
        
    }

    /** Postgres */
    public function getRol() : Rol
    {
       
        $query = "SELECT roles_id, nombre, descripcion FROM tbd_application.get_rol($1)";
        $resultado = pg_query_params(self::$db, $query, [$this->usuario_id]);
        if (!$resultado) {
            die("Error en la consulta: " . pg_last_error(self::$db));
        }
        
        /** @var array $array */
        $array = [];
        $rol = new Rol([]);
        $array_retorno = array();
        while ($registro = pg_fetch_assoc($resultado)) {
            
            foreach($registro as $key => $value ) {
                // Verificar si la propiedad existe en el objeto
                if(property_exists( $rol, $key  )) {
                    $array[$key] = $value;
                }
            }

            $array_retorno[] = new Rol($array);
        }

        pg_free_result($resultado); 
        return $array_retorno[0];
    }

    public static function tieneAcceso(int $id_user, string $nombre_funcion): bool
    {
        try {
            $query = "SELECT tbd_application.tiene_acceso($1, $2)";
            $resultado = pg_query_params(self::$db, $query, [$id_user, $nombre_funcion]);

            if (!$resultado) {
                throw new \Exception("Error en la consulta: " . pg_last_error(self::$db));
            }

            $tieneAcceso = pg_fetch_result($resultado, 0, 0) === 't';  // Convertir a booleano en PHP
            pg_free_result($resultado);
            
            return $tieneAcceso;

        } catch (\Exception $e) {
            self::$alertas['error'][] = 'Error al pedir el rol ' . $e->getMessage();
            return false;  // Retorna false por defecto si hay un error
        }
    }

    public static function is_estudiante(int $usuario_id): bool
    {
        try {
            $query = "SELECT tbd_application.is_estudiante($1)";
            $resultado = pg_query_params(self::$db, $query, [$usuario_id]);

            if (!$resultado) {
                throw new \Exception("Error en la consulta: " . pg_last_error(self::$db));
            }

            $esEstudiante = pg_fetch_result($resultado, 0, 0) === 't';  // Convertir a booleano en PHP
            pg_free_result($resultado);
            
            return $esEstudiante;

        } catch (\Exception $e) {
            self::$alertas['error'][] = 'Error al pedir el rol ' . $e->getMessage();
            return false;  // Retorna false por defecto si hay un error
        }
    }

    public static function is_educador(int $usuario_id): bool
    {
        try {
            $query = "SELECT tbd_application.is_educador($1)";
            $resultado = pg_query_params(self::$db, $query, [$usuario_id]);

            if (!$resultado) {
                throw new \Exception("Error en la consulta: " . pg_last_error(self::$db));
            }

            $esEducador = pg_fetch_result($resultado, 0, 0) === 't';  // Convertir a booleano en PHP
            pg_free_result($resultado);
            
            return $esEducador;

        } catch (\Exception $e) {
            self::$alertas['error'][] = 'Error al pedir el rol ' . $e->getMessage();
            return false;  // Retorna false por defecto si hay un error
        }
    }

    public static function c_TareaEstudiante (int $usuario_id, string $file, int $tarea_id, int $educador_id, int $grupo_id, int $tamano): void
    {
        try {

            if (!Usuario::tieneAcceso($usuario_id, 'c_TareaEstudiante')) {
                throw new \Exception("No tiene acceso a esta funcion");
            }
            /** @var string $query */
            $query = "CALL tbd_application.c_TareaEstudiante($1, $2, $3, $4, $5, $6)";
            $resultado = pg_query_params(
                self::$db, 
                $query, 
                [
                    $usuario_id, 
                    $file, 
                    $tarea_id, 
                    $educador_id, 
                    $grupo_id,
                    $tamano
                ]
            );

            if (!$resultado) {
                throw new \Exception("Error en la consulta: " . pg_last_error(self::$db));
            }

            pg_free_result($resultado);
            

        } catch (\Exception $e) {
            self::$alertas['error'][] = 'Error ' . $e->getMessage();
            return ;  // Retorna false por defecto si hay un error
        }
    }

    /**
     * CREATE OR REPLACE PROCEDURE c_TareasEnUnGrupo(p_id_educador int, p_titulo_tarea VARCHAR, p_descripcion_tarea text, p_fecha_limite date, p_puntaje_maximo INTEGER, p_file text, p_id_grupo int, p_file_tamano integer) AS $$

     */
    public static function c_TareasEnUnGrupo (int $educador_id, string $titulo_tarea, string $descripcion_tarea, int $puntaje_maximo, string $file, int $grupo_id, int $file_tamano, ?string $fecha_limite): array
    {
        try {

            if (!Usuario::tieneAcceso($educador_id, 'c_TareasEnUnGrupo')) {
                throw new \Exception("No tiene acceso a esta funcion");
            }

            /** @var string $query */
            $query = "CALL tbd_application.c_TareasEnUnGrupo($1, $2, $3, $4, $5, $6, $7, $8)";
            $resultado = pg_query_params(
                self::$db, 
                $query, 
                [
                    $educador_id, 
                    $titulo_tarea, 
                    $descripcion_tarea, 
                    $puntaje_maximo,
                    $file,
                    $grupo_id,
                    $file_tamano,
                    $fecha_limite
                ]
            );

            if (!$resultado) {
                throw new \Exception("Error en la consulta: " . pg_last_error(self::$db));
            }

            $array = [];
            while ($registro = pg_fetch_assoc($resultado)) {
                $array[] = $registro;
            }

            pg_free_result($resultado);
            
            return $array;

        } catch (\Exception $e) {
            self::$alertas['error'][] = 'Error al pedir el rol ' . $e->getMessage();
            return [];  // Retorna false por defecto si hay un error
        }
    }

    public static function get_grupos(int $id_educador): array
    {
        try {

            if (!Usuario::tieneAcceso($id_educador, 'get_grupos')) {
                throw new \Exception("No tiene acceso a esta funcion");
            }

            $query = "SELECT * FROM tbd_application.get_grupos($1)";
            $resultado = pg_query_params(self::$db, $query, [$id_educador]);

            if (!$resultado) {
                throw new \Exception("Error en la consulta: " . pg_last_error(self::$db));
            }

            $array = [];
            while ($registro = pg_fetch_assoc($resultado)) {
                $array[] = $registro;
            }

            pg_free_result($resultado);
            

            return $array;

        } catch (\Exception $e) {
            self::$alertas['error'][] = 'Error al pedir el rol ' . $e->getMessage();
            return [];  // Retorna false por defecto si hay un error
        }
    }


    public static function get_tareas(int $id_educador): array
    {
        try {

            if (!Usuario::tieneAcceso($id_educador, 'get_tareas')) {
                throw new \Exception("No tiene acceso a esta funcion");
            }

            $query = "SELECT * FROM tbd_application.get_tareas($1)";
            $resultado = pg_query_params(self::$db, $query, [$id_educador]);

            if (!$resultado) {
                throw new \Exception("Error en la consulta: " . pg_last_error(self::$db));
            }

            $array = [];
            while ($registro = pg_fetch_assoc($resultado)) {
                $array[] = $registro;
            }

            pg_free_result($resultado);
            

            return $array;

        } catch (\Exception $e) {
            self::$alertas['error'][] = 'Error al pedir el rol ' . $e->getMessage();
            return [];  // Retorna false por defecto si hay un error
        }
    }

}
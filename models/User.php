<?php
namespace MVC\models;
class User extends ActiveRecord
{
    private $id_user;
    private $nombre;
    private $apellido;
    private $user_name;
    private $password;
    private $email;
    protected static $tabla = 'users';
    protected static $columnasDB = [
        'id_user', 'nombre',
        'apellido', 'email',
        'password', 'user_name'];

    public function __construct($args = []) {
        $this->id_user = $args['id_user'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->user_name = $args['user_name'] ?? '';
    }
    // Mensajes de validación para la creación de una cuenta
    public function validarUser() {
        // Validar que el nombre no esté vacío
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }

        // Validar que el apellido no esté vacío
        if (!$this->apellido) {
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }

        // Validar que el email no esté vacío
        if (!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }

        // Validar que la contraseña no esté vacía
        if (!$this->contrasena) {
            self::$alertas['error'][] = 'La contrasena es Obligatoria';
        }

        // Validar que la contraseña tenga al menos 6 caracteres
        if (strlen($this->contrasena) < 6) {
            self::$alertas['error'][] = 'La contrasena debe contener al menos 6 caracteres';
        }

        // Validar que el nombre de usuario no esté vacío
        if (!$this->user_name) {
            self::$alertas['error'][] = 'El Nombre de Usuario es Obligatorio';
        }

        return self::$alertas;
    }

    //Método atributos() para que funcione con la base de datos
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id_user') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Actualizar el registro
    public function actualizar() {
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        // Consulta SQL para actualizar el registro
        $query = "UPDATE public." . static::$tabla ." SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id_user = '" . self::$db->escape_string($this->id_user) . "' ";
        $query .= " LIMIT 1";

        // Ejecutar la consulta
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function crear() {
        // Sanitizar los atributos antes de insertarlos
        $atributos = $this->sanitizarAtributos();

        // Construir la consulta SQL para insertar el nuevo registro
        $query = "INSERT INTO public." . static::$tabla . " (";
        $query .= join(', ', array_keys($atributos)); // Los nombres de las columnas
        $query .= ") VALUES ('";
        $query .= join("', '", array_values($atributos)); // Los valores de las columnas
        $query .= "') RETURNING id"; // Obtenemos el id generado

        // Ejecutar la consulta
        $resultado = pg_query(self::$db, $query);

        // Comprobar si la consulta fue exitosa
        if (!$resultado) {
            die("Error en la consulta: " . pg_last_error(self::$db));
        }

        // Obtener el id generado por la base de datos
        $row = pg_fetch_assoc($resultado);
        $id = $row['id'];

        // Retornar el resultado de la consulta y el id
        return [
            'resultado' => $resultado,
            'id' => $id
        ];
    }
    //metodo para guardar el registro, ya sea actualizando o creando
    public function guardar() {
        $resultado = '';
        if(!is_null($this->id_user)) {
            // Si id_user no es null, se actualiza el registro
            $resultado = $this->actualizar();
        } else {
            // Si id_user es null, se crea un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

}
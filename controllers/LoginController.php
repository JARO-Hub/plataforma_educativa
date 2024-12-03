<?php

namespace Controllers;

use MVC\Router;
use Model\Rol;
use Classes\Email;
use Model\Usuario;

class LoginController {
    public static function login(Router $router) {
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();
           
            if(empty($alertas)) {
                // Comprobar que exista el usuario
                /** @var Usuario $usuario */
                $usuario = Usuario::where('email', $auth->email);
                
    
                if($usuario) {
                    // Verificar el password
                    if( $usuario->comprobarPasswordAndVerificado($auth->contrasena) ) {
                       
                        /**
                         * Validamos roles de usuario
                         */
                        /** @var string $token */
                        $token = $usuario->createSesion();
                        /**
                         * Obtenemos el rol del usuario
                         */
                        /** @var Rol $rol */
                        $rol = $usuario->getRol();
                        // Autenticar el usuario
                        session_start();

                        $_SESSION['id'] = $usuario->usuario_id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;
                        $_SESSION['token'] = $token; 
                        $_SESSION['rol'] = $rol->getId();
                        // Redireccionamiento    
                            header('Location: /'. $rol->getNombre());
                        
                    }
                } else {
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }
                $alertas = Usuario::getAlertas();

                $router->render(
                    'auth/login',
                    [
                        'alertas' => $alertas
                    ]
                );

            }
        }
        else{
            $alertas = Usuario::getAlertas();

            $router->renderLogin(
                'auth/login',
                [
                    'alertas' => $alertas
                ]
            );
        }
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }

    public static function olvide(Router $router) {

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();

            if(empty($alertas)) {
                 $usuario = Usuario::where('email', $auth->email);

                 if($usuario && $usuario->confirmado === "1") {
                        
                    // Generar un token
                    $usuario->crearToken();
                    $usuario->guardar();

                    //  Enviar el email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarInstrucciones();

                    // Alerta de exito
                    Usuario::setAlerta('exito', 'Revisa tu email');
                 } else {
                     Usuario::setAlerta('error', 'El Usuario no existe o no esta confirmado');
                     
                 }
            } 
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/olvide-password', [
            'alertas' => $alertas
        ]);
    }

    public static function recuperar(Router $router) {
        $alertas = [];
        $error = false;

        $token = s($_GET['token']);

        // Buscar usuario por su token
        /** @var Usuario $usuario */
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
            Usuario::setAlerta('error', 'Token No Válido');
            $error = true;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Leer la nueva contrasena y guardarlo

            $password = new Usuario($_POST);
            $alertas = $password->validarContrasena();

            if(empty($alertas)) {
                $usuario->contrasena = null;

                $usuario->contrasena = $password->contrasena;
                $usuario->hashContrasena();
                $usuario->token = null;

                $resultado = $usuario->guardar();
                if($resultado) {
                    header('Location: /');
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/recuperar-password', [
            'alertas' => $alertas, 
            'error' => $error
        ]);
    }

    /*public static function crear(Router $router) {
        $usuario = new Usuario;

        // Alertas vacias
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            // Revisar que alerta este vacio
            if(empty($alertas)) {
                // Verificar que el usuario no este registrado
                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear el Contrasena
                    $usuario->hashContrasena();

                    // Generar un Token único
                    $usuario->crearToken();

                    // Enviar el Email
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarConfirmacion();

                    // Crear el usuario
                    $resultado = $usuario->guardar();
                    // debuguear($usuario);
                    if($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }
        
        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }*/
    public static function crear(Router $router) {
        $alertas = [];

        // Verificar si el método es POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Extraer todos los datos del POST
            $data = $_POST;
            $files = $_FILES;

            // 1. Crear Usuario
            $usuario = new User();
            $usuario->sincronizar($data); // Rellenar el objeto User con los datos recibidos

            // Validar la contraseña
            $passwordErrors = PasswordService::validatePasswordStrength($data['password']);
            $alertas = array_merge($alertas, $passwordErrors);

            if (empty($alertas)) {
                // Si las validaciones de la contraseña son correctas, se encripta la contraseña
                $usuario->password = PasswordService::hashPassword($data['password']);
                $resultado = $usuario->guardar();

                if ($resultado['resultado']) {
                    $_SESSION['user_id'] = $resultado['id']; // Almacenar el ID del usuario en la sesión
                } else {
                    $alertas[] = 'Error al guardar el usuario.';
                }
            }

            // 2. Crear Cuotas
            $cuotas = new Cuotas();
            $cuotas->sincronizar($data);
            $cuotas->id_user = $_SESSION['user_id']; // Asociar las cuotas con el usuario recién creado
            $alertasCuotas = $cuotas->validar();

            if (empty($alertasCuotas)) {
                $cuotas->guardar();
            } else {
                $alertas = array_merge($alertas, $alertasCuotas);
            }

            // 3. Configuración de FTP
            $ftp = new FTPUsers();
            $ftp->sincronizar($data);
            $ftp->id_user = $_SESSION['user_id']; // Asociar el FTP con el usuario
            $alertasFTP = $ftp->validar();

            if (empty($alertasFTP)) {
                $ftp->guardar();
            } else {
                $alertas = array_merge($alertas, $alertasFTP);
            }

            // 4. Configuración de Base de Datos
            $dbAdmin = new DBAdminsPgSQL();
            $dbAdmin->sincronizar($data);
            $dbAdmin->id_user = $_SESSION['user_id']; // Asociar la base de datos con el usuario
            $alertasDB = $dbAdmin->validar();

            if (empty($alertasDB)) {
                $dbAdmin->guardar();
            } else {
                $alertas = array_merge($alertas, $alertasDB);
            }

            // 5. Subir Archivos
            $fileUpload = FileService::uploadFiles($files['files']);
            $alertasArchivos = $fileUpload['errors'];

            if (empty($alertasArchivos)) {
                // Si los archivos se subieron correctamente, se pueden procesar
                $_SESSION['archivos_subidos'] = $fileUpload['files']; // Almacenar archivos subidos en la sesión
                header('Location: /finalizado'); // Redirigir a la página de confirmación
            } else {
                $alertas = array_merge($alertas, $alertasArchivos);
            }
        }

        // Renderizar la vista con los posibles errores
        $router->render('auth/crear-cuenta', [
            'alertas' => $alertas
        ]);
    }



    public static function mensaje(Router $router) {
        $router->render('auth/mensaje');
    }

    public static function confirmar(Router $router) {
        $alertas = [];
        $token = s($_GET['token']);
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
            // Mostrar mensaje de error
            Usuario::setAlerta('error', 'Token No Válido');
        } else {
            // Modificar a usuario confirmado
            $usuario->confirmado = "1";
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta Comprobada Correctamente');
        }
       
        // Obtener alertas
        $alertas = Usuario::getAlertas();

        // Renderizar la vista
        $router->render('auth/confirmar-cuenta', [
            'alertas' => $alertas
        ]);
    }
}
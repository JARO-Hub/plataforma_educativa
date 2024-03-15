<?php

namespace Controllers;


use DateTime;
use MVC\Router;
use Model\Usuario;
use Model\ActiveRecord;

class EducadorController {

    public static function index(Router $router) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        

      //  isAdmin();

      //  $servicios = Servicio::all();
       /** @var array $testAccesos */
        $testAccesos = ActiveRecord::getAcciones();

        $router->render('servicios/index', [
            'nombre' => $_SESSION['nombre'],
            'funciones' => $testAccesos,
            'user' => 'educador'
           // 'servicios' => $servicios
        ]);
    }

    public static function home(Router $router) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        /** rescatamos del posts  */
        $alertas = [];
        $auth = new Usuario();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

                $usuario = $_SESSION['id'];
                $titulo_tarea = $_POST['tarea_titulo'];
                $descripcion_tarea = $_POST['tarea_descripcion'];
                $fecha_limite_tarea = $_POST['tarea_fecha_limite'] === '' ? null : $_POST['tarea_fecha_limite'];
                $puntaje_maximo = $_POST['tarea_puntaje_maximo'];
                $grupo = $_POST['grupo'];
                $peso = 0;
                $fileContent = null;


                if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {

                    $fileTmpPath = $_FILES['file']['tmp_name'];
                    $fileName = $_FILES['file']['name'];

                    // Extraer la extensión del archivo
                    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

                    // Definir la estructura de directorio y el nombre del archivo
                    $uploadDir = "../storage/" . $usuario . "/";
                    $uploadFilePath = $uploadDir . $fileName;

                    // Asegurarse de que el directorio exista
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0755, true);
                    }

                    // Mover el archivo subido a la ubicación deseada
                    if (move_uploaded_file($fileTmpPath, $uploadFilePath)) {
                        // El archivo se movió correctamente
                        $fileContent = $fileName;
                    } else {
                        // Hubo un error al mover el archivo
                        
                    }

                    

                    //calculamos el peso 
                    $peso = $_FILES['file']['size'];
                }

                    $auth::c_TareasEnUnGrupo (
                    intval($usuario),
                    $titulo_tarea,
                    $descripcion_tarea,
                    intval($puntaje_maximo),
                    $fileContent,
                    intval($grupo),
                    $peso,
                    $fecha_limite_tarea
                );

            $auth::setAlerta('exito', 'Tarea registrada correctamente');
            
        }
        $alertas = $auth::getAlertas();
        /* Formulario con datos dinamicos aleatorios */
        /** @var array $grupos */
        $grupos = $auth::get_grupos(intval($_SESSION['id']));
        
        // pasamos un array aleatorio
        $grupo = $grupos[array_rand($grupos)];

        $router->render('servicios/tareas', [
            'alertas' => $alertas,
            /* Formulario con datos dinamicos aleatorios */
            'grupo' => $grupo
        ]);
    }
}


<?php

namespace Controllers;

use DateTime;
use MVC\Router;
use Model\Usuario;
use Model\ActiveRecord;

class EstudianteController {

    public static function index(Router $router) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        

       /** @var array $testAccesos */
        $testAccesos = ActiveRecord::getAcciones();

        $router->render('servicios/index', [
            'nombre' => $_SESSION['nombre'],
            'funciones' => $testAccesos,
            'user' => 'estudiante'
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
                $tarea = $_POST['tarea'];
                $educador = $_POST['educador'];
                $grupo = $_POST['grupo'];
                $peso = 0;
                $fileContent = '';

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

                $auth::c_TareaEstudiante (
                    intval($usuario), 
                    $fileContent, 
                    intval($tarea), 
                    intval($educador), 
                    intval($grupo),
                    $peso
                );

                $auth::setAlerta('exito', 'Tarea enviada correctamente');
            
        }
        $alertas = $auth::getAlertas();
        /* Formulario con datos dinamicos aleatorios */
        /** @var array $grupos */
        $grupos = $auth::get_tareas(intval($_SESSION['id']));
        
        // pasamos un array aleatorio
        $grupo = $grupos[array_rand($grupos)];

        $router->render('servicios/tareasestudiantes', [
            'alertas' => $alertas,
            /* Formulario con datos dinamicos aleatorios */
            'grupo' => $grupo
        ]);
    }


}


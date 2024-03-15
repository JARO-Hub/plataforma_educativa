<?php

namespace Controllers;

use Model\Clase;
use Model\ClaseServicio;
use Model\Servicio;

class APIController {
    public static function index() {
        $servicios = Servicio::all();
        echo json_encode($servicios);
    }

    public static function guardar() {
        
        // Almacena la Clase y devuelve el ID
        $cita = new Clase($_POST);
        $resultado = $cita->guardar();

        $id = $resultado['id'];

        // Almacena la Clase y el Servicio

        // Almacena los Servicios con el ID de la Clase
        $idServicios = explode(",", $_POST['servicios']);
        foreach($idServicios as $idServicio) {
            $args = [
                'citaId' => $id,
                'servicioId' => $idServicio
            ];
            $citaServicio = new ClaseServicio($args);
            $citaServicio->guardar();
        }

        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar() {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $cita = Clase::find($id);
            $cita->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
}
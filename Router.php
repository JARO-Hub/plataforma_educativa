<?php

namespace MVC;

class Router
{
    public $getRoutes = array();
    public $postRoutes = array();

    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas() {
        $currentUrl = $_SERVER['REQUEST_URI'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        // Verificar si la URL y método existen en las rutas registradas
        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ($fn) {
            // Llamar a la función registrada para la ruta
            call_user_func($fn, $this); 
        } else {
            // Mostrar un mensaje de error si la ruta no existe
            echo "Página No Encontrada o Ruta no válida";
        }
    }

    public function render($view, $datos = []) {
        // Asignar datos pasados a variables
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start(); // Almacenar temporalmente el contenido de la vista

        // Incluir la vista
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Obtener y limpiar el buffer
        include_once __DIR__ . '/views/layout.php'; // Incluir el layout principal
    }
}

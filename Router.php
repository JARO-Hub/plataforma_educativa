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
        include_once __DIR__ . '/views/layout.php';
    }

    public function renderLogin($view, $datos = []) {
        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start(); // Almacenamiento en memoria durante un momento...

        // entonces incluimos la vista en el layout
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el Buffer
        include_once __DIR__ . '/views/layout_login.php';
       // $contenido = ob_get_clean(); // Limpia el Buffer
    }

    public function tiene_acceso_estd(){

        /** @var bool $response */
        $response = ServicioController::is_estudiante();

        return $response;        

    }

    public function tiene_acceso_edu(){
        
        /** @var bool $response */
        $response = ServicioController::is_educador(); 

        return $response;       

    }
}

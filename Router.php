<?php

namespace MVC;

use Controllers\ServicioController;

class Router
{

    public $getRoutes = array();
    public  $postRoutes = array();

    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas() {
        $currentUrl = $_SERVER['REQUEST_URI'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }
        
        if ( $fn ) {
            // Call user fn va a llamar una función cuando no sabemos cual sera
            call_user_func($fn, $this); // This es para pasar argumentos
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }
    }

    public function render($view, $datos = []) {
        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }
        ob_start(); // Almacenamiento en memoria durante un momento...
        // entonces incluimos la vista en el layout
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el Buffer
            // Si se ha recibido una solicitud GET, muestra el archivo PHP correspondiente
        include_once __DIR__ . '/views/layout.php';
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

?>
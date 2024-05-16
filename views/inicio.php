<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Navegación</title>
    <style>
        /* Oculta el contenido de Acerca de por defecto */
        #acercaDe {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav>
        <ul>
            <li><a href="#" id="inicio">Inicio</a></li>
            <li><a href="#" id="acerca">Acerca de</a></li>
        </ul>
    </nav>

    <!-- Contenido de Inicio -->
    <div id="inicioContenido">
        <h1>Contenido de Inicio</h1>
        <p>Este es el contenido de la página de inicio.</p>
    </div>

    <!-- Contenido de Acerca de -->
    <div id="acercaDe">
        <h1>Contenido de Acerca de</h1>
        <p>Este es el contenido de la página Acerca de.</p>
    </div>

    <!-- Script para manejar el clic en la barra de navegación -->
    <script>
        // Maneja el clic en el enlace de Inicio
        document.getElementById('inicio').addEventListener('click', function() {
            document.getElementById('Inicio').style.display = 'block';
            document.getElementById('RecursosCompartidos').style.display = 'none';
            document.getElementById('Configuración').style.display = 'none';
        });

        // Maneja el clic en el enlace de Acerca de
        document.getElementById('Inicio').addEventListener('click', function() {
            document.getElementById('RecursosCompartidos').style.display = 'none';
            document.getElementById('Configuración').style.display = 'block';
        });

        document.getElementById('Configuración').addEventListener('click', function() {
            document.getElementById('Inicio').style.display = 'none';
            document.getElementById('RecursosCompartidos').style.display = 'none';
            document.getElementById('Configuración').style.display = 'block';
        });
    </script>
</body>
</html>


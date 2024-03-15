<h1 class="nombre-pagina">Tareas de Educador</h1>
<p class="descripcion-pagina">Llena todos los campos para añadir una tarea al grupo id: <?php echo $grupo['grupo_id'] ?></p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form action="/educador/home" method="POST" class="formulario" enctype="multipart/form-data">
    <?php include_once __DIR__ . '/formulario.php'; ?>
    <input type="submit" class="boton" value="Guardar">
</form>
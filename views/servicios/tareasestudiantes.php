<h1 class="nombre-pagina">Entregar tareas</h1>
<p class="descripcion-pagina">Tarea con id=<?php echo $grupo['tarea_id'] ?>.</p>
<p class="descripcion-pagina">Grupo con id=<?php echo $grupo['grupo_id'] ?>.</p>
<p class="descripcion-pagina">Educador con id=<?php echo $grupo['educador_id'] ?>.</p>
<?php
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form action="/estudiante/home" method="POST" class="formulario" enctype="multipart/form-data">
    <?php include_once __DIR__ . '/formularioestudiante.php'; ?>
    <input type="submit" class="boton" value="Guardar">
</form>
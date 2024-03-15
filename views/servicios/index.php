<h1 class="nombre-pagina">Servicios </h1>
<p class="descripcion-pagina">Administración de Servicios</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
    $path = ($user === 'estudiante') ? 'estudiante' : 'educador';
    $label = ucfirst($path);
?>

<ul class="servicios">
    <?php //foreach($servicios as $servicio) { ?>
        <li>
            <div class="acciones">
                <a class="boton" href="/<?php echo $path; ?>/home"><?php echo $label; ?></a>
                
                <form action="/servicios/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php "Probando 3" ?>">

                   <!-- <input type="submit" value="Borrar" class="boton-eliminar"> !-->
                </form>
            </div>
            <?php for ($i = 0; $i< count($funciones); $i++) { ?>
                    <p>Acceso a funcion: <span><?php echo $funciones[$i]; ?></span> </p>
             <?php } ?>

             
        </li>
    
</ul>
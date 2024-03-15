<h1 class="nombre-pagina">Servicios Educador</h1>
<p class="descripcion-pagina">Administración de Servicios</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
?>

<ul class="servicios">
    <?php //foreach($servicios as $servicio) { ?>
        <li>
            <div class="acciones">
                <a class="boton" href="/servicios/actualizar?id=<?php // $servicio->id; ?>">Actualizar</a>
                
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
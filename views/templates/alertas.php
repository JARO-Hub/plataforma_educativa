<?php
    foreach($alertas as $key => $mensajes):
        foreach($mensajes as $mensaje):
?>
    <div class="alerta <?php echo $key; ?>">
        <?php echo $mensaje; ?>
    </div>
<?php
        endforeach;
    endforeach;
?>

<?php if (!empty($alertas) && is_array($alertas)) : ?>
    <?php foreach ($alertas as $alerta) : ?>
        <div class="alert alert-info"><?php echo $alerta; ?></div>
    <?php endforeach; ?>
<?php endif; ?>
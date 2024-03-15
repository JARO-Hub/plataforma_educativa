<div class="campo">
    <label for="tarea_titulo">Titulo</label>
    <spam for="tarea_titulo"><?php echo $grupo['titulo'] ?></spam>
</div>
<div class="campo">
    <spam for="tarea_descripcion"><?php echo $grupo['descripcion'] ?></spam>
</div>
<div class="campo">
    <label for="puntaje_maximo"><?php echo $grupo['puntaje_maximo'] ?></label>
</div>
<div class="campo file-area">
        <label for="file">Adjunta <span>tus archivos aquí</span></label>
    <input type="file" name="file" id="file" required="required" multiple="multiple"/>
    <div class="file-dummy">
      <div class="success">Tienes archivos subidos</div>
      <div class="default">Por favor adjunta un arquivo</div>
    </div>
  </div>

<input type="hidden" name="grupo" value="<?php echo $grupo['grupo_id'] ?>">
<input type="hidden" name="tarea" value="<?php echo $grupo['tarea_id'] ?>">
<input type="hidden" name="educador" value="<?php echo $grupo['educador_id'] ?>">

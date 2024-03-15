<div class="campo">
    <label for="tarea_titulo">Titulo de la tarea</label>
    <input 
        type="text"
        id="tarea_titulo"
        placeholder="ejm: Investigación de la historia de la programación"
        name="tarea_titulo"
        value=""
    />
</div>
<div class="campo">
    <label for="tarea_descripcion">Descripción</label>
    <textarea 
        id="tarea_descripcion"
        placeholder="Por equipos de 5 personas ..."
        name="tarea_descripcion"
        value=""
        cols="100"
        rows="5"
    ></textarea>
</div>
<div class="campo">
    <label for="tarea_fecha_limite">Fecha limite</label>
    <input 
        type="date"
        id="tarea_fecha_limite"
        placeholder="Fecha limite"
        name="tarea_fecha_limite"
        value=""
    />
</div>

<div class="campo">
    <label for="tarea_puntaje_maximo">Puntaje maximo</label>
    <input 
        type="number"
        id="tarea_puntaje_maximo"
        placeholder="Puntaje maximo"
        name="tarea_puntaje_maximo"
        value=""
        min="0"
        max="100"
    />
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

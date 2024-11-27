<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia sesión con tus datos</p>

<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label for="email">Email</label>
        <input
            type="email"
            id="email"
            placeholder="Tu Email"
            name="email"
        />
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password"
            id="password"
            placeholder="Tu Password"
            name="contrasena"

        />
    </div>

    <input type="submit" class="boton" value="Iniciar Sesión">
</form>

<div class="acciones">
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? <strong>Crear una</strong></a>
    <a href="/olvide">¿Olvidaste tu password?</a>
</div>


<?php
$css = [
    '/assets/plugins/custom/datatables/datatables.bundle.css'
];
$js = [
    '/assets/plugins/custom/datatables/datatables.bundle.js',
    '/assets/js/home/list.js',
    '/assets/js/custom/apps/user-management/users/list/add.js',
    '/assets/js/custom/apps/user-management/users/list/export-users.js',
    '/assets/js/widgets.bundle.js',
];
?>

<?php
include_once __DIR__ . '/../templates/alertas.php';
include_once __DIR__ .'/../templates/wrapper.php';
?>
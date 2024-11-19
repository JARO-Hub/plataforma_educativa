<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Educativa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/plugins/global/plugins.bundle.css">
    <link rel="stylesheet" href="/assets/css/style.bundle.css">
    <link rel="shortcut icon" href="/assets/media/logos/favicon.ico" sizes="30x30">

    <?php if (!empty($css)): ?>
        <?php foreach ($css as $stylesheet): ?>
            <link rel="stylesheet" href="<?php echo htmlspecialchars($stylesheet); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body id="kt-body" data-kt-app-header-stacked="true" data-kt-app-header-primary-enabled="true" data-kt-app-header-secondary-enabled="true" data-kt-app-toolbar-enabled="true" class="app-default" data-kt-sticky-app-header-primary-sticky="on" data-kt-app-header-primary-sticky="on">
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <h1 class="nombre-pagina">Login</h1>
            <p class="descripcion-pagina">Inicia sesión con tus datos</p>
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
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->




    <script src="/assets/plugins/global/plugins.bundle.js"></script>

    <script src="/assets/js/scripts.bundle.js"></script>
        <?php if (!empty($js)): ?>
            <?php foreach ($js as $script): ?>
                <script src="<?php echo htmlspecialchars($script); ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>



</body>
</html>
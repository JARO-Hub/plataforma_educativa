<?php
/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $email = $_POST['email'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $foto_perfil = $_FILES['foto_perfil'] ?? null;

    // Valida los campos (Ejemplo: asegura que los datos no están vacíos)
    if (empty($nombre) || empty($apellido) || empty($email) || empty($contrasena) || empty($fecha_nacimiento) || !$foto_perfil) {
        echo "<div class='alert alert-danger'>Todos los campos son obligatorios.</div>";
    } else {
        // Procesa la foto de perfil
        $upload_dir = 'uploads/';
        $foto_nombre = basename($foto_perfil['name']);
        $upload_path = $upload_dir . $foto_nombre;

        if (move_uploaded_file($foto_perfil['tmp_name'], $upload_path)) {
            // Guardar datos en la base de datos (lógica simplificada)
            echo "<div class='alert alert-success'>Usuario registrado exitosamente.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al subir la foto de perfil.</div>";
        }
    }
}*/
?>

<!-- Formulario -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Registro de Usuario</h3>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <!-- Apellido -->
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <!-- Contraseña -->
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <!-- Fecha de Nacimiento -->
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
            <!-- Foto de Perfil -->
            <div class="mb-3">
                <label for="foto_perfil" class="form-label">Foto de Perfil</label>
                <input type="file" class="form-control" id="foto_perfil" name="foto_perfil" accept="image/*" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>
</div>

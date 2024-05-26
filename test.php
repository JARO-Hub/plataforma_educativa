¡<?php

// Comando para obtener el estado del servicio Samba
$command = 'systemctl is-active smbd';

// Ejecutar el comando y capturar la salida
exec($command, $output, $returnCode);

// Verificar si se ejecutó correctamente el comando
if ($returnCode === 0 && !empty($output)) {
    $status = implode("\n", $output); // Convertir el array de salida a string
    if (stripos($status, 'active') !== false) {
        echo 'Estado del servicio Samba: Activo';
    } elseif (stripos($status, 'inactive') !== false) {
        echo 'Estado del servicio Samba: Inactivo';
    } else {
        echo 'Estado del servicio Samba: Desconocido'; // En caso de estado no reconocido
    }
} else {
    echo 'Error al obtener el estado del servicio Samba'; // En caso de error al ejecutar el comando
}

?>


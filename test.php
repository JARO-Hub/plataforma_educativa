<?php
// Ruta al script estado_samba.sh
$getStatusCommand = __DIR__ . '/../scripts/inicio/estado_samba.sh';

// Ejecutar el comando
exec($getStatusCommand, $output, $returnCode);

// Imprimir salida y código de retorno para depuración
var_dump($output);
echo "Return code: $returnCode\n";

#!/usr/bin/env php
<?php

require_once 'ActiveRecord.php'; // Intenta incluir el archivo sin usar __DIR__

$shareName = 'misfotos';
$shareComment = 'fotos 2023';
$sharePath = '/path/to/share';
$writable = 'yes';
$browseable = 'yes';
$guestOk = 'yes';
$createMask = '0775';
$directoryMask = '0775';
$readOnly = false; // o true, dependiendo del caso
$password = '2018';

$result = \Model\ActiveRecord::createSharedDirectory($shareName, $shareComment, $sharePath, $writable, $browseable, $guestOk, $createMask, $directoryMask, $readOnly, $password);

if ($result) {
    echo "Shared directory created successfully.";
} else {
    echo "Failed to create shared directory.";
}



$shares = \Model\ActiveRecord::all();
// Imprimir el contenido de la lista por terminal
// Imprimir el contenido de la lista por terminal
//foreach ($shares as $share) {
  //  echo "Nombre: " . $share->name . PHP_EOL;
    //echo "Ruta: " . $share->path . PHP_EOL;
 //   echo "Invitado permitido: " . $share->guestOk . PHP_EOL;
   // echo "Comentario: " . $share->comment . PHP_EOL;
  //  echo "Escribible: " . $share->writable . PHP_EOL;
   // echo PHP_EOL; // Agregar una línea en blanco para separar cada recurso compartido
//}

?>

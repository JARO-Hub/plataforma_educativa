#!/usr/bin/env php
<?php

require_once 'ActiveRecord.php'; // Intenta incluir el archivo sin usar __DIR__

$shareName = 'misfotos';
$shareComment = 'fotos vacaciones 2023 vacaciones';
$sharePath = '/path/to/share';
$writable = 'yes';
$browseable = 'yes';
$guestOk = 'yes';
$createMask = '0700';
$directoryMask = '0700';
$readOnly = 'yes'; // o true, dependiendo del caso
$password = '2018';

/*
$result = \Model\ActiveRecord::createSharedDirectory($shareName, $shareComment, $sharePath, $writable, $browseable, $guestOk, $createMask, $directoryMask, $readOnly, $password);

if ($result) {
    echo "Shared directory created successfully.";
} else {
    echo "Failed to create shared directory.";
}
*/


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

/*
$modify = \Model\ActiveRecord::modifySharedDirectory($shareName, $shareComment, $sharePath, $writable, $browseable, $guestOk, $createMask, $directoryMask, $readOnly, $password);
echo $modify ? "La modificación se realizó correctamente." : "Hubo un error al modificar el recurso compartido.";
*/



$delete = \Model\ActiveRecord::deleteSharedDirectory($shareName,$password);
echo $delete

?>

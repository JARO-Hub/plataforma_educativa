#!/usr/bin/env php
<?php


namespace Model;

use Model\ActiveRecord;


$shareName = 'misfotos';
$shareComment = 'fotos vacaciones';
$sharePath = '/path/to/share';
$writable = 'No';
$browseable = 'No';
$guestOk = 'yes';
$createMask = '0755';
$directoryMask = '0755';
$readOnly = 'yes'; // o true, dependiendo del caso


$activeRecordInstance = new ActiveRecord('jose', '2018', 'hola', 'ruta', 'ok', 'commen', 'writable');
$result = $activeRecordInstance->createSharedDirectory($shareName, $shareComment, $sharePath, $writable, $browseable, $guestOk, $createMask, $directoryMask, $readOnly);

// Verificar el resultado
if ($result) {
    echo "El recurso compartido se creó correctamente.";
} else {
    echo "No se pudo crear el recurso compartido.";
}


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


/*
$delete = \Model\ActiveRecord::deleteSharedDirectory($shareName,$password);
echo $delete
*/



?>

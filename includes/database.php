
<?php

function connectDB($host, $port, $dbname, $user, $password) {

    $connectionString = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";
    /** @var PgSql\Connection|false $db */
    $db = pg_connect($connectionString);
    
    if (!$db) {
        throw new Exception("Error: No se pudo conectar a PostgreSQL. " . pg_last_error());
    }

    return $db;
}

function getCurrentPid($db): int
 {
    try {
        $result = pg_query($db, 'SELECT pg_backend_pid() as pid');
        $row = pg_fetch_assoc($result);
    return $row['pid'];
    } catch (Exception $e) {
        throw new Exception("Error: No se pudo obtener el PID de la conexión. " . pg_last_error().'</br> Message' .$e->getMessage());
    }
}

// Conectarnos a la base de datos
try {
    $db = connectDB('127.0.0.1', '5432', 'taller_bd', 'phpadmin', '123456');
    /** @var int $pid */
    $pid = getCurrentPid($db);
    // La conexión fue exitosa

} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
?>


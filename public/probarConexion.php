
<?php

require_once "../config/dataBase.php";

$consulta = $conexion->query("SHOW TABLES");
$tablas = $consulta->fetchAll(PDO::FETCH_COLUMN);

foreach ($tablas as $tabla) {
    echo $tabla . "<br>";
}

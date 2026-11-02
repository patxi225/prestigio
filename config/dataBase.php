
<?php

$host = "127.0.0.1";
$puerto = "3307";
$basedatos = "PRESTIGIO";
$usuario = "root";
$password = "Prestigio2026!";

try {
    $conexion = new PDO(
        "mysql:host=$host;port=$puerto;dbname=$basedatos;charset=utf8mb4",
        $usuario,
        $password
    );

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

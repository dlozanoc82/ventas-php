<?php

require_once __DIR__ . "/config/conexion.php";

$nombre = "Administrador";
$correo = "admin@ventas.com";
$pass = "ventas123";
$hash = password_hash($pass, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, correo, password)
        VALUES (:nombre, :correo, :password)";

$stmt = $conexion->prepare($sql);

try {
    $stmt->execute([
        ":nombre" => $nombre,
        ":correo" => $correo,
        ":password" => $hash
    ]);
    echo "Usuario Creado";
} catch (PDOException $e) {
    echo "No se pudo crear el usuario";
}

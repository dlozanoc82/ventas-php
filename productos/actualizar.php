<?php

require_once __DIR__ . "/../auth/verificar.php";
require_once "../config/conexion.php";

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$stock = $_POST["stock"];
$categoria_id = $_POST["categoria_id"];

$sql = "UPDATE productos
        SET 
            categoria_id = :categoria_id,
            nombre = :nombre,
            precio = :precio,
            stock = :stock
        WHERE id = :id";

$stmt = $conexion->prepare($sql);

$stmt->execute([
    ":id" => $id,
    ":nombre" => $nombre,
    ":precio" => $precio,
    ":stock" => $stock,
    ":categoria_id" => $categoria_id,
]);

header("Location: listar.php");
exit;

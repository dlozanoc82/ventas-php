<?php
require_once "../config/conexion.php";

$id = $_GET["id"];

$sql = "SELECT * FROM productos WHERE id = :id";

$stmt = $conexion->prepare($sql);

$stmt->execute([
    ":id" => $id
]);

$producto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
    die("Producto no encontrado");
}

$sql = "SELECT * FROM categorias ORDER BY nombre ASC";

$resultado = $conexion->query($sql);

$categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);

require_once "../views/productos/formulario.php";

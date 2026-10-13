<?php

require_once "../config/conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $categoria_id = $_POST["categoria_id"];

    $sql = "INSERT INTO productos
            (nombre, precio, stock, categoria_id)
            VALUES
            (:nombre, :precio, :stock, :categoria_id)";

    $stmt = $conexion->prepare($sql);

    $stmt->execute([
        ":nombre" => $nombre,
        ":precio" => $precio,
        ":stock" => $stock,
        ":categoria_id" => $categoria_id,
    ]);

    header("Location: listar.php");
    exit;
}

$sql = "SELECT * FROM categorias ORDER BY nombre ASC";

$resultado = $conexion->query($sql);

$categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);

$producto = [
    "id" => "",
    "nombre" => "",
    "precio" => "",
    "stock" => "",
    "categoria_id" => "",
];

require_once "../views/productos/formulario.php";

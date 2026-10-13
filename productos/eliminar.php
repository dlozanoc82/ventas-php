<?php

require_once "../config/conexion.php";

$id = $_GET["id"];

$sql = "DELETE FROM productos WHERE id = :id";

$stmt = $conexion->prepare($sql);

$stmt->execute([
    ":id" => $id
]);

header("Location: listar.php");
exit;

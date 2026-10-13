<?php

require_once __DIR__ . "/../auth/verificar.php";
require_once "../config/conexion.php";

$sql = "SELECT  
            productos.id, 
            productos.nombre, 
            productos.precio, 
            productos.stock, 
            categorias.nombre AS categoria 
        FROM productos 
        INNER JOIN categorias 
        ON productos.categoria_id = categorias.id";

$resultado = $conexion->query($sql);

$productos = $resultado->fetchAll(PDO::FETCH_ASSOC);

require_once "../views/productos/lista.php";

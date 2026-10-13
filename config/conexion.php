<?php
$host = "localhost";
$usuario = "root";
$password = "";
$baseDatos = "ventas";

try{
    $conexion = new PDO(
        "mysql:host=$host;dbname=$baseDatos;charset=utf8mb4",
        $usuario,
        $password
    );

    $conexion -> setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

}catch(PDOException $e){
    die("Error de conexion: ". $e->getMessage());
}


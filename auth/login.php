<?php
session_start();

if (isset($_SESSION["usuario_id"])) {
    header("Location: /ventas-php/productos/listar.php");
    exit;
}

require_once __DIR__ . "/../config/conexion.php";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = trim($_POST["correo"] ?? "");
    $clave = $_POST["clave"] ?? "";

    $sql = "SELECT id, nombre, correo, password
            FROM usuarios
            WHERE correo = :correo
            LIMIT 1";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([":correo" => $correo]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($clave, $usuario["password"])) {
        session_regenerate_id(true);
        $_SESSION["usuario_id"] = $usuario["id"];
        $_SESSION["usuario_nombre"] = $usuario["nombre"];
        $_SESSION["usuario_correo"] = $usuario["correo"];
        header("Location: /ventas-php/productos/listar.php");
        exit;
    }
    $error = "Correo o contraseña incorrectos.";
}

require __DIR__ . "/../views/auth/login.php";

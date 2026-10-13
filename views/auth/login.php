<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="/public/css/estilos.css">
</head>

<body>
    <main class="contenedor-login">
        <h1>Sistema de Ventas</h1>
        <h2>Iniciar Sesion</h2>

        <?php if (!empty($error)): ?>
            <p class="mensaje-error" role="alert">
                <?= htmlspecialchars($error) ?>
            </p>
        <?php endif; ?>

        <form action="/ventas-php/auth/login.php" method="POST">
            <label for="correo">Correo</label>
            <input id="correo" type="email" name="correo" required />

            <label for="clave">Contraseña</label>
            <input id="clave" type="password" name="clave" required />

            <button type="submit">Ingresar</button>
        </form>
    </main>
</body>

</html>
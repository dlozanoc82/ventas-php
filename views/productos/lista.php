<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Productos | Sistema de Ventas</title>

    <link rel="stylesheet" href="../public/css/estilos.css">
</head>

<body>

<header class="header">
    <div class="container">
        <h1>Sistema de Ventas</h1>
        <p>Gestión de productos</p>
    </div>
</header>

<main class="container">

    <section class="card">

        <div class="section-header">

            <div>
                <h2>Productos</h2>
                <p class="muted">
                    Administra los productos del sistema.
                </p>
            </div>

            <a
                href="crear.php"
                class="btn btn-primary"
            >
                Nuevo producto
            </a>

        </div>

    </section>

    <section class="card">

        <div class="table-container">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    <?php if (empty($productos)): ?>

                        <tr>
                            <td colspan="6" class="empty">
                                No hay productos registrados.
                            </td>
                        </tr>

                    <?php else: ?>

                        <?php foreach ($productos as $producto): ?>

                            <tr>

                                <td>
                                    <?= $producto["id"] ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($producto["nombre"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($producto["categoria"]) ?>
                                </td>

                                <td>
                                    $<?= number_format($producto["precio"], 0, ',', '.') ?>
                                </td>

                                <td>
                                    <?= $producto["stock"] ?>
                                </td>

                                <td class="actions">

                                    <a
                                        href="editar.php?id=<?= $producto["id"] ?>"
                                        class="btn btn-edit"
                                    >
                                        Editar
                                    </a>

                                    <a
                                        href="eliminar.php?id=<?= $producto["id"] ?>"
                                        class="btn btn-delete"
                                    >
                                        Eliminar
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </section>

</main>

<footer>
    <div class="container">
        Sistema de Ventas — Práctica PHP + MariaDB
    </div>
</footer>

</body>
</html>

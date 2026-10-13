<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= empty($producto["id"]) ? "Nuevo producto" : "Editar producto" ?>
        | Sistema de Ventas
    </title>

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

        <section class="card form-card">

            <h2>
                <?= empty($producto["id"]) ? "Nuevo producto" : "Editar producto" ?>
            </h2>

            <form
                action="<?= empty($producto["id"]) ? "crear.php" : "actualizar.php" ?>"
                method="POST">

                <?php if (!empty($producto["id"])): ?>

                    <input
                        type="hidden"
                        name="id"
                        value="<?= $producto["id"] ?>">

                <?php endif; ?>

                <div class="form-grid">

                    <div class="form-group">

                        <label for="nombre">
                            Nombre del producto
                        </label>

                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="<?= htmlspecialchars($producto["nombre"]) ?>"
                            placeholder="Ej. Teclado mecánico"
                            required>

                    </div>

                    <div class="form-group">

                        <label for="categoria_id">
                            Categoría
                        </label>

                        <select
                            id="categoria_id"
                            name="categoria_id"
                            required>

                            <option value="">
                                Seleccione una categoría
                            </option>

                            <?php foreach ($categorias as $categoria): ?>

                                <option
                                    value="<?= $categoria["id"] ?>"
                                    <?= $categoria["id"] == $producto["categoria_id"] ? "selected" : "" ?>>
                                    <?= htmlspecialchars($categoria["nombre"]) ?>
                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <label for="precio">
                            Precio
                        </label>

                        <input
                            type="number"
                            id="precio"
                            name="precio"
                            value="<?= $producto["precio"] ?>"
                            placeholder="120000"
                            min="0"
                            step="0.01"
                            required>

                    </div>

                    <div class="form-group">

                        <label for="stock">
                            Stock
                        </label>

                        <input
                            type="number"
                            id="stock"
                            name="stock"
                            value="<?= $producto["stock"] ?>"
                            placeholder="10"
                            min="0"
                            required>

                    </div>

                </div>

                <div class="form-actions">

                    <a
                        href="listar.php"
                        class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary">
                        Guardar producto
                    </button>

                </div>

            </form>

        </section>

    </main>

    <footer>
        <div class="container">
            Sistema de Ventas — Práctica PHP + MariaDB
        </div>
    </footer>

</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos - Distribuidora</title>
    <link rel="stylesheet" href="<?= site_url('estilos/lista.css') ?>">
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>Lista de Productos</h1>
            <div class="actions">
                <a href="<?= site_url('/') ?>" class="btn btn-secondary">Inicio</a>
                <a href="<?= site_url('producto/crear') ?>" class="btn">Cargar Productos</a>
            </div>
        </div>

        <?php if (!empty($productos) && is_array($productos)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Descripción</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td><?= esc($producto['nombre'] ?? '') ?></td>
                            <td><?= esc($producto['descripcion'] ?? '-') ?></td>
                            <td><?= esc($producto['stock'] ?? 0) ?></td>
                            <td>$<?= number_format($producto['precio'] ?? 0, 2) ?></td>
                            <td class="action-cell">
                                <a href="<?= site_url('producto/editar/' . $producto['id']) ?>" class="btn-action btn-edit">
                                    Editar
                                </a>
                                <form action="<?= site_url('producto/eliminar/' . $producto['id']) ?>" method="post" onsubmit="return confirm('¿Deseas eliminar este producto?');" style="display: inline;">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn-action btn-delete">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="empty-msg">No hay productos disponibles en la base de datos.</p>
        <?php endif; ?>
    </div>

</body>

</html>
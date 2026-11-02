<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto - Distribuidora</title>
    <link rel="stylesheet" href="http://localhost:8080/estilos/lista.css">
</head>

<body>

    <div class="container">
        <h1>Editar Producto</h1>

        <form action="http://localhost:8080/producto/actualizar/<?= $producto['id'] ?>" method="post" style="margin-top: 20px;">
            <?= csrf_field() ?>

            <div class="form-group" style="margin-bottom: 15px;">
                <label style="font-weight: bold; color: #0d47a1;">Nombre:</label><br>
                <input type="text" name="nombre" value="<?= esc($producto['nombre']) ?>" required style="width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 6px; margin-top: 5px; font-size: 14px;">
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label style="font-weight: bold; color: #0d47a1;">Descripción:</label><br>
                <input type="text" name="descripcion" value="<?= esc($producto['descripcion']) ?>" style="width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 6px; margin-top: 5px; font-size: 14px;">
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label style="font-weight: bold; color: #0d47a1;">Stock:</label><br>
                <input type="number" name="stock" value="<?= esc($producto['stock'] ?? 0) ?>" style="width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 6px; margin-top: 5px; font-size: 14px;">
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="font-weight: bold; color: #0d47a1;">Precio:</label><br>
                <input type="number" step="0.01" name="precio" value="<?= esc($producto['precio']) ?>" required style="width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 6px; margin-top: 5px; font-size: 14px;">
            </div>

            <button type="submit" class="btn" style="border: none; cursor: pointer;">Guardar Cambios</button>
        </form>

        <a href="http://localhost:8080/producto" class="btn btn-secondary" style="margin-top: 15px; display: inline-block;">← Volver al listado</a>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar ProductoS</title>
        <link rel="stylesheet" href="../estilos/crear.css">
</head>
<body>
    <h1>➕ Agregar Producto</h1>

    <form action="<?= base_url('producto/guardar') ?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Descripcion:</label>
        <input type="text" name="descripcion">

        <label>Stock:</label>
        <input type="text" name="stock">

        <label>Precio:</label>
        <input type="float" name="precio">

        <button type="submit">✅ Guardar Producto</button>
    </form>

    <p><a href="<?= base_url('producto') ?>">⬅️ Volver al listado</a></p>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>

    <form method="POST">
        Nombre:<br>
        <input type="text" name="nombre" value="<?= $producto->getNombre() ?>" required><br><br>

        Precio:<br>
        <input type="number" step="1" name="precio" value="<?= $producto->getPrecio() ?>" required><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <br>
    <a href="index.php">Volver</a>
</body>
</html>

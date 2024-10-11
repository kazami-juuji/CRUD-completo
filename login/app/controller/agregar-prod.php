<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('location: ../../login.php');
    }
    require_once '../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificamos que la acción es "registrar"
    if (isset($_POST['action']) && $_POST['action'] === 'registrar') {
        $producto = $_POST['producto'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];

        // Insertar producto en la base de datos
        $sql = "INSERT INTO t_producto (producto, precio, cantidad) VALUES (:producto, :precio, :cantidad)";
        $query = $conexion->prepare($sql);
        $query->bindParam(':producto', $producto);
        $query->bindParam(':precio', $precio);
        $query->bindParam(':cantidad', $cantidad);

        if ($query->execute()) {
            // Si la inserción es exitosa, devolvemos una respuesta JSON
            echo json_encode([1, "Producto registrado exitosamente."]);
        } else {
            // Si hay un error en la inserción
            echo json_encode([0, "Error al registrar el producto."]);
        }
    } else {
        echo json_encode([0, "Acción no válida."]);
    }
    exit(); // Finalizamos el script PHP aquí
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="../../public/css/agregar-prod.css">
</head>

<body>

    <div class="container">
        <h1>Agregar Producto</h1>

        <form id="producto-form">
            <div class="form-group">
                <label for="producto">Producto:</label>
                <input type="text" id="producto" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" id="precio" required>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" required>
            </div>

            <button type="button" onclick="registrar_producto()">Agregar</button> <!-- Llamada a la función JS -->
        </form>

        <a href="/crud/index.php" class="regresar">Regresar al listado</a>
    </div>

    <script src="../../public/js/crud.js"></script> <!-- Asegúrate de que la ruta sea correcta -->
</body>

</html>

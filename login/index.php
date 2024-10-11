<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location: login.php');
}
require_once "./app/config/dependencias.php";
require_once "./app/controller/db.php";

// Consulta a la tabla t_producto
$sql = "SELECT * FROM t_producto";
$query = $conn->prepare($sql);
$query->execute();
$productos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="<?=CSS.'style.css';?>">
</head>
<body>
<div class="row">
    <?php echo 'hola ' . $_SESSION['usuario']['usuario'] ?>
    <a href="./editar-usuario.php">Editar usuario</a>
    <a id="cerrar" type="button">Cerrar sesion</a>
</div>
<h1 style="text-align: center;">Lista de Productos</h1>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo $producto['id_producto']; ?></td>
            <td><?php echo $producto['producto']; ?></td>
            <td><?php echo $producto['precio']; ?></td>
            <td><?php echo $producto['cantidad']; ?></td>
            <td class="actions">
                <a href="./app/controller/editar-prod.php?id=<?php echo $producto['id_producto']; ?>" class="edit">Editar</a>
                <!-- Pasamos el id del producto a la función eliminar_producto() -->
                <a href="#" class="delete" onclick="eliminar_producto(<?php echo $producto['id_producto']; ?>);">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div style="text-align: center; margin-bottom: 20px;">
    <a href="./app/controller/agregar-prod.php" >Agregar Producto</a>
</div>
<script src="./public/js/crud.js"></script>
<script src="./public/js/cerrar-sesion.js"></script>
</body>
</html>

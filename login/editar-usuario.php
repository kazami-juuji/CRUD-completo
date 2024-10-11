<?php
    require_once './app/config/conexion.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion usuario</title>
    <link rel="stylesheet" href="./public/css/cerrar-sesion.css">
</head>
<body>
    <h1>¿Que deseas cambiar?</h1>
    <form id="editar-usuario">
        <br>
            <div>
                <label for="usuario">Nombre de usuario</label>
                <input type="text" id="usuario" name="usuario" value="<?php echo $_SESSION['usuario']['usuario'] ?>" required>
            </div>
            <div>
                <label for="usuario">Contraseña</label>
                <input type="text" id="password" name="password" value="<?php echo $_SESSION['usuario']['password'] ?>" required>
            </div>
            <button id="editar_usuario" type="button">Editar usuario</button>
            <a href="./index.php">Volver al inicio</a>
    </form>
    <script src="./public/js/editar.js"></script>
</body>
</html>
<?php
    session_start();
    require_once '../config/conexion.php';
    $sql = "SELECT * FROM t_usuario WHERE id_usuario = :id";
$query = $conexion->prepare($sql);
$query->bindParam(':id', $id);
$query->execute();
$producto = $query->fetch(PDO::FETCH_ASSOC);

// Procesar la solicitud POST desde fetch


        $sql = "UPDATE t_usuario SET usuario = :usuario, password = :password WHERE id_usuario = :id";
        $query = $conexion->prepare($sql);
        $query->bindParam(':usuario', $_POST['usuario']);
        $query->bindParam(':password', $_POST['password']);
        $query->bindParam(':id', $_SESSION['usuario']['id_usuario']);

        if ($query->execute()) {
            // Respuesta exitosa en formato JSON
            echo json_encode([1, "Cambio Exitoso."]);
        } else {
            // Error al actualizar
            echo json_encode([0, "Error al actualizar los datos del usuario."]);
        }
 
?>

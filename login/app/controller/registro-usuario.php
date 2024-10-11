<?php
require_once "../config/conexion.php";
session_start();

$expresion = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

// if (isset($_SESSION['usuario'])) {
//     header("location: ../../login.php");
// }

if ($_POST) {
    if (isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['password']) && !empty($_POST['password'])) {

        if(is_numeric($_POST['nombre'])) {
            echo json_encode([0,"No puedes agregar numeros en el input nombre"]);
        } else {

            $nombre = $_POST['nombre'];
            $password = $_POST['password'];

            $insercion = $conexion->prepare("INSERT INTO t_usuario (usuario,password) VALUES(:usuario,:password)");
            
            $insercion->bindParam(':usuario',$nombre);
            $insercion->bindParam(':password',$password);

            $insercion->execute();

            if ($insercion) {
                echo json_encode([1,"Usuario registrado correctamente"]);
            } else {
                echo json_encode([0,"Usuario NO registrado"]);
            }
        }
        
    } else {
        echo json_encode([0,"No puedes dejar campos vacios"]);
    }
}



?>
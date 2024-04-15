<?php

include_once("conexion.php");


$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$contrasenia = $_POST['contrasenia'];
#miConsulta para insertar
$sql = "INSERT INTO usuarios (nombre, usuario, contrasenia) VALUES (:nombre, :usuario, :contrasenia)";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
$stmt->bindParam(':usuario',$usuario, PDO::PARAM_STR);
$stmt->bindParam(':contrasenia', $contrasenia, PDO::PARAM_STR);

try {
    $stmt->execute();
    echo "<script>alert ('Usuario agregado exitosamente.')</script>";  
    header('Location: listar_contactos.php');
} catch (PDOException $e) {
    echo "Error al agregar usuario: " . $e->getMessage();
}
<?php
# Conexión a la base de datos utilizando PDO
session_start();
include_once("conexion.php");



if (empty($_SESSION['ID'])) {
    echo "<script>alert('Error: Sesión no iniciada.')</script>";
    die();
}

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$id_usuario= $_SESSION['ID'];

$sql = "INSERT INTO contactosxusuarios (nomContacto, numContacto, correoContacto, ID_usuario) VALUES (:nomContacto, :numContacto, :correoContacto, :ID_usuario)";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':nomContacto', $nombre, PDO::PARAM_STR);
$stmt->bindParam(':numContacto',$telefono, PDO::PARAM_INT);
$stmt->bindParam(':correoContacto', $correo, PDO::PARAM_STR);
$stmt->bindParam(':ID_usuario', $id_usuario, PDO::PARAM_INT);


try {
    $stmt->execute();
    echo "<script>alert ('Contacto agregado exitosamente.')</script>";
    # Redireccionar a la página listar contactos para ver los contactos después de agregarlo
    header('Location: listar_contactos.php');
} catch (PDOException $e) {
    echo "Error al agregar contacto: " . $e->getMessage();
}
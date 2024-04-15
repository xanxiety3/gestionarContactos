<?php
session_start();
include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contacto_id = $_POST['contacto_id'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sql = "UPDATE contactosxusuarios SET nomContacto = :nombre, numContacto = :telefono, correoContacto = :correo WHERE ID = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':id', $contacto_id);
    
    if ($stmt->execute()) {
        echo "Los cambios se guardaron correctamente.";
    } else {
        echo "Ocurrió un error al guardar los cambios.";
    }
} else {
    echo "Acceso no permitido.";
}
?>

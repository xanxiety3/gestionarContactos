<?php
include_once("conexion.php");
session_start();

if (isset($_GET['id'])) {
    $contacto_id = $_GET['id'];

  
    $sql = "delete  FROM contactosxusuarios WHERE ID = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $contacto_id);
    $stmt->execute();
    $contacto = $stmt->fetch(PDO::FETCH_ASSOC);

    
    if ($contacto) {
       echo "No se pudo borrar el contacto";
   

    } else {
        echo "Se eliminó el contacto exitosamente";
        header('Location: listar_contactos.php');
        exit;
    }
} else {
    echo "ID de contacto no proporcionado.";
    exit;
}
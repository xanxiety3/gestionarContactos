<?php
session_start();
include_once("conexion.php");



if (isset($_GET['id'])) {
    $contacto_id = $_GET['id'];
    $id_usuario = $_SESSION['ID'];
  
    $sql = "DELETE  FROM contactosxusuarios WHERE ID = :id AND ID_usuario = :id_usuario";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $contacto_id);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->execute();
    $contacto = $stmt->fetch(PDO::FETCH_ASSOC);

    
    if ($contacto) {
      
       echo "<script>
       alert ('No se pudo borrar el contacto.')
       window.location= 'listar_contactos.php'
       </script>";

    } else {
        echo "<script>
        alert ('Se eliminó el contacto exitosamente.')
        window.location= 'listar_contactos.php'
        </script>";
      
        exit;
    }
} else {
    echo "ID de contacto no proporcionado.";
    exit;
}
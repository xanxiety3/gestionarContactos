<?php
session_start();
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['botonedit']) && $_POST['botonedit'] === 'Guardar Cambios') { 
    $contacto_id = $_POST['contacto_id'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $id_usuario= $_SESSION['ID'];
    

    $sql = "UPDATE contactosxusuarios SET nomContacto = :nombre, numContacto = :telefono, correoContacto = :correo WHERE ID = :id AND ID_usuario = :id_usuario";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':id', $contacto_id);
    $stmt->bindParam(':id_usuario', $id_usuario);
   
    
    if ($stmt->execute()) {
        echo "<script>
        alert ('Los cambios se guardaron correctamente.')
        window.location= 'listar_contactos.php'
        </script>";
    } else {
        echo 
        "<script>
        alert('HUBO UN ERROR AL GUARDAR LOS CAMBIOS');
        window.location='listar_contactos.php'
        </script>";
       
    }
} else {
    echo 
    "<script>
    alert('ACCESO NO PERMITIDO');
    window.location='listar_contactos.php'
    </script>";
   
}
}

?>

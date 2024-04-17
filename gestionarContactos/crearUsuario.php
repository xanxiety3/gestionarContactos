<?php
include_once("conexion.php");

$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$contrasenia = $_POST['contrasenia'];

$sql1= "SELECT * FROM usuarios where usuario= :usuario";
$stmt1= $conexion->prepare($sql1);
$stmt1-> bindParam(':usuario', $usuario);
$stmt1->execute(); 
if ($stmt1-> rowCount() == 0) {
    $sql = "INSERT INTO usuarios (nombre, usuario, contrasenia) VALUES (:nombre, :usuario, :contrasenia)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':usuario',$usuario, PDO::PARAM_STR);
    $stmt->bindParam(':contrasenia', $contrasenia, PDO::PARAM_STR);

try {
    $stmt->execute();
 
    $sql3= "SELECT * FROM usuarios WHERE usuario = :usuario";
    $stmt3 = $conexion->prepare($sql3);
    $stmt3->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt3->execute();
if ($stmt3->rowCount() >0) {
    $row = $stmt3->fetch(PDO::FETCH_ASSOC);
  
    unset($row["contrasenia"]);
    unset($row["usuario"]);
    unset($row["nombre"]);
    session_start();
    $_SESSION['ID']=$row['ID'];

  
    echo "<script>
    alert ('Usuario agregado exitosamente.')
    window.location= 'listar_contactos.php'
    </script>"; 
}else{
    echo "<script>
    alert ('errrooooooor')
    window.location= 'listar_contactos.php'
    </script>"; 
    
} 

} catch (PDOException $e) {
    echo "Error al agregar usuario: " . $e->getMessage();
}
}else{
    echo "<script>
                alert('Ya existe un usuario con esas caracteristicas, Intenta con otro');
                window.location= 'index.php'
    </script>";
 

}

    

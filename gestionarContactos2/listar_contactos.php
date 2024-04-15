<?php
session_start();

# Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['ID'])) {
    // Obtener el ID de usuario de la sesión
    $id_usuario = $_SESSION['ID'];
    #var_dump($id_usuario);
    #die();

    # Conexión a la base de datos utilizando PDO
    include_once("conexion.php");

    # Consultar la lista de contactos del usuario en sesión desde la base de datos
    $sql = "SELECT * FROM contactosxusuarios WHERE ID_usuario = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    $contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA de Contactos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .botones {
            display: flex;
            gap: 5px;
        }
        .botones a {
            padding: 5px 10px;
            background-color: #f882fa;
            color: white;
            border-color: black ;
            border-radius: 3px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
        }
        .botones a:hover {
            background-color: #45a049;
        }
    </style>

</head>
<body>
    <!-- Lista de contactos -->
    <h1>Contactos Registrados</h1>

    <table>
        <tr>
            <th>Nombre</th>
            <th>telefono</th>
            <th>Correo</th>
            <th>Config. Contactos</th>
        </tr>
        <?php
   
         foreach ($contactos as $contacto): 
           
            ?>
        <tr>
            <td><?php echo $contacto['nomContacto'];  ?></td>
            <td><?php echo $contacto['numContacto']; ?></td>
            <td><?php echo $contacto['correoContacto']; ?></td>
       

            <td class="botones">
            <a href="editBusc.php?id=<?php echo $contacto['ID']; ?> ">Editar</a>
            <a href="eliminarContacto.php?id=<?php echo $contacto['ID']; ?>">Borrar</a>
           
        </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br/>
    <a href="agregar_contactos.php">Agregar nuevo contacto</a>  

</body>
</html>

<?php
include_once("conexion.php");
session_start();

if (isset($_GET['id'])) {
    $contacto_id = $_GET['id'];

    $sql = "SELECT * FROM contactosxusuarios WHERE ID = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $contacto_id);
    $stmt->execute();
    $contacto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($contacto) {
        $nombre = $contacto['nomContacto'];
        $telefono = $contacto['numContacto'];
        $correo = $contacto['correoContacto'];
    } else {
      
        echo "El contacto no se encontró.";
        exit;
    }
} else {
    echo "ID de contacto no proporcionado.";

    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Editar Contacto</h1>
    <form method="POST" action="editarContacto.php">
        <input type="hidden" name="contacto_id" value="<?php echo $contacto_id; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>">

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" value="<?php echo $telefono; ?>">

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>">

        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>





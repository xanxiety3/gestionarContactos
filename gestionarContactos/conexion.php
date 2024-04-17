<?php
# Conexión a la base de datos utilizando PDO
$dsn = 'mysql:host=localhost;dbname=contactos';
$usuario = 'root';
$contrasenia = '';

try {
    $conexion = new PDO($dsn, $usuario, $contrasenia);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    die();
}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        h2 {
            color: #555;
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
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 22px); /* Considerando el padding */
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            display: inline-block;
            vertical-align: middle;
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
        .btn-link {
            display: inline-block;
        
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 1px;
            width: calc(100% - 45px); /* Considerando el padding */
            
            padding: 10px;
            margin-bottom: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>BIENVENIDO</h1>
    <h2>REGÍSTRATE</h2>
    <form action="crearUsuario.php" method="POST">
        <input type="text" name="nombre" placeholder="Escribe tu nombre" required><br>
        <input type="text" name="usuario" placeholder="Crea un usuario" required><br>
        <input type="password" name="contrasenia" placeholder="Crea tu contraseña" required><br>
        <input type="submit" value="Registrarse"><br>
        <a href="iniciarSesion.php" class="btn-link">Iniciar Sesión</a>
    </form>
</body>
</html>

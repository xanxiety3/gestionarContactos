
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> BIENVENID@ </h1>
    <h2>INICIA SESION</h2>
    <?php
    if(empty($_SESSION['ID'])){
        echo "";
    }else{
    session_destroy();}
    ?>
        <form method="POST" action="verificarUsuario.php">
            <input type="text" name="usuario" placeholder="Ingrese su usuario" required>
            <br/>
            <input type="password" name="contrasenia" placeholder="Ingrese su contrasenia" required>
            <br/>
            <input type="submit" name ="boton" value="Iniciar sesion"> <br></input> 
            <a  href="index.php?id=<?; ?>">Volver</></a>
</body>
</html>


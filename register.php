<?php
    require 'bbdd.php';

    if(!empty($_POST['nombreusuario']) && !empty($_POST['apellidosusuario']) && !empty($_POST['emailusuario']) && !empty($_POST['claveusuario'])) {
        $nombreusuario=$_POST['nombreusuario'];
        $apellidosusuario=$_POST['apellidosusuario'];
        $emailusuario=$_POST['emailusuario'];
        $claveusuario=password_hash($_POST['claveusuario'], PASSWORD_BCRYPT);
        $insercion="INSERT INTO usuarios (nombre, apellidos, email, clave) VALUES ('$nombreusuario', '$apellidosusuario', '$emailusuario', '$claveusuario')";
        $insertausuario=$conexionbbdd->prepare($insercion);

        header('Location: ./index.php');
    } else {
        header('Location: ./register.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <p>Página de registro</p>
    <form action="register.php" method="POST" id="formularioregistro">
        <input type="text" name="nombreusuario" id="nombreusuario" placeholder="Nombre">
        <input type="text" name="apellidosusuario" id="apellidosusuario" placeholder="Apellidos">
        <input type="email" name="emailusuario" id="emailusuario" placeholder="Email">
        <input type="password" name="claveusuario" id="claveusuario" placeholder="Contraseña">
        <input type="submit" value="Enviar">
        <a href="index.php">
            <input type="button" value="Cancelar">
        </a>
    </form>
</body>
</html>
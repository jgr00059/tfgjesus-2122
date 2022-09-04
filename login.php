<?php
    require 'bbdd.php';

    session_start();

    if(!empty($_POST['emailusuario']) && !empty($_POST['claveusuario'])) {
        $emailsesion=$_POST['emailusuario'];
        $consultausuarios=$conexionbbdd->prepare("SELECT nombre, apellidos, email, clave FROM usuarios WHERE email='$emailsesion'");
        $consultausuarios->execute();
        $consultaresult=$consultausuarios->get_result();
        $resultadousuarios=$consultaresult->fetch_array();

        if(count($resultadousuarios)>0 && password_verify($_POST['claveusuario'], $resultadousuarios['clave'])) {
            $_SESSION['email_usuario']=$resultadousuarios['email'];
            $_SESSION['nombre_usuario']=$resultadousuarios['nombre'];
            header('Location: ./usermain.php');
        } else {
            header('Location: ./login.php');
        }
    } else {
        header('Location: ./login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <form action="login.php" method="POST" id="formulariologin">
        <input type="email" name="emailusuario" id="emailusuario" placeholder="Email">
        <input type="password" name="claveusuario" id="claveusuario" placeholder="Contraseña">
        <input type="submit" value="Enviar">
        <a href="index.php">
            <input type="button" value="Cancelar">
        </a>
    </form>
    <p>Página de login</p>
</body>
</html>
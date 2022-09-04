<?php
    require 'bbdd.php';

    session_start();

    if(!empty($_POST['titulo']) && !empty($_POST['descripcion']) && !empty($_POST['fechainicio']) && !empty($_POST['fechafin'])) {
        $titulo=$_POST['titulo'];
        $descripcion=$_POST['descripcion'];
        $email=$_SESSION['email_usuario'];
        $fechainicio=$_POST['fechainicio'];
        $fechafin=$_POST['fechafin'];
        $insercion="INSERT INTO tareas (titulo, descripcion, email, fechainicio, fechafin) VALUES ('$titulo', '$descripcion', '$email', '$fechainicio', '$fechafin')";
        $insertatarea=$conexionbbdd->prepare($insercion);

        header('Location: ./usermain.php');
    } else {
        header('Location: ./nuevatarea.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <p>Página de nueva tarea</p>

    <form action="nuevatarea.php" method="POST" id="formularionuevatarea">
        <input type="text" name="titulo" id="titulo" placeholder="Titulo">
        <input type="text" name="descripcion" id="descripion" placeholder="descripcion">
        <input type="datetime-local" name="fechainicio" id="fechainicio" placeholder="Fecha de inicio">
        <input type="datetime-local" name="fechafin" id="fechafin" placeholder="Fecha de fin">
        <input type="submit" value="Enviar">
        <a href="usermain.php">
            <input type="button" value="Cancelar">
        </a>
    </form>
</body>
</html>
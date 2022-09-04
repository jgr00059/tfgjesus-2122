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

        if($insertatarea->execute()) {
            header('Location: ./usermain.php');
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1>Nueva tarea</h1>

    <form action="nuevatarea.php" method="POST" id="formularionuevatarea">
        <input type="text" name="titulo" id="titulo" placeholder="Titulo">
        <input type="text" name="descripcion" id="descripion" placeholder="Descripcion">
        <input type="datetime-local" name="fechainicio" id="fechainicio" placeholder="Fecha de inicio">
        <input type="datetime-local" name="fechafin" id="fechafin" placeholder="Fecha de fin">
        <input type="submit" value="Enviar">
        <a href="usermain.php">
            <input type="button" value="Cancelar">
        </a>
    </form>
</body>
</html>
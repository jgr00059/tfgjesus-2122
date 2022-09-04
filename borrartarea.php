<?php
    require 'bbdd.php';
    $id=$_GET['id'];

    $borrartarea=$conexionbbdd->prepare("DELETE FROM tareas WHERE idtarea='$id'");
    $borrartarea->execute();
    header('Location: ./usermain.php');
?>
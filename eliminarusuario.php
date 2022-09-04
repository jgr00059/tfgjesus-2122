<?php
    require 'bbdd.php';
    $id=$_GET['id'];

    $eliminarusuario=$conexionbbdd->prepare("DELETE FROM usuarios WHERE email='$id'");
    $eliminarusuario->execute();

    $eliminartareas=$conexionbbdd->prepare("DELETE FROM tareas WHERE email='$id'");
    $eliminartareas->execute();
    header('Location: ./index.php');
?>
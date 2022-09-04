<?php
    require "bbdd.php";

    $pruebainsercionusuario="INSERT INTO usuarios (nombre, apellidos, email, clave) VALUES ('Jesús', 'García', 'pruebakMLs045fjTc5gRr@gmail.com', '1234')";
    $pruebainserta=$conexionbbdd->prepare($pruebainsercionusuario);

    if($pruebainserta->execute()) {
        $pruebaconsultausuario=$conexionbbdd->prepare("SELECT * FROM usuarios WHERE email='pruebakMLs045fjTc5gRr@gmail.com'");
        $pruebaconsultausuario->execute();
        $pruebaresult=$pruebaconsultausuario->get_result();
        $pruebausuario=$pruebaresult->fetch_array();

        if(count($pruebausuario)>0) {
            $borrarprueba=$conexionbbdd->prepare("DELETE FROM usuarios WHERE email='pruebakMLs045fjTc5gRr@gmail.com'");
            $borrarprueba->execute();
            die(0);
        } else {
            die(-1);
        }
    } else {
        die(-1);
    }
?>
<?php
    $servidor='db4free.net';
    $usuariobbdd='jgr00059';
    $clavebbdd='tfgjesus2122';
    $nombrebbdd='aplicaciontareas';

    $conexionbbdd=mysqli_connect($servidor, $usuariobbdd, $clavebbdd, $nombrebbdd);
    if(!$conexionbbdd) {
        die("Conexión fallida: ".mysqli_connect_error());
    }
?>
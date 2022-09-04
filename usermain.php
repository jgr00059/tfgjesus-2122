<?php
    require 'bbdd.php';

    session_start();
    $id=$_SESSION['email_usuario'];
    $nombre=$_SESSION['nombre_usuario'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Página personal del usuario <?php echo $nombre ?></h1>
    <a href="nuevatarea.php">
        <input type="button" value="Nueva tarea">
    </a>
    <a href="logout.php">
        <input type="button" value="Cerrar sesion">
    </a>
    <a href="eliminarusuario.php?id=<?php echo $id;?>">
        <input type="button" value="Eliminar usuario">
    </a>
    <table>
        <tr>
            <td><b>TITULO</b></td>
            <td><b>DESCRIPCION</b></td>
            <td><b>FECHA DE INICIO</b></td>
            <td><b>FECHA DE FIN</b></td>
        </tr>
        <?php
            $consultatareas=$conexionbbdd->prepare("SELECT * FROM tareas ORDER BY fechainicio");
            $consultatareas->execute();
            $consultaresult=$consultatareas->get_result();

            while($resultadotarea=$consultaresult->fetch_array()) {
                if($resultadotarea['email']==$id) {
        ?>
                    <tr>
                        <td><a href="tarea.php?id=<?php echo $resultadotarea['idtarea'];?>"><?php echo $resultadotarea['titulo'] ?></a></td>
                        <td><?php echo $resultadotarea['descripcion'] ?></td>
                        <td><?php echo $resultadotarea['fechainicio'] ?></td>
                        <td><?php echo $resultadotarea['fechafin'] ?></td>
                    </tr>
        <?php
                } 
            }
        ?>
        
    </table>
</body>
</html>
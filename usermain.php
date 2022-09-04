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
</head>
<body>
    <p>Página personal del usuario <?php echo $nombre ?></p>
    <a href="nuevatarea.php">
        <input type="button" value="Nueva tarea">
    </a>
    <a href="logout.php">
        <input type="button" value="Cerrar sesion">
    </a>
    <table>
        <tr>
            <td>Titulo</td>
            <td>Descripcion</td>
            <td>Fecha de inicio</td>
            <td>Fecha de fin</td>
        </tr>
        <?php
            $consultatareas=$conexionbbdd->prepare("SELECT * FROM tareas ORDER BY fechainicio");
            $consultatareas->execute();
            $consultaresult=$consultatareas->get_result();

            while($resultadotarea=$consultaresult->fetch_array()) {
                if($resultadotarea['email']==$id) {
        ?>
                    <tr>
                        <td><?php echo $resultadotarea['titulo'] ?></td>
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
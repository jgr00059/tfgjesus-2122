<?php
    require 'bbdd.php';

    $id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Información de tarea</h1>
    <?php
        $consultatarea=$conexionbbdd->prepare("SELECT * FROM tareas WHERE idtarea='$id'");
        $consultatarea->execute();
        $consultaresult=$consultatarea->get_result();
        $resultadotarea=$consultaresult->fetch_array();
    ?>
    <dl>
        <dt><b>Titulo</b></dt>
        <dd><?php echo $resultadotarea['titulo'] ?></dd>
        <dt><b>Descripcion</b></dt>
        <dd><?php echo $resultadotarea['descripcion'] ?></dd>
        <dt><b>Fecha de inicio</b></dt>
        <dd><?php echo $resultadotarea['fechainicio'] ?></dd>
        <dt><b>Fecha de fin</b></dt>
        <dd><?php echo $resultadotarea['fechafin'] ?></dd>
    </dl>
    <dd>
    <a href="borrartarea.php?id=<?php echo $resultadotarea['idtarea'];?>">
        <input type="button" value="Eliminar">
    </a>
    <a href="usermain.php">
        <input type="button" value="Volver">
    </a>
    </dd>

</body>
</html>
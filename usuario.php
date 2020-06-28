<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
}
include_once('archivosphp/bd.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $_SESSION['id'];
    $bd = new BaseDatos();
    $resultado = $bd->verificarId($_GET['id']);
if ($resultado==null) {
header("location:error.php");
}else{    
    $datos = $resultado;
    var_dump( $resultado);
    echo $_SESSION["id"];
}
    ?>
    <a href="archivosphp/cerrar.php">Cerrar sesión</a>
</body>
</html>
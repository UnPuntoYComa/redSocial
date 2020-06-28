<?php
include_once('bd.php');
 $email= $_POST['email'];
 $contraseña= $_POST['contraseña'];
 $bd = new BaseDatos;
 $resultado = $bd->verificar($email,$contraseña);
if ($resultado==null) {
header("location:../index.php");
}else{
    session_start();    
    $datos = $resultado;
    var_dump( $resultado);
    $_SESSION["id"]=$datos["id"];
    echo $_SESSION["id"];
    header("location:../usuario.php?id=".$datos["id"]);    
}

?>
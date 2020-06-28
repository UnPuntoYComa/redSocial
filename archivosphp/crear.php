<?php
include_once('bd.php');

$id = $_GET["id"];
$correo = $_GET["correo"];
$nombre = $_GET["nombre"];
$contraseña = $_GET["contraseña"];
$nacimiento = $_GET["nacimiento"];
$datos = "'$id','$correo','$nombre','$contraseña','$nacimiento'";
var_dump($_GET);
echo $datos;
$bd = new BaseDatos();
if($bd->insertar('usuarios',$datos)){
    session_start();
    $_SESSION['id']=$id;
    header('Location:../usuario.php?id='.$id);
}else{
    header('Location:../error.php');
}

?>
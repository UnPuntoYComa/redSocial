<?php
class BaseDatos{    
    private $host   ="localhost";
    private $usuario="root";
    private $clave  ="";
    private $db     ="test";
    public $conexion;
    public function __construct(){
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave,$this->db) or die(mysql_error());
        $this->conexion->set_charset("utf8");
    }
    public function insertar($tabla, $datos){
        $resultado =    $this->conexion->query("INSERT INTO $tabla VALUES ($datos)") /*or die($this->conexion->error)*/;
        if($resultado)
            return true;
        return false;
    }
    public function verificar ($email, $contraseña){
        $sql = "SELECT * FROM usuarios WHERE email = '$email' && contrasena = '$contraseña'";
        $resultado = $this->conexion->query($sql);
         $datos =$resultado->fetch_assoc();
         return $datos;
    }
    public function verificarId ($id){
        $sql = "SELECT * FROM usuarios WHERE id = '$id'";
        $resultado = $this->conexion->query($sql);
         $datos =$resultado->fetch_assoc();
         return $datos;
    }
} 
?>
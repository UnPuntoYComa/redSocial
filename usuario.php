<?php
include_once('archivosphp/bd.php');
session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
}
if(!isset($_GET['id'])){
    echo "tu perfil";
    $bd = new BaseDatos();
    $resultado = $bd->verificarId($_SESSION['id']);
if ($resultado==null) {
header("location:error.php");
}else{    
   global $datos ;
   $datos= $resultado;
}    
}else{
    $bd = new BaseDatos();
    $resultado = $bd->verificarId($_GET['id']);
if ($resultado==null) {
header("location:error.php");
}else{    
   global $datos ;
   $datos= $resultado;
}
       if($_GET["id"]==$_SESSION["id"]){
           echo "tu perfil";
       }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <ul>
        <li>nombre: <?php echo $resultado['nombre']; ?></li>
        <li>email registrado: <?php echo $datos["email"]; ?></li>
        <li>su id: <?php echo $datos["id"]; ?></li>
        <li>Nacimiento:<?php echo $datos["fechanac"]; ?></li>
        </ul>
    </div>
    <a href="archivosphp/cerrar.php">Cerrar sesión</a>
    <div class="conectados">
    </div>
    <script>
    let sesion = '<?php echo $_SESSION["id"]?>';
    var conn = new WebSocket('ws://localhost:8080?'+sesion);
    conn.onopen = function(e) {
    console.log("Connection established!");
    };

    conn.onmessage = function(e) {
        let objeto = JSON.parse(e.data);
        if(objeto.command=="agregar"){
            var newBoton = document.createElement("button"); 
            // newBoton.value= objeto.data;
        var newContent = document.createTextNode(objeto.data); 
        newBoton.appendChild(newContent); //añade texto al div creado. 
        // añade el elemento creado y su contenido al DOM 
        var currentDiv = document.getElementById("conectados"); 
        document.body.insertBefore(newBoton, currentDiv); 
        }else if(objeto.command=="actualizar"){
            console.log(e.data);
            var newBoton = document.createElement("button"); 
            // newBoton.value= objeto.data;
        var newContent = document.createTextNode(objeto.data); 
        newBoton.appendChild(newContent); //añade texto al div creado. 
        // añade el elemento creado y su contenido al DOM 
        var currentDiv = document.getElementById("conectados"); 
        document.body.insertBefore(newBoton, currentDiv); 
        }
        console.log(JSON.parse(e.data));
    };
    </script>
</body>
</html>
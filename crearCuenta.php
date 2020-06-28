<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="conteiner" style="margin:0 auto;width: 1200px">
        <div class="row">
            <div class="col-xs-12 center-block">
               <form action="archivosphp/crear.php" onsubmit="envio(this);" METHOD="GET">
                    <div class="formulario"><label for="id">Identificación</label><input required type="text" name="id" id="id"></div>
                    <div class="formulario"><label for="correo"></label>Correo Electronico<input required type="email" name="correo" id="correo"></div>
                    <div class="formulario"><label for="nombre">Nombre</label><input required type="text" name="nombre" id="nombre"></div>
                    <div class="formulario"><label for="contraseña">Contraseña</label><input required type="text" name="contraseña" id="contraseña"></div>
                    <div class="formulario"><label for="nacimiento"></label><input required type="date" name="nacimiento" id="nacimiento"></div>
                    <div class="formulatio"><label for="envio"></label><input required type="submit" value="crear perfil"></div>
                </form>
            </div>
    </div>
    <script>
        function envio(e){
           //event.preventDefault();
           e.nacimiento
           console.log(e.nacimiento.value);
        }
        document.getElementById("id").addEventListener("chage",function(){

        });
    </script>
</body>
</html>
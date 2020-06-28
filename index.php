<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
    <div class="logo">
        <div class="nombreRed">
            <span>red social</span>
        </div>
    </div>
    <div class="formulario">
        <div class="contenido">
            <form action="archivosphp/verificarCuenta.php" method="POST">
                <div class="email for">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="email" autocomplete="off">
                </div>
                <div class="contra for">
                    <label for="password">contraseña</label>
                    <input type="password" id="password" name="contraseña" placeholder="contraseña">
                </div>
                <div class="envio for">
                    <span><a href="crearCuenta.php">Crear una cueta</a></span>
                    <input type="submit" value="enviar">
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>

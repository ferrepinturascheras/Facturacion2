<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="formulario">
            <h2 class="titulo">REGISTRAR</h2>
            <?php
            include("modelo/conexion.php");
            include("controlador/contregistro.php");
            ?>
            <div class="padre">
                <div class="ID">
                    <label for="">CC</label>
                    <input type="text" name="ID">
                </div>
                <div class="nombre">
                    <label for="">Nombres</label>
                    <input type="text" name="nombre">
                </div>
                <div class="email">
                    <label for="">Correo</label>
                    <input type="email" name="email">
                <div class="contraseña">
                    <label for="">Contraseña</label>
                    <input type="password" name="contraseña">
                </div>
                <div class="cuenta">
                    <input class="boton" type="submit" value="Registrar" name="registro">
                    <a href="login.php">salir</a>       
                </div>
            </div>
        </form>
    </div>
</body>
</html>
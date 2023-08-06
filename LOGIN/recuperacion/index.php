<!-- Archivo: index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Restablecer contraseña</title>
</head>
<body>
    <h2>Restablecer contraseña</h2>
    <form action="reset_password.php" method="post">
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="submit" value="Enviar enlace de recuperación">
    </form>
</body>
</html>

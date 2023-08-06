<?php
// Archivo: reset_password_confirm.php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["token"])) {
    $token = $_GET["token"];

    // Verificar si el token existe y no ha expirado
    $current_datetime = date('Y-m-d H:i:s');
    $sql = "SELECT user_id FROM password_reset WHERE token = '$token' AND expiration >= '$current_datetime'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Token válido, mostrar formulario para cambiar la contraseña
        $user_id = $result->fetch_assoc()["user_id"];
        echo "
        <form action='update_password.php' method='post'>
            <input type='hidden' name='user_id' value='$user_id'>
            <input type='password' name='new_password' placeholder='Nueva contraseña' required>
            <input type='password' name='confirm_password' placeholder='Confirmar contraseña' required>
            <input type='submit' value='Cambiar contraseña'>
        </form>
        ";
    } else {
        echo "El enlace de recuperación es inválido o ha expirado.";
    }
}
$conn->close();
?>

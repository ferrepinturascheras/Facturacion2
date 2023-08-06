<?php
// Archivo: update_password.php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    if ($new_password === $confirm_password) {
        // Actualizar la contraseña en la base de datos
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET password = '$hashed_password' WHERE id = $user_id";

        if ($conn->query($sql) === TRUE) {
            echo "Contraseña actualizada correctamente.";
        } else {
            echo "Error al actualizar la contraseña: " . $conn->error;
        }
    } else {
        echo "Las contraseñas no coinciden.";
    }
}
$conn->close();
?>

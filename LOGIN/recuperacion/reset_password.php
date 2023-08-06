<?php
// Archivo: reset_password.php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Verificar si el correo electrónico está registrado en la base de datos
    $sql = "SELECT id FROM usuarios WHERE Email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Generar un token único para el enlace de recuperación
        $token = md5(uniqid());

        // Establecer el tiempo de expiración del token (1 hora en este ejemplo)
        $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Insertar el token en la tabla de recuperación de contraseña
        $user_id = $result->fetch_assoc()["id"];
        $sql = "INSERT INTO password_reset (user_id, token, expiration) VALUES ($user_id, '$token', '$expiration')";
        if ($conn->query($sql) === TRUE) {
            // Enviar el correo electrónico con el enlace de recuperación
            $recovery_link = "http://localhost/cheras/LOGIN/recuperacion/reset_password.php/reset_password_confirm.php?token=$token";
            try {
                $mail->addAddress($email);
                $mail->Subject = 'Recuperación de contraseña';
                $mail->Body = "Para restablecer tu contraseña, haz clic en el siguiente enlace: $recovery_link";
                $mail->send();
                echo "Se ha enviado un enlace de recuperación a tu correo electrónico.";
            } catch (Exception $e) {
                echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
            }
        } else {
            echo "Error al generar el enlace de recuperación: " . $conn->error;
        }
    } else {
        echo "El correo electrónico no está registrado en nuestro sistema.";
    }
}
$conn->close();
?>

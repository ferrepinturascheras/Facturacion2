<?php
// Archivo: config.php

// Configuración de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cheras";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Configuración de PHPMailer
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  // Por ejemplo, 'smtp.gmail.com' para Gmail
$mail->SMTPAuth = true;
$mail->Username = 'ferrepin190@gmail.com';  // Tu dirección de correo electrónico
$mail->Password = 'ferrepin873';  // Tu contraseña de correo electrónico
$mail->SMTPSecure = 'TLS';  // TLS o SSL, dependiendo de la configuración del servidor
$mail->Port = 587;  // Puerto SMTP, por ejemplo, 587 para TLS de Gmail

$mail->setFrom('ferrepin190@gmail.com', 'Ferrepinturas Cheras');
$mail->CharSet = 'UTF-8';

$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Habilita el modo de depuración detallado
$mail->Debugoutput = 'html'; // Formato de salida

?>


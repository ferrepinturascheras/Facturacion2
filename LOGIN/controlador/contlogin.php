<?php
session_start();
if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
        $usuario=$_POST["usuario"];
        $password=$_POST["password"];
        $sql=$conexion->query(" SELECT * FROM usuarios WHERE nombre='$usuario' and contraseña='$password'");
        if ($datos=$sql->fetch_object()) {
            $_SESSION["ID"]=$datos->ID;
            $_SESSION["nombre"]=$datos->Nombre;
            $_SESSION["email"]=$datos->Email;
            header("location: inicio.php");
        } else {
            echo "<div class='alert alert-danger'>Acceso denegado</div>";
        }
    } else {
        echo "Campos vacios";
    }
    
}

?>
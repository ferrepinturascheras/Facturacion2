<?php
if (!empty($_POST["registro"])) {
    if (empty($_POST["nombre"]) or empty($_POST["email"]) or empty($_POST["ID"]) or empty($_POST["contraseña"])) {
        echo '<div class="alerta">Uno de los campos esta vacio</div>';
    } else{
        $ID=$_POST["ID"];
        $nombre=$_POST["nombre"];
        $email=$_POST["email"];
        $contraseña=$_POST["contraseña"];

        $sql=$conexion->query("INSERT INTO usuarios(ID, nombre, email, contraseña)values('$ID', '$nombre', '$email', '$contraseña')");
        
    }
}
?>
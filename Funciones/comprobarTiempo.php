<?php
$limite = 10*60;// 10 min
$duracion = time() - $_SESSION['Duracion'];
// Si supera el límite de tiempo se cierra la sesión
if($duracion > $limite){
    require 'expulsar.php';
}else{
    // Actualizamos la duración de la sesión actual
    $_SESSION["Duracion"] = time();
}
?>
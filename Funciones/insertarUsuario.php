<?php
require_once '../conexion.php';

if(require 'usuarioExiste.php'){
    $usuario = $_POST["Usuario"];
    $pass = $_POST["Pass"];
    $nombre = $_POST["Nombre"];
    $fechanac = $_POST["FechaNac"];
    if(strlen($usuario) < 10){
     echo "Validacion";   
    }

 $sql = "INSERT INTO usuarios VALUES ('".$_POST["Usuario"] ."', '". $_POST["Pass"]."', '". 
        $_POST["Nombre"]. "', '". $_POST["Sexo"] ."' , '". date('Y-m-d', strtotime($_POST["FechaNac"])) ."')";

 if ($_SESSION["con"]->query($sql)===TRUE) {
     echo '<p class="success">Te has registrado correctamente</p>';
 } else {
     echo '<p class="error">Todo lo que podia salir mal lo ha hecho, inutil.</p>';
 }
 header("location: ../login.php");
}else{
    echo"Creado antes";
}

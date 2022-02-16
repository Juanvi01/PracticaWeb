<?php
require_once '../conexion.php';

function formatear($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(require 'usuarioExiste.php'){
    $errorNombre = $errorUsuario = $errorPass = $errorFecha = "";
    $error = false;
    $usuario = $pass = $nombre = $fechanac = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Nombre
        if (empty($_POST["Nombre"])) { // Si esta vacío salta error
            $errorNombre = "Escribe un nombre.";
            $error = true;
        } 
        else 
        {
            $nombre = formatear($_POST["Nombre"]);
            // Revisa la integridad del texto
            // Solo letras
            if(!preg_match("/[A-Za-záéíóúüñÁÉÍÓÚÜÑ ]{10}/", $nombre)){
                $errorNombre = "El nombre no es correcto.";
                $error=true;
            }
        }
        // Usuario
        if (empty($_POST["Usuario"])) { // Si esta vacío salta error
            $errorUsuario = "Escribe un usuario.";
            $error = true;
        }
        else
        {
            $usuario = formatear($_POST["Usuario"]);
            // Revisa la integridad del texto
            // Empieza por una letra y el resto son letras o numeros
            if(!preg_match("/[A-Za-z][A-Za-z0-9]{8}/", $usuario)){
                $errorUsuario = "El nombre de usuario no es correcto.";
                $error = true;
            }
        }
        // Contraseña
        if (empty($_POST["Pass"])) { // Si esta vacío salta error
            $errorPass = "Escribe una contraseña valida.";
            $error = true;
        }
        else
        {
            $pass = formatear($_POST["Pass"]);
            // Revisa la integridad del texto
            // mínimo 8 caracteres alfanuméricos/especiales. Al menos una letra mayúscula y un número.
            if(!preg_match("/[A-a-z][0-9]{8.}/", $pass)){
                $errorUsuario = "El nombre de usuario no es correcto.";
                $error = true;
            }
        }
        // Fecha de nacimiento
        if(empty($_POST["FechaNac"])) { // Si esta vacío salta error
            $errorFecha = "Selecciona una fecha.";
            $error = true;
        }
        else
        {
            $fecha_actual = strtotime(date("Y-m-d"));
            $fecha_entrada = strtotime($_POST["FechaNac"] . "+ 16 year");
            if ($fecha_actual < $fecha_entrada) {
                $errorFecha = "Debes tener al menos 16 años para registrarte.";
                $error = true;
            }
        }
        
    }
    
    if(!$error){
        $sql = "INSERT INTO usuarios VALUES ('".$usuario ."', '". $pass ."', '". 
                $nombre. "', '". $_POST["Sexo"] ."' , '". date('Y-m-d', strtotime($_POST["FechaNac"])) ."')";
        if ($_SESSION["con"]->query($sql)===TRUE) {
            echo '<p class="success">Te has registrado correctamente</p>';
        } else {
            echo '<p class="error">Todo lo que podia salir mal lo ha hecho, inutil.</p>';
        }
        header("location: ../login.php");
    }else{
        echo '<p class="error">No se te ha registrado.</p>';
        echo $errorNombre;
        echo $errorPass;
        echo $errorUsuario;
        echo $errorFecha;
        header("location: ../registro.php");
    }
}else{
    echo"Creado antes";
}
?>
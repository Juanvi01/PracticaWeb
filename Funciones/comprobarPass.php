<?php
require_once 'conexion.php';

$usu = $pass = "";
$errorPass = $errorNoUsu = $errorIntentos = "";
//$intentos = $_COOKIE["Intentos"];
//if($intentos > 0){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usu = $_POST["Usuario"];
        $sql = "SELECT * from usuarios where usuario = '" . $usu . "'";
        if (strlen($usu) > 0) {
            $result = $_SESSION["con"]->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $pass = $_POST["Pass"];
                    if ($row["Pass"] == $pass) {
                        // Iniciamos la sesión
                        $_SESSION['Usuario'] = $usu;
                        $_SESSION['Pass'] = $row["Pass"];
                        $_SESSION['Nombre'] = $row["Nombre"];
                        $_SESSION['FechaNac'] = $row["FechaNac"];
                        $_SESSION['Sexo'] = $row["Sexo"];
                        $_SESSION['Avatar'] = $row["Avatar"];
                        $_SESSION['Suscripcion'] = $row["Suscripcion"];

                        header("location: inicio.php");
                    } else {
                        $errorPass = "Contraseña Invalida";
                        //setcookie("Intentos", $intentos-1, time() + 10, "/");// 5 min
                    }
                }
            } else {
                $errorNoUsu = "Usuario no encontrado";
                //setcookie("Intentos", $intentos-1, time() + 10, "/");// 5 min
            }
        }
        //echo $_COOKIE["Intentos"];
    }
/*}else{
    $errorIntentos = "Has superado el límite de intentos, vuelve a intentarlo en 5 min.";
}*/
?>
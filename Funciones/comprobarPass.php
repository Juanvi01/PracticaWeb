<?php
require_once 'conexion.php';

$usu = $pass = "";
$errorPass = $errorNoUsu = $errorIntentos = "";
$intentos = 2;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6Ld3aIseAAAAALYgV0GW8nQzUsKfWdwSldyim2Tt';
    $recaptcha_response = $_POST['recaptcha_response'];
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
    if ($recaptcha->score >= 0.7) {
        if (isset($_COOKIE["intentos"])) {
            $intentos = $_COOKIE["intentos"];
        }
        if ($intentos > 0) {
            $usu = $_POST["Usuario"];
            $sql = "SELECT * from usuarios where usuario = '" . $usu . "'";
            if (strlen($usu) > 0) {
                $result = $_SESSION["con"]->query($sql);
                if ($result->num_rows > 0) {
                    if ($row = $result->fetch_assoc()) {
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

                            // Hacemos una select para ver la última pag a la que fue el usuario
                            $sql = "SELECT IdPagina from visita where IdUsuario = '" . $usu . "'";
                            $result = $_SESSION["con"]->query($sql);
                            if ($result->num_rows > 0) {
                                if ($row = $result->fetch_assoc()) {
                                    header("location: " . $row['IdPagina']);
                                }
                            } else {
                                header("location: inicio.php");
                            }
                        } else {
                            $errorPass = "Contraseña Invalida";
                            setcookie("intentos", $intentos - 1, time() + 20, "/"); // 5 min
                        }
                    }
                } else {
                    $errorNoUsu = "Usuario no encontrado";
                    setcookie("intentos", $intentos - 1, time() + 20, "/"); // 5 min
                }
            } else {
                $errorNoUsu = "Pon uno";
            }
        } else {
            $errorIntentos = "Has superado el límite de intentos, vuelve a intentarlo en 5 min.";
        }
    }
}

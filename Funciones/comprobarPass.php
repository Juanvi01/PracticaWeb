<?php
require_once '../conexion.php';

$usu = $_POST["Usuario"];
$sql = "SELECT Pass from usuarios where usuario = '". $usu ."'";   
$result = $_SESSION["con"]->query($sql);

if ($result->num_rows > 0) {
    echo"Resultado";
    while($row = $result->fetch_assoc()) {
        $pass = $_POST["Pass"];
        if($row["Pass"]==$pass){
            // Iniciamos la sesión
            $_SESSION['Usuario'] = $usu;

            header("location: ../inicio.php");
        }else{
            header("location: ../login.php");
        }
    }
}else{
    header("location: ../login.php");
}
?>
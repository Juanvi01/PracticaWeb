<?php

require_once '../conexion.php';

// Hay que pasar el usuario por POST o GET
$usu = $_POST["Usuario"];
$sql = "SELECT * from usuarios where usuario = '". $usu ."'";
$result = $_SESSION["con"]->query($sql);

if (!($result->num_rows == 0)) {
	return false;
}else{
	return true;
}

?>
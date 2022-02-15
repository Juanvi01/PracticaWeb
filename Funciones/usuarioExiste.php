<?php

require '../conexion.php';

// Hay que pasar el usuario por POST o GET
$usu = $_POST["Usuario"];
$sql = "SELECT * from usuarios where usuario = '". $usu ."'";
$result = $con->query($sql);

if (!($result->num_rows == 0)) {
	return false;
}else{
	return true;
}

?>
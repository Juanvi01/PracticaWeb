<?php
require_once 'Funciones/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Login</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="css/foundation.min.css">
	<link rel="stylesheet" href="css/foundation.css">
	<link href="css/app.css" rel="stylesheet" type="text/css">
	<link href="css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	require 'menu.html';
	?>
	<div>
		<form method="post" action="Funciones/comprobarPass.php">
			<label for="Usuario">Nombre de usuario:</label>
			<input type="text" id="Usuario" name="Usuario"><br><br>
			<label for="Pass">Contraseña:</label>
			<input type="text" id="Pass" name="Pass"><br><br>
			<input class="button" type="submit" value="Iniciar sesión"></input>
		</form>
	</div>
	<?php
	// Usuario por defecto
	$usuario = $pass = "a";
	$_SESSION["con"];
	//mysqli_close($conn);
	// Quita los espacios, barras y caracteres especiales para que no pongan una URL
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_POST["Usuario"])) {
			test_input($_POST["Usuario"]);
		}
		if (!empty($_POST["Pass"])) {
			test_input($_POST["Pass"]);
		}
	}
	?>

	<script src="js/vendor/jquery-2.1.4.min.js"></script>
	<script src="js/vendor/foundation.js"> </script>
	<script>
		$(document).foundation();
	</script>
</body>

</html>
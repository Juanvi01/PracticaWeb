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
  if (!isset($_SESSION['Usuario'])) {
    require 'menu.html';
  }else{
    require 'menu.php';
  }
	require 'Funciones/comprobarPass.php';
	?>

	<div class="row medium-6 large-5 columns" id="top">
		<div class="blog-post">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<label style="color: white;"for="Usuario">Nombre de usuario:
					<input type="text" id="Usuario" name="Usuario" value="<?php echo $usu ?>">
					<span class="error"><?php echo $errorNoUsu ?></span>
				</label>
				<label style="margin-top: 5rem; color: white;" for="Pass">Contraseña:
					<input type="password" id="Pass" name="Pass">
					<span class="error"><?php echo $errorPass ?></span>
				</label>
				<label><a style="color: white; text-decoration:underline;" href="registro.php">¿Aún no tienes una cuenta?</a></label>
				<input style="display: block; margin: auto; margin-top:5rem;" class="button large" type="submit" value="Iniciar sesión"></input>
			</form>
		</div>
	</div>
	<?php


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
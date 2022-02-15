<?php
require_once 'Funciones/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

</html>

<head>
	<title>Entrada</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="css/foundation.min.css">
	<link rel="stylesheet" href="css/foundation.css">
	<link href="css/app.css" rel="stylesheet" type="text/css">
	<link href="css/index.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	require 'menu.html';
	?>

	<!--Botones de Login y Registro-->
	<div class="work-feature-block row">
		<div class="row column text-center">
			<div><a href="login.php" class="button large">Login</a></div>
			<div><a href="registro.php" class="button large">Registro</a></div>
		</div>
	</div>


	<script src="js/vendor/jquery-2.1.4.min.js">
		</script>
		<script src="js/vendor/foundation.js"></script>
		<script>
			$(document).foundation();
		</script>
</body>

</html>

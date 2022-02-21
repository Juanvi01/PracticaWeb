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
  if (!isset($_SESSION['Usuario'])) {
    require 'menu.html';
  }else{
    require 'menu.php';
	require 'Funciones/comprobarTiempo.php';
  }
	?>

	<div class="work-feature-block row" id="centrar">
		<div class="row column text-center" >
			<h1 >Bienvenido a Diabetes Software SL</h1>
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
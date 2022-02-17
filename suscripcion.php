<?php
require_once 'Funciones/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Suscripcion</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="css/foundation.min.css">
	<link rel="stylesheet" href="css/foundation.css">
	<link href="css/app.css" rel="stylesheet" type="text/css">
	<link href="css/suscripcion.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	

	// Si no está iniciada la sesión, se redirige
	if (!$_SESSION['Iniciada']) {
		require 'menu.html';
		header("location: index.php");
	}else{
		require 'menu.php';
	}
	?>

	<div class="colunm row">
		<h1>Suscripciones</h1>
		<ul class="tabs" data-tabs id="suscripciones">
			<li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Basic</a></li>
			<li class="tabs-title" id="premium"><a href="#panel2">Premium</a></li>
			<li class="tabs-title" id="gold"><a href="#panel3">Gold</a></li>
		</ul>
		<div class="tabs-content" data-tabs-content="suscripciones">
			<!-- Suscripción Basic -->
			<div class="tabs-panel is-active" id="panel1">
				<h4>Suscripción Basic</h4>
				<div class="media-object stack-for-small">
					<div class="media-object-section">
						<img class="thumbnail" src="https://placehold.it/200x200">
					</div>
					<div class="media-object-section">
						<p>Ofrece la experiencia básica de la web y nuestros productos. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget lorem elit. Nam non mollis ex. Mauris luctus est lacus, in pellentesque est lacinia sit amet.</p>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
							<input type='hidden' name='Suscripcion' value='Basic' />
							<input type="submit" class="button large-5" value="Comprar - 5.99€" name="Basic"></input>
						</form>
					</div>
				</div>
			</div>

			<!-- Suscripción Premium -->
			<div class="tabs-panel" id="panel2">
				<h4>Suscripción Premium</h4>
				<div class="media-object stack-for-small">
					<div class="media-object-section">
						<img class="thumbnail" src="https://placehold.it/200x200">
					</div>
					<div class="media-object-section">
						<p>Ofrece mayores ventajas con respecto a la suscripción Basic, tales como darnos más dinero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget lorem elit. Nam non mollis ex. Mauris luctus est lacus, in pellentesque est lacinia sit amet</p>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
							<input type='hidden' name='Suscripcion' value='Premium' />
							<input type="submit" class="button large-5" value="Comprar - 11.99€" name="Premiun"></input>
						</form>
					</div>
				</div>
			</div>
			<!--Suscripcion Gold-->
			<div class="tabs-panel" id="panel3">
				<h4>Suscripción Gold</h4>
				<div class="media-object stack-for-small">
					<div class="media-object-section">
						<img class="thumbnail" src="https://placehold.it/200x200">
					</div>
					<div class="media-object-section">
						<p>Ofrece la máxima experiencia de la web y nuestros productos, ofreciéndote servicios como Diappbetes sin anuncios. The smallest seed of an idea can grow. It can grow to define or destroy you.</p>

						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
							<input type='hidden' name='Suscripcion' value='Gold' />
							<input type="submit" class="button large-5" value="Comprar - 29.99€" name="Gold"></input>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

		<?php
		$suscripcion = $usuario = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$suscripcion = $_POST["Suscripcion"];
			$usuario = $_SESSION["Usuario"];
			if (!empty($suscripcion) && !empty($usuario)) {
				$sql = "Update usuarios set Suscripcion = '" . $suscripcion . "' where usuario = '" . $usuario . "'";
				if ($_SESSION["con"]->query($sql) === TRUE) {
					echo '<p style="position:fixed; bottom:-16px; width:100%"; class="callout success">La transacción se ha completado correctamente.</p>';
				} else {
					echo '<p style="position:fixed; bottom:0px; width:100%"; class="callout alert">Algo ha fallado en la transacción.</p>';
				}
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
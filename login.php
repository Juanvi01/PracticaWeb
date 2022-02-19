<?php
require_once 'Funciones/conexion.php';
if (!isset($_COOKIE["intentos"])) {
	setcookie("intentos", 2, time() + 20, "/");
	//header("location: login.php");
}

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
	} else {
		require 'menu.php';
	}

	require 'Funciones/comprobarPass.php';
	?>
	
	<div class="row medium-6 large-5 columns" id="top">
		<div class="blog-post">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
			<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
				<span class="error"><?php echo $errorIntentos ?></span>
				<label style="color: white;" for="Usuario">Nombre de usuario:
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

	<script src='https://www.google.com/recaptcha/api.js?render=6Ld3aIseAAAAAHa0cRAp_L16YwCR1M-jF0rrY86m'>
	</script>
	<script>
		grecaptcha.ready(function() {
			grecaptcha.execute('6Ld3aIseAAAAAHa0cRAp_L16YwCR1M-jF0rrY86m', {
					action: 'ejemplo'
				})
				.then(function(token) {
					var recaptchaResponse = document.getElementById('recaptchaResponse');
					recaptchaResponse.value = token;
				});
		});
	</script>

	<script src="js/vendor/jquery-2.1.4.min.js"></script>
	<script src="js/vendor/foundation.js"> </script>
	<script>
		$(document).foundation();
	</script>
</body>

</html>
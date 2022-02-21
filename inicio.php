<?php
require_once 'Funciones/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Inicio</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/foundation.min.css">
  <link rel="stylesheet" href="css/foundation.css">
  <link href="css/app.css" rel="stylesheet" type="text/css">
  <link href="css/inicio.css" rel="stylesheet" type="text/css">
</head>

<body>
  <?php
  if (!isset($_SESSION['Usuario'])) {
    header("location: index.php");
    require 'menu.html';
  }else{
    require 'menu.php';
		require 'Funciones/comprobarTiempo.php';
    // Actualizamos la visita
    $sql = "UPDATE visita 
            SET IdPagina = 'inicio.php' 
            WHERE IdUsuario = '". $_SESSION['Usuario'] ."'";
    $_SESSION["con"]->query($sql);
  }
  ?>
  <div class="margenIzq">
  </div>
  <div class="row medium-8 large-8 columns">
    <h1>Inicio</h1>

    <div class="entrada">
      <h2>Diappbetes</h2>
      <p>Estamos desarrollando una aplicación para facilitar la vida a las personas que sufren de diabetes.</p>
      <p>La app permitirá llevar registro de las ingestas, contacto.</p>
    </div>

    <div class="entrada">
      <h2>Charlas educativas</h2>
      <p>Ofreceremos charlas educacionales en institutos y colegios con el fin de concienciar sobre éste tipo de enfermedades. </p>
      <p>¡Consulta a tu tutor o a la dirección de tu centro para que nos contacte para dar charlas allí!</p>
    </div>

    <div class="entrada">
      <h2>Robo de datos</h2>
      <p>Al usar nuestra app nos das permiso para recoger datos sobre tu persona y tus cercanos.</p>
      <p>Éstos datos serán vendidos a multinacionales que los usarán para ponerte publicidad personalizada y esas mierdas. A nosotros nos sirve para ganar dinero, que estamos en números rojos.</p>
      <p>¡Ignora la politica de privacidad como has ignorado este post!</p>
    </div>

  </div>

  <script src="js/vendor/jquery-2.1.4.min.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>
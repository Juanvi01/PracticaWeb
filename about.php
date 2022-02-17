<?php
require_once 'Funciones/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Quiénes somos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/foundation.min.css">
    <link rel="stylesheet" href="css/foundation.css">
	<link href="css/app.css" rel="stylesheet" type="text/css">
	<link href="css/about.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
  if (!$_SESSION['Iniciada']) {
    require 'menu.html';
  }else{
    require 'menu.php';
  }
    ?>
    <div class="margenIzq">
        <div class="blanca">
        <h1>Sobre nosotros</h1>
        <image src="Recursos/logo.png" class="logo" 
                alt="Imagen del logo" title="Logo de Diabetes Software"/>
        <p>Diabetes Software SL es una empresa de desarrollo de software centrada en el desarrollo de
            aplicaciones para la salud.</p>
        <p>Nuestro primer proyecto y el actual es "Diappbetes", una aplicación destinada a facilitar las vidas
            de los millones de diabéticos del mundo.
        </p>
        <p>Los socios de la empresa son Mario Hidalgo, Juan Vicente Ramos y Andrés Gómez.</p>

        </div>
    </div>

    <script src="js/vendor/jquery-2.1.4.min.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>
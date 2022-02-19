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
  if (!isset($_SESSION['Usuario'])) {
    require 'menu.html';
  } else {
    require 'menu.php';
    // Actualizamos la visita
    $sql = "UPDATE visita 
            SET IdPagina = 'about.php'
            WHERE IdUsuario = '". $_SESSION['Usuario'] ."'";
    $_SESSION["con"]->query($sql);
  }
  ?>
  <div class="grid-container">
    <div class="blanca">
      <h1>Sobre nosotros</h1>
      <image src="Recursos/logo.png" class="logo" alt="Imagen del logo" title="Logo de Diabetes Software" />
      <p>Diabetes Software SL es una empresa de desarrollo de software centrada en el desarrollo de
        aplicaciones para la salud.</p>
      <p>Nuestro primer proyecto y el actual es "Diappbetes", una aplicación destinada a facilitar las vidas
        de los millones de diabéticos del mundo.
      </p>
      <p>Los socios de la empresa son Mario Hidalgo, Juan Vicente Ramos y Andrés Gómez.</p>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d793.8844147437644!2d-6.9486116881243065!3d37.25867563407681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd11d023f98b70ab%3A0x5cb9e34834e5cb0f!2sC.%20Argantonio%2C%20Huelva!5e0!3m2!1ses!2ses!4v1645175549020!5m2!1ses!2ses" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      <p>Email: DiabetesSoftware@diabetesSW.com</p>
      <p>Tlf: 555 55 55 55</p>
    </div>
  </div>


  <script src="js/vendor/jquery-2.1.4.min.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>
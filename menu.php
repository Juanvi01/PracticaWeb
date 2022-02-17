<head>
  <link href="css/menu.css" rel="stylesheet" type="text/css">
</head>

<!-- Start Top Bar -->
    <div class="top-bar">
        <div class="top-bar-left">
          <ul class="menu">
            <li><a href="index.php" id="botonIni">Diabetes Software </a></li>
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="about.php">Sobre Nosotros</a></li>
          </ul>
        </div>
        <div class="top-bar-right">
          <ul class="menu">
            <li><a href="#">??</a></li>
            <li><a href="suscripcion.php">Suscripciones</a></li>

            
            <li><a href="#" class="dropdown" id="iniciarSesion"><?php echo($_SESSION["Usuario"]) ?></a></li>
          </ul>
        </div>
      </div>
      <!-- End Top Bar -->
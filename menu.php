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
    <ul class="menu" data-responsive-menu="accordion small-dropdown">
      <li class="bajar"><a href="#">??</a></li>
      <li class="bajar"><a href="suscripcion.php">Suscripciones</a></li>

      <div class="top-bar" id="main-menu">
        <ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown">
          <li style="margin-right:5.2rem;" class="has-submenu"><a href="#" id="iniciarSesion">
              <img class="avatar-user" src="data:image/*;base64, <?php echo base64_encode($_SESSION['Avatar']); ?>">
              <?php echo ($_SESSION["Usuario"]) ?></a>
            <ul class="submenu menu vertical" id="subdata" data-submenu>
              <li><a style="color:black;" href="perfil.php">Perfil</a></li>
              <li><a style="color:black;" href="Funciones/cerrarSesion.php">Cerrar Sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </ul>
  </div>
</div>
<!-- End Top Bar -->
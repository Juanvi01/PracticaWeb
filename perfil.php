<?php
require_once 'Funciones/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

</html>

<head>
    <title>Registro</title>
    <!--meta charset="utf-8" /-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/foundation.min.css">
    <link rel="stylesheet" href="css/foundation.css">
    <link href="css/app.css" rel="stylesheet" type="text/css">
    <link href="css/registro.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    if (!isset($_SESSION['Usuario'])) {
        require 'menu.html';
    } else {
        require 'menu.php';
    }
    require 'Funciones/modificarUsuario.php';
    ?>

    <div class="row medium-6 large-5 columns" id="top">
        <div class="blog-post">
            <!--Formulario de Registro de usuario-->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <img style="width:100px; height:100px; margin-bottom:1rem;" class="avatar-user" src="data:image/*;base64, <?php echo base64_encode($_SESSION['Avatar']); ?>">
                <label class="blanca" for="Nombre">Nombre:
                    <input type="text" id="Nombre" name="Nombre" minlength="10" value="<?php echo $nombre ?>">
                    <span class="error"><?php echo $errorNombre; ?></span>
                </label>
                <div class="top">
                    <label class="blanca" for="Usuario">Nombre de usuario:
                        <input type="text" id="Usuario" name="Usuario" minlength="8" value="<?php echo $usuario ?>">
                        <span class="error"><?php echo $errorUsuario; ?></span>
                    </label>
                </div>
                <div class="top">
                    <label class="blanca" for="Pass">Contraseña:
                        <input type="password" id="Pass" name="Pass" minlength="8" value="<?php echo $pass ?>">
                        <span class="error"><?php echo $errorPass; ?></span>
                    </label>
                </div>
                <div class="top">
                    <label class="blanca" for="RepPass">Repetir contraseña:
                        <input type="password" id="RepPass" name="RepPass" minlength="8" value="<?php echo $pass ?>">
                        <span class="error"><?php echo $errorRepPass; ?></span>
                    </label>
                </div>
                <?php
                if ($_SESSION['Sexo'] == "Hombre") {
                    echo ('<div class="top">
                    <label class="blanca" for="Sexo">Sexo:</label>
                    <input type="radio" id="Hombre" name="Sexo" value="Hombre" checked value="<?php echo $sexo ?>" />
                    <label class="blanca" for="Hombre">Hombre</label>
                    <input type="radio" id="Mujer" name="Sexo" value="Mujer" value="<?php echo $sexo ?>" />
                    <label class="blanca" for="Mujer">Mujer</label>
                </div>');
                } else {
                    echo ('<div class="top">
                    <label class="blanca" for="Sexo">Sexo:</label>
                    <input type="radio" id="Hombre" name="Sexo" value="Hombre"  value="<?php echo $sexo ?>" />
                    <label class="blanca" for="Hombre">Hombre</label>
                    <input type="radio" id="Mujer" name="Sexo" value="Mujer" checked value="<?php echo $sexo ?>" />
                    <label class="blanca" for="Mujer">Mujer</label>
                </div>');
                }
                ?>
                <div class="top">
                    <label class="blanca" for="FechaNac">Fecha de Nacimiento:
                        <input type="date" id="FechaNac" name="FechaNac" value="<?php echo $fechanac ?>" />
                        <span class="error"><?php echo $errorFecha; ?></span>
                    </label>
                </div>
                <div class="top">
                    <label class="blanca">Avatar:

                        <input type="file" name="Avatar" accept="image/*">
                    </label>
                </div>
                <div class="top">
                    <input style="display: block; margin: auto;" class="button large" id="expanded" type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </div>
    <script src="js/vendor/jquery-2.1.4.min.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>
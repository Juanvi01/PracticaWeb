<?php
require_once 'Funciones/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

</html>

<head>
    <title>Registro</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/foundation.min.css">
    <link rel="stylesheet" href="css/foundation.css">
    <link href="css/app.css" rel="stylesheet" type="text/css">
    <link href="css/registro.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    require 'menu.html';
    ?>
    <div class="row medium-6 large-5 columns" id="top">
        <div class="blog-post">
            <!--Formulario de Registro de usuario-->
            <form method="post" action="Funciones/insertarUsuario.php">

                <label for="Nombre">Nombre:</label>
                <input type="text" id="Nombre" name="Nombre">

                <div class="top">
                    <label for="Usuario">Nombre de usuario:</label>
                    <input type="text" id="Usuario" name="Usuario">
                </div>
                <div class="top">
                    <label for="Pass">Contraseña:</label>
                    <input type="text" id="Pass" name="Pass">
                </div>
                <div class="top">
                    <label for="Sexo">Sexo:</label>
                    <input type="radio" id="Hombre" name="Sexo" value="Hombre" checked />
                    <label for="Hombre">Hombre</label>
                    <input type="radio" id="Mujer" name="Sexo" value="Mujer" />
                    <label for="Mujer">Mujer</label>
                </div>
                <div class="top">
                    <label for="FechaNac">Fecha de Nacimiento: </label>
                    <input type="date" id="FechaNac" name="FechaNac" />
                </div>
                <div class="top">
                    <label>Avatar:
                        <input type="file" name="Avatar" accept="image/*" />
                    </label>
                </div>
                <div class="top">
                <input style="display: block; margin: auto;" class="button large" id="expanded" type="submit" value="Registrar">
                </div>
            </form>
        </div>
    </div>


    <?php // Codigo copieteado de internet -Mario
    /*  require 'conexion.php';
    session_start();
    
    if (isset($_POST['Registrar'])) {
    
        $usuario = $_POST['Usuario'];
        $contra = $_POST['Contraseña'];
        $nombre = $_POST['Nombre'];
        // Falta pillar el sexo y la fecha que me da pereza
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
    }// Esto supongo que encripta la contraseña
    
    /*
        // Consulta que comprueba si existe el usuario
        
    
        if ($existe) {
            echo '<p class="error">El usuario ya está registrado.</p>';
        }
    }
    */

    ?>


    <script src="js/vendor/jquery-2.1.4.min.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>
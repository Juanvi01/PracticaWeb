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
    require 'menu.html';

    function formatear($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $errorNombre = $errorUsuario = $errorPass = $errorRepPass = $errorYaRegistrado = $errorFecha = $imgContent = null;
    $error = false;
    $usuario = $pass = $repPass = $nombre = $fechanac = $sexo = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sexo = $_POST["Sexo"];
        // Nombre
        if (empty($_POST["Nombre"])) { // Si esta vacío salta error
            $errorNombre = "Escribe un nombre.";
            $error = true;
        } else {
            $nombre = formatear($_POST["Nombre"]);
            // Revisa la integridad del texto
            // Solo letras
            if (!preg_match("/^[A-Za-záéíóúüñÁÉÍÓÚÜÑ ]{10,}$/", $nombre)) {
                $errorNombre = "El nombre no es correcto.";
                $error = true;
            }
        }
        // Usuario
        if (empty($_POST["Usuario"])) { // Si esta vacío salta error
            $errorUsuario = "Escribe un usuario.";
            $error = true;
        } else {
            $usuario = formatear($_POST["Usuario"]);
            // Revisa la integridad del texto
            // Empieza por una letra y el resto son letras o numeros
            if (!preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚÄËÏÖÜäëïöüàèìòùÀÈÌÔÙ][A-Za-zñÑáéíóúÁÉÍÓÚÄËÏÖÜäëïöüàèìòùÀÈÌÔÙ0-9]{7,}$/", $usuario)) {
                $errorUsuario = "El nombre de usuario no es correcto.";
                $error = true;
            }
        }
        // Contraseña
        if (empty($_POST["Pass"])) { // Si esta vacío salta error
            $errorPass = "Escribe una contraseña valida.";
            $error = true;
        } else {
            $pass = formatear($_POST["Pass"]);
            // Revisa la integridad del texto
            // mínimo 8 caracteres alfanuméricos/especiales. Al menos una letra mayúscula y un número.
            if (!preg_match("/^[A-Za-z0-9]{8,}$/", $pass)) {
                $errorPass = "La contraseña debe contener una mayuscula y un numero.";
                $error = true;
            }

            //Comprueba el repetir contraseña
            $repPass = $_POST["RepPass"];
            if($pass != $repPass){
                $errorRepPass = "Las contraseñas no coinciden.";
                $error = true;
            }
        }
        // Fecha de nacimiento
        if (empty($_POST["FechaNac"])) { // Si esta vacío salta error
            $errorFecha = "Selecciona una fecha.";
            $error = true;
        } else {
            $fechanac = date('Y-m-d', strtotime($_POST["FechaNac"]));
            $fecha_actual = strtotime(date("Y-m-d"));
            $fecha_entrada = strtotime($_POST["FechaNac"] . "+ 16 year");
            if ($fecha_actual < $fecha_entrada) {
                $errorFecha = "Debes tener al menos 16 años para registrarte.";
                $error = true;
            }
        }
        if ($_FILES['Avatar']['name'] != null) {
            $check = getimagesize($_FILES["Avatar"]["tmp_name"]);
            if ($check !== false) {
                $image = $_FILES['Avatar']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));
            }
        }else {
            if (!$error && !empty($_POST["sexo"])) {
                if ($sexo == "Mujer") {
                    $imgContent = addslashes(file_get_contents("Recursos/usuariom.png"));
                } else {
                    $imgContent = addslashes(file_get_contents("Recursos/usuarioh.png"));
                }
            }
        }

        if (!$error) {
            try{
                $sql = "INSERT INTO usuarios VALUES ('" . $usuario . "', '" . $pass . "', '" .
                    $nombre . "', '" . $sexo . "' , '" . $fechanac . "', '" . $imgContent . "')";
                if ($_SESSION["con"]->query($sql) === TRUE) {
                    echo '<p class="callout success">Te has registrado correctamente</p>';
                } else {
                    echo '<p class="callout alert">Todo lo que podia salir mal lo ha hecho, inutil.</p>';
                }
                header("location: login.php");
            }catch(mysqli_sql_exception){
                $errorYaRegistrado = "Ya está registrado un usuario con ese nombre.";
            }
        }
    }
    ?>

    <div class="row medium-6 large-5 columns" id="top">
        <div class="blog-post">
            <!--Formulario de Registro de usuario-->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

                <label for="Nombre">Nombre:
                    <input type="text" id="Nombre" name="Nombre" minlength="10" value="<?php echo $nombre ?>">
                        <span class="error"><?php echo $errorNombre; ?></span>
                </label>
                <div class="top">
                    <label for="Usuario">Nombre de usuario:
                        <input type="text" id="Usuario" name="Usuario" minlength="8" value="<?php echo $usuario ?>">
                        <span class="error"><?php echo $errorUsuario; ?></span>
                    </label>
                </div>
                <div class="top">
                    <label for="Pass">Contraseña:
                        <input type="password" id="Pass" name="Pass" minlength="8" value="<?php echo $pass ?>">
                        <span class="error"><?php echo $errorPass; ?></span>
                    </label>
                </div>
                <div class="top">
                    <label for="RepPass">Repetir contraseña:
                        <input type="password" id="RepPass" name="RepPass" minlength="8" value="<?php echo $repPass ?>">
                        <span class="error"><?php echo $errorRepPass; ?></span>
                    </label>
                </div>
                <div class="top">
                    <label for="Sexo">Sexo:</label>
                    <input type="radio" id="Hombre" name="Sexo" value="Hombre" checked value="<?php echo $sexo ?>"/>
                    <label for="Hombre">Hombre</label>
                    <input type="radio" id="Mujer" name="Sexo" value="Mujer" value="<?php echo $sexo ?>"/>
                    <label for="Mujer">Mujer</label>
                </div>
                <div class="top">
                    <label for="FechaNac">Fecha de Nacimiento:
                        <input type="date" id="FechaNac" name="FechaNac" value="<?php echo $fechanac ?>"/>
                        <span class="error"><?php echo $errorFecha; ?></span>
                    </label>
                </div>
                <div class="top">
                    <label>Avatar:
                        <input type="file" name="Avatar" accept="image/*"/>
                    </label>
                </div>
                <div class="top">
                    <span class="error"><?php echo $errorYaRegistrado; ?></span>
                    <input style="display: block; margin: auto;" class="button large" id="expanded" type="submit" value="Registrar">
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
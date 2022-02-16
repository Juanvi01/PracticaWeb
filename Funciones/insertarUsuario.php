<?php
    function formatear($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $errorNombre = $errorUsuario = $errorRepPass = $errorPass = $errorYaRegistrado = $errorFecha = $imgContent = null;
    $tieneMayus = $tieneNum = $error = false;
    $usuario = $pass = $repPass = $nombre = $fechanac = $sexo = "";
    $tieneMayus = $tieneNum = false;

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
            $tieneMayus = $tieneNum = false;
            for($i=0; $i<strlen($pass); $i+=1){
                if (preg_match('`[A-Z]`', $pass)) {
                    $tieneMayus = true;
                }
                if (preg_match('`[0-9]`', $pass)) {
                    $tieneNum=true;
                }
            }
            if(!$tieneMayus && !$tieneNum){
                $errorPass = "La contraseña debe contener una mayúscula y un número.";
                $error=true;
            }else if(!$tieneMayus){
                $errorPass = "La contraseña debe contener una mayúscula.";
                $error=true;
            }else if(!$tieneNum){
                $errorPass = "La contraseña debe contener un número.";
                $error=true;
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
                $sql = "INSERT INTO usuarios 
                    (Usuario, Pass, Nombre, Sexo, FechaNac, Avatar) 
                    VALUES (
                    '" . $usuario . "', '" . $pass . "', '" .$nombre . "', '" . $sexo . "' , '" . 
                    $fechanac . "', '" . $imgContent . "')";

                if ($_SESSION["con"]->query($sql) === TRUE) {
                    echo '<p class="callout success">Te has registrado correctamente</p>';
                } else {
                    echo '<p class="callout alert">Todo lo que podia salir mal lo ha hecho, inutil.</p>';
                }
                header("location: login.php");
            }catch(mysqli_sql_exception $errorSQL){
                $errorYaRegistrado = "Ya está registrado un usuario con ese nombre.";
            }
        }
    }
    ?>
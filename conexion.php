
<?php
$server = "localhost";
$user = "root";
$pass = "marisma";
$bd = "hlc_practicaweb";

$_SESSION["con"] = new mysqli($server, $user, $pass, $bd);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>

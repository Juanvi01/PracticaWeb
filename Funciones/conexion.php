<?php
session_start();

$server = "localhost";
$user = "root";
$pass = "marisma";
$bd = "hlc_practicaweb";

$_SESSION["con"] = new mysqli($server, $user, $pass, $bd);
if ($_SESSION["con"]->connect_error) {
    die("Connection failed: " . $_SESSION["con"]->connect_error);
}
?>
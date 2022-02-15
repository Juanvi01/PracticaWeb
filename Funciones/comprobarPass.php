<?php
require '../conexion.php';
require 'usuarioExiste.php';// $usu se coge del usuarioExiste.php

$sql = "SELECT Pass from usuarios where usuario = '". $usu ."'";   
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pass = $_POST["Contraseña"];
        if($row["Pass"]==$pass){
            header("location: ../inicio.php");
        }else{
            header("location: ../login.php");
            echo "No Pass";
        }
    }
}else{
    header("location: ../login.php");
    echo "No usu";
}
/*
if($result=require 'usuarioExiste.php'){
{
    echo "El usuario existe";
    $pass = $_POST["Pass"];
    
    while($row = $result->fetch_assoc()) {
        echo "While";
        if($pass == $row["Pass"]){
            header("location: ../inicio.php");
        }else{
            header("location: ../login.php");
        }
    }
}*/
?>
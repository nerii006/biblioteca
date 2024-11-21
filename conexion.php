<?php
    $host = "localhost";
    $bd = "biblioteca";
    $usuario = "root";
    $contrasenia = "";
    
    try {
        $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $contrasenia);       
    } catch (Exception $ex) {
        echo "Error: " . $ex->getMessage();
    }
?>
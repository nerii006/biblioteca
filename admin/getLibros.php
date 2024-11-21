<?php
include('../conexion.php');

$query = $conexion->prepare("SELECT * FROM libros");
$query->execute();
$libros = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($libros);
?>
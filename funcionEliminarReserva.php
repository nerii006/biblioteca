<?php
include('./conexion.php');
session_start();

$id_reserva = $_GET['id_reserva'];
$query = $conexion->prepare("DELETE FROM reservas WHERE id_reserva = :id");
$query->bindParam(':id', $id_reserva);
$query->execute();

header('Location:reservas.php');
?>
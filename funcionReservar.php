<?php
    include('./conexion.php');
    session_start();

    $id_alumno = $_GET['id_alumno'];
    $id_libro = $_GET['id_libro'];

    $query = $conexion->prepare("INSERT INTO reservas(alumno_id, libro_id) VALUES (:id_alumno,:id_libro)");
    $query->bindParam(':id_alumno', $id_alumno);
    $query->bindParam(':id_libro', $id_libro);
    $query->execute();

    header('Location:reservas.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservas</title>
    <link rel="stylesheet" href="./estilos/general.css">
    <link rel="stylesheet" href="./estilos/nav.css">
    <link rel="stylesheet" href="./estilos/footer.css">
    <link rel="stylesheet" href="./estilos/reservas.css">
</head>
<body>
<?php include('template/header.php') ?>
<?php
include('./conexion.php');

$query = $conexion->prepare("SELECT * FROM libros 
INNER JOIN reservas ON reservas.libro_id = libros.id_libro
INNER JOIN autores ON autores.id_autor = libros.autor_id
WHERE reservas.alumno_id=:id_alumno;");
$query->bindParam(':id_alumno', $_SESSION['id_usuario']);
$query->execute();
$reservas = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="siseve">
<div class="container">
    
    <?php if (!isset($_SESSION['usuario'])) { ?>
        <h1>Tus Reservas📚</h1>
        <h3 class="sub" style="color:#ff4018">Debes asegurarte de <a href="./inicioSesion.php" style="color:#d53817">INICIAR SESIÓN</a> para reservar tus libros</h3>
    
    <?php 
    die(); } ?>
    <h1>Tus Reservas📚</h1>
    <h3 class="sub">Aquí encontrarás todos los libros que hayas reservado</h3>
    <?php foreach ($reservas as $reserva) { ?>
    <div class="card">
        <div class="contenedorlibro">
            <div class="imagen">
                <img src="./img/portadas/<?php echo $reserva['portada_libro'] ?>" class="portadas">
            </div>
            <div class="col-md-8">
            <div class="cuerpo">
                <h3><b>Título: </b><?php echo $reserva['nombre_libro']; ?></h3><br>
                <h3><b>Autor: </b><?php echo $reserva['nombre_autor']; ?></h3><br>
                <p class="card-text"><b>Descripción: </b><?php echo $reserva['desc_libro']; ?></p><br>
                <a href="funcionEliminarReserva.php?id_reserva=<?php echo $reserva['id_reserva']; ?>" id="quitar">Quitar</a>
            </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>  
</div>

</body>
</html>
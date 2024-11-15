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
    
<div class="siseve"></div>
<div class="container">
    
     <h1>Tus Reservas📚</h1>
    <div class="card">
        <div class="contenedorlibro">
            <div class="imagen">
                <img src="./img/Dracula.webp" class="portadas">
            </div>
            <div class="col-md-8">
            <div class="cuerpo">
                <h3><b>Título: </b>Drácula</h3><br>
                <h3><b>Autor: </b>Yo</h3><br>
                <p class="card-text"><b>Descripción: </b>Novela gótica de terror que narra la historia del conde Drácula, un ser solitario y terrorífico que se traslada de Transilvania a Londres para conseguir sus fines.</p>
                <button type="button" id="quitar" onclick="reservar()">Quitar</button>
                <button type="button" onclick="reservar()">Reservar</button>
            </div>
            </div>
        </div>
    </div>
</div>   

<?php include('./template/footer.php') ?>

</body>
</html>
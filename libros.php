<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/libros.css">
    <link rel="stylesheet" href="./estilos/general.css">
    <link rel="stylesheet" href="./estilos/nav.css">
    <link rel="stylesheet" href="./estilos/footer.css">
    <title>Libros</title>
</head>
<body>
<?php include('template/header.php') ?>

<div class="todo">
<div class="siseve">
</div>
 <h1>Libros📖</h1>
    
    <div class="libreria">
        <div class="libro terror"></div>
        <div class="libro biologia">Biología</div>
        <div class="libro historia"></div>
        <div class="libro ciencia-ficcion"></div>
        <div class="libro matematica"></div>
        <div class="libro lengua">Lengua</div>
        <div class="libro"></div>
        <div class="libro romance">Romance</div>
        <div class="libro historia"></div>
        <div class="libro ciencia-ficcion"></div>

        <div class="libro comedia"></div>
        <div class="libro matematica">Matemática</div>
        <div class="libro lengua"></div>
        <div class="libro biologia"></div>
        <div class="libro terror"></div>
        <div class="libro"></div>
        <div class="libro comedia">Comedia</div>
        <div class="libro historia"></div>
        <div class="libro ciencia-ficcion">Ciencia Ficción</div>
        <div class="libro matematica"></div>

        <div class="libro lengua"></div>
        <div class="libro terror">Terror</div>
        <div class="libro"></div>
        <div class="libro suspenso">Suspenso</div>
        <div class="libro ciencia-ficcion"></div>
        <div class="libro thriller">Thriller</div>
        <div class="libro lengua"></div>
        <div class="libro"></div>
        <div class="libro comedia"></div>
        <div class="libro historia">Historia</div>
    </div>

    <div class="librosterror">
        <h2>Terror</h2>
    <div class="card" >
        <div class="contenedorlibro">
            <div class="imagen">
                <img src="./img/Dracula.webp" class="portadas">
            </div>
            <div class="col-md-8">
            <div class="cuerpo">
                <h3><b>Título: </b>Drácula</h3><br>
                <h3><b>Autor: </b>Yo</h3><br>
                <p class="card-text"><b>Descripción: </b>Novela gótica de terror que narra la historia del conde Drácula, un ser solitario y terrorífico que se traslada de Transilvania a Londres para conseguir sus fines.</p>
                <button type="button" onclick="reservar()">Reservar</button>
            </div>
            </div>
        </div>
    </div>
    </div>    
</div>
    <?php include('template/footer.php') ?>
    <script src="./script.js"></script>
</body>
</html>
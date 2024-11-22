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
<?php include('conexion.php') ?>
<?php
/* session_start();
if (isset($_SESSION['usuario'])) {
    echo $_SESSION['usuario'];
} */
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
switch ($accion) {
    case "terror":
        $query = $conexion->prepare("SELECT * FROM libros WHERE genero_id=1");
        $query->execute();
        $librosTerror = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $conexion->prepare("SELECT * FROM generos INNER JOIN libros ON libros.genero_id = generos.id_genero WHERE genero_id = 1;");
        $query->execute();
        $libro = $query->fetch(PDO::FETCH_LAZY);
        break;
    case "lengua":
        $query = $conexion->prepare("SELECT * FROM libros WHERE genero_id=2");
        $query->execute();
        $librosTerror = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $conexion->prepare("SELECT * FROM generos INNER JOIN libros ON libros.genero_id = generos.id_genero WHERE genero_id = 2;");
        $query->execute();
        $libro = $query->fetch(PDO::FETCH_LAZY);
        break;
    case "matematicas":
        $query = $conexion->prepare("SELECT * FROM libros WHERE genero_id=3");
        $query->execute();
        $librosTerror = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $conexion->prepare("SELECT * FROM generos INNER JOIN libros ON libros.genero_id = generos.id_genero WHERE genero_id = 3;");
        $query->execute();
        $libro = $query->fetch(PDO::FETCH_LAZY);
        break;
    case "ciencia-ficcion":
        $query = $conexion->prepare("SELECT * FROM libros WHERE genero_id=4");
        $query->execute();
        $librosTerror = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $conexion->prepare("SELECT * FROM generos INNER JOIN libros ON libros.genero_id = generos.id_genero WHERE genero_id = 4;");
        $query->execute();
        $libro = $query->fetch(PDO::FETCH_LAZY);
        break;
    case "comedia":
    $query = $conexion->prepare("SELECT * FROM libros WHERE genero_id=5");
        $query->execute();
        $librosTerror = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $conexion->prepare("SELECT * FROM generos INNER JOIN libros ON libros.genero_id = generos.id_genero WHERE genero_id = 5;");
        $query->execute();
        $libro = $query->fetch(PDO::FETCH_LAZY);
        break;
    case "thriller":
        $query = $conexion->prepare("SELECT * FROM libros WHERE genero_id=6");
        $query->execute();
        $librosTerror = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $conexion->prepare("SELECT * FROM generos INNER JOIN libros ON libros.genero_id = generos.id_genero WHERE genero_id = 6;");
        $query->execute();
        $libro = $query->fetch(PDO::FETCH_LAZY);
        break;
    case "suspenso":
        $query = $conexion->prepare("SELECT * FROM libros WHERE genero_id=7");
        $query->execute();
        $librosTerror = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $conexion->prepare("SELECT * FROM generos INNER JOIN libros ON libros.genero_id = generos.id_genero WHERE genero_id = 7;");
        $query->execute();
        $libro = $query->fetch(PDO::FETCH_LAZY);
        break;
    case "romance":
        $query = $conexion->prepare("SELECT * FROM libros WHERE genero_id=8");
        $query->execute();
        $librosTerror = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $conexion->prepare("SELECT * FROM generos INNER JOIN libros ON libros.genero_id = generos.id_genero WHERE genero_id = 8;");
        $query->execute();
        $libro = $query->fetch(PDO::FETCH_LAZY);
        break;
    case "historia":
        $query = $conexion->prepare("SELECT * FROM libros WHERE genero_id=9");
        $query->execute();
        $librosTerror = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $conexion->prepare("SELECT * FROM generos INNER JOIN libros ON libros.genero_id = generos.id_genero WHERE genero_id = 9;");
        $query->execute();
        $libro = $query->fetch(PDO::FETCH_LAZY);
        break;
    case "novela":
        $query = $conexion->prepare("SELECT * FROM libros WHERE genero_id=10");
        $query->execute();
        $librosTerror = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $conexion->prepare("SELECT * FROM generos INNER JOIN libros ON libros.genero_id = generos.id_genero WHERE genero_id = 10;");
        $query->execute();
        $libro = $query->fetch(PDO::FETCH_LAZY);
        break;
}

?>

<div class="siseve">
    <div class="formContenedor">
    <h1>Libros📖</h1>
    <h3 class="bienvenida">¡Bienvenido a la biblioteca! ¡Selecciona los libros de tu preferencia y reservalos!</h3>
    <form method="POST" class="libreria">
        <button class="libro agarrable terror" name="accion" value="terror" type="submit">
            <div class="terror" id="terror">Terror</div>
        </button>
        <button class="libro agarrable thriller" name="accion" value="thriller" type="submit">
            <div class="thriller" id="thriller">Thriller</div>
        </button>
        <button class="libro agarrable suspenso" name="accion" value="suspenso" type="submit">
            <div class="suspenso" id="suspenso">Suspenso</div>
        </button>
        <div class="libro biologia"></div>
        <div class="libro historia"></div>
        <div class="libro ciencia-ficcion"></div>
        <div class="libro matematica"></div>
        <div class="libro lengua"></div>
        <div class="libro"></div>
        <div class="libro comedia"></div>
        <div class="libro historia"></div>
        <div class="libro ciencia-ficcion"></div>
        <div class="libro romance"></div>
        <div class="libro ciencia-ficcion"></div>
        <div class="libro matematica"></div>
        <div class="libro suspenso"></div>
        

        <button class="libro agarrable comedia" name="accion" value="comedia" type="submit">
            <div class="comedia" id="comedia">Comedia</div>
        </button>

        <button class="libro agarrable ciencia-ficcion" name="accion" value="ciencia-ficcion" type="submit">
            <div class="ciencia-ficcion" id="ciencia-ficcion">Ciencia Ficción</div>
        </button>

        <button class="libro agarrable romance" name="accion" value="romance" type="submit">
            <div class="romance" id="romance">Romance</div>
        </button>

        <button class="libro agarrable novela" name="accion" value="novela" type="submit">
            <div class="novela" id="novela">Novela</div>
        </button>
        

        <button class="libro agarrable lengua" name="accion" value="lengua" type="submit">
            <div class="lengua" id="lengua">Lengua</div>
        </button>

        <button class="libro agarrable matematicas" name="accion" value="matematicas" type="submit">
            <div class="matematicas" id="matematicas">Matemáticas</div>
        </button>

        <button class="libro agarrable historia" name="accion" value="historia" type="submit">
            <div class="historia" id="historia">Historia</div>
        </button>
        <div class="libro suspenso"></div>
        <div class="libro terror"></div>
        <div class="libro thriller"></div>
        <div class="libro lengua"></div>
        <div class="libro"></div>
        <div class="libro comedia"></div>
        <div class="libro historia"></div>
    </form>
    <div class="listaLibros" id="listaLibros">
        <h2>   
        <?php 
        if (isset($libro)) {
            echo $libro['genero'];   
        }
        ?> 
        </h2>
        
        <form method="POST">
            <?php 
            if (!empty($librosTerror)) {
            foreach ($librosTerror as $libro) { 
                $query = $conexion->prepare("SELECT * FROM autores INNER JOIN libros ON libros.autor_id = autores.id_autor WHERE libros.id_libro = :id");
                $query->bindParam(':id', $libro['id_libro']);
                $query->execute();
                $autor = $query->fetch(PDO::FETCH_LAZY);
                $query = $conexion->prepare("SELECT * FROM libros WHERE id_libro = :id");
                $query->bindParam(':id', $libro['id_libro']);
                $query->execute();
                $img = $query->fetch(PDO::FETCH_LAZY);
            ?>
            <div class="card">
                <div class="contenedorlibro">
                    <div class="imagen">
                        <img src="<?php echo './img/portadas/'.$img['portada_libro']; ?>" class="portadas">
                    </div>
                    <div class="col-md-8">
                        <div class="cuerpo">
                            <h3><b>Título: </b><?php echo $libro['nombre_libro']; ?></h3><br>
                            <h3><b>Autor: </b><?php echo $autor['nombre_autor']; ?></h3><br>
                            <p class="card-text"><b>Descripción: </b><?php echo $libro['desc_libro']; ?></p><br>
                            <!-- <input type="submit" name="reservaBtn" value="Reservar"></input> -->
                            <a href="./funcionReservar.php?id_alumno=<?php echo $_SESSION['id_usuario']; ?>&id_libro=<?php echo $libro['id_libro']; ?>" id="btn_reservar">Reservar</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} ?>
        </form>
    <br><br></div> 
    </div>
    

 

     
</div>  

   <?php include('./template/footer.php') ?>
    <script src="./script.js"></script>
</body>
</html>